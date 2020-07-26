<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Product; 
use App\Order; 
use App\Customer; 
use App\Products_Stocks; 
use App\Products_Orders; 

class OrderController extends BaseController
{
     /**
     * Buy , order
     *
     * @param  \Illuminate\Http\Request  $request 
     * @return \Illuminate\Http\Response
     */
    public function order(Request $request)
    {   
      $input = $request->all();
        $validator = Validator::make($input, [
            'products' => 'required',
            'quantity' => 'required',
            'email' => 'required|email',            
            'phone_number' => 'required',
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        } 
       $products = Product::find(json_decode($request->products));
        $quantityes = json_decode($request->quantity);  
        
        //Проверка наличие всех товаров на складе, в случае отстутвия вернёт ошибку с указанием товара
        foreach($products as $key=>$product){
            $checkStock = false;
            $q_now=0; //Временная переменая, максимальное количество на складе конкретного товара. Складов несколько
            $pr_stocks = $product->products_stocks;
            //Реализовано для возможности добавления дополнительных складов, на будущее
            //Пока код актуален для одного склада
            foreach($pr_stocks as $stock){
                if($stock->checksQuantityForbuy($quantityes[$key])){
                    $checkStock = true;                   
                }
                if($q_now < $stock->quantity){
                    $q_now =  $stock->quantity;
                }               
            }
            if($checkStock == false){
                return $this->sendError(['Доступный остаток на складе для товара (id: '.$product->id.') '.$product->name => $q_now ], 'Невозможно заказать указанный товар,так как он кончился на складе.');
            }
        }

        DB::transaction(function() use ($products,$quantityes,$request)
        {
            $customer = Customer::firstOrCreate([
                'email' => $request->email, 
                'phone_number' => $request->phone_number,
                'first_name' => $request->first_name,  
                'middle_name' => $request->middle_name,   
                'last_name' => $request->last_name,    
            ]);
            $order = Order::create([
                'customer_id' => $customer->id,
            ]);
            foreach($products as $key=>$product){               
                $pr_stocks = $product->products_stocks;
                foreach($pr_stocks as $stock){
                    if($stock->quantity){
                        $stock->quantity = $stock->quantity - $quantityes[$key];
                        $product->products_stocks[0]->save();
                        $product->save();   
                    }            
                }
                //со складом решить и с множеством заказов
                $products_orders = Products_Orders::create([
                    'product_id' => $product->id,
                    'order_id' => $order->id,
                    'quantity_products' => $quantityes[$key],
                ]);

                if( !$products_orders )
                {
                    throw new \Exception('Не удалось добавить заказ');
                }
            }
       });
       return $this->sendResponse($products->toArray(), 'Заказ  '.$request->last_name.' '.$request->first_name.' успешно добавлен.');
     }
}

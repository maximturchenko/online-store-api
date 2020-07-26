<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Product; 
use App\Order; 
use App\Customer; 
use App\Products_Stocks; 

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
     
        $products = Product::find([1,4,18]);
        $quantityes = [1,1,1];         
        foreach($products as $key=>$product){
            $checkStock = false;
            $q_now=0; //Временная переменая, максимальное количество на складе конкретного товара. Складов несколько
            $pr_stocks = $product->products_stocks;
            foreach($pr_stocks as $stock){
                if($stock->checksQuantityForbuy($quantityes[$key])){
                    $checkStock = true;                   
                }
                if($q_now < $stock->quantity){
                    $q_now =  $stock->quantity;
                }               
            }
            if($checkStock == false){
                return $this->sendError(['Доступный остаток на складе для товара '.$product->name => $q_now ], 'Невозможно заказать указанный товар,так как он кончился на складе.');
            }
        }


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
  
        $customer = Customer::firstOrCreate([
                'email' => $request->email, 
                'phone_number' => $request->phone_number,
                'first_name' => $request->first_name,  
                'middle_name' => $request->middle_name,   
                'last_name' => $request->last_name,    
        ]);

        $products = Product::find(json_decode($request->products));

       $quantity = json_decode($request->quantity);
        foreach($products as $key=>$value){
          //  Products_Stocks::find();
        }
 
       // $products_stocks = Products_Stocks
       // dd($products);

       /* $order = Order::create([
            'first_name' => $request->first_name, 
            'last_name' => $request->last_name,
            'email' => $request->email,   
            ]);
        $order->products()->sync($products);   */

       return $this->sendResponse($products->toArray(), 'Заказ  '.$request->last_name.' '.$request->first_name.' успешно добавлен.');
 



    }
}

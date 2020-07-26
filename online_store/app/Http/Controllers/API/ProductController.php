<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product; 
use App\Category; 
use App\Products_Stocks; 
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Validator;

class ProductController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    /*
        Вывод только товаров в наличии на складе.
        Запрос: 
            SELECT
                products.id,products.name,products.description,products.price, categories.name
            FROM 
            products
            LEFT JOIN categories ON products.category_id = categories.id
            LEFT JOIN products_stocks ON products.id = products_stocks.product_id where products_stocks.quantity > 0
    */
      $products = DB::table('products')
      ->select('products.id', 'products.name','products.description', 'products.price', 'categories.name as category')
      ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
      ->leftJoin('products_stocks', 'products.id', '=', 'products_stocks.product_id')
      ->where('products_stocks.quantity', '>', 0)
      ->get();
      //dd($products);

        return $this->sendResponse($products->toArray(), 'Все товары.');

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'price' => 'required',            
            'category' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $categories = Category::find(json_decode($request->category));

        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price, 
            'description' => $request->description,
            'category_id' => $request->category,   
         ]); 

       return $this->sendResponse($product->toArray(), 'Товар '.$request->name.' с ценой в категорию `'.$categories->name.'` успешно добавлен.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    /*
        Вывод товара:
        Запрос: 
          SELECT
                products.id,products.name,products.description,products.price, categories.name as category, stocks.name as stock,products_stocks.quantity
            FROM 
            products
            LEFT JOIN categories ON products.category_id = categories.id            
            LEFT JOIN products_stocks ON products.id = products_stocks.product_id
            LEFT JOIN stocks ON products_stocks.stock_id = stocks.id  where products.id = 1
    */
      $product = DB::table('products')
      ->select('products.id', 'products.name','products.description', 'products.price', 'categories.name as category','stocks.name as stock','products_stocks.quantity')
      ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
      ->leftJoin('products_stocks', 'products.id', '=', 'products_stocks.product_id')
      ->leftJoin('stocks', 'products_stocks.stock_id', '=', 'stocks.id')
      ->where('products.id', '=', $id)
      ->get();  
        if (is_null($product)) {
            return $this->sendError('Товар не найден.');
        }
        return $this->sendResponse($product->toArray(), 'Товар показан.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

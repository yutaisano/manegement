<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * 商品一覧を表示
     * 
     * @return view
     */
    public function showList()
    {
        $products = product::all();
        return view('product.list',[
            'products' => $products,
        ]);
    }

    //商品詳細表示
    // public function detail($id)
    // {
    //     $products = Product::find($id);

    //     return view('product.detail', ['products' => $products]);
    // }


    //商品詳細表示（成功例）
    public function detail(Request $request) 
        {   
            $id = $request->id;
            $products = DB::table('products')->where('id', $id)->get();
            return view('product.list', ['products'=>$products]);
        }


    //商品検索
    public function search(Request $request)
    {
        $product_name = $request -> keyword;

         if(!empty($product_name)){
            //Productテーブルからクエリを取得
            $query = Product::query();

            //where句で検索結果をproductsに代入
            $products = $query -> where('product_name','like','%'.$product_name.'%') -> get();

        //list.blade.phpに検索結果を表示
        return view('product.list',['products' => $products]);
    }

    }
    
}

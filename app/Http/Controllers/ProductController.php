<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Companies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * 商品一覧を表示
     * 
     * @return view
     */
    public function showList(Request $request){

        $products = product::all();

        return view('product.list',['products' => $products],['companies' => companies::all()]);
    }

    //商品詳細表示
    // public function detail($id)
    // {
    //     $products = Product::find($id);

    //     return view('product.detail', ['products' => $products]);
    // }


    //商品詳細表示（成功例）
    public function detail(Request $request) {

            $id = $request->id;
            $products = DB::table('products')->where('id', $id)->get();
            return view('product.detail', ['products'=>$products]);
    }


    //商品検索

    //find(id)でレコード指定して企業名カラムを抽出する

    public function search(Request $request){

        $product_name = $request -> keyword;
        $company = $request -> company;
        $company = companies::find($company);
        $company = $company -> company_name;
        //dd($company);

            //Productテーブルからクエリを取得
            $query = Product::query();
  

            //where句で検索結果をproductsに代入
            $products = $query -> where('product_name','like','%'.$product_name.'%')->get();
            $products = $query -> where('company','like','%'.$company.'%')->get();

            //list.blade.phpに検索結果を表示
            return view('product.list',['products' => $products],['companies' => companies::all()]);
            
    }

    

    //商品登録画面
    public function showCreate(){

        return view('product.form',[
            'companies' => companies::all(),
        ]);
    }



    //商品登録機能
    public function exeStore(Request $request){

        //商品データを受け取る
        $input = $request->all();
        $image = $request->file('img_path');
        $path = \Storage::put('/public',$image);
        $path = explode('/',$path);

        //商品を登録
        \DB::beginTransaction();
        Product::create([
            'product_name' => $input['product_name'],
            //'img' => $image = $request->file('img')->store('storage/public'),
            'img_path' => $path[1],
            'company' => $input['company'],
            'price' => $input['price'],
            'stocks' => $input['stocks'],
            'comment' => $input['comment'],
        ]);
        \DB::commit();

        return redirect(route('product'));
    }



    //商品編集画面
    public function showEdit(Request $request) {

        $id = $request->id;
        //$products = DB::table('products')->where('id', $id)->first();
        $products = Product::find($id);


        return view('product.edit', ['products'=>$products],['companies' => companies::all()]);
    
    }

    public function exeUpdate(Request $request){

        //商品データを受け取る
        $input = $request->all();
        $input = $request->all();
        $image = $request->file('img');
        $path = \Storage::put('/public',$image);
        $path = explode('/',$path);
        //商品を更新する
        \DB::beginTransaction();
        $products = Product::find($input['id']);
        $products->fill([
            'product_name' => $input['product_name'],
            //'img' => $image = $request->file('img')->store('public/image'),
            'img' => $path[1],
            'price' => $input['price'],
            'company' => $input['company'],
            'stocks' => $input['stocks'],
            'comment' => $input['comment'],
        ]);
        
        $products->save();

        \DB::commit();

        return redirect(route('product'));
    }
    
    
    public function exeDelete($id){
        \DB::beginTransaction();
        $post = Product::find($id);
        $post->delete();
        Product::destroy($post);
        \DB::commit();

        return redirect(route('product'));

    }

}

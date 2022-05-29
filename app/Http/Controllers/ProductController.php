<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

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


    //検索機能
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $stock = $request->input('stock');
 
        $query = Product::query();
 
        if (!empty($keyword)) {
            $query->where('id', 'LIKE', "%{$keyword}%")
                ->orWhere('product_name', 'LIKE', "%{$keyword}%");
        }
 
        if (!empty($stock)) {
            $query->where('stocks', '>=', $stock);
        }
 
        $books = $query->get();
 
        return view('product.list', compact('products', 'keyword', 'stock'));
    }

}

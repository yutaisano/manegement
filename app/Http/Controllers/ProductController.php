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
}

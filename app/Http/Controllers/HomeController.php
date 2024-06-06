<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('user.index',[
            'products' => Product::paginate(8)
        ]);
    }

    public function ProductDetails($id)
    {
        $product = Product::findOrFail($id);
        return view('user.CartProduct',[
            'product' => $product
        ]);
    }

    public function about()
    {
        return view('user.about');
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
{
    public function LikeProduct(Request $request ,$Product_id) {
        $product = Product::findOrFail($Product_id);
        if (!Auth::guard('user')->check()) {
            return redirect()->route('user.loginuser');
        }
        $user = Auth::guard('user')->user();
        if ($user->likes()->where('product_id',$product->id)->exists()) {
            $user->likes()->detach($product->id);
        } else {
            $user->likes()->attach($product->id);
        }
        return redirect()->back();
    }
}

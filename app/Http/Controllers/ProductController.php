<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Reaction;
use App\Policies\ProductPolicy;
use App\Policies\UserPolicy;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;


class ProductController extends Controller
{

    public function index(){

        return view('admin.index',
        ['products'=>Product::paginate(11)
    ]);}

    public function category(){
        $categorys = Category::all();
        return view('admin.Categorys',compact('categorys'));
    }

    public function categoryreq(Request $request){
        $validation = $request->validate(['productsCategory' => 'required']);
        $CategoryData = ['NameCategory' => strip_tags($request->input('productsCategory'))];
        Category::create($CategoryData);
        return redirect()->route('admin.category');
    }

    public function categorydestroy($id){
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.category');
    }

    public function create(){
        $categorys = Category::all();
        return view('admin.create',compact('categorys'));
    }


    public function createreq(Request $request){

        if (!auth()->guard('admin')->check()) {
            return redirect()->route('admin.loginAdmin')->with('loginError', 'You must be logged in to add a product.');
        }

        $validatedData = $request->validate([
            'productName' => 'required|string|max:255',
            'productUrl' => 'required|url',
            'productPrice' => 'required|numeric|between:0.01,9999.99',
            'category' => 'required|exists:category,id'

        ]);

        $CRdata = [
            'productName' => strip_tags($request->input('productName')),
            'imageUrl' => strip_tags($request->input('productUrl')),
            'price' => strip_tags($request->input('productPrice')),
        ];




        $product = Product::create($CRdata);
        $product->category()->attach($request->input('category'));

        return redirect()->route('admin.index')->with('success-create', 'Success add ' . $product->productName . '.');
    }



    public function edit(string $id) {
        $product = Product::findOrFail($id);

        return view('admin.edit', [
            'product' => $product
        ]);
    }



    public function editreq(Request $request, string $id){

        if (!auth()->guard('admin')->check()) {
            return redirect()->route('admin.loginAdmin')->with('loginError', 'You must be logged in to Edit This product.');
        }

        $product = Product::findOrFail($id);

        $request->validate([
            'productName' => ['required','string','max:255'],
            'productUrl' => ['required','url'],
            'productPrice' => ['required','numeric','between:0.01,9999.99']
        ]);

        $product->productName = strip_tags($request->input('productName'));
        $product->imageUrl = strip_tags($request->input('productUrl'));
        $product->price = strip_tags($request->input('productPrice'));
        $product->save();
        return redirect()->route('admin.index');

    }


    public function deletereq($id){
        $product = Product::findOrFail($id);

        if (!auth()->guard('admin')->check()) {
            return redirect()->route('admin.loginAdmin')->with('loginError', 'You must be logged in to Edit This product.');
        }

        $product->delete();
        return redirect()->back();
    }

}



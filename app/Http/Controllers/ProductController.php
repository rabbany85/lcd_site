<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }


     public function index(Request $request){
        return view('product.index', [
            'products' => Product::paginate(15)
        ]);
    }
    
    public function new(Request $request){
        if($request->isMethod('POST')){
            $request->validate(Product::validation());
            $product = Product::create(array_merge($request->toArray(), [
            ]));      
            return redirect()->route('product.single', [
                'product' => $product->id
            ]);
        }
        return view('product.new', [
            'product' => new Product,
            'categories' => Category::all(),
        ]);
    }
    public function single(Product $product, Request $request){
        return view('product.single', [
            'product' => $product
        ]);
    }
    public function edit(Product $product, Request $request){
        if($request->isMethod('POST')){
            $request->validate(Product::validation());
            $product->update($request->toArray());
        
            return redirect()->route('product.single', [
                'product' => $product->id
            ]);
        }
        return view('product.edit', [
            'product' => $product,
            'categories' => Category::all()
        ]);
    }
    public function delete(Product $product, Request $request){
        if($request->isMethod('POST') || $request->isMethod('DELETE')){
            $product->delete();
            return redirect()->route('product.index');
        }
        return view('product.delete', [
            'product' => $product
        ]);
    }   
}

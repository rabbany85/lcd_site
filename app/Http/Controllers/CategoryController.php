<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
        // if($this->isAPI()){
        //     return response()->json(Product::all());
        // }
        return view('category.index', [
            'categories' => Category::paginate(15)
        ]);
    }
    
    public function new(Request $request){
        if($request->isMethod('POST')){
            $request->validate(Category::validation());
            $category = Category::create(array_merge($request->toArray(), [
            ]));
            
            // if($this->isAPI()){
            //     return response()->json($venue);
            // }
            return redirect()->route('category.single', [
                'category' => $category->id
            ]);
        }
        return view('category.new', [
            'category' => new Category,
        ]);
    }
    public function single(Category $category, Request $request){
        // if($this->isAPI()){
        //     return response()->json($venue);
        // }
        return view('category.single', [
            'category' => $category
        ]);
    }
    public function edit(Category $category, Request $request){
        if($request->isMethod('POST')){
            $request->validate(Category::validation());
            $category->update($request->toArray());
        
            // if($this->isAPI()){
            //     return response()->json($venue);
            // }
            return redirect()->route('category.single', [
                'category' => $category->id
            ]);
        }
        return view('category.edit', [
            'category' => $category,
        ]);
    }
    public function delete(Category $category, Request $request){
        if($request->isMethod('POST') || $request->isMethod('DELETE')){
            $category->remove();
            return redirect()->route('category.index');
        }
        return view('category.delete', [
            'category' => $category
        ]);
    }   
}

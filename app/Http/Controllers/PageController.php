<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Shop;
use App\Product;
use App\Category;
use App\Message;
use DB;
use Cart;

class PageController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  

//-----------------------home------------------------------


  public function home() {
    return view('pages.home');
  }


//-----------------------contactUS------------------------------

 public function contactUs() {
    return view('pages.contact');
    
  }



//-----------------------FAQ--------------------------------

public function FAQ() {
    return view('pages.faq');
   }




//-----------------------aboutUS------------------------------


public function aboutUs() {
    return view('pages.about');
    
  }





//-----------------------product------------------------------


public function product($id) {
	$product = Product::where('id', $id)->first();
    return view('pages.product', compact('product'));
  }





//-----------------------categoryList------------------------------



public function categoryList() {
    
    $categories =Category::get();
    $products = Product::paginate(6);
    
    return view('pages.categoryList', compact('categories', 'products'));
  }





//-----------------------productList------------------------------


public function productList($id) {    
    $categories =Category::get();
    $products = Product::where('category_id', $id)->paginate(6);
           
    
    return view('pages.categoryList', compact('categories', 'products', 'product_image'));
  }





//-----------------------reviewSubmit------------------------------


  public function contactSubmit(Request $request){

            $this->validate($request, [
                                       'name' => 'required|min:5',
                                       'email' => 'required|email',
                                       'subject' => 'required|min:2',
                                       'message' => 'required|min:10',
                                      ]);


            $message = new Message();
            $message->name = $request->input('name');
            $message->email = $request->input('email');
            $message->subject = $request->input('subject');
            $message->message = $request->input('message');
            $message->save();

            return Redirect::to('/');
            
           
     }   





  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id) {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id) {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id) {
    //
  }

}

<?php

namespace App\Http\Controllers;

use Cart;
use Mail;
use Auth;
use App\User;
use App\Product;
use App\Order;
use App\DeliveryCharge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;




class CartConfirmController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }



    /**
     * get final cart page with paypal button
     *
     * @return void
     */
public function cartConfirm(){

          return view('pages.payment');
        }//end of method




    /**
     * After successful payment.
     *
     * @return void
     */

public function paymentExecute(){
       
         Session::put('finalMessage', 'Thank you. Your payment was successful.'); 

         
          //---------------------Update Order Table--------------------------

          
          $order = new Order;
          $order->total = Cart::total();
          $order->user_id = Auth::user()->id;
          $order->delivery_charge = Session::get('deliveryCharge');
          $order->save();
 
         //------------------Now remove delivery charge-----------------------

          foreach(Cart::content() as $row){
                 $product_id = $row->id;
                 $rowId = $row->rowId;
                 if($product_id == 'd01'){Cart::remove($rowId);}
                }
           Session::forget('deliveryCharge');
           
         //------------------Update order_products Table----------------------
          
          $data = array();

          foreach(Cart::content() as $row){
                 
                 $product = Product::where('id', $row->id)->first();
                 
                 $data['product_id'] = $row->id;
                 $data['order_id'] = $order->id;
                 $data['product_title'] = $product['title'];
                 $data['price'] = $product['price'];
                 $data['qty'] = $row->qty;
      
            DB::table('order_products')->insert($data);
          }



         ////////////////////// Now Shoot email /////////////////////

          //$customer_details = User::where('id', $order->user_id)->first();
          
          $data = array();
          $data['orderNumber'] = $order->id;
          $data['amount'] = $order->total;
          $data['name'] = Auth::user()->title.' '.Auth::user()->first_name.' '.Auth::user()->last_name;
          $data['addressLine1'] = Auth::user()->address_line1;
          $data['addressLine2'] = Auth::user()->address_line2;
          $data['city'] = Auth::user()->city;
          $data['country'] = Auth::user()->country;
          $data['postCode'] = Auth::user()->postcode;
          $data['phone'] = Auth::user()->phone;
          $data['email'] = Auth::user()->email;




          Mail::send(['html' => 'mail.successMailToAdmin'], ["mailData"=>$data], function($message){
          $message->to('shomit011@gmail.com', 'To Mail')->subject('New Order');
          $message->from('shomit011@gmail.com', 'iMetroTech');
         });

          Mail::send(['html' => 'mail.successMailToCustomer'], ["mailData"=>$data], function($message){
          $message->to(Auth::user()->email, 'To Mail')->subject('Your Order at iMetroTech');
          $message->from('shomit011@gmail.com', 'iMetroTech');
         });
   

          Cart::destroy(); 
          Session::put('cartPage', '');
          Session::put('addedToBasket', '');
          Session::put('basketTotal', '');
          Session::put('cartTotal', '');
        
       return Redirect::to('success');

}


public function success(){
       return view('pages.checkout_success');
}



}// End of Class


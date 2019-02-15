<?php

namespace App\Http\Controllers;

use Cart;
use Mail;
use App\User;
use App\Product;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;



class CartController extends Controller
{
    
/////////////////////////////////////////////////////////////////////////////

  /* NOTE: If I do not remove the discount here, it will keep adding the discount to the same product every time the cart page is refreshed. Every time the user enter into the cart page, system removes all the discount first then put them again to make sure one product gets discount once only.*/



public function cart(){

       Session::put('cartPage', 'cartCreated');
        //$total = Cart::total();
        //return $total;
          $this->removeDeliveryCharge();
          $this->addDeliveryCharge();
          return view('pages.cart');
        }//end of method



///////////////////////////////////////////////////////////////////////////////


   public function removeDeliveryCharge(){

         foreach(Cart::content() as $row){
                 $product_id = $row->id;
                 $rowId = $row->rowId;
                 if($product_id == 'd01'){Cart::remove($rowId);}
                }
           Session::forget('deliveryCharge');
        }//end of method


/////////////////////////////////////////////////////////////////////////////



public function addToBasket(Request $request) {
       $product = Product::where('id', $request->id)->first();
    
       $orderTotal = 0;
       $subTotal = 0;
       if(!Session::get('orderTotal'))
         {
          Session::put('orderTotal', 0);
         }

       $data = array();
       $data['id'] = $product->id;
       $data['name'] = $product->title;
       $data['qty'] = $request->quantity;
       $data['price'] = $product->price; 
       Cart::add($data);
       
       $subTotal = $product->price * (int)$request->quantity;
       $orderTotal = Session::get('orderTotal') + $subTotal;
       Session::put('orderTotal', $orderTotal);
       

       Session::put('addedToBasket', $product->title.' is added to Basket');
       Session::put('basketTotal', Cart::count());
       Session::put('cartTotal', Cart::total());
      
       //return Redirect::to('categoryList');
       return response()->json([
        'success'=>'Data is successfully added',
        'basketTotal' => Cart::count(),
      ]);
               
     } 




//////////////////////////////////////////////////////////////////////////////


public function removeFromCart($rowId){

         Cart::remove($rowId); 
         Session::put('basketTotal', Cart::count());
         Session::put('cartTotal', Cart::total());      
         return Redirect::to('/cart');
       }



///////////////////////////////////////////////////////////////////////////////


public function updateQuantity(Request $request) {

       $quantity = $request->input('quantity');
       $rowId = $request->input('rowId');

       Cart::update($rowId, $quantity); 
       //$this->getCartData();

       return Redirect::to('/cart');
      }





///////////////////////////////////////////////////////////////////////////////

public function addDeliveryCharge(){
    
    if(Session::get('orderTotal') < 200){
  
           $data = array();

           $data['id'] = 'd01';
           $data['name'] = 'Delivery Charge';
           $data['qty'] = 1;
           $data['price'] = 4.50; 
           
           Session::put('deliveryCharge', 4.50);
           Session::put('cartMessage', 'Delivery Charge will be removed if your order goes over £200');

           Cart::add($data);
      }


  
}//end of method







//////////////////////////////////////////////////////////////////////////////

public function checkoutSuccess(){
       
        
          Session::put('finalMessage', 'Thank you. Your payment was successful.'); 

         
          //---------------------Update Order Table--------------------------

          
          $order = new Order;
          $order->total = Session::get('orderTotal');
          $order->user_id = Session::get('userID');
          $order->save();
 

         //------------------Update order_products Table----------------------
          
          $data = array();

          foreach(Cart::content() as $row){

                 $product = Product::where('id', $row->id)->first();
                 //echo $product;
                 //exit();
                 if($row->id == 'd01'){
                    $product['title'] = 'Delivery Charge';
                    $product['price'] = Session::get('deliveryCharge');
                 }

                 $data['product_id'] = $row->id;
                 $data['order_id'] = $order->id;
                 $data['qty'] = $row->qty;
      
            DB::table('order_products')->insert($data);
          }



         ////////////////////// Now Shoot email /////////////////////

          $customer_details = User::where('id', $order->user_id)->first();
          
          $data = array();
          $data['orderNumber'] = $order->id;
          $data['amount'] = $order->amount;
          $data['name'] = $order->customer_name;
          $data['addressLine1'] = $customer_details->address_line1;
          $data['addressLine2'] = $customer_details->address_line2;
          $data['town'] = $customer_details->town;
          $data['city'] = $customer_details->city;
          $data['country'] = $customer_details->country;
          $data['postCode'] = $customer_details->post_code;
          $data['phone'] = $customer_details->phone;
          $data['email'] = $customer_details->email;




          Mail::send(['html' => 'successMailToAdmin'], ["mailData"=>$data], function($message){
          $message->to('shomit011@gmail.com', 'To Mail')->subject('New Order');
          $message->from('shomit011@gmail.com', 'iMetroTech');
         });

          Mail::send(['html' => 'successMailToCustomer'], ["mailData"=>$data], function($message){
          $message->to(Session::get('userEmail'), 'To Mail')->subject('Your Order at iMetroTech');
          $message->from('shomit011@gmail.com', 'iMetroTech');
         });
   

          Cart::destroy(); 
          Session::put('cartPage', '');
          Session::put('addedToBasket', '');
          Session::put('basketTotal', '');
          Session::put('cartTotal', '');
        
       return view('pages.checkout_success');

      }//end of method



//////////////////////////////////////////////////////////////////////////////

public function checkoutFailed(){
       Session::put('finalMessage', 'We are sorry. Your payment did not go through.');      
       return view('frontEnd.shop.checkout_failed');
      }//end of method



}// End of Class


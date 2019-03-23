<?php

namespace App\Http\Controllers;

use Cart;
use Mail;
use App\User;
use App\Product;
use App\Order;
use App\DeliveryCharge;
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
       $orderTotal = Cart::total();
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
    
    $delivery_charge = 0;
    foreach(DeliveryCharge::get() as $charge){
    if(Cart::total() >= $charge->min_amount && Cart::total() <= $charge->max_amount){
       $delivery_charge = $charge->charge;
      }
     }
  
           $data = array();

           $data['id'] = 'd01';
           $data['name'] = 'Delivery Charge';
           $data['qty'] = 1;
           $data['price'] = $delivery_charge; 
           
           Session::put('deliveryCharge', $delivery_charge);
           Session::put('cartMessage', 'Delivery Charge will be removed if your order goes over £200');

           Cart::add($data);
      


  
}//end of method

}// End of Class


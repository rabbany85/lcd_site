<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\OrderProduct;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
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


    public function index(){
      if(Auth::user()->user_type == 'Client'){
        $orders = Order::where('user_id', Auth::user()->id)->get();
        }else{ $orders = Order::get(); } 
      return view('order.index', compact('orders')); 
    }
       
   public function tracking(Request $request){
          $request->validate([
          'tracking_number' => 'required|max:255|min:6'
          ]);
          Order::where('id', $request->input('id'))
                ->update(['tracking_number' => $request->input('tracking_number')]);

    return Redirect::to('order/');
   }
   
   public function single($id){
        $order_details = OrderProduct::where('order_id', $id)->get();
        $order = Order::where('id', $id)->first();
        return view('order.single', compact('order_details', 'order'));
      }

}

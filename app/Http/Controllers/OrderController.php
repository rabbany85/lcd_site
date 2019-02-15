<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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


     public function index(Request $request){
        
        if(Session::get('order_status')){
           if(Session::get('order_status') == 'Completed'){
              $id = $this->new();
           }
        }
        return view('order.index', [
            'order' => Order::where('id', $id)->first(),
            'products' => OrderProduct::where('order_id', $id)->get(),
        ]);
    }
    
    public function new(Request $request){
            $order = new Order;
            $order->total = 0;
            $order->user_id = Auth::user()->id;
            $order->status = 'Started';
            $order->save();
            return $order->id;
        }
        
    public function complete(Order $order, Request $request){
        return view('category.single', [
            'category' => $category
        ]);
    }
    public function add(Category $category, Request $request){
        
    }
    public function remove(Category $category, Request $request){
        
    }   
}

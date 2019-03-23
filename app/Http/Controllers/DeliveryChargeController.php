<?php

namespace App\Http\Controllers;

use App\DeliveryCharge;
use Illuminate\Http\Request;

class DeliveryChargeController extends Controller
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
        return view('delivery_charge.index', [
            'delivery_charges' => DeliveryCharge::get()
        ]);
    }
    
    public function edit(DeliveryCharge $delivery_charge, Request $request){
        if($request->isMethod('POST')){
            $request->validate(DeliveryCharge::validation());
            $delivery_charge->update($request->toArray());
        
            // if($this->isAPI()){
            //     return response()->json($venue);
            // }
            return view('delivery_charge.index', [
            'delivery_charges' => DeliveryCharge::get()
           ]);
        }
        return view('delivery_charge.edit', [
            'delivery_charge' => $delivery_charge,
        ]);
    }
       
}

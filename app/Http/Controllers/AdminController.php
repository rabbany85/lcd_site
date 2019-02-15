<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User as Admin;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('manager');
    }


     public function index(Request $request){
        // if($this->isAPI()){
        //     return response()->json(Product::all());
        // }
        return view('admin.index', [
            'admins' => Admin::where('user_type', 'Admin')->paginate(15)
        ]);
    }
    
    public function new(Request $request){
        if($request->isMethod('POST')){
            $request->validate(Admin::validation());
            
            $admin = new Admin;
            $admin->title = $request->input('title');
            $admin->name = $request->input('name');
            $admin->last_name = $request->input('last_name');
            $admin->address_line1 = $request->input('address_line1');
            $admin->address_line2 = $request->input('address_line2');
            $admin->city = $request->input('city');
            $admin->country = $request->input('country');
            $admin->postcode = $request->input('postcode');
            $admin->phone = $request->input('phone');
            $admin->user_type = 'Admin';
            $admin->email = $request->input('email');
            $admin->password = Hash::make($request->input('password'));
            $admin->save();

            //$admin = Admin::create(array_merge($request->toArray(), [
            //]));
            
            // if($this->isAPI()){
            //     return response()->json($venue);
            // }
            return redirect()->route('admin.single', [
                'admin' => $admin->id
            ]);
        }
        return view('admin.new', [
            'admin' => new Admin,
        ]);
    }
    public function single(Admin $admin, Request $request){
        // if($this->isAPI()){
        //     return response()->json($venue);
        // }
        return view('admin.single', [
            'admin' => $admin
        ]);
    }
    public function edit(Admin $admin, Request $request){
        if($request->isMethod('POST')){
            //$request->validate(Admin::validation());
            $data = array();
            $data['title'] = $request->input('title');
            $data['name'] = $request->input('name');
            $data['last_name'] = $request->input('last_name');
            $data['address_line1'] = $request->input('address_line1');
            $data['address_line2'] = $request->input('address_line2');
            $data['city'] = $request->input('city');
            $data['country'] = $request->input('country');
            $data['postcode'] = $request->input('postcode');
            $data['phone'] = $request->input('phone');
            $data['email'] = $request->input('email');
            $admin->update($data);
        
            // if($this->isAPI()){
            //     return response()->json($venue);
            // }
            return redirect()->route('admin.single', [
                'admin' => $admin->id
            ]);
        }
        return view('admin.edit', [
            'admin' => $admin,
        ]);
    }
    public function delete(Admin $admin, Request $request){
        if($request->isMethod('POST') || $request->isMethod('DELETE')){
            $admin->delete();
            return redirect()->route('admin.index');
        }
        return view('admin.delete', [
            'admin' => $admin
        ]);
    }
}

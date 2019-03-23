<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\User as Manager;

class ManagerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('superAdmin');
    }


     public function index(Request $request){
        return view('manager.index', [
            'managers' => Manager::where('user_type', 'Manager')->paginate(15)
        ]);
    }
    
    public function new(Request $request){
        if($request->isMethod('POST')){
            $request->validate(Manager::validation());
            $manager = new Manager;
            $manager->title = $request->input('title');
            $manager->name = $request->input('name');
            $manager->last_name = $request->input('last_name');
            $manager->address_line1 = $request->input('address_line1');
            $manager->address_line2 = $request->input('address_line2');
            $manager->city = $request->input('city');
            $manager->country = $request->input('country');
            $manager->postcode = $request->input('postcode');
            $manager->phone = $request->input('phone');
            $manager->user_type = 'Manager';
            $manager->email = $request->input('email');
            $manager->password = Hash::make($request->input('password'));
            $manager->save();

            return redirect()->route('manager.single', [
                'manager' => $manager->id
            ]);
        }
        return view('manager.new', [
            'manager' => new Manager,
        ]);
    }
    public function single(Manager $manager, Request $request){
        return view('manager.single', [
            'manager' => $manager
        ]);
    }
    public function edit(Manager $manager, Request $request){
        if($request->isMethod('POST')){
            //$request->validate(Manager::validation());
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
            $manager->update($data);
        
            return redirect()->route('manager.single', [
                'manager' => $manager->id
            ]);
        }
        return view('manager.edit', [
            'manager' => $manager,
        ]);
    }
    public function delete(Manager $manager, Request $request){
        if($request->isMethod('POST') || $request->isMethod('DELETE')){
            $manager->delete();
            return redirect()->route('manager.index');
        }
        return view('manager.delete', [
            'manager' => $manager
        ]);
    }

}

<?php

namespace App\Http\Controllers;

use App\User as Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
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


    public function single(Profile $profile, Request $request){
        return view('profile.single', [
            'profile' => $profile
        ]);
    }
    public function edit(Profile $profile, Request $request){
        if($request->isMethod('POST')){
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
            $profile->update($data);
            return redirect()->route('profile.single', [
                'profile' => $profile->id
            ]);
        }
        return view('profile.edit', [
            'profile' => $profile,
            ]);
    }
    public function delete(Profile $profile, Request $request){
        if($request->isMethod('POST') || $request->isMethod('DELETE')){
            if(Hash::check($request->input('password'), $profile->password) && $profile->user_type != 'Super Admin'){ 
               $profile->delete();
               return Redirect::to('/');
              }
           }
        return view('profile.delete', [
            'profile' => $profile
        ]);
    }   
}

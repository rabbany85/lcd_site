<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User as Client;

class ClientController extends Controller
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
        return view('client.index', [
            'clients' => Client::where('user_type', 'Client')->paginate(15)
        ]);
    }
    
    public function new(Request $request){
        if($request->isMethod('POST')){
            $request->validate(Client::validation());
            
            $client = new Client;
            $client->title = $request->input('title');
            $client->name = $request->input('name');
            $client->last_name = $request->input('last_name');
            $client->address_line1 = $request->input('address_line1');
            $client->address_line2 = $request->input('address_line2');
            $client->city = $request->input('city');
            $client->country = $request->input('country');
            $client->postcode = $request->input('postcode');
            $client->phone = $request->input('phone');
            $client->user_type = 'Client';
            $client->email = $request->input('email');
            $client->password = Hash::make($request->input('password'));
            $client->save();

            //$admin = Admin::create(array_merge($request->toArray(), [
            //]));
            
            // if($this->isAPI()){
            //     return response()->json($venue);
            // }
            return redirect()->route('client.single', [
                'client' => $client->id
            ]);
        }
        return view('client.new', [
            'client' => new Client,
        ]);
    }
    public function single(Client $client, Request $request){
        // if($this->isAPI()){
        //     return response()->json($venue);
        // }
        return view('client.single', [
            'client' => $client
        ]);
    }
    public function edit(Client $client, Request $request){
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
            $client->update($data);
        
            // if($this->isAPI()){
            //     return response()->json($venue);
            // }
            return redirect()->route('client.single', [
                'client' => $client->id
            ]);
        }
        return view('client.edit', [
            'client' => $client,
        ]);
    }
    public function delete(Client $client, Request $request){
        if($request->isMethod('POST') || $request->isMethod('DELETE')){
            $client->delete();
            return redirect()->route('client.index');
        }
        return view('client.delete', [
            'client' => $client
        ]);
    }
}

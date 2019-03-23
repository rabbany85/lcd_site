<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'name', 'last_name', 'address_line1', 'address_line2', 'city', 'country', 'postcode', 'phone', 'user_type', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function validation($key = NULL){
        $arr = [
                'title' => ['required', 'string', 'max:255'],
                'name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'address_line1' => ['required', 'string', 'max:255'],
                'address_line2' => ['required', 'string', 'max:255'],
                'city' => ['required', 'string', 'max:255'],
                'postcode' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:6', 'confirmed'],
             ];
        

        if(is_string($key)){
            return $arr[$key];
        }
        if(is_array($key)){
            return array_intersect_key($arr, array_flip($key));
        }
        return $arr;
    }

    
    public function media(){
    return $this->hasOne('App\Media', 'model_id', 'id')->where('model_name', 'user');
    }

    /**
     * Get the orders of the user.
     */
    public function orders(){
        return $this->hasMany('App\Order');
    }

}

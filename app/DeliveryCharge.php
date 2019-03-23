<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryCharge extends Model
{
    
       protected $fillable = [
        'title',
        'min_amount',
        'max_amount',
        'charge',
    ];


	//-----------------------------------------------------
    // Validation
    //-----------------------------------------------------
    public static function validation($key = NULL){
        $arr = [
            'min_amount' => 'required',
            'max_amount' => 'required',
            'charge' => 'required',
        ];
        
        if(is_string($key)){
            return $arr[$key];
        }
        if(is_array($key)){
            return array_intersect_key($arr, array_flip($key));
        }
        return $arr;
    }
}

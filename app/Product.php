<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{



   protected $fillable = [
        'title',
        'price', 
        'description',
        'category_id',
    ];


	//-----------------------------------------------------
    // Validation
    //-----------------------------------------------------
    public static function validation($key = NULL){
        $arr = [
            'title' => 'required',
            'price' => 'required',
            'description' => 'required',
            'category_id' => 'required',
        ];
        
        if(is_string($key)){
            return $arr[$key];
        }
        if(is_array($key)){
            return array_intersect_key($arr, array_flip($key));
        }
        return $arr;
    }



    public function category(){
    	return $this->belongsTo('App\Category', 'category_id', 'id');
    }

    public function media(){
        return $this->hasMany('App\Media', 'model_id')->where('model_name', 'like', 'product%');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
       protected $fillable = [
        'title',
        'description',
    ];


	//-----------------------------------------------------
    // Validation
    //-----------------------------------------------------
    public static function validation($key = NULL){
        $arr = [
            'title' => 'required',
        ];
        
        if(is_string($key)){
            return $arr[$key];
        }
        if(is_array($key)){
            return array_intersect_key($arr, array_flip($key));
        }
        return $arr;
    }


    public function remove(){
    	$this->products()->delete();
    	return $this->delete();
    }

    public function products(){
           return $this->hasMany('App\Product', 'category_id', 'id');
    }

    public function media(){
        return $this->hasMany('App\Media', 'model_id')->where('model_name', 'like', 'Category%');
    }


}

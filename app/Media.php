<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [
        'model_name', 'model_id', 'url', 'disk'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function product(){
        return $this->belongsTo('App\Product');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

    
    public function getFileSystemId(){
        if(preg_match('/gallery/', $this->model_name)){
            $url = explode('/', $this->url);
            return end($url);
        } else {
            return "";
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Media;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class MediaController extends Controller
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


     public function index(Request $request){
        // if($this->isAPI()){
        //     return response()->json(Product::all());
        // }
        return view('media.index', [
            'medias' => Media::paginate(15)
        ]);
    }
    
    public function new(Request $request){
            if($request->input('url') != 'not set' ){                 
               if(Input::hasFile('file')){ 

                  if($request->input('model_name') == 'user'){
                    //first delete the profile picture before uploading another one
                    $profile_picture = Media::where('model_name', 'user')
                                      ->where('model_id', $request->input('model_id'))->first();
                    if($profile_picture){
                      File::delete($profile_picture->url);
                      $profile_picture->delete();
                    }
                  }

                  $media = new Media;
                  $media->model_id = $request->input('model_id');
                  $media->model_name = $request->input('model_name');
                  $media->url = $request->input('url').'.jpg';
                  $media->save();
                  $file = Input::file('file');
                  $file->move('media', $request->input('url').'.jpg');
                  
                  return view('media.single', [
                              'media' => $media
                              ]);
                 //Input::hasFile('file')
                 }else{ return 'File upload failed';}
            //$request->input('url') != 'not set' 
            }else{
                  $image_count = Media::where('model_name', $request->input('model_name'))
                                      ->where('model_id', $request->input('model_id'))
                                      ->count();

            return view('media.new', [
                   'model_name' => $request->input('model_name'),
                   'model_id' => $request->input('model_id'),
                   'image_count' => Media::where('model_name', $request->input('model_name'))
                                         ->where('model_id', $request->input('model_id'))
                                         ->count(),
                                      ]);
             }//end of else
      
      }//end of method

    public function single(Media $media, Request $request){
        // if($this->isAPI()){
        //     return response()->json($venue);
        // }
        return view('media.single', [
            'media' => $media
        ]);
    }
    
    public function delete(Media $media, Request $request){
        if($request->isMethod('POST') || $request->isMethod('DELETE')){
            File::delete($media->url);
            $media->delete();
            return redirect()->route('login');
        }
        return view('media.delete', [
            'media' => $media
        ]);
    }   
}

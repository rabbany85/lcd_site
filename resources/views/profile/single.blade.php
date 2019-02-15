@extends('layouts.sidebar')
@section('mainContent')

<div class="content animate-panel">

        <div class="row">
            <div class="col-md-12">
                <div class="hpanel">
                    <div class="panel-body">
                        <div class="cotainer">
                                @if($profile->media)
                                <a href="{{ route('media.single', ['media' => $profile->media->id]) }}">
                                <img src="{{ asset($profile->media->url) }}" alt="{{$profile->media->id}}" style="height: 100px; width: 90px">
                                </a>
                                @endif
                            </div>
                        <h3>{{$profile->title}} {{$profile->name}} {{$profile->last_name}}</h3>
                                <p>
                                    {{$profile->address_line1}}<br>
                                    {{$profile->address_line2}}<br>
                                    {{$profile->city}}<br>
                                    {{$profile->country}}<br>
                                    {{$profile->postcode}}<br>
                                    {{$profile->phone}}<br>
                                    {{$profile->email}}<br>
                                </p>
                                <div class="row">
                                  <div class="col-xs-12 col-md-4">
                                    <div class="row">
                                      <div class="col-md-6">           
                                           <form action="{{ route('media.new') }}" method="post" enctype="multipart/form-data" class="form-group">
                                                 @csrf
                                                 <input type="hidden" name="model_id" value="{{$profile->id}}">
                                                 <input type="hidden" name="model_name" value="user">
                                                 <input type="hidden" name="url" value="not set">
                                                 <input type="submit" value="Upload Profile Picture" class="btn btn-default">
                                           </form>
                                         </div>
                                     </div>
                                      
                                  </div>
                                  <div class="col-xs-12 col-md-4">
                                      <a href="{{ route('profile.edit', ['profile' => $profile->id]) }}">
                                           <button type="button" class="btn btn-default btn-block">
                                                Edit Profile
                                           </button>
                                        </a>
                                  </div>
                                  <div class="col-xs-12 col-md-4">
                                      <a href="{{ route('profile.delete', ['profile' => $profile->id])}}">
                                        <button type="button" class="btn btn-default btn-block">
                                                Delete Account
                                        </button>
                                        </a>
                                  </div>
                                </div><!--row-->
                            </div><!--panel-body-->
                        </div><!--hpanel-->
                    </div>
                </div>
            </div>
   @endsection

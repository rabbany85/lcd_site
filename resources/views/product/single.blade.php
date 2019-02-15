@extends('layouts.sidebar')
@section('mainContent')
<div class="normalheader transition animated fadeIn">
    <div class="hpanel">
        <div class="panel-body">
            <a class="small-header-action" href="">
                <div class="clip-header">
                    <i class="fa fa-arrow-up"></i>
                </div>
            </a>
            <div id="hbreadcrumb" class="pull-right m-t-lg">
                <ol class="hbreadcrumb breadcrumb">
                    <li><a href="{{URL::to('login')}}">Dashboard</a></li>
                    <li><span>App views</span></li>
                    <li class="active"><span>Product Details</span></li>
                </ol>
            </div>
            <h2 class="font-light m-b-xs">Product Name: {{$product->title}}</h2>
            <small>Product Information</small>
        </div>
    </div>
</div>

<div class="content animate-panel">
    <div class="row">
        <div class="col-lg-12">
            <div class="hpanel">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>iMetroTech <small>Product Information</small></h4>
                        </div>
                        <div class="col-md-6"></div>
                    </div>
                </div>
                <div class="panel-body p-xl">
                    <div class="row m-b-xl">
                        <div class="col-sm-6"><h4>Product Details</h4></div>
                        <div class="col-sm-6 text-right">
                            <address>
                                <strong>Product ID: {{$product->id}}</strong><br>
                                Last Update: <strong>{{$product->created_at->format('d M Y')}}</strong><br>
                            </address>
                        </div>
                    </div>
                    <div class="table-responsive m-t">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Product Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <tr>
                                    <td><div><strong>{{$product->title}}</strong></div></td>
                                        <td>{{$product->category->title}}</td>
                                        <td>£{{ $product->price }}</td>
                                        <td>{{ $product->description }}</td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="cotainer">
                        @foreach($product->media as $media)
                        <a href="{{ route('media.single', ['media' => $media->id]) }}">
                        <img src="{{ asset($media->url) }}" alt="{{$media->id}}" style="height: 100px; width: 90px">
                        </a>
                        @endforeach
                    </div>
                     <div class="row">
                          <div class="col-md-6">           
                               <h1>Image Upload</h1>
                               <form action="{{ route('media.new') }}" method="post" enctype="multipart/form-data" class="form-group">
                                     @csrf
                                     <input type="hidden" name="model_id" value="{{$product->id}}">
                                     <input type="hidden" name="model_name" value="Product">
                                     <input type="hidden" name="url" value="not set">
                                     <input type="submit" value="Add Image" class="btn btn-default btn-block">
                               </form>
                         </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="m-t"><strong>Comments</strong>
                                If you see anything unusual, please contact your developer.
                            </div>
                        </div>
                    </div>
                </div><!--panel-body p-xl-->
            </div><!--hpanel-->
        </div><!--col-lg-12-->
    </div><!--row-->
</div><!--content animate-panel-->
@endsection
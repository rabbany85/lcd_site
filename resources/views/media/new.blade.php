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
            <div id="hbreadcrumb" class="pull-right m-t-lg"></div>
            <h2 class="font-light m-b-xs">
                Upload image here.
            </h2>
            <small>Media Information</small>
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
                                   <h4>iMetroTech <small>Media Information</small></h4>
                              </div>
                              <div class="col-md-6">
                              </div>
                         </div>
                    </div>
                    
<div class="panel-body p-xl">
    <div class="table-responsive m-t">
        <div class="row">
          <div class="col-md-3">
          </div>
          <div class="col-md-6">
             @include('layouts.errors')
             <form action="{{ route('media.new') }}" method="post" enctype="multipart/form-data" class="form-group">
                      <label>Select image to upload:</label>
                      @csrf
                      <input type="hidden" name="model_id" value="{{$model_id}}">
                      <input type="hidden" name="model_name" value="{{$model_name}}">
                      <input type="hidden" name="url" value="media/{{$model_name}}_{{$model_id}}_{{ $image_count + 1 }}">
                      <div class="form-group">
                           <input type="file" name="file" id="file" class="form-control">
                      </div>
                      <input type="submit" value="Upload Image" class="btn btn-default btn-block form-control">
                    </form>
                  </div>
                  <div class="col-md-3">
                  </div>       
                  </div><!--row-->
                 </div><!--table-responsive m-t-->
                </div><!--panel-body p-xl-->
              </div><!--hpanel-->
           </div><!--col-lg-12-->
         </div><!--row-->
       </div><!--content animate-panel-->
@endsection




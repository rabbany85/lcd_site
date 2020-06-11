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
                Please insert product information only. You can upload image from product page.
            </h2>
            <small>Add Product Information</small>
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
                              <div class="col-md-6">
                              </div>
                         </div>
                    </div>
                    
<div class="panel-body p-xl">
    <div class="table-responsive m-t">
        <div class="row">
             @include('layouts.errors')
             <form method="POST" class="form-horizontal" action="{{route('product.new')}}">
                   {{ csrf_field() }}
                   <div class="col-lg-12">
                        <div class="hpanel">
                             <div class="panel-body">
                                  <h3 class="text-center">Add Product</h3>
                                  <div class="hr-line-dashed"></div>
                                      <div class="form-group">
                                          <label class="col-sm-2 control-label">Title</label>
                                          <div class="col-sm-10">
                                               <input id="title" type="text" name="title" class="form-control" required>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 control-label">Price £</label>
                                          <div class="col-sm-10">
                                              <input id="price" type="text" name="price" class="form-control" required>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                           <label class="col-sm-2 control-label">Product Description</label>
                                           <div class="col-sm-10">
                                               <textarea class="form-control" name="description" rows="8" 
                                                      cols="50"></textarea> 
                                           </div>
                                      </div>
                                      <div class="form-group">
                                           <label for="col-sm-2 control-label">Select Category</label>
                                           <div class="col-sm-10">
                                               <select class="form-control" name="category_id">
                                                      @foreach($categories as $category)
                                                                <option value="{{$category->id}}">{{$category->title}}</option>
                                                      @endforeach      
                                               </select>
                                           </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="col-sm-8 col-sm-offset-5">
                                               <button class="btn btn-info btn-lg" type="submit">Save Now</button>
                                          </div>
                                      </div><!--form-group-->
                                   </div><!--panel-body-->
                                </div><!--hpanel-->
                              </div><!--col-lg-12-->
                          </form>       
                        </div><!--row-->
                    </div><!--table-responsive m-t-->
                </div><!--panel-body p-xl-->
            </div><!--hpanel-->
        </div><!--col-lg-12-->
    </div><!--row-->
</div><!--content animate-panel-->
@endsection




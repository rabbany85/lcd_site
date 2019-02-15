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
            </div>
            <h2 class="font-light m-b-xs">
                <p>Please make sure you are selecting the right category when editing.</p> 
            </h2>
            <small>Edit Category Information</small>
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
                                   <h4>iMetroTech <small>Edit Category Information</small></h4>
                              </div>
                              <div class="col-md-6">
                              </div>
                         </div>
                    </div>
                    
<div class="panel-body p-xl">
    <div class="table-responsive m-t">
        <div class="row">
            @include('layouts.errors')
            <form method="POST" class="form-horizontal" action="{{ route('category.edit', ['category' => $category->id]) }}">
                {{ csrf_field() }}
                <div class="col-lg-12">
                    <div class="hpanel">
                        <div class="panel-body">
                            <h3 class="text-center">Edit Category</h3>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Title</label>
                                <div class="col-sm-10">
                                    <input id="title" type="text" name="title" value="{{$category->title}}" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Category Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="description" rows="8" cols="50">{{$category->description}}</textarea> 
                                </div>
                            </div>
                            <div class="form-group">
                               <div class="col-sm-8 col-sm-offset-5">
                                    <button class="btn btn-primary" type="submit">Update</button>
                               </div>
                          </div>
                        </div><!--panel-body-->
                      </div><!--hpanel-->
                    </div><!--col-->
                  </form>
                </div><!--Row-->
              </div><!--table-responsive m-t-->
            </div><!--panel-body p-xl-->
          </div><!--hpanel-->
        </div><!--col-lg-12-->
      </div><!--row-->
    </div><!--content animate-panel-->
@endsection




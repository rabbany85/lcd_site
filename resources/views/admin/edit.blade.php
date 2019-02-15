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
                <p>The road to success and the road to failure are almost exactly the same.</p> 
            </h2>
            <small>Edit Admin's Information</small>
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
                                   <h4>iMetroTech <small>Edit Admin's Information</small></h4>
                              </div>
                              <div class="col-md-6">
                              </div>
                         </div>
                    </div>
                    
<div class="panel-body p-xl">
    <div class="table-responsive m-t">
        <div class="row">
            @include('layouts.errors')
            <form method="POST" class="form-horizontal" action="{{route('admin.edit', ['admin' => $admin->id])}}">
                   {{ csrf_field() }}
                   <div class="col-lg-12">
                        <div class="hpanel">
                             <div class="panel-body">
                                  <h3 class="text-center">Edit Admin</h3>
                                  <div class="hr-line-dashed"></div>
                                      <div class="form-group">
                                          <label class="col-sm-2 control-label">Title</label>
                                          <div class="col-sm-10">
                                               <input id="title" type="text" name="title" value="{{ $admin->title }}" class="form-control" required>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 control-label">First Name(s)</label>
                                          <div class="col-sm-10">
                                               <input id="name" type="text" name="name" value="{{ $admin->name }}" class="form-control" required>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 control-label">Last Name</label>
                                          <div class="col-sm-10">
                                               <input id="last_name" type="text" name="last_name" value="{{ $admin->last_name }}" class="form-control" required>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 control-label">Address Line 1</label>
                                          <div class="col-sm-10">
                                               <input id="address_line1" type="text" name="address_line1" value="{{ $admin->address_line1 }}" class="form-control" required>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 control-label">Address Line 2</label>
                                          <div class="col-sm-10">
                                               <input id="address_line2" type="text" name="address_line2" value="{{ $admin->address_line2 }}" class="form-control" required>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 control-label">City</label>
                                          <div class="col-sm-10">
                                               <input id="city" type="text" name="city" value="{{ $admin->city }}" class="form-control" required>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 control-label">Country</label>
                                          <div class="col-sm-10">
                                               <input id="country" type="text" name="country" value="{{ $admin->country }}" class="form-control" required>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 control-label">Post Code</label>
                                          <div class="col-sm-10">
                                               <input id="postcode" type="text" name="postcode" value="{{ $admin->postcode }}" class="form-control" required>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 control-label">Phone Number</label>
                                          <div class="col-sm-10">
                                               <input id="phone" type="text" name="phone" value="{{ $admin->phone }}" class="form-control" required>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 control-label">E-mail Address</label>
                                          <div class="col-sm-10">
                                               <input id="email" type="text" name="email" value="{{ $admin->email }}" class="form-control" required>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="col-sm-8 col-sm-offset-5">
                                               <button class="btn btn-info btn-lg" type="submit">Update</button>
                                          </div>
                                      </div><!--form-group-->
                                   </div><!--panel-body-->
                                </div><!--hpanel-->
                              </div><!--col-lg-12-->
                          </form>   
                      </div><!--Row-->
                    </div><!--table-responsive m-t-->
                  </div><!--panel-body p-xl-->
                </div><!--hpanel-->
              </div><!--col-lg-12-->
            </div><!--row-->
          </div><!--content animate-panel-->
@endsection




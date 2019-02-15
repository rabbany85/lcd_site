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
                    <li class="active"><span>Admin's Details</span></li>
                </ol>
            </div>
            <h2 class="font-light m-b-xs">Name: {{$admin->title}} {{$admin->name}} {{$admin->last_name}}</h2>
            <small>Admin's Information</small>
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
                            <h4>iMetroTech <small>Admin's Information</small></h4>
                        </div>
                        <div class="col-md-6"></div>
                    </div>
                </div>
                <div class="panel-body p-xl">
                    <div class="row m-b-xl">
                        <div class="col-sm-6"><h4>Admin's Details</h4></div>
                        <div class="col-sm-6 text-right">
                            <address>
                                <strong>User ID: {{$admin->id}}</strong><br>
                                Last Update: 
                                <strong>
                                    @if($admin->created_at != null)
                                    {{$admin->created_at->format('d M Y')}}
                                    @endif
                                </strong><br>
                            </address>
                        </div>
                    </div>
                    <div class="table-responsive m-t">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <tr>
                                       <td><div><strong>{{$admin->title}} 
                                                        {{$admin->name}} 
                                                        {{$admin->last_name}}
                                                </strong></div>
                                       </td>
                                       <td>{{$admin->address_line1}},
                                            {{$admin->address_line2}}, 
                                            {{$admin->city}}, 
                                            {{$admin->country}}, 
                                            {{$admin->postcode}}
                                        </td>
                                        <td>{{ $admin->email }}</td>
                                        <td>{{ $admin->phone }}</td>
                                    </tr>
                            </tbody>
                        </table>
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
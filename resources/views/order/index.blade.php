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
                        <li>
                            <span>Tables</span>
                        </li>
                        <li class="active">
                            <span>Order History</span>
                        </li>
                    </ol>
                </div>
                <h2 class="font-light m-b-xs">
                    Order History
                </h2>
                <small>You can claim for a refund for a vaild reason. If you are not happy, please tell us why. We will do our best to resolve the issue. Your happiness is our success.</small>
            </div>
        </div>
    </div>

<div class="content animate-panel">
    <div class="row">
        <div class="col-lg-12">
            <div class="hpanel">
                <div class="panel-heading">
                    <div class="panel-tools">
                        <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                        <a class="closebox"><i class="fa fa-times"></i></a>
                    </div>
                    Order List
                    @if ($errors->any())
                            <div class="alert alert-danger">
                                 <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                 </ul>
                            </div>
                        @endif
                </div>
                <div class="panel-body">
                <table id="example2" class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>Order Number</th>
                    <th>Customer Name</th>
                    <th>Amount</th>
                    <th>Date & Time</th>
                    <th>Details</th>
                    <th>Tracking Number</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->user->title}} {{$order->user->last_name}}</td>
                    <td>£{{$order->total}}</td>
                    <td>{{$order->created_at}}</td>
                    <td>
                        <a href="{{ route('order.single', ['id' => $order->id]) }}">
                        <button type="button" class="btn btn-default btn-block">
                                Details
                        </button>
                        </a>
                    </td>
                    <td>
                        @if($order->tracking_number == NULL)
                            @if(Auth::user()->user_type == 'Client')
                               Processing...
                            @else
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                             <form action="{{route('order.tracking')}}" method="post">
                                @csrf
                              <div class="form-group">
                                <input type="text" class="form-control" placeholder="Enter Tracking Number" name="tracking_number">
                                <input type="hidden" name="id" value="{{ $order->id }}">
                              </div>
                              <button type="submit" class="btn btn-primary">Save Tracking Number</button>
                            </form> 
                            @endif
                            @else {{ $order->tracking_number }}
                        @endif    
                    </td>
                </tr>
                @endforeach
                </tbody>
                </table>

                </div>
            </div>
        </div>

    </div>
    </div>

@endsection

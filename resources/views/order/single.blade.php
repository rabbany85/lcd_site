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
                        <span>App views</span>
                    </li>
                    <li class="active">
                        <span>Order Details</span>
                    </li>
                </ol>
            </div>
                
            
            <small>Order and Customer Information</small>
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
                            <h4>iMetroTech <small>Order Information</small></h4>
                        </div>
                        <div class="col-md-6">
                            

                        </div>
                    </div>
                </div>
                <div class="panel-body p-xl">
                    <div class="row m-b-xl">
                        <div class="col-sm-6">
                            <h4>Customer Details</h4>

                            <address>
                                <strong>
                                    {{$order->user->name}} 
                                    {{$order->user->last_name}}
                                </strong><br>
                                {{$order->user->address_line1}}<br>
                                {{$order->user->address_line2}}<br>
                                City: {{$order->user->city}}<br>
                                Post Code:{{$order->user->postcode}}<br>
                                Country: {{$order->user->country}}<br>
                                <abbr title="Phone">Phone:</abbr> {{$order->user->phone}}<br>
                            </address>
                        </div>
                        <div class="col-sm-6 text-right">
                            <address>
                                <strong>Order Number: {{$order->id}}</strong><br>
                                Date of purchase: <strong>{{$order->created_at->format('d M Y')}}</strong><br>
                                Tracking Number: 


                @if($order->tracking_number == NULL && Auth::user()->user_type == 'Client')
                        Processing...
                @endif
                @if($order->tracking_number != NULL && Auth::user()->user_type == 'Client')
                        {{ $order->tracking_number }}
                @endif
                @if(Auth::user()->user_type != 'Client')
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
                                <input type="text" class="form-control" name="tracking_number" value="{{ $order->tracking_number }}">
                                <input type="hidden" name="id" value="{{ $order->id }}">
                            </div>
                              <button type="submit" class="btn btn-primary">Update Tracking Number</button>
                            </form> 
                        @endif
                



                            </address>
                        </div>
                    </div>

                    <div class="table-responsive m-t">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Item List</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Delivery Charge</th>
                                <th>Total Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $total = 0;?>    
                            @foreach($order_details as $order_info) 
                            <?php
                              $unit_total = $order_info->qty * $order_info->price; 
                              $total +=  $unit_total;
                            ?>  
                            <tr>
                                <td>
                                    <div><strong>{{$order_info->product_title}}</strong></div>
                                </td>
                                <td>{{ $order_info->qty }}</td>
                                <td>£{{ $order_info->price }}</td>
                                <td>£{{ $order->delivery_charge }}</td>
                                <td>£{{ $unit_total }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row m-t">
                        <div class="col-md-4 col-md-offset-8">
                            <table class="table table-striped text-right">
                                <tbody>
                                <tr>
                                    <td><strong>Sub Total :</strong></td>
                                    <td>£{{$total}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Delivery Charge :</strong></td>
                                    <td>£{{ $order->delivery_charge }}</td>
                                </tr>
                                <tr>
                                    <td><strong>TOTAL :</strong></td>
                                    <td>£{{ $total += $order->delivery_charge }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


</div>

   @endsection
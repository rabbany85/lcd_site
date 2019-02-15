@extends('layouts.master')



@section('mainContent')


<?php
      $cart_delivery_charge = 0;
      $cart_discount = 0;
 
if(Session::get('cartDiscount')){
  $cart_discount = Session::get('cartDiscount');
  }
              
if(Session::get('deliveryCharge')){
  $cart_delivery_charge = Session::get('deliveryCharge');
  }

?>


<!-- BREADCRUMBS -->
		<section class="breadcrumb parallax margbot30"></section>
		<!-- //BREADCRUMBS -->
		
		
		<!-- PAGE HEADER -->
		<section class="page_header">
			
			<!-- CONTAINER -->
			<div class="container">
				<h3 class="pull-left"><b>Shopping bag</b></h3>
				
				<div class="pull-right">
					<a href="women.html" >Back to shop<i class="fa fa-angle-right"></i></a>
				</div>
			</div><!-- //CONTAINER -->
		</section><!-- //PAGE HEADER -->
		
		
		<!-- SHOPPING BAG BLOCK -->
		<section class="shopping_bag_block">
			
			<!-- CONTAINER -->
			<div class="container">
			
				<!-- ROW -->
				<div class="row">
					
					<!-- CART TABLE -->
					<div class="col-lg-9 col-md-9 padbot40">
						
						<table class="shop_table">
							<thead>
								<tr>
									<th class="product-thumbnail"></th>
									<th class="product-name">Item</th>
									<th class="product-price">Price</th>
									<th class="product-quantity">Quantity</th>
									<th class="product-subtotal">Total</th>
									<th class="product-remove"></th>
								</tr>
							</thead>
							<tbody>

@foreach(Cart::content() as $row)

								<tr class="cart_item">
									<td class="product-thumbnail"><a href="product-page.html" ><img src="images/tovar/women/1.jpg" width="100px" alt="" /></a></td>
									<td class="product-name">
										<a href="product-page.html">{{$row->name}}</a>
										<ul class="variation">
											<li class="variation-Color">Color: <span>Brown</span></li>
											<li class="variation-Size">Size: <span>XS</span></li>
										</ul>
									</td>

									<td class="product-price">£{{$row->price}}</td>

									<td class="product-quantity">
										
					

<form action="{{URL::to('updateQuantity')}}" method="post">
      {{ csrf_field() }}
      <select class="basic" name="quantity" type="text" value="{{$row->qty}}" size="4" maxlength="4">
              <option value="">2</option>
	          <option>1</option>
	          <option>2</option>
	          <option>3</option>
	          <option>4</option>
			  <option>5</option>
	  </select>
      <input name="rowId" type="hidden" value="{{$row->rowId}}">
      <!-- <input type="submit" value="change"> -->
  </form>
											
									</td>
									
									<td class="product-subtotal">£{{$row->total}}</td>

									<td class="product-remove"><a href="javascript:void(0);" ><span>Delete</span> <i>X</i></a></td>
								</tr>
								
@endforeach
								
							</tbody>
						</table>
					</div><!-- //CART TABLE -->
					
					
					<!-- SIDEBAR -->
					<div id="sidebar" class="col-lg-3 col-md-3 padbot50">
						
						<!-- BAG TOTALS -->
						<div class="sidepanel widget_bag_totals">
							<h3>BAG TOTALS</h3>
							<table class="bag_total">
								<tr class="cart-subtotal clearfix">
									<th>Sub total</th>
									<td>£{{Cart::subtotal()}}</td>
								</tr>
								<tr class="shipping clearfix">
									<th>DELIVERY CHARGE</th>
									<td>£{{$cart_delivery_charge}}</td>
								</tr>
								<tr class="total clearfix">
									<th>Total</th>
									<td>£{{Cart::total()}}</td>
								</tr>
							</table>
							{!! Form::open(array('route' => 'getCheckout')) !!}
                		{!! Form::hidden('type','advance') !!}
                		{!! Form::hidden('pay',68) !!}
	                <div class="db-pricing-eleven db-bk-color-three">
	                    <div class="price">
	                        <sup>$</sup>68
	                                <small>per quarter</small>
	                    </div>
	                    <div class="type">
	                        ADVANCE PLAN
	                    </div>
	                    <ul>
	                        <li><i class="glyphicon glyphicon-print"></i>30+ Accounts </li>
	                        <li><i class="glyphicon glyphicon-time"></i>150+ Projects </li>
	                        <li><i class="glyphicon glyphicon-trash"></i>Lead Required</li>
	                    </ul>
	                    <div class="pricing-footer">
	                        <button class="btn db-button-color-square btn-lg">BOOK ORDER</button>
	                    </div>
	                </div>
	                {!! Form::close() !!}

                         
						</div><!-- //REGISTRATION FORM -->
					</div><!-- //SIDEBAR -->
				</div><!-- //ROW -->
			</div><!-- //CONTAINER -->
		</section><!-- //SHOPPING BAG BLOCK -->
				



@endsection
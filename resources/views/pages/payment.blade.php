@extends('layouts.master')

@section('mainContent')

        <!-- BREADCRUMBS -->
		<section class="breadcrumb parallax margbot30"></section>
		<!-- //BREADCRUMBS -->
		
		
		<!-- PAGE HEADER -->
		<section class="page_header">
			     <!-- CONTAINER -->
			     <div class="container">
				      <h3 class="pull-left"><b>Shopping bag</b></h3>		
				      <div class="pull-right">
					       <a href="{{ URL::to('categoryList') }}" >Back to shop<i class="fa fa-angle-right"></i></a>
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
									<th class="product-name">Item</th>
									<th class="product-price">Price</th>
									<th class="product-quantity">Quantity</th>
									<th class="product-subtotal">Total</th>
								</tr>
							</thead>
							<tbody>
                                  
		          @foreach(Cart::content() as $row)							                   
		              <tr class="cart_item">
				          <td class="product-name">
							  <a href="product-page.html">{{$row->name}}</a>
						  </td>
						  <td class="product-price">£{{$row->price}}</td>
						  <td class="product-quantity">{{$row->qty}}</td>
						   <td class="product-subtotal">£{{$row->total}}</td>
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
									<td>£{{Session::get('deliveryCharge')}}</td>
								</tr>
								<tr class="total clearfix">
									<th>Total</th>
									<td>£{{Cart::total()}}</td>
								</tr>
							</table>
							<form class="coupon_form" action="javascript:void(0);" method="get">
								<input type="text" name="coupon" value="Have a coupon?" onFocus="if (this.value == 'Have a coupon?') this.value = '';" onBlur="if (this.value == '') this.value = 'Have a coupon?';" />
								<input type="submit" value="Apply">
							</form>
							 <div id="paypal-button-container"></div>
							  
							<a class="btn inactive" href="{{ URL::to('categoryList') }}" >Continue shopping</a>
						</div><!-- //REGISTRATION FORM -->
					</div><!-- //SIDEBAR -->
				</div><!-- //ROW -->
			</div><!-- //CONTAINER -->
		</section><!-- //SHOPPING BAG BLOCK -->
				

<script>
  paypal.Buttons({
    createOrder: function(data, actions) {
      return actions.order.create({
      	purchase_units: [{
          amount: {
            value: '{{Cart::total()}}'
          }
        }]
      });
    },
    onApprove: function(data, actions) {
    	return actions.order.capture().then(function(details) {
        return actions.redirect('paymentExecute');
      });
    }
  }).render('#paypal-button-container');
</script>
@endsection


		
		            
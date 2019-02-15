@extends('layouts.master')

@section('mainContent')


<?php
      $cart_delivery_charge = 0;
      $cart_discount = 0;
      $i = 0; 
      $product_id_array = '';		

      if(Session::get('cartDiscount')){
         $cart_discount = Session::get('cartDiscount');
        }
      if(Session::get('deliveryCharge')){
         $cart_delivery_charge = Session::get('deliveryCharge');
        }

       $pp_checkout_btn = '<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                           <input type="hidden" name="cmd" value="_cart">
                           <input type="hidden" name="upload" value="1">
                           <input type="hidden" name="business" value="shomit011@yahoo.com">';
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
									<th class="product-quantity">Update</th>
									<th class="product-subtotal">Total</th>
									<th class="product-remove">Remove</th>
								</tr>
							</thead>
							<tbody>
                                  

                                  
     @foreach(Cart::content() as $row)							                   
              <tr class="cart_item">
	              <td class="product-thumbnail">
	              	  <a href="product-page.html" ><img src="images/tovar/women/1.jpg" width="100px" alt="" /></a>
	              </td>
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
                          <input name="rowId" type="hidden" value="{{$row->rowId}}">
						  <input type="text" name="quantity" value="{{$row->qty}}">  
                           </td><td class="product-quantity">
                           <input type="submit" value="Update">
                       </form>
                   </td>
				   <td class="product-subtotal">£{{$row->total}}</td>
                   <td class="product-remove"><a href="{{URL::to('removeFromCart/'.$row->rowId)}}" ><span>Remove</span> <i>X</i></a></td>
               </tr>
			   <?php  
			        $i++;
					$pp_checkout_btn .= '<input type="hidden" name="item_name_' . $i . '" value="' . $row->name . '">
                                         <input type="hidden" name="amount_' . $i . '" value="' . $row->price . '">
                                         <input type="hidden" name="quantity_' . $i . '" value="' . $row->qty. '">  ';

                    $product_id_array .= $row->id.'-'.$row->qty;
                ?>
       @endforeach
	   
	   <?php
	        $pp_checkout_btn .= '<input type="hidden" name="custom" value="' . $product_id_array . '">
	                             <input type="hidden" name="notify_url" value="http://imetrotech.co.uk/responce_return">
	                             <input type="hidden" name="return" value="http://imetrotech.co.uk/checkout_success">
	                             <input type="hidden" name="rm" value="2">
	                             <input type="hidden" name="cbt" value="RETURN to Shop">
	                             <input type="hidden" name="cancel_return" value="http://imetrotech.co.uk/checkout_failed">
	                             <input type="hidden" name="lc" value="UK">
	                             <input type="hidden" name="currency_code" value="GBP">
	                             <input type="image" src="http://www.paypal.com/en_US/i/btn/x-click-but01.gif" name="submit" alt="Make payments with     PayPal - its fast, free and secure!">
	                             </form>';
	    ?>





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
							<form class="coupon_form" action="javascript:void(0);" method="get">
								<input type="text" name="coupon" value="Have a coupon?" onFocus="if (this.value == 'Have a coupon?') this.value = '';" onBlur="if (this.value == '') this.value = 'Have a coupon?';" />
								<input type="submit" value="Apply">
							</form>
							<a class="btn active" href="{{URL::to('payPremium')}}" ><?php echo $pp_checkout_btn; ?></a>
							<a class="btn inactive" href="{{URL::to('checkout_success')}}" >Continue shopping</a>
						</div><!-- //REGISTRATION FORM -->
					</div><!-- //SIDEBAR -->
				</div><!-- //ROW -->
			</div><!-- //CONTAINER -->
		</section><!-- //SHOPPING BAG BLOCK -->
				



@endsection


		
		            
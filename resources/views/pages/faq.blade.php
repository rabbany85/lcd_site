@extends('layouts.master')
@section('mainContent')



		<!-- BREADCRUMBS -->
		<section class="breadcrumb parallax margbot30"></section>
		<!-- //BREADCRUMBS -->
		
		
		<!-- PAGE HEADER -->
		<section class="page_header">
			
			<!-- CONTAINER -->
			<div class="container">
				<h3 class="pull-left"><b>FAQ Page</b></h3>
				
				<div class="pull-right">
					<a href="{{URL::to('categoryList')}}" >Back to shop<i class="fa fa-angle-right"></i></a>
				</div>
			</div><!-- //CONTAINER -->
		</section><!-- //PAGE HEADER -->
		

<section class="faq_page">
			
			<!-- CONTAINER -->
			<div class="container">
			
				<!-- ROW -->
				<div class="row">
					
					<!-- FAQ BLOCK -->
					<div class="col-lg-9 col-md-9 col-sm-9 padbot30">
						<div class="title2">
							<h2>How does it work?</h2>
							<p>We always Try our best and work Hard to establish a foundation of trust with our clients and customers to Refurbish and Recycle a used Screen/LCD in order to Reduce the amount of electronic waste and Prevent Environment Pollution. We are committed to achieve these Goals with all the stakeholders of our business by protecting the Environment, Giving the best possible Customer Service and a Fair Deal for all the financial transaction (Buying and Selling), Helping to Create more jobs for the Area we based in and Paying back to the Society in the form of Tax retune. To do so we test everything that comes in or we send to in order to ensure you are paid exactly what you deserve and receiving the quality product.</p>
						</div>
						
						<!-- Accordion -->
						<div id="accordion">
							
							<h4 class="accordion_title">Do I have to register before I can shop?</h4>
							<div class="accordion_content">
								<p>You can browse the shop and add to your basket before you've registered with us.</p>
							</div>
							
							<h4 class="accordion_title">What is the minimum basket charge?</h4>
							<div class="accordion_content">
								<p>There is no minimum basket charge.</p>
							</div>
							
							<h4 class="accordion_title">What payment methods do you accept?</h4>
							<div class="accordion_content">
								<p>We are working on to accept: Visa, MasterCard, Visa Delta, Visa Debit and American Express. Now, You can only pay with PayPal.</p>
							</div>
							
							<h4 class="accordion_title">How do I know if my order has been placed?</h4>
							<div class="accordion_content">
								<p>You will see order confirmation page once you have successfully placed your order. Also a confirmation of your order will be sent to your email address.</p>
							</div>
							
							<h4 class="accordion_title">How is my order confirmed?</h4>
							<div class="accordion_content">
								<p>Once you have checked out, you will receive a confirmation e-mail, detailing all the products, quantities and guide prices in your order. If you have any queries about out of stock items, you can ask us.</p>
							</div>
							
							<h4 class="accordion_title">My order is not really up to scratch</h4>
							<div class="accordion_content">
								<p>If you find that any of our products are faulty from purchase, you will need to call us and explain the unsuitableness of the items that were purchased.</p>
							</div>
							
							<h4 class="accordion_title">I accidently ordered an item twice, what should I do?</h4>
							<div class="accordion_content">
								<p>Please immediately contact us, so the issue can be rectified.</p>
							</div>
							
							<h4 class="accordion_title">My order has been rejected and I don't know what to do?</h4>
							<div class="accordion_content">
								<p>There is no reason for your order to be rejected unless there is a problem with your payment. Please check with your bank or use different form of payment.</p>
							</div>
							
							
							<h4 class="accordion_title">I am not happy about my last order?</h4>
							<div class="accordion_content">
								<p>Please contact us as soon as possible. We will make sure, you are happy.</p>
							</div>
							
							<h4 class="accordion_title">I have a problem with my current order?</h4>
							<div class="accordion_content">
								<p>If  you are having problems with your order please contact the us directly.</p>
							</div>
							
							
							<h4 class="accordion_title">What if my payment has failed?</h4>
							<div class="accordion_content">
								<p>If your payment was not successful that means your order was not placed. Please contact your bank or try using another form of payment for authorisation. If both avenues prove unsuccessful then please contact our support team for further assistance.</p>
							</div>
							<h4 class="accordion_title">What if my delivery is late?</h4>
							<div class="accordion_content">
								<p>Delays sometimes happen when the circumstances beyond our control. If you still can't find out where your order is you can contact one of our support team.</p>
							</div>
							<h4 class="accordion_title">Who can sign and collect for delivery?</h4>
							<div class="accordion_content">
								<p>Anyone in the household over the age of 18 may sign for deliveries.</p>
							</div>
							<h4 class="accordion_title">What if I have missing items?</h4>
							<div class="accordion_content">
								<p>If you find have an item missing from your delivery, please call our support team.</p>
							</div>
							<h4 class="accordion_title">What time do you deliver until?</h4>
							<div class="accordion_content">
								<p>We deliver 24hours, 7 days a week.</p>
							</div>
						</div><!-- //Accordion -->
						
					</div><!-- //FAQ BLOCK -->
					
					
					<!-- SIDEBAR -->
					<div id="sidebar" class="col-lg-3 col-md-3 col-sm-3 padbot50">
						
						<!-- CATEGORIES -->
						<div class="sidepanel widget_categories">
							<h3>Sidebar Menu</h3>
							<ul>
								<li><a href="{{ URL::to('/') }}" >Home</a></li>
		                        <li><a href="{{ URL::to('faq') }}" >FAQ</a></li>
		                        <li><a href="{{ URL::to('contactUs') }}" >Contact</a></li>
		                        <li><a href="{{ URL::to('categoryList') }}" >Products</a></li>
							</ul>
						</div><!-- //CATEGORIES -->
						
						
						
						<!-- BANNERS WIDGET -->
						<div class="widget_banners">
							<div class="sidepanel widget_categories">
							 <a class="banner nobord" href="javascript:void(0);" ><img src="{{asset('site/images/banner/21.jpg')}}" alt="" /></a>
						</div>
						</div><!-- //BANNERS WIDGET -->
					</div><!-- //SIDEBAR -->
				</div><!-- //ROW -->
			</div><!-- //CONTAINER -->
		</section><!-- //FAQ PAGE -->
		

	

@endsection
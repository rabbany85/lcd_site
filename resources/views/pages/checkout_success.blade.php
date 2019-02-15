@extends('layouts.master')
@section('mainContent')
<!-- UPDATE PAGE -->
		<section class="update_page parallax">
			
			<!-- CONTAINER -->
			<div class="container">
				<div class="update_wrapper">
					<h1>Thank you</h1>
					<h2>Your payment was successful.</h2>
					<p>We will dispuch your products shortly.</p>
					<a href="{{URL::to('customerLoginForm')}}">
					   <button type="button" class="btn btn-default">Profile</button>
				    </a>
				    <a href="{{URL::to('categoryList')}}">
				       <button type="button" class="btn btn-success">Continue Shopping</button>
				    </a>
				    <a href="{{URL::to('customerLogout')}}">
                       <button type="button" class="btn btn-primary">Logout</button>
                    </a>
                    
				</div>
			</div><!-- //CONTAINER -->
		</section><!-- //UPDATE PAGE -->
		

@endsection
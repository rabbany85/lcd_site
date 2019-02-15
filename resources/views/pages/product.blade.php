@extends('layouts.master')
@section('mainContent')

<section class="breadcrumb parallax margbot30"></section>
		<section class="tovar_details padbot70">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-3 sidebar_tovar_details">
						<h3><b>Product Information</b></h3>
						<p>{{$product->description}}</p>
					</div>
					<div class="col-lg-9 col-md-9 tovar_details_wrapper clearfix">
						<div class="tovar_details_header clearfix margbot35">
							<h3 class="pull-left"><b>{{$product->title}}</b></h3>
							<div class="tovar_details_pagination pull-right">
								<a class="fa fa-angle-left" href="javascript:void(0);" ></a>
								<span>2 of 34</span>
								<a class="fa fa-angle-right" href="javascript:void(0);" ></a>
							</div>
						</div>
						<!-- CLEARFIX -->
						<div class="clearfix padbot40">
							<div class="tovar_view_fotos clearfix">
								<div id="slider2" class="flexslider">
									<ul class="slides">
										@foreach($product->media as $image)
										<li><a href="javascript:void(0);" ><img src="{{ asset($image->url) }}" alt="Image not found" /></a></li>
										@endforeach
									</ul>
								</div>
								<div id="carousel2" class="flexslider">
									<ul class="slides">
										@foreach($product->media as $image)
										<li><a href="javascript:void(0);" ><img src="{{ asset($image->url) }}" alt="Image not found" /></a></li>
										@endforeach
									</ul>
								</div>
							</div>	
							<div class="tovar_view_description">
								<div class="tovar_view_title">{{$product->title}}</div>
								<div class="clearfix tovar_brend_price">
									<div class="pull-right tovar_view_price">£{{$product->price}}</div>
								</div>
								<div class="tovar_view_btn">
									<div class="alert alert-success" style="display:none"></div>
									<form class="form-inline" id="addToBasketForm" method="post">
										@csrf
										<input type="hidden" id="id" value="{{$product->id}}" >
										<label for="quantity">Quantity:</label>
										<input type="text" id="quantity" value="1" class="form-control">
										<input type="submit" class="fa fa-shopping-cart" value="Add Now" class="form-control">
									</form>										
								</div>
								<div class="tovar_shared clearfix">
									<p>Share item with friends</p>
									<ul>
										<li><a class="facebook" href="javascript:void(0);" ><i class="fa fa-facebook"></i></a></li>
										<li><a class="twitter" href="javascript:void(0);" ><i class="fa fa-twitter"></i></a></li>
										<li><a class="linkedin" href="javascript:void(0);" ><i class="fa fa-linkedin"></i></a></li>
										<li><a class="google-plus" href="javascript:void(0);" ><i class="fa fa-google-plus"></i></a></li>
										<li><a class="tumblr" href="javascript:void(0);" ><i class="fa fa-tumblr"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="tovar_information">
							<ul class="tabs clearfix">
								<li class="current">Details</li>
								<li>Information</li>
								<li>Refund Policy</li>
							</ul>
							<div class="box visible">
								<p> {{$product->description}} </p>
							</div>
							<div class="box">
							     <p>{{$product->description}}</p>
							</div>
							<div class="box">
								If you are not happy with our product, you can return it to us within 28 days. We will update our site with our refund policy soon.
							</div>
						</div><!-- //TOVAR INFORMATION -->
					</div><!-- //TOVAR DETAILS WRAPPER -->
				</div><!-- //ROW -->
			</div><!-- //CONTAINER -->
		</section><!-- //TOVAR DETAILS -->
		

		
		
@endsection
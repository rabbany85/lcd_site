@extends('layouts.master')
@section('mainContent')

<!-- BREADCRUMBS -->
<section class="breadcrumb men parallax margbot30">
	<div class="container">
		<h2>Our Products</h2>
	</div><!-- //CONTAINER -->
</section><!-- //BREADCRUMBS -->
		<section class="shop">
			<div class="container">
				<div class="row">
					<div id="sidebar" class="col-lg-3 col-md-3 col-sm-3 padbot50">
						<div class="sidepanel widget_categories">
							<h3>Product Categories</h3>
							<ul>
								@foreach($categories as $category)
								<li><a href="{{URL::to('productList/'.$category->id)}}'">{{$category->title}}</a></li>
								@endforeach
							</ul>
						</div>
						<div class="sidepanel widget_categories">
							 <a class="banner nobord" href="javascript:void(0);" ><img src="{{asset('site/images/banner/21.jpg')}}" alt="" /></a>
						</div>
					</div>
					<!-- //SIDEBAR -->
					<!-- SHOP PRODUCTS -->
					<div class="col-lg-9 col-sm-9 padbot20">
			         <h2>
                         @if(Session::get('addedToBasket'))
                            
                              {{Session::get('addedToBasket')}}
                            
                          @endif
                      </h2>
						<!-- SHOP BANNER -->
						<div class="banner_block margbot15">
							<a class="banner nobord" href="javascript:void(0);" ><img src="{{asset('site/images/banner/10.jpg')}}" alt="" /></a>
						</div><!-- //SHOP BANNER -->
						
						<!-- SORTING TOVAR PANEL -->
						<div class="sorting_options clearfix">
							
							<!-- COUNT TOVAR ITEMS -->
							<div class="count_tovar_items">
								<p>Total</p>
								<span>{{ $products->count() }} Items</span>
							</div><!-- //COUNT TOVAR ITEMS -->
							
							<!-- TOVAR FILTER -->
							<div class="product_sort">
								<p>SORT BY</p>
								<select class="basic">
									<option value="">Popularity</option>
									<option>Reting</option>
									<option>Date</option>
								</select>
							</div><!-- //TOVAR FILTER -->
							
							<!-- PRODUC SIZE -->
							<div id="toggle-sizes">
								<a class="view_box active" href="javascript:void(0);"><i class="fa fa-th-large"></i></a>
								<a class="view_full" href="javascript:void(0);"><i class="fa fa-th-list"></i></a>
							</div><!-- //PRODUC SIZE -->
						</div><!-- //SORTING TOVAR PANEL -->
						
						
						<!-- ROW -->
						<div class="row shop_block">	
							@foreach($products as $product)	
							<!-- TOVAR1 -->
							<div class="tovar_wrapper col-lg-4 col-md-4 col-sm-6 col-xs-6 col-ss-12 padbot40">
								<div class="tovar_item clearfix">
								 <a href="{{URL::to('singleProduct/'.$product->id)}}">
	                                <div class="well well-lg">
	                                	@if($product->media->first())
	                                	<img src="{{ asset($product->media->first()->url)}}" style="width: 150px; height: 150px;">
	                                	@endif
	                                	<div class="tovar_description clearfix">
											<span class="tovar_title">{{$product->title}}</span>
											<span class="tovar_price">£{{$product->price}}</span>
										</div>
	                                </div>
                                 </a>	
							   </div>
							</div><!-- //TOVAR1 -->
							@endforeach	
						</div><!-- //ROW -->
						<div class="clearfix">
							<!-- PAGINATION -->
							<ul class="pagination">
								{{$products->links()}}
							</ul><!-- //PAGINATION -->
						</div>
						<hr>
						<!-- SHOP BANNER -->
						<div class="row top_sale_banners center">
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-ss-12"><a class="banner nobord margbot30" href="javascript:void(0);" ><img src="{{URL::asset('site/images/banner')}}/6.jpg" alt="" /></a></div>
							<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 col-ss-12"><a class="banner nobord margbot30" href="javascript:void(0);" ><img src="{{URL::asset('site/images/banner')}}/12.jpg" alt="" /></a></div>
						</div><!-- //SHOP BANNER -->
					</div><!-- //SHOP PRODUCTS -->
				</div><!-- //ROW -->
			</div><!-- //CONTAINER -->
		</section><!-- //SHOP -->
			

@endsection
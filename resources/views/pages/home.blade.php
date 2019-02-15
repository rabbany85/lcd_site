@extends('layouts.master')



@section('mainContent')

<!-- SCHOOL SALE -->
		<section class="school_sale parallax margbot30">
			
			<!-- CONTAINER -->
			<div class="container">
				<div class="school_sale_description">
					<p>iMetroTech</p>
					<span>Broken LCD Buyer</span>
				</div>
			</div><!-- //CONTAINER -->
		</section><!-- //SCHOOL SALE -->
		

<!--This is Top sale Banner-->

<!-- BANNER SECTION -->
		<section class="banner_section">
			
			<!-- CONTAINER -->
			<div class="container" data-appear-top-offset='-100' data-animated='fadeInUp'>
			
				<!-- ROW -->
				<div class="row">
					<div class="top_sale_banners center">
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 col-ss-12 myTopSale"><a class="banner nobord margbot30" href="javascript:void(0);" ><img src="{{ asset('site/images/banner/3.jpg') }}" alt="IntShop Top Sate Image" /></a></div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-ss-12 myTopSale"><a class="banner nobord margbot30" href="javascript:void(0);" ><img src="{{ asset('site/images/banner/14.jpg') }}" alt="IntShop Top Sate Image"" /></a></div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 col-ss-12 myTopSale"><a class="banner nobord margbot30" href="javascript:void(0);" ><img src="{{ asset('site/images/banner/4.jpg') }}" alt="IntShop Top Sate Image"" /></a></div>
					</div>
				</div><!-- //ROW -->
			</div><!-- //CONTAINER -->
		</section><!-- //BANNER SECTION -->

	
@endsection
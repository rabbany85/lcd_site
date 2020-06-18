@extends('layouts.master')
@section('mainContent')



		<!-- BREADCRUMBS -->
		<section class="breadcrumb parallax margbot30"></section>
		<!-- //BREADCRUMBS -->
		
		
		<!-- PAGE HEADER -->
		<section class="page_header">
			
			<!-- CONTAINER -->
			<div class="container">
				<h3 class="pull-left"><b>Contacts</b></h3>
				
				<div class="pull-right">
					<a href="{{URL::to('categoryList')}}" >Back to shop<i class="fa fa-angle-right"></i></a>
				</div>
			</div><!-- //CONTAINER -->
		</section><!-- //PAGE HEADER -->
		
		
		<!-- CONTACTS BLOCK -->
		<section class="contacts_block">
			
			<!-- CONTAINER -->
			<div class="container">
				
				<!-- ROW -->
				<div class="row padbot30">
					<div class="col-lg-9 col-md-9 padbot30">
						<div id="map">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2481.185694311576!2d0.025116515771420222!3d51.54649387964153!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a7bccce4cc47%3A0xef3e2b04c575f7a1!2s316%20Romford%20Rd%2C%20Forest%20Gate%2C%20London%20E7%208BD!5e0!3m2!1sen!2suk!4v1592469919993!5m2!1sen!2suk" height="490" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

						</div>
					</div>
					
					<div class="col-lg-3 col-md-3 col-sm-6 padbot30">
						<ul class="contact_info_block">
							<li>
								<h3><i class="fa fa-map-marker"></i><b>Office locations</b></h3>
								<span>316 Romford road, Forest gate, E7 8BD</span>
							</li>
							<li>
								<h3><i class="fa fa-phone"></i><b>Phones</b></h3>
								<p class="phone">0752 691 3581</p>
							</li>
							<li>
								<h3><i class="fa fa-envelope"></i><b>E-mail</b></h3>
								<a href="mailto:info@imetrotech.co.uk">info@imetrotech.co.uk</a>

								<p>Returns and Refunds</p>
								<a href="mailto:info@imetrotech.co.uk">info@imetrotech.co.uk</a>
							</li>
						</ul>
					</div>
				</div><!-- //ROW -->
			</div><!-- //CONTAINER -->
		</section><!-- //CONTACTS BLOCK -->
		



@endsection
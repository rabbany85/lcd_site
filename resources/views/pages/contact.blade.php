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
					<a href="women.html" >Back to shop<i class="fa fa-angle-right"></i></a>
				</div>
			</div><!-- //CONTAINER -->
		</section><!-- //PAGE HEADER -->
		
		
		<!-- CONTACTS BLOCK -->
		<section class="contacts_block">
			
			<!-- CONTAINER -->
			<div class="container">
				
				<!-- ROW -->
				<div class="row padbot30">
					<div class="col-lg-6 col-md-6 padbot30">
						<div id="map">
<iframe height="490" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5016.623598168805!2d0.04830605628296791!3d51.55110949636015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a6538a9c21af%3A0xbd36175d6d542afc!2sRomford+Rd%2C+London+E12+5AJ!5e0!3m2!1sen!2suk!4v1526834068393" style="border:0" allowfullscreen></iframe>

						</div>
					</div>
					
					<div class="col-lg-3 col-md-3 col-sm-6 padbot30">
						<ul class="contact_info_block">
							<li>
								<h3><i class="fa fa-map-marker"></i><b>Office locations</b></h3>
								<p>Coming Soon</p>
								<span>698 Romford Road, London, E12 5AJ, UK,</span>
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
					
					<div class="col-lg-3 col-md-3 col-sm-6 padbot30">
						<!-- CONTACT FORM -->
						<div class="contact_form">
							<h3><b>Contacts form</b></h3>
							<p>Please share your thought with us.</p>
							@if ($errors->any())
                                 <div class="alert alert-danger">
                                      <ul>
                                          @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                          @endforeach
                                      </ul>
                                 </div>
                            @endif
							<div id="note"></div>
							<div id="fields">
								<form method="post" action="{{URL::to('contactSubmit')}}">
									{{csrf_field()}}
									<label>Name</label>
									<input type="text" name="name" placeholder="Name" />
									<label>E-mail</label>
									<input type="text" name="email" placeholder="E-mail" />
									<label>Subject</label>
									<input type="text" name="subject" placeholder="Subject" />
									<label>Message</label>
									<textarea name="message" placeholder="Message" ></textarea><br>
									<input class="btn active" type="submit" value="Send Message" />
								</form>
							</div>
						</div><!-- //CONTACT FORM -->
					</div>
				</div><!-- //ROW -->
			</div><!-- //CONTAINER -->
		</section><!-- //CONTACTS BLOCK -->
		



@endsection
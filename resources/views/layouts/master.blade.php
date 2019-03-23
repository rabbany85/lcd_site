<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="utf-8">
    <title>iMetroTech | Technical support for today, tomorrow and far into the future</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link rel="shortcut icon" href="{{ asset('site/images/favicon.ico') }}">
    
    <!-- CSS -->
    <link href="{{ asset('site/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('site/css/flexslider.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('site/css/fancySelect.css') }}" rel="stylesheet" media="screen, projection" />
    <link href="{{ asset('site/css/animate.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('site/css/style.css') }}" rel="stylesheet" type="text/css" />
    
    <!-- FONTS -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet"/>
    
        <script 
    src="https://www.paypal.com/sdk/js?client-id=AUkxoZBY3y81dqNPgDkg0YQd0Fer0hmEtmDhSzN_QWebBobZyPFMjze5NUefzCB6HLjmur97tU-Y3w0Z&currency=GBP">
    </script>
 


</head>
<body>

<!-- PRELOADER -->
<div id="preloader"><img src="{{ asset('site/images/preloader.gif') }}" alt="Logo Coming Soon" /></div>
<!-- PRELOADER -->
<div class="preloader_hide">

    <!-- PAGE -->
    <div id="page">
    
        <!-- HEADER -->
        <header>
            
            <!-- TOP INFO -->
            <div class="top_info">
                
                <!-- CONTAINER -->
                <div class="container clearfix">
                    <ul class="secondary_menu">
                        <li>
                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        </li>
                    </ul>
                    
                    <div class="live_chat"><a href="{{ URL::to('contactUs') }}" ><i class="fa fa-comment-o"></i> Contact Us</a></div>
                    
                    <div class="phone_top">have a question? <a href="tel: 07526913581" >0203 862 1414</a></div>
                </div><!-- CONTAINER -->
            </div><!-- TOP INFO -->
            
            
            <!-- MENU BLOCK -->
            <div class="menu_block">
            
                <!-- CONTAINER -->
                <div class="container clearfix">
                    
                    <!-- LOGO -->
                    <div class="logo">
                        <a href="{{ URL::to('/') }}" >
                        <img src="{{ asset('site/images/banner/logo.jpg') }}" alt="Logo not found" />
                        </a>
                    </div><!-- LOGO -->
                    
                    
                    <!-- SEARCH FORM -->
                    <div class="top_search_form">
                        <a class="top_search_btn" href="javascript:void(0);" ><i class="fa fa-search"></i></a>
                        <form method="get" action="#">
                            <input type="text" name="search" value="Search" onFocus="if (this.value == 'Enter Your Postcode') this.value = '';" onBlur="if (this.value == '') this.value = 'Search';" />
                        </form>
                    </div><!-- SEARCH FORM -->
                    
                    
                    <!-- SHOPPING BAG -->
                    <div class="shopping_bag">
                        <a class="shopping_bag_btn" href="{{ URL::to('cart') }}" ><i class="fa fa-shopping-cart"></i><p>Check Out</p>
                        <span id="shopping_count">
                            {{ Session::get('basketTotal')}}
                        </span></a>
                    </div><!-- SHOPPING BAG -->
                    
                    
                    
                    <!-- MENU -->
                    <ul class="navmenu center">
                        <li><a href="{{ URL::to('/') }}" >Home</a></li>
                        <li><a href="{{ URL::to('faq') }}" >FAQ</a></li>
                        <li><a href="{{ URL::to('contactUs') }}" >Contact</a></li>
                        <li><a href="{{ URL::to('categoryList') }}" >Products</a></li>
                    </ul><!-- MENU -->
                </div><!-- MENU BLOCK -->
            </div><!-- CONTAINER -->
        </header><!-- HEADER -->
        

@yield('mainContent')


        <!-- FOOTER -->
        <footer>
            
            <!-- CONTAINER -->
            <div class="container" data-animated='fadeInUp'>
                
                <!-- ROW -->
                <div class="row">
                    
                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6 col-ss-12 padbot30">
                        <h4>Contacts</h4>
                        <div class="foot_address"><span>iMetroTech</span>698 Romford Road, Manor Park, London E12 5AJ</div>
                        <div class="foot_phone"><a href="tel:0203 862 1414" >0203 862 1414</a></div>
                        <div class="foot_mail"><a href="mailto:info@glamyshop.com" >info@imetrotech.co.uk</a></div>
                        <div class="foot_live_chat"><a href="{{ URL::to('contactUs') }}"><i class="fa fa-comment-o"></i> Contact Us</a></div>
                    </div>
                    
                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6 col-ss-12 padbot30">
                        <h4>Information</h4>
                        <ul class="foot_menu">
                            <li><a href="{{ URL::to('/') }}" >Home</a></li>
                            <li><a href="{{ URL::to('faq') }}" >FAQ</a></li>
                            <li><a href="{{ URL::to('contactUs') }}" >Contact</a></li>
                            <li><a href="{{ URL::to('categoryList') }}" >Products</a></li>
                        </ul>
                    </div>
                    
                    <div class="respond_clear_480"></div>
                    
                    <div class="col-lg-4 col-md-4 col-sm-6 padbot30">
                        <h4>iMetroTech</h4>
                        <p>We are based in the heart of London for last five years and providing a complete solution for your smartphone’s broken screens. We buy your broken screens for Refurbishment and Recycling. We also sell all kinds of mobile accessories; New and Refurbished Display for your Smartphone.</p>
                        <p>We may obtain information about your usage of our website to help us develop and improve it further through online surveys and other requests.</p>
                    </div>
                    
                    <div class="col-lg-4 col-md-4 padbot30">
                        <h4>Newsletter</h4>
                        <form class="newsletter_form clearfix" action="javascript:void(0);" method="get">
                            <input type="text" name="newsletter" value="News letter Coming Soon" onFocus="if (this.value == 'News letter Coming Soon') this.value = '';" onBlur="if (this.value == '') this.value = 'News letter Coming Soon;" />
                            <input class="btn newsletter_btn" type="submit" value="SIGN UP">
                        </form>
                        
                        <h4>we are in social networks</h4>
                        <div class="social">
                            <a href="javascript:void(0);" ><i class="fa fa-twitter"></i></a>
                            <a href="javascript:void(0);" ><i class="fa fa-facebook"></i></a>
                            <a href="javascript:void(0);" ><i class="fa fa-google-plus"></i></a>
                            <a href="javascript:void(0);" ><i class="fa fa-pinterest-square"></i></a>
                            <a href="javascript:void(0);" ><i class="fa fa-tumblr"></i></a>
                            <a href="javascript:void(0);" ><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div><!-- ROW -->
            </div><!-- CONTAINER -->
            
            <!-- COPYRIGHT -->
            <div class="copyright">
                
                <!-- CONTAINER -->
                <div class="container clearfix">
                    <div class="foot_logo"><a href="{{URL::to('/')}}" ><img src="{{ asset('site/images/main.svg') }}" alt="" /></a></div>
                    
                    <div class="copyright_inf">
                        <span>iMetroTech© 2019</span> |
                        <span>All rights reserved</span> |
                        <a class="back_top" href="javascript:void(0);" >Back to Top <i class="fa fa-angle-up"></i></a>
                    </div>
                </div><!-- CONTAINER -->
            </div><!-- COPYRIGHT -->
        </footer><!-- FOOTER -->
    </div><!-- PAGE -->
</div>

<!-- TOVAR MODAL CONTENT -->
<div id="modal-body" class="clearfix">
    <div id="tovar_content"></div>
    <div class="close_block"></div>
</div><!-- TOVAR MODAL CONTENT -->

    <!-- SCRIPTS -->
    <!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <!--[if IE]><html class="ie" lang="en"> <![endif]-->
    
    <script src="{{ asset('site/js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
 -->
    <script src="{{ asset('site/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('site/js/jquery.sticky.js') }}" type="text/javascript"></script>
    <script src="{{ asset('site/js/parallax.js') }}" type="text/javascript"></script>
    <script src="{{ asset('site/js/jquery.flexslider-min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('site/js/jquery.jcarousel.js') }}" type="text/javascript"></script>
    <script src="{{ asset('site/js/fancySelect.js') }}"></script>
    <script src="{{ asset('site/js/animate.js') }}" type="text/javascript"></script>
    <script src="{{ asset('site/js/myscript.js') }}" type="text/javascript"></script>
    
    <!-- End of JS call -->

<script>

        

jQuery(document).ready(function(){
            jQuery('#addToBasketForm').submit(function(e){
               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
               jQuery.ajax({
                  url: "{{ url('addToBasket') }}",
                  method: 'post',
                  data: {
                     id: jQuery('#id').val(),
                     quantity: jQuery('#quantity').val()
                  },
                  success: function(result){
                     console.log(result);
                  },
                  error: function(result){
                    console.log(result)
                  },
                   success: function(result){
                     jQuery('.alert').show();
                     jQuery('.alert').html(result.success);
                     jQuery('#shopping_count').text(result.basketTotal);
                  }
                 });
               });
            });


</script>

     
</body>
</html>







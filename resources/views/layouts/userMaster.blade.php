<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Page title -->
    <title>iMetroTech for client and Customer</title>

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <!--<link rel="shortcut icon" type="image/ico" href="favicon.ico" />-->

    <!-- Vendor styles -->
    <link rel="stylesheet" href="{{URL::asset('userPanel/vendor/fontawesome/css')}}/font-awesome.css" />
    <link rel="stylesheet" href="{{URL::asset('userPanel/vendor/metisMenu/dist')}}/metisMenu.css" />
    <link rel="stylesheet" href="{{URL::asset('userPanel/vendor/animate.css')}}/animate.css" />
    <link rel="stylesheet" href="{{URL::asset('userPanel/vendor/bootstrap/dist/css')}}/bootstrap.css" />
    <link rel="stylesheet" href="{{URL::asset('userPanel/vendor/sweetalert/lib')}}/sweet-alert.css" />

    <!-- App styles -->
    <link rel="stylesheet" href="{{URL::asset('userPanel/fonts/pe-icon-7-stroke/css')}}/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="{{URL::asset('userPanel/fonts/pe-icon-7-stroke/css')}}/helper.css" />
    <link rel="stylesheet" href="{{URL::asset('userPanel/styles')}}/style.css">

</head>
<body class="fixed-navbar fixed-sidebar">

<!-- Simple splash screen-->
<div class="splash"> <div class="color-line"></div><div class="splash-title"><h1>Client - Customer</h1><p>Special Admin Theme for small and medium webapp with very clean and aesthetic style and feel. </p><div class="spinner"> <div class="rect1"></div> <div class="rect2"></div> <div class="rect3"></div> <div class="rect4"></div> <div class="rect5"></div> </div> </div> </div>
<!--[if lt IE 7]>
<p class="alert alert-danger">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!-- Header -->
<div id="header">
    <div class="color-line">
    </div>
    <div id="logo" class="light-version">
        <span>
            iMetroTech <br>{{Auth::user()->user_type}}
        </span>
    </div>
    <nav role="navigation">
        <div class="header-link hide-menu"><i class="fa fa-bars"></i></div>
        <div class="small-logo">
            <span class="text-primary">iMetroTech APP</span>
        </div>
        <form role="search" class="navbar-form-custom" method="post" action="#">
            <div class="form-group">
                <input type="text" class="form-control" name="search">
            </div>
        </form>
        <div class="mobile-menu">
            <button type="button" class="navbar-toggle mobile-menu-toggle" data-toggle="collapse" data-target="#mobile-collapse">
                <i class="fa fa-chevron-down"></i>
            </button>
            <div class="collapse mobile-navbar" id="mobile-collapse">
                <ul class="nav navbar-nav">
                    <li>
                         <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                         </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                        </form>
                    </li>
                    <li>
                        <a class="" href="{{URL::to('login')}}">Profile</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="navbar-right">
            
        </div>
    </nav>
</div>





<!-- Navigation -->
<aside id="menu">
    <div id="navigation">
        <div class="profile-picture">
            @if(Auth::user()->media)
            <a href="{{ route('media.single', ['media' => Auth::user()->media->id]) }}">
                <img src="{{ asset(Auth::user()->media->url) }}" class="img-circle m-b" alt="Picture not available" style="height: 80px; width: 80px">
            </a>
            @endif
            <div class="stats-label text-color">
                <span class="font-extra-bold font-uppercase">
                  
                
                   
                </span>

                <div class="dropdown">
                    <div>
                         <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                         </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                        </form>
                    </div>
                    <ul class="dropdown-menu animated flipInX m-t-xs">
                        <li><a href="{{ route('profile.single', ['profile' => Auth::user()->id]) }}"> 
                             <span class="nav-label">Profile</span> 
                            </a>
                        </li>
        
                        <li>
                            <div>
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
                    </ul> 
                </div>



                <div id="sparkline1" class="small-chart m-t-sm"></div>
                <div>
                    <h6>{{Auth::user()->title}} {{Auth::user()->last_name}}</h6>
                    <h4 class="font-extra-bold m-b-xs">
                        Welcome
                    </h4>
                    <small class="text-muted">You have got the Power here</small>
                </div>
            </div>
        </div>

        @yield('sidebar')
    </div>
</aside>










<!-- Main Wrapper -->
<div id="wrapper">

   @yield('mainContent')



    <!-- Footer-->
    <footer class="footer">
        <span class="pull-right">
            We Buy and We Sell
        </span>
        iMetroTech 2018
    </footer>

</div>
<!--End of main wrapper-->








<!-- Vendor scripts -->
<script src="{{URL::asset('userPanel/vendor/jquery/dist')}}/jquery.min.js"></script>
<script src="{{URL::asset('userPanel/vendor/jquery-ui')}}/jquery-ui.min.js"></script>
<script src="{{URL::asset('userPanel/vendor/slimScroll')}}/jquery.slimscroll.min.js"></script>
<script src="{{URL::asset('userPanel/vendor/bootstrap/dist/js')}}/bootstrap.min.js"></script>
<script src="{{URL::asset('userPanel/vendor/jquery-flot')}}/jquery.flot.js"></script>
<script src="{{URL::asset('userPanel/vendor/jquery-flot')}}/jquery.flot.resize.js"></script>
<script src="{{URL::asset('userPanel/vendor/jquery-flot')}}/jquery.flot.pie.js"></script>
<script src="{{URL::asset('userPanel/vendor/flot.curvedlines')}}/curvedLines.js"></script>
<script src="{{URL::asset('userPanel/vendor/jquery.flot.spline/index.js')}}"></script>
<script src="{{URL::asset('userPanel/vendor/metisMenu/dist')}}/metisMenu.min.js"></script>
<script src="{{URL::asset('userPanel/vendor/iCheck')}}/icheck.min.js"></script>
<script src="{{URL::asset('userPanel/vendor/peity')}}/jquery.peity.min.js"></script>
<script src="{{URL::asset('userPanel/vendor/sparkline')}}/index.js"></script>

<script src="{{URL::asset('userPanel/vendor/jquery-validation')}}/jquery.validate.min.js"></script>

<!-- App scripts -->
<script src="{{URL::asset('userPanel/scripts')}}/homer.js"></script>
<script src="{{URL::asset('userPanel/scripts')}}/charts.js"></script>

<script>

    $(function () {   

////////////////////////////////////////////////// Customer Complaint //////////////////////////////////////////////////////    

        $("#form_complaint").validate({

            rules: {

             title : {
                    required: true,
                     minlength: 10
                   },

            description : {
                 required: true,
                 minlength:120
             },

             user_id : {
                required: true
             }

            },

           submitHandler: function(form){
                form.submit();
            }

        });

        ////////////////////////////////////////////////// Customer form //////////////////////////////////////////////////////   

       $("#customer-form").validate({
            
           rules: {

                title: {
                    maxlength:10,
                    required:false
                },

                first_name: {
                    required: true,
                    maxlength:30 
                },

                middle_name: {
                    required: false,
                    maxlength:30
                },
                last_name:{
                    required: true,
                    maxlength:30
                },
                gender: {
                    required: false,
                    maxlength:10
                },
                date_of_birth: {
                    required: false
                },
                address_line1: {
                    required: true
                },

                address_line2: {
                    required: true
                },

                town:{
                    required: true
                },

                city: {
                    required: false
                },
                country: {
                    required: false
                },

                post_code: {
                    required: true
                },

                mobile_number: {
                    required: false,
                    number:true
                },

                land_line_number: {
                    required: false,
                    number: true

                },
                user_id: {
                    required: true
                }

                 },
            submitHandler: function(form){
                form.submit();
            }
         });

    
     ////////////////////////////////////////////////// Customer Refund //////////////////////////////////////////////////////   

        $("#customer-Refund").validate({

            rules: {

                order_id: {
                    required: true,
                    number: true
                },

                description: {
                    required: false,
                    minlength: 40
                },

                total: {
                    required: true,
                    number: true
                }


            },
                submitHandler: function(form){
                form.submit();
            }
        });

        ////////////////////////////////////////////////// Customer Review //////////////////////////////////////////////////////   

        $("#customer-Review").validate({

            rules: {

                title: {
                    required: true,
                    maxlength:30

                },

                description: {
                    required: false,
                    maxlength: 500
                }
            },

            submitHandler: function(form){
                form.submit();
            }

        });

      
        /**
         * Flot charts data and options
         */
        var data1 = [ [0, 55], [1, 48], [2, 40], [3, 36], [4, 40], [5, 60], [6, 50], [7, 51] ];
        var data2 = [ [0, 56], [1, 49], [2, 41], [3, 38], [4, 46], [5, 67], [6, 57], [7, 59] ];

        var chartUsersOptions = {
            series: {
                splines: {
                    show: true,
                    tension: 0.4,
                    lineWidth: 1,
                    fill: 0.4
                },
            },
            grid: {
                tickColor: "#f0f0f0",
                borderWidth: 1,
                borderColor: 'f0f0f0',
                color: '#6a6c6f'
            },
            colors: [ "#62cb31", "#efefef"],
        };

        $.plot($("#flot-line-chart"), [data1, data2], chartUsersOptions);

        /**
         * Flot charts 2 data and options
         */
        var chartIncomeData = [
            {
                label: "line",
                data: [ [1, 10], [2, 26], [3, 16], [4, 36], [5, 32], [6, 51] ]
            }
        ];

        var chartIncomeOptions = {
            series: {
                lines: {
                    show: true,
                    lineWidth: 0,
                    fill: true,
                    fillColor: "#64cc34"

                }
            },
            colors: ["#62cb31"],
            grid: {
                show: false
            },
            legend: {
                show: false
            }
        };

        $.plot($("#flot-income-chart"), chartIncomeData, chartIncomeOptions);



    });

</script>

</body>
</html>
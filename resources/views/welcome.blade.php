<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
<meta charset="utf-8">
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PTIPD</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="/assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="/assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="/assets/css/colors.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="/assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="/assets/js/core/libraries/bootstrap.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="/assets/js/plugins/ui/nicescroll.min.js"></script>

	<script type="text/javascript" src="/assets/js/core/app.js"></script>
	<script type="text/javascript" src="/js/field.js"></script>
	<script type="text/javascript" src="/assets/js/pages/layout_fixed_custom.js"></script>
    <!-- /theme JS files -->
    
    <!-- Theme JS files -->
	<script type="text/javascript" src="/assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="/assets/js/plugins/forms/selects/select2.min.js"></script>

	<script type="text/javascript" src="/assets/js/pages/datatables_basic.js"></script>
    <!-- /theme JS files -->
    
    <!-- Theme JS files -->
	<script type="text/javascript" src="/assets/js/core/libraries/jquery_ui/interactions.min.js"></script>
	<script type="text/javascript" src="/assets/js/plugins/forms/selects/select2.min.js"></script>

	<script type="text/javascript" src="/assets/js/pages/form_select2.js"></script>
	<!-- /theme JS files -->
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 70px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 20px;
            }
        </style>
    </head>
    <body>
        <!-- Main navbar -->
            <div class="navbar navbar-inverse" id="navbar-main">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html"><img src="/assets/images/logo_light.png" alt=""></a>

                    <ul class="nav navbar-nav pull-right visible-xs-block">
                        <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
                        <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
                    </ul>
                </div>

                <div class="navbar-collapse collapse" id="navbar-mobile">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">					
                        </li>
                    </ul>

                    <div class="navbar-right">
                        <ul class="nav navbar-nav">
                            @guest
                                <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                                <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                            @else
                                <li class="dropdown dropdown-user">
                                    <a class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="/assets/images/placeholder.jpg" alt="">
                                        <span>{{ Auth::user()->name }}</span>
                                        <i class="caret"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="#"><i class="icon-user-plus"></i> My profile</a></li>
                                        <li><a href="#"><span class="badge bg-blue pull-right">58</span> <i class="icon-comment-discussion"></i> Messages</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#"><i class="icon-cog5"></i> Account settings</a></li>
                                        <li><a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();"><i class="icon-switch2"></i>
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /main navbar -->
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Peminjaman Barang
                    <br>
                    PTIPD
                </div>

                <div class="links">
                    <a href="https://web.facebook.com/teteh.nurfi">Nurfi Agnia</a>
                    <a href="https://web.facebook.com/nida.mariaulfahanwar">Nida Maria Ulfah</a>
                </div>
                <!-- Footer -->
                <div class="text-muted text-center" style="margin-top:100px">
                    &copy; 2018. <a href="#">PTIPD</a> by <a href="https://uinsgd.ac.id" target="_blank">UIN Sunan Gunung Djati</a>
                </div>
                <!-- /footer -->
            </div>
        </div>
    </body>
</html>

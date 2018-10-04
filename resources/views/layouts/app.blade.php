<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
<meta charset="utf-8">
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PTIPD</title>
	<link rel="shortcut icon" type="image/png" href="http://uinsgd.ac.id/wp-content/uploads/2017/12/logo_uin2-e1521272551439.png"/>

	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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

	<!-- sweet_alert -->
	<link rel="stylesheet" href="/assets/sweetalert2/sweetalert2.min.css">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body {{{ (Request::is('login') ? 'class=login-container' : '') }}}
	  {{{ (Request::is('password/reset') ? 'class=login-container' : '') }}}>
	
	@include('sweet::alert')
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
                                <li><a href="/profile"><i class="icon-user-plus"></i> My profile</a></li>
                                <li class="divider"></li>
								@if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('superadmin'))
								<li><a href="/admina/setting"><i class="icon-cog5"></i> Account settings</a></li>
								@else
								<li><a href="/setting"><i class="icon-cog5"></i> Account settings</a></li>
								@endif
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
	@if(Auth::user()->hasRole('user'))
	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<div class="sidebar sidebar-main sidebar-fixed">
				<div class="sidebar-content">

					<!-- User menu -->
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<a href="#" class="media-left"><img src="/assets/images/image.png" class="img-circle img-sm" alt=""></a>
								<div class="media-body">
									<span class="media-heading text-semibold">{{ Auth::user()->name }}</span>
									<div class="text-size-mini text-muted">
										<i class="icon-pin text-size-small"></i> &nbsp;{{ Auth::user()->alamat }}
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /user menu -->


					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

								<!-- Main -->
								<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
                                <li {{{ (Request::is('home') ? 'class=active' : '') }}}><a href="/home"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
								<li {{{ (Request::is('pinjambarang') ? 'class=active' : '') }}}><a href="pinjambarang"><i class="icon-newspaper"></i><span>Pinjam sekarang!</span></a></li>
								<li {{{ (Request::is('daftarpeminjaman') ? 'class=active' : '') }}}><a href="daftarpeminjaman"><i class="icon-grab"></i><span>Peminjaman saya</span></a></li>
								<!-- /main -->

							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->


			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h4>
								<span class="text-semibold">{{{ (Request::is('home') ? 'Dashboard' : '') }}}</span>
                                <span class="text-semibold">{{{ (Request::is('pinjambarang') ? 'Peminjaman' : '') }}}</span>
                                <span class="text-semibold">{{{ (Request::is('daftarpeminjaman') ? 'Daftar Peminjaman' : '') }}}</span>  - User Panel
                            </h4>
						</div>
                        @if (Session::has('message'))
                        <div class="alert bg-success alert-styled-left">
                            <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                            <span class="text-semibold">{{ Session::get('message') }}</span>
                        </div>
                        @endif
					</div>
				</div>
				<!-- /page header -->

				<!-- Content area -->
				<div class="content">
                    @yield('content')

                    <!-- Footer -->
					<div class="footer text-muted">
						&copy; 2018. <a href="#">PTIPD</a> by <a href="https://uinsgd.ac.id" target="_blank">UIN Sunan Gunung Djati Bandung</a>
					</div>
					<!-- /footer -->
                </div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->
	@endif
</body>
</html>

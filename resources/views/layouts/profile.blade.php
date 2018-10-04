<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PTIPD</title>
	<link rel="shortcut icon" type="image/png" href="http://uinsgd.ac.id/wp-content/uploads/2017/12/logo_uin2-e1521272551439.png"/>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="/assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="/assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="/assets/css/colors.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="/assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="/assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="/assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="/assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="/assets/js/plugins/forms/validation/validate.min.js"></script>
	<script type="text/javascript" src="/assets/js/plugins/forms/styling/uniform.min.js"></script>

	<script type="text/javascript" src="/assets/js/core/app.js"></script>
	<script type="text/javascript" src="/assets/js/pages/login_validation.js"></script>
	<!-- /theme JS files -->

</head>

<body class="login-container login-cover">

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
						<li><a {{{ (Request::is('home') ? 'href=/daftarpeminjaman' : '') }}} class="nav-link"
							   {{{ (Request::is('daftarpeminjaman') ? 'href=/home' : '') }}}>{{{ (Request::is('home') ? 'Peminjaman Saya' : '') }}}{{{ (Request::is('daftarpeminjaman') ? 'Back to Home' : '') }}}</a></li>
                        <li class="dropdown dropdown-user">
                            <a class="dropdown-toggle" data-toggle="dropdown">
                                <img src="/assets/images/placeholder.jpg" alt="">
                                <span>{{ Auth::user()->name }}</span>
                                <i class="caret"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right">
								@if(Auth::user()->hasRole('user'))
                                <li><a href="/profile"><i class="icon-user-plus"></i> My profile</a></li>
								@else
                                <li><a href="/admina/profile"><i class="icon-user-plus"></i> My profile</a></li>
								@endif
                                <li class="divider"></li>
                                @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('superadmin'))
                                <li><a href="/admina/setting"><i class="icon-cog5"></i> Account settings</a></li>
                                @else
                                <li><a href="/setting"><i class="icon-cog5"></i> Account settings</a></li>
                                @endif
								@if(!Auth::user()->hasRole('user'))
								<li><a href="/admina"><i class="icon-cog5"></i> Admin Panel</a></li>
								@else
								<li><a href="/home"><i class="icon-home"></i> Home</a></li>
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

	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content pb-20">

					<!-- Form with validation -->
					<div class="form-validate">
						<div class="panel panel-body login-form">
							<div class="text-center">
								<div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
								<h5 class="content-group">{{Auth::user()->name}} <small class="display-block">Your Profile</small></h5>
							</div>

                            <div class="form-group has-feedback has-feedback-left">
                                <input name="name" readonly type="text" class="form-control" placeholder="Your name" value="{{Auth::user()->name}}">
                                <div class="form-control-feedback">
                                    <i class="icon-user-check text-muted"></i>
                                </div>
                            </div>

                            <div class="form-group has-feedback has-feedback-left">
                                <input type="email" readonly name="email" class="form-control" placeholder="Your email" value="{{Auth::user()->email}}">
                                <div class="form-control-feedback">
                                    <i class="icon-mention text-muted"></i>
                                </div>
                            </div>

                            <div class="form-group has-feedback has-feedback-left">
                                <input type="text" readonly name="alamat" class="form-control" placeholder="Your address" value="{{Auth::user()->alamat}}">
                                <div class="form-control-feedback">
                                    <i class="icon-user-check text-muted"></i>
                                </div>
                            </div>

                            <div class="form-group has-feedback has-feedback-left">
                                <input type="text" readonly name="no_tlp" class="form-control" placeholder="Your phone" value="{{Auth::user()->no_tlp}}">
                                <div class="form-control-feedback">
                                    <i class="icon-user-check text-muted"></i>
                                </div>
                            </div>
                            @if(!Auth::user()->hasRole('admin') && !Auth::user()->hasRole('superadmin'))
                            <div class="form-group has-feedback has-feedback-left">
                                <input type="text" readonly name="instansi" class="form-control" placeholder="Your Instance" value="{{Auth::user()->instansi}}">
                                <div class="form-control-feedback">
                                    <i class="icon-user-check text-muted"></i>
                                </div>
                            </div>

                            <div class="form-group has-feedback has-feedback-left">
                                <input type="text" readonly name="jabatan" class="form-control" placeholder="Jabatan" value="{{Auth::user()->jabatan}}">
                                <div class="form-control-feedback">
                                    <i class="icon-user-check text-muted"></i>
                                </div>
                            </div>
                            @endif
					</div>
					<!-- /form with validation -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
</html>

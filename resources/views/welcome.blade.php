<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
<meta charset="utf-8">
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PTIPD</title>
	<link rel="shortcut icon" type="image/png" href="http://uinsgd.ac.id/wp-content/uploads/2017/12/logo_uin2-e1521272551439.png"/>
	
    <link rel="stylesheet" type="text/css" href="style2.css">

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

</head>
<body {{{ (Request::is('login') ? 'class=login-container' : '') }}}
	  {{{ (Request::is('password/reset') ? 'class=login-container' : '') }}}>
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
								<li><a href="/home"><i class="icon-cog5"></i> Home</a></li>
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

	<!-- Page container -->
	<div class="page-container">
		<!-- Page content -->
		<div class="page-content">
			<!-- Main content -->
			<div class="content-wrapper">
				<div class="content wrapper">
					@if (Session::has('message'))
						<div class="alert bg-success alert-styled-left">
							<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
							<span class="text-semibold">{{ Session::get('message') }}</span>
						</div>
					@endif
                            <aside>
                                <div id="logo">
                                </div>
                                <div style="margin-left:35%;margin-top:10%">
                                    <a {{{ (Request::is('/') ? 'href=/barang' : 'href=/') }}}><button class="btn btn-success">{{{ (Request::is('/') ? 'Cek Barang' : 'Kembali ke home') }}}</button></a>
                                </div>
                            </aside>
							@if (Request::is('/'))
                            <!--utama-->
							<div class="utama">
								<!--utama1-->
								<div id="utama1">
									<div id="myCarousel" class="carousel slide" data-ride="carousel">

										<!-- Wrapper for slides -->
										<div class="carousel-inner">
										<div class="item active">
											<img src="PTIPD.jpg" alt="Los Angeles" style="width:100%; height: 500px">
										</div>

										<div class="item">
											<img src="KPgambar/kplab.jpg" alt="Los Angeles" style="width:100%; height: 500px">
										</div>
										
										<div class="item">
											<img src="KPgambar/kplab.jpg" alt="Los Angeles" style="width:100%; height: 500px">
										</div>
										</div>

										<!-- Left and right controls -->
										<a class="left carousel-control" href="#myCarousel" data-slide="prev">
										<span class="glyphicon glyphicon-chevron-left"></span>
										<span class="sr-only">Previous</span>
										</a>
										<a class="right carousel-control" href="#myCarousel" data-slide="next">
										<span class="glyphicon glyphicon-chevron-right"></span>
										<span class="sr-only">Next</span>
										</a>
									</div>
								</div>
								<!--end utama1-->
								<!--utama2-->
								<div id="utama2">
									<div style="float: left; width: 25%; height: 150px">
										<div id="myCarousel" class="carousel slide" data-ride="carousel">
											<!-- Wrapper for slides -->
											<div class="carousel-inner">
												<div class="item active">
												<img src="KPgambar/kplab.jpg" alt="Los Angeles" style="width:100%; height: 149px">
												</div>

												<div class="item">
												<img src="KPgambar/kpkomputer.png" alt="Los Angeles" style="width:100%; height: 149px">
												</div>
											
												<div class="item">
												<img src="KPgambar/kprouter.jpg" alt="Los Angeles" style="width:100%; height: 149px">
												</div>

												<div class="item">
												<img src="KPgambar/kphdmi.jpg" alt="Los Angeles" style="width:100%; height: 149px">
												</div>
											</div>
										</div>
									</div>
									<div style="float: left; width: 25%; height: 150px">
										<div id="myCarousel" class="carousel slide" data-ride="carousel">
											<!-- Wrapper for slides -->
											<div class="carousel-inner">
												<div class="item active">
												<img src="KPgambar/kpkomputer.png" alt="Los Angeles" style="width:100%; height: 149px">
												</div>

												<div class="item">
												<img src="KPgambar/kprouter.jpg" alt="Los Angeles" style="width:100%; height: 149px">
												</div>
											
												<div class="item">
												<img src="KPgambar/kphdmi.jpg" alt="Los Angeles" style="width:100%; height: 149px">
												</div>

												<div class="item">
												<img src="KPgambar/kplab.jpg" alt="Los Angeles" style="width:100%; height: 149px">
												</div>
											</div>
										</div>
									</div>
									<div style="float: left; width: 25%; height: 150px">
										<div id="myCarousel" class="carousel slide" data-ride="carousel">
											<!-- Wrapper for slides -->
											<div class="carousel-inner">
												<div class="item active">
												<img src="KPgambar/kprouter.jpg" alt="Los Angeles" style="width:100%; height: 149px">
												</div>

												<div class="item">
												<img src="KPgambar/kphdmi.jpg" alt="Los Angeles" style="width:100%; height: 149px">
												</div>

												<div class="item">
												<img src="KPgambar/kplab.jpg" alt="Los Angeles" style="width:100%; height: 149px">
												</div>
											
												<div class="item">
												<img src="KPgambar/kpkomputer.png" alt="Los Angeles" style="width:100%; height: 149px">
												</div>
											</div>
										</div>
									</div>
									<div style="float: left; width: 25%; height: 150px">
										<div id="myCarousel" class="carousel slide" data-ride="carousel">
											<!-- Wrapper for slides -->
											<div class="carousel-inner">
												<div class="item active">
												<img src="KPgambar/kphdmi.jpg" alt="Los Angeles" style="width:100%; height: 149px">
												</div>

												<div class="item">
												<img src="KPgambar/kplab.jpg" alt="Los Angeles" style="width:100%; height: 149px">
												</div>
											
												<div class="item">
												<img src="KPgambar/kpkomputer.png" alt="Los Angeles" style="width:100%; height: 149px">
												</div>

												<div class="item">
												<img src="KPgambar/kprouter.jpg" alt="Los Angeles" style="width:100%; height: 149px">
												</div>

											</div>
										</div>
									</div>
								</div>
							<!--end utama 2-->	
							</div>
							<!--end utama-->
							@elseif (Request::is('barang'))
							<div class="panel panel-flat utama" style="overflow-y:scroll;overflow-x:hidden">
							<h4 class="container">Data Barang</h4>
							<table class="table datatable-basic">
								<thead>
									<tr>
										<th>Foto</th>
										<th>Nama</th>
										<th>Keterangan</th>
										<th>Stok</th>
										<th>Status</th>
										<th>Rate</th>
									</tr>
								</thead>
								<tbody>
									@foreach($val as $v)
									@if($v->type = "barang" && $v->stock != 0)
									<tr>
										<td><img src="/uploads/{{ $v->pict }}" style="width:150px" /></td>
										<td>{{ $v->name }}</td>
										<td>{{ $v->description }}</td>
										<td>{{ $v->stock }}</td>
										<td><span class="label label-success">Avaiable</span></td>
										<td><span class="text-muted">Starred</span></td>
									</tr>
									@endif
									@endforeach
								</tbody>
							</table>
							</form>
							</div>
							@endif
                    <!-- Footer -->
					<div class="footer text-muted text-center">
						&copy; 2018. <a href="#">PTIPD</a> by <a href="https://uinsgd.ac.id" target="_blank">UIN Sunan Gunung Djati</a>
					</div>
					<!-- /footer -->
				</div>
			</div>
        </div>
    </div>
</body>
</html>                
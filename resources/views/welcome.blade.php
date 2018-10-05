
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>PTIPD</title>
	<link rel="shortcut icon" type="image/png" href="http://uinsgd.ac.id/wp-content/uploads/2017/12/logo_uin2-e1521272551439.png"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Prata" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="/assets/Legal/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="/assets/Legal/css/icomoon.css">
	<!-- Simple Line Icons -->
	<link rel="stylesheet" href="/assets/Legal/css/simple-line-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="/assets/Legal/css/bootstrap.css">
	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="/assets/Legal/css/owl.carousel.min.css">
	<link rel="stylesheet" href="/assets/Legal/css/owl.theme.default.min.css">
	<!-- Style -->
	<link rel="stylesheet" href="/assets/Legal/css/style.css">


	<!-- Modernizr JS -->
	<script src="/assets/Legal/js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->


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
	<body>
	<header role="banner" id="fh5co-header">
		
		<nav class="navbar navbar-default">
			<div class="container">
				<div class="navbar-header">
					<!-- Mobile Toggle Menu Button -->
					<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>
					<a class="navbar-brand" href="index.html"><span>P</span>TIPD</a> 
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li class="active"><a href="#" data-nav-section="home"><span>Home</span></a></li>
						<li><a href="#" data-nav-section="about"><span>Tentang</span></a></li>
						<li><a href="#" data-nav-section="practice-areas"><span>Tata Cara</span></a></li>
						<li><a href="#" data-nav-section="contact"><span>Kontak</span></a></li>
						@guest
                        <li><a href="{{ route('login') }}" class="external"><span>{{ __('Login') }}</span></a></li>
                        <li><a href="{{ route('register') }}" class="external"><span>{{ __('Register') }}</span></a></li>
						@else
						@if(Auth::user()->hasRole('user'))
						<li><a href="/home" class="external"><span>Dashboard</span></a></li>
						@else
						<li><a href="/admina" class="external"><span>Dashboard</span></a></li>
						@endif
                    	@endguest
					</ul>
				</div>
			</div>
		</nav>
 
	</header>

	<section id="fh5co-home" data-section="home" style="background-image: url(assets/Legal/images/full_image_3.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="text-wrap">
				<div class="text-inner">
					<div class="row">
						<div class="col-md-10 col-md-offset-1 to-animate">
							<h1>Selamat Datang di Website Peminjaman PTIPD</h1>
							<h2>Web ini untuk melakukan peminjaman barang maupun ruangan di UIN Sunan Gunung Djati Bandung.</h2>
							<div class="call-to-action">
								<a href="/login" class="download">Pinjam sekarang!</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="fh5co-about" data-section="about">
		<div class="container">

			<div class="row">
				<div class="col-md-7 col-md-pull-1">
					<img src="/assets/Legal/images/img_1.jpg" class="img-shadow img-responsive" alt="Free HTML5 Bootstrap Template">
				</div>
				<div class="col-md-5">
					<h2>Tentang Kami</h2>
					<p>Pusat Teknologi Informasi dan Pangkalan Data (PTIPD) merupakan salah satu unit pelaksana teknis (UPT) yang ada di UIN Sunan Gunung Djati Bandung. Di awal sejarah pendiriannya, PTIPD berupa unit yang bernama IT Centre dan Pusat Komputer (Puskom) yang di jadikan satu dengan tugas yang masih sangat sederhana, sesuai dengan kondisi kebutuhan institusi saat itu. Secara yuridis, sementara Puskom sudah ada sejak diberlakukannya Keputusan Menteri Agama republik Indonesia (KMA RI) nomor 385 Tahun 1993 tanggal 29 Desember 1993, tentang Organisasi dan Tata Kerja IAIN Sunan Gunung Djati Bandung. Dalam KMA RI tersebut terdapat pasal 60 yang memuat tentang Puskom dan menjelaskan bahwa Puskom adalah unsur penunjang IAIN Sunan Gunung Djati Bandung di bidang komputer (pasal 60 ayat 1). Puskom dipimpin oleh seorang kepala, yang ditunjuk di antara pranata komputer senior di lingkungan Puskom yang bertanggungjawab kepada Rektor dan pembinaannya dilakukan oleh Pembantu Rektor Bidang Akademik (pasal 60 ayat 2).</p>
					<p>Keberadaan Pusat Komputer sebagai unit pelasana teknis atau unsur penunjang di IAIN Sunan Kalijaga juga dimuat dalam Keputusan Menteri Agama RI Nomor 399 Tahun 1993 tentang statuta Institut Agama Islam Negeri Sunan Gunung Djati Bandung.</p>

					<ul class="list-nav">
						<li><i class="icon-check2"></i>Info selengkapnya di laman http://ptipd.uinsgd.ac.id/</li>
					</ul>
				</div>
			</div>

		</div>
	</section>


	<section id="fh5co-explore" data-section="practice-areas">
		<div class="container">
			<div class="row">
				<div class="col-md-12 section-heading text-center">
					<h2 class="to-animate">Tata Cara Peminjaman</h2>
					<div class="row">
						<div class="col-md-8 col-md-offset-2 subtext to-animate">
							<h3>Berikut ini adalah tata cara peminjaman di website ini.</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="fh5co-explore">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-push-5 to-animate-2">
						<img class="img-shadow img-responsive" src="/assets/Legal/images/img_2.jpg" width="400" alt="Free HTML5 Bootstrap Template">
					</div>
					<div class="col-md-4 col-md-pull-8 to-animate-2">
						<div class="mt">
							<h3>Tata cara :</h3>
							<p>Adapun langkah-langkah peminjamannya adalah sebagai berikut : </p>
							<ul class="list-nav">
								<li><i class="icon-check2"></i>Peminjam diharuskan mendaftar terlebih dahulu.</li>
								<li><i class="icon-check2"></i>Jika sudah terdaftar peminjam dapat login.</li>
								<li><i class="icon-check2"></i>Peminjam memilih barang dan memasukkan jumlah barang.</li>
								<li><i class="icon-check2"></i>Peminjam memasukkan tanggal peminjaman.</li>
								<li><i class="icon-check2"></i>Peminjam mencetak bukti peminjaman</li>
								<li><i class="icon-check2"></i>Peminjam membawa bukti peminjaman ke admin.</li>
								<li><i class="icon-check2"></i>Tunggu sampai admin verifikasi peminjaman.</li>
								<li><i class="icon-check2"></i>Berhasil meminjam barang.</li>
							</ul>
						</div>
					</div>
					
				</div>
			</div>
		</div>

	</section>
	

	<div class="getting-started getting-started-1">
		<div class="container">
			<div class="row">
				<div class="col-md-6 to-animate">
					<h3>Ingin melihat barang yang tersedia?</h3>
					<p>Silahkan cek barang yang tersedia dengan meng-klik tombol disamping. </p>
				</div>
				<div class="col-md-6 to-animate-2">
					<div class="call-to-action text-right">
						<a href="#" class="sign-up">Cek barang sekarang!</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	

	<section id="fh5co-footer" data-section="contact" role="contentinfo">
		<div class="container">
			<div class="row">
				<div class="col-md-4 to-animate">
					<h3 class="section-title">Tentang kami</h3>
					<p>Mengembangkan infrastruktur teknologi informasi UIN Sunan Gunung Djati Bandung
						Mengembangkan dan mengintergrasikan sistem informasi akademik dan non akademik UIN Sunan Gunung Djati Bandung
						Mengembangkan teknologi informasi untuk kepentingan penelitian di UIN Sunan Gunung Djati Bandung
						Meningkatkan kerjasama di bidang teknologi informasi untuk pengembangan UIN Sunan Gunung Djati Bandung dan masyarakat</p>
					<p class="copy-right">&copy; 2018 PTIPD. <br>All Rights Reserved. <br>
						Designed by <a href="" target="_blank">UIN Sunan Gunung Djati</a>
					</p>
				</div>

				<div class="col-md-4 to-animate">
					<h3 class="section-title">Alamat</h3>
					<ul class="contact-info">
						<li><i class="icon-map-marker"></i>Jl. AH. Nasution No. 105 Cibiru Bandung 40614</li>
						<li><i class="icon-phone"></i>(022) 7800525</li>
						<li><i class="icon-envelope"></i><a href="#">ptipd@uinsgd.ac.id</a></li>
						<li><i class="icon-globe2"></i><a href="http://ptipd.uinsgd.ac.id/">http://ptipd.uinsgd.ac.id/</a></li>
					</ul>
					<h3 class="section-title">Connect with Us</h3>
					<ul class="social-media">
						<li><a href="#" class="facebook"><i class="icon-facebook"></i></a></li>
						<li><a href="#" class="twitter"><i class="icon-twitter"></i></a></li>
						<li><a href="#" class="dribbble"><i class="icon-dribbble"></i></a></li>
						<li><a href="#" class="github"><i class="icon-github-alt"></i></a></li>
					</ul>
				</div>
				<div class="col-md-4 to-animate">
					<h3 class="section-title">Saran dan Masukan</h3>
					<form class="contact-form">
						<div class="form-group">
							<label for="name" class="sr-only">Name</label>
							<input type="name" class="form-control" id="name" placeholder="Name">
						</div>
						<div class="form-group">
							<label for="email" class="sr-only">Email</label>
							<input type="email" class="form-control" id="email" placeholder="Email">
						</div>
						<div class="form-group">
							<label for="message" class="sr-only">Message</label>
							<textarea class="form-control" id="message" rows="7" placeholder="Message"></textarea>
						</div>
						<div class="form-group">
							<input type="submit" id="btn-submit" class="btn btn-send-message btn-md" value="Send Message">
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	
	<iframe class="fh5co-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1980.329353773097!2d107.71609684496664!3d-6.931333659288559!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68dd42c254a55d%3A0xee52343f78dc2e32!2sUIN+Sunan+Gunung+Djati+Bandung!5e0!3m2!1sid!2sid!4v1514448377968" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe></div>


	
	<!-- jQuery -->
	<script src="/assets/Legal/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="/assets/Legal/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="/assets/Legal/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="/assets/Legal/js/jquery.waypoints.min.js"></script>
	<!-- Stellar Parallax -->
	<script src="/assets/Legal/js/jquery.stellar.min.js"></script>
	<!-- Owl Carousel -->
	<script src="/assets/Legal/js/owl.carousel.min.js"></script>
	<!-- Google Map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
	<script src="/assets/Legal/js/google_map.js"></script>
	<!-- Main JS (Do not remove) -->
	<script src="/assets/Legal/js/main.js"></script>

	</body>
</html>


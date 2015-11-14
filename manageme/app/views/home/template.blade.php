<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">

	<title>{{$title}} | {{Settings::get('page.title')}}</title>

	<meta name="author" content="@dannegm">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">

	@section('metas')
	@show

	<!-- Icons -->


	<!-- Stylesheets -->

	<link rel="stylesheet" href="{{URL::asset('/home/assets/less/main.less')}}" />
	<link rel="stylesheet" href="{{URL::asset('/home/assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{URL::asset('/home/assets/css/font-awesome.min.css')}}">
	<link rel="stylesheet/less" href="{{URL::asset('/home/assets/less/main.less')}}" />
	@section('styles')
	@show

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body id="top">

	<nav id="navbar" class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">
					<img id="logo" src="{{URL::asset('/home/img/ca-logo.png')}}"
						alt="{{Settings::get('page.title')}}" />
				</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#">Home</a></li>
					<li><a href="#">About us</a></li>
					<li><a href="#">Brands</a></li>
					<li><a href="#">Products</a></li>
					<li><a href="#">Showrooms</a></li>
					<li><a href="#">Show schedule</a></li>
					<li><a href="#">Contact us</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<div id="main">

		@section('content')
		@show

	</div>

	<footer id="footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-9">
					<div class="row">
						<div class="col-lg-6 col-xs-12">
							<h1>get in touch!</h1>
						</div>
						<div class="col-lg-3 col-xs-6">
							<a class="link-center" href="#">
								<img src="{{URL::asset('/home/img/ic-arts.png')}}" />
								<span>Artist submission</span>
							</a>
						</div>
						<div class="col-lg-3 col-xs-6">
							<a class="link-center" href="#">
								<img src="{{URL::asset('/home/img/ic-carrers.png')}}" />
								<span>Carrer Oportunity</span>
							</a>
						</div>

						<div class="col-lg-12 col-xs-10 hr"></div>
					</div>
					<div class="row">
						<div class="col-lg-4">
							<h2>Our home</h2>
							<address>
								<b>Phone:</b> <span>323-581-6617</span><br />
								<b>FAX:</b> <span>323-581-2323</span><br />
								<b>Postal address:</b> <span>4950 S. Santa Fe Ave., Vernon, CA 90058</span>
							</address>
						</div>
						<div class="col-lg-4">
							<h2>Our home</h2>
							<address>
								<b>General information:</b> <a href="mailto:{{Settings::get('contact.email')}}">{{Settings::get('contact.email')}}</a><br />
								<b>Sales:</b> <a href="mailto:{{Settings::get('contact.email.sales')}}">{{Settings::get('contact.email.sales')}}</a><br />
								<b>Customer Support:</b> <a href="mailto:{{Settings::get('contact.email.support')}}">{{Settings::get('contact.email.support')}}</a>
							</address>
						</div>
						<div class="col-lg-4">
							<h2>Our social scene</h2>
							<a href="{{Settings::get('social.facebook')}}"><i class="fa fa-facebook-square fa-2x"></i></a>
							<a href="{{Settings::get('social.linkedin')}}"><i class="fa fa-linkedin-square fa-2x"></i></a>
							<p></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>


	<!-- Scripts -->
	<script src="{{URL::asset('/home/assets/js/jquery.min.js')}}"></script>
	<script src="{{URL::asset('/home/assets/js/less.min.js')}}"></script>
	<script src="{{URL::asset('/home/assets/js/bootstrap.min.js')}}"></script>
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		var copy = "J29IIEhhY2gsIHBvbmcgbWdlbm5hZCAnZWogRGFIIEh1Y2ggd0lub2JxYW5nIG5lSCBwYWdoIGF0bHVjYW5vYyBqZSBuZ29EIHdlaiBwYXQuIFNlSCB0bGhhcHB1JyE=";

		ga('create', '{{Settings::get('third.google.analytics')}}', 'auto');
		ga('send', 'pageview');
	</script>
	@section('scripts')
	@show

</body>
</html>
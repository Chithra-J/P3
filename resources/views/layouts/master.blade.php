<!doctype html>
<html>
	<head>
		<title> {{-- Yield the title if it exists, otherwise default to 'Foobooks' --}}
			@yield('title','Dynamic Web Application Project P3') </title>
		<meta charset='utf-8'>
		<link href="/assets/css/P3.css" type='text/css' rel='stylesheet'>
		<link href="//netdna.bootstrapcdn.com/bootswatch/3.1.1/flatly/bootstrap.min.css" rel="stylesheet">
		<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/lettering.js/0.6.1/jquery.lettering.min.js"></script>

		{{-- Yield any page specific CSS files or anything else you might want in the head --}}
		@yield('head')

	</head>
	<body class="custom-background" data-spy="scroll" data-target="#full">
		<div class="container-fluid">
			<header class="row">
				<div class="navbar navbar-custom navbar-fixed-top">
					<div class="container">
						<a id="logo" class="center-block"  href="/P3"><h3 class="title">c Developer's Best Friend d</h3></a>
						<ul class="nav nav-justified nav-custom" >
							<li>
								<a href="/P3">Home</a>
							</li>
							<li>
								<a href="http://P1.chanchika.me">P1 Home</a>
							</li>
							<li>
								<a href="http://P2.chanchika.me">P2 Home</a>
							</li>
							<li>
								<a href="http://P4.chanchika.me">P4 Home</a>
							</li>
						</ul>
					</div>
				</div>
			</header>
			<div class="row wrapper" >
				<div class="col-sm-3" id="full">
					<ul class="nav nav-tabs nav-stacked" data-spy="affix" data-offset-top="160" data-offset-bottom="60">
						<li>
							<a id="Home" href="/P3">Home</a>
						</li>
						<li class="no-style">
							<br>
						</li>
						<li>
							<a id="RandomText" href="/P3/lorem-ipsum">Generate Random Text</a>
						</li>
						<li class="no-style">
							<br>
						</li>
						<li>
							<a id="RandomUser" href="/P3/user-generator">Generate Random User</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-9 main-nav">
					{{-- Main page content will be yielded here --}}
					@yield('content')
				</div>
			</div>
			<footer>
				<div class="navbar nav-footer navbar-fixed-bottom ">
					<div class="container" >
						<div class="row" >
							<div class="col-sm-1">
								<br><p class="footer-label">Powered by</p>
							</div>
							<div class="col-sm-6">
								<ul class="nav navbar-nav nav-custom-footer">
									<li>
										<a target="_blank" href="https://github.com/"><img class="footer-img" alt="GitHub" src="{{ asset('assets/images/github_logo.png') }}"></a>
									</li>
									<li>
										<a target="_blank" href="http://getbootstrap.com/"><img class="footer-img" alt="GitHub" src="{{ asset('assets/images/all-technology.png') }}"></a>
									</li>
									<li>
										<a target="_blank" href="https://laravel.com/"><img class="footer-img" alt="GitHub" src="{{ asset('assets/images/laravel.png') }}"></a>
									</li>
								</ul>
							</div>
							<div class="col-sm-5">
								<br><p class="footer-label-right">Dyanamic Web Application Project P3 by Chithra Jayakumar</p>
							</div>
						</div>
					</div>
				</div>

			</footer>
			<script>
				$(document).ready(function() {

					$('h3').lettering('words');

					$('ul.nav-tabs>li>a').click(function(e) {
						$("ul.nav-tabs>li").find(".active").removeClass("active");
						$(this).addClass("active");
					});
				});
			</script>
			{{-- Yield any page specific JS files or anything else you might want at the end of the body --}}
			@yield('body')
		</div>
	</body>
</html>
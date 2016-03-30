@extends('layouts.master')

@section('title')
Developer's Best Friend
@stop

{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific stylesheets.
--}}

@section('head')

@stop

@section('content')
<div class="panel panel-custom">
	<div class="panel-heading">
		<h4 class="panel-title index">Developer's Best Friend</h4>
	</div>
	<div class="panel-body index">
		This project is built using Laravel framework. It includes:
		<ol>
			<li>
				Creating a new Laravel application "Developer's Best Friend".
			</li>
			<li>
				Installing and using Composer packages.

				<ol>
					<li>
						guzzlehttp/guzzle
					</li>
					<li>
						joshtronic/php-loremipsum
					</li>
				</ol>
			</li>
			<li>
				Routing basics.
				<ol>
					<li>
						get
					</li>
					<li>
						post
					</li>
				</ol>
			</li>
			<li>
				Views.
				<ol>
					<li>
						To show random text generated.
					</li>
					<li>
						To show random user generated.
					</li>
				</ol>
			</li>
			<li>
				Deploying a Laravel app on a live server.
			</li>
		</ol>
	</div>
</div>
@stop

{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}

@section('body')
<script>
	$(document).ready(function() {
		$("ul.nav-tabs>li>").find(".active").removeClass("active");
		$('#Home').addClass("active");
	}); 
</script>
@stop


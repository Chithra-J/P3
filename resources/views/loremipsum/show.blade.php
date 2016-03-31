@extends('layouts.master')

@section('title')
Generate Random Text
@stop

{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific stylesheets.
--}}

@section('content')
	<div class="panel panel-custom">
		<div class="panel-heading">
			<h4 class="panel-title">Lorem Ipsum</h4>
		</div>
		<div class="panel-body">
			@foreach ($random_text as $text)
			{{$text}}
			<br>
			<br>
			@endforeach
			
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
		$('#RandomText').addClass("active");
	}); 
</script>
@stop


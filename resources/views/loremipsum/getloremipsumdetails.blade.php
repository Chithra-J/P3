@extends('layouts.master')

@section('title')
Developer's Best Friend
@stop

@section('head')

@stop

@section('content')
<div class="panel panel-custom">
	<div class="panel-heading">
		<h4 class="panel-title lorem-panel">Lorem Ipsum Input Selection</h4>
	</div>
	<div class="panel-body">
		<form method='POST' action='/P3/lorem-ipsum' id="lorem_ipsum_option" class="form-horizontal">
			<div class="row">
				<fieldset>
					<div class="col-md-6">
						<input type='hidden' name='_token' value='{{ csrf_token() }}'>
						<br>

						<input type='text' class="text-center" name='number_of_random_text' value='2' size="10" maxlength="3">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<div class="btn-group">
							<button name="input_type" class="btn dropdown-toggle" data-toggle="dropdown" >
								Paragraphs
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu" id="selected_option">
								<li>
									<a>Paragraphs</a>
								</li>
								<li>
									<a>Sentences</a>
								</li>
								<li>
									<a>Words</a>
								</li>
							</ul>
						</div>
						<br>
						<h5 class="help-block"> Enter number (2-100) </h5>
						@if(count($errors) > 0)
						<ul class="error-text">
							@foreach ($errors->all() as $error)
							<li>
								{{ $error }}
							</li>
							@endforeach
						</ul>
						@endif
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
					</div>
					<div class="col-md-6">
						<div id='lorem_tags'>
							<h5 class="option-text">More Options</h5>
							<div class="radio">
								<label>
									<input type="radio" name="optionsRadios" id="optionsRadios1" value="text" checked>
									Plain Text</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="optionsRadios" id="optionsRadios2" value="html">
									HTML</label>
							</div>
						</div>
						<div class="toggle-style">
							<h5 class="option-text">Add HTML tags</h5>
							<h5 class="help-block"> (when number of text requested is greater than number of tags choosen) </h5>
							<label class="checkbox-inline">
								<input type="checkbox" name="para" value="p">
								Add &lt;p&gt;</label>
							<label class="checkbox-inline">
								<input type="checkbox" name="italic" value="i">
								Add &lt;i&gt;</label>
							<label class="checkbox-inline">
								<input type="checkbox" name="bold" value="b">
								Add &lt;b&gt;</label>
							<br>
							<label class="checkbox-inline">
								<input type="checkbox" name="head" value="h1">
								Add &lt;h1&gt;</label>
							<label class="checkbox-inline">
								<input type="checkbox" name="underline" value="u">
								Add &lt;u&gt;</label>
							<label class="checkbox-inline">
								<input type="checkbox" name="link" value="a">
								Add &lt;a&gt;</label>
						</div>
					</div>
				</fieldset>
			</div>
			<br>
			<input class='btn btn-default btn-sm' type='submit' value='Get some random text'>
		</form>
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
		$(".dropdown-menu li a")[0].click();
		$(".radio label input")[0].click();
	});
	$(".dropdown-menu li a").click(function() {
		var selText = $(this).text();
		$(this).parents('.btn-group').find('.dropdown-toggle').html(selText + ' <span class="caret"></span>');
		$('#lorem_ipsum_option').append('<input type="hidden" name="lorem_ipsum_option" value="' + selText + '">');

	});
	$(".radio label input").click(function() {
		var selText = this.value;
		if (selText == "html")
			$(".toggle-style").show();
		else
			$(".toggle-style").hide();
	}); 
</script>
@stop


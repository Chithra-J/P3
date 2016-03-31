@extends('layouts.master')

@section('title')
Developer's Best Friend
@stop

@section('head')

@stop

@section('content')
<div class="panel panel-custom">
	<div class="panel-heading">
		<h4 class="panel-title lorem-panel">Random User Input Selection</h4>
	</div>
	<div class="panel-body">
		<form method='POST' action='/P3/user-generator' id="random_user_option" class="form-horizontal">
			<div class="row">
				<fieldset>
					<div class="col-md-6">
						<input type='hidden' name='_token' value='{{ csrf_token() }}'>
						<br>

						<input type='text' class="text-center" name='number_of_users' value='2' size="10" maxlength="3">
						<br>
						<h5 class="help-block"> Enter number (2-50) </h5>
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
						<div id='user_tags'>
							<h5 class="option-text">More Options</h5>
							<h5 class="option-text-sm">Choose Nationality</h5>
							<div class="radio">
								<label>
									<input type="radio" name="optionsCountry" value="US" checked>
									United States of America (US)</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="optionsCountry" value="GB">
									Great Britain (GB)</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="optionsCountry" value="CA">
									Canada (CA)</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="optionsCountry" value="FR">
									France (FR)</label>
							</div>
							<br>
						</div>
						<div>
							<h5 class="option-text-sm">Choose Gender</h5>
							<div>
								<div class="radio">
									<label>
										<input type="radio" name="optionsGender" value="female">
										Female</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="optionsGender" value="male">
										Male</label>
								</div>
							</div>
						</div>
					</div>

				</fieldset>
			</div>
			<br>
			<input class='btn btn-default btn-sm' type='submit' value='Get some random users'>
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
		$('#RandomUser').addClass("active");
		$(".radio label input")[0].click();
	});
	$(".dropdown-menu li a").click(function() {
		var selText = $(this).text();
		$(this).parents('.btn-group').find('.dropdown-toggle').html(selText + ' <span class="caret"></span>');
		$('#random_user_option').append('<input type="hidden" name="random_user_option" value="' + selText + '">');
	});

</script>
@stop


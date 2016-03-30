@extends('layouts.master')

@section('title')
Generate Random Users
@stop

{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific stylesheets.
--}}

@section('head')

@stop
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="wrapper">
			<?php $id_count = 1; ?>
			<h4 id="user_gen"> User Details &nbsp; &nbsp; &nbsp; <a href="#" class="btn btn-info max">Maximum</a>&nbsp; &nbsp; &nbsp;<a href="#" class="btn btn-info mid">Medium</a>&nbsp; &nbsp; &nbsp;<a href="#" class="btn btn-info min">Minimum</a></h4>
			<br>
			<br>
			<div class="accordion" id="accordionid">
				<div class="accordion-group">
					@foreach ($users as $user)
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionid" href="user-generator#{{ $id_count }}"> {{ $id_count }}&nbsp;. &nbsp; &nbsp; {{ $user -> getTitle() }} &nbsp; {{$user -> getName()}}<img class="img-circle" src="{{$user -> getThumPicture()}}" alt="Thumbnail picture"/></a>
					</div>
					<div id="{{ $id_count }}" class="accordion-body collapse">
						<div class="row accordion-inner" >
							<div class="col-md-12">
								<br>
								<img src="{{$user -> getPicture()}}" alt="Small picture"/>
								<ul>
									<li class="list-detail">
										First Name: {{$user -> getFirstName()}}
									</li>
									<li class="list-detail">
										Last Name: {{$user -> getLastName()}}
									</li>
									<li class="list-detail">
										Gender: {{$user -> getGender()}}
									</li>
									<li>
										Date Of Birth: {{ date('Y-m-d', $user -> getDateOfBirth()) }}
									</li>
								</ul>
							</div>
							<br>
							<div class="row more-details">
								<button type="button" class="btn btn-xs btn-primary" data-toggle="collapse" data-target="#{{$user -> getLastName()}}{{ $id_count }}" aria-expanded="false" aria-controls="{{$user -> getLastName()}}{{ $id_count }}">
									More Details
								</button>
								<div id="{{$user -> getLastName()}}{{ $id_count }}" class="collapse list-body">
									<div class="col-md-5 list-detail well">
										<br>
										<h5>Address:</h5>
										<ul>
											<li>
												Street Name: {{$user -> getStreetAddress()}}
											</li>
											<li>
												City: {{$user -> getCity()}}
											</li>
											<li>
												State: {{$user -> getState()}}
											</li>
											<li>
												Zip: {{$user -> getZip()}}
											</li>
											<li>
												Nationality: {{$user -> getNationality()}}
											</li>
										</ul>
									</div>
									<div class="col-md-5 well">
										<br>
										<h5>Professtional Details:</h5>
										<ul>
											<li>
												Email : {{$user -> getEmail()}}
											</li>
											<li>
												Username: {{$user -> getUsername()}}
											</li>
											<li>
												Password: {{$user -> getPassword()}}
											</li>
											<li>
												Home: {{$user -> getPhone()}}
											</li>
											<li>
												Mobile: {{$user -> getCell()}}
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<br>
					<?php $id_count++; ?>
					@endforeach
				</div>
			</div>
		</div>
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
	});

	$(".btn[data-toggle='collapse']").click(function() {
		if ($(this).text() == 'Less Details') {
			$(this).text('More Details');
		} else {
			$(this).text('Less Details');
		}
	});
	$('.min').click(function() {
		$('.accordion-body.in').collapse('hide');
	});
	$('.max').click(function() {
		$('.accordion-body:not(".in")').collapse('show');
		$('.btn-xs').text('Less Details');
		$('.list-body:not(".in")').collapse('show');
	});
	$('.mid').click(function() {
		$('.accordion-body:not(".in")').collapse('show');
		$('.btn-xs').text('More Details');
		$('.list-body.in').collapse('hide');
	});
	$('#nav').affix({
	});

</script>
@stop

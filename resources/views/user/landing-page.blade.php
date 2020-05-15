@extends('user/app')

@section('bg-img',asset('user/img/home-bg.jpg'))
@section('title','Bitfumes Blog')
@section('sub-heading','Learn Together and Grow Together')
@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
	<style>
		.fa-thumbs-up:hover{
			color:#f41115;
		}
	</style>
@endsection
@section('main-content')
	<!-- Main Content -->
	<div class="intro-header">
	<div class="container-full" style="margin-top:5% !important;">
	    <div class="row home-page">
			<!--logo section-->
            <div class="col-md-6 hl center"> 
				<img src="{{asset('uploads/img/logo.png')}}" class="img-responsive" alt="Pexil logo"> 
			</div>
			<!--image banner section-->
			<div class="col-md-6 hr t-hr">
				<div class="img"><img src="{{asset('user/img/home-bg.jpg')}}" class="img-fluid" alt="Banner Image"></div>
			</div>
			<!--vector logo section-->
			<div class="col-md-6 hbl">
				<div class="img">
					<img src="{{asset('uploads/img/vector-logo.png')}}" class="img-fluid" alt="RVector Logo">
				</div>
				<div class="col-xs-10 col-xs-offset-1 vector-search">
					<form action="{{ route('search') }}" method="POST" role="search">
						
					<div class="input-group">
					<input class="form-control" placeholder="Find a logo here" name="query" id="ed-srch-term" type="text">
					<div class="input-group-btn">
					<button type="submit" id="searchbtn">
						<i class="fa fa-search" aria-hidden="true"></i> </button>
					</div>
					</div>
					</form>
					</div>
			</div>
			<!--events section-->
            <div class="col-md-6 hbr">
                <div class="row">
                    <div class="col-md-4 h-updates">
						<img src="{{asset('uploads/img/message.png')}}" class="img-fluid" alt="RVector Logo">
						<h3 style="color:#444">Heve Your Say</h3>
						<h3> It's The Blog</h3>
						<p style="margin-top:16px">Daily posts of what's trending in the creative field in Africa at large</p>
						<p></p>
						<p></p>
						<p>Daily posts of what's trending in the creative field in Africa at large</p>
					</div>
                    <div class="col-md-4 h-events">
						<div style="margin-top:47px;"></div>
						<div>
							<h3>Hook Up</h3>
							@foreach ($hookups as $hookups)
							@if ($loop->first)
							<p>{{$hookups->company}}</p>
							@endif
							@endforeach
							<hr>
						</div>
						<div>
							<h3>Jargon <br/><br/><br/><br/><br/>Buster</h3>
							@foreach ($jargons as $jargons)
							@if ($loop->first)
							<p>{{$jargons->jargon_title}}</p>
							@endif
							@endforeach
							<hr>
						</div>
						<div>
							<h3>Events</h3>
							@foreach ($events as $events)
							@if ($loop->first)
							<p>{{$events->events_title}}</p>
							@endif
							@endforeach
						</div>
                    </div>
                </div>
            </div>
          </div>
	</div>

@endsection
@section('footer')
	<script src="{{ asset('js/app.js') }}"></script>
@endsection
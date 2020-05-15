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
	<div class="container">
    <!--Main row-->
    <div class="row">
    <div class="col-md-3 col-xs-12 col-sm-5 col-lg-3">
      <ul class="list-group">
        <li class="list-group-item"><a href="{{ route('profile.profile', Auth::user()->id) }}"><i class="fa fa-eye" aria-hidden="true"></i>
          View Profile</a></li>
        <li class="list-group-item"><a href="{{ route('profile.profileEdit', $user->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
           Edit Profile</a></li>
        <li class="list-group-item"><a href="/changePassword"><i class="fa fa-key" aria-hidden="true"></i>
          Change Password</a></li>
      </ul>
    </div>
    <div class="col-md-9 col-xs-12 col-sm-6 col-lg-9" >
      <!--inner row-->
    <div class="row">
      <div class="panel panel-default">
      <div class="panel-heading">  <h4 >Edit User Profile</h4></div>
      <div class="panel-body">
      <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
      <img alt="User Pic" src="/uploads/avatars/{{Auth::user()->avatar}}" id="profile-image1" class="img-circle img-responsive"> 
      <form enctype="multipart/form-data" action="{{route('profile.updateAvatar')}}" method="POST">
        <label>Upload Avatar</label>
        <input type="file" name="avatar">
        <input type="hidden" name="_token" value="{{ csrf_token() }}"><br/>
        <input type="submit" value="Update Avatar" class="btn btn-sm btn-primary">
    
      </form>
      </div>
      <div class="col-lg-offset-1 col-md-7 col-xs-12 col-sm-6 col-lg-7" >
          <!-- form start -->
		  <form role="form" action="{{ route('profile.update',Auth::user()->id) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('POST') }}
              <div class="box-body">
              <div >
                <div class="form-group">
                  <label for="name">User Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="User Name" value="@if (old('name')){{ old('name') }}@else{{ $user->name }}@endif">
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="email" value="@if (old('email')){{ old('email') }}@else{{ $user->email }}@endif">
                </div>

                <div class="form-group">
                  <label for="phone">Phone</label>
                  <input type="text" class="form-control" id="phone" name="phone" placeholder="phone" value="@if (old('phone')){{ old('phone') }}@else{{ $user->phone }}@endif">
                </div>

                <div class="form-group">
                  <label for="phone">Portfolio </label>
                  <input type="text" class="form-control" id="portfolio" name="portfolio" placeholder="portfolio" value="@if (old('portfolio')){{ old('portfolio') }}@else{{ $user->portfolio}}@endif">
                </div>

                <div class="form-group">
                  <label for="phone">Location</label>
                  <input type="text" class="form-control" id="location" name="location" placeholder="location" value="@if (old('location')){{ old('location') }}@else{{ $user->location}}@endif">
                </div>

                <div class="form-group">
                  <label for="phone">Instagram</label>
                  <input type="text" class="form-control" id="instagram" name="instagram" placeholder="instagram" value="@if (old('instagram')){{ old('instagram') }}@else{{ $user->instagram}}@endif">
                </div>

                <div class="form-group">
                  <label for="phone">Twitter </label>
                  <input type="text" class="form-control" id="twitter" name="twitter" placeholder="twitter" value="@if (old('twitter')){{ old('twitter') }}@else{{ $user->twitter}}@endif">
                </div>

                <div class="form-group">
                  <label for="phone">Bio</label>
                  <textarea rows="4" cols="50" class="form-control" id="bio" name="bio" placeholder="bio" value="@if (old('bio')){{ old('bio') }}@else{{ $user->bio}}@endif">@if (old('bio')){{ old('bio') }}@else{{ $user->bio}}@endif</textarea>
                </div>

                </div>

              <div class="form-group">
                <button type="submit" class="btn btn-primary">Update </button>
                <a href='{{ route('submitPhoto') }}' class="btn btn-warning">Back</a>
              </div>
                
              </div>
          
        </div>

            </form>
      </div>
  </div>
  </div>
  <!--inner row-->
    </div>
  </div>
  <!--Main row end-->
  </div>
	<hr>
@endsection
@section('footer')
	<script src="{{ asset('js/app.js') }}"></script>
@endsection
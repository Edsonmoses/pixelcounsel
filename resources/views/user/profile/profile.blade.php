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
    <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
      <ul class="list-group">
        <li class="list-group-item"><a href="{{ route('profile.profile', Auth::user()->id) }}"><i class="fa fa-eye" aria-hidden="true"></i>
          View Profile</a></li>
        <li class="list-group-item"><a href="{{ route('profile.profileEdit',$user->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
           Edit Profile</a></li>
        <li class="list-group-item"><a href="/changePassword"><i class="fa fa-key" aria-hidden="true"></i>
          Change Password</a></li>
      </ul>
    </div>
    <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8" >
      <!--inner row-->
    <div class="row">
      <div class="panel panel-default">
      <div class="panel-heading">  <h4 >User Profile</h4></div>
      <div class="panel-body">
      <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
      <img alt="User Pic" src="/uploads/avatars/{{Auth::user()->avatar}}" id="profile-image1" class="img-circle img-responsive"> 
      </div>
      <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8" >
          <div class="container" >
            <h2>{{$user['name']}}</h2>
            <p>an   <b> Employee</b></p>
          </div>
          <hr>
          <ul class="container details" >
            <li><p><span class="glyphicon glyphicon-user one" style="width:50px;"></span>{{$user['name']}}</p></li>
            <li><p><span class="glyphicon glyphicon-envelope one" style="width:50px;"></span>{{$user['email']}}</p></li>
          </ul>
          <hr>
          <div class="col-sm-8 col-xs-8 tital " >Date Of Joining: {{$user['created_at']->format('d M Y')}}</div>
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
<script type="text/javascript">
  document.title =`{{$user['name']}}'s Frame54 Profile`;
</script>
@endsection
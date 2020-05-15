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
        <li class="list-group-item"><a href="{{ route('profile.profileEdit',Auth::user()->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
           Edit Profile</a></li>
        <li class="list-group-item"><a href="/changePassword"><i class="fa fa-key" aria-hidden="true"></i>
          Change Password</a></li>
      </ul>
    </div>
    <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8" >
      <!--inner row-->
    <div class="row">
      <div class="panel panel-default">
      <div class="panel-heading">  <h4 >Change password</h4></div>
      <div class="panel-body">
      <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8" >
          <div class="container" >
            @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                    <form class="form-horizontal" method="POST" action="{{ route('changePassword') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                
                            <div class="col-md-5">
                                <label for="new-password" class="control-label">Current Password</label>
                                <input id="current-password" type="password" class="form-control" name="current-password" required>

                                @if ($errors->has('current-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                            
                            <div class="col-md-5">
                                <label for="new-password" class="control-label">New Password</label>
                                <input id="new-password" type="password" class="form-control" name="new-password" required>

                                @if ($errors->has('new-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                
                            <div class="col-md-5">
                                <label for="new-password-confirm" class="control-label">Confirm New Password</label>
                                <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-5">
                                <button type="submit" class="btn btn-primary">
                                    Change Password
                                </button>
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
<script type="text/javascript">
  document.title =`{{$user['name']}}'s Frame54 Profile`;
</script>
@endsection
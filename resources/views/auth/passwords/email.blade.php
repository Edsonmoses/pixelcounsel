@extends('layouts.app')

@section('content')
<div class="container login-section">
    <div class="wrapper fadeInDown">
      <div id="formContent">
        <!-- Tabs Titles -->
    
        <!-- Icon -->
        <div class="fadeIn first"  style="padding-top:10px;">
            <div class="panel-heading">Reset Password</div>
            @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
        </div>
    
        <!-- Login Form -->
        <form role="form" method="POST" action="{{ route('password.email') }}">
          {{ csrf_field() }}
          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
          <input type="email" id="login" class="fadeIn second" name="email" value="{{ old('email') }}" placeholder="E-Mail Address" required autofocus>
            @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
          </div>
          <input type="submit" class="fadeIn fourth" value=" Send Password Reset Link">
        </form>
       
      </div>
    </div>
  </div>

@endsection

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
        <form role="form" method="POST" action="{{ route('password.request') }}">
          {{ csrf_field() }}

          <input type="hidden" name="token" value="{{ $token }}">

          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
          <input type="email" id="email" class="fadeIn second" name="email" value="{{  $email or old('email') }}" placeholder="E-Mail Address" required autofocus>
            @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
          </div>
          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <input type="password" id="password" class="fadeIn second" name="password" placeholder="Password" required>
              @if ($errors->has('password'))
              <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
              </span>
              @endif
            </div>
            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <input type="password" id="password-confirm" class="fadeIn second" name="password_confirmation" placeholder="Password Confirm" required>
  
                @if ($errors->has('password_confirmation'))
                  <span class="help-block">
                      <strong>{{ $errors->first('password_confirmation') }}</strong>
                  </span>
                  @endif
                </div>
          <input type="submit" class="fadeIn fourth" value=" Reset Password">
        </form>
       
      </div>
    </div>
  </div>

@endsection

@extends('user/app')

@section('bg-img',asset('user/img/contact-bg.jpg'))
@section('head')

@endsection
@section('title','Login Here')
@section('sub-heading','')

@section('main-content')

<!-- Post Content -->
    <div class="container login-section" style="margin-top:5%">
      <div class="wrapper fadeInDown">
        <div id="formContent">
          <!-- Tabs Titles -->
      
          <!-- Icon -->
          <div class="fadeIn first"  style="padding-top:10px;">
            <img  style="display:none" src="{{URL(Session::get('avatar'))}}" id="icon" alt="User Icon" />
          </div>
      
          <!-- Login Form -->
          <form role="form" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <input type="email" id="login" class="fadeIn second" name="email" value="{{ old('email') }}" placeholder="E-Mail Address" required autofocus>
              @if ($errors->has('email'))
              <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
              </span>
              @endif
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <input type="password" id="password" class="fadeIn third" name="password" placeholder="password" required>
            @if ($errors->has('password'))
                           <span class="help-block">
                               <strong>{{ $errors->first('password') }}</strong>
                           </span>
                       @endif
            </div>
            <label>
            <input type="checkbox" class="fadeIn third" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
            </label><br/>
            <input type="submit" class="fadeIn fourth" value="Log In">
          </form>
      
          <!-- Remind Passowrd -->
          <div id="formFooter">
            <a href='{{ route('register') }}' class="underlineHover">
              Register
           </a>
           <a href="#"> | </a>
            <a class="underlineHover" href="{{ route('password.request') }}">
              Forgot Password?
            </a>
          </div>
      
        </div>
      </div>
    </div>
<hr>
@endsection
@section('footer')
@endsection
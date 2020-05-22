@extends('user/app')

@section('bg-img',asset('user/img/contact-bg.jpg'))
@section('head')

@endsection
@section('title','Register Here')
@section('sub-heading','')

@section('main-content')
<!-- Post Content -->
<article>
    <div class="container login-section" style="margin-top:5%">
        <div class="wrapper fadeInDown">
            <div id="formContent">
              <!-- Tabs Titles -->
                    
              <!-- Login Form -->
              <form role="form" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                <p></p>
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        @if(!empty($name))
                            <input id="name" type="text" class="fadeIn second" name="name" value="{{$name}}" required autofocus>
                        @else
                        <input type="text" id="name" class="fadeIn second" name="name" value="{{ old('name') }}" placeholder="Name" required autofocus>
                        @endif 
                       @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    @if(!empty($email))

                      <input id="email" type="email" class="fadeIn second" name="email" value="{{$email}}" required>

                    @else
                       <input type="email" id="email" class="fadeIn second" name="email" value="{{ old('email') }}" placeholder="E-Mail Address" required autofocus>
                   @endif
                       @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password" required>
                @if ($errors->has('password'))
                               <span class="help-block">
                                   <strong>{{ $errors->first('password') }}</strong>
                               </span>
                           @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="password" id="password-confirm" class="fadeIn third" name="password_confirmation" placeholder="Confirm Password" required>
                       </div>
                <label>
                <input type="submit" class="fadeIn fourth" value="Register">
              </form>
              <div class="form-group">

                <label for="name" class="fadeIn fourth">Register With</label>

                <div class="col-md-12 reg-a">

                    <a href="{{ url('login/facebook') }}" class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>
                    <p style="display: none">
                    <a href="{{ url('login/twitter') }}" class="btn btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></a>

                    <a href="{{ url('login/google') }}" class="btn btn-social-icon btn-google-plus"><i class="fa fa-google-plus"></i></a>

                    <a href="{{ url('login/linkedin') }}" class="btn btn-social-icon btn-linkedin"><i class="fa fa-linkedin"></i></a>

                    <a href="{{ url('login/github') }}" class="btn btn-social-icon btn-github"><i class="fa fa-github"></i></a>

                    <a href="{{ url('login/bitbucket') }}" class="btn btn-social-icon btn-bitbucket"><i class="fa fa-bitbucket"></i></a>
                    </p>
                </div>

            </div>
          </div>
    </div>
</article>

<hr>
@endsection
@section('footer')
@endsection

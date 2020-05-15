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
                <input type="text" id="name" class="fadeIn second" name="name" value="{{ old('name') }}" placeholder="Name" required autofocus>
                        @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" id="email" class="fadeIn second" name="email" value="{{ old('email') }}" placeholder="E-Mail Address" required autofocus>
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
          
          </div>
    </div>
</article>

<hr>
@endsection
@section('footer')
@endsection

 <!-- Navigation -->
 <nav class="navbar navbar-default navbar-customs navbar-fixed-top" style="background:#fff">
    <div class="container-fluid topnav">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                Menu <i class="fa fa-bars"></i>
            </button>
            <!--<a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>-->
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            
            <ul class="nav navbar-nav navbar-right">
             
                <li>
                    @if (Auth::guest())
                        <a href="{{ route('login') }}">Login</a>
                    @else
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    @endif
                </li>
                <li class="divider">
                    <a href="{{  url('/') }}">|</a>
               </li>
                <li>
                    @if (Auth::guest())
                        <a href="{{ url('/') }}"></a>
                    @else
                    <a href="{{ route('profile.profile', Auth::user()->id) }}">
                         <img alt="{{ Auth::user()->name }}" src="/uploads/avatars/{{Auth::user()->avatar}}" id="profile-image2" class="img-circle img-responsive">
                      <!--View Profile-->
                     </a>
                    @endif
                </li>
                <li class="fl">
                    @if (Auth::guest())
                     <a href="{{ route('register') }}">Sign Up</a>
                     @endif
                </li>
                <li class="divider">
                    <a href="{{  url('/') }}">|</a>
               </li>
                <li class="fb">
                    @if (Auth::guest())
                     <a href="{{  url('login/facebook') }}"><i class="fa fa-facebook-square" aria-hidden="true"></i>  Login with facebook</a>
                     <p style="display: none">
                     <a href="{{ url('login/twitter') }}"><i class="fa fa-twitter"></i> Login with twitter</a>
                     <a href="{{ url('login/google') }}"><i class="fa fa-google-plus"></i>Login with google plus</a>
                     <a href="{{ url('login/linkedin') }}"><i class="fa fa-linkedin"></i>Login with linkedin</a>
                     <a href="{{ url('login/github') }}"><i class="fa fa-github"></i>Login with github</a>
                     <a href="{{ url('login/bitbucket') }}"><i class="fa fa-bitbucket"></i>Login with bitbucket</a>
                    </p>
                    @endif
                </li>
                <li class="menu-space-r">

                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->

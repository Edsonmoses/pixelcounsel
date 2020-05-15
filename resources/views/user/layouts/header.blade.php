 <!-- Navigation -->
 <nav class="navbar navbar-default navbar-customs navbar-fixed-top" style="background:#fff">
    <div class="container-fluid topnav">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="{{ url('/home') }}"><img src="{{asset('uploads/img/footer-logo.png')}}" class="img-responsive" alt="{{ config('app.name', 'Laravel') }}"> </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{{route('vector.vectors')}}">VECTOR LOGOS</a>
                </li>
                <li>
                    <a href="{{route('hookup')}}">HOOKUP</a>
                </li>
                <li>
                    <a href="{{route('jorgon')}}">JARGON BUSTER</a>
                </li>
                <li>
                    <a href="{{route('events')}}">EVENTS</a>
                </li>
                <li class="blog-icon">
                    <a href="{{route('blog')}}">BLOG 
                    </a>
                    <i class="fa fa-comments" aria-hidden="true"></i>
                </li>
                <li class="ms">
                    <a href="#"></a>
                </li>
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
                <li class="divider">
                    <a href="{{  url('/') }}">|</a>
               </li>
                <li>
                    @if (Auth::guest())
                     <a href="{{ route('register') }}" style="margin-left:-40px">Join Us</a>
                     @endif
                </li>
                <li class="divider">
                    @if (Auth::guest())
                    <a href="{{  url('/') }}">|</a>
                    @endif 
               </li>
                <li class="fb">
                    @if (Auth::guest())
                     <a href="{{url('/redirect')}}"><i class="fa fa-facebook-square" aria-hidden="true"></i>  Login with facebook</a>
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
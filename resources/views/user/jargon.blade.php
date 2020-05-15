@extends('user/layouts/app')

@section('bg-img',asset('user/img/contact-bg.jpg'))
@section('head')

@endsection
@section('title','JARGON BUSTER')
@section('sub-heading','A comprehensive dictionary of web, architecture, design and printing terms')

@section('main-content')
<div class="vector-actives"><div class="jargon-arrows"></div></div>
<header class="intro-header hintro-header-hookup">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-9">
                <div class="heading-style">
                    <h1>@yield('title')</h1>
                    <span class="sub-heading">@yield('sub-heading')</span>
                </div>
            </div>
            <div class="col-lg-5 col-md-5">
                <div class="vector-search heading-mr">
          <form action="{{ route('search') }}" method="POST" role="search">
            
          <div class="input-group">
          <input class="form-control" placeholder="Find a logo here" name="query" id="ed-srch-term" type="text">
          <div class="input-group-btn">
          <button type="submit" id="searchbtn">
            <i class="fa fa-search" aria-hidden="true"></i> </button>
          </div>
          </div>
          </form>
          </div>
            </div>
        </div>
    </div>
  </header>
	<!-- Main Content -->
	<div class="container-full">
		<div class="bottom-menu">
            <ul class="nav navbar-nav navbar-center">
                <li>
                    <a href="architecture">ARCHITECTURE</a>
                </li>
                <li>
                    <a href="graphicdesign">GRAPHIC DESIGN</a>
                </li>
                <li>
                    <a href="web-design">WEB DESIGN</a>
                </li>
                <li>
                    <a href="fashion-design">FASHION DESIGN</a>
                </li>
                <li>
                    <a href="interior-design">INTERIOR DESIGN</a>
                </li>
			</ul>
		</div>
	</div>
		<div class="container">
            <div class="bottom-menu-2">
                <p style="margin: 20px 0 -5px 16px;">Glossary of Architectural Terms</p>
            <ul class="nav navbar-nav">
                <li>
                    <a href="architecture">A</a>
                </li>
                <li class="divider">
                    <a href="#">|</a>
                </li>
                <li>
                    <a href="graphicdesign">B</a>
                </li>
                <li class="divider">
                    <a href="#">|</a>
                </li>
                <li>
                    <a href="web-design">C</a>
                </li>
                <li class="divider">
                    <a href="#">|</a>
                </li>
                <li>
                    <a href="fashion-design">D</a>
                </li>
                <li class="divider">
                    <a href="#">|</a>
                </li>
                <li>
                    <a href="interior-design">E</a>
                </li>
                <li class="divider">
                    <a href="#">|</a>
                </li>
                <li>
                    <a href="architecture">F</a>
                </li>
                <li class="divider">
                    <a href="#">|</a>
                </li>
                <li>
                    <a href="graphicdesign">G</a>
                </li>
                <li class="divider">
                    <a href="#">|</a>
                </li>
                <li>
                    <a href="web-design">H</a>
                </li>
                <li class="divider">
                    <a href="#">|</a>
                </li>
                <li>
                    <a href="fashion-design">I</a>
                </li>
                <li class="divider">
                    <a href="#">|</a>
                </li>
                <li>
                    <a href="interior-design">J</a>
                </li>
                <li class="divider">
                    <a href="#">|</a>
                </li>
                <li>
                    <a href="architecture">K</a>
                </li>
                <li class="divider">
                    <a href="#">|</a>
                </li>
                <li>
                    <a href="graphicdesign">L</a>
                </li>
                <li class="divider">
                    <a href="#">|</a>
                </li>
                <li>
                    <a href="web-design">M</a>
                </li>
                <li class="divider">
                    <a href="#">|</a>
                </li>
                <li>
                    <a href="fashion-design">N</a>
                </li>
                <li class="divider">
                    <a href="#">|</a>
                </li>
                <li>
                    <a href="interior-design">O</a>
                </li>
                <li class="divider">
                    <a href="#">|</a>
                </li>
                <li>
                    <a href="architecture">P</a>
                </li>
                <li class="divider">
                    <a href="#">|</a>
                </li>
                <li>
                    <a href="graphicdesign">Q</a>
                </li>
                <li class="divider">
                    <a href="#">|</a>
                </li>
                <li>
                    <a href="web-design">R</a>
                </li>
                <li class="divider">
                    <a href="#">|</a>
                </li>
                <li>
                    <a href="fashion-design">S</a>
                </li>
                <li class="divider">
                    <a href="#">|</a>
                </li>
                <li>
                    <a href="interior-design">T</a>
                </li>
                <li class="divider">
                    <a href="#">|</a>
                </li>
                <li>
                    <a href="architecture">U</a>
                </li>
                <li class="divider">
                    <a href="#">|</a>
                </li>
                <li>
                    <a href="graphicdesign">V</a>
                </li>
                <li class="divider">
                    <a href="#">|</a>
                </li>
                <li>
                    <a href="web-design">W</a>
                </li>
                <li class="divider">
                    <a href="#">|</a>
                </li>
                <li>
                    <a href="fashion-design">X</a>
                </li>
                <li class="divider">
                    <a href="#">|</a>
                </li>
                <li>
                    <a href="interior-design">Y</a>
                </li>
                <li class="divider">
                    <a href="#">|</a>
                </li>
                <li>
                    <a href="architecture">Z</a>
                </li>
            </ul>
            </div>
            <br/>
	    <div class="row" id="jarg">
            @foreach ($jargons as $jargons)
            {!!html_entity_decode($jargons->jargon_body)!!}
			@endforeach
	    </div>
	</div>

    <div style="height: 50px"></div>
@endsection
@section('footer')
@endsection

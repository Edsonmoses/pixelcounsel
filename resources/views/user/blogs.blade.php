@extends('user/layouts/app')

@section('bg-img',asset('user/img/contact-bg.jpg'))
@section('head')

@endsection
@section('title','JARGON BUSTER')
@section('sub-heading','A comprehensive dictionary of web, architecture, design and printing terms')

@section('main-content')
<div class="vector-actives"><div class="blogs-arrows"></div></div>
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
          
          </div>
      </div>
  </div>
</header>
	<!-- Main Content -->
	<div class="container-full">
			<div class="container">
	    <div class="row">
		<div class="gal">
            @foreach ($posts as $posts)
				<a href="{{ $posts->slug }}"><img src= "{{ Storage::url($posts->image)}}" alt=""></a>
			@endforeach
            </div>
	    </div>
	</div>


@endsection
@section('footer')
@endsection

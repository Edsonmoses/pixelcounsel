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
	    <div class="row" id="app">
	        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
	            <posts 
				v-for='value in blog'
				:image=value.image
	            :title=value.title
	            :subtitle=value.subtitle
	            :created_at=value.created_at
	            :key=value.index
	            :post-id = value.id
	            login = "{{ Auth::check() }}"
	            :likes = value.likes.length
	            :slug = value.slug
	            ></posts>
	            <hr>
	            <!-- Pager -->
	            <ul class="pager">
	                <li class="next">
	                	{{ $posts->links() }}
	                </li>
	            </ul>
	        </div>
	    </div>
	</div>


@endsection
@section('footer')
<script src="{{ asset('js/app.js') }}"></script>
@endsection

@extends('user/layouts/app')

@section('bg-img',asset('user/img/contact-bg.jpg'))
@section('head')

@endsection
@section('title','HOOK UP')
@section('sub-heading','Collection of career changing jobs in Africa for your picking')

@section('main-content')
<div class="vector-actives"><div class="hookup-arrows"></div></div>
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
		<div class="hook">
            <div class="container">
                <div class="row">
                <div class="col-lg-5 col-md-5 hook-search">
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
                    <div class="col-lg-12 col-md-12">
                        <form action="#">
                            <div class="radio-inline">
                              <label class="radio-inline" for="executive">
                                <input type="radio" class="form-check-input" id="executive" name="optradio" value="executive" checked>executive
                              </label>
                            </div>
                            <div class="radio-inline">
                              <label class="radio-inline" for="senior">
                                <input type="radio" class="form-check-input" id="senior" name="optradio" value="senior">senior
                              </label>
                            </div>
                            <div class="radio-inline">
                                <label class="radio-inline" for="middle">
                                  <input type="radio" class="form-check-input" id="middle" name="optradio" value="middle" checked>middle
                                </label>
                              </div>
                              <div class="radio-inline">
                                <label class="radio-inline" for="junior">
                                  <input type="radio" class="form-check-input" id="junior" name="optradio" value="junior">junior
                                </label>
                              </div>
                              <div class="radio-inline">
                                <label class="radio-inline" for="freelance">
                                  <input type="radio" class="form-check-input" id="freelance" name="optradio" value="freelance" checked>freelance
                                </label>
                              </div>
                              <div class="radio-inline">
                                <label class="radio-inline" for="intern">
                                  <input type="radio" class="form-check-input" id="intern" name="optradio" value="intern">intern / pro bono
                                </label>
                              </div>
                          </form>
                          
                    </div>
                </div>
            </div>
		</div>
	</div>
		<div class="container">
	    <div class="row" id="app">
        <table class="table no-margin text-left table-bordered">
            @foreach ($hookups as $hookups)
              <tr>
                <td class="company-hookup"><h3>{{ $hookups->company}}</h3></td>
                <td class="position-hookup"><h3>{{ $hookups->position}}</h3><br/>
                    <small>{{ $hookups->job_description}}</small></td>
                <td class="location-hookup"><h3>{{ $hookups->job_locations}}</h3></td>
              </tr>
		       	@endforeach
          </tbody>
        </table> 
	    </div>
  </div>
  <div style="height: 50px"></div>
@endsection
@section('footer')
@endsection

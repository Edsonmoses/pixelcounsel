@extends('user/layouts/app')

@section('bg-img',asset('user/img/contact-bg.jpg'))
@section('head')

@endsection
@section('title','VECTOR LOGOS')
@section('sub-heading','Online vector logo collection of brands in Africa')

@section('main-content')
<header class="intro-header intro-header-vector">
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
<header class="intro-header intro-header-vector-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <div class="vector-search" style="margin:50px 0 0 0">
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
            <div class="col-lg-4 col-md-4">
                <div class="heading-style">
                </div>
            </div>
            
        </div>
    </div>
</header>
	<!-- Main Content -->
	<div class="container">

   

        <div class="panel panel-primary">
    
          <div class="panel-heading"><h2>laravel 6 file upload example - ItSolutionStuff.com.com</h2></div>
    
          <div class="panel-body">
    
       
    
            @if ($message = Session::get('success'))
    
            <div class="alert alert-success alert-block">
    
                <button type="button" class="close" data-dismiss="alert">×</button>
    
                    <strong>{{ $message }}</strong>
    
            </div>
    
            <img src="uploads/EPSs{{ Session::get('vectors_image') }}">
    
            @endif
    
      
    
            @if (count($errors) > 0)
    
                <div class="alert alert-danger">
    
                    <strong>Whoops!</strong> There were some problems with your input.
    
                    <ul>
    
                        @foreach ($errors->all() as $error)
    
                            <li>{{ $error }}</li>
    
                        @endforeach
    
                    </ul>
    
                </div>
    
            @endif
    
      
    
            <form action="{{ route('vector.store') }}" method="POST" enctype="multipart/form-data">
    
                @csrf
    
                <div class="row">
                    <div class="form-group">
                        <label for="vectors_title">title</label>
                        <input type="text" name="vectors_title" class="form-control" value="{{ old('vectors_title') }}" placeholder="vectors-title">
                    </div>
                    <div class="form-group">
                        <label for="vectors_slug">Slug</label>
                        <input type="text" name="vectors_slug" class="form-control" value="{{ old('vectors_slug') }}" placeholder="vectors-slug">
                    </div>
                    <div class="form-group">
                        <label for="vectors_type">Type</label>
                        <input type="text" name="vectors_type" class="form-control" value="{{ old('vectors_type') }}" placeholder="vectors-type">
                    </div>
                    <div class="form-group">
                        <label for="contributor">Contributor</label>
                        <input type="text" name="contributor" class="form-control" value="{{ old('contributor') }}" placeholder="vectors-contributor">
                    </div>
                    <div class="form-group">
                        <label for="vectors_body">Description</label>
                        <textarea name="vectors_body" rows="8" cols="80" class="form-control">{{ old('vectors_body') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="vectors_image">Post Image</label>
                        <input type="file" name="vectors_image" class="form-control">
                    </div>
    
       
    
                    <div class="col-md-6">
    
                        <button type="submit" class="btn btn-success">Upload</button>
    
                    </div>
    
       
    
                </div>
    
            </form>
    
      
    
          </div>
    
        </div>
    
    </div>
    
    
@endsection
@section('footer')
@endsection

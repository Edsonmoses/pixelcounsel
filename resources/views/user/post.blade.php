@extends('user/layouts/app')

@section('bg-img',Storage::disk('local')->url($post->image))
@section('head')
<link rel="stylesheet" href="{{ asset('user/css/prism.css') }}">
@endsection
@section('title',$post->title)
@section('sub-heading',$post->subtitle)

@section('main-content')
<!-- Post Content -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9&appId=455618938154843";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 download-image">

				<img src= "{{ Storage::disk('local')->url($post->image)}}" alt="">
            </div>
            <div class="col-lg-4 col-md-4">
                
                <hr/>
                <div class="download">
                    <a href="{{ route('photo.download', $post->id) }}" target="_blank"><small class="btns"><i class="fa fa-download" aria-hidden="true"></i> Free Download </small></a><br/>
                </div>
                <div class="license">
                    <a href="#"><small>Frame54 License</small></a><br/>
                    <small>Free for commercial use </small><br/>
                    <small>No attribution required </small><br/>
                </div>
                <div class="like-us">
                    <small>Like Frame54 on Facebook</small><br/>
                </div>
                <div class="related-images">
                <small>Related Images</small><br/>
                </div>
                <div class="item-deitals">
                    <small>Image type  <span class="pull-right">{{substr ($post->image, -4)}}</span></small><br/>
                    <small>Resolution  <span class="pull-right"></span></small><br/>
                    <small>Created       <span class="pull-right">{{ \Carbon\Carbon::parse($post->created_at)->format('d/M/Y') }}<span></small><br/>
                    <small>Uploaded      <span class="pull-right">{{ \Carbon\Carbon::parse($post->updated_at)->format('d/M/Y') }}<span></small><br/>
                    <small>Category  
                         @foreach ($post->categories as $category)
                         <span class="pull-right"> 
                            <a href="{{ route('category',$category->slug) }}">{{ $category->name }}</a>
                        </span>
                        @endforeach
                    </small><br/>
                    <small>Views <span class="pull-right">{{$post->visit_count}}</span></small><br/>
                    <small>Downloads <span class="pull-right">{{$post->downloads}}</span></small><br/>
                </div>
            </div>
        </div>
    </div>
</article>


@endsection
@section('footer')
<script src="{{ asset('user/js/prism.js') }}"></script>
@endsection
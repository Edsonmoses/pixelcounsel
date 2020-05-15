@extends('user/layouts/app')

@section('vector-active',asset('uploads/img/vector-active.png'))
@section('head')

@endsection
@section('title','VECTOR LOGOS')
@section('sub-heading','Online vector logo collection of brands in Africa')

@section('main-content')
<div class="vector-active"><div class="arrows"></div></div>
<header class="intro-header intro-header-vector">
    <div class="container">
        <div class="row  header-0">
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
<header class="intro-header intro-header-vector-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <div class="vector-search" style="margin:25px 0 0 0">
					<form action="{{ route('search') }}" method="POST" role="search">
						
					<div class="input-group">
					<input class="form-control" placeholder="Find a vector logo" name="query" id="ed-srch-term" type="text">
					<div class="input-group-btn">
					<button type="submit" id="searchbtn">
						<i class="fa fa-search" aria-hidden="true"></i> </button>
					</div>
					</div>
					</form>
			    </div>
            </div>
            <div class="col-lg-4 col-md-4 vector-s-btn">
                <a class="btn btn-vector v-single" href="#" role="button" data-toggle="modal" data-target="#logoModal">SUBMIT A LOGO</a>
            </div>
            
        </div>
    </div>
</header>
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

				<img src= "{{ Storage::disk('local')->url($vector->vectors_thumbnail)}}" alt="">
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="vector-detail">
                    <small>NAME OF LOGO HERE</small><br/>
                    <p class="p-border"></p>
                    <small><span style="padding-right: 40px;">Designer:</span><span class="pulls">{{$vector->posted_by}}</span></small><br/>
                    <p class="p-border"></p>
                    <small><span style="padding-right: 50px;">Format:</span><span class="pulls">{{$vector->vectors_type}}</span></small><br/>
                    <p class="p-border"></p>
                    <small><span style="padding-right: 22px;">Contributor:</span><span class="pulls">{{$vector->contributor}}</span></small><br/>
                    <p class="p-border"></p>
                    <small>Date uploaded: <span class="pulls">{{ \Carbon\Carbon::parse($vector->created_at)->format('d/M/Y') }}<span></small><br/>
                    <p>TAGS:</p>
                </div>
            </div>
            <!--left col-->
        </div>
    </div>
    <p class="related-title">Related</p>
    <hr/>
    <div class="container">
        <div class="row">
            <div class="col-lg-11 col-md-11 related-image">
                <img src= "{{ Storage::disk('local')->url($vector->vectors_thumbnail)}}" alt="">
            </div>
        </div>
    </div>
    <hr/>
    <div class="container">
        <div class="row">
            <div class="col-lg-11 col-md-11 vector-download">

                <input type="checkbox" id="test"/>
                <span>I agree</span><br/>
                <a class="disabled" href="{{ route('vector.download', $vector->id) }}" target="_blank"><small class="v-download disable"> Download | <i class="fa fa-arrow-down" aria-hidden="true"></i></small></a><br/>
            </div>
        </div>
        <div class="space-footer"></div>
    </div>
</article>


@endsection
@section('footer')
<script src="{{ asset('user/js/prism.js') }}"></script>
<script>
    /*var link = $("#to-toggle");
$("#toggle").on("change", function() {
    if(this.checked) {
        link.attr("href", link.data("href"));
        $('small').addClass("btns");
    } else {
        link.removeAttr("href");
        $('small').removeClass("btns");
    }
});*/

$('#test').change(function(){
    if($(this).is(":checked")) {
        $('.v-download').addClass('btns');
        $('.v-download').removeClass('disable');
    } else {
        $('.v-download').addClass('disable');
        $('.v-download').removeClass('btns');
    }
});
</script>
@endsection
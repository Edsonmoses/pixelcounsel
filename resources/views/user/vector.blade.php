@extends('user/layouts/app')

@section('vector-active',asset('uploads/img/vector-active.png'))
@section('head')
<link rel="stylesheet" href="{{ asset('admin/plugins/select2/select2.min.css') }}">
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
                    <small><span style="padding-right: 40px;">Designer:</span><span class="pulls">{{$vector->user->name}}</span></small><br/>
                    <p class="p-border"></p>
                    <small><span style="padding-right: 50px;">Format:</span><span class="pulls">{{$vector->vectors_type}}</span></small><br/>
                    <p class="p-border"></p>
                    <small><span style="padding-right: 22px;">Contributor:</span><span class="pulls">{{$vector->contributor}}</span></small><br/>
                    <p class="p-border"></p>
                    <small>Date uploaded: <span class="pulls">{{ \Carbon\Carbon::parse($vector->created_at)->format('d/M/Y') }}<span></small><br/>
                    <p>TAGS:</p>
                    @foreach ($vector->tags as $tag)
                       <a href="{{ route('tag',$tag->slug) }}"><small class="pull-left" style="margin-right: 20px;border-radius: 5px;border: 1px solid gray;padding: 5px;">  
                                    {{ $tag->name }}
                        </small></a>
                @endforeach
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

                <input type="checkbox" id="toggle"/>
                <span>I agree</span><br/>
                <a  style="margin-bottom:10px;" class="disabled" id="to-toggle" data-href="{{ route('vector.download', $vector->id) }}" target="_blank"><small class="v-download disable"> Download | <i class="fa fa-arrow-down" aria-hidden="true"></i></small></a><br/>
            </div>
        </div>
        <div class="space-footer"></div>
    </div>
    <!-- The Modal -->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="logoModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Submit a logo here</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Titles</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="{{ route('vector.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="box-body">
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="vectors_title">Logo Title</label>
                  <input type="text" class="form-control" id="vectors_title" name="vectors_title" value="{{ old('vectors_title') }}" placeholder="vector title">
                </div>
  
                <!--<div class="form-group">
                  <label for="vectors_slug">Logo Slug</label>
                  <input type="text" class="form-control" id="slug" name="vectors_slug" value="{{ old('vectors_slug') }}" placeholder="Vector Slug">
                </div>-->
                
                <div class="form-group">
                  <label for="vectors_type">Logo Type</label>
                  <input type="text" class="form-control" id="vectors_type" name="vectors_type" value="{{ old('vectors_type') }}" placeholder="Vector Type">
              </div>
                
              </div>
              <div class="col-lg-6">
                            <br>
                              <div class="form-group">
                                  <label for="vectors_image">Logo input</label>
                                  <input type="file" name="vectors_image" id="vectors_image" multiple="multiple">
                                </div>
                                <div class="form-group">
                                  <label for="vectors_thumbnail">Logo thumbnail</label>
                                  <input type="file" name="vectors_thumbnail" id="vectors_thumbnail" multiple="multiple">
                                </div>
                              <div class="form-group">
                                <div class="checkbox" style="display:none">
                                  <label>
                                    <input type="checkbox" name="status" value="1"> Publish
                                  </label>
                                </div>
                                  <label for="contributor">Contributor</label>
                                  <input type="text" class="form-control" id="contributor" name="contributor" value="{{ old('contributor') }}" placeholder="contributor">
                              </div><br/><br/>
                              
                            </div>
            </div>
            <!-- /.box-body -->
            
            <div class="box">
             <div class="box-header">
               <h3 class="box-title">Description
                 <small>Simple and fast</small>
               </h3>
               <!-- tools box -->
               <div class="pull-right box-tools">
                 <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                   <i class="fa fa-minus"></i></button>
                 </div>
                 <!-- /. tools -->
               </div>
               <!-- /.box-header -->
               <div class="box-body pad">
                 <textarea name="vectors_body" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="editor1">{{ old('vectors_body') }}</textarea>
               </div>
             </div>
  
             <div class="box-footer">
              <input type="submit" class="btn btn-primary" value="Submit a logo">
              <a href='{{ route('vector.vectors') }}' class="btn btn-warning">Back</a>
            </div>
          </form>
        </div>
        <!-- /.box -->
  
        
      </div>
      <!-- /.col-->
    </div>
    <!-- ./row -->
  </section>
  <!-- /.content -->
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
         
        </div>
        
      </div>
    </div>
  </div>
  <!--model popup-->
  <div style="height: 50px"></div>
</article>


@endsection
@section('footer')
<script src="{{ asset('user/js/prism.js') }}"></script>
<script src="{{ asset('admin/plugins/select2/select2.full.min.js') }}"></script>
<script src="{{  asset('admin/ckeditor/ckeditor.js') }}"></script>
<script>
    $(function () {
      // Replace the <textarea id="editor1"> with a CKEditor
      // instance, using default configuration.
      CKEDITOR.replace('editor1');
    });
</script>
<script>
  $(document).ready(function() {
    $(".select2").select2();
  });

var link = $("#to-toggle");
$("#toggle").on("change", function() {
    if(this.checked) {
        link.attr("href", link.data("href"));
        $('.v-download').addClass('btns');
        $('.v-download').removeClass('disable');
    } else {
        link.removeAttr("href");
        $('.v-download').addClass('disable');
        $('.v-download').removeClass('btns');
    }
});
var elements = document.getElementsByTagName("INPUT");
for (var inp of elements) {
    if (inp.type === "checkbox")
        inp.checked = false;
}

/*$('#test').change(function(){
    if($(this).is(":checked")) {
        $('.v-download').addClass('btns');
        $('.v-download').removeClass('disable');
    } else {
        $('.v-download').addClass('disable');
        $('.v-download').removeClass('btns');
    }
});*/
</script>
@endsection
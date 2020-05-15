@extends('user/layouts/app')

@section('bg-img',asset('user/img/contact-bg.jpg'))
@section('head')

@endsection
@section('title','EVENTS')
@section('sub-heading','What’s happening where and when (and if the drinks are on the house)')

@section('main-content')
<div class="vector-actives"><div class="events-arrows"></div></div>
<header class="intro-header hintro-header-hookup">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-9">
                <div class="heading-style">
                    <h1>@yield('title')</h1>
                    <span class="sub-heading">@yield('sub-heading')</span>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 vector-s-btn">
                <a class="btn btn-events" href="#" role="button" data-toggle="modal" data-target="#EventsModal">SUBMIT AN EVENT</a>
            </div>
        </div>
    </div>
  </header>
	<!-- Main Content -->
	<div class="container-full">
		<div class="bottom-menu">
            <ul class="nav navbar-nav navbar-center">
                <li>
                    <a href="east-africa">EAST AFRICA</a>
                </li>
                <li>
                    <a href="west-africa">WEST AFRICA</a>
                </li>
                <li>
                    <a href="southern-africa">SOUTHERN AFRICA</a>
                </li>
                <li>
                    <a href="central-africa">CENTRAL AFRICA</a>
                </li>
                <li>
                    <a href="north-africa">NORTH AFRICA</a>
                </li>
			</ul>
		</div>
	</div>
		<div class="container">
	    <div class="row" id="app">
            @foreach ($events as $events)
              <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img class="bd-placeholder-img card-img-top" src="{{url('storage/events/'.$events->events_image) }}" alt=""  width="100%" height="225"  data-toggle="modal" data-target="#eventModal_{{$events->id}}">
                   <div class="card-body">
                    <div class="row  col-bb">
                        <div class="col-sm-8">
                            <h2 class="card-title">{{ $events->events_title}}</h2>
                            <p class="card-text">{!! str_limit(strip_tags($events->events_subtitle), $limit = 94, $end = '') !!}</p>
                        </div>
                        <div class="col-sm-2 col-dates">
                            <p class="dates">{{ \Carbon\Carbon::parse($events->events_date)->format('d') }}</p>
                            <p class="months">{{ \Carbon\Carbon::parse($events->events_date)->format('M') }}</p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                     <p class="footer-title">{{ $events->events_type}}</p>
                    </div>
                  </div>
                </div>
              </div>
             <!-- View Modal--> 
        
             <div class="modal fade events-popup" id="eventModal_{{$events->id}}" tabindex="-1" role="dialog" aria-labelledby="galleryModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="row">
                      <div class="col-lg-6 col-md-6">
                        <img class="bd-placeholder-img" src="{{url('storage/events/'.$events->events_image) }}" alt="">
                      </div>
                      <!--left col-lg-6 col-md-6-->
                      <div class="col-lg-6 col-md-6">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <div class="row">
                              <div class="col-lg-10 col-md-10">
                                  <h3 class="modal-title" id="myModalLabel">{{$events->events_title}}</h3>
                                  <h4 class="modal-title" id="myModalLabel">{{$events->events_subtitle}}</h4>
                              </div>
                              <div class="col-lg-1 col-md-1 eventspop-col-dates eborder">
                                <p class="dates">{{ \Carbon\Carbon::parse($events->events_date)->format('d') }}</p>
                                <p class="months">{{ \Carbon\Carbon::parse($events->events_date)->format('M') }}</p>
                              </div>
                            </div>
                        </div>
                        <!--modal-header-->
                        <div class="modal-body conts">
                          {!!$events->events_body!!}
                        </div>
                        <!--modal-body-->
                        <div class="modal-footer modal-esocial">
                          <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i>
                          </a>
                          <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        </div>
                        <!--modal-footer-->
                      </div>
                      <!--modal-header-->
                    </div>
                  </div>
                 <!--right col-lg-6 col-md-6-->
                </div>
                <!--row-->
              </div>
        <!-- View Model end -->
              @endforeach
        </div>
        
     
               <!-- The Modal -->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="EventsModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Submit an event</h4>
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
          <form role="form" action="{{ route('events.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="box-body">
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="events_title">Event Title</label>
                  <input type="text" class="form-control" id="events_title" name="events_title" value="{{ old('events_title') }}" placeholder="Events Title">
                </div>
  
                <div class="form-group">
                  <label for="events_subtitle">Event Subtitle</label>
                  <input type="text" class="form-control" id="events_subtitle" name="events_subtitle" value="{{ old('events_subtitle') }}" placeholder="Event Subtitle">
                </div>
                
                <div class="form-group">
                  <label for="events_type">Event Location</label>
                  <input type="text" class="form-control" id="events_type" name="events_type" value="{{ old('events_type') }}" placeholder="Event Location">
              </div>
                
              </div>
              <div class="col-lg-6">
                            <br>
                              <div class="form-group">
                                  <label for="events_image">Event input</label>
                                  <input type="file" name="events_image" id="events_image" multiple="multiple">
                                </div>
                              <div class="form-group">
                                <div class="checkbox" style="display:none">
                                  <label>
                                    <input type="checkbox" name="status" value="1"> Publish
                                  </label>
                                </div>
                            </div>
                            <div class="form-group">
                              <label for="events_date">Event Date</label>
                              <input type="date" class="form-control" id="events_date" name="events_date" value="{{ old('events_date') }}" placeholder="Event Date">
                          </div><br/><br/><br/>
                              
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
                 <textarea name="events_body" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="editor1">{{ old('vectors_body') }}</textarea>
               </div>
             </div>
  
             <div class="box-footer">
              <input type="submit" class="btn btn-primary" value="Submit a logo">
              <a href='{{ route('events') }}' class="btn btn-warning">Back</a>
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
   
    </div>
    


@endsection
@section('footer')
<script src="{{ asset('admin/plugins/select2/select2.full.min.js') }}"></script>
<script src="{{  asset('admin/ckeditor/ckeditor.js') }}"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
</script>
<script>
  $(document).ready(function(){
      $("#EventModal").on("show.bs.modal", function(e) {
          var id = $(e.relatedTarget).data('target-id');
          $.get( "/events/" + id, function( data ) {
              $(".modal-body").html(data.html);
          });

      });
  });
</script>
@endsection

@foreach ($vectors as $vectors)
              <div class="col-md-2 vector-img ml-1">
                <a href="{{ route('vector',$vectors->vectors_slug, Auth::user()->id)  }}"><img class="bd-placeholder-img" src="{{ Storage::url($vectors->vectors_thumbnail)}}" alt=""  width="100%" height="225"></a>
              </div>
              @endforeach
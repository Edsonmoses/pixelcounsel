@foreach ($posts as $posts)
				<a href="{{ $posts->slug }}"><img src= "{{ Storage::url($posts->image)}}" alt=""></a>
			@endforeach
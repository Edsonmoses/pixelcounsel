@extends('user/app')

@section('bg-img',asset('user/img/contact-bg.jpg'))
@section('head')

@endsection
@section('title','Welcome to Home')
@section('sub-heading','')

@section('main-content')
<!-- Main Content -->
<div class="container">
    <div class="row" id="app">
        <div class="card-header"><b>{{ $searchResults->count() }} results found for "{{ request('query') }}"</b></div>
    <div class="gal">
        @foreach($searchResults->groupByType() as $type => $modelSearchResults)
        <h2>{{ ucfirst($type) }}</h2>

        @foreach($modelSearchResults as $searchResult)
            <ul>
                <li><a href="{{ $searchResult->url }}">{{ Storage::url$searchResult->image }}</a></li>
            </ul>
        @endforeach
   
        </div>
    </div>
</div>

<hr>
@endsection
@section('footer')
@endsection
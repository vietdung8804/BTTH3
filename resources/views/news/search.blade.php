<!-- resources/views/news/search.blade.php -->

@extends('layouts.app')

@section('title', 'Search News')

@section('content')
    <h1 class="fw-bold">Search News</h1>

    <form action="{{ route('news.searchResults') }}" method="GET">
        <div class="mb-3">
            <label for="query" class="form-label">Search for News</label>
            <input type="text" class="form-control" id="query" name="query" value="{{ request()->input('query') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    @if(isset($news))
        <div class="mt-4">
            <h3>Search Results</h3>
            @if($news->isEmpty())
                <p>No news found for your search.</p>
            @else
                <div class="row">
                    @foreach($news as $item)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->title }}</h5>
                                    <p class="card-text">{{ Str::limit($item->description, 100) }}</p>
                                    <a href="{{ route('news.show', $item->id) }}" class="btn btn-primary">Read More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    @endif
@endsection

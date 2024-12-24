@extends('layouts.app')

@section('title', 'News Home')

@section('content')
    <h1 class="fw-bold">Latest News</h1>

    <!-- Form tìm kiếm -->
    <form action="{{ route('news.searchResults') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" class="form-control" name="q" placeholder="Search news" value="{{ old('q', $query ?? '') }}">
            <button class="btn btn-primary" type="submit">Search</button>
        </div>
    </form>

    @if (isset($query) && $query)
        <h2>Search results for: "{{ $query }}"</h2>
    @endif

    <div class="row mt-4">
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
    <div class="d-flex justify-content-center mt-3">
        {{ $news->links('pagination::bootstrap-5') }} <!-- Sử dụng template của Bootstrap 5 -->
    </div>
@endsection

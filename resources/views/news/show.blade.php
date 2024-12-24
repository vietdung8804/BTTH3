@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card shadow p-4">
            <h1 class="card-title text-center">{{ $newsItem->title }}</h1>
            <div class="card-body">
                <h5 class="text-muted">Short Description</h5>
                <p>{{ $newsItem->description }}</p>
                <h5 class="text-muted">Long Description</h5>
                <p>{{ $newsItem->long_description }}</p>
            </div>
        </div>
    </div>
@endsection

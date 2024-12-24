@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Add News</h1>
        <form action="{{ route('admin.news.store') }}" method="POST" class="shadow p-4 rounded bg-light">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Enter news title" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Short Description</label>
                <textarea name="description" id="description" rows="3" class="form-control" placeholder="Enter short description" required></textarea>
            </div>
            <div class="mb-3">
                <label for="long_description" class="form-label">Long Description</label>
                <textarea name="long_description" id="long_description" rows="6" class="form-control" placeholder="Enter detailed description" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100">Save</button>
        </form>
    </div>
@endsection

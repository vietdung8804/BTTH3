@extends('layouts.admin')

@section('title', 'Sửa tin tức')

@section('content')
    <h1>Sửa tin tức</h1>
    <form action="{{ route('admin.news.update', $news->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Tiêu đề:</label>
        <input type="text" name="title" value="{{ $news->title }}">
        <label>Nội dung:</label>
        <textarea name="content">{{ $news->content }}</textarea>
        <button type="submit">Cập nhật</button>
    </form>
@endsection

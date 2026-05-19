@extends('admin.layouts.app')
@section('page-title', 'News Article')
@section('content')
<div class="card">
    <div class="card-header">
        <span class="card-title">{{ $news->title }}</span>
        <a href="{{ route('admin.news.edit', $news) }}" class="btn btn-accent btn-sm">Edit</a>
    </div>
    <div class="card-body">
        <p><strong>Category:</strong> {{ $news->category }}</p>
        <p><strong>Status:</strong> {{ $news->status }}</p>
        <p><strong>Published:</strong> {{ $news->published_at?->format('d M Y') ?? 'Not published' }}</p>
        @if($news->excerpt)<p><strong>Excerpt:</strong> {{ $news->excerpt }}</p>@endif
    </div>
</div>
@endsection

@extends('admin.layouts.app')
@section('page-title', 'Career Details')
@section('content')
<div class="card">
    <div class="card-header">
        <span class="card-title">{{ $career->title }}</span>
        <a href="{{ route('admin.careers.edit', $career) }}" class="btn btn-accent btn-sm">Edit</a>
    </div>
    <div class="card-body">
        <p><strong>Department:</strong> {{ $career->department }}</p>
        <p><strong>Location:</strong> {{ $career->location }}</p>
        <p><strong>Type:</strong> {{ $career->type }}</p>
        <p><strong>Status:</strong> {{ $career->status }}</p>
        @if($career->description)<p><strong>Description:</strong> {{ $career->description }}</p>@endif
    </div>
</div>
@endsection

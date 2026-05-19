@extends('admin.layouts.app')
@section('page-title', 'Project Details')
@section('content')
<div class="card">
    <div class="card-header">
        <span class="card-title">{{ $project->title }}</span>
        <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-accent btn-sm">Edit</a>
    </div>
    <div class="card-body">
        <p><strong>Category:</strong> {{ $project->category }}</p>
        <p><strong>Location:</strong> {{ $project->location }}, {{ $project->country }}</p>
        <p><strong>Year:</strong> {{ $project->year }}</p>
        <p><strong>Status:</strong> {{ $project->status }}</p>
        <p><strong>Description:</strong> {{ $project->description }}</p>
    </div>
</div>
@endsection

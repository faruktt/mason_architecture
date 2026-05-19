@extends('admin.layouts.app')
@section('page-title', 'Team Member')
@section('content')
<div class="card">
    <div class="card-header">
        <span class="card-title">{{ $team->name }}</span>
        <a href="{{ route('admin.team.edit', $team) }}" class="btn btn-accent btn-sm">Edit</a>
    </div>
    <div class="card-body">
        <p><strong>Role:</strong> {{ $team->role }}</p>
        <p><strong>Title:</strong> {{ $team->title }}</p>
        <p><strong>Office:</strong> {{ $team->office }}</p>
        <p><strong>Partner:</strong> {{ $team->is_partner ? 'Yes' : 'No' }}</p>
        @if($team->bio)<p><strong>Bio:</strong> {{ $team->bio }}</p>@endif
    </div>
</div>
@endsection

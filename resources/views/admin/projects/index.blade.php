@extends('admin.layouts.app')
@section('page-title', 'Projects')

@section('content')
<div class="card">
    <div class="card-header">
        <span class="card-title"><i class="bi bi-building me-2"></i>All Projects ({{ $projects->total() }})</span>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-accent">
            <i class="bi bi-plus-lg me-1"></i> Add Project
        </a>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Location</th>
                    <th>Year</th>
                    <th>Featured</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($projects as $project)
                <tr>
                    <td style="color:#bbb;font-size:12px;">{{ $project->id }}</td>
                    <td>
                        <strong style="color:#1a1a1a;">{{ $project->title }}</strong>
                        @if($project->description)
                        <div style="font-size:12px;color:#999;margin-top:2px;">{{ \Illuminate\Support\Str::limit($project->description, 60) }}</div>
                        @endif
                    </td>
                    <td><span style="font-size:12px;background:#f0f0f0;padding:3px 8px;border-radius:20px;">{{ $project->category }}</span></td>
                    <td style="font-size:13px;color:#666;">{{ $project->location }}<br><span style="color:#999;font-size:11px;">{{ $project->country }}</span></td>
                    <td style="font-size:13px;">{{ $project->year ?? '—' }}</td>
                    <td>
                        @if($project->featured)
                            <i class="bi bi-star-fill" style="color:#f59e0b;"></i>
                        @else
                            <i class="bi bi-star" style="color:#ccc;"></i>
                        @endif
                    </td>
                    <td><span class="badge-status badge-{{ $project->status }}">{{ ucfirst($project->status) }}</span></td>
                    <td>
                        <div class="action-btns">
                            <a href="{{ route('admin.projects.edit', $project) }}" class="btn-edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Delete this project?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-delete"><i class="bi bi-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center py-4 text-muted">No projects found. <a href="{{ route('admin.projects.create') }}">Add one</a>.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($projects->hasPages())
    <div class="card-body pt-0">
        {{ $projects->links() }}
    </div>
    @endif
</div>
@endsection

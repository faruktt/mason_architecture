@extends('admin.layouts.app')
@section('page-title', 'Careers / Jobs')

@section('content')
<div class="card">
    <div class="card-header">
        <span class="card-title"><i class="bi bi-briefcase-fill me-2"></i>Job Postings ({{ $careers->total() }})</span>
        <a href="{{ route('admin.careers.create') }}" class="btn btn-accent"><i class="bi bi-plus-lg me-1"></i> Post a Job</a>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Department</th>
                    <th>Location</th>
                    <th>Type</th>
                    <th>Deadline</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($careers as $career)
                <tr>
                    <td><strong>{{ $career->title }}</strong></td>
                    <td><span style="font-size:12px;background:#f0f0f0;padding:3px 8px;border-radius:20px;">{{ $career->department }}</span></td>
                    <td style="font-size:13px;">{{ $career->location }}</td>
                    <td style="font-size:13px;">{{ $career->type }}</td>
                    <td style="font-size:12px;color:#888;">{{ $career->deadline ? $career->deadline->format('d M Y') : '—' }}</td>
                    <td><span class="badge-status badge-{{ $career->status }}">{{ ucfirst($career->status) }}</span></td>
                    <td>
                        <div class="action-btns">
                            <a href="{{ route('admin.careers.edit', $career) }}" class="btn-edit"><i class="bi bi-pencil"></i></a>
                            <form action="{{ route('admin.careers.destroy', $career) }}" method="POST" onsubmit="return confirm('Delete this job posting?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-delete"><i class="bi bi-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" class="text-center py-4 text-muted">No job postings found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($careers->hasPages())
    <div class="card-body pt-0">{{ $careers->links() }}</div>
    @endif
</div>
@endsection

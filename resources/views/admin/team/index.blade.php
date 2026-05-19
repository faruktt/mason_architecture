@extends('admin.layouts.app')
@section('page-title', 'Team Members')

@section('content')
<div class="card">
    <div class="card-header">
        <span class="card-title"><i class="bi bi-people-fill me-2"></i>Team Members ({{ $team->total() }})</span>
        <a href="{{ route('admin.team.create') }}" class="btn btn-accent">
            <i class="bi bi-plus-lg me-1"></i> Add Member
        </a>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Member</th>
                    <th>Role / Title</th>
                    <th>Office</th>
                    <th>Partner</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($team as $member)
                <tr>
                    <td>
                        <div class="d-flex align-items-center gap-3">
                            @if($member->photo)
                                <img src="{{ asset('storage/'.$member->photo) }}" style="width:40px;height:40px;border-radius:50%;object-fit:cover;" alt="{{ $member->name }}">
                            @else
                                <div style="width:40px;height:40px;border-radius:50%;background:#0a0a0a;color:#e8ff00;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:15px;">{{ strtoupper(substr($member->name,0,1)) }}</div>
                            @endif
                            <strong>{{ $member->name }}</strong>
                        </div>
                    </td>
                    <td>
                        <div style="font-size:13px;">{{ $member->role }}</div>
                        <div style="font-size:11px;color:#999;">{{ $member->title }}</div>
                    </td>
                    <td style="font-size:13px;">{{ $member->office ?? '—' }}</td>
                    <td>
                        @if($member->is_partner)
                            <span class="badge-status badge-published">Yes</span>
                        @else
                            <span style="color:#ccc;font-size:13px;">No</span>
                        @endif
                    </td>
                    <td>
                        @if($member->is_active)
                            <i class="bi bi-check-circle-fill" style="color:#10b981;"></i>
                        @else
                            <i class="bi bi-x-circle-fill" style="color:#ef4444;"></i>
                        @endif
                    </td>
                    <td>
                        <div class="action-btns">
                            <a href="{{ route('admin.team.edit', $member) }}" class="btn-edit"><i class="bi bi-pencil"></i></a>
                            <form action="{{ route('admin.team.destroy', $member) }}" method="POST" onsubmit="return confirm('Remove this team member?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-delete"><i class="bi bi-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center py-4 text-muted">No team members found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($team->hasPages())
    <div class="card-body pt-0">{{ $team->links() }}</div>
    @endif
</div>
@endsection

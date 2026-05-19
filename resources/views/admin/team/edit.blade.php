@extends('admin.layouts.app')
@section('page-title', 'Edit Team Member')

@section('content')
<div class="row g-3">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header"><span class="card-title">Edit: {{ $team->name }}</span></div>
            <div class="card-body">
                <form action="{{ route('admin.team.update', $team) }}" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Full Name *</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $team->name) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Role *</label>
                            <select name="role" class="form-select" required>
                                @foreach(['Partner','Associate','Director','Senior Architect','Architect'] as $role)
                                <option value="{{ $role }}" {{ old('role', $team->role) == $role ? 'selected' : '' }}>{{ $role }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Title / Position</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title', $team->title) }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Office</label>
                            <select name="office" class="form-select">
                                @foreach(['Copenhagen','New York','London','Barcelona','Los Angeles','Shanghai','Zürich'] as $office)
                                <option value="{{ $office }}" {{ old('office', $team->office) == $office ? 'selected' : '' }}>{{ $office }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email', $team->email) }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">LinkedIn URL</label>
                            <input type="url" name="linkedin" class="form-control" value="{{ old('linkedin', $team->linkedin) }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Bio</label>
                            <textarea name="bio" class="form-control" rows="5">{{ old('bio', $team->bio) }}</textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Photo</label>
                            @if($team->photo)
                            <div class="mb-2"><img src="{{ asset('storage/'.$team->photo) }}" style="height:70px;border-radius:50%;object-fit:cover;" alt="{{ $team->name }}"></div>
                            @endif
                            <input type="file" name="photo" class="form-control" accept="image/*">
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="is_partner" id="is_partner" value="1" {{ $team->is_partner ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_partner"><strong>Mark as Partner</strong></label>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex gap-3 mt-4 pt-3" style="border-top:1px solid #eee;">
                        <button type="submit" class="btn btn-accent px-4"><i class="bi bi-check-lg me-1"></i> Update Member</button>
                        <a href="{{ route('admin.team.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.team.destroy', $team) }}" method="POST" onsubmit="return confirm('Remove this team member?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger w-100"><i class="bi bi-trash me-1"></i> Remove Member</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

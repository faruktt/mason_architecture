@extends('admin.layouts.app')
@section('page-title', 'Add Team Member')

@section('content')
<div class="row g-3">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header"><span class="card-title">Team Member Details</span></div>
            <div class="card-body">
                <form action="{{ route('admin.team.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Full Name *</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Role *</label>
                            <select name="role" class="form-select" required>
                                <option value="">Select role...</option>
                                <option value="Partner">Partner</option>
                                <option value="Associate">Associate</option>
                                <option value="Director">Director</option>
                                <option value="Senior Architect">Senior Architect</option>
                                <option value="Architect">Architect</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Title / Position</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="e.g. Founder & Creative Director">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Office</label>
                            <select name="office" class="form-select">
                                <option value="">Select office...</option>
                                @foreach(['Copenhagen','New York','London','Barcelona','Los Angeles','Shanghai','Zürich'] as $office)
                                <option value="{{ $office }}" {{ old('office') == $office ? 'selected' : '' }}>{{ $office }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">LinkedIn URL</label>
                            <input type="url" name="linkedin" class="form-control" value="{{ old('linkedin') }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Bio</label>
                            <textarea name="bio" class="form-control" rows="5" placeholder="Professional biography...">{{ old('bio') }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Sort Order</label>
                            <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Photo</label>
                            <input type="file" name="photo" class="form-control" accept="image/*">
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="is_partner" id="is_partner" value="1">
                                <label class="form-check-label" for="is_partner">
                                    <strong>Mark as Partner</strong>
                                    <div style="font-size:12px;color:#888;">Partners appear in the main People section</div>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex gap-3 mt-4 pt-3" style="border-top:1px solid #eee;">
                        <button type="submit" class="btn btn-accent px-4"><i class="bi bi-check-lg me-1"></i> Save Member</button>
                        <a href="{{ route('admin.team.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

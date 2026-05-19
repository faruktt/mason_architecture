@extends('admin.layouts.app')
@section('page-title', 'Edit Job Posting')

@section('content')
<div class="row g-3">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header"><span class="card-title">Edit: {{ $career->title }}</span></div>
            <div class="card-body">
                <form action="{{ route('admin.careers.update', $career) }}" method="POST">
                    @csrf @method('PUT')
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Job Title *</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title', $career->title) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Department *</label>
                            <select name="department" class="form-select" required>
                                @foreach(['Architects','Landscape','Planning','Design Technology','Business Development','Finance','IT','Interior','Products','People'] as $dept)
                                <option value="{{ $dept }}" {{ old('department', $career->department) == $dept ? 'selected' : '' }}>{{ $dept }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Location *</label>
                            <select name="location" class="form-select" required>
                                @foreach(['Copenhagen','New York','London','Barcelona','Los Angeles','Shanghai','Zürich'] as $loc)
                                <option value="{{ $loc }}" {{ old('location', $career->location) == $loc ? 'selected' : '' }}>{{ $loc }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Employment Type *</label>
                            <select name="type" class="form-select" required>
                                @foreach(['Full-time','Part-time','Internship','Contract'] as $type)
                                <option value="{{ $type }}" {{ old('type', $career->type) == $type ? 'selected' : '' }}>{{ $type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Status *</label>
                            <select name="status" class="form-select" required>
                                <option value="open" {{ old('status', $career->status) == 'open' ? 'selected' : '' }}>Open</option>
                                <option value="closed" {{ old('status', $career->status) == 'closed' ? 'selected' : '' }}>Closed</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Application Deadline</label>
                            <input type="date" name="deadline" class="form-control" value="{{ old('deadline', $career->deadline?->format('Y-m-d')) }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Job Description</label>
                            <textarea name="description" class="form-control" rows="4">{{ old('description', $career->description) }}</textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Responsibilities</label>
                            <textarea name="responsibilities" class="form-control" rows="5">{{ old('responsibilities', $career->responsibilities) }}</textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Requirements</label>
                            <textarea name="requirements" class="form-control" rows="5">{{ old('requirements', $career->requirements) }}</textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">External Apply URL</label>
                            <input type="url" name="apply_url" class="form-control" value="{{ old('apply_url', $career->apply_url) }}">
                        </div>
                    </div>
                    <div class="d-flex gap-3 mt-4 pt-3" style="border-top:1px solid #eee;">
                        <button type="submit" class="btn btn-accent px-4"><i class="bi bi-check-lg me-1"></i> Update Job</button>
                        <a href="{{ route('admin.careers.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div style="font-size:12px;color:#999;margin-bottom:6px;">Posted</div>
                <div style="font-size:14px;">{{ $career->created_at->format('d M Y') }}</div>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-body">
                <form action="{{ route('admin.careers.destroy', $career) }}" method="POST" onsubmit="return confirm('Delete this job posting?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger w-100"><i class="bi bi-trash me-1"></i> Delete Posting</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

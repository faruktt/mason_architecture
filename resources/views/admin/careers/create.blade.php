@extends('admin.layouts.app')
@section('page-title', 'Post New Job')

@section('content')
<div class="row g-3">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header"><span class="card-title">Job Details</span></div>
            <div class="card-body">
                <form action="{{ route('admin.careers.store') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Job Title *</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="e.g. Senior Architect" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Department *</label>
                            <select name="department" class="form-select" required>
                                <option value="">Select department...</option>
                                @foreach(['Architects','Landscape','Planning','Design Technology','Business Development','Finance','IT','Interior','Products','People'] as $dept)
                                <option value="{{ $dept }}" {{ old('department') == $dept ? 'selected' : '' }}>{{ $dept }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Location *</label>
                            <select name="location" class="form-select" required>
                                <option value="">Select location...</option>
                                @foreach(['Copenhagen','New York','London','Barcelona','Los Angeles','Shanghai','Zürich'] as $loc)
                                <option value="{{ $loc }}" {{ old('location') == $loc ? 'selected' : '' }}>{{ $loc }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Employment Type *</label>
                            <select name="type" class="form-select" required>
                                <option value="Full-time" {{ old('type') == 'Full-time' ? 'selected' : '' }}>Full-time</option>
                                <option value="Part-time" {{ old('type') == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                                <option value="Internship" {{ old('type') == 'Internship' ? 'selected' : '' }}>Internship</option>
                                <option value="Contract" {{ old('type') == 'Contract' ? 'selected' : '' }}>Contract</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Status *</label>
                            <select name="status" class="form-select" required>
                                <option value="open" {{ old('status') == 'open' ? 'selected' : '' }}>Open</option>
                                <option value="closed" {{ old('status') == 'closed' ? 'selected' : '' }}>Closed</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Application Deadline</label>
                            <input type="date" name="deadline" class="form-control" value="{{ old('deadline') }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Job Description</label>
                            <textarea name="description" class="form-control" rows="4" placeholder="Overview of the position...">{{ old('description') }}</textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Responsibilities</label>
                            <textarea name="responsibilities" class="form-control" rows="5" placeholder="List of responsibilities...">{{ old('responsibilities') }}</textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Requirements</label>
                            <textarea name="requirements" class="form-control" rows="5" placeholder="Required qualifications and skills...">{{ old('requirements') }}</textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">External Apply URL</label>
                            <input type="url" name="apply_url" class="form-control" value="{{ old('apply_url') }}" placeholder="https://...">
                        </div>
                    </div>
                    <div class="d-flex gap-3 mt-4 pt-3" style="border-top:1px solid #eee;">
                        <button type="submit" class="btn btn-accent px-4"><i class="bi bi-check-lg me-1"></i> Publish Job</button>
                        <a href="{{ route('admin.careers.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

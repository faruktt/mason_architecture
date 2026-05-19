@extends('admin.layouts.app')
@section('page-title', 'Edit Project')

@section('content')
<div class="row g-3">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <span class="card-title"><i class="bi bi-pencil me-2"></i>Edit: {{ $project->title }}</span>
            </div>
            <div class="card-body">
                <form id="project-form" action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Project Title *</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title', $project->title) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Location</label>
                            <input type="text" name="location" class="form-control" value="{{ old('location', $project->location) }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Country</label>
                            <input type="text" name="country" class="form-control" value="{{ old('country', $project->country) }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Category *</label>
                            <select name="category" class="form-select" required>
                                @foreach(['Architecture','Landscape','Planning','Products','Interiors'] as $cat)
                                <option value="{{ $cat }}" {{ old('category', $project->category) == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Year</label>
                            <input type="number" name="year" class="form-control" value="{{ old('year', $project->year) }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="published" {{ $project->status == 'published' ? 'selected' : '' }}>Published</option>
                                <option value="draft" {{ $project->status == 'draft' ? 'selected' : '' }}>Draft</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="featured" id="featured" value="1" {{ $project->featured ? 'checked' : '' }}>
                                <label class="form-check-label" for="featured">Featured project (show on homepage)</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Short Description</label>
                            <textarea name="description" class="form-control" rows="3">{{ old('description', $project->description) }}</textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Full Content</label>
                            <textarea name="full_content" class="form-control" rows="8">{{ old('full_content', $project->full_content) }}</textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Cover Image</label>
                            @if($project->cover_image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/'.$project->cover_image) }}" style="height:80px;border-radius:8px;object-fit:cover;" alt="Cover">
                            </div>
                            @endif
                            <input type="file" name="cover_image" class="form-control" accept="image/*">
                        </div>
                    </div>
                    <div class="d-flex gap-3 mt-4 pt-3" style="border-top:1px solid #eee;">
                        <button type="submit" class="btn btn-accent px-4">
                            <i class="bi bi-check-lg me-1"></i> Update Project
                        </button>
                        <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div style="font-size:12px;color:#999;margin-bottom:6px;">Created</div>
                <div style="font-size:14px;">{{ $project->created_at->format('d M Y') }}</div>
                <div style="font-size:12px;color:#999;margin:12px 0 6px;">Last Updated</div>
                <div style="font-size:14px;">{{ $project->updated_at->diffForHumans() }}</div>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-body">
                <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this project?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger w-100">
                        <i class="bi bi-trash me-1"></i> Delete Project
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('admin.layouts.app')
@section('page-title', 'Add New Project')

@section('content')
<div class="row g-3">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <span class="card-title"><i class="bi bi-building me-2"></i>Project Details</span>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Project Title *</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="e.g. CopenHill" required>
                            @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Location</label>
                            <input type="text" name="location" class="form-control" value="{{ old('location') }}" placeholder="e.g. Copenhagen">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Country</label>
                            <input type="text" name="country" class="form-control" value="{{ old('country') }}" placeholder="e.g. Denmark">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Category *</label>
                            <select name="category" class="form-select" required>
                                <option value="">Select category...</option>
                                <option value="Architecture" {{ old('category') == 'Architecture' ? 'selected' : '' }}>Architecture</option>
                                <option value="Landscape" {{ old('category') == 'Landscape' ? 'selected' : '' }}>Landscape</option>
                                <option value="Planning" {{ old('category') == 'Planning' ? 'selected' : '' }}>Planning</option>
                                <option value="Products" {{ old('category') == 'Products' ? 'selected' : '' }}>Products</option>
                                <option value="Interiors" {{ old('category') == 'Interiors' ? 'selected' : '' }}>Interiors</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Year</label>
                            <input type="number" name="year" class="form-control" value="{{ old('year') }}" placeholder="e.g. 2024" min="1990" max="2099">
                        </div>

                        <div class="col-12">
                            <label class="form-label">Short Description</label>
                            <textarea name="description" class="form-control" rows="3" placeholder="Brief description for listing pages...">{{ old('description') }}</textarea>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Full Content</label>
                            <textarea name="full_content" class="form-control" rows="8" placeholder="Detailed project content...">{{ old('full_content') }}</textarea>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Cover Image</label>
                            <input type="file" name="cover_image" class="form-control" accept="image/*">
                        </div>
                    </div>

                    <div class="d-flex gap-3 mt-4 pt-3" style="border-top:1px solid #eee;">
                        <button type="submit" class="btn btn-accent px-4">
                            <i class="bi bi-check-lg me-1"></i> Save Project
                        </button>
                        <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <span class="card-title">Publish Settings</span>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" form="project-form" class="form-select">
                        <option value="published">Published</option>
                        <option value="draft">Draft</option>
                    </select>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="featured" id="featured" value="1" form="project-form">
                    <label class="form-check-label" for="featured">
                        <strong>Feature this project</strong>
                        <div style="font-size:12px;color:#888;">Show on homepage hero section</div>
                    </label>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header"><span class="card-title">Tips</span></div>
            <div class="card-body" style="font-size:13px;color:#666;line-height:1.7;">
                <p>• Use a high-quality cover image (1920×1080 recommended)</p>
                <p>• Featured projects appear on the homepage</p>
                <p>• Draft projects are only visible to admins</p>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
// Add status select to the same form
document.querySelector('form').id = 'project-form';
</script>
@endpush

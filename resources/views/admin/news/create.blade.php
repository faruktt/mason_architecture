@extends('admin.layouts.app')
@section('page-title', 'Write Article')

@section('content')
<div class="row g-3">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header"><span class="card-title">Article Details</span></div>
            <div class="card-body">
                <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Article Title *</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="Enter headline..." required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Category</label>
                            <select name="category" class="form-select">
                                <option value="">Select category...</option>
                                @foreach(['News','Project','Award','Event','Press','Announcement'] as $cat)
                                <option value="{{ $cat }}" {{ old('category') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="published">Published</option>
                                <option value="draft">Draft</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Excerpt / Summary</label>
                            <textarea name="excerpt" class="form-control" rows="3" placeholder="Short summary shown in listings...">{{ old('excerpt') }}</textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Full Content</label>
                            <textarea name="content" class="form-control" rows="12" placeholder="Full article content...">{{ old('content') }}</textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Cover Image</label>
                            <input type="file" name="cover_image" class="form-control" accept="image/*">
                        </div>
                    </div>
                    <div class="d-flex gap-3 mt-4 pt-3" style="border-top:1px solid #eee;">
                        <button type="submit" class="btn btn-accent px-4"><i class="bi bi-check-lg me-1"></i> Publish Article</button>
                        <a href="{{ route('admin.news.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body" style="font-size:13px;color:#666;line-height:1.7;">
                <p>• Use a compelling headline</p>
                <p>• Keep the excerpt under 200 characters</p>
                <p>• Recommended image: 1200×630px</p>
                <p>• Draft articles are not shown publicly</p>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('admin.layouts.app')
@section('page-title', 'News Articles')

@section('content')
<div class="card">
    <div class="card-header">
        <span class="card-title"><i class="bi bi-newspaper me-2"></i>News Articles ({{ $news->total() }})</span>
        <a href="{{ route('admin.news.create') }}" class="btn btn-accent"><i class="bi bi-plus-lg me-1"></i> Write Article</a>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Published</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($news as $article)
                <tr>
                    <td>
                        <strong>{{ $article->title }}</strong>
                        @if($article->excerpt)
                        <div style="font-size:12px;color:#999;margin-top:2px;">{{ \Illuminate\Support\Str::limit($article->excerpt, 80) }}</div>
                        @endif
                    </td>
                    <td><span style="font-size:12px;background:#f0f0f0;padding:3px 8px;border-radius:20px;">{{ $article->category ?? 'Uncategorized' }}</span></td>
                    <td style="font-size:12px;color:#888;">{{ $article->published_at ? $article->published_at->format('d M Y') : '—' }}</td>
                    <td><span class="badge-status badge-{{ $article->status }}">{{ ucfirst($article->status) }}</span></td>
                    <td>
                        <div class="action-btns">
                            <a href="{{ route('admin.news.edit', $article) }}" class="btn-edit"><i class="bi bi-pencil"></i></a>
                            <form action="{{ route('admin.news.destroy', $article) }}" method="POST" onsubmit="return confirm('Delete this article?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-delete"><i class="bi bi-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="text-center py-4 text-muted">No news articles found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($news->hasPages())
    <div class="card-body pt-0">{{ $news->links() }}</div>
    @endif
</div>
@endsection

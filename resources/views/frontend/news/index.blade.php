@extends('frontend.layouts.app')
@section('title', 'News — BIG')

@section('content')

<div class="page-header">
    <div class="container">
        <div class="section-label" style="color:var(--accent);">Latest</div>
        <h1>News & Updates</h1>
        <p>Stories, announcements, and project updates from BIG.</p>
    </div>
</div>

<section class="section">
    <div class="container">
        @if($news->count())

        <!-- Featured first article -->
        @php $first = $news->first(); @endphp
        <a href="{{ route('news.show', $first->slug) }}" style="text-decoration:none;color:inherit;display:block;margin-bottom:48px;">
            <div class="row g-4 align-items-center">
                <div class="col-md-7">
                    <div style="aspect-ratio:16/9;border-radius:16px;overflow:hidden;background:linear-gradient(135deg,#1a1a2e,#16213e);">
                        @if($first->cover_image)
                        <img src="{{ asset('storage/'.$first->cover_image) }}" style="width:100%;height:100%;object-fit:cover;transition:transform 0.4s;" alt="{{ $first->title }}">
                        @else
                        <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;"><i class="bi bi-newspaper" style="font-size:56px;color:rgba(255,255,255,0.1);"></i></div>
                        @endif
                    </div>
                </div>
                <div class="col-md-5">
                    <span style="font-size:10px;letter-spacing:2px;text-transform:uppercase;color:#bbb;font-weight:600;">{{ $first->category ?? 'News' }}</span>
                    <h2 style="font-size:clamp(22px,3vw,32px);font-weight:800;letter-spacing:-1px;line-height:1.2;margin:10px 0 12px;">{{ $first->title }}</h2>
                    <p style="font-size:15px;color:#777;line-height:1.7;">{{ $first->excerpt }}</p>
                    <div style="margin-top:16px;font-size:13px;color:#bbb;">{{ $first->published_at?->format('d M Y') }}</div>
                    <div style="margin-top:16px;" class="btn-big">Read More <i class="bi bi-arrow-right"></i></div>
                </div>
            </div>
        </a>

        <div class="divider"></div>

        <!-- Rest of articles -->
        <div class="row g-4">
            @foreach($news->skip(1) as $article)
            <div class="col-md-4">
                <a href="{{ route('news.show', $article->slug) }}" class="news-card">
                    <div class="news-img">
                        @if($article->cover_image)
                        <img src="{{ asset('storage/'.$article->cover_image) }}" alt="{{ $article->title }}">
                        @else
                        <div style="width:100%;height:100%;background:linear-gradient(135deg,#1a1a2e,#16213e);display:flex;align-items:center;justify-content:center;">
                            <i class="bi bi-newspaper" style="font-size:36px;color:rgba(255,255,255,0.1);"></i>
                        </div>
                        @endif
                    </div>
                    <div class="news-body">
                        <div class="news-cat">{{ $article->category ?? 'News' }}</div>
                        <div class="news-title">{{ $article->title }}</div>
                        <div class="news-date">{{ $article->published_at?->format('d M Y') }}</div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

        @if($news->hasPages())
        <div class="mt-5 d-flex justify-content-center">
            {{ $news->links() }}
        </div>
        @endif

        @else
        <div class="text-center py-5">
            <i class="bi bi-newspaper" style="font-size:56px;color:#ddd;"></i>
            <p class="mt-3 text-muted">No news articles published yet.</p>
        </div>
        @endif
    </div>
</section>

@endsection

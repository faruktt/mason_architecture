@extends('frontend.layouts.app')
@section('title', 'News | Bjarke Ingels Group')

@section('content')
<style>/* ===== NEWS ===== */
        .news-grid {
            padding: 0 60px 80px;
        }

        .news-featured {
            display: flex;
            gap: 40px;
            padding: 40px 0;
            border-bottom: 1px solid #e8e8e8;
            margin-bottom: 40px;
            text-decoration: none;
            color: #000;
        }

        .news-featured-img {
            width: 50%;
            flex-shrink: 0;
            aspect-ratio: 16/9;
            object-fit: cover;
            background: #f0f0f0;
        }

        .news-featured-info { flex: 1; padding-top: 8px; }

        .news-cat-label {
            font-size: 11px;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: #999;
            margin-bottom: 10px;
        }

        .news-featured-title {
            font-size: 20px;
            font-weight: 400;
            line-height: 1.3;
            color: #000;
            margin-bottom: 12px;
        }

        .news-featured-excerpt {
            font-size: 13px;
            line-height: 1.65;
            color: #555;
        }

        .news-featured-date {
            font-size: 11px;
            color: #999;
            margin-top: 16px;
        }

        .news-list { }

        .news-list-row {
            display: flex;
            gap: 24px;
            padding: 20px 0;
            border-bottom: 1px solid #e8e8e8;
            text-decoration: none;
            color: #000;
            align-items: flex-start;
        }

        .news-list-row:hover { opacity: 0.7; }

        .news-list-thumb {
            width: 120px;
            height: 80px;
            object-fit: cover;
            flex-shrink: 0;
            background: #f0f0f0;
            display: block;
        }

        .news-list-title {
            font-size: 13px;
            font-weight: 400;
            line-height: 1.4;
            margin-bottom: 6px;
        }

        .news-list-date {
            font-size: 11px;
            color: #999;
        } </style>
<div class="news-grid" style="padding-top:40px;">

@php $first = $news->first(); @endphp

@if($first)
{{-- Featured article --}}
<a href="{{ route('news.show', $first->slug) }}" class="news-featured">
    @if($first->cover_image)
        <img class="news-featured-img" src="{{ asset('storage/'.$first->cover_image) }}" alt="{{ $first->title }}">
    @else
        <div class="news-featured-img" style="background:#f0f0f0;display:flex;align-items:center;justify-content:center;font-size:11px;color:#ccc;letter-spacing:2px;text-transform:uppercase;">BIG</div>
    @endif
    <div class="news-featured-info">
        <div class="news-cat-label">{{ $first->category ?? 'News' }}</div>
        <div class="news-featured-title">{{ $first->title }}</div>
        @if($first->excerpt)
        <div class="news-featured-excerpt">{{ \Illuminate\Support\Str::limit($first->excerpt, 140) }}</div>
        @endif
        <div class="news-featured-date">{{ $first->published_at?->format('d M Y') }}</div>
    </div>
</a>
@endif

{{-- Rest as list --}}
<div class="news-list">
    @foreach($news->skip(1) as $article)
    <a href="{{ route('news.show', $article->slug) }}" class="news-list-row">
        @if($article->cover_image)
            <img class="news-list-thumb" src="{{ asset('storage/'.$article->cover_image) }}" alt="{{ $article->title }}">
        @else
            <div class="news-list-thumb" style="display:flex;align-items:center;justify-content:center;font-size:10px;color:#ccc;">BIG</div>
        @endif
        <div>
            <div class="news-cat-label" style="margin-bottom:5px;">{{ $article->category ?? 'News' }}</div>
            <div class="news-list-title">{{ $article->title }}</div>
            <div class="news-list-date">{{ $article->published_at?->format('d M Y') }}</div>
        </div>
    </a>
    @endforeach
</div>

@if($news->isEmpty())
<div class="empty-msg">No news articles published yet.</div>
@endif

@if($news->hasPages())
<div style="padding:30px 0;">{{ $news->links() }}</div>
@endif

</div>
@endsection
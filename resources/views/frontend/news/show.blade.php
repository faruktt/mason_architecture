@extends('frontend.layouts.app')
@section('title', $article->title . ' — BIG')

@section('content')
<style> .detail-top {
            padding: 48px 60px 36px;
            border-bottom: 1px solid #e8e8e8;
        }

        .detail-back {
            font-size: 11px;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            color: #999;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 24px;
        }

        .detail-back:hover { color: #000; }

        .detail-top h1 {
            font-size: 28px;
            font-weight: 400;
            letter-spacing: -0.02em;
            line-height: 1.1;
            margin-bottom: 8px;
        }

        .detail-top .detail-sub {
            font-size: 11px;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: #999;
        }

        .detail-cover {
            width: 100%;
            display: block;
        }

        .detail-cover img {
            width: 100%;
            aspect-ratio: 16/9;
            object-fit: cover;
            display: block;
        }

        .detail-cover-placeholder {
            width: 100%;
            aspect-ratio: 16/9;
            background: #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ccc;
            font-size: 11px;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .detail-body {
            display: flex;
            border-top: 1px solid #e8e8e8;
        }

        .detail-body-content {
            flex: 1;
            padding: 40px 60px 60px;
            border-right: 1px solid #e8e8e8;
            max-width: 720px;
        }

        .detail-body-content p {
            font-size: 14px;
            line-height: 1.7;
            color: #000;
            margin-bottom: 16px;
        }

        .detail-body-content h3 {
            font-size: 11px;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: #999;
            font-weight: 400;
            margin: 28px 0 10px;
        }

        .detail-sidebar {
            width: 260px;
            flex-shrink: 0;
            padding: 40px 30px;
        }

        .detail-meta {
            margin-bottom: 22px;
        }

        .detail-meta-label {
            font-size: 10px;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: #999;
            margin-bottom: 4px;
        }

        .detail-meta-val {
            font-size: 13px;
            color: #000;
        }

        .btn-apply {
            display: block;
            background: #000;
            color: #fff;
            text-decoration: none;
            font-size: 12px;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            padding: 14px 20px;
            text-align: center;
            margin-top: 28px;
            transition: opacity 0.15s;
        }

        .btn-apply:hover { opacity: 0.7; color: #fff; }
</style>
<div class="detail-top">
    <a href="{{ route('news.index') }}" class="detail-back">← News</a>
    <div class="detail-sub">{{ strtoupper($article->category ?? 'News') }} · {{ $article->published_at?->format('d M Y') }}</div>
    <h1>{{ $article->title }}</h1>
</div>

<div class="detail-cover">
    @if($article->cover_image)
        <img src="{{ asset('storage/'.$article->cover_image) }}" alt="{{ $article->title }}">
    @else
        <div class="detail-cover-placeholder">BIG News</div>
    @endif
</div>

<div class="detail-body">
    <div class="detail-body-content">
        @if($article->excerpt)
        <p style="font-size:16px;line-height:1.6;border-bottom:1px solid #e8e8e8;padding-bottom:20px;margin-bottom:20px;">{{ $article->excerpt }}</p>
        @endif
        @if($article->content)
            @foreach(explode("\n\n", $article->content) as $para)
                @if(trim($para))<p>{{ trim($para) }}</p>@endif
            @endforeach
        @endif
    </div>

    <div class="detail-sidebar">
        <div class="detail-meta">
            <div class="detail-meta-label">Published</div>
            <div class="detail-meta-val">{{ $article->published_at?->format('d M Y') }}</div>
        </div>
        @if($article->category)
        <div class="detail-meta">
            <div class="detail-meta-label">Category</div>
            <div class="detail-meta-val">{{ $article->category }}</div>
        </div>
        @endif

        @if($recent->count())
        <div style="margin-top:32px;">
            <div class="detail-meta-label" style="margin-bottom:16px;">More News</div>
            @foreach($recent as $r)
            <a href="{{ route('news.show', $r->slug) }}" style="display:block;text-decoration:none;color:#000;margin-bottom:16px;">
                <div style="font-size:11px;color:#999;margin-bottom:3px;">{{ $r->published_at?->format('d M Y') }}</div>
                <div style="font-size:12px;line-height:1.4;">{{ $r->title }}</div>
            </a>
            @endforeach
        </div>
        @endif
    </div>
</div>

@endsection
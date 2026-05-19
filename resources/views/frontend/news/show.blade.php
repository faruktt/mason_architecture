@extends('frontend.layouts.app')
@section('title', $article->title . ' — BIG')

@section('content')

<!-- Article Hero -->
<div style="background:var(--black);padding:80px 0 60px;">
    <div class="container">
        <a href="{{ route('news.index') }}" style="color:rgba(255,255,255,0.5);text-decoration:none;font-size:13px;"><i class="bi bi-arrow-left me-1"></i>All News</a>
        <div style="margin-top:20px;">
            <span style="font-size:10px;letter-spacing:2px;text-transform:uppercase;color:var(--accent);font-weight:600;">{{ $article->category ?? 'News' }}</span>
        </div>
        <h1 style="font-size:clamp(28px,5vw,56px);font-weight:900;letter-spacing:-2px;line-height:1.1;color:#fff;margin:12px 0;max-width:800px;">{{ $article->title }}</h1>
        <div style="font-size:13px;color:#555;">{{ $article->published_at?->format('d M Y') }}</div>
    </div>
</div>

@if($article->cover_image)
<div style="background:#111;">
    <div class="container" style="padding-top:0;padding-bottom:0;">
        <img src="{{ asset('storage/'.$article->cover_image) }}" style="width:100%;max-height:520px;object-fit:cover;border-radius:0 0 16px 16px;" alt="{{ $article->title }}">
    </div>
</div>
@endif

<!-- Article Content -->
<section class="section">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-8">
                @if($article->excerpt)
                <p style="font-size:19px;line-height:1.7;color:#333;font-weight:400;margin-bottom:28px;padding-bottom:28px;border-bottom:1px solid var(--border);">
                    {{ $article->excerpt }}
                </p>
                @endif

                @if($article->content)
                <div style="font-size:16px;line-height:1.9;color:#444;">
                    {!! nl2br(e($article->content)) !!}
                </div>
                @endif
            </div>

            <div class="col-lg-4">
                <div style="position:sticky;top:80px;">
                    <div style="background:#f8f8f8;border-radius:12px;padding:24px;margin-bottom:20px;">
                        <div style="font-size:10px;letter-spacing:2px;text-transform:uppercase;color:#bbb;font-weight:600;margin-bottom:16px;">Article Info</div>
                        <div style="font-size:13px;color:#555;line-height:1.8;">
                            <div><strong>Published:</strong> {{ $article->published_at?->format('d M Y') }}</div>
                            @if($article->category)
                            <div class="mt-1"><strong>Category:</strong> {{ $article->category }}</div>
                            @endif
                        </div>
                    </div>

                    @if($recent->count())
                    <div>
                        <div style="font-size:10px;letter-spacing:2px;text-transform:uppercase;color:#bbb;font-weight:600;margin-bottom:16px;">More News</div>
                        <div class="d-flex flex-column gap-3">
                            @foreach($recent as $r)
                            <a href="{{ route('news.show', $r->slug) }}" style="text-decoration:none;color:inherit;display:flex;gap:12px;align-items:flex-start;">
                                <div style="width:8px;height:8px;border-radius:50%;background:var(--black);margin-top:6px;flex-shrink:0;"></div>
                                <div>
                                    <div style="font-size:13px;font-weight:600;color:var(--black);line-height:1.3;">{{ $r->title }}</div>
                                    <div style="font-size:11px;color:#bbb;margin-top:3px;">{{ $r->published_at?->format('d M Y') }}</div>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@extends('frontend.layouts.app')
@section('title', $career->title . ' — BIG Careers')

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
    <a href="{{ route('careers.index') }}" class="detail-back">← Careers</a>
    <div class="detail-sub">
        {{ strtoupper($career->department) }} · {{ strtoupper($career->location) }} · {{ strtoupper($career->type) }}
    </div>
    <h1>{{ $career->title }}</h1>
</div>

<div class="detail-body">
    <div class="detail-body-content">
        @if($career->description)
        <p style="font-size:15px;line-height:1.65;margin-bottom:24px;">{{ $career->description }}</p>
        @endif

        @if($career->responsibilities)
        <h3>Responsibilities</h3>
        @foreach(explode("\n", $career->responsibilities) as $line)
            @if(trim($line))<p>{{ trim($line) }}</p>@endif
        @endforeach
        @endif

        @if($career->requirements)
        <h3>Requirements</h3>
        @foreach(explode("\n", $career->requirements) as $line)
            @if(trim($line))<p>{{ trim($line) }}</p>@endif
        @endforeach
        @endif
    </div>

    <div class="detail-sidebar">
        <div class="detail-meta">
            <div class="detail-meta-label">Position</div>
            <div class="detail-meta-val">{{ $career->title }}</div>
        </div>
        <div class="detail-meta">
            <div class="detail-meta-label">Department</div>
            <div class="detail-meta-val">{{ $career->department }}</div>
        </div>
        <div class="detail-meta">
            <div class="detail-meta-label">Location</div>
            <div class="detail-meta-val">{{ $career->location }}</div>
        </div>
        <div class="detail-meta">
            <div class="detail-meta-label">Type</div>
            <div class="detail-meta-val">{{ $career->type }}</div>
        </div>
        @if($career->deadline)
        <div class="detail-meta">
            <div class="detail-meta-label">Deadline</div>
            <div class="detail-meta-val">{{ $career->deadline->format('d M Y') }}</div>
        </div>
        @endif

        @if($career->status === 'open')
            @if($career->apply_url)
            <a href="{{ $career->apply_url }}" target="_blank" class="btn-apply">Apply Now →</a>
            @else
            <a href="mailto:jobs@big.dk?subject={{ urlencode('Application: '.$career->title) }}" class="btn-apply">Apply via Email →</a>
            @endif
        @else
        <div style="font-size:12px;color:#999;margin-top:20px;padding:14px;border:1px solid #e8e8e8;text-align:center;">
            This position is no longer open.
        </div>
        @endif

        <div style="font-size:11px;color:#999;margin-top:14px;text-align:center;">
            Questions? <a href="mailto:jobs@big.dk" style="color:#000;">jobs@big.dk</a>
        </div>
    </div>
</div>

@endsection

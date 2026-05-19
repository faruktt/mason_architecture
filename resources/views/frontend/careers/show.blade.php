@extends('frontend.layouts.app')
@section('title', $career->title . ' — BIG Careers')

@section('content')

<div class="page-header">
    <div class="container">
        <a href="{{ route('careers.index') }}" style="color:rgba(255,255,255,0.5);text-decoration:none;font-size:13px;"><i class="bi bi-arrow-left me-1"></i>All Positions</a>
        <div style="margin-top:16px;">
            <span style="display:inline-block;background:var(--accent);color:#000;font-size:11px;font-weight:700;padding:4px 12px;border-radius:20px;margin-bottom:14px;">{{ $career->status == 'open' ? 'Now Hiring' : 'Position Closed' }}</span>
        </div>
        <h1>{{ $career->title }}</h1>
        <div style="display:flex;flex-wrap:wrap;gap:12px;margin-top:16px;">
            <span style="color:rgba(255,255,255,0.5);font-size:14px;"><i class="bi bi-building me-1"></i>{{ $career->department }}</span>
            <span style="color:rgba(255,255,255,0.5);font-size:14px;"><i class="bi bi-geo-alt me-1"></i>{{ $career->location }}</span>
            <span style="color:rgba(255,255,255,0.5);font-size:14px;"><i class="bi bi-clock me-1"></i>{{ $career->type }}</span>
            @if($career->deadline)
            <span style="color:rgba(255,255,255,0.5);font-size:14px;"><i class="bi bi-calendar me-1"></i>Deadline: {{ $career->deadline->format('d M Y') }}</span>
            @endif
        </div>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-8">
                @if($career->description)
                <div style="margin-bottom:36px;">
                    <h3 style="font-size:20px;font-weight:800;margin-bottom:14px;">About the Role</h3>
                    <p style="font-size:15px;color:#555;line-height:1.8;">{{ $career->description }}</p>
                </div>
                @endif

                @if($career->responsibilities)
                <div style="margin-bottom:36px;">
                    <h3 style="font-size:20px;font-weight:800;margin-bottom:14px;">Responsibilities</h3>
                    <div style="font-size:15px;color:#555;line-height:1.8;">{!! nl2br(e($career->responsibilities)) !!}</div>
                </div>
                @endif

                @if($career->requirements)
                <div style="margin-bottom:36px;">
                    <h3 style="font-size:20px;font-weight:800;margin-bottom:14px;">Requirements</h3>
                    <div style="font-size:15px;color:#555;line-height:1.8;">{!! nl2br(e($career->requirements)) !!}</div>
                </div>
                @endif
            </div>

            <div class="col-lg-4">
                <div style="background:#0a0a0a;border-radius:16px;padding:28px;color:#fff;position:sticky;top:80px;">
                    <div style="font-size:18px;font-weight:800;margin-bottom:20px;">Apply for this role</div>

                    <div style="margin-bottom:16px;">
                        <div style="font-size:11px;color:#555;text-transform:uppercase;letter-spacing:1px;">Position</div>
                        <div style="font-size:14px;margin-top:4px;">{{ $career->title }}</div>
                    </div>
                    <div style="margin-bottom:16px;">
                        <div style="font-size:11px;color:#555;text-transform:uppercase;letter-spacing:1px;">Location</div>
                        <div style="font-size:14px;margin-top:4px;">{{ $career->location }}</div>
                    </div>
                    <div style="margin-bottom:24px;">
                        <div style="font-size:11px;color:#555;text-transform:uppercase;letter-spacing:1px;">Type</div>
                        <div style="font-size:14px;margin-top:4px;">{{ $career->type }}</div>
                    </div>

                    @if($career->status == 'open')
                        @if($career->apply_url)
                        <a href="{{ $career->apply_url }}" target="_blank" class="btn-big accent w-100 justify-content-center">
                            Apply Now <i class="bi bi-arrow-right"></i>
                        </a>
                        @else
                        <a href="mailto:jobs@big.dk?subject=Application: {{ $career->title }}" class="btn-big accent w-100 justify-content-center">
                            Apply via Email <i class="bi bi-envelope"></i>
                        </a>
                        @endif
                    @else
                    <div style="background:rgba(255,255,255,0.05);border-radius:8px;padding:14px;font-size:13px;color:#555;text-align:center;">
                        This position is no longer open.
                    </div>
                    @endif

                    <div style="margin-top:16px;font-size:12px;color:#444;text-align:center;">
                        Questions? Email <a href="mailto:jobs@big.dk" style="color:#666;">jobs@big.dk</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

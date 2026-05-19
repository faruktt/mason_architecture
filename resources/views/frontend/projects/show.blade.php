@extends('frontend.layouts.app')
@section('title', $project->title . ' — BIG')

@section('content')

<!-- Project Hero -->
<div style="background:var(--black);min-height:65vh;display:flex;align-items:flex-end;padding:80px 0 60px;position:relative;overflow:hidden;">
    @if($project->cover_image)
    <div style="position:absolute;inset:0;opacity:0.35;">
        <img src="{{ asset('storage/'.$project->cover_image) }}" style="width:100%;height:100%;object-fit:cover;" alt="{{ $project->title }}">
    </div>
    @else
    <div style="position:absolute;inset:0;background:linear-gradient(135deg,#1a1a2e,#16213e,#0f3460);opacity:0.8;"></div>
    @endif
    <div style="position:absolute;inset:0;background:linear-gradient(to top,rgba(0,0,0,0.9) 0%,rgba(0,0,0,0.3) 100%);"></div>
    <div class="container" style="position:relative;z-index:2;color:#fff;">
        <a href="{{ route('projects.index') }}" style="color:rgba(255,255,255,0.5);text-decoration:none;font-size:13px;"><i class="bi bi-arrow-left me-1"></i>All Projects</a>
        <div style="font-size:11px;color:var(--accent);letter-spacing:2px;text-transform:uppercase;font-weight:600;margin:16px 0 10px;">{{ $project->category }} @if($project->year) · {{ $project->year }} @endif</div>
        <h1 style="font-size:clamp(36px,6vw,72px);font-weight:900;letter-spacing:-2px;line-height:1.0;margin-bottom:12px;">{{ $project->title }}</h1>
        <p style="font-size:16px;color:rgba(255,255,255,0.6);">{{ $project->location }}{{ $project->country ? ', '.$project->country : '' }}</p>
    </div>
</div>

<!-- Project Content -->
<section class="section">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-8">
                @if($project->description)
                <p style="font-size:19px;line-height:1.7;color:#333;font-weight:400;margin-bottom:32px;">{{ $project->description }}</p>
                @endif
                @if($project->full_content)
                <div style="font-size:15px;line-height:1.8;color:#555;">
                    {!! nl2br(e($project->full_content)) !!}
                </div>
                @endif
            </div>
            <div class="col-lg-4">
                <div style="background:#f8f8f8;border-radius:12px;padding:24px;">
                    <div style="font-size:10px;letter-spacing:2px;text-transform:uppercase;color:#bbb;font-weight:600;margin-bottom:16px;">Project Details</div>
                    @if($project->location)
                    <div style="margin-bottom:14px;">
                        <div style="font-size:11px;color:#bbb;text-transform:uppercase;letter-spacing:1px;">Location</div>
                        <div style="font-size:14px;font-weight:600;margin-top:3px;">{{ $project->location }}, {{ $project->country }}</div>
                    </div>
                    @endif
                    @if($project->year)
                    <div style="margin-bottom:14px;">
                        <div style="font-size:11px;color:#bbb;text-transform:uppercase;letter-spacing:1px;">Year</div>
                        <div style="font-size:14px;font-weight:600;margin-top:3px;">{{ $project->year }}</div>
                    </div>
                    @endif
                    <div>
                        <div style="font-size:11px;color:#bbb;text-transform:uppercase;letter-spacing:1px;">Category</div>
                        <div style="font-size:14px;font-weight:600;margin-top:3px;">{{ $project->category }}</div>
                    </div>
                </div>
            </div>
        </div>

        @if($related->count())
        <div class="divider"></div>
        <h3 style="font-size:24px;font-weight:800;letter-spacing:-0.5px;margin-bottom:24px;">Related Projects</h3>
        <div class="row g-3">
            @foreach($related as $r)
            <div class="col-md-4">
                <a href="{{ route('projects.show', $r->slug) }}" class="project-card" style="aspect-ratio:4/3;">
                    <div class="card-bg" style="background:linear-gradient(135deg,#1a1a2e,#0f3460);"></div>
                    @if($r->cover_image)<img src="{{ asset('storage/'.$r->cover_image) }}" alt="{{ $r->title }}">@endif
                    <div class="card-overlay"></div>
                    <div class="card-info">
                        <div class="card-cat">{{ $r->category }}</div>
                        <div class="card-title">{{ $r->title }}</div>
                        <div class="card-loc">{{ $r->location }}</div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>

@endsection

@extends('frontend.layouts.app')
@section('title', 'Careers — BIG')

@section('content')

<div class="page-header">
    <div class="container">
        <div class="section-label" style="color:var(--accent);">Join Us</div>
        <h1>Careers</h1>
        <p>{{ $careers->count() }} open positions across our global studios.</p>
    </div>
</div>

<section class="section">
    <div class="container">

        <!-- Filters -->
        <div class="row g-3 mb-5">
            <div class="col-md-6">
                <div class="section-label">Filter by Department</div>
                <div class="filter-pills">
                    <a href="{{ route('careers.index') }}" class="filter-pill {{ !request('dept') ? 'active' : '' }}">All</a>
                    @foreach($departments as $dept)
                    <a href="{{ route('careers.index', ['dept' => $dept]) }}" class="filter-pill {{ request('dept') == $dept ? 'active' : '' }}">{{ $dept }}</a>
                    @endforeach
                </div>
            </div>
            <div class="col-md-6">
                <div class="section-label">Filter by Location</div>
                <div class="filter-pills">
                    <a href="{{ route('careers.index') }}" class="filter-pill {{ !request('loc') ? 'active' : '' }}">All</a>
                    @foreach($locations as $loc)
                    <a href="{{ route('careers.index', ['loc' => $loc]) }}" class="filter-pill {{ request('loc') == $loc ? 'active' : '' }}">{{ $loc }}</a>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Job Listings -->
        <div class="d-flex flex-column gap-3">
            @forelse($careers as $career)
            <a href="{{ route('careers.show', $career->id) }}" class="career-item">
                <div class="career-icon">
                    <i class="bi bi-briefcase"></i>
                </div>
                <div class="flex-grow-1">
                    <div class="career-title">{{ $career->title }}</div>
                    <div class="career-meta">{{ $career->department }}</div>
                </div>
                <div class="career-tags">
                    <span class="career-tag loc"><i class="bi bi-geo-alt me-1"></i>{{ $career->location }}</span>
                    <span class="career-tag type">{{ $career->type }}</span>
                </div>
                <i class="bi bi-arrow-right" style="color:#ccc;font-size:18px;"></i>
            </a>
            @empty
            <div class="text-center py-5">
                <i class="bi bi-briefcase" style="font-size:48px;color:#ddd;"></i>
                <p class="mt-3 text-muted">No open positions at the moment. Check back soon.</p>
            </div>
            @endforelse
        </div>

        <!-- Info Strip -->
        <div class="row g-4 mt-5 pt-4" style="border-top:1px solid var(--border);">
            <div class="col-md-4">
                <i class="bi bi-globe" style="font-size:28px;color:var(--black);"></i>
                <h5 style="font-weight:700;margin:12px 0 6px;">Global Offices</h5>
                <p style="font-size:13px;color:#777;line-height:1.7;">Work from Copenhagen, New York, London, Barcelona or Los Angeles.</p>
            </div>
            <div class="col-md-4">
                <i class="bi bi-people" style="font-size:28px;color:var(--black);"></i>
                <h5 style="font-weight:700;margin:12px 0 6px;">60+ Nationalities</h5>
                <p style="font-size:13px;color:#777;line-height:1.7;">A truly diverse team bringing perspectives from around the world.</p>
            </div>
            <div class="col-md-4">
                <i class="bi bi-lightning" style="font-size:28px;color:var(--black);"></i>
                <h5 style="font-weight:700;margin:12px 0 6px;">Ambitious Work</h5>
                <p style="font-size:13px;color:#777;line-height:1.7;">Work on the most challenging and celebrated projects in the world.</p>
            </div>
        </div>
    </div>
</section>

@endsection

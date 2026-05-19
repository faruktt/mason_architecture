@extends('frontend.layouts.app')
@section('title', 'Sustainability — BIG')

@section('content')

<div class="page-header" style="background:#0d1a0d;">
    <div class="container">
        <div class="section-label" style="color:#4ade80;">Our Commitment</div>
        <h1>Sustainability</h1>
        <p>Designing a world that is as good as it can be — for people and for the planet.</p>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="row g-5 align-items-center mb-5">
            <div class="col-lg-6">
                <div class="section-label">Our Approach</div>
                <h2 class="section-title">Sustainable Design Is Not an Option — It's the Goal</h2>
                <p style="font-size:16px;color:#555;line-height:1.8;margin-bottom:20px;">
                    For BIG, sustainable design means creating architecture that gives more than it takes. We believe the built environment can become a force for ecological regeneration, not just damage reduction.
                </p>
                <p style="font-size:16px;color:#555;line-height:1.8;">
                    Today's measure of architectural quality is not the golden ratio but the UN's 17 Sustainable Development Goals — a universal set of targets for making the world a better place.
                </p>
            </div>
            <div class="col-lg-6">
                <div class="row g-3">
                    @foreach([['#d1fae5','#065f46','bi-leaf','Net Zero Carbon','Designing for net-zero and carbon-negative operations across our portfolio.'],['#dbeafe','#1e40af','bi-sun','Renewable Energy','Every project explores solar, geothermal, and wind integration.'],['#fef3c7','#92400e','bi-droplet','Water Stewardship','Closed-loop water systems that treat and reuse on-site.'],['#f3e8ff','#6d28d9','bi-recycle','Circular Materials','Prioritizing reuse, recycled content, and bio-based materials.']] as $item)
                    <div class="col-6">
                        <div style="background:{{ $item[0] }};border-radius:12px;padding:20px;">
                            <i class="bi {{ $item[2] }}" style="font-size:24px;color:{{ $item[1] }};"></i>
                            <div style="font-size:14px;font-weight:700;color:{{ $item[1] }};margin:10px 0 6px;">{{ $item[3] }}</div>
                            <p style="font-size:12px;color:{{ $item[1] }};opacity:0.8;line-height:1.6;margin:0;">{{ $item[4] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="divider"></div>

        <div class="section-label">Landmark Projects</div>
        <h2 class="section-title" style="margin-bottom:40px;">Sustainability in Practice</h2>

        @foreach([
            ['CopenHill','Copenhagen, Denmark','The world\'s cleanest waste-to-energy plant with an alpine ski slope on its roof — proving that beautiful and sustainable are not mutually exclusive.','LEED & BREEAM Certified'],
            ['Google Bay View','Mountain View, USA','The world\'s largest net-zero carbon campus, featuring 50,000 dragonscale solar panels, geothermal piles, and a 100% renewable energy operation.','LEED Platinum'],
            ['The Plus','Jevnaker, Norway','The world\'s first BREEAM Outstanding-certified factory, built entirely of locally sourced Norwegian spruce and designed for full circular economy principles.','BREEAM Outstanding'],
            ['Gelephu Mindfulness City','Bhutan','A 100-year masterplan for a 2,500 km² carbon-negative city guided by the country\'s Gross National Happiness philosophy.','Carbon Negative'],
        ] as $i => $p)
        <div class="row g-4 mb-4 align-items-center">
            <div class="{{ $i % 2 == 0 ? 'col-md-4' : 'col-md-4 order-md-2' }}">
                <div style="aspect-ratio:4/3;border-radius:12px;background:linear-gradient(135deg,#0d1a0d,#1a3a1a);display:flex;align-items:center;justify-content:center;">
                    <i class="bi bi-building" style="font-size:48px;color:rgba(74,222,128,0.2);"></i>
                </div>
            </div>
            <div class="{{ $i % 2 == 0 ? 'col-md-8' : 'col-md-8 order-md-1' }}">
                <span style="display:inline-block;background:#d1fae5;color:#065f46;font-size:11px;font-weight:700;padding:4px 12px;border-radius:20px;margin-bottom:12px;">{{ $p[3] }}</span>
                <h3 style="font-size:24px;font-weight:800;letter-spacing:-0.5px;margin-bottom:6px;">{{ $p[0] }}</h3>
                <div style="font-size:12px;color:#aaa;margin-bottom:12px;">{{ $p[1] }}</div>
                <p style="font-size:15px;color:#555;line-height:1.8;margin:0;">{{ $p[2] }}</p>
            </div>
        </div>
        @endforeach
    </div>
</section>

@endsection

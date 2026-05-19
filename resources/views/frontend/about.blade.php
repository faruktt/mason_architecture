@extends('frontend.layouts.app')
@section('title', 'About — BIG')

@section('content')

<div class="page-header">
    <div class="container">
        <div class="section-label" style="color:var(--accent);">Who We Are</div>
        <h1>About BIG</h1>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <div class="section-label">Our Story</div>
                <h2 class="section-title">Architecture is the art and science of making sure cities function and fulfill the human desires.</h2>
                <p style="font-size:16px;color:#555;line-height:1.8;margin-bottom:20px;">
                    Founded in 2005 by Bjarke Ingels in Copenhagen, BIG has grown from a small practice to a global architecture firm with over 800 team members across offices in Copenhagen, New York, London, Barcelona, and Los Angeles.
                </p>
                <p style="font-size:16px;color:#555;line-height:1.8;">
                    BIG's architecture emerges out of a careful analysis of how contemporary life constantly evolves and changes. We believe architecture must be like a good pair of jeans — it must fit the time it lives in.
                </p>
            </div>
            <div class="col-lg-6">
                <div style="background:#0a0a0a;border-radius:16px;padding:36px;color:#fff;">
                    <div style="font-size:48px;font-weight:900;color:var(--accent);letter-spacing:-2px;line-height:1;">BIG<br>LEAP</div>
                    <p style="font-size:14px;color:#555;margin-top:12px;line-height:1.8;">
                        Landscape · Engineering · Architecture · Planning
                    </p>
                    <div class="divider" style="border-color:rgba(255,255,255,0.08);"></div>
                    <div class="row g-3 text-center">
                        @foreach([['800+','Designers'],['60+','Countries'],['150+','Projects'],['5','Offices']] as $s)
                        <div class="col-6">
                            <div style="font-size:28px;font-weight:900;color:var(--accent);">{{ $s[0] }}</div>
                            <div style="font-size:11px;color:#555;text-transform:uppercase;letter-spacing:1px;">{{ $s[1] }}</div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="divider"></div>

        <div class="row g-4">
            @foreach([['Architecture','Building typologies that challenge convention and celebrate human life.','bi-building'],['Landscape','Transforming the boundary between the built and the natural world.','bi-tree'],['Planning','Visionary urban strategies for the cities of tomorrow.','bi-map'],['Products','Objects that embody the same ambition as our largest projects.','bi-box']] as $item)
            <div class="col-md-3">
                <div style="padding:20px;background:#f8f8f8;border-radius:12px;height:100%;">
                    <i class="bi {{ $item[2] }}" style="font-size:28px;color:var(--black);"></i>
                    <div style="font-size:16px;font-weight:700;margin:12px 0 8px;">{{ $item[0] }}</div>
                    <p style="font-size:13px;color:#777;line-height:1.7;margin:0;">{{ $item[1] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection

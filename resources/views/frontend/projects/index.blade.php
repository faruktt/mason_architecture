@extends('frontend.layouts.app')
@section('title', 'Projects — BIG')

@section('content')


<section class="section">
    <div class="container mx-auto w-6/12 mb-16">
        <div class="carousel w-full rounded">
             @forelse($projects as $i => $project)
            <div id="slide1" class="carousel-item relative w-full">
                <img src="{{ asset('storage/'.$project->cover_image) }}" alt="{{ $project->title }}" class="w-full h-[500px]" />
                <div class="absolute left-0 bottom-0 bg-[#354E4A] text-center p-3 w-full">
                    <h1 class="text-2xl text-white font-medium">{{ $project->title }} at {{ $project->location }}{{ $project->country ? ', '.$project->country : '' }}</h1>
                </div>
                <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
                    <a href="#slide4" class="btn btn-circle">❮</a>
                    <a href="#slide2" class="btn btn-circle">❯</a>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <p class="text-muted">No projects found.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection

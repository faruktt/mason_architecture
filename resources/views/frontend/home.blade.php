<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <!-- Tailwind CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <!-- Daisy UI CDN -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <!-- Font awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <main>
        <!-- Hero Section -->
        <div class="hero min-h-screen relative"
            style="background-image: url(https://i.ibb.co.com/d47v24hy/COVER-PORTFOLIO-A4.jpg);">

            <!-- <div class="navbar container mx-auto absolute inset-x-0 top-0 mb-16">
                <div class="navbar-start">
                    <a class="text-xl"><img src="https://i.ibb.co.com/hxY9HBFW/logo-6-removebg-preview.png"
                            alt="logo"></a>
                </div>
            </div> -->

            <!-- Navbar -->
            <div class="navbar absolute inset-x-0 top-0">
                <div class="navbar-start">
                    <div class="dropdown">
                        <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h8m-8 6h16" />
                            </svg>
                        </div>
                        <ul tabindex="0"
                            class="menu menu-sm dropdown-content text-white bg-base-100 rounded-box text-lg z-1 mt-3 w-52 p-2 shadow">
                            <li><a href="masterplan.html">Master Plan</a></li>
                            <li><a href="architecture.html">Architecture</a></li>
                            <li><a href="landscape.html">Landscape</a></li>
                            <li><a href="interior.html">Interior</a></li>
                            <li><a href="construction.html">Construction</a></li>
                        </ul>
                    </div>
                    <!-- This is logo section -->
                    <div class="dropdown dropdown-start">
                        <div tabindex="0" class=" m-3">
                            <img class="pl-12" src="https://i.ibb.co.com/hxY9HBFW/logo-6-removebg-preview.png"
                                alt="logo">
                        </div>
                        <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-1 w-52 p-2 shadow-sm">
                            <li><a>Projects</a></li>
                            <li><a href="{{ route('news.index') }}">News</a></li>
                            <li><a href="{{ route('about')  }}">About</a></li>
                            <li><a href="{{ route('sustainability')  }}">Sustainability</a></li>
                            <li><a href="{{ route('people')  }}">People</a></li>
                            <li><a href="{{ route('careers.index') }}">Careers</a></li>
                            <li><a href="{{ route('about')  }}">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="navbar hidden lg:flex">
                    <ul class="menu menu-horizontal px-1 gap-10 text-lg text-white font-medium">
                        <li><a href="{{ route('projects.index') }}">Master Plan</a></li>
                        <li><a href="{{ route('projects.index') }}">Architecture</a></li>
                        <li><a href="{{ route('projects.index') }}">Landscape</a></li>
                        <li><a href="{{ route('projects.index') }}">Interior</a></li>
                        <li><a href="{{ route('projects.index') }}">Construction</a></li>
                    </ul>
                </div>
            </div>

            <!-- Project Section -->
            <div class="carousel carousel-vertical gap-10 h-[700px] overflow-y-auto scroll-smooth snap-none">
               @forelse($featuredProjects as $i => $project)
                <div class="carousel-item h-1/2">
                    <div class="mt-10 h-full">
                        <div class="hero">
                            <div class="flex flex-col gap-6 lg:flex-row-reverse">
                                <div class="text-white">
                                    <img class="w-14 border rounded" src="{{ asset('storage/'.$project->cover_image) }}" alt="{{ $project->title }}"
                                        alt="Construction of BOQ Complex">
                                    <h1 class="text-3xl font-bold">{{ $project->title }}</h1>
                                    <p class="">{{ $project->location }}{{ $project->country ? ', '.$project->country : '' }}</p>
                                </div>
                                <img src="{{ asset('storage/'.$project->cover_image) }}" alt="{{ $project->title }}"
                                    class="max-w-sm h-[300px] border border-white rounded-lg shadow-2xl" />
                            </div>
                        </div>
                    </div>
                </div>
              @empty
            <div class="col-12 text-center py-5 text-muted">
                <p>No featured projects yet. <a href="{{ route('admin.projects.create') }}">Add some from admin</a>.</p>
            </div>
            @endforelse
            </div>
        </div>
    </main>
    <!-- Footer Section -->
    <section>
        <footer class="footer footer-horizontal footer-center bg-[#354E4A] text-base-content rounded p-10">
            <nav class="grid grid-flow-col gap-4 text-white">
                <a class="link link-hover">Email</a>
                <a class="link link-hover">Offices</a>
                <a class="link link-hover">Social</a>
                <a class="link link-hover">Legal</a>
            </nav>
            <nav>
                <div class="grid grid-flow-col gap-4 text-white">
                    <a class="text-2xl">
                        <i class="fa-brands fa-facebook"></i>
                    </a>
                    <a class="text-2xl">
                        <i class="fa-brands fa-square-instagram"></i>
                    </a>
                    <a class="text-2xl">
                        <i class="fa-brands fa-linkedin"></i>
                    </a>
                </div>
            </nav>
            <aside class="text-white">
                <p>Copyright © All right reserved by SARKAR IT</p>
            </aside>
        </footer>
    </section>
</body>

</html>
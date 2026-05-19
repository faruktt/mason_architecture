<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masterplan page</title>
    <!-- Tailwind CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <!-- Daisy UI CDN -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Font awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        
</head>

<body>
    <!-- Navbar -->
    <section class="bg-base-100 shadow-sm mb-16">
        <div class="navbar container mx-auto">
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
                        class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 text-lg mt-3 w-52 p-2 shadow">
                        <li><a href="{{ route('news.index') }}">News</a></li>
                        <li>
                            <a class="text-red-700">Project</a>
                            <ul class="p-2">
                                <li><a class="text-red-700" href="{{ route('projects.index') }}">Master Plan</a></li>
                                <li><a href="{{ route('projects.index') }}">Architecture</a></li>
                                <li><a href="{{ route('projects.index') }}">Landscape</a></li>
                                <li><a href="{{ route('projects.index') }}">Interior</a></li>
                                <li><a href="{{ route('projects.index') }}">Construction</a></li>
                            </ul>
                        </li>
                        <li><a href="studio.html">Studio</a></li>
                        <li><a href="{{ route('people') }}">Team</a></li>
                        <li><a href="{{ route('about') }}">Contact</a></li>
                    </ul>
                </div>
                <a class="text-xl" href="{{ route('home') }}"><img src="https://i.ibb.co/hxY9HBFW/logo-6-removebg-preview.png"
                        alt=""></a>
            </div>
            <div class="navbar-end hidden lg:flex">
                <ul class="menu menu-horizontal px-1 text-lg">
                    <li><a href="{{ route('news.index') }}">News</a></li>
                    <li>
                        <details>
                            <summary class="text-red-700">Project</summary>
                            <ul class="p-2">
                                <li><a class="text-red-700" href="{{ route('projects.index') }}">Master Plan</a></li>
                                <li><a href="{{ route('projects.index') }}">Architecture</a></li>
                                <li><a href="{{ route('projects.index') }}">Landscape</a></li>
                                <li><a href="{{ route('projects.index') }}">Interior</a></li>
                                <li><a href="{{ route('projects.index') }}">Construction</a></li>
                            </ul>
                        </details>
                    </li>
                    <li><a href="studio.html">Studio</a></li>
                    <li><a href="{{ route('people') }}">Team</a></li>
                    <li><a href="{{ route('about') }}">Contact</a></li>
                </ul>
            </div>
        </div>
    </section>
   
    @yield('content')
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
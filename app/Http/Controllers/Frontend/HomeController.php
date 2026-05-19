<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\News;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProjects = Project::published()->featured()->take(6)->get();
        $recentNews = News::published()->latest()->take(3)->get();
        $allProjects = Project::published()->orderBy('sort_order')->get();
        return view('frontend.home', compact('featuredProjects', 'recentNews', 'allProjects'));
    }

    public function sustainability()
    {
        return view('frontend.sustainability');
    }
}

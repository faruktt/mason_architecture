<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\News;

class HomeController extends Controller
{
    public function index()
    {
         $query = Project::published()->orderBy('sort_order');
    
        if (request()->has('cat') && request('cat') != '') {
            $query->where('category', request('cat'));
        }

        $projects = $query->paginate(20);
        $featuredProjects = Project::published()->featured()->take(6)->get();
        $recentNews = News::published()->latest()->take(3)->get();
        $allProjects = Project::published()->orderBy('sort_order')->get();
        $categories = Project::published()->distinct()->pluck('category');
        return view('frontend.home', compact('featuredProjects', 'recentNews', 'allProjects','projects','categories'));
    }

    public function sustainability()
    {
        return view('frontend.sustainability');
    }
}

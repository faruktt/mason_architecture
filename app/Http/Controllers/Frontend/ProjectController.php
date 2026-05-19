<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Project;

class ProjectController extends Controller
{
  public function index()
{
    $query = Project::published()->orderBy('sort_order');
    
    // যদি ক্যাটাগরি সিলেক্ট করা থাকে তবে ফিল্টার করো
    if (request()->has('cat') && request('cat') != '') {
        $query->where('category', request('cat'));
    }

    $projects = $query->paginate(20);
    $categories = Project::published()->distinct()->pluck('category');
    
    return view('frontend.projects.index', compact('projects', 'categories'));
}

    public function show($slug)
    {
        $project = Project::where('slug', $slug)->where('status', 'published')->firstOrFail();
        $related = Project::published()->where('category', $project->category)->where('id', '!=', $project->id)->take(3)->get();
        return view('frontend.projects.show', compact('project', 'related'));
    }
}

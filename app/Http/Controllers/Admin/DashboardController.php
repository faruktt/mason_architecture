<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\TeamMember;
use App\Models\Career;
use App\Models\News;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'projects' => Project::count(),
            'team' => TeamMember::count(),
            'careers' => Career::where('status', 'open')->count(),
            'news' => News::count(),
        ];

        $recentProjects = Project::latest()->take(5)->get();
        $recentNews = News::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentProjects', 'recentNews'));
    }
}

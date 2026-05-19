@extends('admin.layouts.app')
@section('page-title', 'Dashboard')

@section('content')
<!-- Stats Row -->
<div class="row g-3 mb-4">
    <div class="col-6 col-md-3">
        <div class="stat-card">
            <div class="stat-icon" style="background:#f0f4ff;">
                <i class="bi bi-building" style="color:#3b5bdb;"></i>
            </div>
            <div>
                <div class="stat-num">{{ $stats['projects'] }}</div>
                <div class="stat-label">Total Projects</div>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="stat-card">
            <div class="stat-icon" style="background:#d1fae5;">
                <i class="bi bi-people-fill" style="color:#065f46;"></i>
            </div>
            <div>
                <div class="stat-num">{{ $stats['team'] }}</div>
                <div class="stat-label">Team Members</div>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="stat-card">
            <div class="stat-icon" style="background:#fef3c7;">
                <i class="bi bi-briefcase-fill" style="color:#92400e;"></i>
            </div>
            <div>
                <div class="stat-num">{{ $stats['careers'] }}</div>
                <div class="stat-label">Open Positions</div>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="stat-card">
            <div class="stat-icon" style="background:#fce7f3;">
                <i class="bi bi-newspaper" style="color:#9d174d;"></i>
            </div>
            <div>
                <div class="stat-num">{{ $stats['news'] }}</div>
                <div class="stat-label">News Articles</div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="row g-3 mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-body d-flex flex-wrap gap-2">
                <a href="{{ route('admin.projects.create') }}" class="btn btn-accent">
                    <i class="bi bi-plus-lg me-1"></i> New Project
                </a>
                <a href="{{ route('admin.team.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg me-1"></i> Add Team Member
                </a>
                <a href="{{ route('admin.careers.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg me-1"></i> Post a Job
                </a>
                <a href="{{ route('admin.news.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg me-1"></i> Write News
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row g-3">
    <!-- Recent Projects -->
    <div class="col-lg-7">
        <div class="card h-100">
            <div class="card-header">
                <span class="card-title"><i class="bi bi-building me-2"></i>Recent Projects</span>
                <a href="{{ route('admin.projects.index') }}" class="btn btn-sm btn-primary">View All</a>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Location</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentProjects as $project)
                        <tr>
                            <td><strong>{{ $project->title }}</strong></td>
                            <td><span class="text-muted">{{ $project->category }}</span></td>
                            <td><small>{{ $project->location }}, {{ $project->country }}</small></td>
                            <td>
                                <span class="badge-status badge-{{ $project->status }}">{{ ucfirst($project->status) }}</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Recent News -->
    <div class="col-lg-5">
        <div class="card h-100">
            <div class="card-header">
                <span class="card-title"><i class="bi bi-newspaper me-2"></i>Recent News</span>
                <a href="{{ route('admin.news.index') }}" class="btn btn-sm btn-primary">View All</a>
            </div>
            <div class="card-body p-0">
                @foreach($recentNews as $article)
                <div class="d-flex align-items-start gap-3 p-3" style="border-bottom: 1px solid #f0f0f0;">
                    <div style="width:8px;height:8px;border-radius:50%;background:var(--accent);margin-top:5px;flex-shrink:0;border:2px solid #000;"></div>
                    <div>
                        <div style="font-size:14px;font-weight:600;color:#1a1a1a;">{{ $article->title }}</div>
                        <div style="font-size:12px;color:#888;margin-top:2px;">
                            {{ $article->category }} • {{ $article->created_at->diffForHumans() }}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

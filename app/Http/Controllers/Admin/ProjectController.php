<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->paginate(15);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'category' => 'required|string',
            'description' => 'nullable|string',
            'full_content' => 'nullable|string',
            'year' => 'nullable|integer',
            'status' => 'required|in:published,draft',
            'featured' => 'nullable|boolean',
            'cover_image' => 'nullable|image|max:5120',
        ]);

        $validated['slug'] = Str::slug($request->title) . '-' . uniqid();
        $validated['featured'] = $request->boolean('featured');

        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('projects', 'public');
            $validated['cover_image'] = $path;
        }

        Project::create($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully!');
    }

    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'category' => 'required|string',
            'description' => 'nullable|string',
            'full_content' => 'nullable|string',
            'year' => 'nullable|integer',
            'status' => 'required|in:published,draft',
            'featured' => 'nullable|boolean',
            'cover_image' => 'nullable|image|max:5120',
        ]);

        $validated['featured'] = $request->boolean('featured');

        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('projects', 'public');
            $validated['cover_image'] = $path;
        }

        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully!');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully!');
    }
}

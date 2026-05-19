<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $team = TeamMember::orderBy('sort_order')->paginate(15);
        return view('admin.team.index', compact('team'));
    }

    public function create()
    {
        return view('admin.team.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'office' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'email' => 'nullable|email',
            'linkedin' => 'nullable|url',
            'sort_order' => 'nullable|integer',
            'is_partner' => 'nullable|boolean',
            'photo' => 'nullable|image|max:5120',
        ]);

        $validated['is_partner'] = $request->boolean('is_partner');
        $validated['is_active'] = true;

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('team', 'public');
            $validated['photo'] = $path;
        }

        TeamMember::create($validated);

        return redirect()->route('admin.team.index')->with('success', 'Team member added successfully!');
    }

    public function show(TeamMember $team)
    {
        return view('admin.team.show', compact('team'));
    }

    public function edit(TeamMember $team)
    {
        return view('admin.team.edit', compact('team'));
    }

    public function update(Request $request, TeamMember $team)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'office' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'email' => 'nullable|email',
            'linkedin' => 'nullable|url',
            'sort_order' => 'nullable|integer',
            'is_partner' => 'nullable|boolean',
            'photo' => 'nullable|image|max:5120',
        ]);

        $validated['is_partner'] = $request->boolean('is_partner');

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('team', 'public');
            $validated['photo'] = $path;
        }

        $team->update($validated);

        return redirect()->route('admin.team.index')->with('success', 'Team member updated successfully!');
    }

    public function destroy(TeamMember $team)
    {
        $team->delete();
        return redirect()->route('admin.team.index')->with('success', 'Team member removed!');
    }
}

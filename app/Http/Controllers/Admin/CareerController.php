<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index()
    {
        $careers = Career::latest()->paginate(15);
        return view('admin.careers.index', compact('careers'));
    }

    public function create()
    {
        return view('admin.careers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'type' => 'required|string',
            'description' => 'nullable|string',
            'requirements' => 'nullable|string',
            'responsibilities' => 'nullable|string',
            'apply_url' => 'nullable|url',
            'status' => 'required|in:open,closed',
            'deadline' => 'nullable|date',
        ]);

        Career::create($validated);

        return redirect()->route('admin.careers.index')->with('success', 'Job posting created!');
    }

    public function show(Career $career)
    {
        return view('admin.careers.show', compact('career'));
    }

    public function edit(Career $career)
    {
        return view('admin.careers.edit', compact('career'));
    }

    public function update(Request $request, Career $career)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'type' => 'required|string',
            'description' => 'nullable|string',
            'requirements' => 'nullable|string',
            'responsibilities' => 'nullable|string',
            'apply_url' => 'nullable|url',
            'status' => 'required|in:open,closed',
            'deadline' => 'nullable|date',
        ]);

        $career->update($validated);

        return redirect()->route('admin.careers.index')->with('success', 'Job posting updated!');
    }

    public function destroy(Career $career)
    {
        $career->delete();
        return redirect()->route('admin.careers.index')->with('success', 'Job posting deleted!');
    }
}

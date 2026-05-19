<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Career;

class CareerController extends Controller
{
    public function index()
    {
        $careers = Career::open()->latest()->get();
        $departments = Career::open()->distinct()->pluck('department');
        $locations = Career::open()->distinct()->pluck('location');
        return view('frontend.careers.index', compact('careers', 'departments', 'locations'));
    }

    public function show($id)
    {
        $career = Career::findOrFail($id);
        return view('frontend.careers.show', compact('career'));
    }
}

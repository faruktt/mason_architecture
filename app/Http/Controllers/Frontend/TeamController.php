<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;

class TeamController extends Controller
{
    public function index()
    {
        return view('frontend.about');
    }

    public function people()
    {
        $partners = TeamMember::where('is_partner', true)->where('is_active', true)->orderBy('sort_order')->get();
        $associates = TeamMember::where('is_partner', false)->where('is_active', true)->orderBy('name')->get();
        return view('frontend.people', compact('partners', 'associates'));
    }
}

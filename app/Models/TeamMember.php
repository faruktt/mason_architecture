<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TeamMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'role', 'title', 'office', 'bio',
        'photo', 'email', 'linkedin', 'sort_order', 'is_partner', 'is_active'
    ];

    protected $casts = [
        'is_partner' => 'boolean',
        'is_active' => 'boolean',
    ];
}

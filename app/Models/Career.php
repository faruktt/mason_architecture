<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Career extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'department', 'location', 'type',
        'description', 'requirements', 'responsibilities', 'apply_url', 'status', 'deadline'
    ];

    protected $casts = [
        'deadline' => 'date',
    ];

    public function scopeOpen($query)
    {
        return $query->where('status', 'open');
    }
}

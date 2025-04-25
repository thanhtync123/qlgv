<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchProject extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_name',
        'lecturer_id',
        'description',
        'status'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'budget' => 'decimal:2'
    ];

    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
} 
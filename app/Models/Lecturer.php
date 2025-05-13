<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    protected $casts = [
        'date_of_birth' => 'date',
        'hire_date' => 'date',
    ];

    public function degree()
    {
        return $this->belongsTo(Degree::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'lecturer_courses', 'lecturer_id', 'course_id');
    }
}

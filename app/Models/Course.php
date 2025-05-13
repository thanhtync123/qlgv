<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    
    public function lecturers()
    {
        return $this->belongsToMany(Lecturer::class, 'lecturer_courses', 'course_id', 'lecturer_id');
    }
}

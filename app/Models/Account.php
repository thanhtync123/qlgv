<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Account extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guarded = [];

    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class, 'lecturer_id');
    }

    public function isAdmin()
    {
        return $this->role === 'Admin';
    }

    public function isLecturer()
    {
        return $this->role === 'Lecturer';
    }

    public function canViewLecturer($lecturerId)
    {
        if ($this->isAdmin()) {
            return true;
        }
        
        return $this->isLecturer() && $this->lecturer_id == $lecturerId;
    }
}

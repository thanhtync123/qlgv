<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course; 
use App\Models\Department;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function index()
    {
        $course = DB::table('courses as c')
        ->join('departments as d', 'c.department_id', '=', 'd.id')
        ->select('c.id', 'c.course_name', 'd.department_name')
        ->orderBy('d.department_name', 'asc')
        ->get();
    
        return view('course.index',compact('course'));
    }
   

    public function create()
    {
        return view('course.view');
        
    }
}

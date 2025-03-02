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
        ->orderBy('c.id', 'asc') // Sắp xếp theo ID tăng dần
        ->get();
    
    
        return view('course.index',compact('course'));
    }
   

    public function create()
    {
        $departments = Department::All();
        return view('course.view',compact('departments'));
        
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:courses,course_name|max:255',
            'department' => 'required|integer'
        ], [
            'name.unique' => 'The course name already exists. Please choose a different name.',
            'name.required' => 'Please enter a course name.',
            'name.max' => 'The course name must not exceed 255 characters.',
            'department.required' => 'Please select a department.',
            'department.integer' => 'The department ID must be an integer.'
        ]);
        
        $course = new Course();
        $course->course_name = $request->name;
        $course->department_id = $request->department;
        $course->save();
        
        return redirect()->to('/course')->with('success', 'Course created successfully!');
        
        
        
    }
}

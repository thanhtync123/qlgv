<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lecturer;
use App\Models\Course;
use App\Models\LecturerCourse;
use App\Models\Department;
use Illuminate\Support\Facades\DB;

class LecturerCourseController extends Controller
{
    /**
     * Display a listing of the lecturer courses
     */
    public function index()
    {
        $lecturerCourses = DB::table('lecturer_courses as lc')
            ->join('lecturers as l', 'lc.lecturer_id', '=', 'l.id')
            ->join('courses as c', 'lc.course_id', '=', 'c.id')
            ->join('departments as d', 'l.department_id', '=', 'd.id')
            ->select('lc.id', 'l.full_name as lecturer_name', 'c.course_name', 'd.department_name', 'l.id as lecturer_id', 'c.id as course_id')
            ->orderBy('l.full_name')
            ->get();
        
        return view('lecturer_course.index', compact('lecturerCourses'));
    }

    /**
     * Show the form for creating a new lecturer course assignment
     */
    public function create()
    {
        $lecturers = Lecturer::select('id', 'full_name')->orderBy('full_name')->get();
        $courses = DB::table('courses as c')
            ->join('departments as d', 'c.department_id', '=', 'd.id')
            ->select('c.id', 'c.course_name', 'd.department_name')
            ->orderBy('c.course_name')
            ->get();
            
        return view('lecturer_course.create', compact('lecturers', 'courses'));
    }

    /**
     * Store a newly created lecturer course assignment
     */
    public function store(Request $request)
    {
        $request->validate([
            'lecturer_id' => 'required|exists:lecturers,id',
            'course_id' => 'required|exists:courses,id',
        ], [
            'lecturer_id.required' => 'Vui lòng chọn giảng viên',
            'course_id.required' => 'Vui lòng chọn môn học',
        ]);
        
        // Check if assignment already exists
        $exists = LecturerCourse::where('lecturer_id', $request->lecturer_id)
            ->where('course_id', $request->course_id)
            ->exists();
            
        if ($exists) {
            return redirect()->back()->with('error', 'Giảng viên này đã được phân công giảng dạy môn học này');
        }
        
        // Create new assignment
        LecturerCourse::create([
            'lecturer_id' => $request->lecturer_id,
            'course_id' => $request->course_id,
        ]);
        
        return redirect()->route('lecturer_course.index')->with('success', 'Phân công giảng dạy đã được tạo thành công');
    }

    /**
     * Delete a lecturer course assignment
     */
    public function destroy($id)
    {
        $lecturerCourse = LecturerCourse::findOrFail($id);
        $lecturerCourse->delete();
        
        return redirect()->route('lecturer_course.index')->with('success', 'Phân công giảng dạy đã được xóa thành công');
    }

    /**
     * Show courses by lecturer
     */
    public function showByLecturer($id)
    {
        $lecturer = Lecturer::with('department', 'degree')->findOrFail($id);
        $courses = DB::table('lecturer_courses as lc')
            ->join('courses as c', 'lc.course_id', '=', 'c.id')
            ->join('departments as d', 'c.department_id', '=', 'd.id')
            ->where('lc.lecturer_id', $id)
            ->select('c.id', 'c.course_name', 'd.department_name', 'lc.id as lecturer_course_id')
            ->orderBy('c.course_name')
            ->get();
        
        return view('lecturer_course.by_lecturer', compact('lecturer', 'courses'));
    }
    
    /**
     * Show lecturers by course
     */
    public function showByCourse($id)
    {
        $course = DB::table('courses as c')
            ->join('departments as d', 'c.department_id', '=', 'd.id')
            ->where('c.id', $id)
            ->select('c.id', 'c.course_name', 'd.department_name')
            ->first();
            
        $lecturers = DB::table('lecturer_courses as lc')
            ->join('lecturers as l', 'lc.lecturer_id', '=', 'l.id')
            ->join('departments as d', 'l.department_id', '=', 'd.id')
            ->join('degrees as de', 'l.degree_id', '=', 'de.id')
            ->where('lc.course_id', $id)
            ->select('l.id', 'l.full_name', 'd.department_name', 'de.degree_name', 'lc.id as lecturer_course_id')
            ->orderBy('l.full_name')
            ->get();
            
        return view('lecturer_course.by_course', compact('course', 'lecturers'));
    }
}

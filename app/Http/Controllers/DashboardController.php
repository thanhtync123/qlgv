<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
use App\Models\Lecturer;
use App\Models\Department;
use App\Models\Course;
use App\Models\Degree;
use App\Models\Account;
use Illuminate\Support\Facades\DB;
=======
>>>>>>> 7d33372603d35ba805c7ab06a8499d5e457f79cf

class DashboardController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
        // Get total counts
        $totalLecturers = Lecturer::count();
        $totalDepartments = Department::count();
        $totalCourses = Course::count();

        // Get lecturers by department with average salary
        $lecturersByDepartment = DB::table('lecturers as l')
            ->join('departments as d', 'l.department_id', '=', 'd.id')
            ->select('d.department_name', 
                    DB::raw('count(*) as total_lecturers'),
                    DB::raw('AVG(l.salary) as avg_salary'))
            ->groupBy('d.department_name')
            ->get();

        // Get recent lecturers with their departments and salaries
        $recentLecturers = Lecturer::with(['department'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // Get top departments by lecturer count
        $topDepartments = DB::table('lecturers as l')
            ->join('departments as d', 'l.department_id', '=', 'd.id')
            ->select('d.department_name', DB::raw('count(*) as lecturer_count'))
            ->groupBy('d.department_name')
            ->orderBy('lecturer_count', 'desc')
            ->take(3)
            ->get();

        return view('dashboard.index', compact(
            'totalLecturers',
            'totalDepartments',
            'totalCourses',
            'lecturersByDepartment',
            'recentLecturers',
            'topDepartments'
        ));
=======
        return view('dashboard.dashboard');
>>>>>>> 7d33372603d35ba805c7ab06a8499d5e457f79cf
    }
}

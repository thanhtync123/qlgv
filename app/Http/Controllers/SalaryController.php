<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lecturer; 
use App\Models\Department; 
use Illuminate\Support\Facades\DB;

class SalaryController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('lecturers as l')
            ->join('departments as d', 'l.department_id', '=', 'd.id')
            ->select('l.full_name', 'd.department_name', 'l.salary', 'l.salary_coefficient');

        // Lọc theo tên giảng viên nếu có nhập
        if ($request->has('name') && !empty($request->name)) {
            $query->where('l.full_name', 'like', '%' . $request->name . '%');
        }

        // Lọc theo khoa nếu có chọn
        if ($request->has('department') && !empty($request->department)) {
            $query->where('d.id', $request->department);
        }

        $lecturers = $query->orderBy('d.department_name', 'asc')->paginate(10); // Thêm phân trang
        $totalSalary = $query->sum('l.salary'); 
        $departments = Department::all();

        return view('salary.index', compact('lecturers', 'totalSalary', 'departments'));
    }

    
    
    
}

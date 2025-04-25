<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
use App\Models\Lecturer;
use App\Models\Department;
=======
use App\Models\Lecturer; 
use App\Models\Department; 
>>>>>>> 7d33372603d35ba805c7ab06a8499d5e457f79cf
use Illuminate\Support\Facades\DB;

class SalaryController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('lecturers as l')
            ->join('departments as d', 'l.department_id', '=', 'd.id')
            ->select('l.full_name', 'd.department_name', 'l.salary', 'l.salary_coefficient');

<<<<<<< HEAD
=======
        // Lọc theo tên giảng viên nếu có nhập
>>>>>>> 7d33372603d35ba805c7ab06a8499d5e457f79cf
        if ($request->has('name') && !empty($request->name)) {
            $query->where('l.full_name', 'like', '%' . $request->name . '%');
        }

<<<<<<< HEAD
=======
        // Lọc theo khoa nếu có chọn
>>>>>>> 7d33372603d35ba805c7ab06a8499d5e457f79cf
        if ($request->has('department') && !empty($request->department)) {
            $query->where('d.id', $request->department);
        }

<<<<<<< HEAD
        $lecturers = $query->orderBy('d.department_name', 'asc')->paginate(10);
        $totalSalary = $query->sum(DB::raw('l.salary * l.salary_coefficient')); // Cập nhật tổng lương
=======
        $lecturers = $query->orderBy('d.department_name', 'asc')->paginate(10); // Thêm phân trang
        $totalSalary = $query->sum('l.salary'); 
>>>>>>> 7d33372603d35ba805c7ab06a8499d5e457f79cf
        $departments = Department::all();

        return view('salary.index', compact('lecturers', 'totalSalary', 'departments'));
    }

<<<<<<< HEAD
    public function search(Request $request)
    {
        $query = DB::table('lecturers as l')
            ->join('departments as d', 'l.department_id', '=', 'd.id')
            ->select('l.full_name', 'd.department_name', 'l.salary', 'l.salary_coefficient');

        if ($request->has('name') && !empty($request->name)) {
            $query->where('l.full_name', 'like', '%' . $request->name . '%');
        }

        if ($request->has('department') && !empty($request->department)) {
            $query->where('d.id', $request->department);
        }

        $lecturers = $query->orderBy('d.department_name', 'asc')->get(); // Lấy tất cả kết quả
        $totalSalary = $query->sum(DB::raw('l.salary * l.salary_coefficient')); // Tính tổng lương

        return response()->json([
            'lecturers' => $lecturers,
            'totalSalary' => number_format($totalSalary, 0, ',', '.') . ' VNĐ'
        ]);
    }
}
=======
    
    
    
}
>>>>>>> 7d33372603d35ba805c7ab06a8499d5e457f79cf

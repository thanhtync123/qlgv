<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lecturer;
use App\Models\Department;
use Illuminate\Support\Facades\DB;
use PDF;
use Excel;

class SalaryController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('lecturers as l')
            ->join('departments as d', 'l.department_id', '=', 'd.id')
            ->select('l.id', 'l.full_name', 'd.department_name', 'l.salary', 'l.salary_coefficient');

        if ($request->has('name') && !empty($request->name)) {
            $query->where('l.full_name', 'like', '%' . $request->name . '%');
        }

        if ($request->has('department') && !empty($request->department)) {
            $query->where('d.id', $request->department);
        }

        // Apply sorting
        if ($request->has('sortBy')) {
            switch ($request->sortBy) {
                case 'name':
                    $query->orderBy('l.full_name', 'asc');
                    break;
                case 'salary_asc':
                    $query->orderBy(DB::raw('l.salary * l.salary_coefficient'), 'asc');
                    break;
                case 'salary_desc':
                    $query->orderBy(DB::raw('l.salary * l.salary_coefficient'), 'desc');
                    break;
                default:
                    $query->orderBy('d.department_name', 'asc');
            }
        } else {
            $query->orderBy('d.department_name', 'asc');
        }

        $lecturers = $query->get();
        $totalSalary = $query->sum(DB::raw('l.salary * l.salary_coefficient'));
        $departments = Department::all();

        return view('salary.index', compact('lecturers', 'totalSalary', 'departments'));
    }

    public function search(Request $request)
    {
        $query = DB::table('lecturers as l')
            ->join('departments as d', 'l.department_id', '=', 'd.id')
            ->select('l.id', 'l.full_name', 'd.department_name', 'l.salary', 'l.salary_coefficient');

        if ($request->has('name') && !empty($request->name)) {
            $query->where('l.full_name', 'like', '%' . $request->name . '%');
        }

        if ($request->has('department') && !empty($request->department)) {
            $query->where('d.id', $request->department);
        }

        // Apply sorting
        if ($request->has('sortBy')) {
            switch ($request->sortBy) {
                case 'name':
                    $query->orderBy('l.full_name', 'asc');
                    break;
                case 'salary_asc':
                    $query->orderBy(DB::raw('l.salary * l.salary_coefficient'), 'asc');
                    break;
                case 'salary_desc':
                    $query->orderBy(DB::raw('l.salary * l.salary_coefficient'), 'desc');
                    break;
                default:
                    $query->orderBy('d.department_name', 'asc');
            }
        } else {
            $query->orderBy('d.department_name', 'asc');
        }

        $lecturers = $query->get();
        $totalSalary = $query->sum(DB::raw('l.salary * l.salary_coefficient'));
        $avgSalary = $lecturers->count() > 0 ? $totalSalary / $lecturers->count() : 0;
        $maxSalary = $lecturers->max(function($lecturer) {
            return $lecturer->salary * $lecturer->salary_coefficient;
        });
        $minSalary = $lecturers->min(function($lecturer) {
            return $lecturer->salary * $lecturer->salary_coefficient;
        });

        return response()->json([
            'lecturers' => $lecturers,
            'totalSalary' => number_format($totalSalary, 0, ',', '.') . ' VNĐ',
            'avgSalary' => number_format($avgSalary, 0, ',', '.') . ' VNĐ',
            'maxSalary' => number_format($maxSalary, 0, ',', '.') . ' VNĐ',
            'minSalary' => number_format($minSalary, 0, ',', '.') . ' VNĐ',
            'totalLecturers' => $lecturers->count()
        ]);
    }

    public function getLecturerDetails($id)
    {
        try {
            \Log::info('Fetching lecturer details for ID: ' . $id);
            
            $lecturer = DB::table('lecturers as l')
                ->join('departments as d', 'l.department_id', '=', 'd.id')
                ->select(
                    'l.id',
                    'l.full_name',
                    'l.salary',
                    'l.salary_coefficient',
                    'l.updated_at',
                    'd.department_name'
                )
                ->where('l.id', $id)
                ->first();

            \Log::info('Lecturer data: ' . json_encode($lecturer));

            if (!$lecturer) {
                \Log::warning('Lecturer not found with ID: ' . $id);
                return response()->json([
                    'error' => 'Không tìm thấy thông tin giảng viên'
                ], 404);
            }

            $response = [
                'department_name' => $lecturer->department_name,
                'salary_coefficient' => $lecturer->salary_coefficient,
                'salary' => $lecturer->salary,
                'updated_at' => $lecturer->updated_at ? date('d/m/Y', strtotime($lecturer->updated_at)) : 'N/A'
            ];

            \Log::info('Response data: ' . json_encode($response));
            
            return response()->json($response);
        } catch (\Exception $e) {
            \Log::error('Error in getLecturerDetails: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());
            return response()->json([
                'error' => 'Có lỗi xảy ra khi lấy thông tin lương: ' . $e->getMessage()
            ], 500);
        }
    }

    public function export(Request $request)
    {
        try {
            // Get current page data from request
            $currentPageData = json_decode($request->input('currentPageData'), true);
            $currentPage = $request->input('currentPage', 1);
            $totalPages = $request->input('totalPages', 1);

            if (empty($currentPageData)) {
                return back()->with('error', 'Không có dữ liệu để xuất báo cáo');
            }

            // Process the data similar to lecturer implementation
            $lecturers = collect($currentPageData)->map(function($item) {
                // Extract numeric values from formatted strings
                $baseSalary = (float)str_replace(['.', ',', ' VNĐ'], '', $item['baseSalary']);
                $totalSalary = (float)str_replace(['.', ',', ' VNĐ'], '', $item['totalSalary']);
                $coefficient = (float)str_replace(',', '.', $item['coefficient']);

                return (object)[
                    'full_name' => $item['name'],
                    'department_name' => $item['department'],
                    'salary_coefficient' => $coefficient,
                    'salary' => $baseSalary,
                    'total_salary' => $totalSalary
                ];
            });

            // Calculate statistics
            $totalSalary = $lecturers->sum('total_salary');
            $avgSalary = $lecturers->avg('total_salary');
            $maxSalary = $lecturers->max('total_salary');
            $minSalary = $lecturers->min('total_salary');

            $data = [
                'lecturers' => $lecturers,
                'totalSalary' => $totalSalary,
                'avgSalary' => $avgSalary,
                'maxSalary' => $maxSalary,
                'minSalary' => $minSalary,
                'totalLecturers' => $lecturers->count(),
                'exportDate' => now()->format('d/m/Y'),
                'universityName' => 'TRƯỜNG ĐẠI HỌC SƯ PHẠM KỸ THUẬT VĨNH LONG',
                'currentPage' => $currentPage,
                'totalPages' => $totalPages
            ];

            $pdf = PDF::loadView('salary.export_pdf', $data);
            return $pdf->download('bao_cao_luong_trang_' . $currentPage . '_' . date('Y_m_d') . '.pdf');
        } catch (\Exception $e) {
            \Log::error('Export error: ' . $e->getMessage());
            return back()->with('error', 'Có lỗi xảy ra khi xuất báo cáo: ' . $e->getMessage());
        }
    }

    public function printSalarySlip($id)
    {
        try {
            $lecturer = DB::table('lecturers as l')
                ->join('departments as d', 'l.department_id', '=', 'd.id')
                ->select(
                    'l.id',
                    'l.full_name',
                    'l.salary',
                    'l.salary_coefficient',
                    'l.updated_at',
                    'd.department_name'
                )
                ->where('l.id', $id)
                ->first();

            if (!$lecturer) {
                return response()->json([
                    'error' => 'Không tìm thấy thông tin giảng viên'
                ], 404);
            }

            return view('salary.salary_slip', compact('lecturer'));
        } catch (\Exception $e) {
            \Log::error('Error in printSalarySlip: ' . $e->getMessage());
            return response()->json([
                'error' => 'Có lỗi xảy ra khi in phiếu lương: ' . $e->getMessage()
            ], 500);
        }
    }
}

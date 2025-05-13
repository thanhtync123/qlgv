<?php

namespace App\Http\Controllers;

use App\Models\ResearchProject;
use App\Models\Lecturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResearchProjectController extends Controller
{
    public function index()
    {
        $projects = DB::table('research_projects as rp')
            ->join('lecturers as l', 'rp.lecturer_id', '=', 'l.id')
            ->select('rp.*', 'l.full_name as lecturer_name')
            ->get();
        
        return view('research_projects.index', compact('projects'));
    }

    public function create()
    {
        $lecturers = DB::table('lecturers')->get();
        return view('research_projects.create', compact('lecturers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'project_name' => 'required|string|max:255',
            'lecturer_id' => 'required|exists:lecturers,id',
            'description' => 'nullable|string',
            'status' => 'required|in:Ongoing,Completed,Cancelled'
        ]);

        // Đặt giá trị mặc định cho status nếu không được chọn
        if (empty($validated['status'])) {
            $validated['status'] = 'ongoing';
        }

        DB::table('research_projects')->insert($validated);

        return redirect()->route('research-projects.index')
            ->with('success', 'Dự án nghiên cứu đã được tạo thành công.');
    }



    public function edit($id)
    {
        $project = DB::table('research_projects')->where('id', $id)->first();
        $lecturers = DB::table('lecturers')->get();
        
        return view('research_projects.edit', compact('project', 'lecturers'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'project_name' => 'required|string|max:255',
            'lecturer_id' => 'required|exists:lecturers,id',
            'description' => 'nullable|string',
            'status' => 'required|in:Ongoing,Completed,Cancelled'
        ]);

        \DB::table('research_projects')
            ->where('id', $id)
            ->update($validated);

        return redirect()->route('research-projects.index')
            ->with('success', 'Cập nhật dự án nghiên cứu thành công!');
    }

    public function destroy($id)
    {
        \DB::table('research_projects')->where('id', $id)->delete();

        return redirect()->route('research-projects.index')
            ->with('success', 'Xóa dự án nghiên cứu thành công!');
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lecturer; 
use App\Models\Department; 
use App\Models\Degree; 
<<<<<<< HEAD
use Illuminate\Support\Facades\DB;

=======
>>>>>>> 7d33372603d35ba805c7ab06a8499d5e457f79cf
use Illuminate\Support\Facades\Storage;


class LecturerController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
        $lecturers = DB::table('lecturers as l')
        ->join('departments as d', 'l.department_id', '=', 'd.id')
        ->join('degrees as de', 'l.degree_id', '=', 'de.id')
        ->select('l.full_name', 'l.date_of_birth', 'l.gender', 'l.phone', 'd.department_name', 'de.degree_name','l.image','l.id')
        ->get();
        $department = Department::All();
        $degree = Degree::All();
    return view('lecturer.index', compact('lecturers','department','degree'));
=======
        $lecturers = Lecturer::All();
        return view('lecturer.index',compact('lecturers'));
>>>>>>> 7d33372603d35ba805c7ab06a8499d5e457f79cf
    }
    public function create()
    {
        $department = Department::All();
        $degree = Degree::All();
        return view('lecturer.view',compact('department','degree'));
    }

    public function store(Request $request) 
    {


<<<<<<< HEAD
=======
        // $request->validate([
        //     'full_name'       => 'required|max:255',
        //     'date_of_birth'   => 'required|date',
        //     'gender'          => 'required|in:male,female',
        //     'phone'           => 'required|min:10|max:11|unique:lecturers,phone',
        //     'department_id'   => 'required|exists:departments,id',
        //     'degree_id'       => 'required|exists:degrees,id',
        // ]);

>>>>>>> 7d33372603d35ba805c7ab06a8499d5e457f79cf
        $request->validate([
            'full_name'       => 'max:255',
            'date_of_birth'   => 'date',
            'gender'          => 'in:male,female',
            'phone'           => 'min:10|max:11|unique:lecturers,phone',
            'department_id'   => 'exists:departments,id',
            'degree_id'       => 'exists:degrees,id',
        ]);
        try {
            $lecturer = new Lecturer();
            $lecturer->full_name     = $request->full_name;
            $lecturer->date_of_birth = $request->date_of_birth;
            $lecturer->gender        = $request->gender;
            $lecturer->phone         = $request->phone;
            $lecturer->department_id = $request->department_id;
            $lecturer->degree_id     = $request->degree_id;
            $lecturer->save();
        
            return redirect()->to('/lecturer/create')->with('success', 'Lecturer created successfully!');
        } catch (\Exception $e) {
            dd($e->getMessage()); // In ra lỗi nếu có
        }
        

        
    }
    public function destroy($id)
    {
        $lecturer = Lecturer::findOrFail($id);
        $lecturer->delete();
        return redirect()->to('/lecturer')->with('success', 'Lecturer delete successfully!');      
    }

    public function show($id)
    {
        $lecturer = Lecturer::with(['degree', 'department'])->findOrFail($id);
        return view('lecturer.show', compact('lecturer'));
        
    }
    public function edit($id) 
    {
        $degree = Degree::All();
        $department = Department::All();
        $lecturer = Lecturer::findOrFail($id);
        return view('lecturer.form_update',compact('lecturer','department','degree'));
    }
    public function update(Request $request, $id)
    {
        $lecturer = Lecturer::findOrFail($id);
    
        // Validate dữ liệu
        $request->validate([
            'full_name'       => 'required|max:255',
            'date_of_birth'   => 'required|date',
            'gender'          => 'required|in:male,female',
            'phone'           => 'required|min:10|max:11|unique:lecturers,phone,' . $id,
            'email'           => 'required|email|unique:lecturers,email,' . $id,
            'department_id'   => 'required|exists:departments,id',
            'degree_id'       => 'required|exists:degrees,id',
            'photo'           => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048', // Validate file ảnh
        ]);
    
        try {
            // Cập nhật thông tin giảng viên
            $data = $request->except('photo');
    
            // Xử lý ảnh nếu có tải lên
            if ($request->hasFile('photo')) {
                // Xóa ảnh cũ nếu có
                // if ($lecturer->image && file_exists(public_path($lecturer->image))) 
                //     unlink(public_path($lecturer->image));
                
                // Lưu ảnh mới
                $image = $request->file('photo');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('lecturer_image'), $imageName);
    
                // Cập nhật đường dẫn ảnh vào database
                $data['image'] = 'lecturer_image/' . $imageName;
            }
    
            $lecturer->update($data);
    
            return redirect()->back()->with('success', 'Cập nhật thông tin giảng viên thành công!');
    
        } catch (\Exception $e) {
            return back()->with('error', 'Lỗi khi cập nhật: ' . $e->getMessage());
        }
    }
    
<<<<<<< HEAD
    public function search(Request $request)
    {
        $query = DB::table('lecturers as l')
            ->join('departments as d', 'l.department_id', '=', 'd.id')
            ->join('degrees as de', 'l.degree_id', '=', 'de.id')
            ->select('l.full_name', 'l.date_of_birth', 'l.gender', 'l.phone', 'd.department_name', 'de.degree_name', 'l.image', 'l.id');

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('l.full_name', 'like', '%' . $search . '%')
                  ->orWhere('l.id', 'like', '%' . $search . '%');
            });
        }

        if ($request->has('department_id') && $request->department_id != '') {
            $query->where('l.department_id', $request->department_id);
        }

        if ($request->has('degree_id') && $request->degree_id != '') {
            $query->where('l.degree_id', $request->degree_id);
        }

        $lecturers = $query->get();

        return response()->json($lecturers);
    }
=======
>>>>>>> 7d33372603d35ba805c7ab06a8499d5e457f79cf
}

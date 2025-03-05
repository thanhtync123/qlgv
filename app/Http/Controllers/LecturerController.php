<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lecturer; 
use App\Models\Department; 
use App\Models\Degree; 

class LecturerController extends Controller
{
    public function index()
    {
        $lecturers = Lecturer::All();
        return view('lecturer.index',compact('lecturers'));
    }
    public function create()
    {
        $department = Department::All();
        $degree = Degree::All();
        return view('lecturer.view',compact('department','degree'));
    }

    public function store(Request $request) 
    {


        // $request->validate([
        //     'full_name'       => 'required|max:255',
        //     'date_of_birth'   => 'required|date',
        //     'gender'          => 'required|in:male,female',
        //     'phone'           => 'required|min:10|max:11|unique:lecturers,phone',
        //     'department_id'   => 'required|exists:departments,id',
        //     'degree_id'       => 'required|exists:degrees,id',
        // ]);

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
    
}

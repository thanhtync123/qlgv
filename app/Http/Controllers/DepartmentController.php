<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Department; 


class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        return view('department.index',compact('departments'));
    }

    public function create()
    {
        return view('department.view');
    }

    public function store(Request $request) 
    {


        $request->validate([
            'faculty_name'    => 'required|unique:departments,department_name|max:255',
            'faculty_phone'    => 'required|min:10|max:11',
            'faculty_address'    => 'required|max:255',
        ]);
        
        $department = new Department();
        $department->department_name = $request->faculty_name;
        $department->address = $request->faculty_address;
        $department->phone = $request->faculty_phone;
        $department->save();
        
        return redirect()->to('/department')->with('success', 'Account created successfully!');
    }
    public function destroy($id)
    {
        try {
            $department = Department::findOrFail($id);
            $department->delete();
            return redirect()->back()->with('success', 'Department deleted successfully.');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('error', 'Cannot delete department because it has related data.');
        }
    }

    public function edit($id) 
    {
        $department = Department::findOrFail($id);
        return view('department.view',compact('department'));
    }
    public function update(Request $request,$id) 
    {
        $request->validate([
            'faculty_name'    => 'required|unique:departments,department_name|max:255',
            'faculty_phone'    => 'required|min:10|max:11',
            'faculty_address'    => 'required|max:255',
        ]);
        $department = Department::find($id);
        $department->department_name = $request->faculty_name;
        $department->phone = $request->faculty_phone;
        $department->address = $request->faculty_address;
    
 
        $department->save();

        return redirect()->to('/department')->with('success', 'Account created successfully!');
    }
}

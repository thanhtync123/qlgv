<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Degree;

class DegreeController extends Controller
{
    public function index()
    {
        $degree = Degree::All();
        return view('degree.index',compact('degree'));
    }
   

    public function create()
    {
        return view('degree.view');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:degrees,degree_name|max:255',
        ], [
            'name.required' => 'The degree name is required.',
            'name.unique' => 'The degree name already exists. Please choose a different name.',
            'name.max' => 'The degree name must not exceed 255 characters.',
        ]);
        
        $degree = new Degree();
        $degree->degree_name = $request->name;
        $degree->save();
        
    
        return redirect()->to('/degree')->with('success', 'degree created successfully!');      
    }
    public function destroy($id)
    {
        $degree = degree::findOrFail($id);
        $degree->delete();
        return redirect()->to('/degree')->with('success', 'degree delete successfully!');      
    }
    public function edit($id)
    {
        $degree = degree::findOrFail($id);
        return view('degree.view',compact('degree'));
    }
    public function update(Request $request,$id) 
    {
        $request->validate([
            'name' => 'required|unique:degrees,degree_name|max:255',
        ], [
            'name.required' => 'The degree name is required.',
            'name.unique' => 'The degree name already exists. Please choose a different name.',
            'name.max' => 'The degree name must not exceed 255 characters.',
        ]);
        $degree = Degree::find($id);
        $degree->degree_name = $request->name;
        $degree->save();  
        return redirect()->to('/degree')->with('success', 'degree change successfully!');     
    }
}

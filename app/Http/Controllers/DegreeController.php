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
            'name.required' => 'Tên học vị là bắt buộc.',
            'name.unique' => 'Tên học vị đã tồn tại. Vui lòng chọn tên khác.',
            'name.max' => 'Tên học vị không được vượt quá 255 ký tự.',
        ]);
        
        $degree = new Degree();
        $degree->degree_name = $request->name;
        $degree->save();
        
        return redirect()->to('/degree')->with('success', 'Tạo học vị thành công!');      
    }
    public function destroy($id)
    {
        $degree = degree::findOrFail($id);
        $degree->delete();
        return redirect()->to('/degree')->with('success', 'Xóa học vị thành công!');      
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
            'name.required' => 'Tên học vị là bắt buộc.',
            'name.unique' => 'Tên học vị đã tồn tại. Vui lòng chọn tên khác.',
            'name.max' => 'Tên học vị không được vượt quá 255 ký tự.',
        ]);
        $degree = Degree::find($id);
        $degree->degree_name = $request->name;
        $degree->save();  
        return redirect()->to('/degree')->with('success', 'Cập nhật học vị thành công!');     
    }
}

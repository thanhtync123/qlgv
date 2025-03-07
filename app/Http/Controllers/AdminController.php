<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function post_login(Request $request)
    {
        if (Auth::attempt([
            'username' => $request->username,
            'password' => $request->password,
            'role' => 'Admin'
        ])) {
            $user = Auth::user();
            $lecturer = DB::table('lecturers')->where('id', $user->lecturer_id)->first();
            
            $fullName = $lecturer ? $lecturer->full_name : 'Admin';
            $image = $lecturer && $lecturer->image ? asset($lecturer->image) : asset('default-avatar.png'); 
            
            session([
                'greeting' => 'Admin ' . $fullName,
                'lecturer_image' => $image
            ]);
        
            return redirect('/manager');
        } 
        elseif (Auth::attempt([
            'username' => $request->username,
            'password' => $request->password,
            'role' => 'Lecturer'
        ])) {
            $user = Auth::user();
            $lecturer = DB::table('lecturers')->where('id', $user->lecturer_id)->first();
            
            $fullName = $lecturer ? $lecturer->full_name : 'User';
            $image = $lecturer && $lecturer->image ? asset($lecturer->image) : asset('default-avatar.png'); 
            
            session([
                'greeting' => 'Lecturer ' . $fullName, // Sửa lại lời chào cho giảng viên
                'lecturer_image' => $image
            ]);
        
            return redirect('/salary');
        }
        
        return redirect()->back()->with('error', 'Đăng nhập thất bại');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->forget(['greeting', 'lecturer_image']); 
        return redirect('/');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account; 
use App\Models\Lecturer; 
use Illuminate\Support\Facades\DB;


class AccountController extends Controller
{
    public function index()
    {
        $accounts = DB::table('accounts')
        ->join('lecturers', 'accounts.lecturer_id', '=', 'lecturers.id')
        ->where('accounts.role', 'LIKE', '%admin%')
        ->orWhere('accounts.role', 'LIKE', '%lecture%')
        ->select('accounts.id', 'accounts.username', 'accounts.role', 'lecturers.full_name', 'lecturers.image')
        ->get();
    
    
        return view('user.index', compact('accounts'));
    }
    public function destroy($id)
    {
        $account = Account::find($id);
    
        if (!$account) 
            return response()->json(['message' => 'Không tìm thấy tài khoản'], 404);
        
        $account->delete();
        session()->flash('success', 'Xóa tài khoản thành công');
    
        return redirect()->back();
    }
    public function create()
    {
        $lecturers = Lecturer::all();
        return view('user.view',compact('lecturers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'username'    => 'required|unique:accounts,username|max:255',
            'password'    => 'required|min:6|max:255',
            'lecturer'    => 'required|integer|exists:lecturers,id',
            'role'        => 'required|in:Lecturer,Admin',
        ]);
        
        // Kiểm tra nếu giảng viên đã có tài khoản
        $existingAccount = Account::where('lecturer_id', $request->lecturer)->first();
        if ($existingAccount) 
            return redirect()->back()->withErrors(['lecturer' => 'Giảng viên này đã có tài khoản!'])->withInput();
        
        
        // Tạo account mới
        $account = new Account();
        $account->username = $request->username;
        $account->password = bcrypt($request->password);
        $account->lecturer_id = $request->lecturer;
        $account->role = $request->role;
        $account->save();
        
        return redirect()->to('/manager')->with('success', 'Tạo tài khoản thành công!');
        
    }
    public function login()
    {
        return view('auth.login');
    }
    
}



<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    public function index()
    {
        $products = DB::table('tbaccount')->get();
        return view('login.index')->with(['login' => $login]);
    }
    public function checkLogin(Request $request)
    {
        if ($request->session()->has('user')) {
            $request->session()->forget('user');
        }
        $email = $request->email;
        $pwd = $request->pwd;
        $user = DB::table('tbaccount')->where('email', $email)->first();
        if ($user != null && $user->password == $pwd) {
            // $request->session()->push('user', $user);
            // push() luu bien mang
            // tao bien session de luu thong tin TK dang nhap thanh cong
            session(['user' => $user]);
            // $request->session()->put('user', $user);
            if ($user->role == 1) {
                // return redirect('admin/users');
                return redirect()->route('adminuserlist');
            } else {
                // return redirect("user/details/" . $user->accountid);
                return redirect()->route('userprofile', ['id' => $user->accountid]);
            }
        } else {
            return redirect('login')->with('message', 'Login Fail.');
        }
    }

    public function users()
    {
        $users = DB::table('tbaccount')->get();
        return view('admin.users')->with(['users' => $users]);
    }

    public function displayAddUser()
    {
        return view('admin.addUser');
    }

    public function addUser(Request $request)
    {
        // $accountId = $request->accountId;
        $email = $request->email;
        $pwd = $request->password;
        $fullname = $request->fullname;
        $role = $request->role;
        $active = $request->active;
        DB::table('tbaccount')->insert([
            // 'accountId'=>intval($accountId),
            'email' => $email,
            'password' => $pwd,
            'fullname' => $fullname,
            'role' => intval($role),
            'active' => intval($active)
        ]);
        return redirect('admin/users');
    }

    public function resetPassword($id)
    {
        DB::table('tbaccount')
            ->where('accountid', $id)
            ->update(['password' => '123']);
        return redirect()->action([AccountController::class, 'users']);
    }

    public function details($id)
    {
        $user = DB::table('tbaccount')
            ->where('accountID', $id)->first();
        return view('user/details')->with(['user' => $user]);
    }

    public function logout()
    {
        session()->forget("user");
        return redirect("login");
    }
}

<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
   
    public function index()
    {
        return view('admin.index');
    }
    public function loginAdmin()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect('/admin')
                        ->withSuccess('You have Successfully loggedin');
        }else{
            return redirect()->route('admin.login')->withError("You don't have admin access.");
        }
    }
    public function logout(Request $request)
    {
            Auth::guard('admin')->logout();
            return redirect('/admin/login');
    }

}

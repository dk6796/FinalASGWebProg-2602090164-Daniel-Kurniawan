<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Friends;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function viewLoginPage(){
        return view('pages.login');
    }

    public function login(Request $req){
        $validated = $req->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = Friends::where('Username', $req->username)->first();
        // dd($user);
        if (!$user || !Hash::check($req->password, $user->Password)) {
            return back()->withErrors([
                'error' => 'The provided credentials do not match our records.',
            ]);
        }

        Auth::login($user);
        // dd(Auth::user());
        return redirect()->route('home');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }
}

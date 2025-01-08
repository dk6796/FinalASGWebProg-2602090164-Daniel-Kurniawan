<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FriendController extends Controller
{
    public function viewRegisterPage(){
        return view('pages.register');
    }

    public function viewHomePage(){
        return view('pages.home');
    }

    public function register(Request $req){
        $validated = $req->validate([
            'profpict' => 'required',
            'username' => 'required|url|starts_with:http://www.instagram.com/',
            'password' => 'required|min:8|alpha_num',
            'gender' => 'required',
            'hobby' => ['required', 'regex:/^([^,]+,){2,}[^,]+$/'],
            'mobile' => 'required|integer',
        ], [
            'username.starts_with' => 'The username must start with http://www.instagram.com/',
            'hobby.regex' => 'There must be at least 3 hobbies',
        ]);
    
        return back()->with('success', 'Form Submitted Successfully!');
    }
}

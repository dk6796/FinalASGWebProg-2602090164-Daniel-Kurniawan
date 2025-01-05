<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function viewRegisterPage(){
        return view('register');
    }

    public function register(Request $req){
        $validated = $req->validate([
            'gender' => 'required',
            'hobby' => 'required|min:3',
            'username' => 'required|url|starts_with:http://www.instagram.com/',
            'mobile' => 'required|numeric',
            'profpict' => 'required|file|image|max:2048',
        ], [
            'gender.required' => 'Gender harus dipilih.',
            'hobby.min' => 'Hobby minimal 3, dipisahkan dengan koma.',
            'username.required' => 'Username harus diawali dengan http://www.instagram.com/',
            'mobile.numeric' => 'Mobile number harus berisi angka saja.',
            'profpict.required' => 'Foto profil harus diunggah.',
        ]);

        return back()->with('success', 'Form Submitted Successfully!');
    }
}

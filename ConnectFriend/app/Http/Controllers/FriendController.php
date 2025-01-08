<?php

namespace App\Http\Controllers;

use App\Models\Friends;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class FriendController extends Controller
{
    public function viewLoginPage(){
        return view('pages.login');
    }

    public function viewRegisterPage(){
        return view('pages.register');
    }

    public function viewPaymentPage(){
        return view('pages.payment');
    }

    public function viewHomePage(){
        return view('pages.home');
    }

    public function register(Request $req){
        $imageUrl = null;

        $validated = $req->validate([
            'profpict' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'username' => 'required|url|starts_with:http://www.instagram.com/',
            'password' => 'required|min:8|alpha_num',
            'gender' => 'required',
            'hobby' => ['required', 'regex:/^([^,]+,){2,}[^,]+$/'],
            'mobile' => 'required|integer',
        ], [
            'username.starts_with' => 'The username must start with http://www.instagram.com/',
            'hobby.regex' => 'There must be at least 3 hobbies',
        ]);

        if($req->hasFile('profpict')){
            $file = $req->file('profpict');
            $imageUrl = $file->store('profile_pictures', 'public');
        }

        $randomNumber = rand(100000, 125000);

        DB::table('friends')->insert([
            'ProfilePicture' => $imageUrl,
            'Username' => $req->username,
            'Password' => bcrypt($req->password),
            'Gender' => $req->gender,
            'Hobbies' => $req->hobby,
            'MobileNumber' => $req->mobile,
            'RegistrationPrice' => $randomNumber,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    
        session()->put('randomNumber', $randomNumber);
        return redirect()->route('payment');
    }

    public function login(Request $req){
        $validated = $req->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        return view('pages.home');
    }
}

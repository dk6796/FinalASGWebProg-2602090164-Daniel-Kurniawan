<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Friends;

class RegisterController extends Controller
{
    public function viewRegisterPage(){
        return view('pages.register');
    }

    public function viewPaymentPage(){
        return view('pages.payment');
    }

    public function register(Request $req){
        $imageUrl = null;

        $validated = $req->validate([
            // 'profpict' => 'required|image|mimes:png,jpg,jpeg|max:2048',
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
            $imageUrl = $file->store('profile_picture', 'public');
        }

        $regisPrice = rand(100000, 125000);

        $linkInstagram = $req->username;
        $username = str_replace('http://www.instagram.com/', '', $linkInstagram);

        $userID = Friends::create([
            // 'ProfilePicture' => 'profile_picture/'.$imageUrl,
            'ProfilePicture' => '',
            'Username' => $username,
            'LinkInstagram' => $req->username,
            'Password' => bcrypt($req->password),
            'Gender' => $req->gender,
            'Hobbies' => $req->hobby,
            'MobileNumber' => $req->mobile,
            'Coins' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        session()->put('userID', $userID);
        session()->put('regisPrice', $regisPrice);
        return redirect()->route('payment.form');
    }
    
    public function payment(Request $req){
        $regisPrice = intval($req->input('regisPrice'));
        $payment = intval($req->input('payment'));

        $validated = $req->validate([
            'payment' => ['required', 'numeric', 'min:' . $regisPrice],
        ]);

        if($payment > $regisPrice){
            $excess = $payment - $regisPrice;
            session()->flash('excess', $excess);
            return back();
        }

        return redirect()->route('login.form');
    }

    public function paymentConfirmation(Request $req){
        if(session()->has('userID')){
            $userID = session('userID');
            $excess = $req->input('excess');

            $user = Friends::find($userID)->first();

            if($user){
                $user->Coins += $excess;
                $user->save();

                session()->forget('excess');

                return redirect()->route('login.form');
            }
        }
        return back();
    }
}

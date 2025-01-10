<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Avatar;
use App\Models\AvatarPurchase;

class UserController extends Controller
{
    
    public function viewHomePage(){
        return view('pages.home');
    }

    public function viewProfilePage(){
        $avatarList = Avatar::all();
        $user = Auth::user();
        $purchasedAvatars = AvatarPurchase::where('FriendID', $user->id)->pluck('AvatarID')->toArray();

        return view('pages.profile')->with([
            'avatarList' => $avatarList,         
            'purchasedAvatars' => $purchasedAvatars,
            'currentAvatar' => $user->ProfilePicture,
        ]);
    }

    public function topUp(){
        $user = Auth::user();
        $user->Coins += 1000;
        $user->save();

        return redirect()->back();
    }

    public function buyAvatar(Request $req){
        $avatarID = $req->input('avatarID');
        $avatar = Avatar::find($avatarID);
        $avatarImg = $avatar->AvatarImage;
        $avatarPrice = $avatar->AvatarPrice;

        $user = Auth::user();
        if ($user->Coins < $avatarPrice) {
            return redirect()->back()->withErrors(['coins' => 'You don\'t have enough coins!']);
        }
        $user->Coins -= $avatarPrice;
        $user->ProfilePicture = $avatarImg;
        $user->save();

        AvatarPurchase::create([
            'AvatarID' => $avatarID,
            'FriendID' => $user->id,
        ]);

        return redirect()->back();
    }

    public function applyAvatar(Request $req){
        $avatarID = $req->input('avatarID');
        $avatar = Avatar::find($avatarID);
        $avatarImg = $avatar->AvatarImage;
 
        $user = Auth::user();
        $user->ProfilePicture = $avatarImg;
        $user->save();

        return redirect()->back();
    }
}

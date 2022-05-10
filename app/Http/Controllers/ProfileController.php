<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile() {
        $profile = Auth::user();
        return view('profile', ["profile" => $profile]);
    }

    public function postProfile(ProfileRequest $request) {
        $profile = User::find(Auth::id());

        $profile->name = $request->name;
        $profile->email = $request->email;
        if($request->password) $profile->password = bcrypt($request->password);

        $profile->save();

        return redirect()->route('profile')->withSuccess('Profile successfully updated');
    }
}

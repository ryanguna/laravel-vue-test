<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User;
use App\UserInformation;
use Response;

class SignUpController extends Controller
{

    public function signUp(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:5',
            'firstname' => 'required|string',
            'lastname' => 'required|string',
        ]);

        $user = User::where('email', '=', $request->email)->first();
        if ($user === null) {

            $userCreate = User::create([
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);

            if($userCreate->id){
                UserInformation::create([
                    'user_id' => $userCreate->id,
                    'firstname' => $request->firstname,
                    'lastname' => $request->lastname
                ]);
            }
            return response()->json(['data' => 'User Successfuly Created'], 200);
        }
        return response()->json(['data' => 'Email has already been taken. Please choose another email'], 409);
    }



}

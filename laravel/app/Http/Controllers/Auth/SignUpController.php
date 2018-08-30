<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserInformation;
use Response;

class SignUpController extends Controller
{

    public function signUp(Request $request)
    {
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
        return response()->json(['data' => 'Email already exist'], 409);
    }



}

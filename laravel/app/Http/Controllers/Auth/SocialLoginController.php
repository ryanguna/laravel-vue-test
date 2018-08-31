<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use App\UserInformation;
use Response;

class SocialLoginController extends Controller
{


    public function login(Request $request){

        $socialType = $request->name;

        return response()->json(
            Socialite::driver($socialType)
                ->with(['social_type' => $socialType])
                ->stateless()
                ->redirect()
                ->getTargetUrl()
        );
    }



    public function googleLoginCallback(){

        $http = new \GuzzleHttp\Client;
        $user = Socialite::with('google')->stateless()->user();

        if($exist = User::where('email',  $user->email)->first()){
            $userCredentials = [
                'token' => $user->token,
                'refreshToken' => $user->refreshToken,
                'expiresIn' => $user->expiresIn,
            ];

            $response = $http->post(env('LOGIN_ENDPOINT'), [
                'form_params' => [
                    'grant_type' => 'social',
                    'client_id' => env('CLIENT_ID'),
                    'client_secret' => env('CLIENT_SECRET'),
                    'network' => 'google',
                    'access_token' => $userCredentials['token'],
                ]
            ]);

            $responseToken = $response->getBody()->getContents();

            return response()->json([
                "oauth_token" => json_decode($responseToken)
            ], 200);
        }else{
            return \Response::json([
                'data' => 'Unauthorized account!'
            ], 401);
        }

    }


}

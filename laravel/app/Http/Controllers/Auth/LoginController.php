<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use App\UserInformation;
use Response;

class LoginController extends Controller
{
    public function login(Request $request)
    {

        $http = new \GuzzleHttp\Client;
        try {
            $response = $http->post(env('LOGIN_ENDPOINT'), [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => env('CLIENT_ID'),
                    'client_secret' => env('CLIENT_SECRET'),
                    'username' => $request->username,
                    'password' => $request->password,
                ]
            ]);
            $oauth_token = $response->getBody()->getContents();
            return response()->json([
                "oauth_token" => json_decode($oauth_token)
            ], 200);


        } catch (\GuzzleHttp\Exception\BadResponseException $e) {
            if ($e->getCode() === 400) {
                return response()->json('Invalid Request. Please enter a username or a password.', $e->getCode());
            } else if ($e->getCode() === 401) {
                return response()->json('Your credentials are incorrect. Please try again', $e->getCode());
            }
            return response()->json('Something went wrong on the server.', $e->getCode());
        }

    }


//    public function googleLogin(Request $request){
//
//        $socialType = $request->name;
//
//        return response()->json(
//            Socialite::driver($socialType)
//                ->with(['social_type' => $socialType])
//                ->stateless()
//                ->redirect()
//                ->getTargetUrl()
//        );
//    }
//
//
//    public function googleLoginCallback(){
//
//        $http = new \GuzzleHttp\Client;
//
//        $user = Socialite::with('google')->stateless()->user();
//
//        if($exist = User::where('email',  $user->email)->first()){
//            $userCredentials = [
//                'token' => $user->token,
//                'refreshToken' => $user->refreshToken,
//                'expiresIn' => $user->expiresIn,
//            ];
//
//
//            $response = $http->post(env('NEXUS_LOGIN_ENDPOINT'), [
//                'form_params' => [
//                    'grant_type' => 'social',
//                    'client_id' => env('NEXUS_CLIENT_ID'),
//                    'client_secret' => env('NEXUS_CLIENT_SECRET'),
//                    'network' => 'google',
//                    'access_token' => $userCredentials['token'],
//                ]
//            ]);
//
////        $tesi = $http->post(env('TESI_LOGIN_ENDPOINT'), [
////            'form_params' => [
////                'grant_type' => 'password',
////                'client_id' => env('TESI_CLIENT_ID'),
////                'client_secret' => env('TESI_CLIENT_SECRET'),
////                'username' => env('TESI_CLIENT_USERNAME'),
////                'password' => env('TESI_CLIENT_PASSPORT'),
////            ]
////        ]);
//
//            $nexus = $response->getBody()->getContents();
////        $tesi = $tesi->getBody()->getContents();Z
//
//            $requests = [
//                "nexus" => json_decode($nexus)
//            ];
//
//            return $requests;
//        }else{
//            return \Response::json([
//                'data' => 'Unauthorized account!'
//            ], 401);
//        }
//
//
//
//    }
}

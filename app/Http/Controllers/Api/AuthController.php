<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required|min:8'
        ]);

        /**
         * Apabila Login Berhasil
         */
        if (Auth::attempt($request->only('email','password'))) {
            $currentUser = Auth::user();
            return (new UserResource($currentUser))->additional([
                'meta'=>[
                    'token'=>$currentUser->api_token
                ]
            ]);
        }

        /**
         * Apabila Login Gagal
         */

         return response()->json([
             'error' => "Your Credential is not match"
         ],401);
    }

    public function cek_user()
    {
        $user = Auth::user();

        return new UserResource($user);
    }
}

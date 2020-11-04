<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
            $currentUser = auth()->user();
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

    public function register(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|between:3,255',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:8'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'api_token' => Str::random(80),
            'role' => $request->role
        ]);

        return (new UserResource($user))->additional([
            'meta' => [
                'token' =>$user->api_token
            ]
        ]);
    }
}

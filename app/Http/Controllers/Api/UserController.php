<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentUser = Auth::user();
        if ($currentUser->role == 'Super Admin') {
            $admin = User::where('role', 'Admin')->latest()->get();
            return UserResource::collection($admin);
        }
        return response()->json(['message' => "You Not Have Permission"], 403);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $currentUser = Auth::user();
        if ($currentUser->role == 'Super Admin') {
            $this->validate($request, [
                'name' => 'required|min:3|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8'
            ]);
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => "Admin",
                'api_token' => Str::random(80)
            ]);
            return new UserResource($user);
        }
        return response()->json(['message' => "You Not Have Permission"], 403);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = User::find($id);
        $currentUser = Auth::user();
        if ($currentUser->role == 'Super Admin') {
            if ($admin == null) {
                return response()->json(['message' => "Admin Not Found"], 404);
            }
            $admin = User::where('role', 'Admin')->where('id',$id)->get();
            return new UserResource($admin);
        }
        return response()->json(['message' => "You Not Have Permission"], 403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $admin = User::find($id);
        $currentUser = Auth::user();
        if ($currentUser->role == 'Super Admin') {
            if ($admin == null) {
                return response()->json(['message' => "admin Not Found"], 404);
            }
            $this->validate($request, [
                'name' => 'required|min:3|max:255',
                'email' => 'required|email',
                'password' => 'required|min:8'
            ]);
            $admin->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);

            return new UserResource($admin);
        }
        return response()->json(['message' => "You Not Have Permission"], 403);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = User::find($id);
        $currentUser = Auth::user();
        if ($currentUser->role == 'Super Admin') {

            if ($admin == null) {
                return response()->json(['message' => "admin Not Found"], 404);
            }
            $admin->delete();
            return response()->json(['message' => "admin Deleted"], 200);
        }
        return response()->json(['message' => "You Not Have Permission"], 403);
    }
}

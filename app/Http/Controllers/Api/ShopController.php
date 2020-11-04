<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ShopResource;
use App\Shop;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentUser = Auth::user();
        $shops = Shop::latest()->get();
        if ($currentUser->role == 'Super Admin') {
            $shops = Shop::latest()->get();
            return ShopResource::collection($shops);
        }
        if ($currentUser->role == 'Admin') {
            $shops = Shop::where('user_id',$currentUser->id)->latest()->get();
            return ShopResource::collection($shops);
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
                'name' => 'required|max:255',
                'info' => 'required|max:255',
                'address' => 'required|max:500'
            ]);
            $shop = Shop::create([
                'name' => $request->name,
                'info' => $request->info,
                'address' => $request->address
            ]);

            return new ShopResource($shop);
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
        $currentUser = Auth::user();
        $shop = Shop::find($id);
        if ($shop == null) {
            return response()->json(['message' => "Shop Not Found"], 404);
        }
        if ($currentUser->role == 'Super Admin') {
            return new ShopResource($shop);
        }
        if ($currentUser->role == 'Admin') {

            $response = Gate::inspect('show', $shop);
            if ($response->allowed()) {
                return new ShopResource($shop);
            } else {
                return response()->json(['message' => "This is not yours"], 403);
            }
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
        $shop = Shop::find($id);
        // dd($shop);
        $currentUser = Auth::user();
        $validasi = [
            'name' => 'required|max:255',
            'info' => 'required|max:255',
            'address' => 'required|max:500'
        ];
        $data = [
            'name' => $request->name,
            'info' => $request->info,
            'address' => $request->address
        ];
        if ($shop == null) {
            return response()->json(['message' => "Shop Not Found"], 404);
        }
        if ($currentUser->role == 'Super Admin') {
            $this->validate($request, $validasi);
            $shop->update($data);
            return new ShopResource($shop);
        } else if ($currentUser->role == 'Admin') {
            $response = Gate::inspect('update', $shop);
            if ($response->allowed()) {
                $this->validate($request, $validasi);
                $shop->update($data);
                return new ShopResource($shop);
            } else {
                return response()->json(['message' => "Cannot Update, Because This is not yours"], 403);
            }
        }
        return response()->json(['message' => "You Not Have Permission"], 403);
    }
    /**
     * Assign Admin To Toko.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function assign(Request $request, $id)
    {
        $shop = Shop::find($id);
        $admin = User::find($request->user_id);
        $currentUser = Auth::user();
        if ($currentUser->role == 'Super Admin') {
            if ($shop == null) {
                return response()->json(['message' => "Shop Not Found"], 404);
            }
            if ($shop->user_id != null) {
                return response()->json(['message' => "Shop Was Assigned By Other admin"], 404);
            }
            if ($admin == null) {
                return response()->json(['message' => "Admin Not Found"], 404);
            }
            if ($admin->role != "Admin") {
                return response()->json(['message' => "This is not Admin"], 404);
            }
            $this->validate($request, [
                'user_id' => 'required',
                'contact' => 'required',
            ]);
            $shop->update([
                'user_id' => $request->user_id,
                'contact' => $request->contact
            ]);

            return new ShopResource($shop);
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
        $shop = Shop::find($id);
        $currentUser = Auth::user();
        if ($shop == null) {
            return response()->json(['message' => "Shop Not Found"], 404);
        }
        if ($currentUser->role == 'Super Admin') {
            $shop->delete();
            return response()->json(['message' => "Shop Deleted"], 200);
        } else if ($currentUser->role == 'Admin') {
            $response = Gate::inspect('update', $shop);
            if ($response->allowed()) {
                $shop->delete();
                return response()->json(['message' => "Shop Deleted"], 200);
            } else {
                return response()->json(['message' => "Cannot Deleted, Because This is not yours"], 403);
            }
        }
        return response()->json(['message' => "You Not Have Permission"], 403);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ShopResource;
use App\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if ($currentUser->role == 'Super Admin') {
            $shops = Shop::get();
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
        $shop = Shop::find($id);
        $currentUser = Auth::user();
        if ($currentUser->role == 'Super Admin') {
            if ($shop==null) {
                return response()->json(['message' => "Shop Not Found"], 404);
            }
            $shops = Shop::get();
            return ShopResource::collection($shops);
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
        $currentUser = Auth::user();
        if ($currentUser->role == 'Super Admin') {
            if ($shop==null) {
                return response()->json(['message' => "Shop Not Found"], 404);
            }
            $this->validate($request, [
                'name' => 'required|max:255',
                'info' => 'required|max:255',
                'address' => 'required|max:500'
            ]);
            $shop->update([
                'name' => $request->name,
                'info' => $request->info,
                'address' => $request->address
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
        if ($currentUser->role == 'Super Admin') {

            if ($shop==null) {
                return response()->json(['message' => "Shop Not Found"], 404);
            }
            $shop->delete();
            return response()->json(['message' => "Shop Deleted"], 200);
        }
        return response()->json(['message' => "You Not Have Permission"], 403);
    }
}

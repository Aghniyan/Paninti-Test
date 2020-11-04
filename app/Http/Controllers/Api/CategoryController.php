<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentUser = Auth::user();
        if ($currentUser->role == 'Super Admin' or $currentUser->role == 'Admin') {
            $categories = Category::latest()->get();
            return CategoryResource::collection($categories);
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
                'shop_id' => 'required'
            ]);
            $category = Category::create([
                'name' => $request->name,
                'shop_id' => $request->shop_id
            ]);

            return new CategoryResource($category);
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
        if ($currentUser->role == 'Super Admin' or $currentUser->role == 'Admin') {
            $category = Category::find($id);
            return new CategoryResource($category);
        }
        return response()->json(['message' => "You Not Have Permission"], 403);
    }

    public function show_shop($id)
    {

        $currentUser = Auth::user();
        if ($currentUser->role == 'Super Admin' or $currentUser->role == 'Admin') {
            $category = Category::where('shop_id',$id)->get();
            return CategoryResource::collection($category);
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
        $currentUser = Auth::user();
        $category = Category::find($id);
        if ($category == null) {
            return response()->json(['message' => "Category Not Found"], 404);
        }
        if ($currentUser->role == 'Super Admin') {
            $this->validate($request, [
                'name' => 'required|max:255'
            ]);
            $category->update([
                'name' => $request->name
            ]);

            return new CategoryResource($category);
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
        $currentUser = Auth::user();
        $category = Category::find($id);
        if ($category == null) {
            return response()->json(['message' => "Category Not Found"], 404);
        }
        if ($currentUser->role == 'Super Admin') {
            $category->delete();
            return response()->json(['message' => "Category Deleted"], 200);
        }
        return response()->json(['message' => "You Not Have Permission"], 403);
    }
}

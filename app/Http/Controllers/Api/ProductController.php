<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductResource;
use App\Product;
use App\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
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
            $products = Product::latest()->get();
            return ProductResource::collection($products);
        }
        return response()->json(['message' => "You Not Have Permission"], 403);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Shop $shop)
    {
        $currentUser = Auth::user();
        if ($currentUser->role == 'Super Admin') {
            $category = Category::where('shop_id', $shop->id)->where('id', $request->category_id)->first();
            if ($shop == null) {
                return response()->json(['message' => "Shop Not Found"], 404);
            }
            if ($category == null) {
                return response()->json(['message' => "Category Not Found"], 404);
            }
            $this->validate($request, [
                'name' => 'required|max:255',
                'price' => 'required',
                'category_id' => 'required',
            ]);
            $product = Product::create([
                'name' => $request->name,
                'price' => $request->price,
                'category_id' => $category->id,
                'shop_id' => $shop->id,
                'stock' => 0
            ]);

            return new ProductResource($product);
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
        $product = Product::find($id);

        if ($product == null) {
            return response()->json(['message' => "Product Not Found"], 404);
        }
        $currentUser = Auth::user();
        if ($currentUser->role == 'Super Admin') {
            return new ProductResource($product);
        }
        return response()->json(['message' => "You Not Have Permission"], 403);
    }

    public function show_shop($id)
    {
        $product = Product::where('shop_id', $id)->get();

        $currentUser = Auth::user();
        if ($currentUser->role == 'Super Admin') {

            if ($product == null) {
                return response()->json(['message' => "Product Not Found"], 404);
            }

            return ProductResource::collection($product);
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
        if ($currentUser->role == 'Super Admin') {
            $category = Category::where('shop_id', $request->shop_id)->where('id', $request->category_id)->first();
            if ($category == null) {
                return response()->json(['message' => "Category Not Found"], 404);
            }
            $this->validate($request, [
                'name' => 'required|max:255',
                'price' => 'required',
                'shop_id' => 'required',
                'category_id' => 'required',
            ]);
            $product = Product::create([
                'name' => $request->name,
                'price' => $request->price,
                'category_id' => $category->id,
                'shop_id' => $request->shop_id,
                'stock' => 0
            ]);

            return new ProductResource($product);
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
        $product = Product::find($id);
        if ($product == null) {
            return response()->json(['message' => "Product Not Found"], 404);
        }
        $currentUser = Auth::user();
        if ($currentUser->role == 'Super Admin') {
            $product->delete();

            return response()->json(['message' => "Product Delete"], 200);
        }
        return response()->json(['message' => "You Not Have Permission"], 403);
    }
}

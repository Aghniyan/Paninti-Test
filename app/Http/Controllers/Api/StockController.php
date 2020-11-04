<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\StockResource;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StockController extends Controller
{

    public function index()
    {
        $currentUser = Auth::user();
        if ($currentUser->role == 'Super Admin' or $currentUser->role == 'Admin') {
            $stocks = Product::latest()->get();
            return StockResource::collection($stocks);
        }
        return response()->json(['message' => "You Not Have Permission"], 403);
    }

    public function store(Request $request, $id)
    {
        $currentUser = Auth::user();
        $product = Product::find($id);
        if ($currentUser->role == 'Super Admin'  or $currentUser->role == 'Admin') {
            $stock = $product->stock;
            if ($product == null) {
                return response()->json(['message' => "product Not Found"], 404);
            }
            if ($stock == 0) {
                $new_stock = $request->stock;
            } else {
                $new_stock = $stock + $request->stock;
            }
            $this->validate($request, [
                'stock' => 'required|numeric'
            ]);
            $product->update([
                'stock' => $new_stock
            ]);

            return new StockResource($product);
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
        $stocks = Product::find($id);
        $currentUser = Auth::user();
        if ($currentUser->role == 'Super Admin' or $currentUser->role == 'Admin') {
            return new StockResource($stocks);
        }
        return response()->json(['message' => "You Not Have Permission"], 403);
    }

    public function show_shop($id)
    {
        $stocks = Product::where('shop_id', $id)->get();
        $currentUser = Auth::user();
        if ($currentUser->role == 'Super Admin' or $currentUser->role == 'Admin') {
            return StockResource::collection($stocks);
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
        $product = Product::find($id);
        if ($currentUser->role == 'Super Admin'  or $currentUser->role == 'Admin') {
            $stock = $product->stock;
            if ($product == null) {
                return response()->json(['message' => "product Not Found"], 404);
            }

            if ($request->type == "+") {
                $new_stock = $stock + $request->stock;
            } else if ($request->type == "-") {
                if ($stock == 0) {
                    return response()->json(['message' => "Update Failed, Stock Must have more than 0 "], 401);
                } else {
                    $new_stock = $stock - $request->stock;
                }
            } else {
                return response()->json(['message' => "Failed Update"], 401);
            }
            $this->validate($request, [
                'stock' => 'required|numeric',
                'type' => 'required|min:1|max:1'
            ]);
            $product->update([
                'stock' => $new_stock
            ]);

            return new StockResource($product);
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
        $product = Product::find($id);
        if ($currentUser->role == 'Super Admin'  or $currentUser->role == 'Admin') {
            $stock = $product->stock;
            if ($product == null) {
                return response()->json(['message' => "product Not Found"], 404);
            }
            $product->update([
                'stock' => 0
            ]);

            return new StockResource($product);
        }
        return response()->json(['message' => "You Not Have Permission"], 403);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function getProduct()
    {
        $products = Product::with('category')->paginate(20);
        return response()->json($products);

    }

    public function searchProductMin(Request $request)
    {
        $products = Product::with('category');

        if (isset($request->data["min"])) {
            $products->where("price", ">", $request->data["min"]);
        }

        if (isset($request->data["max"])) {
            $products->where("price", "<", $request->data["max"]);
        }

        if (isset($request->data["category"])) {
            $text = $request->data["category"];
            $products->where( function($query) use ($text){
                $query->whereHas('category', function($q) use ($text){
                    $q->where('name', 'LIKE', '%' . $text . '%');
                });
            });

        }

        if (isset($request->data["availability"])) {
            $products->where("availability" == $request->data["availability"]);
        }

        return response()->json($products->get());
    }


}

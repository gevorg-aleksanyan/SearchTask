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
        if (isset($request->data["available"])) {
            $products->where("available", $request->data["available"]);
        }

        if (isset($request->data["category"])) {
            $text = $request->data["category"];
            $products->where( function($query) use ($text){
                $query->whereHas('category', function($query1) use ($text){
                    $query1->where('name', 'LIKE', '%' . $text . '%');
                });
            });

        }
        return response()->json($products->get());
    }


}

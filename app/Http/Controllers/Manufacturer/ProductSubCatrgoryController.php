<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductSubCatrgoryController extends Controller
{
    //

    public function index(Request $request)
    {
        if (!empty($request->category_id)) {
            $subCategory = SubCategory::where('category_id', $request->category_id)
                ->orderBy('name', 'ASC')->get();

            return response()->json([
                'status' => true,
                'subCategory' => $subCategory
            ]);
        }
        else
        {
            return response()->json([
                'status' => true,
                'subCategory' => []
            ]);
        }

    }
}
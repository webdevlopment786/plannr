<?php

namespace App\Http\Controllers\API;

use App\Category;
use App\CategoryListing;
use App\Color;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryControllers extends Controller
{
    public function index(Request $request)
    {
        $category = Category::where('status','1')->get();
        if($category){
            return response(["status" => true, 'data' => $category]);
        }else{
            return response(["status" => false, 'data' => 'Not found']);
        }
        
    }

    public function product()
    {
        $category = CategoryListing::where('status','1')->get();
        $categoryProduct = DB::table('category_listing')
        ->select('category_listing.product_title','category_listing.free_or_premium',
                 'category_listing.image','category.name as category_name', 
                 'color.color_name as color_name',
                )
        ->leftJoin('category', 'category_listing.category_id', '=', 'category.id')
        ->leftJoin('color', 'category_listing.color_id', '=', 'color.id')
        ->get();
        if($categoryProduct){
            return response(["status" => true, 'data' => $categoryProduct]);
        }else{
            return response(["status" => false, 'data' => 'Not found']);
        }
    }

    public function color()
    {
        $color = Color::get(['color_name','color_code',]);
        if($color){
            return response(["status" => true, 'data' => $color]);
        }else{
            return response(["status" => false, 'data' => 'Not found']);
        }
        
    }

    public function searchFitter(Request $request)
    {
       
        if(!empty($request->free_or_premium) && !empty($request->color_id)){
                $category =  CategoryListing::
                Where( 'free_or_premium', '=', $request->free_or_premium)
                ->Where( 'color_id', '=', $request->color_id )->get();
        }else if($request->free_or_premium != '' && empty($request->color_id)){
            $category = CategoryListing::where('free_or_premium', '=', $request->free_or_premium)->get();
        }else if($request->free_or_premium == '' && !empty($request->color_id)){
            $category = CategoryListing::where('color_id', '=', $request->color_id)->get();
        }else{
            $category = CategoryListing::get();
        }

        return response(["status" => true, 'data' => $category]);
    }
}

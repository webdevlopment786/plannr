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
        $categoryData = array();
        $categorys = Category::where('status','1')->get();
        
        foreach($categorys as $category){
            $imagePath = asset('images/category/'.$category->image);
            $data = array();
            $data['id'] = $category->id;
            $data['name'] = $category->name;
            $data['image'] = $category->image;
            $data['image_path'] =  $imagePath;
            array_push($categoryData, $data);

         }

        if($categoryData){
            return response(["status" => true, 'data' => $categoryData]);
        }else{
            return response(["status" => false, 'data' => 'Not found']);
        }
        
    }

    public function product()
    {
        $prodoctdata = array(); 
        $categoryProduct = DB::table('category_listing')
        ->select('category_listing.id','category_listing.product_title','category_listing.free_or_premium',
                 'category_listing.image','category_listing.status','category.name as category_name', 
                 'color.color_name as color_name',
                )
        ->leftJoin('category', 'category_listing.category_id', '=', 'category.id')
        ->leftJoin('color', 'category_listing.color_id', '=', 'color.id')
        ->get();
    
        foreach($categoryProduct as $categoryProducts){

            if($categoryProducts->status == 1){
                $imagePath = asset('images/'.$categoryProducts->image);
                $data = array();
                $data['id'] =  $categoryProducts->id;      
                $data['product_title'] =  $categoryProducts->product_title;      
                $data['free_or_premium'] =  $categoryProducts->free_or_premium;      
                $data['category_name'] =  $categoryProducts->category_name;      
                $data['image'] =  $categoryProducts->image;  
                $data['color_name'] =  $categoryProducts->color_name;  
                $data['image_path'] =   $imagePath;   
                array_push($prodoctdata, $data);
            }
        }

        if($prodoctdata){
            return response(["status" => true, 'data' => $prodoctdata]);
        }else{
            return response(["status" => false, 'data' => 'Not found']);
        }
    }

    public function color()
    {
        $color = Color::get(['id','color_name','color_code',]);
        if($color){
            return response(["status" => true, 'data' => $color]);
        }else{
            return response(["status" => false, 'data' => 'Not found']);
        }
        
    }

    public function searchFitter(Request $request)
    {
        $searchData = array();
        if($request->free_or_premium != '' && !empty($request->color_id)){
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

        foreach($category as $categorys){
            $imagePath = asset('images/'.$categorys->image);
            $data = array();
            $data['id'] = $categorys->id;
            $data['category_id'] = $categorys->category_id;
            $data['color_id'] = $categorys->color_id;
            $data['free_or_premium'] = $categorys->free_or_premium;
            $data['product_title'] = $categorys->product_title;
            $data['image'] = $categorys->image;
            $data['image_path'] = $imagePath;
            array_push($searchData, $data);
            
        }

        if($searchData){
            return response(["status" => true, 'data' => $searchData]);
        }else{
            return response(["status" => false, 'data' => 'Not found']);
        }
       
    }
}

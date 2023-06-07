<?php

namespace App\Http\Controllers\API;

use App\Banner;
use App\Category;
use App\CategoryListing;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomePageControllers extends Controller
{
    public function banner()
    {   
        $bannnerData = array();
        $banners = Banner::where('status', 1)->get();

        foreach($banners as $banner){
            $imagePath = asset('images/banner/'.$banner->banner);
            $data = array();
            $data['id'] = $banner->id;
            $data['image'] = $banner->banner;
            $data['image_path'] =  $imagePath;
            array_push($bannnerData, $data);
        }
        
        if($bannnerData){
            return response(["status" => true, 'data' => $bannnerData]);
        }else{
            return response(["status" => false, 'data' => 'Not found']);
        }
    }

    public function categoryWiseProductBanner()
    {   

        $categorys = Category::where('home_screen',1)->get();
        $categoryProducts = array();
        foreach($categorys as $category){
            $birtdays['cat_name'] = $category->name;
            //$birtdays['cat_product'] = CategoryListing::where('home_screen',1)->where('category_id',$adsghcas->id)->get();
            $catProducts = CategoryListing::where('home_screen',1)->where('category_id',$category->id)->get();
            $productCategory = array();
            foreach($catProducts as $catProduct){
                $imagePath = asset('images/'.$catProduct->image);
                $data = array();
                $data['id'] = $catProduct->id;
                $data['product_title'] = $catProduct->product_title;
                $data['image'] = $catProduct->image;
                $data['image_path'] =  $imagePath;
                array_push($productCategory, $data);
            }
            $birtdays['cat_product'] = $productCategory;
            array_push($categoryProducts,$birtdays);
        }
        if($categoryProducts){
            return response(["status" => true, 'data' => $categoryProducts],200);
        }else{
            return response(["status" => false, 'data' => 'Not found'],404);
        }
        
    }
}
    
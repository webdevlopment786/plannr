<?php

namespace App\Http\Controllers\API;

use App\Banner;
use App\Category;
use App\CategoryListing;
use App\Http\Controllers\Controller;
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

    public function birtdayBanner()
    {   
        $bannnerData = array();
        $category = Category::where('name','Birthday Party')->first();
        $birtdays = CategoryListing::where('category_id',$category->id)->get();

        foreach($birtdays as $birtday){
            $imagePath = asset('images/'.$birtday->image);
            $data = array();
            $data['id'] = $birtday->id;
            $data['image'] = $birtday->image;
            $data['image_path'] =  $imagePath;
            array_push($bannnerData, $data);
        }
        
        if($bannnerData){
            return response(["status" => true, 'data' => $bannnerData],200);
        }else{
            return response(["status" => false, 'data' => 'Not found'],404);
        }
    }

    public function bridalBanner()
    {   
        $bannnerData = array();
        $category = Category::where('name','Bridal Shower')->first();
        $bridals = CategoryListing::where('category_id',$category->id)->get();
        foreach($bridals as $bridal){
            $imagePath = asset('images/'.$bridal->image);
            $data = array();
            $data['id'] = $bridal->id;
            $data['image'] = $bridal->image;
            $data['image_path'] =  $imagePath;
            array_push($bannnerData, $data);
        }
        
        if($bannnerData){
            return response(["status" => true, 'data' => $bannnerData],200);
        }else{
            return response(["status" => false, 'data' => 'Not found'],404);
        }
    }

    
}
    
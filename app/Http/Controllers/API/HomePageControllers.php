<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CategoryListing;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Banner;
use App\Models\FAQ;

class HomePageControllers extends Controller
{
    public function banner()
    {   
        $bannnerData = array();
        $banners = Banner::where('status', 1)->where('which',0)->get();

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
            $catProducts = CategoryListing::where('home_screen',1)->whre('category_id',$category->id)->get();
            $productCategory = array();
            foreach($catProducts as $catProduct){
                $imagePath = asset('images/product/'.$catProduct->image);
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

    public function trendingBanner()
    {
        $trendingData = array();
        $trendings = Banner::where('status', 1)->where('which',1)->get();

        foreach($trendings as $trending){
            $imagePath = asset('images/banner/'.$trending->banner);
            $data = array();
            $data['id'] = $trending->id;
            $data['title'] = $trending->name;
            $data['image'] = $trending->banner;
            $data['image_path'] =  $imagePath;
            array_push($trendingData, $data);
        }
        
        if($trendingData){
            return response(["status" => true, 'data' => $trendingData],200);
        }else{
            return response(["status" => false, 'data' => 'Not found'],201);
        }
    }

    public function faq(Request $request)
    {
        $trendingData = array();
        $faqs = FAQ::where('status',1)->get();

        foreach($faqs as $faq){
            $data = array();
            $data['title'] = $faq->title;
            $data['description'] = $faq->description;
            $data['view'] = 'false';
            array_push($trendingData, $data);
        }

        if($trendingData){
            return response(["status" => true, 'data' => $trendingData],200);
        }else{
            return response(["status" => false, 'data' => 'Not found'],201);
        }
    }
}
    
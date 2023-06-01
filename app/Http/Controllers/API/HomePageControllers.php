<?php

namespace App\Http\Controllers\API;

use App\Banner;
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
}

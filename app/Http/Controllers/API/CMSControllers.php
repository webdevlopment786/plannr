<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CMSPages;
use Illuminate\Http\Request;

class CMSControllers extends Controller
{
    public function trem()
    {

        $trem = CMSPages::where('which_page','trems')->get(['content']);

        if($trem){
            return response(["status" => true, 'data' => $trem], 200);
        }else{
            return response(["status" => false, 'data' => 'Not found'], 201);
        }
        
    }

    public function privacy()
    {

        $privacy = CMSPages::where('which_page','privacy')->get(['content']);

        if($privacy){
            return response(["status" => true, 'data' => $privacy], 200);
        }else{
            return response(["status" => false, 'data' => 'Not found'], 201);
        }
        
    }
}

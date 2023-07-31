<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\AdditionalFeatures;
use Illuminate\Http\Request;

class AdditionalFeaturesControllers extends Controller
{
    public function index()
    {
        $features = AdditionalFeatures::get();
        return view('pages.features.index',compact('features'));
    }

}

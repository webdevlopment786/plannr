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
        // return $features;
        return view('pages.features.index',compact('features'));
    }

    public function store(Request $request)
    {

        $features = new AdditionalFeatures();
        $features->title = $request->title;
        $features->price = $request->price;
        $features->save();
        return redirect("additional-features")->with('success','Additiona Features Add Successfully');
    }

    public function update(Request $request)
    {

        $features = AdditionalFeatures::where('id',$request->feature_id)->first();
        $features->title = $request->title;
        $features->price = $request->price;
        $features->update();

        return redirect("additional-features")->with('success','Additiona Features Update Successfully');
    }

    public function delete($id)
    {
        $trending = AdditionalFeatures::find($id);
        $trending->delete();
        return redirect("additional-features")->with('success','Additiona Features Delete Successfully');
    }



}

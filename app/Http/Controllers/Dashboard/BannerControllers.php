<?php

namespace App\Http\Controllers\Dashboard;

use App\Banner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BannerControllers extends Controller
{
    public function index()
    {
        $banners = Banner::get();
        return view('pages.banner.index', compact('banners'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'banner_image' => 'required',
            'status' => 'required',
        ]);

        $imageName = time() . '.' . $request->banner_image->extension();
        $request->banner_image->move(public_path('images/banner'), $imageName);

        $banner = New Banner();
        $banner->banner = $imageName;
        $banner->status = $request->status;
        $banner->save();
        return redirect("banner")->with('success','Banner Add Successfully');
    }

    public function update(Request $request)
    {
        $banners = Banner::where('id',$request->banner_id)->first();
        if ($request->hasFile('banner_image')) {
            $imageName = time() . '.' . $request->banner_image->extension();
            // $request->image->move(public_path('images'), $imageName);
            $request->banner_image->move(public_path('images/banner/'), $imageName);
            $banners->banner = $imageName;
        }
       
        $banners->status = $request->status;
        $banners->update();
        return redirect("banner")->with('success','Banner Update Successfully');
    }

    public function delete($id)
    {
        $banner = Banner::find($id);
        $banner->delete();
        return redirect("banner")->with('success','Banner Delete Successfully');
    }
}
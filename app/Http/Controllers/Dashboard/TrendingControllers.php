<?php

namespace App\Http\Controllers\Dashboard;

use App\Banner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TrendingControllers extends Controller
{
    public function index()
    {   
        $trendings = Banner::where('which',1)->get();
        return view('pages.trending.index',compact('trendings'));
    }

    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'name' => 'required',
            'image' => 'required',
            'status' => 'required',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        // $request->image->move(public_path('images'), $imageName);
        $request->image->move(public_path('images/banner'), $imageName);
        
        $trending = New Banner();
        $trending->name = $request->name;
        $trending->status = $request->status;
        $trending->which = '1';
        $trending->banner = $imageName;
        $trending->save();
        // return $trending;
        return redirect("trending")->with('success','Trending Banner Add Successfully');
    }

    public function update(Request $request)
    {   
        // return $request->all();

        $trendingbanners = Banner::where('id',$request->trending_id)->first();
        if ($request->hasFile('image')) {

            $imageName = time() . '.' . $request->image->extension();
            // $request->image->move(public_path('images'), $imageName);
            $request->image->move(public_path('images/banner/'), $imageName);
            $trendingbanners->banner = $imageName;
        }
        $trendingbnn = 1;
        $trendingbanners->name = $request->name;
        $trendingbanners->status = $request->status;
        $trendingbanners->which = $trendingbnn;
        $trendingbanners->update();

        return redirect("trending")->with('success','Trending Banner Update Successfully');
    }  
    
    public function delete($id)
    {
        $trending = Banner::find($id);
        $image_path = public_path('images/banner/'.$trending->banner);
        if(File::exists($image_path)) {
          File::delete($image_path);
        }
        $trending->delete();
        return redirect("trending")->with('success','Trending Banner Delete Successfully');
    }
}

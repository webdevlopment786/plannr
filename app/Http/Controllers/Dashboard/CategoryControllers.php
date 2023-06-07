<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\CategoryListing;
use App\Color;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryControllers extends Controller
{
    public function index()
    {
        $categorys = Category::get();
        return view('pages.category.index',compact('categorys'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required',
            'status' => 'required',
            'home_screen' => 'required',
        ]);
        
        $imageName = time() . '.' . $request->image->extension();
        // $request->image->move(public_path('images'), $imageName);
        $request->image->move(public_path('images/category'), $imageName);

        $category = New Category();
        $category->name = $request->name;
        $category->home_screen = $request->home_screen;
        $category->status = $request->status;
        $category->image = $imageName;
        $category->save();
        return redirect("category")->with('success','Category Add Successfully');
    }

    public function update(Request $request)
    {   
        $category = Category::where('id',$request->category_id)->first();
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            // $request->image->move(public_path('images'), $imageName);
            $request->image->move(public_path('images/category'), $imageName);
            $category->image = $imageName;
        }
        $category->name = $request->name;
        $category->home_screen = $request->home_screen;
        $category->status = $request->status;
        $category->update();

        return redirect("category")->with('success','Category Update Successfully');
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $image_path = public_path('images/category/'.$category->image);
        if(File::exists($image_path)) {
          File::delete($image_path);
        }
        $category->delete();
        return redirect("category")->with('success','Category Delete Successfully');
    }

    public function listing()
    {
        $categoryListings = CategoryListing::get();
        $categorys = Category::get();
        $colors = Color::get();
        return view('pages.category.listing', compact('categoryListings', 'categorys', 'colors'));
    }
    
    public Function listingCreate(Request $request)
    {   
        
        $value =  $request->all(['value']);
        $valueone = json_encode($value, true);
        $categorys = Category::where('status','1')->get();
        $categoryProduct = Category::where('id',$valueone)->first();
        $color = Color::get();
        return view('pages.category.listingCreate',compact('categorys','color','categoryProduct','valueone'));
    }

    public function ajaxData(Request $request)
    {
        $categorys =  $request->all(['value']);
        return $categorys;
    }

    public function listingStore(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'color_id' => 'required',
            'free_or_premium' => 'required',
            'product_title' => 'required',
            'image' => 'required',
            'status' => 'required',
            'home_screen' => 'required',
        ]);
        $imageName = time() . '.' . $request->image->extension();
        // $request->image->move(public_path('images'), $imageName);
        $request->image->move(public_path('images/product'), $imageName);

        $categorys = New CategoryListing();
        $categorys->category_id = $request->category_id;
        $categorys->color_id = $request->color_id;
        $categorys->free_or_premium = $request->free_or_premium;
        $categorys->product_title = $request->product_title;
        $categorys->image = $imageName;
        $categorys->home_screen = $request->home_screen;
        $categorys->status = $request->status;
        $categorys->save();
        return redirect("category-listing-index")->with('success','Add Category Listing Successfully');
    }

    public function listingEdit($id)
    {   
        $categorys = Category::where('status','1')->get();
        $categorysListing = CategoryListing::find($id);
        $colors = Color::get();
        return view('pages.category.listingEdit',compact('categorys', 'categorysListing', 'colors'));
    }

    public function listingUpdate(Request $request, $id)
    {   

        $request->validate([
            'category_id' => 'required',
            'free_or_premium' => 'required',
            'color_id' => 'required',
            'product_title' => 'required',
            // 'image' => 'required',
            'status' => 'required',
        ]);
        
        $categorys = CategoryListing::find($id);
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            // $request->image->move(public_path('images'), $imageName);
            $request->image->move(public_path('images/product'), $imageName);
            
            $image_path = public_path('images/product/'.$categorys->image);
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $categorys->image = $imageName;
        }

        $categorys->category_id = $request->category_id;
        $categorys->color_id = $request->color_id;
        $categorys->free_or_premium = $request->free_or_premium;
        $categorys->product_title = $request->product_title;
        $categorys->home_screen = $request->home_screen;
        $categorys->status = $request->status;
        $categorys->update();
        return redirect("category-listing-index")->with('success','Update Category Listing Successfully');
    }

    public function deleteCategoryListing($id)
    {   
        $CategoryListing = CategoryListing::find($id);
        $image_path = public_path('images/product'.$CategoryListing->image);
        if(File::exists($image_path)) {
          File::delete($image_path);
        }
        $CategoryListing->delete();
        return redirect("category-listing-index")->with('success','Delete Category Listing Successfully');
    }
}

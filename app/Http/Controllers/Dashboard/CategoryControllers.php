<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\CategoryListing;
use App\Color;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\CssSelector\Node\FunctionNode;

class CategoryControllers extends Controller
{
    public function index()
    {
        $categorys = Category::get();
        return view('pages.category.index',compact('categorys'));
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
        $request->image->move(public_path('images/category'), $imageName);

        $category = New Category();
        $category->name = $request->name;
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
        $category->status = $request->status;
        $category->update();

        return redirect("category")->with('success','Category Update Successfully');
    }

    public function delete($id)
    {
        // dd('sadsadsad');
        $category = Category::find($id);
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
        $categorys = Category::where('status','1')->get();
        $color = Color::get();
        return view('pages.category.listingCreate',compact('categorys','color'));
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
        ]);
        $imageName = time() . '.' . $request->image->extension();
        // $request->image->move(public_path('images'), $imageName);
        $request->image->move(public_path('images'), $imageName);

        $categorys = New CategoryListing();
        $categorys->category_id = $request->category_id;
        $categorys->color_id = $request->color_id;
        $categorys->free_or_premium = $request->free_or_premium;
        $categorys->product_title = $request->product_title;
        $categorys->image = $imageName;
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
            $request->image->move(public_path('images'), $imageName);
            $categorys->image = $imageName;
        }
       
        $categorys->category_id = $request->category_id;
        $categorys->color_id = $request->color_id;
        $categorys->free_or_premium = $request->free_or_premium;
        $categorys->product_title = $request->product_title;
        $categorys->status = $request->status;
        $categorys->update();
        return redirect("category-listing-index")->with('success','Update Category Listing Successfully');
    }

    public function deleteCategoryListing($id)
    {   
        $CategoryListing = CategoryListing::find($id);
        $CategoryListing->delete();
        return redirect("category-listing-index")->with('success','Delete Category Listing Successfully');
    }
}

<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\CategoryListing;
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
        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);
        
        $category = New Category();
        $category->name = $request->name;
        $category->status = $request->status;
        $category->save();
        return redirect("category")->with('success','Category Add Successfully');
    }

    public function update(Request $request)
    {   
        $category = Category::where('id',$request->category_id)->first();
        $category->name = $request->name;
        $category->status = $request->status;
        $category->update();
        return redirect("category")->with('success','Category Update Successfully');
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect("category")->with('success','Category Delete Successfully');
    }

    public function listing()
    {
        $categoryListings = CategoryListing::get();
        $categorys = Category::get();
        return view('pages.category.listing', compact('categoryListings','categorys'));
    }

    public Function listingCreate(Request $request)
    {   
        $categorys = Category::where('status','1')->get();
        return view('pages.category.listingCreate',compact('categorys'));
    }

    public function listingStore(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'free_or_premium' => 'required',
            'third_field_text' => 'required',
            'image' => 'required',
            'status' => 'required',
        ]);
        $imageName = time() . '.' . $request->image->extension();
        // $request->image->move(public_path('images'), $imageName);
        $request->image->move(public_path('images'), $imageName);

        $categorys = New CategoryListing();
        $categorys->category_id = $request->category_id;
        $categorys->free_or_premium = $request->free_or_premium;
        $categorys->third_field_text = $request->third_field_text;
        $categorys->image = $imageName;
        $categorys->status = $request->status;
        $categorys->save();
        return redirect("category-listing-index")->with('success','Add Category Listing Successfully');
    }

    public function listingEdit($id)
    {   
        $categorys = Category::where('status','1')->get();
        $categorysListing = CategoryListing::find($id);
        return view('pages.category.listingEdit',compact('categorys','categorysListing'));
    }

    public function listingUpdate(Request $request, $id)
    {   
        $request->validate([
            'category_id' => 'required',
            'free_or_premium' => 'required',
            'third_field_text' => 'required',
            'image' => 'required',
            'status' => 'required',
        ]);
      
        $imageName = time() . '.' . $request->image->extension();
        // $request->image->move(public_path('images'), $imageName);
        $request->image->move(public_path('images'), $imageName);

        $categorys = CategoryListing::find($id);
        $categorys->category_id = $request->category_id;
        $categorys->free_or_premium = $request->free_or_premium;
        $categorys->third_field_text = $request->third_field_text;
        $categorys->image = $imageName;
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

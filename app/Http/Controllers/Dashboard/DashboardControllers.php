<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryListing;
use App\Models\Category;
use App\Models\User;

class DashboardControllers extends Controller
{
    public function index()
    {
        $users = User::where('status',1)->get(); 
        $categorys = Category::where('status',1)->get();
        $products = CategoryListing::where('status',1)->get();
        return view('pages.dashboard.index',compact('users','categorys', 'products'));
    }
}

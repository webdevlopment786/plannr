<?php

namespace App\Http\Controllers\Dashboard;

use App\CategoryListing;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CreateInvitation;

class CreateinvitationController extends Controller
{
    public function index(Request $request)
    {
        $createinvitions = CreateInvitation::get();
        return view('pages.createinvitation.index',compact('createinvitions'));     
    }

    public function showInvition(Request $request)
    {
        $value = $request->invitation_id;
        $createinvitions = CreateInvitation::where('id',$value)->first();
        // return $createinvitions;
        $product = CategoryListing::where('id',$createinvitions->product_id)->first();
        return view('pages.createinvitation.show',compact('createinvitions','product'));
    }
}

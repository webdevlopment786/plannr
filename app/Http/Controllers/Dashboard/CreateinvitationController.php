<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryListing;
use App\Models\CreateInvitation;

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
        $product = CategoryListing::where('id',$createinvitions->product_id)->first();
        return view('pages.createinvitation.show',compact('createinvitions','product'));
    }

    public function invitationSend()
    {
        return view('pages.invitationsend');
    }

    public function invationclick()
    {
        return view('pages.invationclick');
    }

    public function messagesend()
    {
        return view('pages.messageclick');
    }
}

<?php

namespace App\Http\Controllers\Dashboard;

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
}

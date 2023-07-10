<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CMSPages;
use Illuminate\Http\Request;

class PrivacyPolicyControllers extends Controller
{
    public function index()
    {
        $privacys = CMSPages::where('which_page','privacy')->get();
        return view('pages.privacy.index',compact('privacys'));
    }

    public function edit($id)
    {
        $privacy = CMSPages::find($id);
        return view('pages.privacy.edit',compact('privacy'));
    }

    public function update(Request $request, $id)
    {
        $privacy = CMSPages::find($id);
        $privacy->content = $request->content;
        $privacy->which_page = 'privacy';
        $privacy->update();
        return redirect("privacy-policy")->with('success','Privacy Policy Page Update Successfully');
    }
}

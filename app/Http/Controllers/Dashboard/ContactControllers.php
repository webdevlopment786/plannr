<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CMSPages;

class ContactControllers extends Controller
{
    public function index()
    {
        $contacts = CMSPages::where('which_page','contact')->get();
        return view('pages.contact.index',compact('contacts'));
    }
    
    public function edit($id)
    {
        $contact = CMSPages::find($id);
        return view('pages.contact.edit',compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'content' => 'required',
        ]);

        $contact = CMSPages::find($id);
        $contact->content = $request->content;
        $contact->which_page = 'contact';
        $contact->update();
        return redirect("contact")->with('success','Contact Us Page Update Successfully');
    }
}

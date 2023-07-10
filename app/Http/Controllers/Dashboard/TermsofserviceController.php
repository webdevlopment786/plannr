<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CMSPages;
use Illuminate\Http\Request;

class TermsofserviceController extends Controller
{
    public function index()
    {   
        $trems = CMSPages::where('which_page','trems')->get();
        return view('pages.term.index',compact('trems'));
    }

    public function edit(Request $request, $id)
    {
        $trems = CMSPages::find($id);
        return view('pages.term.edit',compact('trems'));
    }

    public function update(Request $request,$id)
    {
        $trems = CMSPages::find($id);
        $trems->content = $request->content;
        $trems->which_page = 'trems';
        $trems->update();
        return redirect("term-service")->with('success','Trems Page Update Successfully');
    }

}

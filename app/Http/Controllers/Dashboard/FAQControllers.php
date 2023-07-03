<?php

namespace App\Http\Controllers\Dashboard;

use App\FAQ;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FAQControllers extends Controller
{
    public function index()
    {
        $faqs = FAQ::get();
        return view('pages.faq.index',compact('faqs'));
    }

    public function create()
    {
        return view('pages.faq.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);

        $faq = new FAQ();
        $faq->title = $request->title;
        $faq->description = $request->description;
        $faq->status = $request->status;
        $faq->save();
        return redirect("faq")->with('success','FAQ Add Successfully');

    }

    public function edit(Request $request,$id)
    {
        $faq = FAQ::find($id);
        return view('pages.faq.edit',compact('faq'));

    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);
        
        $faq = FAQ::find($id);
        $faq->title = $request->title;
        $faq->description = $request->description;
        $faq->status = $request->status;
        $faq->update();
        return redirect("faq")->with('success','FAQ Update Successfully');
    }

    public function delete($id)
    {
        $faq = FAQ::find($id);
        $faq->delete();
        return redirect("faq")->with('success','FAQ Delete Successfully');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        FAQ::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"User Delete Successfully."]);
    }
}

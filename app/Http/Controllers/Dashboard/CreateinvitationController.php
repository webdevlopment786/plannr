<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryListing;
use App\Models\CreateInvitation;
use App\Models\Rsvp;

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
        $contact_id = $request->guest_id;
        $user_id = $request->user_id;
        $createinvitions = CreateInvitation::where('id',$value)->first();
        $product = CategoryListing::where('id',$createinvitions->product_id)->first();
        $rsvps = Rsvp::where('invitation_id',$value)->get()->take(3);
        $rsvpcount = Rsvp::where('invitation_id',$value)->where('status','1')->count();
        $rsvpcountmaybe = Rsvp::where('invitation_id',$value)->where('status','2')->count();
        $rsvpcountno = Rsvp::where('invitation_id',$value)->where('status','0')->count();
        $rsvpsnew = Rsvp::where('invitation_id',$value)->get();
        return view('pages.createinvitation.show',compact('createinvitions','product','rsvps','rsvpsnew',
                                                          'rsvpcount','rsvpcountmaybe','rsvpcountno','contact_id','user_id'));
    }

    public function rsvp(Request $request)
    {
        
        $guest = $request->guest;  
        $rsvpcount = new Rsvp();
        $rsvpcount->invitation_id = $request->invitation_id;
        $rsvpcount->name = $request->name;
        $rsvpcount->email = $request->email;

        if($guest){
            $rsvpcount->guest = $guest;
        }else{
            $rsvpcount->guest = '0';
        }

        $rsvpcount->comment = $request->comment;
        $rsvpcount->status = $request->status;
        $rsvpcount->contact_id  =$request->contact_id;
        $rsvpcount->user_id =$request->user_id;
        $rsvpcount->save();
        return redirect()->back()->with('success', 'Message Send'); 
    }

    public function messageSendInvitation(Request $request)
    {   
            
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

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\ContactInvitations;
use App\Models\Rsvp;
use Illuminate\Http\Request;

class GuestControllers extends Controller
{
    public function guestlistall(Request $request)
    {
        $user_id = $request->user_id;
        $invitationId = $request->invitation_id;

        $guestList = ContactInvitations::get(); 
        foreach($guestList as $guestLists){
            $contactlist = Contact::whereIn('id',json_decode($guestLists->contact_id))->get(['id','name','mobile_number','email']);
        }

        if($contactlist){
            return response(["status" => true, 'data' => $contactlist]);
        }else{
            return response(["status" => false, 'data' => 'Not found']);
        }
    }

    public function guestListYes(Request $request)
    {
        $invitationId = $request->invitation_id;
        $guestListYes = Rsvp::where('invitation_id',$invitationId)->where('status',1)->get();

        // foreach($guestListYes as $guestListYess){
        //     $contactlist = Contact::whereIn('id',json_decode($guestListYess->contact_id))->get(['id','name','mobile_number','email']);
        // }

        if($guestListYes){
            return response(["status" => true, 'data' => $guestListYes]);
        }else{
            return response(["status" => false, 'data' => 'Not found']);
        }
        
    }

    public function guestlistcount(Request $request)
    { 
        $contactData = array();
        $invitationId = $request->invitation_id;
        $guestListNocount = Rsvp::where('invitation_id',$invitationId)->where('status','0')->count();
        $guestListYescount = Rsvp::where('invitation_id',$invitationId)->where('status','1')->count();
        $guestListmaybecount = Rsvp::where('invitation_id',$invitationId)->where('status','2')->count();
        $allcount = Rsvp::where('invitation_id',$invitationId)->count();

        $guestPendingcount = ContactInvitations::where('invitation_id',$invitationId)->first();

        $getlists = count(json_decode($guestPendingcount->contact_id));
        $pendingcountlist = $getlists - $allcount;
        
        $data = array();
        $data['all'] = $getlists;
        $data['Yes'] = $guestListYescount;
        $data['No'] = $guestListNocount;
        $data['maybe'] = $guestListmaybecount;
        $data['panding'] = $pendingcountlist;
        
        array_push($contactData, $data);

        if($contactData){
            return response(["status" => true, 'data' => $contactData]);
        }else{
            return response(["status" => false, 'data' => 'Not found']);
        }
    }
}

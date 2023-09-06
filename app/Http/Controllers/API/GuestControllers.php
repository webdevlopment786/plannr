<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\ContactInvitations;
use App\Models\CreateInvitation;
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
        $guest =  $request->guest;
        $invitationId = $request->invitation_id;

        if($guest == 'yes'){
            $guestListyes = Rsvp::where('invitation_id',$invitationId)->where('status',1)->get();
            foreach($guestListyes as $guestListyess){
                $create = CreateInvitation::where('id',$guestListyess->invitation_id)->first();
                $guestListYes = Contact::where('user_id',$create->user_id)->get(['id','name','mobile_number','email']);
            }
        }elseif($guest == 'no'){
            $guestListYes = Rsvp::where('invitation_id',$invitationId)->where('status',0)->get();
        }elseif($guest == 'maybe'){
            $guestListYes = Rsvp::where('invitation_id',$invitationId)->where('status',2)->get();
        }elseif($guest == 'all'){
            $guestList = ContactInvitations::get();  
            foreach($guestList as $guestLists){
                $guestListYes = Contact::whereIn('id',json_decode($guestLists->contact_id))->get(['id','name','mobile_number','email']);
            }
        }else{
            $guestListYes = '';
        }

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

        if($guestPendingcount){

            $getlists = count(json_decode($guestPendingcount->contact_id));
        }else{
            $getlists = '0';
        }
        
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

    public function RsvpCount(Request $request)
    { 
        $contactData = array();
        $invitationId = $request->invitation_id;
        $guestListNocount = Rsvp::where('invitation_id',$invitationId)->where('status','0')->count();
        $guestListYescount = Rsvp::where('invitation_id',$invitationId)->where('status','1')->count();
        $guestListmaybecount = Rsvp::where('invitation_id',$invitationId)->where('status','2')->count();
        $allcount = Rsvp::where('invitation_id',$invitationId)->count();

        $guestPendingcount = ContactInvitations::where('invitation_id',$invitationId)->first();
        $yesandmaybe = $guestListmaybecount + $guestListYescount;
        if($guestPendingcount)
        {
            $getlists = count(json_decode($guestPendingcount->contact_id));
        }else{
            $getlists = '0';
        }
        $pendingcountlist = $getlists - $allcount;
        
        $data = array();
        $data['Attending'] = $yesandmaybe;
        $data['Not Attending'] = $guestListNocount;
        $data['panding'] = $pendingcountlist;
        
        array_push($contactData, $data);

        if($contactData){
            return response(["status" => true, 'data' => $contactData]);
        }else{
            return response(["status" => false, 'data' => 'Not found']);
        }
    }


    public function addGusts(Request $request)
    {
        $contactData = array();
        $user_id = $request->user_id;
        $invitation_id = $request->invitation_id;
        $ContactInvitations = ContactInvitations::where('invitation_id',$invitation_id)->where('user_id',$user_id)->first(); 
        $conatcts = Contact::where('user_id',$user_id)->get();

        foreach($conatcts as $conatct)
        {
            $data = array();
            $array = explode(",", $conatct->id);
            $first = trim($ContactInvitations->contact_id, '[');
            $last = trim($first, ']');
            $array = explode(",", $last);
            
            if(in_array($conatct->id,$array)){
                $select = 'true';
            }else{
                $select = 'flase';
            }

            $data['id'] = $conatct->id;
            $data['name'] = $conatct->name;
            $data['email'] = $conatct->email;
            $data['mobile_number'] = $conatct->mobile_number;
            $data['select'] = $select;
            array_push($contactData, $data);
           
        }

        if($contactData){
            return response(["status" => true, 'data' => $contactData]);
        }else{
            return response(["status" => false, 'data' => 'Not found']);
        }
    }


    public function guestlistYesNo(Request $request)
    {
        $contactData = array();
        $yes = array();
        $no = array();
        $maybe = array();
        $pending = array();
        $ContactInvitations = ContactInvitations::where('invitation_id',$request->invitation_id)->where('user_id',$request->user_id)->first();
        // return $ContactInvitations->contact_id;
       
        $first = trim($ContactInvitations->contact_id, '[');
        $last = trim($first, ']');
        $invitationArrays = explode(",", $last);
        
        foreach($invitationArrays as $contact_id)
        {
            $data = array();
            $contacts = Contact::where('id',$contact_id)->first();
            $data['id'] = $contacts->id;
            $data['name'] = $contacts->name;
            $data['email'] = $contacts->email;
            $data['mobile_number'] = $contacts->mobile_number;
            $rsvps = Rsvp::where('contact_id',$contact_id)->first();
            if(!empty($rsvps)){
                if($rsvps->status == '1'){
                    $status = 'yes';
                    $data['status'] =  $status;
                    array_push($yes, $data);
                }elseif($rsvps->status == '2'){
                    $status = 'maybe';
                    $data['status'] =  $status;
                    array_push($maybe, $data);
                }else{
                    $status = 'no';
                    $data['status'] =  $status;
                    array_push($no, $data);
                }   
            }else{
                $status = 'pending';
                $data['status'] =  $status;
                array_push($pending, $data);
            }
            array_push($contactData, $data);
        }

        if($request->guest_list == 'yes'){
            $returnData = $yes;
        }elseif($request->guest_list == 'no'){
            $returnData = $no;
        }elseif($request->guest_list == 'maybe'){
            $returnData = $maybe;
        }elseif($request->guest_list == 'pending'){
            $returnData = $pending;
        }else{
            $returnData = $contactData;
        }
      
        if($returnData){
            return response(["status" => true, 'data' => $returnData]);
        }else{
            return response(["status" => false, 'data' => 'Not found']);
        }
        
    }




}

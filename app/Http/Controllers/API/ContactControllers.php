<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CreateInvitation;
use App\Models\Contact;
use App\Models\ContactInvitations;
use Mail;

class ContactControllers extends Controller
{
    public function createContactList(Request $request)
    {
        $createlist = new Contact();
        $createlist->name = $request->name;
        $createlist->mobile_number = $request->number;
        $createlist->email = $request->email;
        $createlist->user_id = $request->user_id;
        $createlist->save();

        if($createlist){
            return response(["status" => true, 'data' => 'Contact Details Saved Successfully'], 200);
        }else{
            return response(["status" => false, 'data' => 'Not found'], 201);
        }
    }

    public function contactList(Request $request)
    {
        $contactData = array();
        $contactLists = Contact::where('user_id',$request->user_id)->get();
        $empty = array();
        foreach($contactLists as $contactList){
            $data = array();
            $data['id'] = $contactList->id;
            $data['Name'] = $contactList->name;
            $data['Email'] = $contactList->email;
            $data['Mobile_Number'] = $contactList->mobile_number;
            array_push($contactData, $data);
         }

        if($contactData){
            return response(["status" => true, 'data' => $contactData]);
        }else{
            return response(["status" => false, 'data' =>  $empty]);
        }

    }

    public function contactSYNC(Request $request)
    {
      
        // return $request->all();
        $contacts = $request->contact_list;
        
        $data = json_encode($contacts);
        // return $data;         
        foreach($contacts as $contact){
            // return $contact;
            $contactLists = New Contact();
            $contactLists->user_id = $request->user_id;
            $contactLists->name = $contact;
            $contactLists->mobile_number = $contact;
            $contactLists->email = $contact;
            $contactLists->save();
        }

        if($contactLists){
            return response(["status" => true, 'data' => 'Contact SYNC Successfully'], 200);
        }else{
            return response(["status" => false, 'data' => 'Not found'], 201);
        }

    }

    public function invitationSendMail(Request $request)
    {
        
        $idsss = json_decode($request['contact_id']); 
         
        $userId = $request->user_id;
        $invitationId = $request->invitation_id;
        
        // return $idsss;
        foreach($idsss as $id){
            // return $id;
            $banners = Contact::where('user_id',$userId)->where('id',$id)->get();
             
            // return $banners;
            foreach($banners as $banner){
                $invationsend = CreateInvitation::where('id',$invitationId)->first();
                
                $to = $banner->email;
                $msg = "Thanks To Receiving My Invitation Card .";
                $subject="Invitation Card For :- $invationsend->type_events";
                $headers = 'Content-type: text/html; charset=iso-8859-1'."\r\n";
                $headers .= 'From:Invitation Card <info@plannr.com>'."\r\n";
                $ms="<html></body><div><div>Dear $banner->name,</div></br></br>";
                $ms.="<div style='padding-top:8px;'>I invite you to come and join us to celebrate with us.Please do join us!</div>
                <div style='padding-top:10px;'><a href='https://webdevelopment33.com/plannr/create-invition-show?invitation_id=$invationsend->id'>Invitation Link</a></div>
                <div style='padding-top:4px;'>Thank You</div></div>
                </body></html>";
                
                if($to){
                    mail($to,$subject,$ms,$headers);
                    // Mail::send('pages.email.OTPVerificationEmail', ['otp' => $ms], function($message) use($to){
                    //     $message->to($to);
                    //     $message->subject('Invitation Card For');
                    // });
                }
                
            }
        }

        $contact = new ContactInvitations();
        $contact->user_id = $userId;
        $contact->invitation_id = $invitationId;
        $contact->contact_id = $request['contact_id'];
        $contact->save();

        if($to){
            return response(["status" => true, 'message' => 'Invitation Sent Successfully!']);
        }else{
            return response(["status" => false, 'data' => 'Not found']);
        }
       
    }

    public function invitationSendListUser(Request $request)
    {
        $user_id = $request->user_id;
        $invitationid = $request->invitation_id;
        $contactlist = ContactInvitations::where('user_id',$user_id)->where('invitation_id', $invitationid)->get();

        foreach($contactlist as $contactlists){
            $contactId =  json_decode($contactlists->contact_id);
            $contactlist = Contact::whereIn('id',$contactId)->get(['id','name','mobile_number','email']);
        }

        if($contactlist){
            return response(["status" => true, 'data' => $contactlist]);
        }else{
            return response(["status" => false, 'data' => 'Not found']);
        }
        
    }

    public function newContactList(Request $request)
    {
        $contactData = array();
        $contactLists = Contact::where('user_id',$request->user_id)->get();
        $empty = array();
        foreach($contactLists as $contactList){
            $data = array();
            $data['id'] = $contactList->id;
            $data['Name'] = $contactList->name;
            $data['Email'] = $contactList->email;
            $data['Mobile_Number'] = $contactList->mobile_number;
            array_push($contactData, $data);
         }

        if($contactData){
            return response(["status" => true, 'data' => $contactData]);
        }else{
            return response(["status" => false, 'data' =>  $empty]);
        }

    }
}

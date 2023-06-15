<?php

namespace App\Http\Controllers\API;

use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
            return response(["status" => false, 'data' => 'Not found']);
        }

    }

    
}

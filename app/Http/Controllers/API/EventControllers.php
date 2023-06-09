<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryListing;
use App\Models\CreateInvitation;
use Carbon\Carbon;

class EventControllers extends Controller
{
    public function upComingEvent(Request $request)
    {   
        $searchData = array();
        $val = now()->format('Y-m-d');
        $events = CreateInvitation::where('user_id',$request->user_id)->whereDate('date', '>=', $val)->get(); 
        // return $events;
        
        foreach($events as $event){
            
                $product = CategoryListing::where('id',$event->product_id)->first();
                
                $data = array();
                if($product){
                    $imagePath = asset('images/product/'.$product->image);
                    $data['id'] = $event->id;
                    $data['Name'] = $event->name;
                    $data['Phone'] = $event->phone;
                    $data['Date'] = $event->date;
                    $data['Time'] = $event->time;
                    $data['Draft'] = $event->draft;
                    $data['Hosted_By'] = $event->hosted_by;
                    $data['Image'] = $imagePath;    
                    array_push($searchData, $data);
                }
            
        }
         
        if($searchData){
            return response(["status" => true, 'data' => $searchData], 200);
        }else{
            return response(["status" => false, 'data' => 'Not found'], 201);
        }
    }

    public function pastEvent(Request $request)
    {   
        $searchData = array();
        $date = Carbon::today()->subDays(1);
        $events = CreateInvitation::where('user_id',$request->user_id)->where('date','<=',$date)->get();

        foreach($events as $event){
            
            $product = CategoryListing::where('id',$event->product_id)->first();
            $data = array();
            if($product){
                $imagePath = asset('images/product/'.$product->image);
                $data['id'] = $event->id;
                $data['Name'] = $event->name;
                $data['Phone'] = $event->phone;
                $data['Date'] = $event->date;
                $data['Time'] = $event->time;
                $data['Hosted_By'] = $event->hosted_by;
                $data['Image'] = $imagePath;
                array_push($searchData, $data);
            }else{
                $imagePath = asset('images/product/'.$event->custom_image);
                $data['id'] = $event->id;
                $data['Name'] = $event->name;
                $data['Phone'] = $event->phone;
                $data['Date'] = $event->date;
                $data['Time'] = $event->time;
                $data['Hosted_By'] = $event->hosted_by;
                $data['Image'] = $imagePath;
                array_push($searchData, $data);

            }
            
        }
         
        if($searchData){
            return response(["status" => true, 'data' => $searchData], 200);
        }else{
            return response(["status" => false, 'data' => 'Not found'], 201);
        }
    }

    public function eventOverView(Request $request)
    {
        $searchData = array();
        $event = CreateInvitation::where('id',$request->event_id)->first();
        $product = CategoryListing::where('id',$event->product_id)->first();

        if($product)
        {
            $imagePath = asset('images/product/'.$product->image);
        }else
        {
            $imagePath = asset('images/product/'.$event->custom_image);
        }
       
        $data = array();
        $data['id'] = $event->id;
        $data['Name'] = $event->name;
        $data['Phone'] = $event->phone;
        $data['Date'] = $event->date;
        $data['Time'] = $event->time;
        $data['Hosted_By'] = $event->hosted_by;
        $data['Image'] = $imagePath;
        array_push($searchData, $data);

        if($searchData){
            return response(["status" => true, 'data' => $searchData], 200);
        }else{
            return response(["status" => false, 'data' => 'Not found'], 201);
        } 
    }

    public function editInvitation(Request $request)
    {
        
       
        $eventId = $request->event_id;
        $editInvitation = CreateInvitation::where('id',$eventId)->where('user_id',$request->user_id)->firstOrFail();
  
        if($editInvitation){
            return response(["status" => true, 'data' => $editInvitation], 200);
        }else{
            return response(["status" => false, 'data' => 'Not found'], 201);
        } 
    }

    public function viewInvitation(Request $request)
    {

        $CreateInvitationView = CreateInvitation::where('id',$request->event_id)->where('user_id',$request->user_id)->first();
        $product = CategoryListing::where('id',$CreateInvitationView->product_id)->first();

        if($product){
            $imagePath = asset('images/product/'.$product->image);
        }else{
            $imagePath = asset('images/createinvitation/'.$CreateInvitationView->custom_image);
        }

        $data['image'] =  $imagePath;
        $data['Type of Event'] =  $CreateInvitationView->type_events;
        $data['Start Date'] =  $CreateInvitationView->date;
        $data['Event Time'] =  $CreateInvitationView->time;
        $data['Location'] =  $CreateInvitationView->location;
        $data['Hosted By'] =  $CreateInvitationView->hosted_by;
        $data['Phone_number'] =  $CreateInvitationView->phone;
        $data['Event Title'] =  $CreateInvitationView->name;

        // $data['Time Zone'] =  $CreateInvitationView->zone;
        // $data['message'] =  $CreateInvitationView->message;
        // $data['Dress Code'] =  $CreateInvitationView->dress_code;
        // $data['Food / Beverages'] =  $CreateInvitationView->food;
        // $data['Additional Information'] =  $CreateInvitationView->add_info;
        // $data['Add Additional Admin / Event Organizer'] =  $CreateInvitationView->add_admin;
        // $data['Add Chat Room'] =  $CreateInvitationView->add_chat_room;
        // $data['Invite More Than 2 People'] =  $CreateInvitationView->invite_more;

        if($data){
            return response(["status" => true, 'data' => $data], 200);
        }else{
            return response(["status" => false, 'data' => 'Not found'], 201);
        }
    }

    public function cancelEvent(Request $request)
    {
        $cancel = CreateInvitation::where('id',$request->event_id)->where('user_id',$request->user_id)->first();
        $cancel->draft = $request->draft;
        $cancel->update();

        if($cancel){
            return response(["status" => true, 'message' => 'Event Cancel Successfully'], 200);
        }else{
            return response(["status" => false, 'data' => 'Not found'], 201);
        }


    }
}

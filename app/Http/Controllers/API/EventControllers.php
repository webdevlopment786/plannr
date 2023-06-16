<?php

namespace App\Http\Controllers\API;

use App\CategoryListing;
use App\CreateInvitation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EventControllers extends Controller
{
    public function upComingEvent(Request $request)
    {   
            $searchData = array();
            $date = Carbon::today()->subDays(1);
            $events = CreateInvitation::where('user_id',$request->user_id)->where('date','>=',$date)->get();

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
        $editInvitation->name = $request->name;
        $editInvitation->date = $request->date;
        $editInvitation->zone = $request->time_zone;
        $editInvitation->time = $request->time;
        $editInvitation->location = $request->location;
        $editInvitation->phone = $request->phone;
        $editInvitation->type_events = $request->type_events;
        $editInvitation->dress_code = $request->dress_code;
        $editInvitation->food = $request->food;
        $editInvitation->add_info = $request->add_info;
        $editInvitation->add_admin = $request->add_admin;
        $editInvitation->add_chat_room = $request->add_chat_room;
        $editInvitation->invite_more = $request->invite_more;
        $editInvitation->hosted_by = $request->hosted_by;
        $editInvitation->message = $request->message;
        $editInvitation->update();

        if($editInvitation){
            return response(["status" => true, 'data' => 'Invitation Update Successfully'], 200);
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
        $data['Event Title'] =  $CreateInvitationView->name;
        $data['Start Date'] =  $CreateInvitationView->date;
        $data['Event Time'] =  $CreateInvitationView->time;
        $data['Time Zone'] =  $CreateInvitationView->zone;
        $data['Hosted By'] =  $CreateInvitationView->hosted_by;
        $data['Location'] =  $CreateInvitationView->location;
        $data['message'] =  $CreateInvitationView->message;
        $data['Type of Event'] =  $CreateInvitationView->type_events;
        $data['Dress Code'] =  $CreateInvitationView->dress_code;
        $data['Food / Beverages'] =  $CreateInvitationView->food;
        $data['Additional Information'] =  $CreateInvitationView->add_info;
        $data['Add Additional Admin / Event Organizer'] =  $CreateInvitationView->add_admin;
        $data['Add Chat Room'] =  $CreateInvitationView->add_chat_room;
        $data['Invite More Than 2 People'] =  $CreateInvitationView->invite_more;

        if($data){
            return response(["status" => true, 'data' => $data], 200);
        }else{
            return response(["status" => false, 'data' => 'Not found'], 201);
        }
    }
}

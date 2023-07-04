<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;


class SubscriptionControllers extends Controller
{
        public function index()
        {
            $subscription =  Subscription::get(['main_title','month_price','years_price','people',
                             'unlimited_event','add_chatroom','add_up_to_guests','access_to_all_current']);
            
            if($subscription){
                return response(["status" => true, 'data' => $subscription], 200);
            }else{
                return response(["status" => false, 'data' => 'Not found'], 201);
            }
            
        }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Messager;
use Illuminate\Http\Request;

class MessagerControllers extends Controller
{
    public function messager()
    {
        
    }

    public function broadcastingMessager(Request $request)
    {
        
        $messager = new Messager();
        $messager->user_id = $request->user_id;
        $messager->event_id = $request->event_id;
        $messager->message = $request->message;
        $messager->Broadcast_to_option = $request->Broadcast_to_option;
        $messager->save();
        
        if($messager){
            return response(["status" => true, 'data' => 'Message Send' ]);
        }else{
            return response(["status" => false, 'data' => 'Not found']);
        }
    }

}

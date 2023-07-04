<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;


class SubscriptionControllers extends Controller
{
    
    public function index()
    {
        $subscriptions = Subscription::get();
        return view('pages.subscription.index',compact('subscriptions'));
    }

    public function edit(Request $request, $id)
    {
        $subscription = Subscription::find($id);
        return view('pages.subscription.edit',compact('subscription'));
    }

    public function update(Request $request,$id)
    {
        $subscription = Subscription::find($id);
        $subscription->main_title  = $request->main_title;
        $subscription->month_price = $request->month_price;
        $subscription->years_price = $request->years_price;
        $subscription->people      = $request->people;
        $subscription->unlimited_event = $request->unlimited_event;
        $subscription->add_chatroom = $request->add_chatroom;
        $subscription->add_up_to_guests = $request->add_up_to_guests;
        $subscription->access_to_all_current = $request->access_to_all_current;
        $subscription->update();
        return redirect("subscription")->with('success','Subscription Update Successfully');

    }
}

@extends('layout.master')
@section('content')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Subscription Edit</h6>
        <form action="{{url('subscription-update/'.$subscription->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @if($subscription->id == 1)
                <div class="mb-3">
                    <label for="exampleInputPlaceholder" class="form-label">Main Title</label>
                    <input type="text" class="form-control" value="{{$subscription->main_title}}" name="main_title" id="exampleInputPlaceholder" placeholder="Enter Main Title">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPlaceholder" class="form-label">Month Price</label>
                    <input type="text" class="form-control" value="{{$subscription->month_price}}" name="month_price" id="exampleInputPlaceholder" placeholder="Enter Month Price">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPlaceholder" class="form-label">Years Price</label>
                    <input type="text" class="form-control" value="{{$subscription->years_price}}" name="years_price" id="exampleInputPlaceholder" placeholder="Enter Years Price">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPlaceholder" class="form-label">People Per Event</label>
                    <input type="text" class="form-control" value="{{$subscription->people}}" name="people" id="exampleInputPlaceholder" placeholder="Enter People Per Event">
                </div>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       
                <div class="mb-3">
                    <label for="exampleInputPlaceholder" class="form-label">Unlimited Event</label>
                    <input type="text" class="form-control" value="{{$subscription->unlimited_event}}" name="unlimited_event" id="exampleInputPlaceholder" placeholder="Enter Unlimited Event">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPlaceholder" class="form-label">Add Chatroom</label>
                    <input type="text" class="form-control" value="{{$subscription->add_chatroom}}" name="add_chatroom" id="exampleInputPlaceholder" placeholder="Enter Add Chatroom">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPlaceholder" class="form-label">Add Up To Guests</label>
                    <input type="text" class="form-control" value="{{$subscription->add_up_to_guests}}" name="add_up_to_guests" id="exampleInputPlaceholder" placeholder="Enter Add Up To Guests">
                </div>
            @elseif($subscription->id == 2)
            <div class="mb-3">
                    <label for="exampleInputPlaceholder" class="form-label">Main Title</label>
                    <input type="text" class="form-control" value="{{$subscription->main_title}}" name="main_title" id="exampleInputPlaceholder" placeholder="Enter Main Title">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPlaceholder" class="form-label">Month Price</label>
                    <input type="text" class="form-control" value="{{$subscription->month_price}}" name="month_price" id="exampleInputPlaceholder" placeholder="Enter Month Price">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPlaceholder" class="form-label">Years Price</label>
                    <input type="text" class="form-control" value="{{$subscription->years_price}}" name="years_price" id="exampleInputPlaceholder" placeholder="Enter Years Price">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPlaceholder" class="form-label">People Per Event</label>
                    <input type="text" class="form-control" value="{{$subscription->people}}" name="people" id="exampleInputPlaceholder" placeholder="Enter People Per Event">
                </div>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       
                <div class="mb-3">
                    <label for="exampleInputPlaceholder" class="form-label">Unlimited Event</label>
                    <input type="text" class="form-control" value="{{$subscription->unlimited_event}}" name="unlimited_event" id="exampleInputPlaceholder" placeholder="Enter Unlimited Event">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPlaceholder" class="form-label">Add Chatroom</label>
                    <input type="text" class="form-control" value="{{$subscription->add_chatroom}}" name="add_chatroom" id="exampleInputPlaceholder" placeholder="Enter Add Chatroom">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPlaceholder" class="form-label">Add Up To Guests</label>
                    <input type="text" class="form-control" value="{{$subscription->add_up_to_guests}}" name="add_up_to_guests" id="exampleInputPlaceholder" placeholder="Enter Add Up To Guests">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPlaceholder" class="form-label">Access To All Current</label>
                    <input type="text" class="form-control" value="{{$subscription->access_to_all_current}}" name="access_to_all_current" id="exampleInputPlaceholder" placeholder="Enter Access To All Current">
                </div>
            @else
                <div class="mb-3">
                    <label for="exampleInputPlaceholder" class="form-label">Main Title</label>
                    <input type="text" class="form-control" value="{{$subscription->main_title}}" name="main_title" id="exampleInputPlaceholder" placeholder="Enter Main Title">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPlaceholder" class="form-label">Month Price</label>
                    <input type="text" class="form-control" value="{{$subscription->month_price}}" name="month_price" id="exampleInputPlaceholder" placeholder="Enter Month Price">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPlaceholder" class="form-label">Years Price</label>
                    <input type="text" class="form-control" value="{{$subscription->years_price}}" name="years_price" id="exampleInputPlaceholder" placeholder="Enter Years Price">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPlaceholder" class="form-label">People Per Event</label>
                    <input type="text" class="form-control" value="{{$subscription->people}}" name="people" id="exampleInputPlaceholder" placeholder="Enter People Per Event">
                </div>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       
                <div class="mb-3">
                    <label for="exampleInputPlaceholder" class="form-label">Unlimited Event</label>
                    <input type="text" class="form-control" value="{{$subscription->unlimited_event}}" name="unlimited_event" id="exampleInputPlaceholder" placeholder="Enter Unlimited Event">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPlaceholder" class="form-label">Add Chatroom</label>
                    <input type="text" class="form-control" value="{{$subscription->add_chatroom}}" name="add_chatroom" id="exampleInputPlaceholder" placeholder="Enter Add Chatroom">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPlaceholder" class="form-label">Access To All Current</label>
                    <input type="text" class="form-control" value="{{$subscription->access_to_all_current}}" name="access_to_all_current" id="exampleInputPlaceholder" placeholder="Enter Access To All Current">
                </div>
            @endif
            <button class="btn btn-primary" type="submit">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
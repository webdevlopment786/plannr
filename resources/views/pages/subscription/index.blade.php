@extends('layout.master')

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Subscription</a></li>
    <li class="breadcrumb-item active" aria-current="page">Subscription Pricing</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12">
    <h2 class="text-center mb-3 mt-4">Subscription A Plan</h2>
    <p class="text-muted text-center mb-4 pb-2"></p>
    <div class="container">  
      <div class="row">
        <div class="col-md-4 stretch-card grid-margin grid-margin-md-0">
          <div class="card">
            <div class="card-body">
              @foreach($subscriptions as $subscription)
              @if($subscription->id == 1)
              <h4 class="text-center mt-3 mb-4">{{$subscription->main_title}}</h4>
              <i data-feather="award" class="text-primary icon-xxl d-block mx-auto my-3"></i>
              <h1 class="text-center">${{$subscription->month_price}}</h1>
              <p class="text-muted text-center mb-4 fw-light">per month</p>
              <table class="mx-auto">
                <tr>
                  <td><i data-feather="check" class="icon-md text-primary me-2"></i></td>
                  <td><h5>{{$subscription->people}} People Max Per Event</h5></td>
                </tr>
                <tr>
                  <td><i data-feather="check" class="icon-md text-primary me-2"></i></td>
                  <td><h5>{{$subscription->unlimited_event}}</h5></td>
                </tr>
                <tr>
                  <td><i data-feather="check" class="icon-md text-primary me-2"></i></td>
                  <td><h5>{{$subscription->add_chatroom}}</h5></td>
                </tr>
                <tr>
                  <td><i data-feather="check" class="icon-md text-primary me-2"></i></td>
                  <td><h5>{{$subscription->add_up_to_guests}}</h5></td>
                </tr>
  
              </table>
              <div class="d-grid">
                  <a class="btn btn-success mt-4" href="{{url('subscription-edit/'.$subscription->id)}}">Edit</a>
              </div>
              @endif
              @endforeach
            </div>
          </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin grid-margin-md-0">
          <div class="card">
            <div class="card-body">
              @foreach($subscriptions as $subscription)
                @if($subscription->id == 2)
                <h4 class="text-center mt-3 mb-4">{{$subscription->main_title}}</h4>
                <i data-feather="award" class="text-primary icon-xxl d-block mx-auto my-3"></i>
                <h1 class="text-center">${{$subscription->month_price}}</h1>
                <p class="text-muted text-center mb-4 fw-light">per month</p>
                <table class="mx-auto">
                  <tr>
                    <td><i data-feather="check" class="icon-md text-primary me-2"></i></td>
                    <td><h5>{{$subscription->people}} People Max Per Event</h5></td>
                  </tr>
                  <tr>
                    <td><i data-feather="check" class="icon-md text-primary me-2"></i></td>
                    <td><h5>{{$subscription->unlimited_event}}</h5></td>
                  </tr>
                  <tr>
                    <td><i data-feather="check" class="icon-md text-primary me-2"></i></td>
                    <td><h5>{{$subscription->access_to_all_current}}</h5></td>
                  </tr>
                  
                  <tr>
                    <td><i data-feather="check" class="icon-md text-primary me-2"></i></td>
                    <td><h5>{{$subscription->add_chatroom}}</h5></td>
                  </tr>
                  <tr>
                    <td><i data-feather="check" class="icon-md text-primary me-2"></i></td>
                    <td><h5>{{$subscription->add_up_to_guests}}</h5></td>
                  </tr>
                </table>
                <div class="d-grid">
                    <a class="btn btn-success mt-4" href="{{url('subscription-edit/'.$subscription->id)}}">Edit</a>                    
                </div>
                @endif
                @endforeach
            </div>
          </div>
        </div>
        <div class="col-md-4 stretch-card">
          <div class="card">
            <div class="card-body">
              @foreach($subscriptions as $subscription)
              @if($subscription->id == 3)
                <h4 class="text-center mt-3 mb-4">{{$subscription->main_title}}</h4>
                <i data-feather="award" class="text-primary icon-xxl d-block mx-auto my-3"></i>
                <div class="price-month">
                  <h3 class="text-center">${{$subscription->month_price}}</h3>
                  <p class="text-muted text-center mb-2 fw-light">Per Month</p>
                  <h3 class="text-center">${{$subscription->years_price}}</h3>
                  <p class="text-muted text-center mb-2 fw-light">Per Years</p>
                </div>
                <table class="mx-auto">
                  <tr>
                    <td><i data-feather="check" class="icon-md text-primary me-2"></i></td>
                    <td><h5>{{$subscription->people}} People Max Per Event</h5></td>
                  </tr>
                  <tr>
                    <td><i data-feather="check" class="icon-md text-primary me-2"></i></td>
                    <td><h5>{{$subscription->unlimited_event}}</h5></td>
                  </tr>
                  <tr>
                    <td><i data-feather="check" class="icon-md text-primary me-2"></i></td>
                    <td><h5>{{$subscription->add_chatroom}}</h5></td>
                  </tr>
                  <tr>
                    <td><i data-feather="check" class="icon-md text-primary me-2"></i></td>
                    <td><h5>{{$subscription->access_to_all_current}}</h5></td>
                  </tr>
                </table>
                <div class="d-grid">
                    <a class="btn btn-success mt-4" href="{{url('subscription-edit/'.$subscription->id)}}">Edit</a>
                </div>
                @endif
                @endforeach
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection
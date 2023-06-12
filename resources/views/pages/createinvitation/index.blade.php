@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush
<style>
    h6.add-category {
    text-align: right;
}
.table td img {
        width: 100px !important;
        height: 70px !important;
        border-radius: 0 !important;
   }
   .category-image.show{
    margin-top: 16px; 
   }
   .modal-xl {
    --bs-modal-width: 1600px !important;
  }
</style>
@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Create Invition</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create Invition List</li>
  </ol>
</nav>
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h6 class="card-title">Create Invition List</h6>
            </div>
            <!-- <div class="col-sm-12 col-md-6 ">
              <button type="button" class="btn btn-primary" style="float: right; margin-bottom: 10px;" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Banner</button>
            </div> -->
        </div>
        @foreach($createinvitions as $createinvition)
        <div class="modal fade" id="exampleModalToggle-{{$createinvition->id}}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">Create Invition List</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>Product_id</th>
                <th>Name OF Event</th>
                <th>Event Date</th>
                <th>Event Time</th>
                <th>Time Zone</th>
                <th>Hosted By</th>
                <th>Location</th>
                <th>Host Phone Number</th> 
              </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$createinvition->product_id}}</td>
                    <td>{{$createinvition->name}}</td>
                    <td>{{$createinvition->time}}</td>
                    <td>{{$createinvition->date}}</td>
                    <td>{{$createinvition->zone}}</td>
                    <td>{{$createinvition->hosted_by}}</td>
                    <td>{{$createinvition->location}}</td>
                    <td>{{$createinvition->phone}}</td>
                <tr>
            </tbody>
          </table>
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
               <th>Message</th>
                <th>Types OF event</th>
                <th>Dress Code </th>
                <th>Food Beverages</th>
                <th>Additione information</th>
                <th>Add Additional Admin /
                  <br>Event Organizer</th>
                <th>Add Chat Room</th>
                <th>Invite More Than 2 People</th>
              </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$createinvition->message}}</td>
                    <td>{{$createinvition->type_events}}</td>
                    <td>{{$createinvition->dress_code}}</td>
                    <td>{{$createinvition->food}}</td>
                    <td>{{$createinvition->add_info}}</td>
                    <td>{{$createinvition->add_admin}}</td>
                    <td>{{$createinvition->add_chat_room}}</td>
                    <td>{{$createinvition->invite_more}}</td>
                <tr>
            </tbody>
          </table>
            </div>
            </div>
        </div>
        </div>
        @endforeach
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>Product_id</th>
                <th>Name OF Event</th>
                <th>Event Time</th>
                <th>Event Date</th>
                <th>Time Zone</th>
                <th>Hosted By</th>
                <th>Location</th>
                <th>Active</th>
              </tr>
            </thead>
            <tbody>
                @foreach($createinvitions as $createinvition)
                    <tr>
                        <td>{{$createinvition->product_id}}</td>
                        <td>{{$createinvition->name}}</td>
                        <td>{{$createinvition->time}}</td>
                        <td>{{$createinvition->date}}</td>
                        <td>{{$createinvition->zone}}</td>
                        <td>{{$createinvition->hosted_by}}</td>
                        <td>{{$createinvition->location}}</td>
                        <td><a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle-{{$createinvition->id}}" role="button">View More</a></td>
                    <tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection


@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush

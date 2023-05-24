@extends('layout.master')
@section('content')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">User Edit</h6>
        <form action="{{url('user-update/'.$users->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleInputPlaceholder" class="form-label">First Name</label>
                <input type="text" class="form-control" value="{{$users->first_name}}" name="first_name"  placeholder="Enter First Name">
                @if ($errors->has('first_name'))
                  <span class="text-danger">{{ $errors->first('first_name') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="exampleInputPlaceholder" class="form-label">Last Name</label>
                <input type="text" class="form-control" value="{{$users->last_name}}" name="last_name" placeholder="Enter Last Name">
                @if ($errors->has('last_name'))
                  <span class="text-danger">{{ $errors->first('last_name') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="exampleInputPlaceholder" class="form-label">Phone Number</label>
                <input type="number" class="form-control" value="{{$users->phone_number}}" value="{{$users->first_name}}" name="phone_number" placeholder="Enter Phone Number">
                @if ($errors->has('phone_number'))
                  <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="exampleInputPlaceholder" class="form-label">Email</label>
                <input type="email" class="form-control" value="{{$users->email}}" name="email" placeholder="Enter Email">
                @if ($errors->has('email'))
                  <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="exampleInputPlaceholder" class="form-label">Change Password</label>
                <input type="text" class="form-control" value="" name="password" placeholder="Enter Password">
                @if ($errors->has('password'))
                  <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="exampleFormControlSelect1" class="form-label">Status</label>
                <select class="form-select" value="{{$users->first_name}}" name="status" id="exampleFormControlSelect1">
                @if ($errors->has('status'))
                  <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                option selected disabled>Select your Status</option>
                    <option value="1" @if($users->status == old('status','1')) selected="selected" @endif> Active</option>
                    <option value="0" @if($users->status == old('status','0')) selected="selected" @endif> Inactive</option>
                </select>
            </div>
          <button class="btn btn-primary" type="submit">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
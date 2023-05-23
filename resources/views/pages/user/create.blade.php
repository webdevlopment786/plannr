@extends('layout.master')
@section('content')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Category Listing Add</h6>
        <form action="{{route('category.listing.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleInputPlaceholder" class="form-label">First Name</label>
                <input type="text" class="form-control" name="first_name"  placeholder="Enter First Name">
            </div>

            <div class="mb-3">
                <label for="exampleInputPlaceholder" class="form-label">Last Name</label>
                <input type="text" class="form-control" name="last_name" placeholder="Enter Last Name">
            </div>
            
            <div class="mb-3">
                <label class="form-label" for="formFile">File upload</label>
                <input class="form-control" name="image" type="file" id="formFile">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlSelect1" class="form-label">Status</label>
                <select class="form-select" name="status" id="exampleFormControlSelect1">
                    <option selected disabled>Select your Status</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
          <button class="btn btn-primary" type="submit">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
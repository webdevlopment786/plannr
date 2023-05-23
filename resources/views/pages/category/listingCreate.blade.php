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
                <label for="exampleFormControlSelect1" class="form-label">Category Name</label>
                <select class="form-select" name="category_id" id="exampleFormControlSelect1">
                    <option selected disabled>Select your Category</option>
                    @foreach($categorys as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="exampleInputPlaceholder" class="form-label">Free Or Premium</label>
                <input type="text" class="form-control" name="free_or_premium" id="exampleInputPlaceholder" placeholder="Free Or Premium">
            </div>

            <div class="mb-3">
                <label for="exampleInputPlaceholder" class="form-label">Third Field</label>
                <input type="text" class="form-control" name="third_field_text" id="exampleInputPlaceholder" placeholder="Third Field">
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
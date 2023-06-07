@extends('layout.master')
<style>
    img.category-image {
        margin-top: 14px;
        width: 110px;
        height: 70px;
    }
</style>
@section('content')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Category Listing Edit</h6>
        <form action="{{url('category-listing-update/'.$categorysListing->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlSelect1" class="form-label">Category Name</label>
                <select class="form-select" name="category_id" id="exampleFormControlSelect1">
                    <option selected disabled>Select your Category</option>
                    @foreach($categorys as $category)
                        <option value="{{$category->id}}" {{ $category->id == $categorysListing->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputPlaceholder" class="form-label">Product Title</label>
                <input type="text" class="form-control" value="{{$categorysListing->product_title}}" name="product_title" id="exampleInputPlaceholder" placeholder="Enter Product Title">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlSelect1" class="form-label">Color</label>
                <select class="form-select" name="color_id" id="exampleFormControlSelect1">
                    <option selected disabled>Select Your Color</option>
                    @foreach($colors as $color)
                        <option value="{{$color->id}}" {{ $color->id == $categorysListing->color_id ? 'selected' : '' }}>{{ $color->color_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputPlaceholder" class="form-label">Free Or Premium</label>
                <select class="form-select" name="free_or_premium" id="exampleFormControlSelect1">
                    <option selected disabled>Please Select</option>
                    <option value="0" @if($categorysListing->free_or_premium == old('free_or_premium','0')) selected="selected" @endif> Free</option>
                    <option value="1" @if($categorysListing->free_or_premium == old('free_or_premium','1')) selected="selected" @endif> Premium</option>
                </select>
            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col-md-10">
                        <label class="form-label" for="formFile">File upload</label>
                        <input class="form-control" name="image" value="{{$categorysListing->image}}" type="file">
                    </div>
                    <div class="col-md-2">
                    <img class="category-image" src="{{ asset('images/product/'.$categorysListing->image) }}" alt="tag" height="60px" width="60px">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlSelect1" class="form-label">Show Home Screen</label>
                <select class="form-select" name="home_screen" id="exampleFormControlSelect1">
                    <option selected disabled>Please Select</option>
                    <option value="1" @if($categorysListing->home_screen == old('home_screen','1')) selected="selected" @endif>Yes</option>
                    <option value="0" @if($categorysListing->home_screen == old('home_screen','0')) selected="selected" @endif>No</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlSelect1" class="form-label">Status</label>
                <select class="form-select" name="status" id="exampleFormControlSelect1">
                    <option selected disabled>Select your Status</option>
                    <option value="1" @if($categorysListing->status == old('status','1')) selected="selected" @endif> Active</option>
                    <option value="0" @if($categorysListing->status == old('status','0')) selected="selected" @endif> Inactive</option>
                </select>
            </div>
          <button class="btn btn-primary" type="submit">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
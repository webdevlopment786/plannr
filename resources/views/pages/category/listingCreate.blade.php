@extends('layout.master')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@section('content')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Product Add</h6>
        <form action="{{route('category.listing.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlSelect1" class="form-label">Category Name</label>
                <span id="value"></span>
                <select class="form-select language" name="category_id" id="exampleFormControlSelect1">
                    <option selected disabled>Select your Category</option>
                    @foreach($categorys as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputPlaceholder" class="form-label">Product Title</label>
                <input type="text" class="form-control" name="product_title" id="exampleInputPlaceholder" placeholder="Enter Product Title">
                @if ($errors->has('product_title'))
                  <span class="text-danger">{{ $errors->first('product_title') }}</span>
                @endif
            </div>

            <div class="mb-3">
                <label for="exampleFormControlSelect1" class="form-label">Color</label>
                <select class="form-select" name="color_id" id="exampleFormControlSelect1">
                    <option selected disabled>Select Your Color</option>
                    @foreach($color as $colors)
                        <option value="{{$colors->id}}">{{$colors->color_name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="exampleInputPlaceholder" class="form-label">Free Or Premium</label>
                <select class="form-select" name="free_or_premium" id="exampleFormControlSelect1">
                    <option selected disabled>Please Select</option>
                    <option value="0">Free</option>
                    <option value="1">Premium</option>
                </select>
            </div> 
            <div class="mb-3">
                <label class="form-label" for="formFile">File upload</label>
                <input class="form-control" name="image" type="file" id="formFile">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlSelect1" class="form-label">Show Home Screen</label>
                <select class="form-select" name="home_screen" id="exampleFormControlSelect1">
                    <option selected disabled>Please Select</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlSelect1" class="form-label">Status</label>
                <select class="form-select" name="status" id="exampleFormControlSelect1">
                    <option selected disabled>Select your Status</option>
                    <option value="1">Active</option>
                    <option value="0">Block</option>
                </select>
            </div>
          <button class="btn btn-primary" type="submit">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    jQuery('body').on('change','.language',()=>{
        const text = jQuery('.language').find(":selected").text();
        var value = jQuery('.language option:selected').val();
        var _t = $('input[name="_token"]').val();
        jQuery('#value').html(text);
        jQuery.ajax({
            url:"{{ url('category-listing-create') }}",
            method: "POST",
            dataType: 'JSON',
            data:{value:value, _token: '{{csrf_token()}}'},
            success:function(data){
                console.log('data',data);
                },
            error: function (data) {
            console.log('fdsbfdshjfbdshjfdshjfb',data);
            }
            });   
    });
</script>
@endsection

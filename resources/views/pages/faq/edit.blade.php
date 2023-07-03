@extends('layout.master')
@section('content')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">FAQ Edit</h6>
        <form action="{{url('faq-update/'.$faq->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleInputPlaceholder" class="form-label">Title</label>
                <input type="text" class="form-control" value="{{$faq->title}}" name="title"  placeholder="Please Enter Title">
                @if ($errors->has('title'))
                  <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
            </div>

            <div class="mb-3">
                <label for="exampleInputPlaceholder" class="form-label">Description</label>
                <textarea id="maxlength-textarea" name="description" class="form-control" id="defaultconfig-4" maxlength="2000" rows="8" placeholder="Please Enter Your Description">{{$faq->description}}</textarea>
                @if ($errors->has('description'))
                  <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
            </div>

            <div class="mb-3">
                <label for="exampleFormControlSelect1" class="form-label">Status</label>
                <select class="form-select" value="{{$faq->status}}" name="status" id="exampleFormControlSelect1">
                @if ($errors->has('status'))
                  <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                option selected disabled>Select your Status</option>
                    <option value="1" @if($faq->status == old('status','1')) selected="selected" @endif> Active</option>
                    <option value="0" @if($faq->status == old('status','0')) selected="selected" @endif> Block</option>
                </select>
            </div>
          <button class="btn btn-primary" type="submit">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
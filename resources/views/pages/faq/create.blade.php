@extends('layout.master')
@section('content')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">FAQ Add</h6>
        <form action="{{route('faq.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleInputPlaceholder" class="form-label">Title</label>
                <input type="text" class="form-control" name="title"  placeholder="Please Enter Title">
                @if ($errors->has('title'))
                  <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
            </div>

            <div class="mb-3">
                <label for="exampleInputPlaceholder" class="form-label">Description</label>
                <textarea id="maxlength-textarea" name="description" class="form-control" id="defaultconfig-4" maxlength="2000" rows="8" placeholder="Please Enter Your Description"></textarea>
                @if ($errors->has('description'))
                  <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
            </div>

            <div class="mb-3">
                <label for="exampleFormControlSelect1" class="form-label">Status</label>
                <select class="form-select" name="status" id="exampleFormControlSelect1">
                    <option value="1">Active</option>
                    <option value="0">Block</option>
                </select>
                @if ($errors->has('status'))
                  <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
            </div>
          <button class="btn btn-primary" type="submit">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
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
</style>
@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Banner</a></li>
    <li class="breadcrumb-item active" aria-current="page">Banner List</li>
  </ol>
</nav>
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h6 class="card-title">Banner List</h6>
            </div>
            <div class="col-sm-12 col-md-6 ">
              <button type="button" class="btn btn-primary" style="float: right; margin-bottom: 10px;" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Banner</button>
            </div>
        </div>
        <!-- Add Banner Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Banner Add</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form class="forms-sample" action="{{route('banner.store')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="modal-body">
                  <div class="mb-3">
                    <label class="form-label" for="formFile">File upload</label>
                    <input class="form-control" name="banner_image" type="file" id="formFile">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Status</label>
                    <select class="form-select" name="status" id="status">
                    <option selected disabled>Status</option>
                    <option value="1">Active</option>
                    <option value="0">Block</option>
                  </select>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
              </form>
            </div>
          </div>
        </div>


         <!-- Edit Banner Modal -->
        @foreach($banners as $banner)
            <div class="modal fade" id="exampleModaledit{{$banner->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Banner Update</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="forms-sample" action="{{route('banner.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                    <div class="row">
                        <div class="col-md-10">
                            <label class="form-label" for="formFile">File upload</label>
                                <input type="hidden" name="banner_id" value="{{$banner->id}}">
                                <input class="form-control" name="banner_image" value="{{$banner->banner}}" id="formFile" type="file">
                            </div>
                            <div class="col-md-2">
                            <img class="category-image show" src="{{ asset('images/banner/'.$banner->banner) }}" alt="tag" height="60px" width="60px">
                            </div>
                    </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Status</label>
                        <select class="form-select" value="{{$banner->status}}" name="status" id="status">
                        <option value="1" @if($banner->status == old('status','1')) selected="selected" @endif>Active</option>
                        <option value="0" @if($banner->status == old('status','0')) selected="selected" @endif>Block</option>
                    </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                </form>
                </div>
                </div>
            </div>
        @endforeach
        
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>Banner Image</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach($banners as $banner)
                    <tr>
                        <td><img class="category-image" src="{{ asset('images/banner/'.$banner->banner) }}" alt="tag" height="30px" width="30px"></td>
                        <td>
                            @if($banner->status == 1)
                                Active
                            @else
                                Block
                            @endif
                        </td>
                        <td>
                        <a href="#" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#exampleModaledit{{$banner->id}}">Edit</a>
                        <a href="{{url('banner-delete/'.$banner->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
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

@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush
<style>
    h6.add-category {
    text-align: right;
}
/* .hideform {
    display: none;
}
.center {
    margin: auto;
    width: 60%;
    padding: 20px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
} */
</style>
@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Category</a></li>
    <li class="breadcrumb-item active" aria-current="page">Category List</li>
  </ol>
</nav>
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h6 class="card-title">Category List</h6>
            </div>
            <div class="col-sm-12 col-md-6 ">
              <button type="button" class="btn btn-primary" style="float: right; margin-bottom: 10px;" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Category</button>
            </div>
        </div>
        <!-- Add Category Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Category Add</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form class="forms-sample" action="{{route('category.store')}}" method="post">
              @csrf
              <div class="modal-body">
                  <div class="mb-3">
                    <label for="exampleInputUsername1" class="form-label">Category Name</label>
                    <input type="text" class="form-control" name="name" id="category_name" autocomplete="off" placeholder="Category Name">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Status</label>
                    <select class="form-select" name="status" id="status">
                    <option selected disabled>Status</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
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

         <!-- Edit Category Modal -->
         @foreach($categorys as $category)
         <div class="modal fade" id="exampleModaledit{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Category Add</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form class="forms-sample" action="{{route('category.update')}}" method="post">
              @csrf
              <div class="modal-body">
                  <div class="mb-3">
                    <label for="exampleInputUsername1" class="form-label">Category Name</label>
                    <input type="hidden" name="category_id" value="{{$category->id}}">
                    <input type="text" class="form-control" name="name" value="{{$category->name}}" id="category_name" autocomplete="off" placeholder="Category Name Edit">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Status</label>
                    <select class="form-select" value="{{$category->status}}" name="status" id="status">
                    <option value="1" @if($category->status == old('status','1')) selected="selected" @endif>Active</option>
                    <option value="0" @if($category->status == old('status','0')) selected="selected" @endif>Inactive</option>
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
        @endforeach
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>Category Name</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach($categorys as $category)
                  <tr>
                    <td>{{ $category->name }}</td>
                    <td>
                        @if($category->status == 1)
                          Active
                        @else
                          Inactive
                        @endif
                    </td>
                    <td>
                    <!-- <button type="button" class="btn btn-primary" style="float: right; margin-bottom: 10px;">Add Category</button> -->
                      <a href="#" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#exampleModaledit{{ $category->id }}">Edit</a>
                      <a href="{{ url('category-delete',$category->id) }}" class="btn btn-sm btn-danger">Delete</a>
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
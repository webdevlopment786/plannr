@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush
<style>
   .table td img {
        width: 100px !important;
        height: 70px !important;
        border-radius: 0 !important;
   }
</style>
@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Product</a></li>
    <li class="breadcrumb-item active" aria-current="page">Product List</li>
  </ol>
</nav>
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h6 class="card-title">Product List</h6>
            </div>
            <div class="col-sm-12 col-md-6 ">
                <a href="{{Route('category.listing.create')}}"><button type="button" class="btn btn-primary" 
                    style="float: right; margin-bottom: 10px;">Add Product</button>
                </a>
            </div>
        </div>
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>Category Name</th>
                <th>Product Title</th>
                <th>Image</th>
                <th>Color</th>
                <th>Free Or Premium</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach($categoryListings as $categoryListing)
                    <tr>
                        <td>
                            @foreach($categorys as $category)
                                @if($category->id == $categoryListing->category_id)
                                {{$category->name}}
                                @endif
                            @endforeach
                        </td>
                        <td>{{$categoryListing->product_title}}</td>
                        <td><img class="category-image" src="{{ asset('images/'.$categoryListing->image) }}" alt="tag" height="30px" width="30px"></td>
                        <td>
                            @foreach($colors as $color)
                                @if($color->id == $categoryListing->color_id)
                                {{$color->color_name}}
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @if($categoryListing->free_or_premium == 1)
                                Premium
                            @else
                                Free
                            @endif
                        </td>
                        <td>
                            @if($categoryListing->status == 1)
                                Active
                            @else
                                Inactive
                            @endif
                        </td>
                        <td>
                            <a href="{{url('category-listing-edit/'.$categoryListing->id)}}" class="btn btn-sm btn-info">Edit</a>
                            <a href="{{url('category-listing-delete/'.$categoryListing->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</a>
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

@extends('layout.master')

@push('plugin-styles')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
  <link media="screen" rel="stylesheet" href='https://cdn.jsdelivr.net/sweetalert2/6.3.8/sweetalert2.css' />
  <link media="screen" rel="stylesheet" href='https://cdn.jsdelivr.net/sweetalert2/6.3.8/sweetalert2.min.css' />
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
    <li class="breadcrumb-item"><a href="#">Categories</a></li>
    <li class="breadcrumb-item active" aria-current="page">Categories List</li>
  </ol>
</nav>
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h6 class="card-title">Categories List</h6>
            </div>
            <div class="col-sm-12 col-md-6 ">
              <button type="button" class="btn btn-primary" style="float: right; margin-bottom: 10px;" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Categories</button>
            </div>
        </div>
        <!-- Add Category Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Categories Add</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form class="forms-sample" action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="modal-body">
                  <div class="mb-3">
                    <label for="exampleInputUsername1" class="form-label">Categories Name</label>
                    <input type="text" class="form-control" name="name" id="category_name" autocomplete="off" placeholder="Categories Name">
                    @if ($errors->has('name'))
                      <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="formFile">File upload</label>
                    <input class="form-control" name="image" type="file" id="formFile">
                    @if ($errors->has('image'))
                      <span class="text-danger">{{ $errors->first('image') }}</span>
                    @endif
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlSelect1" class="form-label">Show Home Screen</label>
                    <select class="form-select" name="home_screen" id="exampleFormControlSelect1">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                    @if ($errors->has('home_screen'))
                      <span class="text-danger">{{ $errors->first('home_screen') }}</span>
                    @endif
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Status</label>
                    <select class="form-select" name="status" id="status">
                    <option value="1">Active</option>
                    <option value="0">Block</option>
                  </select>
                    @if ($errors->has('status'))
                      <span class="text-danger">{{ $errors->first('status') }}</span>
                    @endif
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Categories Update</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form class="forms-sample" action="{{route('category.update')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="modal-body">
                  <div class="mb-3">
                    <label for="exampleInputUsername1" class="form-label">Categories Name</label>
                    <input type="hidden" name="category_id" value="{{$category->id}}">
                    <input type="text" class="form-control" name="name" value="{{$category->name}}" id="category_name" autocomplete="off" placeholder="Category Name Edit">
                    @if ($errors->has('name'))
                      <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                  </div>
                  <div class="mb-3">
                    <div class="row">
                      <div class="col-md-10">
                          <label class="form-label" for="formFile">File upload</label>
                              <input class="form-control" name="image" value="{{$category->image}}" id="formFile" type="file">
                              @if ($errors->has('image'))
                                <span class="text-danger">{{ $errors->first('image') }}</span>
                              @endif
                          </div>
                          <div class="col-md-2">
                          <img class="category-image show" src="{{ asset('images/category/'.$category->image) }}" alt="tag" height="60px" width="60px">
                          </div>
                    </div>
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlSelect1" class="form-label">Show Home Screen</label>
                    <select class="form-select" name="home_screen" id="exampleFormControlSelect1">
                        <option selected disabled>Please Select</option>
                        <option value="1" @if($category->home_screen == old('home_screen','1')) selected="selected" @endif>Yes</option>
                        <option value="0" @if($category->home_screen == old('home_screen','0')) selected="selected" @endif>No</option>
                    </select>
                    @if ($errors->has('home_screen'))
                      <span class="text-danger">{{ $errors->first('home_screen') }}</span>
                    @endif
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Status</label>
                    <select class="form-select" value="{{$category->status}}" name="status" id="status">
                      <option value="1" @if($category->status == old('status','1')) selected="selected" @endif>Active</option>
                      <option value="0" @if($category->status == old('status','0')) selected="selected" @endif>Inactive</option>
                    </select>
                    @if ($errors->has('status'))
                      <span class="text-danger">{{ $errors->first('status') }}</span>
                    @endif
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
          <button style="margin-bottom: 10px" class="btn btn-primary delete_all">Delete All Selected</button>
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th width="50px"><input type="checkbox" id="master"></th>
                <th>Categories Name</th>
                <th>Image</th>
                <th>Show Home Screen</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody id="tablecontents">
                @foreach($categorys as $category)
                    <tr class="row1" data-id="{{ $category->id }}">
                    <td><input type="checkbox" class="sub_chk" data-id="{{$category->id}}"></td>
                    <td>{{ $category->name }}</td>
                    <td><img class="category-image" src="{{ asset('images/category/'.$category->image) }}" alt="tag" height="30px" width="30px"></td>
                    <td>
                        @if($category->home_screen == 1)
                          Yes
                        @else
                          No
                        @endif
                    </td>
                    <td>
                        @if($category->status == 1)
                          Active
                        @else
                          Inactive
                        @endif
                    </td>
                    <td>
                      <a href="#" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#exampleModaledit{{ $category->id }}">Edit</a>
                      <form method="POST" action="{{ url('category-delete', $category->id) }}" style="display:inline-block;">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="btn btn-sm btn-danger show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
                      </form>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">

      $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });


      jQuery('#master').on('click', function(e) {
         if(jQuery(this).is(':checked',true))  
         {
          jQuery(".sub_chk").prop('checked', true);  
         } else {  
          jQuery(".sub_chk").prop('checked',false);  
         }  
        });


    $('.delete_all').on('click', function(e) {
    var allVals = [];  
    $(".sub_chk:checked").each(function() {  
        allVals.push($(this).attr('data-id'));
    });

    if(allVals.length <=0)  
    {  
        swal({
              title: `Please select row.`,
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })   
    }
    else 
    { 
      swal({
          title: "Are you sure?",
          text: "You will not be able to recover this imaginary file!",
          icon: "warning",
          buttons: [
            'No, cancel it!',
            'Yes, I am sure!'
          ],
          dangerMode: true,
        }).
        then(function(isConfirm) {
          if (isConfirm) {
            var join_selected_values = allVals.join(","); 
            $.ajax({
                url:'{{url("category-delete-all")}}',
                type: 'DELETE',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: 'ids='+join_selected_values,
                success: function (data) {
                  console.log('data',data);
                    if (data['success']) {
                        $(".sub_chk:checked").each(function() {  
                            $(this).parents("tr").remove();
                        });

                        swal({
                        title: "Categories Delete Successfully",
                        icon: "warning",
                        buttons: [
                          'OK, I am sure!'
                        ],
                        dangerMode: true,
                      })
                      location.reload();

                    } else if (data['error']) {
                        alert(data['error']);
                    } else {
                        alert('Whoops Something went wrong!!');
                    }
                },
                error: function (data) {
                    alert(data.responseText);
                }
            });
            $.each(allVals, function( index, value ) {
                $('table tr').filter("[data-row-id='" + value + "']").remove();
            });
          } else {
            location.reload();
          }
        });
      
      
    }  
  });

        

    jQuery(function () {
      jQuery( "#tablecontents" ).sortable({
          items: "tr",
          cursor: 'move',
          opacity: 0.6,
          update: function() {
              sendOrderToServer();
          }
        });

        function sendOrderToServer() {
          var order = [];
          var token = jQuery('meta[name="csrf-token"]').attr('content');
          jQuery('tr.row1').each(function(index,element) {
            order.push({
              id: jQuery(this).attr('data-id'),
              position: index+1
            });
          });

          jQuery.ajax({
            type: "POST", 
            dataType: "json", 
            url: "{{ url('category-sortabledatatable') }}",
                data: {
              order: order,
              _token: token
            },
            success: function(response) {
                if (response.status == "success") {
                  console.log(response);

                } else {
                  console.log(response);
                }
            }
          });
        }
      });     
</script>
  <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush




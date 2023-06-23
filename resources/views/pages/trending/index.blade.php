@extends('layout.master')

@push('plugin-styles')
  <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <li class="breadcrumb-item"><a href="#">Trending Banner</a></li>
    <li class="breadcrumb-item active" aria-current="page">Trending List</li>
  </ol>
</nav>
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h6 class="card-title">Trending List</h6>
            </div>
            <div class="col-sm-12 col-md-6 ">
              <button type="button" class="btn btn-primary" style="float: right; margin-bottom: 10px;" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Trending Banner</button>
            </div>
        </div>
        <!-- Add Banner Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Trending Banner</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form class="forms-sample" action="{{route('trending.store')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleInputUsername1" class="form-label">Title</label>
                        <input type="text" class="form-control" name="name" autocomplete="off" placeholder="Trending Name">
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

         <!-- Edit Banner Modal -->
        @foreach($trendings as $trending)
            <div class="modal fade" id="exampleModaledit{{$trending->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Trending Update</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="forms-sample" action="{{route('trending.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleInputUsername1" class="form-label">Title</label>
                        <input type="hidden" name="trending_id" value="{{$trending->id}}">
                        <input type="text" class="form-control" name="name" value="{{$trending->name}}" id="trending_name" autocomplete="off" placeholder="Trending Name">
                        @if ($errors->has('name'))
                          <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                      </div>
                    <div class="mb-3">
                    <div class="row">
                        <div class="col-md-10">
                            <label class="form-label" for="formFile">File upload</label>
                                <input type="hidden" name="trending_id" value="{{$trending->id}}">
                                <input class="form-control" name="image" value="{{$trending->banner}}" id="formFile" type="file">
                            </div>
                            <div class="col-md-2">
                            <img class="category-image show" src="{{ asset('images/banner/'.$trending->banner) }}" alt="tag" height="60px" width="60px">
                        </div>
                    </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Status</label>
                        <select class="form-select" value="{{$trending->status}}" name="status" id="status">
                        <option value="1" @if($trending->status == old('status','1')) selected="selected" @endif>Active</option>
                        <option value="0" @if($trending->status == old('status','0')) selected="selected" @endif>Block</option>
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
                <th>No</th>
                <th>Name</th>
                <th>Image</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach($trendings as $trending)
                    <tr>
                        <td><input type="checkbox" class="sub_chk" data-id="{{$trending->id}}"></td>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$trending->name}}</td>
                        <td><img class="category-image" src="{{ asset('images/banner/'.$trending->banner) }}" alt="tag" height="30px" width="30px"></td>
                        <td>
                            @if($trending->status == 1)
                                Active
                            @else
                                Block
                            @endif
                        </td>
                        <td>
                        <a href="#" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#exampleModaledit{{$trending->id}}">Edit</a>
                        <!-- <a href="{{url('trending-delete/'.$trending->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</a> -->
                        <form method="POST" action="{{ url('trending-delete', $trending->id) }}" style="display:inline-block;">
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
  <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
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
                  url:'{{url("trending-delete-all")}}',
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
                          title: "Banner Delete Successfully",
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
  </script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush

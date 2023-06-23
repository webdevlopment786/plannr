@extends('layout.master')

@push('plugin-styles')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">User</a></li>
    <li class="breadcrumb-item active" aria-current="page">User List</li>
  </ol>
</nav>
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h6 class="card-title">User List</h6>
            </div>
            <div class="col-sm-12 col-md-6 ">
              <a href="{{route('user.create')}}"> <button type="button" class="btn btn-primary" style="float: right; margin-bottom: 10px;">Add User</button></a>
            </div>
        </div>
        <button style="margin-bottom: 10px" class="btn btn-primary delete_all">Delete All Selected</button>
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th width="50px"><input type="checkbox" id="master"></th>
                <th>No</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                  <tr>
                    <td><input type="checkbox" class="sub_chk" data-id="{{$user->id}}"></td>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{$user->first_name}}</td>
                    <td>{{$user->last_name}}</td>
                    <td>{{$user->phone_number}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @if($user->status == 1)
                            Active
                        @else
                            Block
                        @endif
                    </td>
                    <td>
                      <a href="{{url('user-edit/'.$user->id)}}" class="btn btn-sm btn-info">Edit</a>
                      <form method="POST" action="{{ url('user-delete', $user->id) }}" style="display:inline-block;">
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
      if(jQuery(this).is(':checked',true)) {

          jQuery(".sub_chk").prop('checked', true);  
      } 
      else {  
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
      else { 

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
                  url:'{{url("user-delete-all")}}',
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

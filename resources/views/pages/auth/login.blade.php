@extends('layout.master2')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
<style>
  .auth-page .auth-side-wrapper {
    background-size: contain !important;
    background-repeat: no-repeat;
    background-position: center center;
}
.col-md-4.pe-md-0 {
    background: #fff;
}
.noble-ui-logo {
    color: #f1f2ff !important;
}
.toast.toast-error{
  background-color: red;
}
</style>
@section('content')
<div class="page-content d-flex align-items-center justify-content-center">
  <div class="row w-100 mx-0 auth-page">
    <div class="col-md-8 col-xl-6 mx-auto">
      <div class="card">
        <div class="row">
          <div class="col-md-4 pe-md-0">
            <div class="auth-side-wrapper new-logo"  style="background-image: url('{{ URL::asset('/assets/images/flags/logo.jpg') }}')">
            </div>
          </div>
          <div class="col-md-8 ps-md-0">
            <div class="auth-form-wrapper px-4 py-5">
              <a href="#" class="noble-ui-logo d-block mb-2">Pla<span>nner</span></a>
              <h5 class="text-muted fw-normal mb-4">Welcome back! Log in to your account.</h5>
              <form class="forms-sample" method="post" action="{{Route('login.post')}}">
                @csrf
                <div class="mb-3">
                  <label for="userEmail" class="form-label">Email address</label>
                  <input type="email" name="email" class="form-control" placeholder="Email">
                  @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                  @endif
                </div>
                <div class="mb-3">
                  <label for="userPassword" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" autocomplete="current-password" placeholder="Password">
                  @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                  @endif
                </div>
                <div class="form-check mb-3">
                  <input type="checkbox" class="form-check-input" id="authCheck">
                  <label class="form-check-label" for="authCheck">
                    Remember me
                  </label>
                </div>
                <div>
                  <!-- <a href="{{url('api/login/google')}}" class="btn btn-primary me-2 mb-2 mb-md-0">Google</a> -->
                  <button type="submit" class="btn btn-primary me-2 mb-2 mb-md-0">Login</button>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<script>
        $(document).ready(function() {
            toastr.options.timeOut = 10000;
            @if (Session::has('error'))
                toastr.error('{{ Session::get('error') }}');
            @elseif(Session::has('success'))
                toastr.success('{{ Session::get('success') }}');
            @endif
        });

    </script>
@endsection


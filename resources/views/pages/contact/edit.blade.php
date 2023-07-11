@extends('layout.master')
@push('plugin-styles')
<style>
        .tox-promotion {
    display: none;
}
body {
  color: white !important;
}
</style>
@endpush
@section('content')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Contact Us</h6>
        <form action="{{url('contact-update/'.$contact->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Contact Us</h4>
                        <textarea class="form-control" name="content" id="tinymceExample" rows="10">{{$contact->content}}</textarea>
                        @if ($errors->has('content'))
                          <span class="text-danger">{{ $errors->first('content') }}</span>
                        @endif
                    </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/ace-builds/ace.js') }}"></script>
  <script src="{{ asset('assets/plugins/ace-builds/theme-chaos.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/tinymce.js') }}"></script>
  <script src="{{ asset('assets/js/ace.js') }}"></script>
@endpush
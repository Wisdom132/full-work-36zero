@extends('cpanel.layouts.app')

@section('title', 'Edit Permission')
@section('header_css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.0.1/min/dropzone.min.css" rel="stylesheet" type="text/css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.0.1/min/basic.min.css" rel="stylesheet" type="text/css">
@endsection

@section('content')
@include('cpanel.inc.navbar')
@include('cpanel.inc.sidebar')

<!-- /.site-sidebar -->
<main class="main-wrapper clearfix">
 <!-- Page Title Area -->
 <div class="row page-title clearfix">
  <div class="page-title-left">
   <h5 class="mr-0 mr-r-5">Control Panel</h5>
 </div>
 <!-- /.page-title-left -->
 <div class="page-title-right d-none d-sm-inline-flex">
   <ol class="breadcrumb">
            {{-- <li class="breadcrumb-item"><a href="index.html">Dashboard</a>
            </li> --}}
            <li class="breadcrumb-item active">Edit Permission</li>
          </ol>
          <div class="d-none d-sm-inline-flex justify-center align-items-center"><a href="{{ route('permission.show') }}" class="btn btn-outline-primary mr-l-20 btn-sm btn-rounded hidden-xs hidden-sm ripple">Back</a>
          </div>
        </div>
        <!-- /.page-title-right -->
      </div>
      <!-- /.page-title -->
      <!-- =================================== -->
      <!-- Different data widgets ============ -->
      <!-- =================================== -->
      <div class="widget-list">
        <div class="row">
         <div class="col-md-12 widget-holder">
          <div class="widget-bg">
           <div class="widget-body clearfix">
            <h5 class="box-title mr-b-0">Edit Permission</h5>
            <form class="form-material" method="POST" action="{{ route('permission.update', $permissions->id) }}">
              @csrf
              {{ method_field('PUT') }}
              <div class="col-lg-6 widget-holder">
                <div class="widget-bg">
                 <div class="form-group">
                  <input name="name" class="form-control" id="l36" value="{{ $permissions->name}}" type="text">
                  <label for="l37">Name</label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 widget-holder">
               <div class="widget-bg">
                <div class="form-group">
                 <select name="for" class="form-control" value="{{ $permissions->for }}" id="l13">
                  <optgroup label="Default">
                   <option selected disable>Select Permissions For</option>
                   <option value="user">User</option>
                   <option value="post">Post</option>
                   <option value="other">Other</option>
                 </optgroup>
               </select>
               <label for="l38">Select Category</label>
             </div>
           </div>
         </div>
       </div>
       <div class="form-actions btn-list">
        <div class="col-lg-6 widget-holder">
         <div class="widget-bg">
          <div class="form-group">
            <button class="btn btn-primary" type="submit">Submit</button>
            <button class="btn btn-outline-default" type="button">Cancel</button>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
<!-- /.widget-body -->
</div>
<!-- /.widget-bg -->
</div>
<!-- /.widget-holder -->
</div>
<!-- /.row -->
</div>
<!-- /.widget-list -->
</main>
<!-- /.main-wrapper -->

@include('cpanel.footer')
@endsection
@section('footer_script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.6.4/tinymce.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.6.4/themes/inlite/theme.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.6.4/jquery.tinymce.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.0.1/min/dropzone.min.js"></script>
@endsection
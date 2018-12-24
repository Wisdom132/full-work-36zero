@extends('cpanel.layouts.app')

@section('title', 'Edit Role')
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
            <li class="breadcrumb-item active">Edit Role</li>
          </ol>
          <div class="d-none d-sm-inline-flex justify-center align-items-center"><a href="{{ route('role.show') }}" class="btn btn-outline-primary mr-l-20 btn-sm btn-rounded hidden-xs hidden-sm ripple">Back</a>
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
            <h5 class="box-title mr-b-0">Edit role</h5>
            <div style="padding-left: 15em;" class="widget-body clearfix">
              <form class="form-material" method="POST" action="{{ route('role.update', $roles->id) }}">
               @csrf
               {{ method_field('PUT')}}
               <div class="col-lg-8 widget-holder">
                <div class="widget-bg">
                 <div class="form-group">
                  <input name="name" class="form-control" id="l36" value="{{ $roles->role }}"  type="text">
                  <label for="l37">Name</label>
                </div>

                <div class="row">
                  <div class="col-lg-4">
                    <div class="form-group">
                      <h3 class="box-title mr-b-0">Post Permissions</h3>
                      @foreach ($permissions as $permission)
                      @if ($permission->for == 'post')
                      <div class="checkbox checkbox-circle checkbox-color-scheme">
                        <label>
                         <input name="permission[]" type="checkbox"  value="{{ $permission->id}}"
                         @foreach ($roles->permissions as $permit)
                         @if ($permit->id == $permission->id)
                         checked
                         @endif
                         @endforeach><span class="label-text">{{ $permission->name }} </span>
                       </label>
                     </div>
                     @endif
                     @endforeach
                   </div>
                 </div>


                 <div class="col-lg-4">
                  <div class="form-group">
                   <h3 class="box-title mr-b-0">User Permissions</h3>
                   @foreach ($permissions as $permission)
                   @if ($permission->for == 'user')
                   <div class="checkbox checkbox-circle checkbox-color-scheme">
                    <label>
                     <input name="permission[]" type="checkbox"  value="{{ $permission->id}}"
                     @foreach ($roles->permissions as $permit)
                     @if ($permit->id == $permission->id)
                     checked
                     @endif
                     @endforeach><span class="label-text">{{ $permission->name }} </span>
                   </label>
                 </div>
                 @endif
                 @endforeach
               </div>
             </div>

             <div class="col-lg-4">
              <div class="form-group">
                <h3 class="box-title mr-b-0">Other Permissions</h3>
                @foreach ($permissions as $permission)
                @if ($permission->for == 'other')
                <div class="checkbox checkbox-circle checkbox-color-scheme">
                  <label>
                   <input name="permission[]" type="checkbox"  value="{{ $permission->id}}"
                   @foreach ($roles->permissions as $permit)
                   @if ($permit->id == $permission->id)
                   checked
                   @endif
                   @endforeach><span class="label-text">{{ $permission->name }} </span>
                 </label>
               </div>
               @endif
               @endforeach
             </div>
           </div>
         </div>

         <div class="form-actions btn-list ">
          <button class="btn btn-primary" type="submit">Submit</button>
          <a href="{{ route('role.show') }}" class="btn btn-outline-default" type="button">Cancel</a>
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
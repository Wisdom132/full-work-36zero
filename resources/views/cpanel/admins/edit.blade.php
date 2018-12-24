@extends('cpanel.layouts.app')

@section('title', 'Edit Admin')
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
            <li class="breadcrumb-item active">Edit Admin</li>
          </ol>
          <div class="d-none d-sm-inline-flex justify-center align-items-center"><a href="{{ route('admin.index') }}" class="btn btn-outline-primary mr-l-20 btn-sm btn-rounded hidden-xs hidden-sm ripple">Back</a>
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
            <h5 class="box-title mr-b-0">Edit Admin</h5><br>
            <form class="form-material" method="POST" action="{{ route('admin.update', $admins->id) }}">
             @csrf
             {{ method_field('PUT')}}
             <div class="row">
              <div class="col-lg-6 ">

                <div class="form-group">
                 <input name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="l36" value="{{ $admins->name }}"   type="text">
                 <label for="l37">Name</label>

                 @if ($errors->has('name'))
                 <span class="invalid-feedback" role="alert">
                   <strong>{{ $errors->first('name') }}</strong>
                 </span>
                 @endif
               </div>
             </div>


             <div class="col-lg-6 ">
               <div class="form-group">
                <input name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="l37" value="{{ $admins->email }}" type="email">
                <label for="l37">Email</label>
                @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
              </div>
            </div>

              <div class="col-lg-6">
             <div class="form-group">
              <input name="phone_no" class="form-control{{ $errors->has('phone_no') ? ' is-invalid' : '' }}" id="l37" value="{{ $admins->phone_no }}" id="l37"  type="text">
              <label for="l37">Phone Number</label>
               @if ($errors->has('phone_no'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('phone_no') }}</strong>
                </span>
                @endif
            </div>
          </div>

          <div class="col-lg-6">
             <div class="form-group">
              <input name="state_of_origin" class="form-control{{ $errors->has('state_of_origin') ? ' is-invalid' : '' }}" id="l37" value="{{ $admins->state_of_origin }}" id="l37"  type="text">
              <label for="l37">Sate of Origin</label>
               @if ($errors->has('state_of_origin'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('state_of_origin') }}</strong>
                </span>
                @endif
            </div>
          </div>

            <div class="col-lg-6 ">
              <div class="form-group">
               <input name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="l37" placeholder="Leave it empty if you don't want to change your default password"  type="password" pattern=".{6,}"   title="6 characters minimum">
               <label for="l37">password</label>
               @if ($errors->has('password'))
               <span class="invalid-feedback" role="alert">
                 <strong>{{ $errors->first('password') }}</strong>
               </span>
               @endif
             </div>
           </div>

           <div class="col-lg-6">
             <div class="form-group">
              <input name="password_confirmation" class="form-control" id="l37"  type="password">
              <label for="l37">Confirm Password</label>
            </div>
          </div>

        
          
      </div>


          <div class="form-group" >
            <div class="col-ms-6">
            <label for="l37">Assign Role</label>
             <div class="checkbox checkbox-circle checkbox-color-scheme">
             @foreach ($roles as $role)
              <label><input name="roles[]" type="checkbox" value="{{$role->id}}" 
                @foreach ($admins->roles as $adminrole)
                  @if ($adminrole->id == $role->id)
                    checked
                  @endif
                @endforeach
                ><span class="label-text">{{ $role->role }}</span></label>&nbsp;
                                
              @endforeach                  
            </div>
          </div>
        </div>



      <div class="form-actions btn-list ">

       <button class="btn btn-primary" type="submit">Submit</button>
       <button class="btn btn-outline-default" type="button">Cancel</button>
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
<script type="text/javascript">
  setTimeout(
    function() { $(':password').val(""); },
    1000  //1,000 milliseconds = 1 second
);
</script>
@endsection
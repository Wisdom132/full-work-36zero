@extends('cpanel.layouts.app')
@section('title', 'Your profile')

@section('content')

@include('cpanel.inc.navbar')

@include('cpanel.inc.sidebar')

<main class="main-wrapper clearfix">
 <!-- /.page-title -->
 <!-- =================================== -->
 <!-- Different data widgets ============ -->
 <!-- =================================== -->
 <div class="widget-list">
    <div class="row">
        <!-- User Summary -->
        <div class="col-12 col-md-4 widget-holder">
            <div class="widget-bg">
                <div class="widget-body clearfix">
                    <div class="contact-info">
                        <header class="text-center">
                            <!-- /.dropdown -->
                            <div class="text-center">
                                <figure class="inline-block thumb-lg">
                                    <img src="{{url('uploads/'.Auth::user()->image)}}" class="rounded-circle img-thumbnail" alt="">
                                </figure>
                            </div>
                            <h4 class="mt-1"><a href="#">{{ $profile->name }}</a> <span class="badge text-uppercase badge-warning align-middle"></span></h4>      
                        </header>
                        <section class="padded-reverse">
                            <h7><i class="material-icons list-icon">trending_flat</i> <small class="float-right">Your Role Is: <strong>
                                @foreach ($profile->roles as $role)
                               {{ $role->role }},
                               @endforeach
                           </strong></small></h7> 
                       </section>
                   </div>
                   <!-- /.contact-info -->
               </div>
               <!-- /.widget-body -->
           </div>
           <!-- /.widget-bg -->
       </div>
       <!-- /.widget-holder -->
       <!-- Tabs Content -->
       <div class="col-12 col-md-8 widget-holder">
        <div class="widget-bg">
            <div class="widget-body clearfix">
                <div class="tabs mr-t-10">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a href="#profile-tab-bordered-1" class="nav-link active" data-toggle="tab" aria-expanded="true">View Profile</a>
                        </li>
                        <li class="nav-item"><a href="#edit-tab-bordered-1" class="nav-link" data-toggle="tab" aria-expanded="true">Edit Detail</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <!-- /.tab-pane -->
                        <div class="tab-pane active" id="profile-tab-bordered-1">
                            <div class="contact-details-profile pd-lr-30">
                                @include('messages')
                                <h4>Profile Details</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="text-muted text-uppercase">Name</h6>
                                        <p class="mr-t-0">{{ $profile->name}}</p>
                                    </div>
                                    <!-- /.col-md-6 -->
                                    <div class="col-md-6">
                                        <h6 class="text-muted text-uppercase">Email</h6>
                                        <p class="mr-t-0">{{ $profile->email }}</p>
                                    </div>
                                    <!-- /.col-md-6 -->
                                    <div class="col-md-6">
                                        <h6 class="text-muted text-uppercase">Phone Number</h6>
                                        <p class="mr-t-0">{{ $profile->phone_no }}</p>
                                    </div>
                                    <!-- /.col-md-6 -->
                                    <div class="col-md-6">
                                        <h6 class="text-muted text-uppercase">Sate of Origin</h6>
                                        <p class="mr-t-0">{{ $profile->state_of_origin  }}</p>
                                    </div>
                                    <!-- /.col-md-6 -->
                                </div>
                                <hr class="border-0 mr-tb-50">
                            </div>
                            <!-- /.contact-details-profile -->
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="edit-tab-bordered-1">
                            <form action="{{ route('profile.update', $profile->id) }}" method="POST" enctype="multipart/form-data" class="form-material pt-3">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="media align-items-center p-3 mb-4 bg-light-grey">
                                    <div class="d-flex mr-4 w-25 justify-content-end">
                                        <figure class="mb-0 thumb-md">
                                            <img src="{{url('uploads/'.Auth::user()->image)}}" class="img-thumbnail">
                                        </figure>
                                    </div>
                                    <!-- /.d-flex -->
                                    <div class="media-body w-75">
                                        <div class="form-group">
                                            <input type="file" value="{{$profile->image}}" name="image" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
                                            <label for="exampleInputFile">File input</label>
                                        </div>
                                    </div>
                                    <!-- /.media-body -->
                                </div>
                                <!-- /.media -->
                                <div class="form-group">
                                    <input type="text" name="name" value="{{ $profile->name }}" placeholder="John Doe" class="form-control form-control-line">
                                    <label>Full Name</label>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" value="{{ $profile->email }}" placeholder="email@site.com" class="form-control form-control-line" name="email" id="example-email">
                                            <label for="example-email">Email</label>
                                        </div>
                                    </div>
                                    <!-- /.col-md-6 -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="password" value="{{ $profile->password }}" name="password" placeholder="Leave default password"  type="password" pattern=".{6,}"   title="6 characters minimum" class="form-control form-control-line">
                                            <label>Password</label>
                                        </div>
                                    </div>
                                    <!-- /.col-md-6 -->
                                    <div class="col-md-6">
                                       <div class="form-group">
                                        <input type="text" name="phone_no" value="{{ $profile->phone_no }}" placeholder="08100062831" class="form-control form-control-line">
                                        <label>Phone No</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="form-group">
                                    <input type="text" name="state_of_origin" value="{{ $profile->state_of_origin }}" placeholder="Akwa Ibom" class="form-control form-control-line">
                                    <label>Sate of Origin</label>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->


                        <div class="form-group">
                            <button class="btn btn-success ripple">Update Profile</button>
                        </div>
                    </form>
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>
        <!--  /.tabs -->
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
<!-- /.main-wrappper -->
@endsection
@section('footer_script')
<script type="text/javascript">
  setTimeout(
    function() { $(':password').val(""); },
    1000  //1,000 milliseconds = 1 second
    );
</script>
@endsection
@extends('cpanel.layouts.app')

@section('title', 'create post')
@section('header_css')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/dropzone.css') }}">
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
				<li class="breadcrumb-item active">Create Post</li>
			</ol>
			<div class="d-none d-sm-inline-flex justify-center align-items-center"><a href="{{ route('home_view') }}" class="btn btn-outline-primary mr-l-20 btn-sm btn-rounded hidden-xs hidden-sm ripple">Back</a>
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
						<h5 class="box-title mr-b-0">Text Editor</h5>
						<form id="my-awesome-dropzone" class="form-material" method="POST" action="{{ route('create_post') }}" enctype="multipart/form-data">
							@csrf
							<input type="hidden" name="image" id="picurl" value="">
							<div class="row">
								<div class="col-lg-6 widget-holder">
									<div class="widget-bg">
										<div class="form-group">
											<input name="title" class="form-control" id="l36"   type="text">
											<label for="l37">Title</label>
										</div>
									</div>
								</div>

								
								<div class="col-lg-6 widget-holder">
									<div class="widget-bg">
										<div class="form-group">
											<select name="categories[]" class="form-control" id="l13">
												<optgroup label="Default">
													@foreach($categories as $category)
													<option value="{{ $category->id }}">{{ $category->name }}</option>
													@endforeach
												</optgroup>
											</select>
											<label for="l38">Select Category</label>
										</div>
									</div>
								</div>


								<div class="col-lg-12 widget-holder">							
									<div class="widget-bg">
										<div class="widget-body clearfix">
											<h5 class="box-title">Text Body</h5>
											<textarea name="body" class="form-control" data-toggle="tinymce" data-plugin-options='{ "height": 400 }'></textarea>
										</div>
									</div>
								</div>

								<div class="col-md-6 widget-holder">
									<div class="widget-bg">
										<div class="form-group">
											<input type="file" name="file">
										</div>
										{{-- <div class="widget-body clearfix">
										
										</div> --}}
										<!-- /.[data-toggle="dropzone"] -->
										
									</div>
									<!-- /.widget-body -->
								</div>
								<!-- /.widget-bg -->
							</div>
						</div>

						<div class="form-actions btn-list widget-holder">
							<div class="widget-bg">
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
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.0.1/min/dropzone.min.js"></script> --}}
<script src="{{ asset('admin/assets/js/dropzone.js') }}"></script>
@endsection
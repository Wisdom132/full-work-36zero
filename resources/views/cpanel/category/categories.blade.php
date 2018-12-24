@extends('cpanel.layouts.app')

@section('content')

@include('cpanel.inc.navbar')

@include('cpanel.inc.sidebar')

<main class="main-wrapper clearfix">
	<!-- Page Title Area -->
	<div class="row page-title clearfix">
		<div class="page-title-left">
			<h5 class="mr-0 mr-r-5">Control Panel</h5>
		</div>
		<!-- /.page-title-left -->
		<div class="page-title-right d-none d-sm-inline-flex">
			<ol class="breadcrumb">
               {{--  <li class="breadcrumb-item"><a href="index.html">Posts List</a>
               </li> --}}
               <li class="breadcrumb-item active">Category List</li>
             </ol>
             <div class="d-none d-sm-inline-flex justify-center align-items-center"><a href="{{ route('categories_create') }}" class="btn btn-outline-primary mr-l-20 btn-sm btn-rounded hidden-xs hidden-sm ripple" >Create New</a>
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
              <div class="widget-heading clearfix">
               <h5>Categories</h5>
             </div>
             @include('messages')
             <!-- /.widget-heading -->
             <div class="widget-body clearfix">
               <table class="table table-striped table-responsive" data-toggle="datatables">
                <thead>
                 <tr>
                  <th>N/S</th>
                  <th>name</th>
                  <th>slug</th>
                  <th>Created At</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
               @foreach ($categories as $category)
               <tr>
                 <td>{{$loop->index + 1}}</td>
                 <td>{{ $category->name}}</td>
                 <td>{{ $category->slug }}</td>
                 <td>{{ $category->created_at->diffForHumans() }}</td>

                 <td><a class="btn btn-outline-success" href="{{ route('categories.edit', $category->id ) }}">Edit</a></td>
                
                  <td>
                    <form id="form-data-{{$category->id}}" action='{{ route('categories.destroy', $category->id) }}' method='post' style="display: none;">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                  </form>
                  <a class="btn btn-outline-danger" href="" onclick="if (confirm('Are you sure you want to delete this?')) {
                    event.preventDefault();
                    document.getElementById('form-data-{{$category->id}}').submit();
                  } else {
                    event.preventDefault();}">Delete</a> 
                  </td>
                
              </tr>
              @endforeach
            </tbody>
            <tfoot>
             <tr>
              <th>N/S</th>
              <th>Title</th>
              <th>Author</th>
              <th>Created At</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </tfoot>

        </table>
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

<!-- /.content-wrapper -->
@include('cpanel.footer')
<!--/ #wrapper -->
@endsection
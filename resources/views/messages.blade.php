@if(session('success'))
<div class="alert alert-success">
	{{session('success')}}
</div>
@endif

@if(session('delete'))
<div class="alert alert-danger">
	{{session('delete')}}
</div>
@endif

@if(count($errors) > 0)
@foreach($errors->all() as $error)
<div class="alert alert-danger">
	{{$error}}
</div>
@endforeach
@endif
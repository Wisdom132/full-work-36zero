 @extends('layouts.app')
 @section('title', 'Musing')


 @section('content')

 @include('partials.blog_navbar')
 <section>
   <div class="container mt-5">
    @foreach ($posts->chunk(3) as $chunk)
    <div class="row">
      @foreach ($chunk as $post) 
     <div class="col-md-4 mt-5">
      <div class="post1">
       <img src="{{url('uploads/'.$post->image)}}" class="img-fluid mb-3" alt="">
       <h4 class="blog-header"><a href="{{ route('posts', $post->slug) }}">{{ $post->title }}</a></h4>
       <p class="blog-para">{!! str_limit($post->body, 150, '...') !!}</p>
       <a href="{{ route('posts', $post->slug) }}" class="start" >Read More</a>
     </div>
   </div>
     @endforeach
 </div>
 @endforeach
</div>
</section>
<br>
<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    {{ $posts->onEachSide(5)->links('vendor.pagination.bootstrap-4') }}
  </ul>
</nav>

{{--Footer here--}}
@include('footer')

@endsection

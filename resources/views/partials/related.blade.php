<section>
  <div class="container">
    @foreach ($related->chunk(3) as $chunk)
      
  
    <div class="row mt-5 mb-5">
          @foreach ($chunk as $relate)
      <div class="col-md-4 mt-5">
        <div class="post1">
          <img src="{{url('uploads/'.$relate->image)}}" sizes="360x360" class="img-fluid mb-3" alt="">
          <h4 class="blog-header"><a href="{{ route('posts', $relate->slug) }}">{{ $relate->title }}</a></h4>
          <p class="blog-para">{{ str_limit($relate->body, 150, '....')}}</p>
          <a href="{{ route('posts', $relate->slug) }}">Read More</a>
        </div>
      </div>
          @endforeach

    </div>
  @endforeach
  </section>
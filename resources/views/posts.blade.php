@extends('layouts.app')
@section('title', 'Posts')


@section('content')
@include('partials.blog_navbar')

<section>
	<div class="container">
		<div class="row mt-5">
			<div class="offset-md-2 col-md-8">
				<img src="{{url('uploads/'.$posts->image)}}" class="img-fluid mb-5 mt-5" alt="">
				<h1 class="candy-header">{{ $posts->title }}</h1>
				<p class="candy">{!! $posts->body !!}</p>


				<div id="disqus_thread"></div>
				<script>
					var disqus_config = function () {
					this.page.url = '{{ Request::url() }}';  // Replace PAGE_URL with your page's canonical URL variable
					this.page.identifier = '{{ $posts->id }}'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
				};

					(function() { // DON'T EDIT BELOW THIS LINE
						var d = document, s = d.createElement('script');
						s.src = 'https://36zero-ng.disqus.com/embed.js';
						s.setAttribute('data-timestamp', +new Date());
						(d.head || d.body).appendChild(s);
					})();
				</script>
				{{-- <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript> --}}


			</div>
		</div>
	</div>
</section>
@include('partials.related')

{{--Footer here--}}
@include('footer')
@endsection
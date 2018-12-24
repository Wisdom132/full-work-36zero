@extends('layouts.app')
@section('title', 'Contact Us')

@section('content')
{{-- Navbar Here --}}
@include('partials.blog_navbar')


<section id="contact_us">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-6">
                <h3 class="contact_header">Connect With Us...</h3>
                <p class="contact_para">Send us a message and we will 
                get back to you as soon as possible.</p>
                @include('messages')
                <form method="POST" action="{{ route('send.mail') }}">
                  {{ csrf_field() }}
                    {{-- <div class="form-group ">
                      <label for="exampleInputEmail1" class="contact_label">Full Name</label>
                      <input type="text" name="name" class="form-control border-0 rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp">
                  
                  </div> --}}
                  <div class="form-group">
                      <label for="exampleInputPassword1" require class="contact_label">E-mail</label>
                      <input type="Email" name="email" class="form-control border-0 rounded-0" id="exampleInputPassword1">
                  </div>
                  <div class="form-group ">
                      <label for="exampleInputEmail1" require class="contact_label">Subject</label>
                      <input type="text" name="subject" class="form-control border-0 rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1" class="contact_label">Drop A Message</label>
                    <textarea name="body" require class="form-control border-0 rounded-0" id="exampleFormControlTextarea1" rows="5"></textarea>
                </div>
                <button type="submit" class="btn btn-outline-dark contact-btn">Send <i class="fas fa-paper-plane ml-2"></i></button>
            </form>
        </div>
    </div>
</div>
</section>

@include('footer')
@endsection
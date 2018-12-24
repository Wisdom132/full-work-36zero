@extends('layouts.app')
@section('title', 'Footprint')

@section('content')
<section id="clients">
  {{-- Main Navbar here --}}
  @include('partials.main_navbar')
</div>
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <h2 class="text-light clients_hero">OUR CLIENTS</h2>
      <p class="text-light text-light clients_heropara">We have developed solutions for global brands. 
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae 
      alias neque dolores?</p>
    </div>
  </div>
</div>

</section>


<section>
  <div class="container">
    <div class="row">
      <div class="offset-md-3 col-md-6">
        <div data-aos="fade-right">
          <h4 class="clients_header">SERVING A LIMITED NUMBER OF CLIENTS WITH UNLIMITED PASSION</h4>
        </div>
      </div>
      <div data-aos="fade-left">

        <p class="clients_para offset-md-2 col-md-8">Our passion is media.Our commitment is unparralled attention to our clients' needs
          We have a roster of happy clients,many of whom insit on keeping 36ZERO as thier number one digital marketing company.
        </p>
      </div>
    </div>
    <!-- </div> -->
    <div class="row mt-5 mb-5 text-center">
      <div class="col-md-3 trial">
        <div data-aos="fade-right">
         <img src="{{asset('clients/client1.png')}}" alt="" class="client_logo mb-2">
         <div class="middle">
          <div class="text">John Doe</div>
        </div>

      </div>
    </div>
    <div class="col-md-3">
      <div data-aos="fade-up">
        <img src="{{asset('clients/client2.png')}}" alt="" class="client_logo mb-2">

      </div>
    </div>
    <div class="col-md-3">
      <div data-aos="fade-down">
        <img src="{{asset('clients/client3.png')}}" alt="" class="client_logo mb-2">

      </div>
    </div>
    <div class="col-md-3">
      <div data-aos="fade-left">
        <img src="{{asset('clients/client4.jpg')}}" alt="" class="client_logo mb-2">

      </div>
    </div>
  </div>
  <div class="row mt-5 mb-5 text-center">
    <div class="col-md-3">
      <div data-aos="fade-left">
        <img src="{{asset('clients/client5.jpg')}}" alt="" class="client_logo mb-2">

      </div>
    </div>
    <div class="col-md-3">
      <div data-aos="fade-down">
        <img src="{{asset('clients/client6.png')}}" alt="" class="client_logo mb-2">

      </div>
    </div>
    <div class="col-md-3">
      <div data-aos="fade-up">
        <img src="{{asset('clients/client7.png')}}" alt="" class="client_logo mb-2">

      </div>
    </div>
    <div class="col-md-3">
      <div data-aos="fade-right">
        <img src="{{asset('clients/clients8.png')}}" alt="" class="client_logo mb-2">

      </div>
    </div>
  </div>
  <div class="row">
    <div class="offset-md-4 col-md-4">
      <div data-aos="fade-right"><h5 class="call">Want to work with us? We're ready.Just call</h5>
        <a href="/contact"><p class="call_link">Contact Us</p></a></div>


      </div>
    </div>
  </div>
</section>

{{-- Footer Here --}}
@include('footer')
@endsection
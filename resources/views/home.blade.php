@extends('layouts.app')
@section('title', 'Home')

@section('content')
<body id="body">
  <section id="home">

    {{-- Navbar Start Here --}}
    @include('partials.main_navbar')
    
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h2 class="text-light home_hero">GROW YOUR BUSINESS</h2>
        <p class="text-light text-light home_para">A Creative marketing communication Agency, we are in business to help you solve all of
        your marketing communications needs and arrive at your expected result.</p>
        <a href="/contact"><button class="btn btn-outline-light">Start a Project</button></a>
      </div>
    </div>
  </div>
  
</section>
<section id="second">
  <div class="container">
    <div class="row text-center mx-auto mt-5 mb-5">
      <div class="col-md-4">
        <div data-aos="fade-left">
         <i class="fas fa-rocket icon text-primary"></i> 
         <h3 class="mission">Forward Thinkers</h3>
         <p class="mission_para">We are a team of forward thinkers that provides 
         digital solutions for online and offline audiences.</p> 
       </div>
     </div>

     <div class="col-md-4">
      <div data-aos="fade-up"><i class="fas fa-tags icon text-danger"></i>
        <h3 class="mission">All About You</h3>
        <p class="mission_para">We understand your need and we fashion 
          our solutions to fit it even while going the 
        extra mile for you always.</p></div>
      </div>

      <div class="col-md-4">
        <div data-aos="fade-right">
         <i class="fas fa-brain icon text-warning"></i>
         <h3 class="mission">Results Oriented</h3>
         <p class="mission_para">We are in business to give you
           an all round digital solutions that would
         give you an expected result.</p> 
       </div>
     </div>
   </div>
 </div>
</section>
<section id="about">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <h3 class="text-center pb-4 about_header">ABOUT US</h3>
      </div>
    </div>
    <div class="row pb-5">
      <div class="col-md-6">
        <div data-aos="fade-up">
          <img src="images/about.jpg" class="img-fluid image1 shadow-lg" alt="">  
        </div>
      </div>
      <div class="col-md-6 mt-5">
        <div data-aos="fade-right">
         <p class="about_para">"36Zero is a creative digital marketing agency that is focused on providing 
          digital solutions and strategies that are beyond the edge
        at pushing your brand’s reach while also maintaining a steady limitless growth."</p> 
      </div>
    </div>
  </div>
</div>
</section>
<section id="service">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 class="services">OUR SERVICES</h2>
      </div>
    </div>
    <div class="row mx-auto">
      <div class="offset-md-1 col-md-4">
        <div data-aos="fade-up">
          <div class="d-flex">
           <span class="fas fa-circle-notch mr-4 mt-2 icon1"></span><h3 class="service_header">Strategy</h3>  
         </div>
         <p class="service_para">Strategy is the bedrock of succes,you can't achieve a desired goal without a visible Strategy.
          strategy runs across all stages of the business cycle.From product design to marketing to dispatch.It informs transaction youhave with the public.Our
        strategy is digital first,community focused and it changes the narrative locally and globally</p>  
      </div>
    </div>
    <!-- <div class="col-md-2"></div> -->
    <div class="offset-md-1 col-md-4">
      <div data-aos="fade-up">
        <div class="d-flex">
         <span class="fas fa-puzzle-piece mr-4 mt-2 icon1"></span><h3 class="service_header">Design</h3>  
       </div>
       <p class="service_para">To keep a great customer experience front and center,every brand/business nneds to be "design particular".
        Disney led the way,and now quality design is a basic necessity to success,especiall when digital interactions can make or break growth.
      </p>
    </div>
  </div>
</div>
<div class="row pt-5  mx-auto">
  <div class="offset-md-1 col-md-4">
    <div data-aos="fade-right">
      <div class="d-flex">
       <span class="fas fa-bullhorn mr-4 mt-2 icon1"></span><h3 class="service_header">Technology</h3>  
     </div>
     <p class="service_para">Technology is transforming at a record pace,offering strategic and flexible solutions is critcal
      to staying ahead of the competition and growing your business.Businesses are benefiting daily from our cutting edge technological solutions.
    </p>
  </div>
</div>
<!-- <div class="col-md-2"></div> -->
<div class="col-md-4 offset-md-1">
  <div data-aos="fade-right">
    <div class="d-flex">
      <span class="fas fa-pen mr-4 mt-2 icon1"></span><h3 class="service_header">Advertising</h3>  
    </div>
    <p class="service_para">Advertising is a hybrid of brand or company.While we serve and help clients,we also manufacture
      ads,TV commercials,brand guidelines,PR placement,positive words of mouth,new client product ideas and other marketing communication materials to help 
      tou reach your traget faster.
    </p>
  </div>
</div>
</div>
</div>
</section>

</section>

<section id="team">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3 class="team">Meet Our Team...</h3>
        <p class="team_para">We are a strategic agency. A company of Forward Thinkers.</p>
      </div>
    </div>
    <div class="row mx-auto justify-content-center">
      <div class="owl-carousel mx-auto owl-theme mb-4">
        <div class="item mb-4">
          <img src="images/Iam-headshot.png" alt="" class="lead">
          <div class="card shadow-lg border-0 card1">    
            <div class="card-body main1 text-center">
              <h6 class="card-subtitle mb-2 text-muted">CEO/CO-FOUNDER</h6>
              <h5 class="card-title">Iam Etefia</h5>
              
              <p class="card-text">He leads and oversees the implementation of the company’s long and short
               term goals in accordance with the vision even while ensuring corporate citizenship and social
             responsibility wherever we do business.</p>
             <!-- <a href="#" class="card-link social"><i class="fab fa-linkedin"></i></a> -->
             <a href="https://twitter.com/IamEtefia " class="card-link social"><i class="fab fa-twitter"></i></a>
             <a href="https://web.facebook.com/Etefiaiam " class="card-link social"><i class="fab fa-facebook"></i></a>
           </div>
         </div>
         
       </div>
       <div class="item mb-4">
        <img src="images/eky.png" alt="" class="lead">
        <div class="card shadow-lg border-0 card1">
          <div class="card-body main1 text-center">
            <h6 class="card-subtitle mb-2 text-muted">Creative Director</h6>
            <h5 class="card-title">Ekemini Joseph</h5>
            
            <p class="card-text">He is the call guy when everyone’s creative juice seizes to flow.
            We don’t know how he does it but, he always has juice stored around for emergency.!</p>
            <!-- <a href="#" class="card-link social"><i class="fab fa-linkedin"></i></a> -->
            <a href="https://twitter.com/EkeminiJo " class="card-link social"><i class="fab fa-twitter"></i></a>
            
            <a href="https://web.facebook.com/ekemini.joseph.52" class="card-link social"><i class="fab fa-facebook"></i></a>
          </div>
        </div>
        
      </div> 
      <div class="item mb-4">
        <img src="images/Lizzy-headshot.png" alt="" class="lead">
        <div class="card shadow-lg border-0 card1" >
          <div class="card-body main1 text-center">
            <h6 class="card-subtitle mb-2 text-muted">Product Manager</h6>
            <h5 class="card-title">Elizabeth Ekong</h5>
            
            <p class="card-text">She is the life of the party, apart from her keen
            eyes for details, she also makes sure the team stays focus on the goal.</p>
            <!-- <a href="#" class="card-link social"><i class="fab fa-linkedin"></i></a> -->
            <a href="https://twitter.com/IzzieEkong  " class="card-link social"><i class="fab fa-twitter"></i></a>
            
            <a href="https://web.facebook.com/elizabeth.ekong" class="card-link social"><i class="fab fa-facebook"></i></a>
          </div>
        </div>
        
      </div> 
      <div class="item mb-4">
        <img src="images/iddy-headshot-1.png" alt="" class="lead">
        <div class="card shadow-lg border-0 card1">
          <div class="card-body main1 text-center">
            <h6 class="card-subtitle mb-2 text-muted">Content Lead</h6>
            <h5 class="card-title">Iddy Brown</h5>
            
            <p class="card-text">He is the pop culture ambassador with an  innovative mindset. 
            He monitor’s trends and points the team towards the innovative path of achieving a better result</p>
            <!-- <a href="#" class="card-link social"><i class="fab fa-linkedin"></i></a> -->
            <a href="https://twitter.com/Iddybrown001" class="card-link social"><i class="fab fa-twitter"></i></a>
            
            <a href="https://web.facebook.com/idorenyin.jacob.315" class="card-link social"><i class="fab fa-facebook"></i></a>
          </div>
        </div>
      </div> 
      <div class="item mb-4">
        <img src="images/Patrick-headshot.png" alt="" class="lead">
        <div class="card shadow-lg border-0 card1">
          <div class="card-body main1 text-center">
            <h6 class="card-subtitle mb-2 text-muted">Shuuterbug</h6>
            <h5 class="card-title">Victor Patrick</h5>
            
            <p class="card-text">His lenses finds expression in moments and helps preserves 
            them from fading with time.  He has keen eyes that pays candid attention to details. </p>
            <!-- <a href="#" class="card-link social"><i class="fab fa-linkedin"></i></a> -->
            <a href="#" class="card-link social text-primary"><i class="fab fa-twitter"></i></a>
            
            <a href="https://web.facebook.com/victor.eshiet.33" class="card-link social"><i class="fab fa-facebook"></i></a>
          </div>
        </div>
        
      </div>    
      <div class="item mb-4">
        <img src="images/Morgan-headshot-3.png" alt="" class="lead">
        <div class="card shadow-lg border-0  card1">
          <div class="card-body main1 text-center">
            <h6 class="card-subtitle mb-2 text-muted">Social Ambassador</h6>
            <h5 class="card-title">Morgan Great</h5>
            
            <p class="card-text">He is the social ambassador, he has won lot of accolades just
            from being social. We call him the trend master and master of memes. </p>
            <!-- <a href="#" class="card-link social"><i class="fab fa-linkedin"></i></a> -->
            <a href="https://twitter.com/Morgan_DeGreat" class="card-link social text-primary"><i class="fab fa-twitter"></i></a>
            
            <a href="https://web.facebook.com/great.morgan" class="card-link social"><i class="fab fa-facebook"></i></a>
          </div>
        </div>
      </div>                
    </div>
  </div>          
</div>
</section>

{{-- Footer here --}}
@include('footer')

@endsection
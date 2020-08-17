@extends('layouts.appHome', ['title' => 'TAAP'])

@section('content')

<!--=== Landing Start ===-->
  
<section class="home-slider" id="home">
    <div class="full-screen-bg">
        <div class="hero-text-wrap home-bg">
          
        </div>
    </div>
</section>
  
<!--=== Landing End ===--> 
  
<!--=== Info Start ===-->
<section id="pricing">
    <div class="container">
      <div class="row">
			<div class="col-md-6 pricing-table">
				<div class="pricing-box wow fadeInLeft" data-wow-delay="0.1s">
					<h1><span>About</span></h1>
					<h3>We are Duke. Duke Duke Duke...</h3>
					<div class="pricing-box-bottom">
						<a class="btn btn-red btn-md">Contact</a>
					</div>
				</div>
			</div>
			
			<div class="col-md-6 pricing-table">
				<div class="pricing-box wow fadeInRight" data-wow-delay="0.1s">
					<h1><span>Featured Article</span></h1>
					<h2 class="red-color"><span>Article Title</span></h2>
					<h4>Article Category</h4>
					<div class="pricing-box-bottom"> <a class="btn btn-red btn-md">Read More</a> </div>
				</div>
			</div>
        </div>
    </div>
</section>
<!--=== Info End ===-->
  
<!--=== Portfolio Start ===-->
<section class="white-bg dark-block">
  	<div class="container">
    	<div class="row">
        	<div class="col-md-12 my-10">
				<h2 class="text-uppercase font-700 source-font text-center mb-10">Reports</h2>
            </div>
        	
            <div class="col-md-12">
            
				<div id="grandy-folio" class="cbp">
					<div class="cbp-item branding col-md-4 col-sm-6 with-spacing">
						<div class="portfolio gallery-image-hover text-center pointer">
							<div class="folio-overlay"></div>
							<img src="{{ asset('img/whitehouse.jpg') }}" alt="">
							<div class="portfolio-wrap">
							<div class="portfolio-description">
								<a href="{{ route('home') }}">
									<h1 class="portfolio-title">White House</h1>
								</a>
							</div>
							</div>
						</div>
					</div>
					
					<div class="cbp-item branding col-md-4 col-sm-6 with-spacing">
						<div class="portfolio gallery-image-hover text-center pointer">
							<div class="folio-overlay"></div>
							<img src="{{ asset('img/state.png') }}" alt="">
							<div class="portfolio-wrap">
							<div class="portfolio-description">
								<a href="{{ route('home') }}">
									<h1 class="portfolio-title">State Department</h1>
								</a>
							</div>
							</div>
						</div>
					</div>
					
					<div class="cbp-item branding col-md-4 col-sm-6 with-spacing">
						<div class="portfolio gallery-image-hover text-center pointer">
							<div class="folio-overlay"></div>
							<img src="{{ asset('img/justice.png') }}" alt="">
							<div class="portfolio-wrap">
							<div class="portfolio-description">
								<a href="{{ route('home') }}">
									<h1 class="portfolio-title">Justice Department</h1>
								</a>
							</div>
							</div>
						</div>
					</div>
					
					<div class="cbp-item branding col-md-4 col-sm-6 with-spacing">
						<div class="portfolio gallery-image-hover text-center pointer">
							<div class="folio-overlay"></div>
							<img src="{{ asset('img/treasury.jpg') }}" alt="">
							<div class="portfolio-wrap">
							<div class="portfolio-description">
								<a href="{{ route('home') }}">
									<h1 class="portfolio-title">Treasury</h1>
								</a>
							</div>
							</div>
						</div>
					</div>
					
					<div class="cbp-item branding col-md-4 col-sm-6 with-spacing">
						<div class="portfolio gallery-image-hover text-center pointer">
							<div class="folio-overlay"></div>
							<img src="{{ asset('img/commerce.png') }}" alt="">
							<div class="portfolio-wrap">
							<div class="portfolio-description">
								<a href="{{ route('home') }}">
									<h1 class="portfolio-title">Commerce Department</h1>
								</a>
							</div>
							</div>
						</div>
					</div>
					
					<div class="cbp-item branding col-md-4 col-sm-6 with-spacing">
						<div class="portfolio gallery-image-hover text-center pointer">
							<div class="folio-overlay"></div>
							<img src="{{ asset('img/homeland.png') }}" alt="">
							<div class="portfolio-wrap">
							<div class="portfolio-description">
								<a href="{{ route('home') }}">
									<h1 class="portfolio-title">Department of Homeland Security</h1>
								</a>
							</div>
							</div>
						</div>
					</div>
					
				</div>
            
            </div>
            
        </div>
    </div>
  </section>
   
  <!--=== Portfolio End ===-->

  @endsection
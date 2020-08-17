@extends('layouts.appHome', ['title' => 'TAAP'])

@section('content')
  
<!--=== Portfolio Start ===-->
<section class="white-bg dark-block">
  	<div class="container">
    	<div class="row">
        	<div class="col-md-12 my-10">
				<h2 class="text-uppercase font-700 source-font text-center mb-10">Reports</h2>
            </div>

            <div class="col-md-12 my-10">
            	<div id="grandy-folio-filter" class="cbp-l-filters-alignCenter text-sm-center mt-60 mb-100">
                <div data-filter="*" class="cbp-filter-item-active cbp-filter-item dark">
                    All 
                </div>
                <div data-filter=".branding" class="cbp-filter-item">
                    White House
                </div>
                <div data-filter=".print" class="cbp-filter-item">
                    Print Design 
                </div>
                <div data-filter=".ui-ux" class="cbp-filter-item">
                    UI/UX Design 
                </div>
                <div data-filter=".development" class="cbp-filter-item">
                    Development 
                </div>
            </div>
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
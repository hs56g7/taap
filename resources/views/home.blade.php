@extends('layouts.appHome', ['title' => 'TAAP'])

@section('content')

<!--=== Landing Start ===-->
  
<section id="home" class="home-bg">
	<div class="home-logo"></div>
</section>
  
<!--=== Landing End ===--> 
  
<!--=== Info Start ===-->
<section id="pricing" style="padding-top:0px">
    <div class="container">
      	<div class="row">
			<div class="col-sm-8 col-md-6 mx-auto text-center my-6" style="float:none">
				<h1 style="background-color: #cb2d3e;" class="py-6 pointer"><span class="white-color" style="font-family: 'Playfair Display';" onclick="window.location.href='{{ route('report.index') }}'">View All Reports</span></h1>
			</div>
			<div class="col-md-6 pricing-table">
				<div class="pricing-box wow fadeInLeft" data-wow-delay="0.1s">
					<h1><span>Featured Report</span></h1>
					<h2><span class="duke-text">{{ $title }}</span></h2>
					<h4>{{ $category }}</h4>
					<div class="pricing-box-bottom"> <a class="btn btn-red btn-md" href="{{ route('report.index') }}/{{ $report_id }}">Read</a> </div>
				</div>
			</div>
			<div class="col-md-6 pricing-table">
				<div class="pricing-box wow fadeInRight" data-wow-delay="0.1s">
					<h1><span>About</span></h1>
					<h3><span class="duke-text">We are a group of law students based at Duke University documenting instances where the Trump Administration may have violated the law. Accountability matters, and no one is above the law.</span></h3>
					<!--<div class="pricing-box-bottom">
						<a class="btn btn-red btn-md">Contact</a>
					</div>-->
				</div>
			</div>
        </div>
    </div>
</section>
<!--=== Info End ===-->

@endsection
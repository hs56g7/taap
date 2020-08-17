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
				<div class="pricing-box wow fadeInRight" data-wow-delay="0.0s">
					<h1><span>Featured Report</span></h1>
					<h2 class="red-color"><span>Article Title</span></h2>
					<h4>Article Category</h4>
					<div class="pricing-box-bottom"> <a class="btn btn-red btn-md">Read More</a> </div>
				</div>
			</div>
        </div>
    </div>
</section>
<!--=== Info End ===-->

@endsection
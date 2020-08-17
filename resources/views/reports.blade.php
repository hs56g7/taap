@extends('layouts.appHome', ['title' => 'TAAP'])

@section('content')
  
<!--=== Portfolio Start ===-->
<section class="white-bg dark-block">
  	<div class="container">
    	<div class="row">
			<div class="col-sm-6">
				<div class="col-md-12 mt-10">
					<h2 class="text-uppercase font-700 source-font text-center mb-10">Reports</h2>
				</div>

				<div class="col-md-12 mb-10">
					<div id="grandy-folio-filter" class="cbp-l-filters-alignCenter text-sm-center mt-60 mb-100">
					<div data-filter="*" class="cbp-filter-item-active cbp-filter-item dark">
						All 
					</div>
					@foreach($categories as $category)
						<div data-filter=".{{ $category->short_name }}" class="cbp-filter-item">
							{{ $category->name }}
						</div>
					@endforeach
				</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="col-sm-12 col-md-6 mt-10 mx-auto" style="float:none;">
					<h2 class="text-uppercase font-700 source-font text-center mb-10">Filter by Author</h2>
					<form method="GET" action="{{ route('report.index') }}">
						@csrf
						<select name="author_id" class="form-control">
							<option value="" selected disabled>Select Author</option>
							@foreach($authors as $author)
								<option value="{{ $author->id }}">{{ $author->name }}</option>
							@endforeach
						</select>
						<input class="form-control" type="submit" value="Submit">
					</form>
				</div>
			</div>
			@if($author_name != "")
				<div class="col-sm-12 text-center">
					<h2 class="text-uppercase font-700 source-font text-center red-color">Showing Reports by: {{ $author_name }}</h2>
					<a href="{{  route('report.index') }}"><button class="btn btn-rounded btn-lg btn-color">Reset</button></a>
				</div>
			@endif
		</div>

		<div class="row">
        	
            <div class="col-md-12">
            
				<div id="grandy-folio" class="cbp">

					@foreach($reports as $report)
					<div class='cbp-item {{ $report->short_name }} col-md-4 col-sm-12 with-spacing'>
						<div class="portfolio gallery-image-hover text-center pointer">
							<a href="#">
							<div class="folio-overlay"></div>
							<img src='{{ asset("$report->img") }}' alt="">
							<div class="portfolio-wrap-reports">
							<div class="portfolio-description">
								<h1 class="portfolio-title">{{ $report->title }}</h1>
								<h3 class="portfolio-title">{{ $report->author }}</h3>
							</div>
							</div>
							</a>
						</div>
					</div>
					@endforeach
					
				</div>
            
            </div>
            
        </div>
    </div>
  </section>
   
  <!--=== Portfolio End ===-->

  @endsection
@extends('layouts.appHome', ['title' => 'Reports - TAAP'])

@section('content')
  
<!--=== Portfolio Start ===-->
<section class="white-bg dark-block">
  	<div class="container">
    	<div class="row">
			<div class="col-12">
				<div class="col-md-12 mt-10">
					<h2 class="text-uppercase font-700 source-font text-center mb-10">Reports</h2>
				</div>

				<div class="col-md-12 mb-10">
					<div id="grandy-folio-filter" class="cbp-l-filters-alignCenter text-sm-center mt-60 mb-100">
					<div data-filter="*" class="cbp-filter-item-active cbp-filter-item dark">
						All 
					</div>
					@foreach($categories as $category)
						<div id="{{ $category->short_name }}" data-filter=".{{ $category->short_name }}" class="cbp-filter-item">
							{{ $category->name }}
						</div>
					@endforeach
				</div>
				</div>
			</div>
		</div>

		<div class="row">
        	
            <div class="col-12">
            
				<div id="grandy-folio" class="cbp">

					@foreach($reports as $report)
					<div class='cbp-item {{ $report->short_name }} col col-sm-4 col-md-3 with-spacing'>
						<div class="portfolio gallery-image-hover text-center pointer">
							<a href="{{ route('report.index') }}/{{ $report->report_id }}">
							<div class="folio-overlay"></div>
							<img src='{{ asset("$report->img") }}' alt="">
							<div class="portfolio-wrap-reports">
								<div class="portfolio-description">
									<h1 class="portfolio-title">{{ $report->title }}</h1>
									<p  class="portfolio-title">{{ $report->description }}</p>
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

@section('js')

<script>

	var filter = '{{ $filter }}';
	
	var filterReports = setInterval(function(){
		if($('#loader-overlay').is(':hidden'))
		{
			$('#' + filter).click();
			let stateObj = { id: "100" }; 
            window.history.replaceState(stateObj, 
                        "Reports", "/report"); 
			clearInterval(filterReports);
		}
	}, 500);

</script>

@endsection
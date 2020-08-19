@extends('layouts.appHome', ['title' => $title])

@section('content')
  
<!--=== Portfolio Start ===-->
<section class="white-bg dark-block">
  	<div class="container">
    	<div class="row">
			<div class="col-xs-12 col-md-8 col-lg-6 col-md-offset-2 col-lg-offset-3">
                <a href="{{ route('download.show', ['download' => $report_id]) }}" target="_blank"><button class="btn btn-dark float-left">Download PDF</button></a>
                <a href="{{ route('report.index') }}"><button class="btn float-right">Back</button></a>
            </div>
            <div class="col-xs-12 col-md-8 col-lg-6 col-md-offset-2 col-lg-offset-3">
                {!! $text !!}
            </div>
		</div>
    </div>
</section>

@endsection
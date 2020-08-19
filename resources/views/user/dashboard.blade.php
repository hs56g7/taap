@extends('layouts.appUser', ['title' => 'TAAP - Dashoard'])

@section('content')

<section id="current_reports" class="duke-bg">
    <div class="container white-bg">
        <div class="row">
            <div class="col-sm-12 col-md-6 mx-auto">
                @if(session('success'))
                    <div class="mt-4 alert alert-success">
                        {{session('success')}}
                    </div>
                @endif
                <h1>Existing Reports</h1>
                <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Report ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reports as $report)
                            <tr>
                                <td>{{ $report->report_id }}</td>
                                <td>{{ $report->title }}</td>
                                <td>{{ $report->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection
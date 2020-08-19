@extends('layouts.appUser', ['title' => 'TAAP - Dashoard'])

@section('content')

<section id="current_reports" class="duke-bg">
    <div class="container white-bg">
        <div class="row">
            <div class="col-sm-12 col-md-6 mx-auto">
                @if(session('success'))
                    <div class="mt-4 alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="mt-4 alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <h1>Existing Reports</h1>
                <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Report ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Status (Click to Change)</th>
                            <th scope="col">Edit (Click to Access)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reports as $report)
                            <tr>
                                <td>{{ $report->report_id }}</td>
                                <td>{{ $report->title }}</td>
                                <td>{{ $report->name }}</td>
                                @if($report->status == 1)
                                    <td><a href="{{ route('user.index') }}/{{ $report->report_id }}">Visible</td>
                                @else
                                    <td><a href="{{ route('user.index') }}/{{ $report->report_id }}">Hidden</td>
                                @endif
                                <td><a href="{{ route('user.index') }}/{{ $report->report_id }}/edit">Edit</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection
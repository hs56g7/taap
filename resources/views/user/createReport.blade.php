@extends('layouts.appUser', ['title' => 'TAAP - Dashoard'])

@section('content')

<section id="current_reports" class="duke-bg">
    <div class="container white-bg">
        <div class="row">
            <div class="col-sm-12 col-md-6 mx-auto">
                <h1>Upload Report</h1>
                @if($errors->has('error'))
                    <div class="alert alert-danger">
                        {{ $errors->first('error') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group my-8">
                        <label for="title">Title (Max 100 Characters)</label>
                        <input type="text" id="title" class="form-control" name="title" placeholder="Title" required>
                    </div>
                    <div class="form-group my-8">
                        <label for="description">Description (Max 254 Characters)</label>
                        <input type="text" id="description" class="form-control" name="description" placeholder="Description" required>
                    </div>
                    <div class="form-group my-8">
                        <label for="category">Category</label>
                        <select name="category" class="form-control" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group my-8">
                        <label for="pdf_file">Report PDF</label>
                        <input type="file" id="pdf_file" class="form-control" name="pdf_file" accept=".pdf" required>
                    </div>
                    <div id="trumbowyg" name="markup_text">
                    </div>
                    <input type="submit" class="form-control" value="Submit" >
                </form>
            </div>
        </div>
    </div>
</section>

@endsection

@section('js')

<script src="{{ asset('trumbowyg/trumbowyg.min.js') }}"></script>
<script>

    $('#trumbowyg').trumbowyg({
        btns: [
            ['formatting'],
            ['strong', 'em', 'del'],
            ['superscript', 'subscript'],
            ['link'],
            ['insertImage'],
            ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
            ['unorderedList', 'orderedList'],
            ['removeformat'],
        ]
    });

</script>

@endsection
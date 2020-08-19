@extends('layouts.appUser', ['title' => 'TAAP - Dashoard'])

@section('content')

<section id="current_reports" class="duke-bg">
    <div class="container white-bg">
        <div class="row">
            <div class="col-sm-12 col-md-6 mx-auto">
                <h1>Edit Report</h1>
                @if($errors->has('error'))
                    <div class="alert alert-danger">
                        {{ $errors->first('error') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('user.index') }}/{{ $slug }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="report_id" value="{{ $report_id }}" >
                    <div class="form-group my-8">
                        <label for="title">Title (Max 100 Characters)</label>
                        <input type="text" id="title" class="form-control" name="title" placeholder="Title" value="{{ $info->title }}" required>
                    </div>
                    <div class="form-group my-8">
                        <label for="description">Description (Max 254 Characters)</label>
                        <input type="text" id="description" class="form-control" name="description" placeholder="Description" value="{{ $info->description }}" required>
                    </div>
                    <div class="form-group my-8">
                        <label for="category">Category</label>
                        <select name="category" class="form-control" required>
                            @foreach($categories as $category)
                                @if($category->id == $info->category_id)
                                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                @else
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group my-8">
                        <label for="author">Author</label>
                        <select name="author" class="form-control" required>
                            @foreach($authors as $author)
                                @if($author->id == $info->author_id)
                                    <option value="{{ $author->id }}" selected>{{ $author->first_name . " " . $author->last_name }}</option>
                                @else
                                    <option value="{{ $author->id }}">{{ $author->first_name . " " . $author->last_name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group my-8">
                        <label for="pdf_file">Report PDF (Will Remain The Same Unless a New File is Uploaded)</label>
                        <input type="file" id="pdf_file" class="form-control" name="pdf_file" accept=".pdf">
                    </div>
                    <div id="trumbowyg" name="markup_text">
                        {!! $report_text !!}
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
        tagsToRemove: ['script', 'link'],
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
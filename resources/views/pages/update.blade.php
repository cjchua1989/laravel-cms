@extends('layout.dashboard')

@section('content')
<!-- Page Heading -->
{{-- <h1 class="h3 mb-4 text-gray-800">Manage Pages</h1> --}}

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Update Page</h6>
    </div>
    <div class="card-body">
        <form method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name"
                    placeholder="Name" name="name" value="{{ old('name', $page->name) }}">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" id="description"
                    rows="3" placeholder="Description" name="description">{{ old('description', $page->description) }}</textarea>
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Contents</label>
                <textarea class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}" id="content" rows="3"
                    placeholder="Contents" name="content">{{ old('content', $page->content) }}</textarea>
                @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="thumbnail" class="form-label">Thumbnail</label>
                @if($page->has_thumbnail)
                <div class="row">
                    <div class="col-4">
                        <img src="{{ $page->thumbnail_url }}" alt="" class="img-thumbnail mb-3">
                    </div>
                </div>
                @endif
                <input type="file" class="form-control {{ $errors->has('thumbnail') ? 'is-invalid' : '' }}"
                    id="thumbnail" placeholder="Attached Image" name="thumbnail"
                    accept="image/png, image/jpeg, image/jpg">
                @error('thumbnail')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="/dashboard/pages" class="btn btn-default">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection

@section('css')
<link href="/css/editor.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('scripts')
<script type="text/javascript" src="/js/editor/editor.min.js"></script>
<script>
    new FroalaEditor('textarea#content', {
        toolbarButtons: ['undo', 'redo' , '|', 'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript',
        'outdent', 'indent', 'clearFormatting'],
        toolbarButtonsXS: ['undo', 'redo' , '-', 'bold', 'italic', 'underline']
    });
</script>
@endsection
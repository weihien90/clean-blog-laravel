@extends('layouts.master')

@section('vendor-css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
@endsection

@section('vendor-js')
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
@endsection

@section('content')
    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('/img/edit-post.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>Edit Post</h1>
                        <hr class="small">
                        <span class="subheading">{{ $post->title }}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

                <form action="{{ route('post.update', ['post'=>$post->slug]) }}" method="post">
                    {!! csrf_field() !!}
                    {!! method_field('put') !!}

                    <div class="form-group">
                        <label for="category">Category</label>
                        <input type="text" name="category" class="form-control" placeholder="Category" value="{{ $post->category }}">
                    </div>

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $post->title }}">
                    </div>

                    <div class="form-group">
                        <label for="cover-image">Cover Image</label>
                        <input type="url" name="cover-image" class="form-control" placeholder="Cover Image" value="{{ $post->cover_image }}">
                    </div>

                    <textarea id="edit-blogpost" name="content">{{ $post->content }}</textarea>

                    <input type="submit" value="Update" class="btn btn-primary">
                </form>

            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script>
var simplemde = new SimpleMDE({
    element: $("#edit-blogpost")[0],
    showIcons: ["code"],
    indentWithTabs: false,
});
</script>
@endsection

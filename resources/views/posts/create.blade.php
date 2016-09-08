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
    <header class="intro-header" style="background-image: url('{{ asset("img/home-bg.jpg") }}'">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>Clean Blog</h1>
                        <hr class="small">
                        <span class="subheading">A Clean Blog Theme by Start Bootstrap</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

                <form action="{{ route('post.store') }}" method="post">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <label for="category">Category</label>
                        <input type="text" name="category" class="form-control" placeholder="Category">
                    </div>

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Title">
                    </div>

                    <div class="form-group">
                        <label for="cover-image">Cover Image</label>
                        <input type="url" name="cover-image" class="form-control" placeholder="Cover Image">
                    </div>

                    <textarea id="new-blogpost" name="content"></textarea>

                    <input type="submit" value="Post" class="btn btn-primary">
                </form>

            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script>
var simplemde = new SimpleMDE({
    element: $("#new-blogpost")[0],
    autosave: {
        enabled: true,
        uniqueId: "postContent"
    },
    showIcons: ["code"],
    indentWithTabs: false,
});
</script>
@endsection

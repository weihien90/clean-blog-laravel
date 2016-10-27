@extends('layouts.master')

@section('content')
    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('/img/home-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>All Blogposts</h1>
                        <hr class="small">
                        <span class="subheading"></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                @foreach ($posts as $post)
                <div class="post-preview">
                    <a href="/{{ $post->created_at->year }}/{{ $post->created_at->month }}/{{ 
                    $post->created_at->day }}/{{ $post->slug }}">

                        <h2 class="post-title">
                            {{ $post->title }}
                        </h2>
                        <h3 class="post-subtitle">
                            {{ $post->content }}
                        </h3>
                    </a>
                    <p class="post-meta">Posted on {{ $post->created_at->toFormattedDateString() }}</p>
                </div>
                <hr>
                @endforeach

                <!-- Pager -->
                {!! $posts->render() !!}
            </div>
        </div>
    </div>
@endsection

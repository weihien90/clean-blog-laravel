@extends('layouts.master')

@section('content')
    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    @if ($post->cover_image)
        <header class="intro-header" style="background-image: url('{{ $post->cover_image }}')">
    @else
        <header class="intro-header" style="background-image: url('{{ asset("img/home-bg.jpg") }}'">
    @endif
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>{{ $post->title }}</h1>
                        <hr class="small">
                        <span class="subheading">{{ $post->created_at->toFormattedDateString() }}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 post-content">

                {!! $post->content !!}

                @if ( Auth::check() )
                    <br>
                    <a href="{{ route('post.edit', ['post'=>$post->slug]) }}" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                @endif

            </div>
        </div>
    </div>

@endsection

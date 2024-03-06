@extends('theme.master')

@section('title-page', 'category')

@section('hero-banner')
    <section class="mb-30px">
        <div class="container">
            <div class="hero-banner hero-banner--sm">
                <div class="hero-banner__content">
                    <h1>{{ $categoryName }} - Page</h1>
                    <nav aria-label="breadcrumb" class="banner-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $categoryName }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <section class="blog-post-area section-margin mt-4">
        <div class="container">
            <div class="row">

                <div class="col-lg-8">
                    <div class="row">
                        @if (isset($blogs) && count($blogs) > 0)
                            @foreach ($blogs as $blog)
                                <div class="col-md-6">
                                    <div class="single-recent-blog-post card-view">
                                        <div class="thumb">
                                            <img class="card-img rounded-0" src="{{ asset("storage/blogs/$blog->image") }}"
                                                alt="">
                                            <ul class="thumb-info">
                                                <li>
                                                    <a href="#">
                                                        <i class="ti-user"></i>
                                                        {{ $blog->user->name }}
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="ti-themify-favicon"></i>
                                                        2 Comments
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="details mt-20">
                                            <a href="{{ route('blogs.show', ['blog' => $blog]) }}">
                                                <h3>{{ $blog->name }}</h3>
                                            </a>
                                            <p>{{ $blog->description }}</p>
                                            <a class="button" href="{{ route('blogs.show', ['blog' => $blog]) }}">Read More
                                                <i class="ti-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                    </div>


                    <div class="row">
                        <div class="col-lg-12">
                            @if (isset($blogs) && count($blogs) > 0)
                                {{ $blogs->render('pagination::bootstrap-5') }}
                            @endif
                        </div>
                    </div>
                </div>
                @include('theme.partials.sidebar')
            </div>
        </div>
    </section>
@endsection

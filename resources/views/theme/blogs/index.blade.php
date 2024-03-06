@extends('theme.master')
@section('title-page', 'My Blogs')
@section('content')
    <!--================ Hero sm Banner start =================-->
    <section class="mb-30px">
        <div class="container">
            <div class="hero-banner hero-banner--sm">
                <div class="hero-banner__content">
                    <h1>My Blogs</h1>
                    <nav aria-label="breadcrumb" class="banner-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Information blogs</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!--================ Hero sm Banner end =================-->

    <section class="blog-post-area section-margin mt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @if (session('successBlogDelete'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> {{ session('successBlogDelete') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" width="5%">#</th>
                                <th scope="col">Title</th>
                                <th scope="col" width="15%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($blogs as $blog)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>
                                        <a href="{{ route('blogs.show', ['blog' => $blog]) }}" target="_blank">
                                            {{ $blog->name }}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('blogs.edit', ['blog' => $blog]) }}" class="btn btn-sm btn-dark">
                                            Edit
                                        </a>
                                        {{-- Delete blog --}}
                                        <form id="delete-form" action="{{ route('blogs.destroy', ['blog' => $blog]) }}"
                                            method="POST" style="display: none;">
                                            @method('delete')
                                            @csrf
                                        </form>
                                        <a href="{{ route('blogs.destroy', ['blog' => $blog]) }}"
                                            onclick="event.preventDefault(); document.getElementById('delete-form').submit();"
                                            class="btn btn-sm btn-danger">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <strong>not found</strong>
                            @endforelse
                        </tbody>
                    </table>

                    {{ $blogs->render('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </section>
@endsection

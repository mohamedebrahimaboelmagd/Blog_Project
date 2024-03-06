@extends('theme.master')

@section('title-page', 'register')


@section('content')
    <!--================ Hero sm banner start =================-->
    <section class="mb-5px">
        <div class="container">
            <div class="hero-banner hero-banner--sm">
                <div class="hero-banner__content">
                    <h1>Register</h1>
                </div>
            </div>
        </div>
    </section>
    <!--================ Hero sm banner end =================-->

    <!-- ================ contact section start ================= -->
    <section class="section-margin--small section-margin">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form method="POST" action="{{ route('register') }}" class="form-contact contact_form"
                        novalidate="novalidate">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <!-- Name -->
                                <div class="form-group">
                                    <input class="form-control border @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" type="text" placeholder="Enter your name" required
                                        autofocus autocomplete="name">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <!-- Email Address -->
                                <div class="form-group">
                                    <input class="form-control border @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" type="email" placeholder="Enter email address"
                                        required autocomplete="username">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <!-- Password -->
                                <div class="form-group">
                                    <input class="form-control border @error('password') is-invalid @enderror"
                                        name="password" type="password" placeholder="Enter your password" required
                                        autocomplete="new-password">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <!-- Confirm Password -->
                                <div class="form-group">
                                    <input class="form-control border" name="password_confirmation" type="password"
                                        placeholder="Enter your password confirmation" required autocomplete="new-password">

                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center text-md-right mt-3">
                            <a href="{{ route('login') }}" class="mx-3"> Already have account?</a>
                            <button type="submit" class="button button--active button-contactForm">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->
@endsection

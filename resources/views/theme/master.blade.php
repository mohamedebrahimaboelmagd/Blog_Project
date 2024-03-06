<!DOCTYPE html>
<html lang="en">

@include('theme.partials.head')

<body>
    <!--================Header Menu Area =================-->
    @include('theme.partials.header')
    <!--================Header Menu Area =================-->

    <main class="site-main">
        <!--================Hero Banner start =================-->
        @yield('hero-banner')
        <!--================Hero Banner end =================-->


        <!--================ Blog slider start =================-->
        @yield('blog-slider')
        <!--================ Blog slider end =================-->


        <!--================ Start Blog Post Area =================-->

        <!--================ Contact start =================-->
        @yield('content')
        <!--================ Contact End =================-->


        <!-- Start Blog Post Siddebar -->
        @yield('blog-sidebar')
        <!-- End Blog Post Siddebar -->

        <!--================ End Blog Post Area =================-->
    </main>

    <!--================ Start Footer Area =================-->
    @include('theme.partials.footer')
    <!--================ End Footer Area =================-->

    @include('theme.partials.scripts')
</body>

</html>

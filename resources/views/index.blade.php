<!DOCTYPE html>
<html lang="en">
@include('layout/head')

<body>
    @include('layout/sidebar')
    <main id="main" class="main">
        @yield('content')
    </main>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    @include('layout/js')
</body>

</html>
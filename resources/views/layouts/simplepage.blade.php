<!doctype html>
<html class="fixed">
@include('layouts.header')
<body>
    <section class="body">
    @include('layouts.top')
    <div class="inner-wrapper">
    @include('layouts.sidebar')
    <section role="main" class="content-body">
        @yield('content')
    </section>
</div>
    @include('layouts.footer')
</body>
</html>

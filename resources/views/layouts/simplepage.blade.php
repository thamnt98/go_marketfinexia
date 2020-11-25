<!doctype html>
<html class="fixed">
@include('layouts.header')
<body>
    <section class="body">
    @include('layouts.top')
    <div class="inner-wrapper">
    @include('layouts.sidebar')
    <section role="main" class="content-body">
        <header class="page-header">
            <h2>{{ $pageName }}</h2>
            <div class="right-wrapper pull-right">
                <ol class="breadcrumbs">
                    <li>
                        <a href="index.html">
                            <i class="fa fa-home"></i>
                        </a>
                    </li>
                    <li><span>{{ $parent }}</span></li>
                    <li><span>{{ $children }}</span></li>
                </ol>
                <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
            </div>
        </header>
        @yield('content')
    </section>
</div>
    @include('layouts.footer')
</body>
</html>
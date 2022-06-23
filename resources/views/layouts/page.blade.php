<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>@hasSection('seo_title')@yield('seo_title')@else{{ settings()->get("page_title") }} - @yield('meta_title')@endif</title>

    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@hasSection('seo_description')@yield('seo_description')@else{{ settings()->get("page_description") }}@endif">
    <meta name="robots" content="@hasSection('seo_robots')@yield('seo_robots')@else{{ settings()->get("page_robots") }}@endif">
    <meta name="author" content="{{ settings()->get("page_author") }}">

    @hasSection('opengraph')@yield('opengraph')@endif
    @hasSection('schema')@yield('schema')@endif

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

    @stack('style')

</head>
<body class="{{ !empty($body_class) ? $body_class : '' }}">
<div id="pagecontent">
    <div class="header-holder">
        <header>
            <div class="container">
                <div class="col-12">
                    <div id="logo">
                        <a href="/">
                            <img src="{{ asset('/gfx/logo.png') }}" alt="">
                        </a>
                    </div>
                </div>

                <div class="col-12">
                    <nav>
                        <ul class="mainmenu mb-0 list-unstyled">
                            <li><a href="/#investment"><span>O inwestycji</span></a></li>
                            <li><a href="/#plan"><span>Mieszkania</span></a></li>
                            <li><a href="/#gallery"><span>Galeria</span></a></li>
                            <li><a href="/#localtion"><span>Lokalizacja</span></a></li>
                            <li><a href="/#contact"><span>Kontakt</span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>

        <aside>
            <div id="calltous">
                <a href="tel:"><i class="las la-phone"></i> +48 888 555 222</a>
            </div>
        </aside>
    </div>

    <div class="page-holder">

    <div id="page">
        @yield('content')
    </div>

    @include('layouts.partials.footer')

    <!-- end of page-holder -->
    </div>
</div>

@include('layouts.partials.cookies')

@include('inline.modal')

<!-- jQuery -->
<script src="{{ asset('/js/jquery.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('/js/bootstrap.bundle.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('/js/app.js') }}" charset="utf-8"></script>

@stack('scripts')

<script type="text/javascript">
    $(document).ready(function(){

    });
</script>
</body>
</html>

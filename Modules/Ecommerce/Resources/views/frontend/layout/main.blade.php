@php

    $all_categories = $categories_list->where('featured', 1);

    $parents = $all_categories->whereNull('parent_id')->pluck('id')->toArray();

    $total_qty = session()->has('total_qty') ? session()->get('total_qty') : 0;
    $subTotal = session()->has('subTotal') ? session()->get('subTotal') : 0;

@endphp
{{-- {{ asset('modules/ecommerce/assets') }} --}}
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Document Title -->
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')" />
    <meta name="author" content="LionCoders" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta property="og:url" content="{{ Request::url() }}" />
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:description" content="@yield('description')" />
    @if (request()->is('product/*'))
        <meta property="og:image" content="@yield('image')" />
        <meta property="product:image_link" content="@yield('image')">
        <meta property="product:brand" content="@yield('brand')">
        <meta property="product:availability" content="in stock">
        <meta property="product:condition" content="new">
        <meta property="product:price:amount" content="@yield('price')">
        <meta property="product:price:currency" content="{{ $currency->code }}">
        <meta property="product:retailer_item_id" content="@yield('id')">
        <meta property="product:item_group_id" content="@yield('category_id')">
    @else
        <meta property="og:image" content="https://www.lion-coders.com/frontend/images/slider/slide-2.png" />
    @endif

    <link rel="icon" type="image/ico" href="{{ url('frontend/images') }}/{{ $ecommerce_setting->favicon ?? '' }}" />

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0"
        rel="stylesheet" />

    <link
        href="https://fonts.googleapis.com/css2?family={{ $ecommerce_setting->theme_font ?? 'Inter' }}:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">


    <!-- Template CSS -->
    <link rel="stylesheet" href="modules/ecommerce/assets/css/plugins/animate.min.css" />
    <link rel="stylesheet" href="{{ asset('modules/ecommerce/css/plugins/animate.min.css') }}">

    <link rel="stylesheet" href="{{ asset('modules/ecommerce/assets/css/main.css?v=5.6') }}" />
</head>

<body>


    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img src="{{ asset('modules/ecommerce/assets/imgs/theme/loading.gif') }}" alt="" />
                </div>
            </div>
        </div>
    </div>

    @include('ecommerce::frontend.layout.header.header')
    <main class="main">
        @yield('content')

    </main>

    @include('ecommerce::frontend.layout.footer.footer')


    <!-- Vendor JS -->
    <script src="{{ asset('modules/ecommerce/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('modules/ecommerce/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('modules/ecommerce/assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ asset('modules/ecommerce/assets/js/vendor/bootstrap.bundle.min.js') }}"></script>

    <!-- Plugin JS -->
    <script src="{{ asset('modules/ecommerce/assets/js/plugins/slick.js') }}"></script>
    <script src="{{ asset('modules/ecommerce/assets/js/plugins/jquery.syotimer.min.js') }}"></script>
    <script src="{{ asset('modules/ecommerce/assets/js/plugins/waypoints.js') }}"></script>
    <script src="{{ asset('modules/ecommerce/assets/js/plugins/wow.js') }}"></script>
    <script src="{{ asset('modules/ecommerce/assets/js/plugins/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('modules/ecommerce/assets/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ asset('modules/ecommerce/assets/js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('modules/ecommerce/assets/js/plugins/counterup.js') }}"></script>
    <script src="{{ asset('modules/ecommerce/assets/js/plugins/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('modules/ecommerce/assets/js/plugins/images-loaded.js') }}"></script>
    <script src="{{ asset('modules/ecommerce/assets/js/plugins/isotope.js') }}"></script>
    <script src="{{ asset('modules/ecommerce/assets/js/plugins/scrollup.js') }}"></script>
    <script src="{{ asset('modules/ecommerce/assets/js/plugins/jquery.vticker-min.js') }}"></script>
    <script src="{{ asset('modules/ecommerce/assets/js/plugins/jquery.theia.sticky.js') }}"></script>
    <script src="{{ asset('modules/ecommerce/assets/js/plugins/jquery.elevatezoom.js') }}"></script>

    <!-- Template JS -->
    <script src="{{ asset('modules/ecommerce/assets/js/main.js?v=5.6') }}"></script>
    <script src="{{ asset('modules/ecommerce/assets/js/shop.js?v=5.6') }}"></script>
</body>

</html>

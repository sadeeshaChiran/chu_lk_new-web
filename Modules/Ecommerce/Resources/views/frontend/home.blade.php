@extends('ecommerce::frontend.layout.main')

@section('title')
    {{ $ecommerce_setting->site_title ?? '' }}
@endsection

@section('description')
    {{ '' }}
@endsection

@php

    $all_categories = $categories_list->where('featured', 1);

    $parents = $all_categories->whereNull('parent_id')->pluck('id')->toArray();

    $total_qty = session()->has('total_qty') ? session()->get('total_qty') : 0;
    $subTotal = session()->has('subTotal') ? session()->get('subTotal') : 0;

    // $top_categories = DB::table('categories')
    //     ->select('categories.*', DB::raw('SUM(product_sales.qty) as total_sold'))
    //     ->join('products', 'products.category_id', '=', 'categories.id')
    //     ->join('product_sales', 'product_sales.product_id', '=', 'products.id')
    //     ->where('categories.is_active', 1)
    //     ->groupBy('categories.id')
    //     ->orderByDesc('total_sold')
    //     ->take(6)
    //     ->get();

    // // For each category, get top products
    // $popular_products_by_category = [];
    // foreach ($top_categories as $cat) {
    //     $popular_products_by_category[$cat->id] = DB::table('products')
    //         ->join('product_sales', 'product_sales.product_id', '=', 'products.id')
    //         ->select('products.*', DB::raw('SUM(product_sales.qty) as sold_count'))
    //         ->where('products.category_id', $cat->id)
    //         ->where('products.is_active', 1)
    //         ->where('products.is_online', 1)
    //         ->groupBy('products.id')
    //         ->orderByDesc('sold_count')
    //         ->limit(10)
    //         ->get();
    // }

    // // Featured products
    // $featured_products = DB::table('products')
    //     ->where('is_active', 1)
    //     ->where('is_online', 1)
    //     ->where('featured', 1)
    //     ->orderBy('id', 'desc')
    //     ->limit(10)
    //     ->get();

    // // Popular products (based on total sales)
    // $popular_products = DB::table('products')
    //     ->join('product_sales', 'product_sales.product_id', '=', 'products.id')
    //     ->select('products.*', DB::raw('SUM(product_sales.qty) as total_sold'))
    //     ->where('products.is_active', 1)
    //     ->where('products.is_online', 1)
    //     ->groupBy('products.id')
    //     ->orderByDesc('total_sold')
    //     ->limit(10)
    //     ->get();

    // // New added products
    // $new_products = DB::table('products')
    //     ->where('is_active', 1)
    //     ->where('is_online', 1)
    //     ->orderBy('created_at', 'desc')
    //     ->limit(10)
    //     ->get();

    // $topSelling = DB::table('products')
    //     ->join('product_sales', 'product_sales.product_id', '=', 'products.id')
    //     ->select('products.*', DB::raw('COUNT(product_sales.product_id) as total_sales'))
    //     ->join('sales', 'product_sales.product_id', '=', 'products.id')
    //     ->groupBy('products.id')
    //     ->orderByDesc('total_sales')
    //     ->limit(3)
    //     ->get();

    // $trending = DB::table('products')->where('is_trending', 1)->orderByDesc('updated_at')->limit(3)->get();

    // $recentlyAdded = DB::table('products')->orderByDesc('created_at')->limit(3)->get();

    // $topRated = DB::table('products')->where('rating', '>=', 4)->orderByDesc('rating')->limit(3)->get();
@endphp
@section('content')
    <section class="home-slider position-relative mb-30">
        <div class="container">
            <div class="home-slide-cover mt-30">
                <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1">
                    <div class="single-hero-slider single-animation-wrap"
                        style="background-image: url({{ asset('modules/ecommerce/assets/imgs/slider/slider-1.png') }})">
                        <div class="slider-content">
                            <h1 class="display-2 mb-40">
                                Don’t miss amazing<br />
                                grocery deals
                            </h1>
                            <p class="mb-65">Sign up for the daily newsletter</p>
                            <form class="form-subcriber d-flex">
                                <input type="email" placeholder="Your emaill address" />
                                <button class="btn" type="submit">Subscribe</button>
                            </form>
                        </div>
                    </div>
                    <div class="single-hero-slider single-animation-wrap"
                        style="background-image: url({{ asset('modules/ecommerce/assets/imgs/slider/slider-2.png') }})">
                        <div class="slider-content">
                            <h1 class="display-2 mb-40">
                                Fresh Vegetables<br />
                                Big discount
                            </h1>
                            <p class="mb-65">Save up to 50% off on your first order</p>
                            <form class="form-subcriber d-flex">
                                <input type="email" placeholder="Your emaill address" />
                                <button class="btn" type="submit">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="slider-arrow hero-slider-1-arrow"></div>
            </div>
        </div>
    </section>

    <section class="popular-categories section-padding">
        <div class="container wow animate__animated animate__fadeIn">
            <div class="section-title">
                <div class="title">
                    <h3>Featured Categories</h3>
                    <ul class="list-inline nav nav-tabs links">
                        @foreach ($all_categories->where('is_active', 1)->where('parents', null)->take(4) as $category)
                            <li class="list-inline-item nav-item">
                                <a class="nav-link {{ $loop->first ? 'active' : '' }}"
                                    href="{{ url('shop/' . $category->slug) }}">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="slider-arrow slider-arrow-2 flex-right carausel-10-columns-arrow"
                    id="carausel-10-columns-arrows"></div>
            </div>

            <div class="carausel-10-columns-cover position-relative">
                <div class="carausel-10-columns" id="carausel-10-columns">
                    @php $delay = 0.1; @endphp
                    @foreach ($all_categories->where('is_active', 1) as $category)
                        @if (in_array($category->id, $parents))
                            <div class="card-2 wow animate__animated animate__fadeInUp"
                                data-wow-delay="{{ $delay }}s">
                                <figure class="img-hover-scale overflow-hidden">
                                    <a href="{{ url('shop/' . $category->slug) }}">

                                        @if ($category->icon)
                                            <img src="{{ url('images/category/icons/') }}/{{ $category->icon }}"
                                                alt="{{ $category->name }}" />
                                        @else
                                            <img src="{{ url('images/product/nullImage1.jpg') }}" alt="default" />
                                        @endif
                                    </a>
                                </figure>
                                <h6>
                                    <a href="{{ url('shop/' . $category->slug) }}">{{ $category->name }}</a>
                                </h6>
                                <span>{{ $category->products_count ?? 0 }} items</span>
                            </div>
                            @php $delay += 0.1; @endphp
                        @endif
                    @endforeach
                </div>
            </div>

        </div>
    </section>



    @if (isset($widgets))
        @foreach ($widgets as $widget)
            @if ($widget->name == 'three-c-banner-widget')
                <section class="banners mb-25">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay="0">
                                    <img src="{{ url('frontend/images/banners/') }}/{{ $widget->three_c_banner_image1 }}"
                                        alt="" />
                                    {{-- <div class="banner-text">
                                        <h4>
                                            Everyday Fresh & <br />Clean with Our<br />
                                            Products
                                        </h4>
                                        <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i
                                                class="fi-rs-arrow-small-right"></i></a>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                                    <img src="{{ url('frontend/images/banners/') }}/{{ $widget->three_c_banner_image2 }}"
                                        alt="" />
                                    {{-- <div class="banner-text">
                                        <h4>
                                            Make your Breakfast<br />
                                            Healthy and Easy
                                        </h4>
                                        <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i
                                                class="fi-rs-arrow-small-right"></i></a>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="col-lg-4 d-md-none d-lg-flex">
                                <div class="banner-img mb-sm-0 wow animate__animated animate__fadeInUp"
                                    data-wow-delay=".4s">
                                    <img src="{{ url('frontend/images/banners/') }}/{{ $widget->three_c_banner_image3 }}"
                                        alt="" />
                                    {{-- <div class="banner-text">
                                        <h4>The best Organic <br />Products Online</h4>
                                        <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i
                                                class="fi-rs-arrow-small-right"></i></a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @endif

        @endforeach
    @endif


    <section class="product-tabs section-padding position-relative">
        <div class="container">
            <div class="section-title style-2 wow animate__animated animate__fadeIn">
                <h3>Popular Products</h3>
                <ul class="nav nav-tabs links" id="myTab" role="tablist">
                    @foreach ($top_categories as $index => $category)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ $index == 0 ? 'active' : '' }}" id="nav-tab-{{ $category->id }}"
                                data-bs-toggle="tab" data-bs-target="#tab-{{ $category->id }}" type="button"
                                role="tab" aria-controls="tab-{{ $category->id }}"
                                aria-selected="{{ $index == 0 ? 'true' : 'false' }}">
                                {{ $category->name }}
                            </button>
                        </li>
                    @endforeach
                </ul>

            </div>

            <div class="tab-content" id="myTabContent">
                @foreach ($top_categories as $index => $category)
                    <div class="tab-pane fade {{ $index == 0 ? 'show active' : '' }}" id="tab-{{ $category->id }}"
                        role="tabpanel" aria-labelledby="nav-tab-{{ $category->id }}">

                        <div class="row product-grid-4">
                            @foreach ($popular_products_by_category[$category->id] as $product)
                                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                    <div class="product-cart-wrap mb-30 {{ $index == 0 ? 'wow animate__animated animate__fadeIn' : '' }}"
                                        @if ($index == 0) data-wow-delay=".{{ $loop->iteration }}s" @endif>

                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="{{ url('product/' . $product->id) }}">
                                                    @if ($product->image)
                                                        @php
                                                            $images = explode(',', $product->image);
                                                            $product->image = $images[0];
                                                        @endphp
                                                        <img loading="lazy" class="default-img"
                                                            data-src="{{ url('images/product/') }}/{{ $product->image }}"
                                                            alt="{{ $product->name }}">
                                                    @else
                                                        <img loading="lazy" class="default-img"
                                                            src="{{ url('images/product/nullImage1.jpg') }}"
                                                            alt="{{ $product->name }}">
                                                    @endif
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap">
                                            <h2><a href="{{ url('product/' . $product->id) }}">{{ $product->name }}</a>
                                            </h2>
                                            <div class="product-card-bottom">
                                                <div class="product-price">
                                                    <span>Rs. {{ number_format($product->online_price, 2) }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section-padding pb-5 wow animate__animated animate__fadeIn">
        <div class="container">
            <div class="section-title">
                <h3 class="">Daily Best Sells</h3>
                <ul class="nav nav-tabs links" id="myTab-2" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="nav-tab-one-1" data-bs-toggle="tab"
                            data-bs-target="#tab-one-1" type="button" role="tab" aria-controls="tab-one"
                            aria-selected="true">Featured</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="nav-tab-two-1" data-bs-toggle="tab" data-bs-target="#tab-two-1"
                            type="button" role="tab" aria-controls="tab-two" aria-selected="false">Popular</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="nav-tab-three-1" data-bs-toggle="tab" data-bs-target="#tab-three-1"
                            type="button" role="tab" aria-controls="tab-three" aria-selected="false">New
                            added</button>
                    </li>
                </ul>
            </div>

            <div class="row">
                <div class="col-lg-3 d-none d-lg-flex">
                    <div class="banner-img style-2">
                        <div class="banner-text">
                            <h2 class="mb-100">Bring nature into your home</h2>
                            <a href="{{ url('shop') }}" class="btn btn-xs">Shop Now <i
                                    class="fi-rs-arrow-small-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9 col-md-12" data-wow-delay=".4s">
                    <div class="tab-content" id="myTabContent-1">

                        {{-- Featured --}}
                        <div class="tab-pane fade show active" id="tab-one-1" role="tabpanel"
                            aria-labelledby="tab-one-1">
                            <div class="carausel-4-columns-cover arrow-center position-relative">
                                <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow"
                                    id="carausel-4-columns-arrows"></div>
                                <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns">
                                    @foreach ($featured_products as $product)
                                        <div class="product-cart-wrap">
                                            <div class="product-cart-wrap">
                                                <div class="product-img-action-wrap">
                                                    <div class="product-img product-img-zoom">
                                                        <a href="shop-product-right.html">
                                                            @if ($product->image)
                                                                @php
                                                                    $images = explode(',', $product->image);
                                                                @endphp
                                                                <img class="default-img"
                                                                    src="{{ url('images/product/') }}/{{ $images[0] }}"
                                                                    alt="{{ $product->name }}" />
                                                                @if (isset($images[1]) && !empty($images[1]))
                                                                    <img class="hover-img"
                                                                        src="{{ url('images/product/' . $images[1]) }}"
                                                                        alt="{{ $product->name }}" />
                                                                @endif
                                                            @else
                                                                <img loading="lazy" class="default-img"
                                                                    src="{{ url('images/product/nullImage1.jpg') }}"
                                                                    alt="{{ $product->name }}">
                                                            @endif
                                                        </a>
                                                    </div>
                                                    <div class="product-action-1">
                                                        <a aria-label="Quick view" class="action-btn small hover-up"
                                                            data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i
                                                                class="fi-rs-eye"></i></a>
                                                        <a aria-label="Add To Wishlist" class="action-btn small hover-up"
                                                            href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                        <a aria-label="Compare" class="action-btn small hover-up"
                                                            href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                                    </div>
                                                    <div class="product-badges product-badges-position product-badges-mrg">
                                                        <span class="hot">Save 15%</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="product-content-wrap">
                                                <div class="product-category">
                                                    <a href="shop-grid-right.html">Category</a>
                                                </div>
                                                <h2><a href="shop-product-right.html">{{ $product->name }}</a>
                                                </h2>
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 80%"></div>
                                                </div>
                                                
                                                <div class="product-price mt-10">
                                                    <span>Rs. {{ number_format($product->online_price, 2) }} </span>
                                                    <span class="old-price">Rs.
                                                        {{ number_format($product->retail_price, 2) }}</span>
                                                </div>
                                                {{-- <div class="sold mt-15 mb-15">
                                                <div class="progress mb-5">
                                                    <div class="progress-bar" role="progressbar" style="width: 50%"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span class="font-xs text-heading"> Sold: 90/120</span>
                                            </div> --}}
                                                <a href="shop-cart.html" class="btn w-100 hover-up"><i
                                                        class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        {{-- Popular --}}
                        <div class="tab-pane fade" id="tab-two-1" role="tabpanel" aria-labelledby="tab-two-1">
                            <div class="carausel-4-columns-cover arrow-center position-relative">
                                <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow"
                                    id="carausel-4-columns-2-arrows"></div>
                                <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns-2">
                                    @foreach ($popular_products as $product)
                                        <div class="product-cart-wrap">
                                            <div class="product-cart-wrap">
                                                <div class="product-img-action-wrap">
                                                    <div class="product-img product-img-zoom">
                                                        <a href="shop-product-right.html">
                                                            @if ($product->image)
                                                                @php
                                                                    $images = explode(',', $product->image);
                                                                @endphp
                                                                <img class="default-img"
                                                                    src="{{ url('images/product/') }}/{{ $images[0] }}"
                                                                    alt="{{ $product->name }}" />
                                                                @if (isset($images[1]) && !empty($images[1]))
                                                                    <img class="hover-img"
                                                                        src="{{ url('images/product/' . $images[1]) }}"
                                                                        alt="{{ $product->name }}" />
                                                                @endif
                                                            @else
                                                                <img loading="lazy" class="default-img"
                                                                    src="{{ url('images/product/nullImage1.jpg') }}"
                                                                    alt="{{ $product->name }}">
                                                            @endif
                                                        </a>
                                                    </div>
                                                    <div class="product-action-1">
                                                        <a aria-label="Quick view" class="action-btn small hover-up"
                                                            data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i
                                                                class="fi-rs-eye"></i></a>
                                                        <a aria-label="Add To Wishlist" class="action-btn small hover-up"
                                                            href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                        <a aria-label="Compare" class="action-btn small hover-up"
                                                            href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                                    </div>
                                                    <div class="product-badges product-badges-position product-badges-mrg">
                                                        <span class="hot">Save 15%</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="product-content-wrap">
                                                <div class="product-category">
                                                    <a href="shop-grid-right.html">Category</a>
                                                </div>
                                                <h2><a href="shop-product-right.html">{{ $product->name }}</a>
                                                </h2>
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 80%"></div>
                                                </div>
                                                <div class="product-price mt-10">
                                                    <span>Rs. {{ number_format($product->online_price, 2) }} </span>
                                                    <span class="old-price">Rs.
                                                        {{ number_format($product->retail_price, 2) }}</span>
                                                </div>
                                                {{-- <div class="sold mt-15 mb-15">
                                                <div class="progress mb-5">
                                                    <div class="progress-bar" role="progressbar" style="width: 50%"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span class="font-xs text-heading"> Sold: 90/120</span>
                                            </div> --}}
                                                <a href="shop-cart.html" class="btn w-100 hover-up"><i
                                                        class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        {{-- New added --}}
                        <div class="tab-pane fade" id="tab-three-1" role="tabpanel" aria-labelledby="tab-three-1">
                            <div class="carausel-4-columns-cover arrow-center position-relative">
                                <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow"
                                    id="carausel-4-columns-3-arrows"></div>
                                <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns-3">
                                    @foreach ($new_products as $product)
                                        <div class="product-cart-wrap">
                                            <div class="product-cart-wrap">
                                                <div class="product-img-action-wrap">
                                                    <div class="product-img product-img-zoom">
                                                        <a href="shop-product-right.html">
                                                            @if ($product->image)
                                                                @php
                                                                    $images = explode(',', $product->image);
                                                                @endphp
                                                                <img class="default-img"
                                                                    src="{{ url('images/product/') }}/{{ $images[0] }}"
                                                                    alt="{{ $product->name }}" />
                                                                @if (isset($images[1]) && !empty($images[1]))
                                                                    <img class="hover-img"
                                                                        src="{{ url('images/product/' . $images[1]) }}"
                                                                        alt="{{ $product->name }}" />
                                                                @endif
                                                            @else
                                                                <img loading="lazy" class="default-img"
                                                                    src="{{ url('images/product/nullImage1.jpg') }}"
                                                                    alt="{{ $product->name }}">
                                                            @endif
                                                        </a>
                                                    </div>
                                                    <div class="product-action-1">
                                                        <a aria-label="Quick view" class="action-btn small hover-up"
                                                            data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i
                                                                class="fi-rs-eye"></i></a>
                                                        <a aria-label="Add To Wishlist" class="action-btn small hover-up"
                                                            href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                        <a aria-label="Compare" class="action-btn small hover-up"
                                                            href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                                    </div>
                                                    <div class="product-badges product-badges-position product-badges-mrg">
                                                        <span class="hot">Save 15%</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="product-content-wrap">
                                                <div class="product-category">
                                                    <a href="shop-grid-right.html">Category</a>
                                                </div>
                                                <h2><a href="shop-product-right.html">{{ $product->name }}</a>
                                                </h2>
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 80%"></div>
                                                </div>
                                                <div class="product-price mt-10">
                                                    <span>Rs. {{ number_format($product->online_price, 2) }} </span>
                                                    <span class="old-price">Rs.
                                                        {{ number_format($product->retail_price, 2) }}</span>
                                                </div>
                                                {{-- <div class="sold mt-15 mb-15">
                                                <div class="progress mb-5">
                                                    <div class="progress-bar" role="progressbar" style="width: 50%"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span class="font-xs text-heading"> Sold: 90/120</span>
                                            </div> --}}
                                                <a href="shop-cart.html" class="btn w-100 hover-up"><i
                                                        class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div> <!-- End tab-content -->
                </div> <!-- End Col -->
            </div>
        </div>
    </section>





@endsection




@section('script')
@endsection

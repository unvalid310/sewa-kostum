@extends('default.default_layout')
@section('content')
    <!-- Hero/Intro Slider Start -->
    <div class="section">
        <div class="hero-slider">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <!-- Single Hero Slider Item Start -->
                    <div class="hero-slide-item-two swiper-slide">

                        <!-- Hero Slider Background Image Start-->
                        <div class="hero-slide-bg">
                            <img src="{{ asset('default/assets/images/slider/slide-2.jpg') }}" alt="" />
                        </div>
                        <!-- Hero Slider Background Image End-->

                        <!-- Hero Slider Container Start -->
                        <div class="container">

                            <div class="row">
                                <div class="hero-slide-content col-lg-8 col-xl-6 col-12 text-lg-center text-left">
                                    <h2 class="title">
                                        Fashion New <br />
                                        Collection
                                    </h2>
                                    <p>Up to 70% off selected Product</p>
                                    <a href="shop-grid.html" class="btn btn-lg btn-primary btn-hover-dark">Shop Now</a>
                                </div>
                            </div>

                        </div>
                        <!-- Hero Slider Container End -->

                    </div>
                    <!-- Single Hero Slider Item End -->

                    <!-- Single Hero Slider Item Start -->
                    <div class="hero-slide-item-two swiper-slide">

                        <!-- Hero Slider Background Image Start -->
                        <div class="hero-slide-bg">
                            <img src="{{ asset('default/assets/images/slider/slide-2.jpg') }}" alt="" />
                        </div>
                        <!-- Hero Slider Background Image End -->

                        <!-- Hero Slider Container Start -->
                        <div class="container">
                            <div class="row">
                                <div class="hero-slide-content col-lg-8 col-xl-6 col-12 text-lg-center text-left">
                                    <h2 class="title">
                                        Trend Fashion <br />
                                        Collection
                                    </h2>
                                    <p>Up to 30% off selected Product</p>
                                    <a href="shop-grid.html" class="btn btn-lg btn-primary btn-hover-dark">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <!-- Hero Slider Container End -->

                    </div>
                    <!-- Single Hero Slider Item End -->
                </div>

                <!-- Swiper Pagination Start -->
                <div class="swiper-pagination d-md-none"></div>
                <!-- Swiper Pagination End -->

                <!-- Swiper Navigation Start -->
                <div class="home-slider-prev swiper-button-prev main-slider-nav d-md-flex d-none"><i
                        class="pe-7s-angle-left"></i></div>
                <div class="home-slider-next swiper-button-next main-slider-nav d-md-flex d-none"><i
                        class="pe-7s-angle-right"></i></div>
                <!-- Swiper Navigation End -->

            </div>
        </div>
    </div>
    <!-- Hero/Intro Slider End -->

    <!-- Feature Section Start -->
    <div class="section section-margin">
        <div class="container">
            <div class="feature-wrap">
                <div class="row row-cols-lg-4 row-cols-xl-auto row-cols-sm-2 row-cols-1 justify-content-between mb-n5">
                    <!-- Feature Start -->
                    <div class="col mb-5" data-aos="fade-up" data-aos-delay="300">
                        <div class="feature">
                            <div class="icon text-primary align-self-center">
                                <img src="{{ asset('default/assets/images/icons/feature-icon-2.png') }}" alt="Feature Icon">
                            </div>
                            <div class="content">
                                <h5 class="title">Pengiriman Gratis</h5>
                                <p>Gratis pengirirman semua pesanan</p>
                            </div>
                        </div>
                    </div>
                    <!-- Feature End -->

                    <!-- Feature Start -->
                    <div class="col mb-5" data-aos="fade-up" data-aos-delay="500">
                        <div class="feature">
                            <div class="icon text-primary align-self-center">
                                <img src="{{ asset('default/assets/images/icons/feature-icon-3.png') }}" alt="Feature Icon">
                            </div>
                            <div class="content">
                                <h5 class="title">Support 24/7</h5>
                                <p>Support 24 jam setiap hari</p>
                            </div>
                        </div>
                    </div>
                    <!-- Feature End -->
                    <!-- Feature Start -->
                    <div class="col mb-5" data-aos="fade-up" data-aos-delay="700">
                        <div class="feature">
                            <div class="icon text-primary align-self-center">
                                <img src="{{ asset('default/assets/images/icons/feature-icon-4.png') }}" alt="Feature Icon">
                            </div>
                            <div class="content">
                                <h5 class="title">Money Return</h5>
                                <p>Garansi uang kembali kurang dari 5 hari</p>
                            </div>
                        </div>
                    </div>
                    <!-- Feature End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Feature Section End -->

    <!-- Product Section Start -->
    <div class="section section-padding mt-0">
        <div class="container">
            <!-- Section Title & Tab Start -->
            <div class="row">
                <!-- Tab Start -->
                <div class="col-12">
                    <ul class="product-tab-nav nav justify-content-center mb-10 title-border-bottom mt-n3">
                        <?php
                        $i = 0;
                        ?>
                        @foreach ($categories as $_category)
                            <li class="nav-item" data-aos="fade-up" data-aos-delay="400"><a
                                    class="nav-link {{ $i > 0 ? '' : 'active' }} mt-3" data-bs-toggle="tab"
                                    href="#{{ $_category->slug }}">{{ $_category->category }}</a></li>

                            <?php $i++; ?>
                        @endforeach
                    </ul>
                </div>
                <!-- Tab End -->
            </div>
            <!-- Section Title & Tab End -->

            <!-- Products Tab Start -->
            <div class="row">
                <div class="col">
                    <div class="tab-content position-relative">
                        <div class="tab-pane fade show active" id="new-arrivals">
                            <div class="product-carousel">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        @for ($i = 0; $i < count($products); $i++)
                                            <div class="swiper-slide product-wrapper">
                                                @foreach ($products[$i] as $product)
                                                    <div class="product product-border-left mb-10" data-aos="fade-up"
                                                        data-aos-delay="300">
                                                        <div class="thumb">
                                                            <a href="single-product.html" class="image">
                                                                <img class="first-image"
                                                                    src="{{ asset('default/assets/uploads/product-1.jpg') }}"
                                                                    alt="Product" />
                                                                <img class="second-image"
                                                                    src="{{ asset('default/assets/uploads/product-1.jpg') }}"
                                                                    alt="Product" />
                                                            </a>
                                                            @if ($product->stock == 0)
                                                                <span class="badges">
                                                                    <span class="sale">Sold</span>
                                                                </span>
                                                            @endif
                                                            @if ($product->stock != '0' && $product->id_categories == '1')
                                                                <span class="badges">
                                                                    <span class="sale">New</span>
                                                                </span>
                                                            @endif
                                                            <div class="actions">
                                                                <a href="javascript:void(0)" class="action quickview"
                                                                    id="detail" data-id="{{ $product->id_products }}">
                                                                    <i class="pe-7s-search"></i>
                                                                </a>
                                                                <a href="#" class="action compare"><i
                                                                        class="pe-7s-shuffle"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="content">
                                                            <h5 class="title"><a
                                                                    href="single-product.html">{{ $product->name }}</a>
                                                            </h5>
                                                            <span class="ratings">
                                                                <span class="rating-wrap">
                                                                    <span class="star" style="width: 100%"></span>
                                                                </span>
                                                                <span class="rating-num">(4)</span>
                                                            </span>
                                                            <span class="price">
                                                                <span class="new">{{ rupiah($product->price) }}</span>
                                                                @if (!empty($product->old_price))
                                                                    <span
                                                                        class="old">{{ rupiah($product->old_price) }}</span>
                                                                @endif
                                                            </span>
                                                            <a class="btn btn-sm btn-outline-dark btn-hover-primary"
                                                                id="detail"
                                                                data-id="{{ $product->id_products }}">Tambah Keranjang</a>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endfor
                                    </div>

                                    <!-- Swiper Pagination Start -->
                                    <div class="swiper-pagination d-md-none"></div>
                                    <!-- Swiper Pagination End -->

                                    <!-- Next Previous Button Start -->
                                    <div
                                        class="swiper-product-button-next swiper-button-next swiper-button-white d-md-flex d-none">
                                        <i class="pe-7s-angle-right"></i>
                                    </div>
                                    <div
                                        class="swiper-product-button-prev swiper-button-prev swiper-button-white d-md-flex d-none">
                                        <i class="pe-7s-angle-left"></i>
                                    </div>
                                    <!-- Next Previous Button End -->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="most-popular">
                            <div class="product-carousel">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        @for ($i = 0; $i < count($popular); $i++)
                                            <div class="swiper-slide product-wrapper">
                                                @foreach ($popular[$i] as $product)
                                                    <div class="product product-border-left mb-10" data-aos="fade-up"
                                                        data-aos-delay="300">
                                                        <div class="thumb">
                                                            <a href="single-product.html" class="image">
                                                                <img class="first-image"
                                                                    src="{{ asset('default/assets/uploads/product-1.jpg') }}"
                                                                    alt="Product" />
                                                                <img class="second-image"
                                                                    src="{{ asset('default/assets/uploads/product-1.jpg') }}"
                                                                    alt="Product" />
                                                            </a>
                                                            @if ($product->stock == 0)
                                                                <span class="badges">
                                                                    <span class="sale">Sold</span>
                                                                </span>
                                                            @endif
                                                            @if ($product->stock != '0' && $product->id_categories == '1')
                                                                <span class="badges">
                                                                    <span class="sale">New</span>
                                                                </span>
                                                            @endif
                                                            <div class="actions">
                                                                <a href="javascript:void(0)" class="action quickview"
                                                                    id="detail" data-id="{{ $product->id_products }}">
                                                                    <i class="pe-7s-search"></i>
                                                                </a>
                                                                <a href="#" class="action compare"><i
                                                                        class="pe-7s-shuffle"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="content">
                                                            <h5 class="title"><a
                                                                    href="single-product.html">{{ $product->name }}</a>
                                                            </h5>
                                                            <span class="ratings">
                                                                <span class="rating-wrap">
                                                                    <span class="star" style="width: 100%"></span>
                                                                </span>
                                                                <span class="rating-num">(4)</span>
                                                            </span>
                                                            <span class="price">
                                                                <span class="new">{{ rupiah($product->price) }}</span>
                                                                @if (!empty($product->old_price))
                                                                    <span
                                                                        class="old">{{ rupiah($product->old_price) }}</span>
                                                                @endif
                                                            </span>
                                                            <a class="btn btn-sm btn-outline-dark btn-hover-primary"
                                                                id="detail"
                                                                data-id="{{ $product->id_products }}">Tambah Keranjang</a>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endfor
                                    </div>

                                    <!-- Swiper Pagination Start -->
                                    <div class="swiper-pagination d-md-none"></div>
                                    <!-- Swiper Pagination End -->

                                    <!-- Next Previous Button Start -->
                                    <div
                                        class="swiper-product-button-next swiper-button-next swiper-button-white d-md-flex d-none">
                                        <i class="pe-7s-angle-right"></i>
                                    </div>
                                    <div
                                        class="swiper-product-button-prev swiper-button-prev swiper-button-white d-md-flex d-none">
                                        <i class="pe-7s-angle-left"></i>
                                    </div>
                                    <!-- Next Previous Button End -->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="best-offers">
                            <div class="product-carousel">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        @for ($i = 0; $i < count($offer); $i++)
                                            <div class="swiper-slide product-wrapper">
                                                @foreach ($offer[$i] as $product)
                                                    <div class="product product-border-left mb-10" data-aos="fade-up"
                                                        data-aos-delay="300">
                                                        <div class="thumb">
                                                            <a href="single-product.html" class="image">
                                                                <img class="first-image"
                                                                    src="{{ asset('default/assets/uploads/product-1.jpg') }}"
                                                                    alt="Product" />
                                                                <img class="second-image"
                                                                    src="{{ asset('default/assets/uploads/product-1.jpg') }}"
                                                                    alt="Product" />
                                                            </a>
                                                            @if ($product->stock == 0)
                                                                <span class="badges">
                                                                    <span class="sale">Sold</span>
                                                                </span>
                                                            @endif
                                                            @if ($product->stock != '0' && $product->id_categories == '1')
                                                                <span class="badges">
                                                                    <span class="sale">New</span>
                                                                </span>
                                                            @endif
                                                            <div class="actions">
                                                                <a href="javascript:void(0)" class="action quickview"
                                                                    id="detail" data-id="{{ $product->id_products }}">
                                                                    <i class="pe-7s-search"></i>
                                                                </a>
                                                                <a href="#" class="action compare"><i
                                                                        class="pe-7s-shuffle"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="content">
                                                            <h5 class="title"><a
                                                                    href="single-product.html">{{ $product->name }}</a>
                                                            </h5>
                                                            <span class="ratings">
                                                                <span class="rating-wrap">
                                                                    <span class="star" style="width: 100%"></span>
                                                                </span>
                                                                <span class="rating-num">(4)</span>
                                                            </span>
                                                            <span class="price">
                                                                <span class="new">{{ rupiah($product->price) }}</span>
                                                                @if (!empty($product->old_price))
                                                                    <span
                                                                        class="old">{{ rupiah($product->old_price) }}</span>
                                                                @endif
                                                            </span>
                                                            <a class="btn btn-sm btn-outline-dark btn-hover-primary"
                                                                id="detail"
                                                                data-id="{{ $product->id_products }}">Tambah Keranjang</a>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endfor
                                    </div>

                                    <!-- Swiper Pagination Start -->
                                    <div class="swiper-pagination d-md-none"></div>
                                    <!-- Swiper Pagination End -->

                                    <!-- Next Previous Button Start -->
                                    <div
                                        class="swiper-product-button-next swiper-button-next swiper-button-white d-md-flex d-none">
                                        <i class="pe-7s-angle-right"></i>
                                    </div>
                                    <div
                                        class="swiper-product-button-prev swiper-button-prev swiper-button-white d-md-flex d-none">
                                        <i class="pe-7s-angle-left"></i>
                                    </div>
                                    <!-- Next Previous Button End -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Products Tab End -->
        </div>
    </div>
    <!-- Product Section End -->

    <!-- Product List Start -->
    <div class="section section-padding">
        <div class="container">
            <div class="row mb-n8">
                <div class="col-md-6 col-lg-4 col-12 mb-8" data-aos="fade-up" data-aos-delay="300">
                    <!-- Product List Title Start -->
                    <div class="product-list-title">
                        <h2 class="title pb-3 mb-0">Best Offer</h2>
                        <span></span>
                    </div>
                    <!-- Product List Title End -->

                    <!-- Product List Carousel Start -->
                    <div class="product-list-carousel">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                @for ($i = 0; $i < count($offer); $i++)
                                    <div class="swiper-slide product-list-wrapper mb-n6">
                                        @foreach ($offer[$i] as $product)
                                            <div class="single-product-list product-hover mb-6">
                                                <div class="thumb">
                                                    <a href="single-product.html" class="image">
                                                        <img class="first-image" src="{{ asset($product->image) }}"
                                                            alt="Product" width="100px" height="100px" />
                                                        <img class="second-image" src="{{ asset($product->image) }}"
                                                            alt="Product" width="100px" height="100px" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="title"><a
                                                            href="single-product.html">{{ $product->name }}</a></h5>
                                                    <span class="price">
                                                        <span class="new">{{ rupiah($product->price) }}</span>
                                                        @if ($product->old_price)
                                                            <span class="old">{{ rupiah($product->old_price) }}</span>
                                                        @endif
                                                    </span>
                                                    <span class="ratings">
                                                        <span class="rating-wrap">
                                                            <span class="star" style="width: 100%"></span>
                                                        </span>
                                                        <span class="rating-num">(4)</span>
                                                    </span>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endfor
                            </div>

                            <!-- Swiper Pagination Start -->
                            <!-- <div class="swiper-pagination d-md-none"></div> -->
                            <!-- Swiper Pagination End -->

                            <!-- Next Previous Button Start -->
                            <div class="swiper-product-list-next swiper-button-next"><i class="pe-7s-angle-right"></i>
                            </div>
                            <div class="swiper-product-list-prev swiper-button-prev"><i class="pe-7s-angle-left"></i>
                            </div>
                            <!-- Next Previous Button End -->

                        </div>
                    </div>
                    <!-- Product List Carousel End -->

                </div>
                <div class="col-md-6 col-lg-4 col-12 mb-8" data-aos="fade-up" data-aos-delay="500">
                    <!-- Product List Title Start -->
                    <div class="product-list-title">
                        <h2 class="title pb-3 mb-0">New Products</h2>
                        <span></span>
                    </div>
                    <!-- Product List Title End -->

                    <!-- Product List Start -->
                    <div class="product-list-carousel-2">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                @for ($i = 0; $i < count($arrival); $i++)
                                    <div class="swiper-slide product-list-wrapper mb-n6">
                                        @foreach ($arrival[$i] as $product)
                                            <div class="single-product-list product-hover mb-6">
                                                <div class="thumb">
                                                    <a href="single-product.html" class="image">
                                                        <img class="first-image" src="{{ asset($product->image) }}"
                                                            alt="Product" width="100px" height="100px" />
                                                        <img class="second-image" src="{{ asset($product->image) }}"
                                                            alt="Product" width="100px" height="100px" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="title"><a
                                                            href="single-product.html">{{ $product->name }}</a></h5>
                                                    <span class="price">
                                                        <span class="new">{{ rupiah($product->price) }}</span>
                                                        @if ($product->old_price)
                                                            <span class="old">{{ rupiah($product->old_price) }}</span>
                                                        @endif
                                                    </span>
                                                    <span class="ratings">
                                                        <span class="rating-wrap">
                                                            <span class="star" style="width: 100%"></span>
                                                        </span>
                                                        <span class="rating-num">(4)</span>
                                                    </span>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endfor
                            </div>

                            <!-- Swiper Pagination Start -->
                            <!-- <div class="swiper-pagination d-md-none"></div> -->
                            <!-- Swiper Pagination End -->

                            <!-- Next Previous Button Start -->
                            <div class="swiper-product-list-next swiper-button-next"><i class="pe-7s-angle-right"></i>
                            </div>
                            <div class="swiper-product-list-prev swiper-button-prev"><i class="pe-7s-angle-left"></i>
                            </div>
                            <!-- Next Previous Button End -->
                        </div>
                    </div>
                    <!-- Product List End -->
                </div>
                <div class="col-md-6 col-lg-4 col-12 mb-8" data-aos="fade-up" data-aos-delay="700">
                    <!-- Product List Title Start -->
                    <div class="product-list-title">
                        <h2 class="title pb-3 mb-0">Most Populars {{ count($popular) }}</h2>
                        <span></span>
                    </div>
                    <!-- Product List Title End -->

                    <!-- Product List Start -->
                    <div class="product-list-carousel-3">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                @for ($i = 0; $i < count($popular); $i++)
                                    <div class="swiper-slide product-list-wrapper mb-n6">
                                        @foreach ($popular[$i] as $product)
                                            <div class="single-product-list product-hover mb-6">
                                                <div class="thumb">
                                                    <a href="single-product.html" class="image">
                                                        <img class="first-image" src="{{ asset($product->image) }}"
                                                            alt="Product" width="100px" height="100px" />
                                                        <img class="second-image" src="{{ asset($product->image) }}"
                                                            alt="Product" width="100px" height="100px" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="title"><a
                                                            href="single-product.html">{{ $product->name }}</a></h5>
                                                    <span class="price">
                                                        <span class="new">{{ rupiah($product->price) }}</span>
                                                        @if ($product->old_price)
                                                            <span class="old">{{ rupiah($product->old_price) }}</span>
                                                        @endif
                                                    </span>
                                                    <span class="ratings">
                                                        <span class="rating-wrap">
                                                            <span class="star" style="width: 100%"></span>
                                                        </span>
                                                        <span class="rating-num">(4)</span>
                                                    </span>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endfor
                            </div>

                            <!-- Swiper Pagination Start -->
                            <!-- <div class="swiper-pagination d-md-none"></div> -->
                            <!-- Swiper Pagination End -->

                            <!-- Next Previous Button Start -->
                            <div class="swiper-product-list-next swiper-button-next"><i class="pe-7s-angle-right"></i>
                            </div>
                            <div class="swiper-product-list-prev swiper-button-prev"><i class="pe-7s-angle-left"></i>
                            </div>
                            <!-- Next Previous Button End -->

                        </div>
                    </div>
                    <!-- Product List End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Product List End -->
@endsection

@extends('default.default_layout')
@section('content')
    <!-- Breadcrumb Section Start -->
    <div class="section">

        <!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area bg-light">
            <div class="container-fluid">
                <div class="breadcrumb-content text-center">
                    <h1 class="title">Produk</h1>
                    <ul>
                        <li>
                            <a href="/">Home </a>
                        </li>
                        <li class="active"> produk</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Area End -->

    </div>
    <!-- Breadcrumb Section End -->

    <!-- Shop Section Start -->
    <div class="section section-margin">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <!--shop toolbar start-->
                    <div class="shop_toolbar_wrapper flex-column flex-md-row mb-10">

                        <!-- Shop Top Bar Left start -->
                        <div class="shop-top-bar-left mb-md-0 mb-2">
                        </div>
                        <!-- Shop Top Bar Left end -->

                        <!-- Shopt Top Bar Right Start -->
                        <div class="shop-top-bar-right">
                            <div class="shop_toolbar_btn">
                                <button data-role="grid_4" type="button" class="active btn-grid-4" title="Grid"><i
                                        class="fa fa-th"></i></button>
                                <button data-role="grid_list" type="button" class="btn-list" title="List"><i
                                        class="fa fa-th-list"></i></button>
                            </div>
                        </div>
                        <!-- Shopt Top Bar Right End -->

                    </div>
                    <!--shop toolbar end-->

                    <!-- Shop Wrapper Start -->
                    <div class="row shop_wrapper grid_4">
                        @foreach ($products as $product)
                            <!-- Single Product Start -->
                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 product" data-aos="fade-up"
                                data-aos-delay="200">
                                <div class="product-inner">
                                    <div class="thumb">
                                        <a href="/product/{{ $product->id_products }}" class="image">
                                            <img class="first-image" src="{{ asset($product->image) }}" alt="Product" />
                                            <img class="second-image" src="{{ asset($product->image) }}" alt="Product" />
                                        </a>
                                        <div class="actions">
                                            <a href="javascript:void(0)" class="action quickview" id="detail"
                                                data-id="{{ $product->id_products }}">
                                                <i class="pe-7s-search"></i>
                                            </a>
                                            <a href="compare.html" title="Compare" class="action compare"><i
                                                    class="pe-7s-shuffle"></i></a>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <h5 class="title"><a
                                                href="/product/{{ $product->id_products }}">{{ $product->name }}</a></h5>
                                        <span class="ratings">
                                            <span class="rating-wrap">
                                                <span class="star" style="width: 100%"></span>
                                            </span>
                                            <span class="rating-num">(4)</span>
                                        </span>
                                        <span class="price">
                                            <span class="new">{{ rupiah($product->price) }}</span>
                                            @if ($product->old_price)
                                                <span class="old">{{ rupiah($product->old_price) }}</span>
                                            @endif
                                        </span>
                                        <p>{{ $product->description }}</p>
                                        <div class="shop-list-btn">
                                            <a class="btn btn-sm btn-outline-dark btn-hover-primary" id="detail"
                                                data-id="{{ $product->id_products }}">Tambah Keranjang</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Product End -->
                        @endforeach
                    </div>
                    <!-- Shop Wrapper End -->

                    <!--shop toolbar start-->
                    <div class="shop_toolbar_wrapper mt-10">

                        <!-- Shop Top Bar Left start -->
                        <div class="shop-top-bar-left">
                        </div>
                        <!-- Shop Top Bar Left end -->

                        <!-- Shopt Top Bar Right Start -->
                        <div class="shop-top-bar-right">
                            <nav>
                                {{ $products->render() }}
                            </nav>
                        </div>
                        <!-- Shopt Top Bar Right End -->

                    </div>
                    <!--shop toolbar end-->

                </div>
            </div>
        </div>
    </div>
    <!-- Shop Section End -->
@endsection

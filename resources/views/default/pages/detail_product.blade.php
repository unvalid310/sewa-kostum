@extends('default.default_layout')
@section('content')
    @foreach ($products as $product)
        <!-- Breadcrumb Section Start -->
        <div class="section">

            <!-- Breadcrumb Area Start -->
            <div class="breadcrumb-area bg-light">
                <div class="container-fluid">
                    <div class="breadcrumb-content text-center">
                        <h1 class="title">Product</h1>
                        <ul>
                            <li>
                                <a href="/">Beranda </a>
                            </li>
                            <li class="active"> {{ $product->name }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Breadcrumb Area End -->

        </div>
        <!-- Breadcrumb Section End -->

        <!-- Single Product Section Start -->
        <div class="section section-margin">
            <div class="container">

                <div class="row">
                    <div class="col-lg-5 offset-lg-0 col-md-8 offset-md-2 col-custom">

                        <!-- Product Details Image Start -->
                        <div class="product-details-img">

                            <!-- Single Product Image Start -->
                            <div class="single-product-img swiper-container gallery-top">
                                <div class="swiper-wrapper popup-gallery">
                                    <a class="swiper-slide w-100" href="{{ asset($product->image) }}">
                                        <img class="w-100" src="{{ asset($product->image) }}" alt="Product">
                                    </a>
                                </div>
                            </div>
                            <!-- Single Product Image End -->

                            <!-- Single Product Thumb Start -->
                            <div class="single-product-thumb swiper-container gallery-thumbs">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="{{ asset($product->image) }}" alt="Product">
                                    </div>
                                </div>

                            </div>
                            <!-- Single Product Thumb End -->

                        </div>
                        <!-- Product Details Image End -->

                    </div>
                    <div class="col-lg-7 col-custom">

                        <!-- Product Summery Start -->
                        <div class="product-summery position-relative">

                            <!-- Product Head Start -->
                            <div class="product-head mb-3">
                                <h2 class="product-title">{{ $product->name }}</h2>
                            </div>
                            <!-- Product Head End -->

                            <!-- Price Box Start -->
                            <div class="price-box mb-2">
                                <span class="regular-price">{{ rupiah($product->price) }}</span>
                                @if ($product->old_price)
                                    <span class="old-price"><del>{{ rupiah($product->old_price) }}</del></span>
                                @endif
                            </div>
                            <!-- Price Box End -->

                            <!-- Rating Start -->
                            <span class="ratings justify-content-start">
                                <span class="rating-wrap">
                                    <span class="star" style="width: 100%"></span>
                                </span>
                                <span class="rating-num">(4)</span>
                            </span>
                            <!-- Rating End -->

                            @if ($product->size)
                                <!-- Product Meta Start -->
                                <div class="product-meta mb-3">
                                    <!-- Product Size Start -->
                                    <div class="product-size">
                                        <span>Size :</span>
                                        <?php
                                        $active = 0;
                                        $size = explode(',', $product->size);
                                        ?>
                                        @foreach ($size as $item)
                                            <a href="javascript:void(0)"
                                                <?php echo $active == 0 ? 'class="active"' : ''; ?>><strong>{{ $item }}</strong></a>
                                            <?php $active++; ?>
                                        @endforeach
                                    </div>
                                    <!-- Product Size End -->
                                </div>
                                <!-- Product Meta End -->
                            @endif

                            @if ($product->variant)
                                <!-- Product Meta Start -->
                                <div class="product-meta mb-5">
                                    <!-- Product Metarial Start -->
                                    <div class="product-variant">
                                        <span>Variant :</span>
                                        <?php
                                        $active = 0;
                                        $variant = explode(',', $product->variant);
                                        ?>
                                        @foreach ($variant as $item)
                                            <a href="javascript:void(0)"
                                                <?php echo $active == 0 ? 'class="active"' : ''; ?>><strong>{{ $item }}</strong></a>
                                            <?php $active++; ?>
                                        @endforeach
                                    </div>
                                    <!-- Product Metarial End -->
                                </div>
                                <!-- Product Meta End -->
                            @endif

                            <!-- Quantity Start -->
                            <div class="quantity mb-5">
                                <div class="cart-plus-minus">
                                    <input class="cart-plus-minus-box" value="1" type="text">
                                    <div class="dec qtybutton"></div>
                                    <div class="inc qtybutton"></div>
                                </div>
                            </div>
                            <!-- Quantity End -->

                            <!-- Cart & Wishlist Button Start -->
                            <div class="cart-wishlist-btn mb-4">
                                <div class="add-to_cart">
                                    <button id="add-to-cart" class="btn btn-outline-dark btn-hover-primary"
                                        data-id="{{ $product->id_products }}">Tambah Keranjang</button>
                                </div>
                            </div>
                            <!-- Cart & Wishlist Button End -->
                        </div>
                        <!-- Product Summery End -->

                    </div>
                </div>

                <div class="row section-margin">
                    <!-- Single Product Tab Start -->
                    <div class="col-lg-12 col-custom single-product-tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active text-uppercase" id="home-tab" data-bs-toggle="tab"
                                    href="#connect-1" role="tab" aria-selected="true">Deskripsi</a>
                            </li>
                        </ul>
                        <div class="tab-content mb-text" id="myTabContent">
                            <div class="tab-pane fade show active" id="connect-1" role="tabpanel"
                                aria-labelledby="home-tab">
                                <div class="desc-content border p-3">
                                    <p class="mb-3">{{ $product->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Single Product Tab End -->
                </div>
            </div>
        </div>
        <!-- Single Product Section End -->
    @endforeach
@endsection

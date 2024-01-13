<button class="btn close" data-bs-dismiss="modal">×</button>
@foreach ($products as $product)
    <div class="row">
        <div class="col-md-6 col-12">
            <!-- Product Details Image Start -->
            <div class="modal-product-carousel">
                <!-- Single Product Image Start -->
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <a class="swiper-slide" href="javascript:void(0)">
                            <img class="w-100" src="{{ asset($product->image) }}" alt="Product">
                        </a>
                    </div>
                </div>
                <!-- Single Product Image End -->

            </div>
            <!-- Product Details Image End -->

        </div>
        <div class="col-md-6 col-12 overflow-hidden position-relative">

            <!-- Product Summery Start -->
            <div class="product-summery">

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

                <!-- Description Start -->
                <p class="desc-content mb-5">{{ $product->description }}</p>
                <!-- Description End -->

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
                <div class="cart-wishlist-btn pb-4 mb-n3">
                    <div class="add-to_cart mb-3">
                        <button id="add-to-cart" class="btn btn-outline-dark btn-hover-primary"
                            data-id="{{ $product->id_products }}">Tambah Keranjang</button>
                    </div>
                </div>
                <!-- Cart & Wishlist Button End -->

            </div>
            <!-- Product Summery End -->

        </div>
    </div>
@endforeach

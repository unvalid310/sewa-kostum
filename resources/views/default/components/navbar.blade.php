<div class="header section">

    <!-- Header Bottom Start -->
    <div class="header-bottom">
        <div class="header-sticky">
            <div class="container">
                <div class="row align-items-center">

                    <!-- Header Logo Start -->
                    <div class="col-xl-2 col-6">
                        <div class="header-logo">
                            <a href="/l"><img src="{{ asset('default/assets/images/logo/logo.png') }}"
                                    alt="Site Logo" /></a>
                        </div>
                    </div>
                    <!-- Header Logo End -->

                    <!-- Header Menu Start -->
                    <div class="col-xl-8 d-none d-xl-block">
                        <div class="main-menu position-relative">
                            <ul>
                                <li class="has-children">
                                    <a href="/"><span>Beranda</span></a>
                                </li>
                                <li class="has-children position-static">
                                    <a href="/product"><span>Produk</span></a>
                                </li>
                                <li class="has-children">
                                    <a href="#"><span>Kategori</span> <i class="fa fa-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        <li><a href="/product?kategori=3">Best Offer</a></li>
                                        <li><a href="/product?kategori=1">New Arrivals</a></li>
                                        <li><a href="/product?kategori=2">Most Populars</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Header Menu End -->

                    <!-- Header Action Start -->
                    <div class="col-xl-2 col-6">
                        <div class="header-actions">

                            <!-- User Account Header Action Button Start -->
                            @if (Session::get('isLogin'))
                                <a href="/my-account" class="header-action-btn d-none d-md-block"><i
                                        class="pe-7s-user"></i></a>
                            @else
                                <a href="/auth" class="header-action-btn d-none d-md-block"><i
                                        class="pe-7s-user"></i></a>
                            @endif
                            <!-- User Account Header Action Button End -->

                            <!-- Shopping Cart Header Action Button Start -->
                            <a href="/cart" class="header-action-btn header-action-btn-cart">
                                <i class="pe-7s-shopbag"></i>
                                <span class="header-action-num" id="total-cart"><?php echo Session::get('count_cart') ? Session::get('count_cart') : '0'; ?></span>
                            </a>
                            <!-- Shopping Cart Header Action Button End -->

                            <!-- Mobile Menu Hambarger Action Button Start -->
                            <a href="javascript:void(0)"
                                class="header-action-btn header-action-btn-menu d-xl-none d-lg-block">
                                <i class="fa fa-bars"></i>
                            </a>
                            <!-- Mobile Menu Hambarger Action Button End -->

                        </div>
                    </div>
                    <!-- Header Action End -->

                </div>
            </div>
        </div>
    </div>
    <!-- Header Bottom End -->

    <!-- Mobile Menu Start -->
    <div class="mobile-menu-wrapper">
        <div class="offcanvas-overlay"></div>

        <!-- Mobile Menu Inner Start -->
        <div class="mobile-menu-inner">

            <!-- Button Close Start -->
            <div class="offcanvas-btn-close">
                <i class="pe-7s-close"></i>
            </div>
            <!-- Button Close End -->

            <!-- Mobile Menu Start -->
            <div class="mobile-navigation">
                <nav>
                    <ul class="mobile-menu">
                        <li class="has-children">
                            <a href="/">Beranda</a>
                        </li>
                        <li class="has-children">
                            <a href="/product">Produk</a>
                        </li>
                        <li class="has-children">
                            <a href="#">Kategori <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                            <ul class="dropdown">
                                <li><a href="/product?kategori=3">Best Offer</a></li>
                                <li><a href="/product?kategori=1">New Arrivals</a></li>
                                <li><a href="/product?kategori=2">Most Populars</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- Mobile Menu End -->
        </div>
        <!-- Mobile Menu Inner End -->
    </div>
    <!-- Mobile Menu End -->

</div>

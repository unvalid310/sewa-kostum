@extends('default.default_layout')
@section('content')
    <!-- Breadcrumb Section Start -->
    <div class="section">

        <!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area bg-light">
            <div class="container-fluid">
                <div class="breadcrumb-content text-center">
                    <h1 class="title">Keranjang</h1>
                    <ul>
                        <li>
                            <a href="/l">Beranda </a>
                        </li>
                        <li class="active"> Keranjang</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Area End -->

    </div>
    <!-- Breadcrumb Section End -->

    @if (count($cart) > 0)
        <!-- Shopping Cart Section Start -->
        <div class="section section-margin">
            <div class="container">

                <div class="row">
                    <div class="col-12">

                        <!-- Cart Table Start -->
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered" id="cart-table">

                                <!-- Table Head Start -->
                                <thead>
                                    <tr>
                                        <th class="pro-thumbnail">Image</th>
                                        <th class="pro-title">Product</th>
                                        <th class="pro-price">Harga</th>
                                        <th class="pro-quantity">Quantity</th>
                                        <th class="pro-subtotal">Total</th>
                                        <th class="pro-remove" width="5%">Hapus</th>
                                    </tr>
                                </thead>
                                <!-- Table Head End -->

                                <!-- Table Body Start -->
                                <tbody>
                                    <?php $subTotal = 0; ?>
                                    @foreach ($cart as $product)
                                        <?php $subTotal = $subTotal + $product->price * $product->qty; ?>
                                        <tr id="data">
                                            <td class="pro-thumbnail" data-id="{{ $product->id_cart }}">
                                                <a href="#"><img class="img-fluid w100"
                                                        src="{{ asset($product->image) }}" alt="Product" /></a>
                                            </td>
                                            <td class="pro-title" data-product="{{ $product->id_products }}"
                                                data-variant="{{ $product->variant }}" data-size="{{ $product->size }}">
                                                <a href="#">{{ $product->name }} <br> {{ $product->size }}
                                                    <?php echo $product->variant ? '/ ' . $product->variant : ''; ?></a>
                                            </td>
                                            <td class="pro-price" data-price="{{ $product->price }}">
                                                <span>{{ rupiah($product->price) }}</span>
                                            </td>
                                            <td class="pro-quantity" data-qty="{{ $product->qty }}">
                                                <div class="quantity">
                                                    <div class="cart-plus-minus">
                                                        <input class="cart-plus-minus-box" value="{{ $product->qty }}"
                                                            type="text">
                                                        <div class="dec qtybutton">-</div>
                                                        <div class="inc qtybutton">+</div>
                                                        <div class="dec qtybutton"><i class="fa fa-minus"></i></div>
                                                        <div class="inc qtybutton"><i class="fa fa-plus"></i></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="pro-subtotal">
                                                <span>{{ rupiah($product->price * $product->qty) }}</span>
                                            </td>
                                            <td class="pro-remove" width="5%">
                                                <a href="javascript:void(0)" id="delete-cart"
                                                    data-id="{{ $product->id_cart }}"><i class="pe-7s-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <!-- Table Body End -->

                            </table>
                        </div>
                        <!-- Cart Table End -->

                        <!-- Cart Update Option Start -->
                        <div class="cart-update-option d-block d-md-flex justify-content-between">

                            <!-- Apply Coupon Wrapper Start -->
                            <div class="apply-coupon-wrapper">
                                <div class="country-select">
                                    <select class="myniceselect nice-select wide rounded-0" id="payment-method"
                                        style="display: none;">
                                        <option value="" selected hidden>Pilih Metode Pembayaran</option>
                                        @foreach ($payment_method as $method)
                                            <option value="{{ $method->id_payment }}">{{ $method->label }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- Apply Coupon Wrapper End -->

                            <!-- Cart Update Start -->
                            <div class="cart-update mt-sm-16">
                                <button id="update-cart" class="btn btn-dark btn-hover-primary rounded-0">Update
                                    Keranjang</button>
                            </div>
                            <!-- Cart Update End -->

                        </div>
                        <!-- Cart Update Option End -->

                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-5 ms-auto col-custom">

                        <!-- Cart Calculation Area Start -->
                        <div class="cart-calculator-wrapper">

                            <!-- Cart Calculate Items Start -->
                            <div class="cart-calculate-items">

                                <!-- Cart Calculate Items Title Start -->
                                <h3 class="title">Total Keranjang</h3>
                                <!-- Cart Calculate Items Title End -->

                                <!-- Responsive Table Start -->
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <td>Sub Total</td>
                                            <td>{{ rupiah($subTotal) }}</td>
                                        </tr>
                                        <tr>
                                            <td>Denda</td>
                                            <td>{{ rupiah(50000 * 7) }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <small><text class="text-danger">*</text> <i>Denda akan
                                                        dikembalikan
                                                        apabila pengembalian tepat waktu</i></small>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <!-- Responsive Table End -->

                            </div>
                            <!-- Cart Calculate Items End -->

                            <!-- Cart Checktout Button Start -->
                            <button class="btn btn-dark btn-hover-primary rounded-0 w-100" id="checkout">Checkout</button>
                            <!-- Cart Checktout Button End -->

                        </div>
                        <!-- Cart Calculation Area End -->

                    </div>
                </div>

            </div>
        </div>
        <!-- Shopping Cart Section End -->
    @else
        <div class="section section-margin">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <p><i>--------------- Keranjang kosong ---------------</i></p>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

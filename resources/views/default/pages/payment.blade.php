@extends('default.default_layout')
@section('content')
    <!-- Breadcrumb Section Start -->
    <div class="section">

        <!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area bg-light">
            <div class="container-fluid">
                <div class="breadcrumb-content text-center">
                    <h1 class="title">Checkout</h1>
                    <ul>
                        <li>
                            <a href="index.html">Home </a>
                        </li>
                        <li class="active"> Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Area End -->

    </div>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Start -->
    <div class="section section-margin">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Coupon Accordion Start -->
                    <div class="coupon-accordion">

                        <!-- Checkout Coupon Start -->
                        <div id="checkout_coupon" class="coupon-checkout-content">
                            <div class="coupon-info">
                                <form action="#">
                                    <p class="checkout-coupon d-flex">
                                        <input placeholder="Coupon code" type="text">
                                        <input class="btn btn-dark btn-hover-primary rounded-0" value="Apply Coupon"
                                            type="submit">
                                    </p>
                                </form>
                            </div>
                        </div>
                        <!-- Checkout Coupon End -->

                    </div>
                    <!-- Coupon Accordion End -->
                </div>
            </div>
            <div class="row mb-n4">
                <div class="col-lg-6 col-12 mb-4">

                    <!-- Checkbox Form Start -->
                    <form action="#">
                        <div class="checkbox-form">

                            <!-- Checkbox Form Title Start -->
                            <h3 class="title">Detail Penyewaan</h3>
                            <!-- Checkbox Form Title End -->

                            <div class="row">

                                <!-- First Name Input Start -->
                                <div class="col-md-12 mt-3">
                                    <div class="checkout-form-list mb-1">
                                        <label>Upload KTP <span class="required text-danger">*</span></label>
                                    </div>
                                </div>
                                <!-- First Name Input End -->

                                @if ($transaction->id_card)
                                    <div class="col-md-12">
                                        <div class="checkout-form-list mb-1">
                                            <i>KTP sudah di upload.</i>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-md-12">
                                        <div class="checkout-form-list mb-3">
                                            <input id="file" placeholder="" type="file">
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <!-- Different Address Start -->
                            <div class="different-address">

                                <!-- Order Notes Textarea Start -->
                                <div class="order-notes mb-n2">
                                    <div class="checkout-form-list checkout-form-list-2">
                                        <label>Alamat pengiriman <span class="required text-danger">*</span></label>
                                        <textarea id="shipping-address" cols="30" rows="10" placeholder="Alamat pengiriman"><?php echo !empty($transaction->shipping_address) ? $transaction->shipping_address : ''; ?></textarea>
                                    </div>
                                </div>
                                <!-- Order Notes Textarea End -->

                            </div>
                            <!-- Different Address End -->
                        </div>
                    </form>
                    <!-- Checkbox Form End -->

                </div>

                <div class="col-lg-6 col-12 mb-4">

                    <!-- Your Order Area Start -->
                    <div class="your-order-area border">

                        <!-- Title Start -->
                        <h3 class="title">Pesananmu</h3>
                        <!-- Title End -->

                        <!-- Your Order Table Start -->
                        <div class="your-order-table table-responsive">
                            <table class="table mb-0">

                                <!-- Table Head Start -->
                                <thead>
                                    <tr class="cart-product-head">
                                        <th class="cart-product-name text-start">Product</th>
                                        <th class="cart-product-total text-end">Total</th>
                                    </tr>
                                </thead>
                                <!-- Table Head End -->

                                <!-- Table Body Start -->
                                <tbody>
                                    <?php $subtotal = 0; ?>
                                    @foreach ($cart as $product)
                                        <?php $subtotal = $subtotal + $product->price * $product->qty; ?>
                                        <tr class="cart_item">
                                            <td class="cart-product-name text-start ps-0">
                                                <?php echo $product->name; ?> <?php $product->variant ? ' ' . $product->size . '/' . $product->variant : $product->size; ?>
                                                <strong class="product-quantity"> × {{ $product->qty }}</strong>
                                            </td>
                                            <td class="cart-product-total text-end pe-0"><span
                                                    class="amount">{{ rupiah($product->price) }}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <!-- Table Body End -->

                                <!-- Table Footer Start -->
                                <tfoot>
                                    <tr class="cart-subtotal">
                                        <th class="text-start ps-0">Subtotal</th>
                                        <td class="text-end pe-0"><span class="amount">{{ rupiah($subtotal) }}</span></td>
                                    </tr>
                                    <tr class="cart-subtotal">
                                        <th class="text-start ps-0">Denda</th>
                                        <td class="text-end pe-0"><span class="amount"><?php echo count($cart) > 0 ? rupiah(50000 * 7) : rupiah(0); ?></span></td>
                                    </tr>
                                    <tr class="order-total">
                                        <th class="text-start ps-0">Total</th>
                                        <td class="text-end pe-0">
                                            <strong>
                                                <span class="amount"><?php echo count($cart) > 0 ? rupiah($subtotal + 50000 * 7) : rupiah(0); ?></span>
                                            </strong>
                                        </td>
                                    </tr>
                                </tfoot>
                                <!-- Table Footer End -->

                            </table>
                            <div class="mb-1">
                                <small>
                                    <text class="text-danger">*</text> <i>Denda akan apabila pengembalian tepat
                                        waktu</i>
                                </small>
                            </div>
                        </div>
                        <!-- Your Order Table End -->

                        <!-- Payment Accordion Order Button Start -->
                        <div class="payment-accordion-order-button">
                            <div class="order-button-payment">
                                <button id="pay-now" class="btn btn-dark btn-hover-primary rounded-0 w-100">Bayar
                                    Sekarang</button>
                            </div>
                        </div>
                        <!-- Payment Accordion Order Button End -->
                    </div>
                    <!-- Your Order Area End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout Section End -->
@endsection
@push('script')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
    </script>
    <script>
        (function($) {
            ("use strict");
            var baseUrl = window.location.origin;

            function showPreload() {
                $(".preloader").fadeIn();
            }

            function hidePreload() {
                $(".preloader").fadeOut();
            }

            $('#pay-now').on('click', function() {
                @if (empty($transaction->id_card))
                    if ($('#file')[0].files[0] && $('#shipping-address').val() != '')
                @else
                    if ($('#shipping-address').val() != '')
                @endif {

                    snap.pay('{{ $snap_token }}', {
                        // Optional
                        onSuccess: function(result) {
                            /* You may add your own js here, this is just example */
                            // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                            console.log('on success ' + result.status_code);
                            var dataimg = new FormData();
                            dataimg.append('file', $("#file")[0].files[0]);
                            dataimg.append('id', {{ $transaction->id_transaction }});
                            dataimg.append('status', 3);
                            dataimg.append('shipping_address', $('#shipping-address').val());

                            console.log(baseUrl);

                            $.ajax({
                                url: baseUrl + "/addpayment",
                                type: "POST",
                                processData: false,
                                contentType: false,
                                data: dataimg,
                                success: function(response) {
                                    showPreload
                                    setTimeout(function() {
                                        swal({
                                            title: "Selamat!",
                                            text: "Pesanan anda menunggu proses pembayaran!",
                                            type: "success"
                                        }, function() {
                                            window.location = "/";
                                        });
                                    }, 1000);
                                }
                            });

                        },
                        // Optional
                        onPending: function(result) {
                            console.log('on pending ' + result.status_code);
                            var dataimg = new FormData();
                            @if (empty($transaction->id_card))
                                dataimg.append('file', $("#file")[0].files[0]);
                            @endif

                            dataimg.append('id', {{ $transaction->id_transaction }});
                            dataimg.append('status', 2);
                            dataimg.append('shipping_address', $('#shipping-address').val());

                            console.log(baseUrl);

                            $.ajax({
                                url: baseUrl + "/addpayment",
                                type: "POST",
                                processData: false,
                                contentType: false,
                                enctype: 'multipart/form-data',
                                data: dataimg,
                                success: function(response) {
                                    showPreload
                                    setTimeout(function() {
                                        swal({
                                            title: "Selamat!",
                                            text: "Pesanan anda menunggu proses pembayaran!",
                                            type: "success"
                                        }, function() {
                                            window.location = "/";
                                        });
                                    }, 1000);
                                }
                            });

                        },
                        // Optional
                        onError: function(result) {
                            /* You may add your own js here, this is just example */
                            // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                            console.log('on error ' + result.status_code);
                            console.log(result)
                        }
                    });
                } else {
                    swal({
                        title: "Pesanan Gagal!",
                        text: 'Lengkapi foto KTP dan alamat pengiriman',
                        type: "error",
                    });
                }
            });
        })(jQuery);
    </script>
@endpush

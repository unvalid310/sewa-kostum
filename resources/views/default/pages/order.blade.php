@extends('default.default_layout')
@section('content')
    <!-- Breadcrumb Section Start -->
    <div class="section">

        <!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area bg-light">
            <div class="container-fluid">
                <div class="breadcrumb-content text-center">
                    <h1 class="title">Pesanan</h1>
                    <ul>
                        <li>
                            <a href="/">Home </a>
                        </li>
                        <li class="active"> Pesanan</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Area End -->

    </div>
    <!-- Breadcrumb Section End -->

    @if (count($transactions) > 0)
        @php
            foreach ($transactions as $key => $transaction);
        @endphp
        <!-- Checkout Section Start -->
        <div class="section section-margin">
            <div class="container">

                <div class="row mb-n4">
                    <div class="col-lg-6 col-12 mb-4">

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
                                    <div class="col-md-12">
                                        <div class="checkout-form-list mb-1">
                                            <img src="{{ asset($transaction->id_card) }}" class="img-fluid w200"
                                                alt="">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <!-- First Name Input Start -->
                                    <div class="col-md-12 mt-3">
                                        <div class="checkout-form-list mb-1">
                                            <label>Lama Peminjaman <span class="required text-danger">*</span></label>
                                        </div>
                                    </div>
                                    <!-- First Name Input End -->

                                    <div class="col-md-2">
                                        <div class="checkout-form-list mb-3">
                                            <input class="text-center" placeholder="" type="number" id="length_rent"
                                                value="{{ $transaction->length_rent }}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <!-- Different Address Start -->
                                <div class="different-address">

                                    <!-- Order Notes Textarea Start -->
                                    <div class="order-notes mb-n2">
                                        <div class="checkout-form-list checkout-form-list-2">
                                            <label>Alamat pengiriman <span class="required text-danger">*</span></label>
                                            <textarea id="shipping-address" cols="30" rows="10" placeholder="Alamat pengiriman" readonly><?php echo !empty($transaction->shipping_address) ? $transaction->shipping_address : ''; ?></textarea>
                                        </div>
                                    </div>
                                    <!-- Order Notes Textarea End -->

                                </div>
                                <!-- Different Address End -->
                            </div>
                        </form>

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
                                            <td class="text-end pe-0"><span class="amount">{{ rupiah($subtotal) }}</span>
                                            </td>
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
                                <div class="payment-accordion">
                                    @if ($transaction->status != 2 && $transaction->status != 3)
                                        <div class="single-payment">
                                            <h5 class="panel-title mb-3">
                                                <a class="collapse-off" data-bs-toggle="collapse" href="#collapseExample"
                                                    aria-expanded="false" aria-controls="collapseExample">
                                                    Metode Pmbayaran Transfer Melalui : <b>{{ $transaction->label }}</b>
                                                </a>
                                            </h5>
                                            <div class="collapse show" id="collapseExample">
                                                <div class="card card-body rounded-0">
                                                    <p>Panduan untuk melakukan transfer klik <a class="text-primary"
                                                            href="{{ $transaction->pdf_url }}" target="_blank">disini</a>.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="single-payment">
                                        <h5 class="panel-title mb-3">
                                            <a class="collapse-off" data-bs-toggle="collapse" href="#collapseExample-2"
                                                aria-expanded="false" aria-controls="collapseExample-2">
                                                Status Pembayaran.
                                            </a>
                                        </h5>
                                        <div class="collapse show" id="collapseExample-2">
                                            <div class="card card-body rounded-0">
                                                @if ($transaction->status == 1)
                                                    <h6 class="text-primary">Menunggu pembayaran.</h6>
                                                @elseif ($transaction->status == 2)
                                                    <h6 class="text-success">Dibayar.</h6>
                                                @elseif ($transaction->status == 3)
                                                    <h6 class="text-danger">Pesanan kadaluarsa.</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
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
    @else
        <div class="section section-margin">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <p><i>--------------- Pesanan tidak ada ---------------</i></p>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

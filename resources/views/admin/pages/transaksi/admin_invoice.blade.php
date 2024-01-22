@extends('admin.default_admin_layout')
@section('content')
    @push('script')
        <script src="{{ asset('admin/assets/js/pages/jquery.PrintArea.js') }}" type="text/JavaScript"></script>
        <script>
            $(document).ready(function() {
                $("#print").click(function() {
                    var mode = 'iframe'; //popup
                    var close = mode == "popup";
                    var options = {
                        mode: mode,
                        popClose: close
                    };
                    $("div.printableArea").printArea(options);
                });
            });
        </script>
    @endpush
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Invoice</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Invoice</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12">
                <div class="card card-body printableArea">
                    <h3><b>INVOICE</b> <span class="pull-right">#{{ $transaction->invoice }}</span></h3>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-left">
                                <address>
                                    <h3> &nbsp;<b class="text-danger">Sewa Kostum</b></h3>
                                    <p class="m-t-10 mb-0"><b>Tanggal Invoice :</b> <i class="fa fa-calendar"></i>
                                        {{ tanggal($transaction->order_date) }}</p>
                                    <p class="m-t-10"><b>Lama Peminjaman :</b>
                                        {{ $transaction->length_rent }} Hari</p>
                                </address>
                            </div>
                            <div class="pull-right text-right">
                                <address>
                                    <h3>To,</h3>
                                    <h4 class="font-bold">{{ $transaction->name }},</h4>
                                    <p class="text-muted m-l-30">
                                        {{ $transaction->shipping_address }}
                                    </p>
                                    <p class="m-t-30"><b>Pembayaran Melalui :</b> <i class="fa fa-bank"></i>
                                        <b class="text-success">{{ $transaction->label }}</b>
                                    </p>
                                    <p><b>Status :</b> @php
                                        if ($transaction->status == 1) {
                                            echo "<b class='text-primary'>Menunggu Pembayaran</b>";
                                        } elseif ($transaction->status == 2) {
                                            echo "<b class='text-success'>Dibayar</b>";
                                        } else {
                                            echo "<b class='text-danger'>Pembayaran Kadaluarsa</b>";
                                        }
                                    @endphp</p>
                                    @if ($transaction->status == 2)
                                        <p><b>Tanggal Pembayaran :</b> <i class="fa fa-calendar"></i>
                                            {{ tanggal($transaction->payment_date) }}</p>
                                    @endif
                                </address>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="table-responsive m-t-40" style="clear: both;">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Description</th>
                                            <th class="text-right">Quantity</th>
                                            <th class="text-right">Unit Cost</th>
                                            <th class="text-right">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $subTotal = 0;
                                            $index = 1;
                                        @endphp

                                        @foreach ($detail_transactions as $item)
                                            <tr>
                                                <td class="text-center">{{ $index }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td class="text-right">{{ $item->qty }}</td>
                                                <td class="text-right"> {{ rupiah($item->price) }} </td>
                                                <td class="text-right"> {{ rupiah($item->price * $item->qty) }} </td>
                                            </tr>
                                            @php
                                                $subTotal = $subTotal + $item->price * $item->qty;
                                                $index++;
                                            @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="pull-right m-t-30 text-right">
                                <p>Sub - Total amount:{{ rupiah($subTotal) }}</p>
                                <p>Denda (7 Hari) : {{ rupiah(50000 * 7) }}</p>
                                <hr>
                                <h3><b>Total :</b> {{ rupiah($transaction->total) }}</h3>
                            </div>
                            <div class="clearfix"></div>
                            <small class="text-left">
                                <text class="text-danger">*</text> <i>Denda akan apabila pengembalian tepat
                                    waktu</i>
                            </small>
                            <hr>
                            <div class="text-right">
                                <button id="print" class="btn btn-default btn-outline" type="button"> <span><i
                                            class="fa fa-print"></i> Print</span> </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
@endsection

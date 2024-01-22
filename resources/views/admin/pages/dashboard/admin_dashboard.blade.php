@extends('admin.default_admin_layout')
@section('content')
    @push('style')
        <!-- Dashboard 1 Page CSS -->
        <link href="{{ asset('admin/assets/css/pages/dashboard4.css') }}" rel="stylesheet">
    @endpush
    @push('script')
        <!-- ============================================================== -->
        <!-- This page plugins -->
        <!-- ============================================================== -->
        <!--Sky Icons JavaScript -->
        <script src="{{ asset('admin/assets/node_modules/skycons/skycons.js') }}"></script>
        <!--morris JavaScript -->
        <script src="{{ asset('admin/assets/node_modules/raphael/raphael-min.js') }}"></script>
        <script src="{{ asset('admin/assets/node_modules/morrisjs/morris.min.js') }}"></script>
        <script src="{{ asset('admin/assets/node_modules/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
        <!-- Chart JS -->
        <script src="{{ asset('admin/assets/js/dashboard4.js') }}"></script>
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
                <h4 class="text-themecolor">Dashboard</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Info box -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">TOTAL PRODUK</h5>
                        <div class="d-flex no-block align-items-center m-t-20 m-b-20">
                            <div id="sparklinedash"></div>
                            <div class="ml-auto">
                                <h2 class="text-success"><span class="counter">{{ count($products) }}</span></h2>
                            </div>
                        </div>
                    </div>
                    <div id="sparkline8" class="sparkchart"></div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">TOTAL ORDER</h5>
                        <div class="d-flex no-block align-items-center m-t-20 m-b-20">
                            <div id="sparklinedash2"></div>
                            <div class="ml-auto">
                                <h2 class="text-purple"><span class="counter">{{ count($transaction) }}</span></h2>
                            </div>
                        </div>
                    </div>
                    <div id="sparkline8" class="sparkchart"></div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">DIBAYAR</h5>
                        <div class="d-flex no-block align-items-center m-t-20 m-b-20">
                            <div id="sparklinedash3"></div>
                            <div class="ml-auto">
                                <h2 class="text-info"><span class="counter">{{ count($payment) }}</span></h2>
                            </div>
                        </div>
                    </div>
                    <div id="sparkline8" class="sparkchart"></div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">DIKEMBALIKAN</h5>
                        <div class="d-flex no-block align-items-center m-t-20 m-b-20">
                            <div id="sparklinedash4"></div>
                            <div class="ml-auto">
                                <h2 class="text-danger"><span class="counter">{{ count($return) }}</span></h2>
                            </div>
                        </div>
                    </div>
                    <div id="sparkline8" class="sparkchart"></div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <!-- ============================================================== -->
        <!-- Review -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- Column -->
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">ORDER STATUS</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Invoice</th>
                                    <th>User</th>
                                    <th>Tanggal Pemesanan</th>
                                    <th>Total</th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($new_order as $order)
                                    <tr>
                                        <td><a href="javascript:void(0)" class="link"> INVOICE#{{ $order->invoice }}</a>
                                        </td>
                                        <td>{{ $order->name }}</td>
                                        <td><span class="text-muted"><i class="fa fa-clock-o"></i>
                                                {{ $order->order_date }}</span></td>
                                        <td>{{ rupiah($order->total) }}</td>
                                        <td class="text-center">
                                            <div class="label label-table label-primary">Menunggu pembayaran</div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <!-- ============================================================== -->
        <!-- End Review -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Comment - chats -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- End Comment - chats -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
@endsection

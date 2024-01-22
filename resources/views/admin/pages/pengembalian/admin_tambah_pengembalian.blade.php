@extends('admin.default_admin_layout')
@section('content')
    @push('style')
        <link href="{{ asset('admin/assets/css/pages/ecommerce.css') }}" rel="stylesheet">
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
                <h4 class="text-themecolor">Tambah pengembalian</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Tambah pengembalian</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Info box Content -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- Column -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="/pengembalian/add" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <h5 class="card-title">Transaksi</h5>
                                <hr>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Transaksi</label>
                                            <select class="form-control" data-placeholder="Pilih transaksi" tabindex="1"
                                                name="id_transaction" id="id_transaction" required>
                                                <option value="" selected hidden>Pilih Transaksi</option>
                                                @foreach ($transaction as $order)
                                                    <option value="{{ $order->id_transaction }}">
                                                        INVOICE#{{ $order->invoice }} a.n {{ $order->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6"></div>
                                    <!--/span-->
                                </div>

                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Tanggal Pembayaran</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i
                                                            class="ti-calendar"></i></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Tanggal pemesanan"
                                                    aria-label="price" aria-describedby="basic-addon1" value=""
                                                    id="order_date" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Jadwal Pengembalian</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i
                                                            class="ti-calendar"></i></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Tanggal pemesanan"
                                                    aria-label="price" aria-describedby="basic-addon1" value=""
                                                    id="return_date" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 ">
                                        <div class="form-group">
                                            <label class="control-label">Alamat Pengiriman</label>
                                            <textarea class="form-control" rows="4" placeholder="Alamat pengiriman" id="shipping_address" readonly></textarea>
                                        </div>
                                    </div>
                                </div>

                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Keterlambatan</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i
                                                            class="ti-time"></i></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Keterlambatan"
                                                    aria-label="price" aria-describedby="basic-addon1" value=""
                                                    id="late" name="late" readonly>
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon1">hari</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Denda Keterlambatan</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Denda keterlambatan"
                                                    aria-label="price" aria-describedby="basic-addon1" value=""
                                                    id="late_fee" name="late_fee" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions m-t-40">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                <a href="/pengembalian" class="btn btn-dark">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    @push('script')
        <script>
            $(document).ready(function() {
                $('#id_transaction').on('change', function() {
                    var id = $(this).val();
                    console.log(id);

                    $.ajax({
                        url: "{{ URL::to('/detail-transaksi/') }}",
                        method: "GET",
                        data: {
                            'id': id
                        },
                        success: function(response) {
                            var data = response.data;
                            reset();
                            console.log(response.success);
                            if (response.success) {
                                $('#order_date').val(data.payment_date);
                                $('#return_date').val(data.return_date);
                                $('#shipping_address').val(data.shipping_address);
                                CalcDiff(data.return_date);
                            } else {
                                swal("Terjadi kesalahan", response.message, "error");
                            }
                        }
                    })
                });

                function CalcDiff(a) {
                    console.log('last date ' + new Date(a));
                    var start = new Date(a),
                        end = new Date(),
                        diff = new Date(end - start),
                        days = diff / 1000 / 60 / 60 / 24;
                    console.log('timeDiff ' + days);

                    var dateDiff = Math.floor(days),
                        lateFee = dateDiff * 50000;

                    $('#late').val(dateDiff);
                    $('#late_fee').val(lateFee);
                }

                function reset() {
                    $('#order_date').val('');
                    $('#return_date').val('');
                    $('#shipping_address').val('');
                    $('#late').val('');
                    $('#late_fee').val('');
                }

                $('#myTable tbody').on("click", "#delete", function() {
                    var id = $(this).data('id');

                    swal({
                        title: "Apakah ingin menghapus data?",
                        text: "Data yang berkaitan akan terhapus",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Ya",
                        cancelButtonText: "Batal",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    }, function(isConfirm) {
                        if (isConfirm) {
                            $.ajax({
                                url: "{{ URL::to('/admin-produk/delete/') }}",
                                method: "POST",
                                data: {
                                    'id': id
                                },
                                success: function(data) {
                                    if (data.success) {
                                        setTimeout(function() {
                                            swal({
                                                title: "Selamat!",
                                                text: data.message,
                                                type: "success"
                                            }, function() {
                                                window.location =
                                                    '/admin-produk';
                                            });
                                        }, 1000);
                                    } else {
                                        swal("Terjadi kesalahan", data.message,
                                            "error");
                                    }
                                },
                            });
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection

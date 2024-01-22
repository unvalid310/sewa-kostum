@extends('admin.default_admin_layout')
@section('content')
    @push('style')
        <link href=""{{ asset('admin/assets/node_modules/datatables/jquery.dataTables.min.css') }}" rel="stylesheet"
            type="text/css" />
        <link href="{{ asset('admin/assets/css/pages/ecommerce.css') }}" rel="stylesheet">
    @endpush
    @push('script')
        <!-- ============================================================== -->
        <!-- This page plugins -->
        <!-- ============================================================== -->
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        {{-- <script src="{{ asset('admin/assets/node_modules/datatables/jquery.dataTables.min.js') }}"></script> --}}
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable({
                    order: [0, 'desc'],
                    // columns: [],
                    columnDefs: [{
                        target: 0,
                        visible: false,
                        searchable: false,
                        orderable: false
                    }, ]
                });
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
                                url: "{{ URL::to('/pengembalian/delete/') }}",
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
                                                    '/pengembalian';
                                            });
                                        }, 1000);
                                    } else {
                                        swal("Terjadi kesalahan", data.message, "error");
                                    }
                                },
                            });
                        }
                    });
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
                <h4 class="text-themecolor">Daftar Pengembalian</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Pengembalian</li>
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
                        <div class="table-responsive">
                            <table class="table product-overview" id="myTable">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th class="text-center">Invoice</th>
                                        <th class="text-center">Tanggal Pemesanan</th>
                                        <th class="text-center">Invoice Pengembalian</th>
                                        <th class="text-center">Tanggal Pengembalian</th>
                                        <th class="text-center">Pengembalian Denda</th>
                                        <th class="text-center" width="5%">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $transaction)
                                        <tr>
                                            <td>{{ $transaction->id_return }}</td>
                                            <td>INVOICE#{{ $transaction->invoice }}</td>
                                            <td class="text-left">
                                                <p>
                                                    <b>{{ tanggal($transaction->order_date) }} </b> <br>
                                                    <b>Jumlah : </b> {{ $transaction->qty }} <br>
                                                    <b>Peminjaman : </b> {{ $transaction->length_rent }} hari <br>
                                                </p>
                                            </td>
                                            <td class="text-center">RETURN#{{ $transaction->return_invoice }}</td>
                                            <td class="text-left">
                                                <p>
                                                    <b>{{ tanggal($transaction->return_date) }}</b><br>
                                                    <b>Keterlambatan : </b>
                                                    @php
                                                        echo $transaction->late > 0 ? $transaction->late . ' hari <br>' : '- <br>';
                                                    @endphp
                                                    <b>Denda : </b>
                                                    @php
                                                        echo $transaction->late_fee ? rupiah($transaction->late_fee) . '<br>' : '- <br>';
                                                    @endphp
                                                </p>
                                            </td>
                                            <td class="text-left">
                                                @php
                                                    $makDenda = 7 * 50000;
                                                    $currDenda = $transaction->late_fee ? $transaction->late_fee : 0;
                                                @endphp
                                                @if ($currDenda <= $makDenda)
                                                    <b>Pengembalian denda : </b>{{ rupiah($makDenda - $currDenda) }}
                                                @else
                                                    <b>Kekurangan denda : </b>{{ rupiah($currDenda - $makDenda) }}
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a href="javascript:void(0)" id="delete"
                                                    data-id="{{ $transaction->id_return }}" class="text-inverse  p-r-10"
                                                    title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
@endsection

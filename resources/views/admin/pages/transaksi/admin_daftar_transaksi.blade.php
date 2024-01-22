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
                <h4 class="text-themecolor">Daftar Transaksi</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Transaksi</li>
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
                                        <th class="text-center">Tanggal Order</th>
                                        <th class="text-center">Jumlah</th>
                                        <th class="text-center">Total Biaya</th>
                                        <th class="text-center">Lama Peminjaman</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $transaction)
                                        <tr>
                                            <td>{{ $transaction->id_transaction }}</td>
                                            <td>INVOICE#{{ $transaction->invoice }}</td>
                                            <td class="text-center">{{ tanggal($transaction->order_date) }}</td>
                                            <td class="text-center">{{ $transaction->qty }}</td>
                                            <td class="text-left">{{ rupiah($transaction->total) }}</td>
                                            <td class="text-center"><?php echo empty($transaction->length_rent) ? '-' : $transaction->length_rent . ' Hari'; ?></td>
                                            <td class="text-center">
                                                @if ($transaction->status == 1)
                                                    <span class="label label-primary font-weight-100">Menunggu
                                                        Pembayaran</span>
                                                @elseif ($transaction->status == 2)
                                                    <span class="label label-success font-weight-100">Dibayar</span>
                                                @else
                                                    <span class="label label-success font-weight-100">Expire</span>
                                                @endif
                                            </td>
                                            <td><a href="javascript:void(0)" class="text-inverse p-r-10"
                                                    data-toggle="tooltip" title="Edit"><i class="ti-marker-alt"></i></a>
                                                @if ($transaction->status != 3)
                                                    <a href="javascript:void(0)" id="delete"
                                                        data-id="{{ $transaction->id_transaction }}"
                                                        class="text-inverse  p-r-10" title="Delete" data-toggle="tooltip"><i
                                                            class="ti-trash"></i></a>
                                                @endif
                                                <a href="/transaksi/{{ $transaction->id_transaction }}" class="text-inverse"
                                                    title="Lihat Invoice" data-toggle="tooltip"><i class="ti-eye"></i></a>
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

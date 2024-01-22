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
        <script src="{{ asset('admin/assets/node_modules/datatables/jquery.dataTables.min.js') }}"></script>
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
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
                <h4 class="text-themecolor">Daftar Produk</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Produk</li>
                    </ol>
                    <a href="/admin-produk/add" class="btn btn-info d-none d-lg-block m-l-15"><i
                            class="fa fa-plus-circle"></i>
                        Tambah Produk</a>
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
                                        <th></th>
                                        <th>Produk</th>
                                        <th>Stok</th>
                                        <th>Harga</th>
                                        <th>Kategori</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>
                                                <img src="{{ asset($product->image) }}" alt="iMac" width="80">
                                            </td>
                                            <td>{{ $product->name }}</td>
                                            <td class="text-center">{{ $product->stock }}</td>
                                            <td class="text-right">
                                                <?php
                                                echo $product->discount ? rupiah($product->price) . '<br class="mt-2"><s>' . rupiah($product->old_price) . '</s>' . '<br class="mt-2"> <span class="label label-danger font-weight-100">' . $product->discount . '%</span>' : rupiah($product->price);
                                                ?>
                                            </td>
                                            <td>
                                                @if ($product->id_categories == 1)
                                                    <span
                                                        class="label label-primary font-weight-100">{{ $product->category }}</span>
                                                @elseif ($product->id_categories == 2)
                                                    <span
                                                        class="label label-success font-weight-100">{{ $product->category }}</span>
                                                @else
                                                    <span
                                                        class="label label-danger font-weight-100">{{ $product->category }}</span>
                                                @endif
                                            </td>
                                            <td><a href="/admin-produk/update/{{ $product->id_products }}"
                                                    class="text-inverse p-r-10" data-toggle="tooltip" title="Edit"><i
                                                        class="ti-marker-alt"></i></a>
                                                <a href="javascript:void(0)" id="delete"
                                                    data-id="{{ $product->id_products }}" class="text-inverse"
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

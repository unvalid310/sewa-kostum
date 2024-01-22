@extends('admin.default_admin_layout')
@section('content')
    @push('style')
        <!-- chartist CSS -->
        <link href="{{ asset('admin/assets/css/pages/ecommerce.css') }}" rel="stylesheet">
        <link href="{{ asset('admin/assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}" rel="stylesheet" />
    @endpush
    @push('script')
        <script src="{{ asset('admin/assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
        <script>
            function readURL(input, previewId) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        // $(previewId).css('background-image', 'url(' + e.target.result + ')');
                        $(previewId).attr('src', e.target.result);
                        $(previewId).hide();
                        $(previewId).fadeIn(650);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#file-upload").change(function() {
                console.log('uploaded');
                readURL(this, '#load-image');
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
                <h4 class="text-themecolor">Tambah produk</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Tambah produk</li>
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
                        @if (Session::has('productAddError'))
                            <div class="alert alert-danger">
                                <?php echo Session::get('productAddError'); ?>
                            </div>
                        @endif

                        <form action="/admin-produk/add" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <h5 class="card-title">Tentang Produk</h5>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3 mb-4">
                                        <h5 class="card-title m-t-20">Upload Image</h5>
                                        <div class="product-img">
                                            <img src="{{ asset('default/assets/images/products/large-size/1.jpg') }}"
                                                id="load-image">
                                            <div class="pro-img-overlay">
                                            </div>
                                            <br />
                                            <div class="fileupload btn btn-info waves-effect waves-light mt-2"><span><i
                                                        class="ion-upload m-r-5"></i>Upload Foto</span>
                                                <input type="file" class="upload" name="file" id="file-upload"
                                                    accept=".png, .jpg, .jpeg">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Nama Produk</label>
                                            <input type="text" id="firstName" class="form-control"
                                                placeholder="Nama Produk" name="name" value="" required>
                                        </div>
                                    </div>
                                </div>
                                <!--/row-->
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Kategori</label>
                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1"
                                                name="categories" required>
                                                <option value="" hidden>Pilih Kategori</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">
                                                        {{ $category->category }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <br />
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="status" name="status"
                                                    class="custom-control-input" value="publish" checked>
                                                <label class="custom-control-label" for="status">Publish</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="status2" name="status"
                                                    class="custom-control-input" value="unpublish">
                                                <label class="custom-control-label" for="status2">Unpublish</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label>Stok</label>
                                            <input type="text" class="form-control" placeholder="Stok" name="stock"
                                                aria-label="stock" aria-describedby="basic-addon1" value="" required>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Harga</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Harga"
                                                    name="price" aria-label="price" aria-describedby="basic-addon1"
                                                    value="" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Diskon</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon2"><i
                                                            class="ti-cut"></i></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Diskon"
                                                    aria-label="Discount" aria-describedby="basic-addon2" name="discount"
                                                    value="" required>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Harga Sebelumnya</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Harga"
                                                    name="old_price" aria-label="old_price"
                                                    aria-describedby="basic-addon1" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Varian</label>
                                            <div class="tags-default">
                                                <input type="text" value="" data-role="tagsinput"
                                                    placeholder="+ varian" name="variant" />
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Size</label>
                                            <div class="tags-default">
                                                <input type="text" value="" data-role="tagsinput"
                                                    placeholder="+ varian" name="size" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="card-title m-t-40">Deskripsi Produk</h5>
                                <div class="row">
                                    <div class="col-md-12 ">
                                        <div class="form-group">
                                            <textarea class="form-control" rows="4" name="description"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="form-actions m-t-40">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                <a href="/admin-produk" class="btn btn-dark">Cancel</a>
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
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
@endsection

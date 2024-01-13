@extends('default.default_layout')
@section('content')
    <div class="section">

        <!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area bg-light">
            <div class="container-fluid">
                <div class="breadcrumb-content text-center">
                    <h1 class="title">Login | Register</h1>
                    <ul>
                        <li>
                            <a href="/l">Home </a>
                        </li>
                        <li class="active"> Login | Register</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Area End -->

    </div>
    <!-- Breadcrumb Section End -->

    <!-- Login | Register Section Start -->
    <div class="section section-margin">
        <div class="container">

            <div class="row mb-n10">
                <div class="col-lg-6 col-md-8 m-auto m-lg-0 pb-10">
                    <!-- Login Wrapper Start -->
                    <div class="login-wrapper">

                        <!-- Login Title & Content Start -->
                        <div class="section-content text-center mb-5">
                            <h2 class="title mb-2">Login</h2>
                            <p class="desc-content">Silahkan masuk menggukan akun anda.</p>
                        </div>
                        <!-- Login Title & Content End -->
                        @if (Session::has('loginError'))
                            <div class="alert alert-danger">
                                <?php echo Session::get('loginError'); ?>
                            </div>
                        @endif
                        <!-- Form Action Start -->
                        <form action="/login" method="post">
                            @csrf
                            <!-- Input Email Start -->
                            <div class="single-input-item mb-3">
                                <input type="email" placeholder="Email or Username" name="email"
                                    value="{{ old('email') }}" required>
                            </div>
                            <!-- Input Email End -->

                            <!-- Input Password Start -->
                            <div class="single-input-item mb-3">
                                <input type="password" placeholder="Enter your Password" name="password" required>
                            </div>
                            <!-- Input Password End -->

                            <!-- Login Button Start -->
                            <div class="single-input-item mb-3">
                                <button class="btn btn btn-dark btn-hover-primary rounded-0" type="submit">Login</button>
                            </div>
                            <!-- Login Button End -->

                        </form>
                        <!-- Form Action End -->

                    </div>
                    <!-- Login Wrapper End -->
                </div>
                <div class="col-lg-6 col-md-8 m-auto m-lg-0 pb-10">
                    <!-- Register Wrapper Start -->
                    <div class="register-wrapper">

                        <!-- Login Title & Content Start -->
                        <div class="section-content text-center mb-5">
                            <h2 class="title mb-2">Daftar Akun</h2>
                            <p class="desc-content">Silahkan isi detail akun untuk melakukan pendaftaran.</p>
                        </div>
                        <!-- Login Title & Content End -->
                        @if (Session::has('registerError'))
                            <div class="alert alert-danger">
                                <?php echo Session::get('registerError'); ?>
                            </div>
                        @endif

                        <!-- Form Action Start -->
                        <form action="/register" method="post">
                            @csrf

                            <!-- Input First Name Start -->
                            <div class="single-input-item mb-3">
                                <input type="text" placeholder="Masukan nama" name="name" required>
                            </div>
                            <!-- Input First Name End -->

                            <!-- Input Email Or Username Start -->
                            <div class="single-input-item mb-3">
                                <input type="email" placeholder="Masukan email" name="email" required>
                            </div>
                            <!-- Input Email Or Username End -->

                            <!-- Input Last Name Start -->
                            <div class="single-input-item mb-3">
                                <input type="text" placeholder="Masukan No. Handphone" name="no_hp" required>
                            </div>
                            <!-- Input Last Name End -->


                            <!-- Input Password Start -->
                            <div class="single-input-item mb-3">
                                <input type="password" placeholder="Enter your Password" name="password" required>
                            </div>
                            <!-- Input Password End -->

                            <!-- Register Button Start -->
                            <div class="single-input-item mb-3">
                                <button class="btn btn btn-dark btn-hover-primary rounded-0">Register</button>
                            </div>
                            <!-- Register Button End -->

                        </form>
                        <!-- Form Action End -->

                    </div>
                    <!-- Register Wrapper End -->
                </div>
            </div>

        </div>
    </div>
    <!-- Login | Register Section End -->
@endsection

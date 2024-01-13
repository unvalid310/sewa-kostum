@extends('default.default_layout')
@section('content')
    <!-- Breadcrumb Section Start -->
    <div class="section">

        <!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area bg-light">
            <div class="container-fluid">
                <div class="breadcrumb-content text-center">
                    <h1 class="title">My Account</h1>
                    <ul>
                        <li>
                            <a href="/l">Home </a>
                        </li>
                        <li class="active"> My Account</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Area End -->

    </div>
    <!-- Breadcrumb Section End -->

    <!-- My Account Section Start -->
    <div class="section section-margin">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">

                    <!-- My Account Page Start -->
                    <div class="myaccount-page-wrapper">
                        <!-- My Account Tab Menu Start -->
                        <div class="row">
                            <div class="col-lg-3 col-md-4">
                                <div class="myaccount-tab-menu nav" role="tablist">
                                    <a href="#dashboad" class="active" data-bs-toggle="tab"><i class="fa fa-dashboard"></i>
                                        Dashboard</a>
                                    <a href="#orders" data-bs-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Orders</a>
                                    <a href="#account-info" data-bs-toggle="tab"><i class="fa fa-user"></i> Account
                                        Details</a>
                                    <a href="/logout"><i class="fa fa-sign-out"></i> Logout</a>
                                </div>
                            </div>
                            <!-- My Account Tab Menu End -->

                            <!-- My Account Tab Content Start -->
                            <div class="col-lg-9 col-md-8">
                                <div class="tab-content" id="myaccountContent">
                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3 class="title">Dashboard</h3>
                                            <div class="welcome">
                                                <p>Hello, <strong>{{ Session::get('name') }}</strong> (If Not
                                                    <strong>{{ Session::get('name') }}
                                                        !</strong><a href="login-register.html" class="logout"> Logout</a>)
                                                </p>
                                            </div>
                                            <p class="mb-0">From your account dashboard. you can easily check & view your
                                                recent orders, edit your password and account details.</p>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->

                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade" id="orders" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3 class="title">Orders</h3>
                                            <div class="myaccount-table table-responsive text-center">
                                                <table class="table table-bordered">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>Order</th>
                                                            <th>Date</th>
                                                            <th>Status</th>
                                                            <th>Total</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($transaction as $order)
                                                            <tr>
                                                                <td>INVOICE {{ $order->invoice }}</td>
                                                                <td>{{ tanggal($order->order_date) }}</td>
                                                                @if ($order->status == 1)
                                                                    <td>Pesanan Belum selesai</td>
                                                                @elseif($order->status == 2)
                                                                    <td>Menunggu Pembayaran</td>
                                                                @else
                                                                    <td>Selesai</td>
                                                                @endif
                                                                <td>{{ rupiah($order->total) }}</td>
                                                                @if ($order->status != 3)
                                                                    <td>
                                                                        <a href="{{ '/payment?id=' . $order->id_transaction }}"
                                                                            class="btn btn btn-dark btn-hover-primary btn-sm rounded-0">View</a>
                                                                    </td>
                                                                @else
                                                                    <td></td>
                                                                @endif
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->

                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade" id="account-info" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3 class="title">Account Details</h3>
                                            <div class="account-details-form">
                                                <form action="#">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="single-input-item mb-3">
                                                                <label for="first-name" class="required mb-1">First
                                                                    Name</label>
                                                                <input type="text" id="first-name"
                                                                    placeholder="First Name" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="single-input-item mb-3">
                                                                <label for="last-name" class="required mb-1">Last
                                                                    Name</label>
                                                                <input type="text" id="last-name"
                                                                    placeholder="Last Name" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="single-input-item mb-3">
                                                        <label for="display-name" class="required mb-1">Display
                                                            Name</label>
                                                        <input type="text" id="display-name"
                                                            placeholder="Display Name" />
                                                    </div>
                                                    <div class="single-input-item mb-3">
                                                        <label for="email" class="required mb-1">Email Addres</label>
                                                        <input type="email" id="email" placeholder="Email Address" />
                                                    </div>
                                                    <fieldset>
                                                        <legend>Password change</legend>
                                                        <div class="single-input-item mb-3">
                                                            <label for="current-pwd" class="required mb-1">Current
                                                                Password</label>
                                                            <input type="password" id="current-pwd"
                                                                placeholder="Current Password" />
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="single-input-item mb-3">
                                                                    <label for="new-pwd" class="required mb-1">New
                                                                        Password</label>
                                                                    <input type="password" id="new-pwd"
                                                                        placeholder="New Password" />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="single-input-item mb-3">
                                                                    <label for="confirm-pwd" class="required mb-1">Confirm
                                                                        Password</label>
                                                                    <input type="password" id="confirm-pwd"
                                                                        placeholder="Confirm Password" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    <div class="single-input-item single-item-button">
                                                        <button class="btn btn btn-dark btn-hover-primary rounded-0">Save
                                                            Changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div> <!-- Single Tab Content End -->
                                </div>
                            </div> <!-- My Account Tab Content End -->
                        </div>
                    </div>
                    <!-- My Account Page End -->

                </div>
            </div>

        </div>
    </div>
    <!-- My Account Section End -->
@endsection

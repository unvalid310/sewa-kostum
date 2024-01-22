        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User Profile-->
                <div class="user-profile">
                    <div class="user-pro-body">
                        <div><img src="{{ asset('admin/assets/images/users/2.jpg') }}" alt="user-img" class="img-circle">
                        </div>
                        <div class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle u-dropdown link hide-menu"
                                data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Steave
                                Gection <span class="caret"></span></a>
                            <div class="dropdown-menu animated flipInY">
                                <!-- text-->
                                <a href="javascript:void(0)" class="dropdown-item"><i class="ti-user"></i> My
                                    Profile</a>
                                <!-- text-->
                                <a href="javascript:void(0)" class="dropdown-item"><i class="ti-wallet"></i> My
                                    Balance</a>
                                <!-- text-->
                                <a href="javascript:void(0)" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
                                <!-- text-->
                                <div class="dropdown-divider"></div>
                                <!-- text-->
                                <a href="javascript:void(0)" class="dropdown-item"><i class="ti-settings"></i>
                                    Account Setting</a>
                                <!-- text-->
                                <div class="dropdown-divider"></div>
                                <!-- text-->
                                <a href="login.html" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                                <!-- text-->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li>
                            <a class="waves-effect waves-dark" href="/dashboard" aria-expanded="false"><i
                                    class="icon-speedometer"></i><span class="hide-menu">Dashboard</span></a>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false"><i class="ti-layout-grid2"></i><span
                                    class="hide-menu">Produk</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="/admin-produk">Daftar Produk</a></li>
                                <li><a href="/admin-produk/add">Tambah Produk</a></li>
                            </ul>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="/transaksi" aria-expanded="false"><i
                                    class="ti-email"></i><span class="hide-menu">Transaksi</span></a>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false"><i class="ti-email"></i><span
                                    class="hide-menu">Pengembalian</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="/pengembalian">Daftar Pengembalian</a></li>
                                <li><a href="/pengembalian/add">Tambah Pengembalian</a></li>
                            </ul>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="/logout" aria-expanded="false"><i
                                    class="fa fa-circle-o text-success"></i><span class="hide-menu">Log Out</span></a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->

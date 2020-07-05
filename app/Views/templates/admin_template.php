<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>ekantin</title>
    <link rel="stylesheet" href="<?= base_url("assets/bootstrap/css/bootstrap.min.css"); ?>">
    <link rel="stylesheet" href="<?= base_url("assets/fonts/font-awesome.min.css"); ?>">
    <link rel="stylesheet" href="<?= base_url("assets/fonts/ionicons.min.css"); ?>">
    <link rel="stylesheet" href="<?= base_url("assets/css/Collapsible-sidebar-left-or-right--Content-overlay.css"); ?>">
    <link rel="stylesheet" href="<?= base_url("assets/css/styles.css"); ?>">
</head>

<body>
    <div id="mySidebar" class="sidebar">
        <div class="sidebar-top text-white">
            <img src="<?= base_url("assets/img/avatar.png"); ?>" alt="" class="userphoto">
            <p>Welcome back,<br>{username}</p>
        </div>
        <div class="sidebar-bottom">
            <ul class="list-group">
                <a href="<?= base_url('admin'); ?>"><li class="list-group-item mt-2">Dashboard</li></a>
                <a href="<?= base_url('logout'); ?>"><li class="list-group-item">Logout</li></a>
            </ul>
            <hr>
            <ul class="list-group">
                <li class="list-group-item disabled">Manage users</li>
                <li>
                    <a class="collapsed list-group-item" data-toggle="collapse" aria-expanded="false" href="#submenu1">Buat user<i class="fa fa-arrow-circle-down ml-2"></i></a>
                    <ul class="list-unstyled collapse" id="submenu1" aria-expanded="false">
                        <a href="<?= base_url('admin/create_user/customer'); ?>"><li class="list-group-item ml-4">Pelanggan</li></a>
                        <a href="<?= base_url('admin/create_user/seller'); ?>"><li class="list-group-item ml-4">Penjual</li></a>
                    </ul>
                </li>
                <li>
                    <a class="collapsed list-group-item" data-toggle="collapse" aria-expanded="false" href="#submenu2">List user<i class="fa fa-arrow-circle-down ml-2"></i></a>
                    <ul class="list-unstyled collapse" id="submenu2" aria-expanded="false">
                        <a href="<?= base_url('admin/list_user/customer'); ?>"><li class="list-group-item ml-4">Pelanggan</li></a>
                        <a href="<?= base_url('admin/list_user/seller'); ?>"><li class="list-group-item ml-4">Penjual</li></a>
                    </ul>
                </li>
                <a href="<?= base_url('admin/transaction'); ?>"><li class="list-group-item">Riwayat transaksi</li></a>
                <a href="<?= base_url('admin/print_card'); ?>"><li class="list-group-item">Cetak kartu</li></a>
                <a href="<?= base_url('admin/add_balance'); ?>"><li class="list-group-item">Tambah saldo</li></a>
                <li>
                    <a class="collapsed list-group-item" data-toggle="collapse" aria-expanded="false" href="#submenu3">Tarik saldo<i class="fa fa-arrow-circle-down ml-2"></i></a>
                    <ul class="list-unstyled collapse" id="submenu3" aria-expanded="false">
                        <a href="<?= base_url('admin/withdraw/customer'); ?>"><li class="list-group-item ml-4">Pelanggan</li></a>
                        <a href="<?= base_url('admin/withdraw/seller'); ?>"><li class="list-group-item ml-4">Penjual</li></a>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div id="main" class="d-flex flex-column justify-content-between">
        <div class="topnya">
            <nav class="navbar navbar-dark navbar-expand-md">
                <div class="container"><a class="navbar-brand" href="<?= base_url('admin'); ?>">Ekantin</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse"
                        id="navcol-1">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item" role="presentation"><a class="nav-link active" href="<?= base_url('logout'); ?>">Logout</a></li>
                            <li class="nav-item hidden-navitems" role="presentation"><a class="nav-link active" href="<?= base_url('admin'); ?>">Dashboard</a></li>
                            <li class="nav-item dropdown hidden-navitems">
                                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Buat user
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="<?= base_url('admin/create_user/customer'); ?>">Pelanggan</a>
                                    <a class="dropdown-item" href="<?= base_url('admin/create_user/seller'); ?>">Penjual</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown hidden-navitems">
                                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                List user
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="<?= base_url('admin/list_user/customer'); ?>">Pelanggan</a>
                                    <a class="dropdown-item" href="<?= base_url('admin/list_user/seller'); ?>">Penjual</a>
                                </div>
                            </li>
                            <li class="nav-item hidden-navitems" role="presentation"><a class="nav-link active" href="<?= base_url('admin/transaction'); ?>">Riwayat transaksi</a></li>
                            <li class="nav-item hidden-navitems" role="presentation"><a class="nav-link active" href="<?= base_url('admin/print_card'); ?>">Cetak kartu</a></li>
                            <li class="nav-item hidden-navitems" role="presentation"><a class="nav-link active" href="<?= base_url('admin/add_balance'); ?>">Tambah saldo</a></li>
                            <li class="nav-item dropdown hidden-navitems">
                                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Tarik saldo
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="<?= base_url('admin/withdraw/customer'); ?>">Pelanggan</a>
                                    <a class="dropdown-item" href="<?= base_url('admin/withdraw/seller'); ?>">Penjual</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        <!-- Content -->
        <!-- End Content -->
            <div class="rolename text-center">
                <?= $this->renderSection('rolename') ?>
            </div>
        </div>
        <section class="middle">
            <?= $this->renderSection('content') ?>
        </section>
        <div class="bottomnya">
            <div class="footer">
                <h8>Copyright <i class="fa fa-copyright"></i> Ramdani</h8>
            </div>
        </div>
    </div>
    <script src="<?= base_url("assets/js/jquery.min.js"); ?>"></script>
    <script src="<?= base_url("assets/bootstrap/js/bootstrap.min.js"); ?>"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script> -->
    <script src="<?= base_url("assets/js/jquery.nicescroll.min.js"); ?>"></script>
    <script src="<?= base_url("assets/js/Collapsible-sidebar-left-or-right--Content-overlay.js"); ?>"></script>
</body>

</html>
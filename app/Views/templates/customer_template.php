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
    <!-- <link rel="stylesheet" href="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.css"> -->
    <link rel="stylesheet" href="<?= base_url("assets/css/bootstrap-better-nav.min.css"); ?>">
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
                <a href="<?= base_url('customer'); ?>"><li class="list-group-item mt-2">Dashboard</li></a>
                <a href="<?= base_url('logout'); ?>"><li class="list-group-item">Logout</li></a>
            </ul>
            <hr>
            <ul class="list-group">
                <li class="list-group-item disabled">Manage users</li>
                <a href="<?= base_url('customer/transaction_history'); ?>"><li class="list-group-item">Riwayat transaksi</li></a>
                <a href="<?= base_url('customer/balance_history'); ?>"><li class="list-group-item">Riwayat saldo</li></a>
                <a href="<?= base_url('customer/change_profile'); ?>"><li class="list-group-item">Rubah profile</li></a>
                <a href="<?= base_url('customer/print_card'); ?>"><li class="list-group-item">Cetak kartu</li></a>
            </ul>
        </div>
    </div>
    <div id="main" class="d-flex flex-column justify-content-between">
        <div class="topnya">
            <nav class="navbar navbar-dark navbar-expand-md">
                <div class="container"><a class="navbar-brand" href="#">Ekantin</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse"
                        id="navcol-1">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item" role="presentation"><a class="nav-link active" href="<?= base_url('logout'); ?>">Logout</a></li>
                            <li class="nav-item hidden-navitems" role="presentation"><a class="nav-link active" href="<?= base_url('customer'); ?>">Dashboard</a></li>
                            <li class="nav-item hidden-navitems" role="presentation"><a class="nav-link active" href="<?= base_url('customer/transaction_history'); ?>">Riwayat transaksi</a></li>
                            <li class="nav-item hidden-navitems" role="presentation"><a class="nav-link active" href="<?= base_url('customer/balance_history'); ?>">Riwayat saldo</a></li>
                            <li class="nav-item hidden-navitems" role="presentation"><a class="nav-link active" href="<?= base_url('customer/change_profile'); ?>">Rubah profile</a></li>
                            <li class="nav-item hidden-navitems" role="presentation"><a class="nav-link active" href="<?= base_url('customer/print_card'); ?>">Cetak kartu</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Content -->
            <div class="rolename text-center">
                <?= $this->renderSection('rolename') ?>
            </div>
            <section class="middle">
            <?= $this->renderSection('content') ?>
            </section>
             <!-- End Content -->
        </div>
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
    <!-- <script src="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.js"></script> -->
    <script src="<?= base_url("assets/js/bootstrap-better-nav.min.js"); ?>"></script>
</body>

</html>
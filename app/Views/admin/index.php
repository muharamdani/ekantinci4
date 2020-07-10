<?= $this->extend('templates/admin_template') ?>
<?= $this->section('rolename') ?>
    <h1>Selamat datang Admin</h1>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="row mt-4 text-white">
        <div class="col-lg mb-2">
            <div class="card text-center">
                <div class="card-header card-header-1">
                    Total Akun Penjual
                </div>
                <div class="card-body card-body-1">
                    <h5 class="card-title"><?= $countseller; ?></h5>
                </div>
            </div>
        </div>
        <div class="col-lg mb-2">
            <div class="card text-center">
                <div class="card-header card-header-2">
                    Total Akun Pelanggan
                </div>
                <div class="card-body card-body-2">
                    <h5 class="card-title"><?= $countcustomer; ?></h5>
                </div>
            </div>
        </div>
        <div class="col-lg mb-2">
            <div class="card text-center">
                <div class="card-header card-header-3">
                    Total Saldo Penjual
                </div>
                <div class="card-body card-body-3">
                    <h5 class="card-title"><?= $sellerbalance; ?></h5>
                </div>
            </div>
        </div>
        <div class="col-lg mb-2">
            <div class="card text-center">
                <div class="card-header card-header-4">
                    Total Saldo Pelanggan
                </div>
                <div class="card-body card-body-4">
                    <h5 class="card-title"><?= $customerbalance ?></h5>
                </div>
            </div>
        </div>
    </div>
</div>
<h1 class="text-center mt-2">Quick Links</h1>
<div class="container">
    <div class="row justify-content-center text-center">
        <div class="col-xl-3 mb-3">
            <a href="<?= base_url('admin/list_user/customer'); ?>"><button class="btn-quick1">Data Pelanggan</button></a>
        </div>
        <div class="col-xl-3 mb-3">
            <a href="<?= base_url('admin/list_user/seller'); ?>"><button class="btn-quick1">Data Penjual</button></a>
        </div>
    </div>
    <div class="row text-center mb-3">
        <div class="col-lg">
            <a href="<?= base_url('admin/create_user'); ?>"><button class="btn-quick1">Buat User</button></a>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
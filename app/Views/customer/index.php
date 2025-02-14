<?= $this->extend('templates/customer_template') ?>
<?= $this->section('rolename') ?>
    <h1>Selamat datang <?= session()->get('username'); ?></h1>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="row mt-4 text-white">
        <div class="col-lg mb-2">
            <div class="card text-center">
                <div class="card-header card-header-1">
                    Total transaksi berhasil
                </div>
                <div class="card-body card-body-1">
                    <h5 class="card-title"><?= $usertransaction; ?></h5>
                </div>
            </div>
        </div>
        <div class="col-lg mb-2">
            <div class="card text-center">
                <div class="card-header card-header-2">
                    Total saldo anda
                </div>
                <div class="card-body card-body-2">
                    <h5 class="card-title"><?= "Rp.",number_format($userbalance, 0, '.','.'); ?></h5>
                </div>
            </div>
        </div>
    </div>
</div>
<h1 class="text-center mt-2">Quick Links</h1>
<div class="container">
    <div class="row justify-content-center text-center">
        <div class="col-xl-3 mb-3">
            <a href="<?= base_url('customer/transaction_history'); ?>"><button class="btn-quick1">Riwayat transaksi</button></a>
        </div>
        <div class="col-xl-3 mb-3">
            <a href="<?= base_url('customer/balance_history'); ?>"><button class="btn-quick1">Riwayat saldo</button></a>
        </div>
    </div>
    <div class="row text-center mb-3">
        <div class="col-lg">
            <a href="<?= base_url('customer/change_profile'); ?>"><button class="btn-quick1">Rubah profile</button></a>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
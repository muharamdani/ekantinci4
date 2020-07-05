<?= $this->extend('templates/seller_template') ?>
<?= $this->section('content') ?>
<div class="rolename text-center">
    <h1>Selamat datang di kantin <?= $username; ?></h1>
</div>
<div class="container-fluid">
    <div class="row mt-4 text-white">
        <div class="col-lg mb-2">
            <div class="card text-center">
                <div class="card-header card-header-1">
                    Total transaksi berhasil
                </div>
                <div class="card-body card-body-1">
                    <h5 class="card-title">{sum-number-of-transaction}</h5>
                </div>
            </div>
        </div>
        <div class="col-lg mb-2">
            <div class="card text-center">
                <div class="card-header card-header-2">
                    Total saldo anda
                </div>
                <div class="card-body card-body-2">
                    <h5 class="card-title">{sum-number-of-ballance}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<h1 class="text-center mt-2">Quick Links</h1>
<div class="container">
    <div class="row justify-content-center text-center">
        <div class="col-xl-3 mb-3">
            <button class="btn-quick1">Lakukan transaksi</button>
        </div>
        <div class="col-xl-3 mb-3">
            <button class="btn-quick1">Riwayat transaksi</button>
        </div>
    </div>
    <div class="row text-center mb-3">
        <div class="col-lg">
            <button class="btn-quick1">Rubah profile</button>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
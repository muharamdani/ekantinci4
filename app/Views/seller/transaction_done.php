<?= $this->extend('templates/seller_template') ?>
<?= $this->section('rolename') ?>
    <h1>Transaksi Berhasil</h1>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="text-center">
        <h1>Terima Kasih <?= session()->getFlashdata('customername'); ?></h1>
        <p>Total yang harus anda bayar : <?= "Rp.",number_format(session()->get('balance'), 0, '.','.'); ?></p>
        <p>Saldo anda : <?= "Rp.",number_format(session()->getFlashdata('customerbalance'), 0, '.','.'); ?></p>
        <p>Sisa saldo anda : <?= "Rp.",number_format(session()->get('afterbalance'), 0, '.','.'); ?></p>
    </div>
</div>
<?= $this->endSection('content') ?>

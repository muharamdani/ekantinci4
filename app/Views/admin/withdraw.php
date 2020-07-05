<?= $this->extend('templates/admin_template') ?>
<?= $this->section('rolename') ?>
    <h1>Tarik saldo</h1>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="row text-center justify-content-center align-items-center">
        <div class="col-lg-4 mb-4">
            <a href="<?= base_url('admin/withdraw/customer'); ?>"><button class="btn-quick1">Pelanggan</button></a>
        </div>
        <div class="col-lg-4 mb-4">
            <a href="<?= base_url('admin/withdraw/seller'); ?>"><button class="btn-quick1">Penjual</button></a>
        </div>
    </div>
</div>
<?= $this->endSection('content') ?>

<?= $this->extend('templates/seller_template') ?>
<?= $this->section('rolename') ?>
    <h1>Lakukan transaksi</h1>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container">
    <form class="custom-form" action="<?= base_url('/seller/transaction/payment/process'); ?>" method="POST">
        <?= csrf_field(); ?>
        <?php if(session()->getFlashdata('nisnotfound')): ?>
            <div class="alert alert-danger" role="alert"><?= session()->getFlashdata('nisnotfound') ?></div>
        <?php endif; ?>
        <?php if(session()->getFlashdata('minusbalance')): ?>
            <div class="alert alert-danger" role="alert"><?= session()->getFlashdata('minusbalance') ?></div>
        <?php endif; ?>
        <div class="form-group">
            <input type="number" name="nis" class="form-control shadow-none" placeholder="Masukkan NIS" autofocus>
        </div>
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
        <div class="text-center mt-4">
            <button type="submit" name="cash" class="btn btn-success">Tunai</button>
        </div>
    </form>
</div>
<?= $this->endSection('content') ?>

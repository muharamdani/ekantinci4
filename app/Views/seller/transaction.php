<?= $this->extend('templates/seller_template') ?>
<?= $this->section('rolename') ?>
    <h1>Lakukan transaksi</h1>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container">
    <form class="custom-form" action="<?= base_url('/seller/transaction/process'); ?>" method="POST">
    <?= csrf_field(); ?>
        <?php if(session()->getFlashdata('invalidbalance')): ?>
            <div class="alert alert-danger" role="alert"><?= session()->getFlashdata('invalidbalance') ?></div>
        <?php endif; ?>
        <div class="form-group">
            <input type="number" name="balance" class="form-control shadow-none" value="<? old('balance'); ?>" placeholder="Jumlah bayar" required autofocus>
        </div>
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>
</div>
<?= $this->endSection('content') ?>

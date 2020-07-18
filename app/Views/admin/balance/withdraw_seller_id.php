<?= $this->extend('templates/admin_template') ?>
<?= $this->section('rolename') ?>
    <h1>Tarik saldo</h1>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container">
    <form class="custom-form" action="<?= base_url('admin/withdraw/seller/process'); ?>" method="POST">
    <?= csrf_field(); ?>
    <input type="hidden" name="id" value="<?= $id; ?>">
        <div class="form-group">
            <input type="number" name="balance" class="form-control <?= (session()->getFlashdata('invalid_balance')) ? 'is-invalid' : ''; ?> shadow-none" value="<?= old('balance'); ?>" placeholder="Masukkan saldo (Minimal Rp5000)" autofocus required>
            <div class="invalid-feedback"><?= session()->getFlashdata('invalid_balance'); ?></div>
        </div>
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-success">Tarik saldo</button>
        </div>
    </form>
</div>
<?= $this->endSection('content') ?>

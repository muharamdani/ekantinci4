<?= $this->extend('templates/admin_template') ?>
<?= $this->section('rolename') ?>
    <h1>Tambah saldo</h1>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container">
    <form class="custom-form" action="<?= base_url('admin/add_balance/process'); ?>" method="POST">
    <?= csrf_field(); ?>
    <input type="hidden" name="id" value="<?= $id; ?>">
        <div class="form-group">
            <input type="number" name="balance" class="form-control <?= (session()->getFlashdata('invalid_balance')) ? 'is-invalid' : ''; ?> shadow-none" value="<?= old('balance'); ?>" placeholder="Masukkan saldo" autofocus required>
            <div class="invalid-feedback"><?= session()->getFlashdata('invalid_balance'); ?></div>
        </div>
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-success">Tambah saldo</button>
        </div>
    </form>
</div>
<?= $this->endSection('content') ?>

<?= $this->extend('templates/admin_template') ?>
<?= $this->section('rolename') ?>
    <h1>Buat akun</h1>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container">
    <form class="custom-form" action="<?= base_url('admin/create_user/seller/process'); ?>" method="POST">
    <?= csrf_field(); ?>
        <div class="form-group">
            <input type="text" name="username" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?> shadow-none" value="<?= old('username'); ?>" placeholder="Username" autofocus required>
            <div class="invalid-feedback"><?= $validation->getError('username'); ?></div>
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?> shadow-none" value="<?= old('password'); ?>" placeholder="Password" required>
            <div class="invalid-feedback"><?= $validation->getError('password'); ?></div>
        </div>
        <div class="form-group">
            <input type="password" name="password_confirm" class="form-control <?= ($validation->hasError('password_confirm')) ? 'is-invalid' : ''; ?> shadow-none" value="<?= old('password_confirm'); ?>" placeholder="Konfirmasi password" required>
            <div class="invalid-feedback"><?= $validation->getError('password_confirm'); ?></div>
        </div>
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-success">Buat akun</button>
        </div>
    </form>
</div>
<?= $this->endSection('content') ?>

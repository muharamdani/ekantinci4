<?= $this->extend('templates/admin_template') ?>
<?= $this->section('rolename') ?>
    <h1>Edit akun</h1>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container">
    <form class="custom-form" action="<?= base_url('/admin/update/seller/process'); ?>" method="POST">
    <?= csrf_field(); ?>
    <input type="hidden" name="id" value="<?= $data['id']; ?>">
        <div class="form-group">
            <input type="text" name="username" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?> shadow-none" value="<?= $data['username']; ?>" placeholder="Username" autofocus>
            <div class="invalid-feedback"><?= $validation->getError('username'); ?></div>
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?> shadow-none" value="<?= old('password'); ?>" placeholder="Password">
            <div class="invalid-feedback"><?= $validation->getError('password'); ?></div>
        </div>
        <div class="form-group">
            <input type="password" name="password_confirm" class="form-control <?= ($validation->hasError('password_confirm')) ? 'is-invalid' : ''; ?> shadow-none" value="<?= old('password_confirm'); ?>" placeholder="Konfirmasi password">
            <div class="invalid-feedback"><?= $validation->getError('password_confirm'); ?></div>
        </div>
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-success">Update akun</button>
        </div>
    </form>
</div>
<?= $this->endSection('content') ?>

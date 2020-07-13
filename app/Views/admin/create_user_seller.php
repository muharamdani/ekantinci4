<?= $this->extend('templates/admin_template') ?>
<?= $this->section('rolename') ?>
    <h1>Buat akun</h1>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container">
    <form class="custom-form" action="<?= base_url('admin/create_user/seller/process'); ?>" method="POST">
    <?= csrf_field(); ?>
    <?= $validation->listErrors(); ?>
        <div class="form-group">
            <input type="text" name="username" class="form-control shadow-none" placeholder="Username" autofocus required>
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control shadow-none" placeholder="Password" required>
        </div>
        <div class="form-group">
            <input type="password" name="password_confirm" class="form-control shadow-none" placeholder="Konfirmasi password" required>
        </div>
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-success">Buat akun</button>
        </div>
    </form>
</div>
<?= $this->endSection('content') ?>

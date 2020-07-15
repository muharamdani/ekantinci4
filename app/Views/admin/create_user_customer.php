<?= $this->extend('templates/admin_template') ?>
<?= $this->section('rolename') ?>
    <h1>Buat akun</h1>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container">
    <form class="custom-form" action="<?= base_url('/admin/create_user/customer/process'); ?>" method="POST">
    <?= csrf_field(); ?>
        <div class="form-group">
            <input type="number" name="nis" class="form-control <?= ($validation->hasError('nis')) ? 'is-invalid' : ''; ?> shadow-none" value="<?= old('nis'); ?>" placeholder="NIS" autofocus >
            <div class="invalid-feedback"><?= $validation->getError('nis'); ?></div>
        </div>
        <div class="form-group">
            <input type="text" name="name" class="form-control <?= ($validation->hasError('name')) ? 'is-invalid' : ''; ?> shadow-none" value="<?= old('name'); ?>" placeholder="Nama Lengkap" >
            <div class="invalid-feedback"><?= $validation->getError('name'); ?></div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <input type="text" name="username" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?> shadow-none" value="<?= old('username'); ?>" placeholder="Username" >
                <div class="invalid-feedback"><?= $validation->getError('username'); ?></div>
            </div>
            <div class="form-group col-md-6">
                <input type="password" name="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?> shadow-none" value="<?= old('password'); ?>" placeholder="Password" >
                <div class="invalid-feedback"><?= $validation->getError('password'); ?></div>
            </div>
        </div>
        <div class="form-group">
            <input type="text" name="class" class="form-control <?= ($validation->hasError('class')) ? 'is-invalid' : ''; ?> shadow-none" value="<?= old('class'); ?>" placeholder="Kelas" >
            <div class="invalid-feedback"><?= $validation->getError('class'); ?></div>
        </div>
        <div class="form-group">
            <input type="number" name="balance" class="form-control <?= ($validation->hasError('balance')) ? 'is-invalid' : ''; ?> shadow-none" value="<?= old('balance'); ?>" placeholder="Saldo awal" >
            <div class="invalid-feedback"><?= $validation->getError('balance'); ?></div>
        </div>
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-success">Buat akun</button>
        </div>
    </form>
</div>
<?= $this->endSection('content') ?>
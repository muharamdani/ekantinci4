<?= $this->extend('templates/admin_template') ?>
<?= $this->section('rolename') ?>
    <h1>Edit akun</h1>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container">
    <form class="custom-form" action="<?= base_url('/admin/update/customer/process'); ?>" method="POST">
    <?= csrf_field(); ?>
    <input type="hidden" name="id" value="<?= $data['id']; ?>">
        <div class="form-group">
            <input type="number" name="nis" class="form-control <?= ($validation->hasError('nis')) ? 'is-invalid' : ''; ?> shadow-none" value="<?= $data['nis']; ?>" placeholder="NIS" autofocus required>
            <div class="invalid-feedback"><?= $validation->getError('nis'); ?></div>
        </div>
        <div class="form-group">
            <input type="text" name="name" class="form-control <?= ($validation->hasError('name')) ? 'is-invalid' : ''; ?> shadow-none" value="<?= $data['full_name']; ?>" placeholder="Nama Lengkap" required>
            <div class="invalid-feedback"><?= $validation->getError('name'); ?></div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <input type="text" name="username" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?> shadow-none" value="<?= $data['username']; ?>" placeholder="Username" required>
                <div class="invalid-feedback"><?= $validation->getError('username'); ?></div>
            </div>
            <div class="form-group col-md-6">
                <input type="password" name="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?> shadow-none" placeholder="Password" required>
                <div class="invalid-feedback"><?= $validation->getError('password'); ?></div>
            </div>
        </div>
        <div class="form-group">
            <input type="text" name="class" class="form-control <?= ($validation->hasError('class')) ? 'is-invalid' : ''; ?> shadow-none" value="<?= $data['class']; ?>" placeholder="Kelas" required>
            <div class="invalid-feedback"><?= $validation->getError('class'); ?></div>
        </div>
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-success">Update akun</button>
        </div>
    </form>
</div>
<?= $this->endSection('content') ?>
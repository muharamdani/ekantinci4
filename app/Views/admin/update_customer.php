<?= $this->extend('templates/admin_template') ?>
<?= $this->section('rolename') ?>
    <h1>Edit akun</h1>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container">
    <form class="custom-form">
        <div class="form-group">
            <input type="number" name="nis" class="form-control shadow-none" value="<?= $data['nis']; ?>" placeholder="NIS" autofocus>
        </div>
        <div class="form-group">
            <input type="text" name="name" class="form-control shadow-none" value="<?= $data['full_name']; ?>" placeholder="Nama Lengkap" autofocus>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <input type="text" name="username" class="form-control shadow-none" value="<?= $data['username']; ?>" placeholder="Username">
            </div>
            <div class="form-group col-md-6">
                <input type="password" name="password" class="form-control shadow-none" placeholder="Password">
            </div>
        </div>
        <div class="form-group">
            <input type="text" name="class" class="form-control shadow-none" value="<?= $data['class']; ?>" placeholder="Kelas">
        </div>
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-success">Update akun</button>
        </div>
    </form>
</div>
<?= $this->endSection('content') ?>
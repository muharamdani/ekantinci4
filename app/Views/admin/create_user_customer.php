<?= $this->extend('templates/admin_template') ?>
<?= $this->section('rolename') ?>
    <h1>Buat akun</h1>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container">
    <form class="custom-form">
        <div class="form-group">
            <input type="number" name="nis" class="form-control shadow-none" placeholder="NIS" autofocus>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <input type="text" name="fname" class="form-control shadow-none" placeholder="Nama depan">
            </div>
            <div class="form-group col-md-6">
                <input type="text" name="lname" class="form-control shadow-none" placeholder="Nama belakang">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <input type="text" name="username" class="form-control shadow-none" placeholder="Username">
            </div>
            <div class="form-group col-md-6">
                <input type="password" name="password" class="form-control shadow-none" placeholder="Password">
            </div>
        </div>
        <div class="form-group">
            <input type="text" name="class" class="form-control shadow-none" placeholder="Kelas">
        </div>
        <div class="form-group">
            <input type="number" name="phnumber" class="form-control shadow-none" placeholder="Nomer telepon">
        </div>
        <div class="form-group">
            <input type="number" name="balance" class="form-control shadow-none" placeholder="Saldo awal">
        </div>
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-success">Buat akun</button>
        </div>
    </form>
</div>
<?= $this->endSection('content') ?>
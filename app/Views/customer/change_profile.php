<?= $this->extend('templates/customer_template') ?>
<?= $this->section('rolename') ?>
    <h1>Rubah profile</h1>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container">
    <form class="custom-form">
        <div class="form-group">
            <input type="text" name="username" class="form-control shadow-none" placeholder="Username" autofocus>
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control shadow-none" placeholder="Password">
        </div>
        <div class="form-group">
            <input type="password" name="password_confirm" class="form-control shadow-none" placeholder="Konfirmasi password">
        </div>
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-success">Rubah profile</button>
        </div>
    </form>
</div>
<?= $this->endSection('content') ?>

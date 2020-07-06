<?= $this->extend('templates/seller_template') ?>
<?= $this->section('rolename') ?>
    <h1>Lakukan transaksi</h1>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container">
    <form class="custom-form">
        <div class="form-group">
            <input type="number" name="balance" class="form-control shadow-none" placeholder="Jumlah bayar" autofocus>
        </div>
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>
</div>
<?= $this->endSection('content') ?>

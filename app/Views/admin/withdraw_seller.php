<?= $this->extend('templates/admin_template') ?>
<?= $this->section('rolename') ?>
    <h1>Tarik saldo akun penjual</h1>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container custom-form">
  <form action="" class="mb-3">
      <input type="text" name="" placeholder="Search" autofocus>
  </form>
  <div class="table-responsive">
    <table class="table text-center">
      <thead class="thead-dark">
        <tr>
          <th scope="col">No</th>
          <th scope="col">ID</th>
          <th scope="col">Username</th>
          <th scope="col">Saldo</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Edit ID</td>
          <td>Edit Username</td>
          <td>Edit Balance</td>
          <td>
              <a href="<?= base_url('admin/withdraw/customer/id'); ?>"><button class="btn btn-primary">Tarik</button></a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
<?= $this->endSection('content') ?>
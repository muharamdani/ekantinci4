<?= $this->extend('templates/admin_template') ?>
<?= $this->section('rolename') ?>
    <h1>Daftar akun penjual</h1>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container custom-form">
    <form action="" class="mb-3">
        <input type="text" name="" placeholder="Search" autofocus>
    </form>
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
          <a href="<?= base_url('admin/list_user/customer/delete/id'); ?>"><button class="btn btn-primary">Update</button></a>
          <a href="<?= base_url('admin/list_user/customer/update/id'); ?>"><button class="btn btn-danger">DELETE</button></a>
      </td>
    </tr>
  </tbody>
</table>
</div>
<?= $this->endSection('content') ?>
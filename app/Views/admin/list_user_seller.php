<?= $this->extend('templates/admin_template') ?>
<?= $this->section('rolename') ?>
    <h1>Daftar akun penjual</h1>
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
      <?php $i=1; foreach($data as $result): ?>
      <tbody>
        <tr>
          <th scope="row"><?= $i++ ?></th>
          <td><?= $result['id']; ?></td>
          <td><?= $result['username']; ?></td>
          <td><?= $result['balance']; ?></td>
          <td>
            <a href="<?= base_url('admin/update/seller'); echo '/', $result['id']; ?>"><button class="btn btn-primary">Update</button></a>
            <a href="<?= base_url('admin/update/seller'); echo '/', $result['id']; ?>"><button class="btn btn-danger">DELETE</button></a>
          </td>
        </tr>
      </tbody>
      <?php endforeach; ?>
    </table>
  </div>
</div>
<?= $this->endSection('content') ?>
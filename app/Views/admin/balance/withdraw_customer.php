<?= $this->extend('templates/admin_template') ?>
<?= $this->section('rolename') ?>
    <h1>Tarik saldo akun pelanggan</h1>
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
          <th scope="col">NIS</th>
          <th scope="col">Nama</th>
          <th scope="col">Kelas</th>
          <th scope="col">Saldo</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <?php $i=1; foreach($data as $result): ?>
      <tbody>
        <tr>
          <th scope="row"><?= $i++ ?></th>
          <td><?= $result['id']; ?></td>
          <td><?= $result['nis']; ?></td>
          <td><?= $result['full_name']; ?></td>
          <td><?= $result['class']; ?></td>
          <td><?= "Rp.",number_format($result['balance'], 0, '.','.'); ?></td>
          <td>
              <a href="<?= base_url('admin/withdraw/customer'); echo '/', $result['id']; ?>"><button class="btn btn-primary">Tarik</button></a>
          </td>
        </tr>
      </tbody>
      <?php endforeach; ?>
    </table>
  </div>
</div>
<?= $this->endSection('content') ?>
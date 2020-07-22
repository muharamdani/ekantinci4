<?= $this->extend('templates/admin_template') ?>
<?= $this->section('rolename') ?>
    <h1>Tarik saldo akun penjual</h1>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container custom-form">
  <form action="" class="mb-3">
      <input type="text" name="" placeholder="Search" autofocus>
  </form>
  <?php if(session()->getFlashdata('admin_error')):?>
    <div class="alert alert-danger" role="alert"><?= session()->getFlashdata('admin_error') ?></div>
  <?php endif;?>
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
          <td><?= "Rp.",number_format($result['balance'], 0, '.','.'); ?></td>
          <td>
              <a href="<?= base_url('admin/withdraw/seller'); echo '/', $result['id']; ?>"><button class="btn btn-primary">Tarik</button></a>
          </td>
        </tr>
      </tbody>
      <?php endforeach; ?>
    </table>
  </div>
</div>
<?= $this->endSection('content') ?>
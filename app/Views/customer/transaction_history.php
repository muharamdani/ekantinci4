<?= $this->extend('templates/customer_template') ?>
<?= $this->section('rolename') ?>
    <h1>Riwayat transaksi</h1>
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
          <th scope="col">Penjual</th>
          <th scope="col">Saldo</th>
          <th scope="col">Waktu</th>
        </tr>
      </thead>
      <?php $i=1; foreach($data as $result): ?>
      <tbody>
        <tr>
          <th scope="row"><?= $i++; ?></th>
          <td><?= $result['id']; ?></td>
          <td><?= $result['nis']; ?></td>
          <td><?= $result['full_name']; ?></td>
          <td><?= $result['username']; ?></td>
          <td><?= "Rp.",number_format($result['balance'], 0, '.','.'); ?></td>
          <td><?= $result['timestamp']; ?></td>
        </tr>
      </tbody>
      <?php endforeach; ?>
    </table>
  </div>
</div>
<?= $this->endSection('content') ?>
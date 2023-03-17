<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h5 class="m-0 font-weight-bold text-primary"><?php echo $title; ?>

    </div>
  </div>
  <!---mdmdm---->
  <div class="card p-2 shadow-sm border-bottom-primary">
    <div class="card-body">
      <div class="row">
        <div class="col-md-2 mb-4 mb-md-0">
          <img src="<?= base_url('files/img/profil/') . $user['image']; ?>" alt="" class="img-thumbnail rounded mb-2">
        </div>
        <div class="col-md-10">
          <table class="table">
            <tr>
              <th width="200">Nama</th>
              <td><?= $user['nama']; ?></td>
            </tr>
            <tr>
              <th>Email</th>
              <td><?= $user['email']; ?></td>
            </tr>
            <tr>
              <th>Daftar</th>
              <td class="text-capitalize">Pendaftar Sejak <?= date('d F Y', $user['date_created']); ?></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>

  
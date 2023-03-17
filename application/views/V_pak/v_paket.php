<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h5 class="m-0 font-weight-bold text-primary"><?php echo $title; ?>
        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
          Tambah Data
        </button>
    </div>

    <div class="card-body">
      <?php echo $this->session->flashdata('pesan'); ?>
      <div class="table-responsive">
        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No. </th>
              <th>Nama Paket</th>
              <th>Keterangan</th>
              <th>Harga</th>
              <th>Foto</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($paket as $pic) : ?>
              <tr>
                <td><?php echo  $no++; ?></td>
                <td><?php echo  $pic['nama_paket']; ?></td>
                <td><?php echo  $pic['keterangan']; ?></td>
                <td><?php echo  $pic['harga']; ?></td>
                <td><img src="<?php echo base_url() . '/gambar/' . $pic['foto']; ?>" width="100"></td>
                <td>
                  <button type=" button" class="badge btn-primary" data-toggle="modal" data-target="#editModal<?php echo $pic['id_paket']; ?>">
                    Edit
                  </button>

                  <a href="<?php echo site_url() ?>Paket/hapus_data/<?php echo $pic['id_paket']; ?>" class="badge badge-danger">Hapus</a>
                </td>

              <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!--modal--->
<!-- Button trigger modal -->


<!-- Modal Tambah -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open_multipart('paket/proses_tambah_data'); ?>
        <div class="form-group">
          <label>Nama Paket</label>
          <input type="text" name="nama_paket" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Keterangan</label>
          <input type="text" name="keterangan" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Harga</label>
          <input type="text" name="harga" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Foto</label>
          <input type="file" name="userfile" class="form-control" size="20" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>

    <?php echo form_close() ?>
  </div>
</div>

<!-- Modal -->

<!-- Modal Edit -->
<?php $no = 0;
foreach ($paket as $pic) : $no++; ?>
  <div class="modal fade" id="editModal<?php echo $pic['id_paket']; ?>" tabindex=" -1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Edit Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php echo form_open_multipart('paket/proses_edit_data/' . $pic['id_paket']); ?>
          <input type="hidden" name="id_paket" value="<?php echo $pic['id_paket']; ?> ">
          <div class="form-group">
            <label>Nama Paket</label>
            <input type="text" name="nama_paket" class="form-control" value="<?php echo $pic['nama_paket']; ?>">
          </div>
          <div class="form-group">
            <label>Keterangan</label>
            <input type="text" name="keterangan" class="form-control" value="<?php echo $pic['keterangan']; ?>" required>
          </div>
          <div class="form-group">
            <label>Harga</label>
            <input type="text" name="harga" class="form-control" value="<?php echo $pic['harga']; ?> " required>
          </div>
          <div class="form-group">
            <label>Foto</label>
            <input type="file" name="userfile" class="form-control">
          </div>
          <img src="<?php echo base_url() . '/gambar/' . $pic['foto']; ?>" width="100">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
          <?php echo form_close() ?>
        </div>
      </div>
    </div>
  </div>

<?php endforeach ?>
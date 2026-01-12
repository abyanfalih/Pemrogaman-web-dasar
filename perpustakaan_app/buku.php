<?php include 'koneksi.php'; ?>

<div class="card shadow-sm">
    <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Data Buku</h5>
        <button type="button" class="btn btn-light btn-sm fw-bold text-success" data-bs-toggle="modal" data-bs-target="#modalTambahBuku">
            + Tambah Buku
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Kode Buku</th>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $data = mysqli_query($koneksi, "SELECT * FROM tabel_buku");
                    while ($d = mysqli_fetch_array($data)) {
                    ?>
                    <tr>
                        <td><?php echo $d['kode_buku']; ?></td>
                        <td><?php echo $d['judul_buku']; ?></td>
                        <td><?php echo $d['penulis']; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $d['id_buku']; ?>&type=buku" class="btn btn-warning btn-sm text-white">Edit</a>
                            
                            <a href="hapus.php?id=<?php echo $d['id_buku']; ?>&type=buku" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus buku ini?')">Hapus</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modalTambahBuku" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Buku Baru</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form action="proses_tambah.php" method="POST">
          <div class="modal-body">
              <input type="hidden" name="type" value="buku">
              <div class="mb-3">
                  <label class="form-label">Kode Buku</label>
                  <input type="text" name="kode_buku" class="form-control" required placeholder="Contoh: BK-001">
              </div>
              <div class="mb-3">
                  <label class="form-label">Judul Buku</label>
                  <input type="text" name="judul_buku" class="form-control" required placeholder="Masukkan judul...">
              </div>
              <div class="mb-3">
                  <label class="form-label">Penulis</label>
                  <input type="text" name="penulis" class="form-control" required placeholder="Masukkan nama penulis...">
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-success">Simpan Data</button>
          </div>
      </form>
    </div>
  </div>
</div>
<?php include 'koneksi.php'; ?>

<div class="card shadow-sm">
    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Transaksi Peminjaman</h5>
        <button type="button" class="btn btn-warning btn-sm fw-bold" data-bs-toggle="modal" data-bs-target="#modalPinjam">
            + Pinjam Buku
        </button>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Peminjam</th>
                    <th>Buku</th>
                    <th>Tgl Pinjam</th>
                    <th>Tgl Kembali</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Query JOIN untuk mengambil nama anggota dan judul buku
                $query = "SELECT * FROM peminjaman 
                          JOIN anggota ON peminjaman.id_anggota = anggota.id_anggota 
                          JOIN tabel_buku ON peminjaman.id_buku = tabel_buku.id_buku
                          ORDER BY id_peminjaman DESC";
                
                $data = mysqli_query($koneksi, $query);
                $no = 1;
                while ($d = mysqli_fetch_array($data)) {
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['nama']; ?></td>
                    <td><?php echo $d['judul_buku']; ?></td>
                    <td><?php echo $d['tanggal_pinjam']; ?></td>
                    <td>
                        <?php 
                        if ($d['tanggal_kembali'] == '0000-00-00' || $d['tanggal_kembali'] == null) {
                            echo "-";
                        } else {
                            echo $d['tanggal_kembali'];
                        }
                        ?>
                    </td>
                    <td>
                        <?php if ($d['status_peminjaman'] == 'dipinjam') { ?>
                            <span class="badge bg-warning text-dark">Dipinjam</span>
                        <?php } else { ?>
                            <span class="badge bg-success">Dikembalikan</span>
                        <?php } ?>
                    </td>
                    <td>
                        <?php if ($d['status_peminjaman'] == 'dipinjam') { ?>
                            <a href="proses_kembali.php?id=<?php echo $d['id_peminjaman']; ?>" class="btn btn-primary btn-sm" onclick="return confirm('Proses pengembalian buku ini?')">Kembalikan</a>
                        <?php } else { ?>
                            <button class="btn btn-secondary btn-sm" disabled>Selesai</button>
                        <?php } ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="modalPinjam" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Form Peminjaman</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form action="proses_pinjam.php" method="POST">
          <div class="modal-body">
              
              <div class="mb-3">
                  <label class="form-label">Anggota Peminjam</label>
                  <select name="id_anggota" class="form-select" required>
                      <option value="">-- Pilih Anggota --</option>
                      <?php
                      $anggota = mysqli_query($koneksi, "SELECT * FROM anggota");
                      while ($a = mysqli_fetch_array($anggota)) {
                          echo "<option value='$a[id_anggota]'>$a[nama]</option>";
                      }
                      ?>
                  </select>
              </div>

              <div class="mb-3">
                  <label class="form-label">Buku yang Dipinjam</label>
                  <select name="id_buku" class="form-select" required>
                      <option value="">-- Pilih Buku --</option>
                      <?php
                      $buku = mysqli_query($koneksi, "SELECT * FROM tabel_buku");
                      while ($b = mysqli_fetch_array($buku)) {
                          echo "<option value='$b[id_buku]'>$b[judul_buku]</option>";
                      }
                      ?>
                  </select>
              </div>

              <div class="mb-3">
                  <label class="form-label">Tanggal Pinjam</label>
                  <input type="date" name="tanggal_pinjam" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
          </div>
      </form>
    </div>
  </div>
</div>
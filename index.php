<?php

// Memanggil Koneksi Database
include "koneksi.php";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Spesifikasi Gitar Di Toko Harmoni Setia Gitar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">
    <div class="mt-3"> 
      <marquee direction="right" behavior="scroll" scrollamount="10"> 
        <h2 style="text-align: center; color: red;"><b>Data Spesifikasi Gitar Di Toko Harmoni Setia Gitar</b></h2>
      </marquee>
    </div>

    <div class="card mt-3">
        <div class="card-header bg-primary text-white">
            <b>Data Spesifikasi Gitar</b>
        </div>
        <div class="card-body">
            <!-- Button trigger modal Tambah Data-->
            <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
                Tambah Data
            </button>
            <table class="table table-bordered table-striped table-hover">
                <tr>
                    <th>No</th>
                    <th>Nama Gitar</th>
                    <th>Tipe Gitar</th>
                    <th>Spesifikasi</th>
                    <th>Made In</th>
                    <th>Tahun Keluaran</th>
                    <th>Aksi</th>
                </tr>

                <?php
                // Proses Menyiapkan Menampilkan Data
                $no = 1;
                $tampil = mysqli_query($koneksi, "SELECT * FROM gitar ORDER BY id_gitar DESC");
                while ($data = mysqli_fetch_array($tampil)) :
                    ?>

                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $data['nama_gitar'] ?></td>
                        <td><?= $data['tipe_gitar'] ?></td>
                        <td><?= $data['spesifikasi'] ?></td>
                        <td><?= $data['made_in'] ?></td>
                        <td><?= $data['tahun_keluaran'] ?></td>        
                        <td>
                            <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $no ?>">Ubah</a>
                            <a href="aksi_crud.php?id_gitar=<?= $data['id_gitar']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data...?');">Hapus</a>
                        </td>
                    </tr>

<!-- Awal Modal Ubah -->
<div class="modal fade" id="modalUbah<?= $no  ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fs-5" id="staticBackdropLabel">Form Ubah Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form method="POST" action="aksi_crud.php">
          <input type="hidden" name="id_gitar" value="<?=$data['id_gitar']?>">
      
          <div class="modal-body">
<form>
  <div class="mb-3">
    <label class="form-label">Nama Gitar</label>
    <input type="text" class="form-control" name="tnama" value ="<?= $data['nama_gitar'] ?>" placeholder="Masukkan Nama Gitar" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Tipe Gitar</label>
    <input type="text" class="form-control" name="ttipe" value ="<?= $data['tipe_gitar'] ?>"placeholder="Inputkan Tipe Gitar" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Spesifikasi</label>
    <textarea class="form-control" name="tspesifikasi" rows="3" required><?= $data['spesifikasi'] ?></textarea>
  </div>
  <div class="mb-3">
    <label class="form-label" required>Made In</label>
    <select class="form-select" name="tmadein">
      <option value ="<?= $data['made_in'] ?>"></option>
      <option value="Indonesia">Indonesia</option>
      <option value="China">China</option>
      <option value="Amerika">Amerika</option>
      <option value="Jepang">Jepang</option>
      <option value="Korea">Korea</option>

    </select>
  </div>

  <div class="mb-3">
    <label for="ttahun" class="form-label">Tahun Keluaran</label>
    <input type="text" class="form-control" id="ttahun" name="ttahun" required>
  </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="bubah">Simpan Perubahan</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
      </form>
    </div>
  </div>
</div>
<!-- Akhir Modal Ubah -->

                <?php endwhile; ?>
            </table>

<!-- Awal Modal Simpan -->
<div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fs-5" id="staticBackdropLabel">Form Tambah Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form method="POST" action="aksi_crud.php">
      <div class="modal-body">
<form>
  <div class="mb-3">
    <label class="form-label">Nama Gitar</label>
    <input type="text" class="form-control" name="tnama" placeholder="Masukkan Nama Gitar" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Tipe Gitar</label>
    <input type="text" class="form-control" name="ttipe" placeholder="Inputkan Tipe Gitar" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Spesifikasi</label>
    <textarea class="form-control" name="tspesifikasi" rows="3" required></textarea>
  </div>
  <div class="mb-3">
    <label class="form-label">Made In</label>
    <select class="form-select" name="tmadein" required>
      <option></option>
      <option value="Indonesia">Indonesia</option>
      <option value="China">China</option>
      <option value="Amerika">Amerika</option>
      <option value="Jepang">Jepang</option>
      <option value="Korea">Korea</option>

    </select>
  </div>

  <div class="mb-3">
    <label class="form-label">Tahun Keluaran</label>
    <input type="text" class="form-control" name="ttahun" placeholder="Tahun Keluaran" required>
  </div>

      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="bsimpan">Simpan</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
      </form>
    </div>
  </div>
</div>

<!-- Akhir Modal Simpan -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
<?php

// Memanggil Koneksi Database
include "koneksi.php";

// Code Button Simpan
if(isset($_POST['bsimpan'])) {

    // Proses Simpan Data
    $simpan = mysqli_query($koneksi, "INSERT INTO gitar (nama_gitar, tipe_gitar, spesifikasi, made_in, tahun_keluaran)
                                      VALUES ('$_POST[tnama]',
                                            '$_POST[ttipe]',
                                            '$_POST[tspesifikasi]',
                                            '$_POST[tmadein]',
                                            '$_POST[ttahun]')");
    // Alert Simpan Sukses Atau Gagal
    if($simpan){
        echo "<script>
                alert('Yeey, Simpan Data Sukses');
                window.location.href = 'index.php';
              </script>";
    } else{
        echo "<script>
                alert('Maaf, Simpan Data Gagal');
                window.location.href = 'index.php';
              </script>";
    }
}

// Code Button Ubah
if(isset($_POST['bubah'])) {

    // Proses Ubah Data
    $ubah = mysqli_query($koneksi, "UPDATE gitar SET
                                                nama_gitar = '$_POST[tnama]',
                                                tipe_gitar = '$_POST[ttipe]',
                                                spesifikasi = '$_POST[tspesifikasi]',
                                                made_in = '$_POST[tmadein]',
                                                tahun_keluaran = '$_POST[ttahun]'
                                      WHERE id_gitar = '$_POST[id_gitar]'
                                                
                                            ");

    // Alert Ubah Data Sukses Atau Gagal
    if($ubah){
        echo "<script>
                alert('Yeey, Ubah Data Sukses');
                window.location.href = 'index.php';
              </script>";
    } else{
        echo "<script>
                alert('Maaf, Ubah Data Gagal');
                window.location.href = 'index.php';
              </script>";
    }
}

//Code Hapus Data
if (isset($_GET['id_gitar'])) {
    $id_gitar = $_GET['id_gitar'];

    // Hapus data dari tabel
    $hapus = $koneksi->query("DELETE FROM gitar WHERE id_gitar = '$id_gitar'");

    // Periksa Apakah Operasi Hapus Berhasil Atau Gagal 
    if ($hapus) {
        echo "<script>alert('Yeeeay, Data berhasil dihapus...');window.location='index.php';</script>";
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Menghapus Data : " . $koneksi->error . "');window.location='index.php';</script>";
    }
}

?>

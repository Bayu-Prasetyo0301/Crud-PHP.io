<?php

// Konfigurasi koneksi database
$server = "localhost";
$username = "root";
$password = "";
$database = "db_harmoni_gitar";

// Membuat koneksi
$koneksi = mysqli_connect($server, $username, $password, $database);

// Cek koneksi
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

?>
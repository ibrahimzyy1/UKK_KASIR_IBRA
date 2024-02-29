<?php
include '../koneksi.php';

$idpetugas = $_POST['idpetugas'];


mysqli_query($koneksi, "delete from petugas where idpetugas='$idpetugas'");

header("location:data_pengguna.php?pesan=hapus");
?>
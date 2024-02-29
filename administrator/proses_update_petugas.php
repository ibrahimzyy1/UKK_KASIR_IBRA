<?php
include '../koneksi.php';

$idpetugas = $_POST['idpetugas'];
$namapetugas = $_POST['namapetugas'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];
if (!$password) {
mysqli_query($koneksi, "update petugas set namapetugas='$namapetugas', username='$username', level='$level' where idpetugas='$idpetugas'");
} else {
mysqli_query($koneksi, "update petugas set namapetugas='$namapetugas', username='$username', password='$password', level='$level' where idpetugas='$idpetugas'");
}
header("location:data_pengguna.php?pesan=update");
?>
<?php
include '../koneksi.php';

$idpetugas = $_POST['idpetugas'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$level = $_POST['level'];

mysqli_query($koneksi, "insert into petugas values ('','$namapetugas','$username','$password','$level')");

header("location:data_pengguna.php?pesan=simpan");
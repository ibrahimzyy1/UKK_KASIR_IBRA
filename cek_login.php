<?php
// mengaktifkan session pada php
session_start();

// menghubungkan ke database
include "koneksi.php";

// menankap data yang di kirim form login
$username = $_POST['username'];
$password = md5($_POST['password']);

// menyeleksi data user dengan username dan password
$login = mysqli_query($koneksi, "select * from petugas where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
// check apakah data masuk

// cek jika username and password di temukan pada database
if ($cek > 0) {
    $data = mysqli_fetch_assoc($login);

    if ($data['level'] == "1") {
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "1";

        // alihkan ke halaman sebagai admin
        header("location:administrator/index.php");

        // cek jika user login sebagai pegawai
    } else if ($data['level'] == "2") {
        // buat session login dan username
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "2";
        // alihkan ke halaman sebagai admin
        header("location:petugas/index.php");
    } else {
        // alihkan ke halaman sebagai admin
        header("location:index.php?pesan=gagal");
    }
} else {
    // alihkan ke halaman sebagai admin
    header("location:index.php?pesan=gagal");
}
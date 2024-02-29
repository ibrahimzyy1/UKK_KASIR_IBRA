<?php
$koneksi = mysqli_connect("localhost", "root", "", "ukk_kasir_ibra");

// check Connection

if (mysqli_connect_errno()) {
    echo "koneksi database gagal : " . mysqli_connect_error();
}

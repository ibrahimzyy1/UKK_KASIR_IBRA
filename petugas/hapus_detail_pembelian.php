<?php
include '../koneksi.php';

$detailid = $_POST['detailid'];
$pelangganid = $_POST['pelangganid'];


mysqli_query($koneksi, "delete from detailpenjualan where detailid='$detailid'");

header("location:detail_pembelian.php?pelangganid=$pelangganid");

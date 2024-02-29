<?php
include '../koneksi.php';

$pelangganid = $_POST['pelangganid'];
$penjualanid = $_POST['penjualanid'];


mysqli_query($koneksi, "insert into detailpenjualan values('','$penjualanid','','','')");

header("location:detail_pembelian.php?pelangganid=$pelangganid");

?>
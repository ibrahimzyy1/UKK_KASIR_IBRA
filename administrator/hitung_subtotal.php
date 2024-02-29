<?php
include '../koneksi.php';

$stok = $_POST['stok'];
$produkid = $_POST['produkid'];
$jumlahproduk = $_POST['jumlahproduk'];
$harga = $_POST['harga'];
$detailid = $_POST['detailid'];
$pelangganid = $_POST['pelangganid'];
$subtotal = $jumlahproduk * $harga;
$stok_total = $stok - $jumlahproduk;

if ($stok_total >=  0){

    mysqli_query($koneksi, "update detailpenjualan set subtotal='$subtotal', jumlahproduk='$jumlahproduk' where detailid='$detailid'");
    mysqli_query($koneksi, "update produk set stok='$stok_total' where produkid='$produkid'");
    
    header("location:detail_pembelian.php?pelangganid=$pelangganid");
} else {
    echo "<script>alert ('Silahkan Di isi stok nya'); window.location.href='detail_pembelian.php?pelangganid=$pelangganid';</script>";
}
?>
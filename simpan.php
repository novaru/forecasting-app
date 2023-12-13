<?php
  extract($_GET);
  extract($_POST);
  include "koneksi.php";
  if ($simpan) {
    $sql = "INSERT INTO penjualan (minggu, bulan, tahun, jumlah) VALUES ('$list_minggu', '$list_bulan', '$tahun', '$jumlah')";
    $hasil = mysqli_query($conn_forecasting, $sql);
    if ($hasil) {
      echo "<script>alert('Data berhasil disimpan!');window.location='input.php';</script>";
    } else {
      echo "<script>alert('Data gagal disimpan!');window.location='input.php';</script>";
    }
  }
?>
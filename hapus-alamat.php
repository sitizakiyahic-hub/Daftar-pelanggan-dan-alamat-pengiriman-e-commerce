<?php

include "koneksi.php";

$id = $_GET['id'];


$sql_pelanggan = "SELECT pelanggan_id FROM alamat_pengiriman WHERE id = $id";

$result = mysqli_query($koneksi, $sql_pelanggan);

$data = mysqli_fetch_assoc($result);

$id_pelanggan = $data['pelanggan_id'];

$sql = "DELETE FROM alamat_pengiriman WHERE id = $id";

mysqli_query($koneksi, $sql);

header("Location: pelanggan-detail.php?id=$id_pelanggan");
exit;

?>
<?php
include "koneksi.php";
$id_pelanggan = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $label = $_POST['label'];
    $alamat = $_POST['alamat'];
    $kota = $_POST['kota'];
    $provinsi = $_POST['provinsi'];
    $kode_pos = $_POST['kode_pos'];
    $status = $_POST['status'];

    mysqli_query($koneksi, "INSERT INTO alamat_pengiriman (pelanggan_id, label, alamat, kota, provinsi, kode_pos, status) VALUES ('$id_pelanggan', '$label', '$alamat', '$kota', '$provinsi', '$kode_pos', '$status')");
    header("Location: pelanggan-detail.php?id=$id_pelanggan");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Alamat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>Tambah Alamat</h1>

    <form method="post">
        <p>
            <label>Label</label><br>
            <select name="label" required>
                <option value="">Pilih Label</option>
                <option value="Kos">Kos</option>
                <option value="Rumah">Rumah</option>
                <option value="Kantor">Kantor</option>
            </select>
        </p>
        <p><label>Alamat</label><br><input type="text" name="alamat" required></p>
        <p><label>Kota</label><br><input type="text" name="kota" required></p>
        <p><label>Provinsi</label><br><input type="text" name="provinsi" required></p>
        <p><label>Kode Pos</label><br><input type="text" name="kode_pos" required></p>
        <p>
            <label>Status</label><br>
            <select name="status" required>
                <option value="">Pilih Status</option>
                <option value="Aktif">Aktif</option>
                <option value="Tidak Aktif">Tidak Aktif</option>
            </select>
        </p>
        <button type="submit">Simpan</button>
    </form>

    <br>
    <a href="pelanggan-detail.php?id=<?= $id_pelanggan ?>">← Kembali ke Detail Pelanggan</a>

</body>
</html>
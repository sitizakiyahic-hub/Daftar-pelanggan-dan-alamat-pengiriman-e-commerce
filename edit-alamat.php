<?php
include "koneksi.php";
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM alamat_pengiriman WHERE id = $id"));

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $label = $_POST['label'];
    $alamat = $_POST['alamat'];
    $kota = $_POST['kota'];
    $provinsi = $_POST['provinsi'];
    $kode_pos = $_POST['kode_pos'];
    $status = $_POST['status'];

    mysqli_query($koneksi, "UPDATE alamat_pengiriman SET label='$label', alamat='$alamat', kota='$kota', provinsi='$provinsi', kode_pos='$kode_pos', status='$status' WHERE id=$id");
    header("Location: pelanggan-detail.php?id=" . $data['pelanggan_id']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Alamat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>Edit Alamat</h1>

    <form method="post">
        <p>
            <label>Label</label><br>
            <select name="label" required>
                <option value="Kos" <?= $data['label'] == 'Kos' ? 'selected' : '' ?>>Kos</option>
                <option value="Rumah" <?= $data['label'] == 'Rumah' ? 'selected' : '' ?>>Rumah</option>
                <option value="Kantor" <?= $data['label'] == 'Kantor' ? 'selected' : '' ?>>Kantor</option>
            </select>
        </p>
        <p><label>Alamat</label><br><input type="text" name="alamat" value="<?= $data['alamat'] ?>" required></p>
        <p><label>Kota</label><br><input type="text" name="kota" value="<?= $data['kota'] ?>" required></p>
        <p><label>Provinsi</label><br><input type="text" name="provinsi" value="<?= $data['provinsi'] ?>" required></p>
        <p><label>Kode Pos</label><br><input type="text" name="kode_pos" value="<?= $data['kode_pos'] ?>" required></p>
        <p>
            <label>Status</label><br>
            <select name="status" required>
                <option value="Aktif" <?= $data['status'] == 'Aktif' ? 'selected' : '' ?>>Aktif</option>
                <option value="Tidak Aktif" <?= $data['status'] == 'Tidak Aktif' ? 'selected' : '' ?>>Tidak Aktif</option>
            </select>
        </p>
        <button type="submit">Simpan Perubahan</button>
    </form>

    <br>
    <a href="pelanggan-detail.php?id=<?= $data['pelanggan_id'] ?>">← Kembali ke Detail Pelanggan</a>

</body>
</html>
<?php
include "koneksi.php";

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM daftar_pelanggan WHERE id = $id"));
$result_alamat = mysqli_query($koneksi, "SELECT * FROM alamat_pengiriman WHERE pelanggan_id = $id");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pelanggan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>Detail Pelanggan</h1>
    <a href="pelanggan.php">← Kembali ke Daftar Pelanggan</a>

    <h2>Profil Pelanggan</h2>
    <img src="pp mojak.jpg" width="80" alt="Foto Profil">
    <p><b>Nama :</b> <?= $data['nama'] ?></p>
    <p><b>Email :</b> <?= $data['email'] ?></p>
    <p><b>No HP :</b> <?= $data['no_hp'] ?></p>
    <p><b>Member :</b> <?= $data['member'] ?></p>

    <h2>Alamat Pengiriman</h2>
    <p>Daftar alamat yang digunakan oleh pelanggan :</p>

    <table>
        <tr>
            <th>No.</th>
            <th>Label</th>
            <th>Alamat</th>
            <th>Kota</th>
            <th>Provinsi</th>
            <th>Kode Pos</th>
            <th>Status</th>
            <th>More</th>
        </tr>

        <?php while ($alamat = mysqli_fetch_assoc($result_alamat)) : ?>
        <tr>
            <td><?= $alamat['id'] ?></td>
            <td><?= $alamat['label'] ?></td>
            <td><?= $alamat['alamat'] ?></td>
            <td><?= $alamat['kota'] ?></td>
            <td><?= $alamat['provinsi'] ?></td>
            <td><?= $alamat['kode_pos'] ?></td>
            <td><?= $alamat['status'] ?></td>
            <td>
                <a href="edit-alamat.php?id=<?= $alamat['id'] ?>"><button type="button">Edit</button></a>
                <a href="hapus-alamat.php?id=<?= $alamat['id'] ?>" onclick="return confirm('Yakin ingin menghapus alamat ini?');"><button type="button">Hapus</button></a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

    <br>
    <a href="tambah-alamat.php?id=<?= $id ?>"><button type="button">Tambah Alamat</button></a>

</body>
</html>
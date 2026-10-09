<?php
include "koneksi.php";
$result = mysqli_query($koneksi, "SELECT * FROM daftar_pelanggan");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelanggan</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>

    <h1>Daftar Pelanggan</h1>
    <h2>Pengelolaan akun pembeli</h2>

    <div class="filter">
        <input type="text" placeholder="Cari pelanggan...">
    </div>

    <table>
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Email</th>
            <th>No HP</th>
            <th>Member</th>
            <th>More</th>
        </tr>

        <?php while ($data = mysqli_fetch_assoc($result)) : ?>
        <tr>
            <td><?= $data['id'] ?></td>
            <td><?= $data['nama'] ?></td>
            <td><?= $data['email'] ?></td>
            <td><?= $data['no_hp'] ?></td>
            <td><?= $data['member'] ?></td>
            <td><a href="pelanggan-detail.php?id=<?= $data['id'] ?>">Detail</a></td>
        </tr>
        <?php endwhile; ?>
    </table>

    <br>
    <a href="tambah-pelanggan.php"><button type="button">Tambah Pelanggan</button></a>

</body>
</html>
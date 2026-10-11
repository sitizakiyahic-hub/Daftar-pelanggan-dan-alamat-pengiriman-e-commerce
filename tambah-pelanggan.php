<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $member = $_POST['member'];

    mysqli_query($koneksi, "INSERT INTO daftar_pelanggan (nama, email, no_hp, member) VALUES ('$nama', '$email', '$no_hp', '$member')");
    header("Location: pelanggan.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pelanggan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>Tambah Pelanggan</h1>

    <form method="post">
        <p><label>Nama</label><br><input type="text" name="nama" required></p>
        <p><label>Email</label><br><input type="email" name="email" required></p>
        <p><label>No HP</label><br><input type="text" name="no_hp" required></p>
        <p>
            <label>Member</label><br>
            <select name="member" required>
                <option value="">Pilih Member</option>
                <option value="Gold">Gold</option>
                <option value="Platinum">Platinum</option>
                <option value="Silver">Silver</option>
            </select>
        </p>
        <button type="submit">Simpan</button>
    </form>

    <br>
    <a href="pelanggan.php">← Kembali ke Daftar Pelanggan</a>

</body>
</html>
<?php

include "koneksi.php";

$id = $_GET['id'];


$sql = "SELECT * FROM alamat_pengiriman WHERE id = $id";

$result = mysqli_query($koneksi, $sql);

$data = mysqli_fetch_assoc($result);


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $label = $_POST['label'];
    $alamat = $_POST['alamat'];
    $kota = $_POST['kota'];
    $provinsi = $_POST['provinsi'];
    $kode_pos = $_POST['kode_pos'];
    $status = $_POST['status'];

    $sql_update = "UPDATE alamat_pengiriman SET
                    label = '$label',
                    alamat = '$alamat',
                    kota = '$kota',
                    provinsi = '$provinsi',
                    kode_pos = '$kode_pos',
                    status = '$status'
                   WHERE id = $id";

    mysqli_query($koneksi, $sql_update);


    $id_pelanggan = $data['pelanggan_id'];

    header("Location: pelanggan-detail.php?id=$id_pelanggan");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

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

                <option value="Kos"
                    <?php if ($data['label'] == 'Kos') echo 'selected'; ?>>
                    Kos
                </option>

                <option value="Rumah"
                    <?php if ($data['label'] == 'Rumah') echo 'selected'; ?>>
                    Rumah
                </option>

                <option value="Kantor"
                    <?php if ($data['label'] == 'Kantor') echo 'selected'; ?>>
                    Kantor
                </option>

            </select>

        </p>


        <p>

            <label>Alamat</label><br>

            <input type="text"
                   name="alamat"
                   value="<?php echo $data['alamat']; ?>"
                   required>

        </p>


        <p>

            <label>Kota</label><br>

            <input type="text"
                   name="kota"
                   value="<?php echo $data['kota']; ?>"
                   required>

        </p>


        <p>

            <label>Provinsi</label><br>

            <input type="text"
                   name="provinsi"
                   value="<?php echo $data['provinsi']; ?>"
                   required>

        </p>


        <p>

            <label>Kode Pos</label><br>

            <input type="text"
                   name="kode_pos"
                   value="<?php echo $data['kode_pos']; ?>"
                   required>

        </p>


        <p>

            <label>Status</label><br>

            <select name="status" required>

                <option value="Aktif"
                    <?php if ($data['status'] == 'Aktif') echo 'selected'; ?>>
                    Aktif
                </option>

                <option value="Tidak Aktif"
                    <?php if ($data['status'] == 'Tidak Aktif') echo 'selected'; ?>>
                    Tidak Aktif
                </option>

            </select>

        </p>


        <button type="submit">
            Simpan Perubahan
        </button>

    </form>


    <br>


    <a href="pelanggan-detail.php?id=<?php echo $data['pelanggan_id']; ?>">
        ← Kembali ke Detail Pelanggan
    </a>


</body>

</html>
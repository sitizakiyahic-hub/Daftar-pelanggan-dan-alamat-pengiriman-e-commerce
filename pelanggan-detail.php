<?php

include "koneksi.php";


$id = $_GET['id'];


$sql = "SELECT * FROM daftar_pelanggan WHERE id = $id";

$result = mysqli_query($koneksi, $sql);

$data = mysqli_fetch_assoc($result);




$sql_alamat = "SELECT * FROM alamat_pengiriman WHERE pelanggan_id = $id";

$result_alamat = mysqli_query($koneksi, $sql_alamat);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail Pelanggan</title>

    <link rel="stylesheet" href="style.css">

</head>


<body>


    <h1>Detail Pelanggan</h1>


    <a href="pelanggan.php">

        ← Kembali ke Daftar Pelanggan

    </a>


    <h2>Profil Pelanggan</h2>


    <img src="pp mojak.jpg" width="80" alt="Foto Profil">


    <p>

        <b>Nama :</b>

        <?php echo $data['nama']; ?>

    </p>


    <p>

        <b>Email :</b>

        <?php echo $data['email']; ?>

    </p>


    <p>

        <b>No HP :</b>

        <?php echo $data['no_hp']; ?>

    </p>


    <p>

        <b>Member :</b>

        <?php echo $data['member']; ?>

    </p>



    <h2>Alamat Pengiriman</h2>


    <p>

        Daftar alamat yang digunakan oleh pelanggan :

    </p>


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



        <?php while ($alamat = mysqli_fetch_assoc($result_alamat)) { ?>


        <tr>


            <td>

                <?php echo $alamat['id']; ?>

            </td>


            <td>

                <?php echo $alamat['label']; ?>

            </td>


            <td>

                <?php echo $alamat['alamat']; ?>

            </td>


            <td>

                <?php echo $alamat['kota']; ?>

            </td>


            <td>

                <?php echo $alamat['provinsi']; ?>

            </td>


            <td>

                <?php echo $alamat['kode_pos']; ?>

            </td>


            <td>

                <?php echo $alamat['status']; ?>

            </td>



            <td>

                <a href="edit-alamat.php?id=<?php echo $alamat['id']; ?>">
                    <button type="button">Edit</button>
                </a>

                <a href="hapus-alamat.php?id=<?php echo $alamat['id']; ?>"
                onclick="return confirm('Yakin ingin menghapus alamat ini?');">
                    <button type="button">Hapus</button>
                </a>

            </td>



        </tr>


        <?php } ?>


    </table>



    <br>


    <a href="tambah-alamat.php?id=<?php echo $id; ?>">
        <button type="button">
            Tambah Alamat
        </button>
    </a>


</body>

</html>
<?php

include "koneksi.php";

$sql = "SELECT * FROM daftar_pelanggan";

$result = mysqli_query($koneksi, $sql);

?>

<!DOCTYPE html>
<html lang="en">

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


        <?php while ($data = mysqli_fetch_assoc($result)) { ?>

        <tr>

            <td>
                <?php echo $data['id']; ?>
            </td>

            <td>
                <?php echo $data['nama']; ?>
            </td>

            <td>
                <?php echo $data['email']; ?>
            </td>

            <td>
                <?php echo $data['no_hp']; ?>
            </td>

            <td>
                <?php echo $data['member']; ?>
            </td>

            <td>

                <a href="pelanggan-detail.php?id=<?php echo $data['id']; ?>">
                    Detail
                </a>

            </td>

        </tr>

        <?php } ?>

    </table>


    <br>


    <form action="tambah-pelanggan.php">

        <button type="submit">
            Tambah Pelanggan
        </button>

    </form>


</body>

</html>
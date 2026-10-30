<?php
    require 'function.php';
    $barang = query_db("SELECT * FROM barang");

        // untuk mencari data melalui input "cari barang...."
        if(isset($_POST["cari"])){
            $keyword = $_POST["keyword"];
            $barang = cari_data($keyword);
        }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Inventaris Upi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="page-index"> 

    <div class="container">
        <h3 style="text-align: center">Daftar Inventaris Upi</h3>
        <div class="top-bar">
            <!-- Searching -->
            <form action="" method="post" class="search-box">
                <input type="text" name="keyword" placeholder="Cari barang...">
                <button type="submit" name="cari" class="btn btn-cari">Cari</button>
            </form>


            <!-- Tambah Data -->
            <a href="tambah_data.php" class="btn btn-tambah"> Tambah Data</a>
        </div>


        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>ID</th>
                    <th>Kode</th>
                    <th>Nama Barang</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $nomor=1; ?>
                <?php foreach($barang as $data): ?>
                <tr>
                    <td><?php echo $nomor ?></td>
                    <td><?php echo $data["id"] ?></td>
                    <td><?php echo $data["kode_barang"] ?></td>
                    <td><?php echo $data["nama_barang"] ?></td>
                    <td><?php echo $data["stok"] ?></td>
                    <td>
                        <a href="edit_data.php?id=<?php echo $data["id"]; ?>" class="btn btn-edit">Edit</a>
                        <a href="hapus_data.php?id=<?php echo $data["id"]; ?>" class="btn btn-hapus">Hapus</a>
                    </td>
                </tr>
                <?Php $nomor++; ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    
</body>
</html>
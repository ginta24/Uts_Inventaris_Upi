<?php
    require 'function.php';

    if(isset($_POST['submit'])){

        if(tambah_data($_POST) > 0){
            echo "<script>
            alert('Data sudah berhasil dimasukan ke basis data');
            document.location.href = 'index.php?page=barang';
            </script>";
        }else{
            echo "<script>
            alert('Data gagal dimasukan ke basis data');
            </script>";
        }
    }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Tambah Data Inventaris</title>
    <link rel="stylesheet" href="style.css">
</head>


<body class="page-form">


<div class="container">


    <div class="form-card">


        <h3>Tambah Data Inventaris </h3>


        <form action="" method="post">

    <div class="form-group">
        <label for="kode_barang">Kode Barang</label>
        <input type="text" name="kode_barang" id="kode_barang" placeholder="Contoh: BRG004" required>
    </div>

    <div class="form-group">
        <label for="nama_barang">Nama Barang</label>
        <input type="text" name="nama_barang" id="nama_barang" placeholder="Masukkan nama barang" required>
    </div>

    <div class="form-group">
        <label for="stok">Stok</label>
        <input type="number" name="stok" id="stok" min="0" placeholder="Masukkan stok" required>
    </div>


    <div class="button-group">
        <button type="submit" name="submit" class="btn btn-tambah"> Tambah Data </button>
        <a href="index.php" class="btn btn-kembali"> Kembali </a>
    </div>

</form>
    </div>
</div>

</body>
</html>

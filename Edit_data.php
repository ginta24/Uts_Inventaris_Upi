<?php
    require 'function.php';

    $id = isset($_GET["id"]) ? (int) $_GET["id"] : 0;
    $barang = query_db("SELECT * FROM barang WHERE id = $id")[0];


    // Var_dump($barang);

    if(isset($_POST['submit'])){
        // var_dump($_POST);

        if(edit_data($_POST) > 0){
            echo "<script>
            alert('Data sudah berhasil diubah!');
            document.location.href = 'index.php?page=barang';
            </script>";
        }else{
            echo "<script>
            alert('Data gagal diubah!');
            </script>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Edit Data Inventaris</title>
    <link rel="stylesheet" href="style.css">
</head>


<body class="page-form">


<div class="container">


    <div class="form-card">


        <h3>Edit Data Inventaris </h3>


        <form action="" method="post">

            <input type="hidden" name="id" value="<?php echo $barang["id"]; ?>">


            <div class="form-group">
                <label for="kode_barang">Kode Barang</label>
                <input type="text" name="kode_barang" id="kode_barang" class="form-control" value="<?php echo $barang["kode_barang"]; ?>" required>
            </div>


            <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" name="nama_barang" id="nama_barang" class="form-control" value="<?php echo $barang["nama_barang"]; ?>" required>
            </div>


            <div class="form-group">
                <label for="stok">Stok</label>
                <input type="number" name="stok" id="stok" class="form-control" min="0" value="<?php echo $barang["stok"]; ?>" required>
            </div>



            <div class="button-group">
              <button type="submit" name="submit" class="btn btn-ubah"> Edit Data </button>
              <a href="index.php?page=barang" class="btn btn-kembali"> Kembali </a>
            </div>

        </form>

    </div>
</div>

</body>
</html>

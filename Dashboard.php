<?php
    require 'function.php';

    // data ringkasan untuk kartu statistik
    $total_barang = query_db("SELECT COUNT(*) AS jml FROM barang")[0]["jml"];
    $total_stok   = query_db("SELECT COALESCE(SUM(stok), 0) AS jml FROM barang")[0]["jml"];
    $stok_tipis   = query_db("SELECT COUNT(*) AS jml FROM barang WHERE stok < 5")[0]["jml"];

    // 5 barang yang terakhir ditambahkan
    $terbaru = query_db("SELECT * FROM barang ORDER BY id DESC LIMIT 5");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Inventaris UPI</title>
    <link rel="stylesheet" href="style.css">


    <style>
        .stat-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin-bottom: 30px;
        }

        .stat-card {
            padding: 20px;
            border-radius: 12px;
            color: white;
            text-align: center;
        }

        .stat-angka {
            margin: 0;
            font-size: 36px;
            font-weight: bold;
        }

        .stat-label {
            margin: 5px 0 0;
            font-size: 14px;
        }

        .stat-biru  { background-color: #2563eb; }
        .stat-hijau { background-color: #16a34a; }
        .stat-merah { background-color: #e74c3c; }

        .judul-bagian {
            margin: 0 0 12px;
            color: #333;
        }

        @media (max-width: 768px) {
            .stat-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body class="page-index">

    <div class="container">
        <h3 style="text-align: center">Dashboard Inventaris UPI</h3>

        <div class="top-bar">
            <span>Ringkasan data barang saat ini</span>
            <a href="index.php" class="btn btn-cari">Kelola Data Barang</a>
        </div>

        <!-- Kartu statistik -->
        <div class="stat-grid">
            <div class="stat-card stat-biru">
                <p class="stat-angka"><?php echo $total_barang; ?></p>
                <p class="stat-label">Jenis Barang</p>
            </div>
            <div class="stat-card stat-hijau">
                <p class="stat-angka"><?php echo $total_stok; ?></p>
                <p class="stat-label">Total Stok</p>
            </div>
            <div class="stat-card stat-merah">
                <p class="stat-angka"><?php echo $stok_tipis; ?></p>
                <p class="stat-label">Stok Menipis (kurang dari 5)</p>
            </div>
        </div>

        <!-- 5 barang terbaru -->
        <h4 class="judul-bagian"><?php echo count($terbaru); ?> Barang Terbaru</h4>
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Kode</th>
                    <th>Nama Barang</th>
                    <th>Stok</th>
                </tr>
            </thead>
            <tbody>
                <?php $nomor=1; ?>
                <?php foreach($terbaru as $data): ?>
                <tr>
                    <td><?php echo $nomor ?></td>
                    <td><?php echo $data["kode_barang"] ?></td>
                    <td><?php echo $data["nama_barang"] ?></td>
                    <td><?php echo $data["stok"] ?></td>
                </tr>
                <?php $nomor++; ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

</body>
</html>
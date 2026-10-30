<?php


// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "inventaris_upi");


function query_db($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
        while( $row = mysqli_fetch_assoc($result) ) {
            $rows[] = $row;
        }
        return $rows;
    }
    


function tambah_data($data){
    global $conn;

    $kode  = $data['kode_barang'];
    $nama  = $data['nama_barang'];
    $stok  = $data['stok'];
    

    $query = "INSERT INTO barang(kode_barang, nama_barang, stok)
              VALUES ('$kode', '$nama', $stok)
             ";

    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}

function hapus_data($id){
    global $conn;

    $query = "DELETE FROM barang WHERE id = $id";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function edit_data($data){
    global $conn;

    $id    = (int) $data['id'];
    $kode  = $data['kode_barang'];
    $nama  = $data['nama_barang'];
    $stok  = (int) $data['stok'];
    
        $query = "UPDATE barang SET
            kode_barang = '$kode',
            nama_barang = '$nama',
            stok = $stok
            WHERE id = $id
         ";

    $hasil = mysqli_query($conn, $query);
    return $hasil ? 1 : 0;
}

// SEARCH
function cari_data($keyword) {
    global $conn;

    $keyword = mysqli_real_escape_string($conn, $keyword);

    $query = "SELECT * FROM barang
              WHERE
              kode_barang LIKE '%$keyword%' OR
              nama_barang LIKE '%$keyword%'";

    return query_db($query);
}
?>


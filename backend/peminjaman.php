<?php
    include "connect.php";
    session_start();
    

    if(isset($_POST['pinjam'])){

    if(!isset($_SESSION['id'])) {
        header("Location: ../login.html");
        exit();
    }

    $id_buku = $_POST['id_buku'];
    $id_user = $_SESSION['id'];
    $date = date('Y-m-d');

    $stok = mysqli_query($conn, "SELECT stok from buku where id_buku = '$id_buku'");
    $buku = mysqli_fetch_assoc($stok);

    if($buku['stok'] < 1 ){
        echo "<script>alert('Stock Buku Habis!'); window.location.href='../users/buku.php';</script>";
    }
     $cek_pinjam = mysqli_query($conn, "
        SELECT p.* FROM peminjaman p
        JOIN detail_peminjaman dp ON p.id_peminjaman = dp.id_peminjaman
        WHERE dp.id_buku='$id_buku' 
        AND p.id_user='$id_user' 
        AND p.status IN ('menunggu','dipinjam')
    ");
    if(mysqli_num_rows($cek_pinjam) > 0) {
        echo "<script>alert('Kamu sudah mengajukan pinjam buku ini!'); history.back();</script>";
        exit();
    }

    $insert  = "insert into peminjaman (id_user, tanggal_peminjaman, status) VALUES ('$id_user', '$date', 'menunggu')";
    
    $insertQuery = mysqli_query($conn, $insert);
    

    $id_peminjaman = mysqli_insert_id($conn);

    mysqli_query($conn , "INSERT INTO detail_peminjaman (id_peminjaman, id_buku) VALUES ('$id_peminjaman', '$id_buku')");

    if($insertQuery) {
    echo "<script>alert('Pengajuan peminjaman berhasil! Tunggu konfirmasi petugas.'); 
        window.location.href='../users/mybook.php';</script>";
    } else {
    echo "<script>alert('Gagal: " . mysqli_error($conn) . "'); history.back();</script>";
    }
}
?>
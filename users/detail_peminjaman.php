<?php
session_start();
include "../backend/connect.php";

$id_detail = $_GET['id'];

$query = mysqli_query($conn, "
    SELECT dp.*, p.tanggal_peminjaman, p.status,
           b.nama_buku, b.cover, b.description,
           a.name as nama_petugas
    FROM detail_peminjaman dp
    JOIN peminjaman p ON dp.id_peminjaman = p.id_peminjaman
    JOIN buku b ON dp.id_buku = b.id_buku
    LEFT JOIN account_admin a ON dp.id_admin = a.id_admin
    WHERE dp.id_detail = '$id_detail'
");
    $data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html>
<head><title>Detail Peminjaman</title></head>
<body>
    <a href="mybook.php">Kembali</a>
    <img src="../upload/<?= $data['cover']; ?>" width="150">
    <h2><?= $data['nama_buku']; ?></h2>
    <p>Tanggal Pinjam : <?= $data['tanggal_peminjaman']; ?></p>
    <p>Tanggal Kembali: <?= $data['tanggal_kembali'] ?? 'Belum ditentukan'; ?></p>
    <p>Petugas        : <?= $data['nama_petugas'] ?? 'Belum disetujui'; ?></p>
    <p>Status         : <?= $data['status']; ?></p>
</body>
</html>
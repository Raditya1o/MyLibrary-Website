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
<head><title>Detail Peminjaman</title>
      <link rel="stylesheet" href="../frontend/detailPeminjamanStyle.css">
</head>
<body>
    <div class="detail-container">
        <a href="mybook.php" class="back-link">Kembali</a>
        <img src="../upload/<?= $data['cover']; ?>" class="book-img-detail">
        <h2 class="book-title"><?= $data['nama_buku']; ?></h2>
        <div class="detail-info">
            <p><span class="detail-label">Tanggal Pinjam :</span> <span class="detail-value"><?= $data['tanggal_peminjaman']; ?></span></p>
            <p><span class="detail-label">Tanggal Kembali:</span> <span class="detail-value"><?= $data['tanggal_kembali'] ?? 'Belum ditentukan'; ?></span></p>
            <p><span class="detail-label">Petugas        :</span> <span class="detail-value"><?= $data['nama_petugas'] ?? 'Belum disetujui'; ?></span></p>
            <p><span class="detail-label">Status         :</span> <span class="detail-value"><?= $data['status']; ?></span></p>
        </div>
    </div>
</body>
</html>
<?php 
    session_start();
    // pengecekan role, kalau benar dia bukan role admin, maka akan diarahkan ke halaman login
    if(!isset($_SESSION["role"]) || $_SESSION["role"] != "admin"){
        header("Location: ../login/login_admin.html");
        exit();
    }
include "../backend/connect.php";

if(!isset($_GET['id'])){
    die("ID tidak ditemukan");
}

$id = $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM buku WHERE id_buku='$id'");
$book = mysqli_fetch_assoc($query);

if(!$book){
    die("Buku tidak ditemukan");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $book['nama_buku']; ?></title>
</head>
<body>
    <a href="admin_dashboard.php">Kembali</a>
    <h1><?= $book['nama_buku']; ?></h1>
    <p><?= $book['description']; ?></p>
    <a href="edit_buku.php?id=<?= $book['id_buku'] ?>">Edit</a>
    <a href="hapus_buku.php?id=<?= $book['id_buku'] ?>" onclick="return confirm('Yakin ingin menghapus buku?')">Delete</a>
</body>
</html>
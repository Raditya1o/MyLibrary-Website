<?php 
    session_start();
    include "../backend/connect.php";

    if(!isset($_SESSION["role"]) || $_SESSION["role"] != "admin"){
        header("Location: ../login/login_admin.html");
        exit();
    }

    if(isset($_POST["Add"])) {
    $nama = $_POST["nama_kategori"];

        $query = mysqli_prepare($conn, "INSERT INTO kategori_buku (nama_kategori)Values (?)");
        mysqli_stmt_bind_param($query, "s", $nama);
        
        if(mysqli_stmt_execute($query)) {
            header("Location: admin_dashboard.php?status=update");
            exit();
        }else {
            echo"<script>alert('Kategori Gagal Ditambahkan!');</script>";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Kategori</title>
    <link rel="stylesheet" href="../frontend/tambahkategoriStyle.css" />
</head>
<body>
    <main>
        <a class="back-btn" href="management.php">Kembali</a>
    <div class="tambah-container">
        <form method="post">
        <input type="text" name="nama_kategori" placeholder="Masukkan nama kategori" required>
        <button type="submit" name="Add">Tambah Kategori</button>
    </form>
</div>
</main>
</body>
</html>
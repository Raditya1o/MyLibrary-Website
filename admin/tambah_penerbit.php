<?php 
    session_start();
    include "../backend/connect.php";

    if(!isset($_SESSION["role"]) || $_SESSION["role"] != "admin"){
        header("Location: ../login/login_admin.html");
        exit();
    }

    if(isset($_POST["Add"])) {
    $nama = $_POST["nama_penerbit"];
    $email = $_POST["email_penerbit"];

        $query = mysqli_prepare($conn, "INSERT INTO penerbit_buku (nama_penerbit, email_penerbit) Values ( ?, ?)");
        mysqli_stmt_bind_param($query, "ss", $nama, $email);
        
        if(mysqli_stmt_execute($query)) {
            header("Location: admin_dashboard.php?status=update");
            exit();
        }else {
            echo"<script>alert('Penerbit Gagal Ditambahkan!');</script>";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Penerbit</title>
    <link rel="stylesheet" href="../frontend/tambahPenerbitStyle.css" />
</head>
<body>
    <main>
    <a class="back-btn" href="management.php">Kembali</a>
    <div class="tambah-container">
        <form method="post">
        <input type="text" name="nama_penerbit" placeholder="Masukkan nama penerbit" required>
        <input type="email" name="email_penerbit" placeholder="Masukkan email penerbit" required>
        <button type="submit" name="Add">Tambah Penerbit</button>
    </form>
</div>
</main>
</body>
</html>
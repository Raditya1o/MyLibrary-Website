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

        $query = "INSERT INTO penerbit_buku (nama_penerbit, email_penerbit) 
        Values ('$nama', '$email')";
        
        if(Mysqli_query($conn, $query)) {
            echo"Kategori Berhasil Ditambahkan";
            header("Location: admin_dashboard.php");
            exit();
        }else {
            echo"Kategori Gagal Ditambahkan!";
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
     <section class="search-container">
        <input class="search" type="search" placeholder="search" />
      </section>
       <a href="management.php">Kembali</a>
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
<?php 
    session_start();
    include "../backend/connect.php";

    if(!isset($_SESSION["role"]) || $_SESSION["role"] != "admin"){
        header("Location: ../login/login_admin.html");
        exit();
    }

    if(isset($_POST["Add"])) {
    $nama = $_POST["nama_kategori"];

        $query = "INSERT INTO kategori_buku (nama_kategori) 
        Values ('$nama')";
        
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
    <title>Add Kategori</title>
    <link rel="stylesheet" href="../frontend/tambahkategoriStyle.css" />
</head>
<body>
    <main>
     <section class="search-container">
        <input class="search" type="search" placeholder="search" />
      </section>
       <a href="management.php">Kembali</a>
    <div class="tambah-container">
        <form method="post">
        <input type="text" name="nama_kategori" placeholder="Masukkan nama kategori" required>
        <button type="submit" name="Add">Tambah Kategori</button>
    </form>
</div>
</main>
</body>
</html>
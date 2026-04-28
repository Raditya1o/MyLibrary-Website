<?php 
    session_start();
    include "../backend/connect.php";

    if(!isset($_SESSION["role"]) || $_SESSION["role"] != "admin"){
        header("Location: ../login/login_admin.html");
        exit();
    }

    if(isset($_POST["Add"])) {
    $nama = $_POST["nama_penulis"];
    $description = $_POST ["description"];

    $foto_penulis = $_FILES["foto_penulis"]["name"];
    $tmp = $_FILES["foto_penulis"]["tmp_name"];

    $upload = "../upload/image_penulis/" . basename($foto_penulis);

        if(move_uploaded_file($tmp, $upload)){

            $check = mysqli_query($conn, "SELECT id_penulis FROM penulis_buku WHERE nama_penulis='$nama'");

            if(!mysqli_num_rows($check) > 0) {

            $query = mysqli_prepare($conn, "INSERT INTO penulis_buku(foto_penulis, nama_penulis, description) Values (  ?, ?, ?)");

            mysqli_stmt_bind_param($query, "sss", $foto_penulis, $nama, $description);
            
            if(mysqli_stmt_execute($query)) {
                echo"Penulis Berhasil Ditambahkan";
                header("Location: admin_dashboard.php");
                exit();
            }else {
                echo"Penulis Gagal Ditambahkan!";
            }

            } else {
                echo "<script>alert('Penulis sudah ada!');</script>";
                exit();
            }
        }


    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Penulis</title>
    <link rel="stylesheet" href="../frontend/tambahbukuStyle.css" />
</head>
<body>
    <main>
     <section class="search-container">
        <input class="search" type="search" placeholder="search" />
      </section>
       <a href="management.php">Kembali</a>
     <div class="tambah-container">
        <form method="post" enctype="multipart/form-data">
        <input type="file" name="foto_penulis" accept="image/*" required>
        <input type="text" name="nama_penulis" placeholder="Masukkan nama penulis" required>
        <textarea name="description" placeholder="Masukkan deskripsi penulis" required></textarea>
        <button type="submit" name="Add">Tambah Penulis</button>
    </form>
</div>
</main>
</body>
</html>
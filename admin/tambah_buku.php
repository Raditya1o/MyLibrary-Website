<?php

    session_start();
if(!isset($_SESSION["role"]) || $_SESSION["role"] != "admin"){
        header("Location: ../login/login_admin.html");
        exit();
    }
include "../backend/connect.php";

if(isset($_POST["Add"])) {
    $title = $_POST["title-book"];
    $description = $_POST['description'];
    $stok = $_POST["stok"];
    $tahun = $_POST["tahun"];
    $ISBN = $_POST["ISBN"];
    $cover = $_FILES["cover"]["name"];
    $tmp = $_FILES["cover"]["tmp_name"];

    $penerbit = $_POST["penerbit"];
    $kategori = $_POST["kategori"];
    $penulis = $_POST["penulis"];

    $upload = "../upload/" . basename($cover);

    if(move_uploaded_file($tmp, $upload)){

        $query = mysqli_prepare($conn, "INSERT INTO buku (nama_buku, cover, id_penerbit, id_kategori, description, stok, tahun, ISBN, id_penulis)
        Values (?, ?, ?, ?, ?, ?, ?, ?, ?)");

        mysqli_stmt_bind_param($query, "ssiisiisi", $title, $cover, $penerbit, $kategori, $description, $stok, $tahun, $ISBN, $penulis);

        if(mysqli_stmt_execute($query)) {
            echo"<script>alert('Buku Berhasil Ditambahkan');</script>";
            header("Location: admin_dashboard.php");
            exit();
        }else {
            echo"<script>alert('Buku Gagal Ditambahkan!');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
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
        <input type="file" name="cover" required>
        <input type="text" name="title-book" placeholder="Masukkan Nama Buku" required>
        <input type="text" name="ISBN" placeholder="Masukkan IBSN buku" required>
        <textarea name="description" placeholder="Masukkan Deskripsi Buku"></textarea>
        <select name="penerbit" id="penerbit" >
            <?php
            $penerbit = mysqli_query($conn, "SELECT * FROM penerbit_buku");
            while($list_penerbit = mysqli_fetch_assoc($penerbit)){
                echo "<option value='{$list_penerbit['id_penerbit']}'>{$list_penerbit['nama_penerbit']}</option>";
            }

            ?>
        </select>
        <select name="kategori" id="kategori">
            <?php 
                $kategori = mysqli_query($conn, "SELECT * from kategori_buku");
                while($list_kategori = mysqli_fetch_assoc($kategori)){
                    echo "<option value='{$list_kategori['id_kategori']}'>{$list_kategori['nama_kategori']}</option>";
                }
            ?>
        </select>
            <select name="penulis" id="penulis" placeholder="Masukkan Penulis Buku">
                <?php 
                    $penulis = mysqli_query($conn, "SELECT * from penulis_buku");
                    while($list_penulis = mysqli_fetch_assoc($penulis)){
                        echo "<option value='{$list_penulis['id_penulis']}'>{$list_penulis['nama_penulis']}</option>";
                    }
                ?>
        <input type="number" name="stok" placeholder="Masukkan Stok Buku" required>
        <input type="number" name="tahun" placeholder="Masukkan Tahun Terbit buku" required>
        <button type="submit" name="Add">Tambah buku</button>
    </form>
</div>
</main>
</body>
</html>
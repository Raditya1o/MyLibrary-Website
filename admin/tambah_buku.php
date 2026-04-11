<?php

include "../backend/connect.php";

if(isset($_POST["Add"])) {
    $title = $_POST["title-book"];
    $description = $_POST['description'];

    $cover = $_FILES["cover"]["name"];
    $tmp = $_FILES["cover"]["tmp_name"];

    $penerbit = $_POST["penerbit"];
    $kategori = $_POST["kategori"];

    $upload = "../upload/" . basename($cover);

    if(move_uploaded_file($tmp, $upload)){

        $query = "INSERT INTO buku (nama_buku, cover, id_penerbit, id_kategori, description)
        Values ('$title', '$cover', '$penerbit', '$kategori', '$description')";
        
        if(Mysqli_query($conn, $query)) {
            echo"Buku Berhasil Ditambahkan";
            header("Location: admin_dashboard.php");
            exit();
        }else {
            echo"Buku Gagal Ditambahkan!";
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
</head>
<body>
    <form method="post" enctype="multipart/form-data">
    <input type="file" name="cover" required>
    <input type="text" name="title-book" placeholder="Masukkan Nama Buku" required>
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
    <button type="submit" name="Add">Tambah buku</button>
    </form>
</body>
</html>
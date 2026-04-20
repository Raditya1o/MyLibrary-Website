<?php 
    session_start();
    // pengecekan role, kalau benar dia bukan role admin, maka akan diarahkan ke halaman login
    if(!isset($_SESSION["role"]) || $_SESSION["role"] != "admin"){
        header("Location: ../login/login_admin.html");
        exit();
    }
    include "../backend/connect.php";

    $id = $_GET['id'];

    $data = mysqli_query($conn, "SELECT * from buku where id_buku = '$id'");
    $row = mysqli_fetch_assoc($data);

    if(isset($_POST['update'])) {
        $title = $_POST['title_buku'];
        $description = $_POST['description'];

        $update = "UPDATE buku Set nama_buku='$title', description='$description' where id_buku='$id'";

        $query = mysqli_query($conn, $update);

        if($query){
            echo"Buku Berhasil di Update!";
        }else {
            echo"Buku Tidak Berhasil di Update";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
</head>
<body>
    <form method=post>
        <h1>Edit Buku</h1>
        <input type="text" name="title_buku" placeholder="Masukkan judul buku baru">
        <textarea name="description" id="description_buku" placeholder="Masukkan deskripsi buku"></textarea>
        <button type="submit" name="update">Update buku</button>
    </form>
</body>
</html>
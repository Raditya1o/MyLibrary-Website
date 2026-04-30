<?php
    session_start();
    // pengecekan role, kalau benar dia bukan role user, maka akan diarahkan ke halaman login
    if(!isset($_SESSION["role"]) || $_SESSION["role"] != "user"){
        header("Location: ../login/login_user.html");
        exit();
    }
    include "../backend/connect.php";

    if(!isset($_GET['id'])){
        die("Id Tidak ditemukan");
    }
    $id = $_GET['id'];

    if(!is_numeric($id)){
        die("id peminjaman tidak valid!");
    }

    $delete = "DELETE From peminjaman where id_peminjaman='$id'";
    $query = mysqli_query($conn, $delete);

    if($query){
       header("Location: mybook.php?status=hapus");
        exit;
    }else{
        echo"Gagal membatalkan peminjaman";
    }

?>
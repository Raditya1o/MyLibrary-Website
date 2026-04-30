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
    $id_user = $_SESSION['id_account'];

    if(!is_numeric($id)){
        die("id peminjaman tidak valid!");
    }

    $check = mysqli_query($conn, "SELECT * FROM peminjaman WHERE id_peminjaman='$id' AND id_user='$id_user'");
    if(mysqli_num_rows($check) > 0){

        $detail_peminjaman = mysqli_query($conn, "DELETE FROM detail_peminjaman WHERE id_peminjaman='$id'");

        $peminjaman = mysqli_query($conn, "DELETE FROM peminjaman WHERE id_peminjaman='$id' AND id_user='$id_user'");

         if($peminjaman){
       header("Location: ../users/mybook.php?status=hapus");
        exit;
        }else{
        echo"Gagal membatalkan peminjaman";
        }
    } else{
        die("Peminjaman tidak ditemukan atau Anda tidak memiliki izin untuk menghapus peminjaman ini!");
    }

?>
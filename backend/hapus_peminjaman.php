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

    $check_prepared = mysqli_prepare($conn, "SELECT * FROM peminjaman WHERE id_peminjaman=? AND id_user=?");
    mysqli_stmt_bind_param($check_prepared, "ii", $id, $id_user);
    mysqli_stmt_execute($check_prepared);
    $result = mysqli_stmt_get_result($check_prepared);
    
    if(mysqli_num_rows($result) > 0){

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
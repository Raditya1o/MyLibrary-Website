<?php
    session_start();
    // pengecekan role, kalau benar dia bukan role user, maka akan diarahkan ke halaman login
    if(!isset($_SESSION["role"]) || $_SESSION["role"] != "admin"){
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

    $check_prepared = mysqli_prepare($conn, "SELECT * FROM saran WHERE id_saran=?");
    mysqli_stmt_bind_param($check_prepared, "i", $id);
    mysqli_stmt_execute($check_prepared);
    $result = mysqli_stmt_get_result($check_prepared);
    
    if(mysqli_num_rows($result) > 0){

        $feedback = mysqli_query($conn, "DELETE FROM saran WHERE id_saran='$id'");

         if($feedback){
       header("Location: ../admin/list_feedback.php");
        exit;
        }else{
        echo"Gagal menghapus feedback";
        }
    } else{
        die("feedback tidak ditemukan!");
    }

?>
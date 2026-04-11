<?php 

    // pengecekan role, kalau benar dia bukan role admin, maka akan diarahkan ke halaman login
    if(!isset($_SESSION["role"]) || $_SESSION["role"] != "admin"){
        header("Location: ../login.html");
        exit();
    }
    include "../backend/connect.php";

    if(!isset($_GET['id'])){
        die("Id Tidak ditemukan");
    }
    $id = $_GET['id'];

    if(!is_numeric($id)){
        die("id buku tidak valid!");
    }

    $cover_data = mysqli_query($conn, "SELECT cover FROM buku where id_buku ='$id'");
    $row = mysqli_fetch_assoc($cover_data);

    if(!$row){
        die("Buku Tidak Ditemukan");
    }
    $cover = $row['cover'];
    if(!empty($cover) && file_exists("../upload/" . $cover)){
        unlink("../upload/" . $cover);
    }

    $delete = "DELETE From buku where id_buku='$id'";
    $query = mysqli_query($conn, $delete);

    if($query){
       header("Location: ../admin/admin_dashboard.php?status=hapus");
        exit;
    }else{
        echo"Gagal menghapus buku";
    }
?>  
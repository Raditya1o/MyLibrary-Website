<?php
    session_start();
    // pengecekan role, kalau benar dia bukan role user, maka akan diarahkan ke halaman login
    if(!isset($_SESSION["role"]) || $_SESSION["role"] != "admin"){
        header("Location: ../login/login_admin.html");
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

    $check = mysqli_query($conn, "SELECT status FROM peminjaman WHERE id_peminjaman='$id'");
    $data = mysqli_fetch_assoc($check);

    if($data['status'] == 'ditolak' || $data['status'] == 'dikembalikan') {

        $detail_peminjaman = mysqli_query($conn, "DELETE FROM detail_peminjaman WHERE id_peminjaman='$id'");

        $peminjaman = mysqli_query($conn, "DELETE FROM peminjaman WHERE id_peminjaman='$id'");

        if($peminjaman){
        header("Location: ../admin/list_peminjaman.php?status=hapus");
        exit;
        }else{
            echo"Gagal membatalkan peminjaman";
        }

    } else {
        die("Peminjaman tidak dapat dihapus karena statusnya masih aktif atau sedang dipinjam!");
    }

?>
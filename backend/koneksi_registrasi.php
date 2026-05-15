<?php 
include "connect.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $kelas = $_POST["kelas"];
    $nis = $_POST["nis"];
    $password = $_POST["password"];

    if(!preg_match('/^[a-z A-Z]+$/', $name)) {
         echo "<script>alert('Nama tidak boleh unik!'); 
            window.location.href = '../login/registrasi.html';</script>";
        exit();
    }

    if(strlen($name) <= 3){
         echo "<script>alert('Nama tidak boleh kurang dari 4!'); 
            window.location.href = '../login/registrasi.html';</script>";
        exit();
    }

    if(!is_numeric($nis) || strlen($nis) != 9){
          echo "<script>alert('Nis Harus berupa angka dan harus 9 angka!'); 
            window.location.href = '../login/registrasi.html';</script>";
        exit();
    }

    // hash password sebelum disimpan ke database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $check = mysqli_prepare($conn, "SELECT * from account where name = ? OR nis = ? ");
    mysqli_stmt_bind_param($check, "ss", $name, $nis);
    mysqli_stmt_execute($check);

    $result_check = mysqli_stmt_get_result($check);

    if(mysqli_num_rows($result_check) > 0) {
        echo "<script>alert('Nama atau NIS telah digunakan!'); 
            window.location.href = '../login/registrasi.html';</script>";
        exit();
    }
    $add = mysqli_prepare($conn, "INSERT INTO account (name, kelas, nis, password_user) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($add, "ssss", $name, $kelas, $nis, $hashed_password);
    
    if (mysqli_stmt_execute($add)) {
        echo "<script>alert('Registrasi Berhasil!'); 
            window.location.href = '../login/login.html';</script>";
        exit();
    } else {
        echo "<script>alert('Registrasi Gagal!'); window.location.href = '../login/registrasi.html';</script>";
    }
    mysqli_stmt_close($add);
}

?>
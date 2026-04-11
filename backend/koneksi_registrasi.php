<?php 
include "connect.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $kelas = $_POST["kelas"];
    $nis = $_POST["nis"];
    $password = $_POST["password"];

    // hash password sebelum disimpan ke database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $add = mysqli_prepare($conn, "INSERT INTO account (name, kelas, nis, password_user) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($add, "ssss", $name, $kelas, $nis, $hashed_password);
    
    if (mysqli_stmt_execute($add)) {
        echo "<script>alert('Registrasi Berhasil!'); 
            window.location.href = '../login.html';</script>";
        exit();
    } else {
        echo "<script>alert('Registrasi Gagal!'); window.location.href = '../register.html';</script>";
    }
    mysqli_stmt_close($add);
}

?>
<?php 
    include "connect.php";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $NIP = $_POST["NIP"];
        $password = $_POST["password"];

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $query = mysqli_prepare($conn, "SELECT * FROM account_admin WHERE name = ? AND NIP = ?");
        mysqli_stmt_bind_param($query, "ss", $name, $NIP);
        mysqli_stmt_execute($query);
        $result = mysqli_stmt_get_result($query);
        if($row = mysqli_fetch_assoc($result)){
            $update = mysqli_prepare($conn, "UPDATE account_admin SET password_admin = ? WHERE name = ? AND NIP = ?");
            mysqli_stmt_bind_param($update, "sss", $hashed_password, $name, $NIP);
            if (mysqli_stmt_execute($update)) {
                echo "<script>alert('Password Berhasil Diubah!'); 
                    window.location.href = '../login_admin.html';</script>";
                exit();
            } else {
                echo "<script>alert('Gagal Mengubah Password!'); window.location.href = '../reset_password_admin.html';</script>";
            }
            mysqli_stmt_close($update);
        } else {
            echo "<script>alert('Admin Tidak Ditemukan!'); window.location.href = '../reset_password_admin.html';</script>";
        }
    }
?>
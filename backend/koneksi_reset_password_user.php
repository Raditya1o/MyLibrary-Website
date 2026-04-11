<?php 
    include "connect.php";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $kelas = $_POST["kelas"];
        $nis = $_POST["nis"];
        $password = $_POST["password"];

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $query = mysqli_prepare($conn, "SELECT * FROM account WHERE name = ? AND kelas = ? AND nis = ?");
        mysqli_stmt_bind_param($query, "sss", $name, $kelas, $nis);
        mysqli_stmt_execute($query);
        $result = mysqli_stmt_get_result($query);
        if($row = mysqli_fetch_assoc($result)){
            $update = mysqli_prepare($conn, "UPDATE account SET password_user = ? WHERE name = ? AND kelas = ? AND nis = ?");
            mysqli_stmt_bind_param($update, "ssss", $hashed_password, $name, $kelas, $nis);
            if (mysqli_stmt_execute($update)) {
                echo "<script>alert('Password Berhasil Diubah!'); 
                    window.location.href = '../login.html';</script>";
                exit();
            } else {
                echo "<script>alert('Gagal Mengubah Password!'); window.location.href = '../reset_password.html';</script>";
            }
            mysqli_stmt_close($update);
        } else {
            echo "<script>alert('User Tidak Ditemukan!'); window.location.href = '../reset_password.html';</script>";
        }
    }
?>
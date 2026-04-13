<?php 
session_start();

include_once("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $password = $_POST["password"];

    $query = mysqli_prepare($conn, "select * from account_admin where name = ? ");
    mysqli_stmt_bind_param($query, "s", $name);
    mysqli_stmt_execute($query);

    $numrow = mysqli_stmt_get_result($query);

    if($row = mysqli_fetch_assoc($numrow)){
        if(password_verify($password, $row["password_user"])){

            $_SESSION["id_admin"] = $row["id_admin"];
            $_SESSION["name"] = $row["name"];
            $_SESSION["NIP"] = $row["NIP"];
            $_SESSION["role"] = $row["role"];
            
            if($row["role"] == "admin"){
                header("Location: ../admin/admin_dashboard.php");
                exit();
            } else {
                echo "<script>alert('Anda bukan admin!'); window.location.href='../login_admin.html';</script>";
                exit();
            }
        } else {
            echo "<script>alert('Password Salah!'); window.location.href='../login_admin.html';</script>";
            exit();
        }
    } else {
        echo "<script>alert('Username Tidak Ditemukan!'); window.location.href='../login_admin.html';</script>";
        exit();
    }
}
?>
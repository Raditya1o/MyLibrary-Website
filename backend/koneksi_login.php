<?php 
session_start();
include_once("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $password = $_POST["password"];

    $query = mysqli_prepare($conn, "select * from account where name = ? ");
    mysqli_stmt_bind_param($query, "s", $name);
    mysqli_stmt_execute($query);

    $result = mysqli_stmt_get_result($query);

    if($row = mysqli_fetch_assoc($result)){

        if(password_verify($password, $row["password_user"])){
            $_SESSION["id_account"] = $row["id_account"];
            $_SESSION["name"] = $row["name"];
            $_SESSION["nis"] = $row["nis"];
            $_SESSION["kelas"] = $row["kelas"];
            $_SESSION["role"] = $row["role"];
            
            if($row["role"] == "user"){
            header("Location: ../users/dashboard.php");
            exit();
            }
            else{
            echo"<script>alert('Role belum ditentukan!'); window.location.href='../login/login.html';</script>";
            exit();
            }
        }
        else{
            echo "<script>alert('Password Salah!'); window.location.href='../login/login.html';</script>";
            exit();
        }
    }
    else{
        echo "<script>alert('Username Tidak Ditemukan!'); window.location.href='../login/login.html';</script>";
        exit();
    }
}
?>
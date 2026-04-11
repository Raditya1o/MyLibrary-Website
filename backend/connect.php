<?php
$host = 'localhost';
$users = 'root';
$password = '';
$database = 'mylibrary';

$conn = new mysqli($host, $users, $password, $database);

if ($conn->connect_error) {
    die(''. $conn->connect_error);
}

?>

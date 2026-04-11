<?php 
include "../backend/connect.php";

if(!isset($_GET['id'])){
    die("ID tidak ditemukan");
}

$id = $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM buku WHERE id_buku='$id'");
$book = mysqli_fetch_assoc($query);

if(!$book){
    die("Buku tidak ditemukan");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $book['nama_buku']; ?></title>
    <link rel="stylesheet" href="../frontend/bukuStyle.css">
</head>
<body>
    <main>
    <section class="search-container">
        <input class="search" type="search" placeholder="search" />
      </section>
       <a href="categories.php">Kembali</a>
      <div class="book-details">
        <div class="book-cover">
        <img class="book-img" src="../upload/<?= $book['cover']; ?>" alt="<?= $book['nama_buku']; ?>">
        </div>
        <div class="book-information">
        <h1><b>NAMA BUKU: </b> <br> <?= $book['nama_buku']; ?></h1>
        <p> <b>Description:</b> <br> <?= $book['description']; ?></p>
        <p> <b>Stock:</b> <<br> <?= $book['stok']; ?></p>
        </div>
      </div>
    </main>
</body>
</html>
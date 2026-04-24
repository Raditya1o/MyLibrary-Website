<?php 
include "../backend/connect.php";

if(!isset($_GET['id'])){
    die("ID tidak ditemukan");
}

$id = $_GET['id'];

$query = mysqli_query($conn, "SELECT buku.*, kategori_buku.nama_kategori, penerbit_buku.nama_penerbit 
                    FROM buku 
                    left join kategori_buku on buku.id_kategori = kategori_buku.id_kategori
                    left join penerbit_buku on buku.id_penerbit = penerbit_buku.id_penerbit
                    WHERE buku.id_buku='$id'");
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
        <form action="search_and_sort.php" method="GET">
          <input class="search-input" type="search" name="search" placeholder="search" />
          <button class="btn-search" type="submit">Search</button>
        </form>
      </section>
       <a href="categories.php">Kembali</a>
      <div class="book-details">
        <div class="book-cover">
        <img class="book-img" src="../upload/<?= $book['cover']; ?>" alt="<?= $book['nama_buku']; ?>">
        </div>
        <div class="book-information">
        <h1> <u>Nama Buku:</u> <br> <?= $book['nama_buku']; ?></h1>
        <p> <u>Description:</u> <br> <?= $book['description']; ?></p>
        <p> <u>Genre Buku: </u> <?= $book['nama_kategori']; ?></p>
        <p> <u>Penerbit:</u> <?= $book['nama_penerbit']; ?></p>
        <p> <u>Stock:</u> <?= $book['stok']; ?></p>
        <form action="../backend/peminjaman.php" method="POST">
            <input type="hidden" name="id_buku" value="<?= $book['id_buku']; ?>">
            <button class="pinjam-btn" type="submit" name="pinjam">Pinjam Buku</button>
        </form>
        </div>
    </main>
</body>
</html>
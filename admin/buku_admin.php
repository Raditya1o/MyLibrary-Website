<?php 
    session_start();
    // pengecekan role, kalau benar dia bukan role admin, maka akan diarahkan ke halaman login
    if(!isset($_SESSION["role"]) || $_SESSION["role"] != "admin"){
        header("Location: ../login/login_admin.html");
        exit();
    }
include "../backend/connect.php";

if(!isset($_GET['id'])){
    die("ID tidak ditemukan");
}

$id = $_GET['id'];

$query = mysqli_query($conn, "SELECT buku.*, kategori_buku.nama_kategori, penerbit_buku.nama_penerbit, penulis_buku.nama_penulis, penulis_buku.foto_penulis 
                    FROM buku 
                    left join kategori_buku on buku.id_kategori = kategori_buku.id_kategori
                    left join penerbit_buku on buku.id_penerbit = penerbit_buku.id_penerbit
                    left join penulis_buku on buku.id_penulis = penulis_buku.id_penulis
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
      <div class="book">
       <a class="back-btn" href="admin_dashboard.php">Kembali</a>
      <div class="book-details">
        <div class="book-cover">
        <img class="book-img" src="../upload/<?= $book['cover']; ?>" alt="<?= $book['nama_buku']; ?>">
        </div>
        <div class="book-information">
            <h1> <?= $book['nama_buku']; ?></h1>
            <div class="class-category">
                <p> <?= $book['nama_kategori']; ?></p>
            </div>
            <div class="information-section">
                <div class="penerbit-info"> 
                    <p> <span class="label">Penerbit:</span> <br> <?= $book['nama_penerbit']; ?></p>
                </div>
                <div class="tahun-info">
                    <p> <span class="label">Tahun Terbit:</span> <br> <?= $book['tahun_terbit'] ?? 'none'; ?></p>
                </div>
                <div class="ISBN-info">
                    <p> <span class="label">ISBN:</span> <br> <?= $book['ISBN'] ?? 'none'; ?></p>
                </div>
            </div>
            <div class="penulis-info">
                    <p> <span class="label">Penulis:</span> <br> <?= $book['nama_penulis'] ?? 'none'; ?></p>
                </div>
            <hr>
            <div class="description-info">
                <p> <span class="label">Description:</span> <br> <?= $book['description']; ?></p>
            </div>
            <div class="stock-info">
                <p> <span class="label">Stock:</span> <?= $book['stok']; ?></p>
            </div>
        <div class="button-style">
            <a class="edit-btn" href="edit_buku.php?id=<?= $book['id_buku'] ?>">Edit</a>
            <a class="delete-btn" href="hapus_buku.php?id=<?= $book['id_buku'] ?>" onclick="return confirm('Yakin ingin menghapus buku?')">Delete</a>
        </div>
        </div>
    </main>
</body>
</html>
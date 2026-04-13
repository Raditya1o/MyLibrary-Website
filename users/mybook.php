<?php
session_start();
include "../backend/connect.php";

$id_user = $_SESSION['id'];

$query = mysqli_query($conn, "
    SELECT p.*, dp.id_detail, dp.tanggal_kembali,
           b.nama_buku, b.cover
    FROM peminjaman p
    JOIN detail_peminjaman dp ON p.id_peminjaman = dp.id_peminjaman
    JOIN buku b ON dp.id_buku = b.id_buku
    WHERE p.id_user = '$id_user'
    ORDER BY p.tanggal_peminjaman DESC
");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mylibrary - MyBook 📕</title>
    <link rel="stylesheet" href="../frontend/mybookStyle.css">
</head>
<body>
    <header>
      <h1>MyLibrary</h1>
      <nav>
        <ul>
          <li class="Recomendation🔥"><a href="dashboard.php">Recomendation🔥</a></li>
          <li class="Categories📕"><a href="categories.php">Categories📕</a></li>
          <li class="MyBook📋"><a href="mybook.php">MyBook📋</a></li>
          <li class="Feedback💬"><a href="feedback.php">Feedback💬</a></li>
        </ul>
        <hr />
        <section class="account-info">
          <p>Name : <?php echo $_SESSION["name"]; ?></p>
          <p>NIS : <?php echo $_SESSION["nis"]; ?></p>
          <p>Kelas : <?php echo $_SESSION["kelas"]; ?></p>
        </section>
        <p><a href="../backend/logout.php">logout</a></p>
      </nav>
    </header>
    <main>
      <section class="search-container">
        <input class="search" type="search" placeholder="search" />
      </section>
      <section class="mybook-container">
        <h1 class="title"><u>Mybook 📕</u></h1>
          <?php while($data = mysqli_fetch_assoc($query)): ?>
            <div class="mybook-list">
                <img src="../upload/<?= $data['cover']; ?>" alt="cover">
                <div>
                  <h3><?= $data['nama_buku']; ?></h3>
                  <p>Tanggal Pinjam: <?= $data['tanggal_peminjaman']; ?></p>
                  <p>Status: <?= $data['status']; ?></p>
                  <a href="detail_peminjaman.php?id=<?= $data['id_detail']; ?>">Lihat Detail</a>
              </div>
            </div>
          <?php endwhile; ?>
      </section>
    </main>
  </body>
</html>
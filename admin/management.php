  <?php
  session_start();
  if(!isset($_SESSION["role"]) || $_SESSION["role"] != "admin"){
        header("Location: ../login/login_admin.html");
        exit();
    }
  include_once("../backend/koneksi_recomendation.php");

    // pengecekan role, kalau benar dia bukan role admin, maka akan diarahkan ke halaman login
    if(!isset($_SESSION["role"]) || $_SESSION["role"] != "admin"){
        header("Location: ../login.html");
        exit();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyLibrary - Management🔧</title>
    <link rel="stylesheet" href="../frontend/managementStyle.css">
</head>
<body>
       <header>
      <h1>MyLibrary</h1>
      <nav>
        <ul>
          <li class="Recomendation🔥"><a href="admin_dashboard.php"><span class="icon">🔥</span>Recomendation</a></li>
          <li class="Management🔧"><a href="management.php"><span class="icon">🔧</span>Management</a></li>
          <li class="Peminjaman⏱️"><a href="list_peminjaman.php"><span class="icon">⏱️</span>Peminjaman</a></li>
          <li class="Feedback💬"><a href="list_feedback.php"><span class="icon">💬</span>Feedback</a></li>
        </ul>
        <hr />
        <section class="account-info">
          <p>Name : <?php echo $_SESSION['name']; ?></p>
          <p>NIP : <?php echo $_SESSION['NIP']; ?></p>
        </section>
         <a class="logout-btn" href="../backend/logout.php">logout</a>
      </nav>
    </header>
    <main>
       <section class="search-container">
        <input class="search" type="search" placeholder="search" />
      </section>
    <section class="management-container">
      <h1><u>Management 🔧</u></h1>
        <div class="management-list">
          <a class="tambah-btn" href="tambah_buku.php">Tambah buku</a>
          <a class="penerbit-btn" href="tambah_penerbit.php">Tambah Penerbit</a>
          <a class="tambahKategori-btn" href="tambah_kategori.php">Tambah_kategori</a>
          <a class="tambahPenulis-btn" href="tambah_penulis.php">Tambah Penulis</a>
        </div>
      </section>
    </main>
</body>
</html>
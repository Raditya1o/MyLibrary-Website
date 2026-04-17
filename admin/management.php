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
          <li class="List Book📚"><a href="admin_dashboard.php">Recomendation🔥</a></li>
          <li class="Management🔧"><a href="management.php">Management🔧</a></li>
          <li class="Peminjaman⏱️"><a href="list_peminjaman.php">Peminjaman⏱️</a></li>
          <li class="Feedback💬"><a href="feedback.php">Feedback💬</a></li>
        </ul>
        <hr />
        <section class="account-info">
          <p>Name : <?php echo $_SESSION['name']; ?></p>
          <p>NIP : <?php echo $_SESSION['NIP']; ?></p>
        </section>
         <p><a href="../backend/logout.php">logout</a></p>
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
        </div>
      </section>
    </main>
</body>
</html>
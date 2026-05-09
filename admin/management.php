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

    $query = mysqli_query($conn, "SELECT * from buku");
    $query_penerbit = mysqli_query($conn, "SELECT * from penerbit_buku");
    $query_kategori = mysqli_query($conn, "SELECT * from kategori_buku");
    $query_penulis = mysqli_query($conn, "SELECT * from penulis_buku");


    $total = mysqli_num_rows($query);
    $total_penerbit = mysqli_num_rows($query_penerbit);
    $total_kategori = mysqli_num_rows($query_kategori);
    $total_penulis = mysqli_num_rows($query_penulis);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyLibrary - Management🔧</title>
    <link rel="stylesheet" href="../frontend/managementStyle.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />
</head>
<body>
       <header>
      <h1>MyLibrary</h1>
      <nav>
         <ul>
          <li class="book-list">
            <a href="admin_dashboard.php">
            <span class="icon"><i class="fa fa-book"></i></span>
            Dashboard</a>
          </li>
           <li class="management">
            <a href="management.php">
              <span class="icon"><i class="fa fa-wrench"></i></span>
              Management</a>
            </li>
          <li class="peminjaman">
            <a href="list_peminjaman.php">
              <span class="icon"><i class="fa fa-clipboard"></i></span>
              List Peminjaman</a>
            </li>
          <li class="feedback_list">
            <a href="list_feedback.php">
              <span class="icon"><i class="fa fa-comments"></i></span>
              List Feedback</a>
            </li>
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
        <form action="search_and_sort_admin.php" method="GET">
          <input class="search-input" type="search" name="search" placeholder="search" />
          <button class="btn-search" type="submit"><i class="fa fa-search"></i>Search</button>
        </form>
  </section>
    <section class="management-container">
      <h1 class="title-management"><u>Management 🔧</u></h1>
        <div class="management-list">
          <div class="tambah-buku-container">
            <span class="icon"><i class="fa fa-book"></i></span>
            <h3>Tambah buku</h3>
            <p><?php echo $total;?> buku<p>
            <a class="tambah-btn" href="tambah_buku.php">Tambah buku</a>
          </div>
          <div class="tambah-penerbit-container">
              <span class="icon"><i class="fa fa-newspaper"></i></span>
              <h3>Tambah Penerbit</h3>
              <p><?php echo $total_penerbit;?> penerbit<p>
            <a class="penerbit-btn" href="tambah_penerbit.php">Tambah Penerbit</a>
          </div>
          <div class="tambah-kategori-container">
            <span class="icon"><i class="fa fa-list"></i></span>
            <h3>Tambah Kategori</h3>
            <p><?php echo $total_kategori;?> Kategori<p>
            <a class="tambahKategori-btn" href="tambah_kategori.php">Tambah Kategori</a>
          </div>
          <div class="tambah-penulis-container">
            <span class="icon"><i class="fa fa-pen"></i></span>
            <h3>Tambah Penulis</h3>
            <p><?php echo $total_penulis;?> Penulis<p>
          <a class="tambahPenulis-btn" href="tambah_penulis.php">Tambah Penulis</a>
          </div>
        </div>
      </section>
    </main>
</body>
</html>
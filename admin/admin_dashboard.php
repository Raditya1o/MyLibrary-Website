<?php
    session_start();
    include "../backend/connect.php";
    
    if(!isset($_SESSION["role"]) || $_SESSION["role"] != "admin"){
        header("Location: ../login/login_admin.html");
        exit();
    }

    // query untuk mengambil semua buku dari database
    $sql = "SELECT * FROM buku";
    $result = mysqli_query($conn, $sql);

    $categories = mysqli_query($conn, "SELECT * FROM kategori_buku");

    if(isset($_GET['status']) && $_GET['status'] == 'hapus'){
    echo "<script>alert('Buku berhasil dihapus!');</script>";
    }

    if(isset($_GET['status']) && $_GET['status'] == 'update'){
    echo "<script>alert('Buku berhasil diupdate!');</script>";
    } 
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MyLibrary - Categories📕</title>
    <link rel="stylesheet" href="../frontend/adminDashboardStyle.css" />
  </head>
  <body>
    <header>
      <h1>MyLibrary</h1>
      <nav>
        <ul>
          <li class="List Book📚"><a href="admin_dashboard.php">Recomendation🔥</a></li>
          <li class="Management🔧"><a href="management.php">Management🔧</a></li>
          <li class="Peminjaman⏱️"><a href="list_peminjaman.php">Peminjaman⏱️</a></li>
          <li class="Feedback💬"><a href="list_feedback.php">Feedback💬</a></li>
        </ul>
        <hr />
        <section class="account-info">
          <p>Name : <?php echo $_SESSION['name']; ?>  </p>
          <p>NIP : <?php echo $_SESSION['NIP']; ?></p>
        </section>
         <p><a href="../backend/logout.php">logout</a></p>
      </nav>
    </header>
    <main>
      <section class="search-container">
        <form action="search_and_sort_admin.php" method="GET">
          <input class="search-input" type="search" name="search" placeholder="search" />
          <button class="btn-search" type="submit">Search</button>
        </form>
      </section>
      <section class="categories-container">
        <h1><u>Book List📕</u></h1>
        <section class="genre-filter">
          <?php
            while($category = mysqli_fetch_assoc($categories)){
          ?>
            <a href="search_and_sort_admin.php?id_category=<?php echo $category['id_kategori']; ?>&name_category=<?php echo $category['nama_kategori']; ?>">
              <button class="btn-filter"><?php echo $category['nama_kategori']; ?></button>
            </a>
          <?php
            }
          ?>
        </section>
        <div class="bookshelf">
          <?php 
          // menampilkan buku yang sudah diambil dari database pada bagian atas yang sudah dilakukan dan diassign ke variabel result
          // menghitung jumlah buku yang diambil dari database
            if(mysqli_num_rows($result) > 0){
              // selama masih ada data buku yang diambil dari database, maka akan dilakukan perulangan untuk menampilkan setiap buku
              while($data = mysqli_fetch_assoc($result)){
            ?>
            <a href="buku_admin.php?id=<?=$data['id_buku']?>" >
            <div class="book">
              <img src="../upload/<?php echo $data['cover']; ?>">
              <h3 class="book-title"><?php echo $data['nama_buku']; ?></h3>
              <a class="edit_link" href="edit_buku.php?id=<?= $data['id_buku'] ?>">Edit</a>
              <a class="edit_link" href="hapus_buku.php?id=<?= $data['id_buku'] ?>" onclick="return confirm('Yakin ingin menghapus buku?')">Delete</a>
            </div>
            </a>
            <?php
              }
            } else {
              echo "No books found.";
            }

          ?>
        </div>
      </section>
    </main>
  </body>
</html>

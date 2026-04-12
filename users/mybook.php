<?php 
    include "../backend/connect.php";

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
        <div class="mybook-list">
            <div class="image-cover">
                <img src="" alt="book-cover">
            </div>
            <div class="book-information">
                <div class="book-title">
                    <h1><b>NAMA BUKU:</b></h1>
                </div>  
                <div class="book-content">
                <p> <b>Genre:</b></p>
                <p> <b>Peminjam:</b></p>
                <p> <b>Tanggal Peminjaman:</b></p>
                <p> <b>Petugas:</b></p>
                </div>
            </div>
        </div>
      </section>
    </main>
  </body>
</html>
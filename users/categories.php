<?php
session_start();
if(!isset($_SESSION["role"]) || $_SESSION["role"] != "user"){
        header("Location: ../login/login.html");
        exit();
    }
    include_once("../backend/koneksi_recomendation.php");

    $sql = "SELECT * FROM buku";

    $result = mysqli_query($conn, $sql);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MyLibrary - Categories📕</title>
    <link rel="stylesheet" href="../frontend/categoriesStyle.css" />
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
      <section class="categories-container">
        <h1><u>Categories📕</u></h1>
        <section class="genre-filter">
          <button class="btn-filter">Komik</button>
          <button class="btn-filter">Cerita Anak</button>
          <button class="btn-filter">Nonfiksi</button>
          <button class="btn-filter">Bisnis</button>
          <button class="btn-filter">Sains</button>
          <button class="btn-filter">Fantasi</button>
          <button class="btn-filter">Jurnal</button>
          <button class="btn-filter">Biografi</button>
        </section>
        <div class="bookshelf">
          <?php 
            if(mysqli_num_rows($result) > 0){
              while($data = mysqli_fetch_assoc($result)){
            ?>
            <a href="buku.php?id=<?=$data['id_buku']?>" >
            <div class="book">
              <img src="../upload/<?php echo $data['cover']; ?>">
              <h3><?php echo $data['nama_buku']; ?></h3>
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

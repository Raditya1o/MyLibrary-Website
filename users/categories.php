<?php
session_start();
if(!isset($_SESSION["role"]) || $_SESSION["role"] != "user"){
        header("Location: ../login/login.html");
        exit();
    }
    include_once("../backend/koneksi_recomendation.php");

    $sql = "SELECT * FROM buku";

    $categories = mysqli_query($conn, "SELECT * FROM kategori_buku");
    
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
          <li class="Recomendation🔥">
            <a href="dashboard.php">
            <span class="icon">🔥</span>
            Recomendation</a>
          </li>
          <li class="Categories📕">
            <a href="categories.php">
              <span class="icon">📕</span>
              Categories</a>
            </li>
          <li class="MyBook📋">
            <a href="mybook.php">
              <span class="icon">📋</span>
              MyBook</a>
            </li>
          <li class="Feedback💬">
            <a href="feedback.php">
              <span class="icon">💬</span>
              Feedback</a>
            </li>
        </ul>
        <hr/>
        <section class="account-info">
          <p>Name : <?php echo $_SESSION["name"]; ?></p>
          <p>NIS : <?php echo $_SESSION["nis"]; ?></p>
          <p>Kelas : <?php echo $_SESSION["kelas"]; ?></p>
        </section>
         <a class="logout-btn" href="../backend/logout.php">logout</a>
      </nav>
    </header>
    <main>
      <section class="search-container">
        <form action="search_and_sort.php" method="GET">
          <input class="search-input" type="search" name="search" placeholder="search" />
          <button class="btn-search" type="submit">Search</button>
        </form>
      </section>
      <section class="categories-container">
        <h1><u>Categories📕</u></h1>
         <section class="genre-filter">
          <?php
            while($category = mysqli_fetch_assoc($categories)){
          ?>
            <a href="search_and_sort.php?id_category=<?php echo $category['id_kategori']; ?>&name_category=<?php echo $category['nama_kategori']; ?>">
              <button class="btn-filter"><?php echo $category['nama_kategori']; ?></button>
            </a>
          <?php
            }
          ?>
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

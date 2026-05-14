<?php
    session_start();
    include "../backend/koneksi_recomendation.php";

    if(!isset($_SESSION["role"]) || $_SESSION["role"] != "user"){
        header("Location: ../login/login.html");
        exit();
    }

    $sql_newest = "SELECT * from buku
                  order by id_buku desc
                  limit 6
    ";

    $sql_popular = "SELECT * from buku
            order by total_pinjam desc
            limit 12
    ";

    $popular = mysqli_query($conn, $sql_popular);
    $newest = mysqli_query($conn, $sql_newest)
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MyLibrary - Recomendation</title>
    <link rel="stylesheet" href="../frontend/recomendationStyle.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />
  </head>
  <body>
    <header>
      <h1>MyLibrary</h1>
      <nav>
        <ul>
          <li class="Recomendation🔥">
            <a href="dashboard.php">
            <span class="icon"><i class="fa fa-fire"></i></span>
            Recomendation</a>
          </li>
          <li class="Categories📕">
            <a href="categories.php">
              <span class="icon"><i class="fa fa-book"></i></span>
              Categories</a>
            </li>
          <li class="MyBook📋">
            <a href="mybook.php">
              <span class="icon"><i class="fa fa-clipboard"></i></span>
              MyBook</a>
            </li>
          <li class="Feedback💬">
            <a href="feedback.php">
              <span class="icon"><i class="fa fa-comment"></i></span>
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
          <button class="btn-search" type="submit"><i class="fa fa-search"></i>Search</button>
        </form>
      </section>

      <section class="recomended-containter">
        <h2 class="title">Recomendation<i class="fa fa-fire"></i></h2>
        <p class="text">buku-buku yang baru ditambahkan<p>
        <div class="bookshelf">
          <?php
            if(mysqli_num_rows($newest) > 0){
            while($data = mysqli_fetch_assoc($newest)){
          ?>

           <a href="buku.php?id=<?=$data['id_buku']?>" >
            <div class="book">
              <img src="../upload/<?php echo $data['cover']; ?>">
              <h3><?php echo $data['nama_buku']; ?></h3>
            </div>
            </a>

           <?php
          }
          }else{
            echo "No recomendation yet";
          } 
          ?>
        </div>
      </section>

      <section class="popular-containter">
        <h2 class="title">Popular<i class="fa fa-chart-line"></i></h2>
        <p class="text">buku-buku yang sering dipinjam<p>
        <div class="bookshelf">
             <?php
            if(mysqli_num_rows($popular) > 0){
            while($data = mysqli_fetch_assoc($popular)){
          ?>

           <a href="buku.php?id=<?=$data['id_buku']?>" >
            <div class="book">
              <img src="../upload/<?php echo $data['cover']; ?>">
              <h3><?php echo $data['nama_buku']; ?></h3>
            </div>
            </a>

           <?php
          }
          }else{
            echo "No recomendation yet";
          } 
          ?>
        </div>
      </section>

      <section class="categories-button">
        <a href="categories.php">
          <button class="btn" >Lihat Lainnya</button>
        </a>
      </section>
      
    </main>
  </body>
</html>

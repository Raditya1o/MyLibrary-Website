<?php
    session_start();
    include "../backend/koneksi_recomendation.php";

    if(!isset($_SESSION["role"]) || $_SESSION["role"] != "user"){
        header("Location: ../login.html");
        exit();
    }

    $sql = "SELECT * FROM buku WHERE recommendation = '1'";

    $result = mysqli_query($conn, $sql);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MyLibrary - Recomendation🔥</title>
    <link rel="stylesheet" href="../frontend/recomendationStyle.css" />
  </head>
  <body>
    <header>
      <h1>MyLibrary</h1>
      <nav>
        <ul>
          <li class="Recomendation🔥"><a href="">Recomendation🔥</a></li>
          <li class="Categories📕"><a href="categories.php">Categories📕</a></li>
          <li class="MyBook📋"><a href="mybook.php">MyBook📋</a></li>
          <li class="Feedback💬"><a href="feedback.php">Feedback💬</a></li>
        </ul>
        <hr/>
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
      <section class="recomended-containter">
        <h2 class="title"><u>Recomendation🔥</u></h2>
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
          }else{
            echo "No recomendation yet";
          } 
          ?>
        </div>
      </section>
      <section class="popular-containter">
        <h2 class="title"><u>Popular</u></h2>
        <div class="bookshelf">
   
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

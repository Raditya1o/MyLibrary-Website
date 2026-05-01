<?php 
    session_start();
    include "../backend/connect.php";


    if(!isset($_SESSION) || $_SESSION["role"] != "user") {
        header("../login/login.html");
        exit();
    }

    if(isset($_POST["submit"])) {
        $saran = $_POST["saran"];
        $id_user = $_SESSION["id_account"];

        $query = mysqli_prepare($conn, "INSERT INTO saran (id_account, isi_saran) VALUES (?, ?)");
        mysqli_stmt_bind_param($query, "is", $id_user, $saran);
        $add = mysqli_stmt_execute($query);

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" href="../frontend/recomendationStyle.css" />
    <title>Mylibrary - Feedback</title>
</head>
<body>
     <header>
      <h1>MyLibrary</h1>
      <nav>
        <ul>
          <li class="Recomendation🔥"><a href="dashboard.php"><span class="icon">🔥</span>Recomendation</a></li>
          <li class="Categories📕"><a href="categories.php"><span class="icon">📕</span>Categories</a></li>
          <li class="MyBook📋"><a href="mybook.php"><span class="icon">📋</span>MyBook</a></li>
          <li class="Feedback💬"><a href="feedback.php"><span class="icon">💬</span>Feedback</a></li>
        </ul>
        <hr />
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
        <section class="feedback-container">
            <h1><u>Feedback 💬<u></h1>
            <form method="post">
            <textarea name="saran" id="saran" placeholder="masukkan saran/feedback" required></textarea>    
            <button class="submit-btn" type="submit" name="submit">kirim</button>    
            </form>
        </section>
    </main>
</body>
</html>

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

        $query = "INSERT INTO saran (id_account, isi_saran) values ('$id_user', '$saran')";
        $add = mysqli_query($conn, $query);

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" href="../frontend/feedbackStyle.css" />
    <title>Mylibrary - Feedback</title>
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
        <section class="feedback-container">
            <h1><u>Feedback 💬<u></h1>
            <form method="post">
            <textarea name="saran" id="saran" placeholder="masukkan saran/feedback" required></textarea>    
            <button type="submit" name="submit">kirim</button>    
            </form>
        </section>
    </main>
</body>
</html>

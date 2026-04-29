<?php 
    session_start();
    include "../backend/connect.php";

    if(!isset($_SESSION["role"]) || $_SESSION["role"] != "admin") {
        header("Location: ../login/login_admin.html");
        exit();
    }
    
    $check = "SELECT saran.*, account.name from saran
              LEFT JOIN account on saran.id_account = account.id_account";

    $query = mysqli_query($conn, $check);
    $total = mysqli_num_rows($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../frontend/listFeedbackStyle.css" />
    <title>Mylibrary - list feedback</title>
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
      <section class="list_feedback-container">
        <h1><u>List Feedback</u></h1>
        <div class="all-feedback">
          <p>Total feedback: <br> <?php echo $total?> feedback <p>
        </div>
        <?php 
        if($total > 0){
            while($data = mysqli_fetch_assoc($query)){
            ?>
            <div class="feedback-list">
                <p class="feedback-name"><b>Nama:</b> <?php echo $data["name"]; ?></p>
                <p class="feedback-content"><?php echo $data["isi_saran"]; ?></p>
                <p class="feedback-date"><?php echo $data["tanggal_saran"]; ?></p>
            </div>
            <?php
            }   
        }else{
            echo"tidak ada data yang masuk";
        }
        ?>
      </section>
    </main>
</body>
</html>

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
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />
    <title>Mylibrary - list feedback</title>
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
                <a class="btn-hapus" href="../backend/hapus_feedback.php?id=<?= $data["id_saran"]?>" onclick="return confirm('hapus feedback ini?')">Hapus</a>
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

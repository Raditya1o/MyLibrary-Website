<?php 
    session_start();
    include "../backend/connect.php";

    if(!isset($_SESSION["role"]) || $_SESSION["role"] != "user"){
        header("Location: ../login/login.html");
        exit();
    }
    
    $input = $_GET['search'] ?? '';
    $category = $_GET['id_category'] ?? '';
    $category_name = $_GET['name_category'] ?? '';

    if(!$input && !$category){
        header("Location: dashboard.php");
        exit();
    }

    if($category) {
        $stmt = mysqli_prepare($conn, "SELECT * FROM buku WHERE id_kategori = ?");
        mysqli_stmt_bind_param($stmt, "s", $category);
    } else {
        $stmt = mysqli_prepare($conn, "SELECT * FROM buku WHERE nama_buku LIKE ?");
        $like = "%$input%";
        mysqli_stmt_bind_param($stmt, "s", $like);
    }

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $check = mysqli_num_rows($result);
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../frontend/searchAndSortStyle.css" />
    <title>Mylibrary - "<?php echo"$input"?>"</title>
</head>
<body>
    <main>
     <section class="search-container">
        <form action="search_and_sort.php" method="GET">
          <input class="search-input" type="search" name="search" placeholder="search" />
          <button class="btn-search" type="submit">Search</button>
        </form>
      </section>
      <div class="search-result">
        <h1><u><?php 
          if($category_name) {
            echo "Kategori: " . $category_name;
          } else {
            echo "Search Result for \"" . $input . "\"";
          }
        ?></u></h1>
        <a href="dashboard.php">Kembali</a>
        <p>Total: <?php echo $check?> result</p>
        <div class="container-search">
        <?php 
            if($check > 0){
                while($data = mysqli_fetch_assoc($result)){
                    ?>
                    <a href="buku.php?id=<?=$data['id_buku']?>" >
                 <div class="book">
              <img src="../upload/<?php echo $data['cover']; ?>">
              <h3 class="book-title"><?php echo $data['nama_buku']; ?></h3>
                </div>
                </a>

            </a>
                <?php
                }
            }else {
                echo "<p>Buku tidak ditemukan!</p>";
            }
        ?>
        </div>
    </main>
</body>
</html>
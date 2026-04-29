<?php 
    session_start();
    if(!isset($_SESSION["role"]) || $_SESSION["role"] != "admin"){
        header("Location: ../login/login_admin.html");
        exit();
    }
    include "../backend/connect.php";

    $id = $_GET['id'];

    $stmt = mysqli_prepare($conn, "SELECT * from buku where id_buku = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $data = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($data);

    if(isset($_POST['update'])) {

        $title = $_POST['title_book'];
        $description = $_POST['description'];
        $ISBN = $_POST['ISBN'];

        $update_cover = $row['cover'];
        if(!empty($_FILES['cover']['name'])) {
            $update_cover = time() . "_" . $_FILES['cover']['name'];
            $tmp = $_FILES['cover']['tmp_name'];
            $upload = "../upload/" . basename($update_cover);
            if(move_uploaded_file($tmp, $upload)){
                if(!empty($row['cover']) && file_exists("../upload/" . $row['cover'])){
                    unlink("../upload/" . $row['cover']);
                }
            } else {
                echo"<script>alert('Gagal mengupload file!')</script>";
            }
        }

        $stok = $_POST['stok'];

        $kategori = $_POST['kategori'];
        $penerbit = $_POST['penerbit'];
        $penulis = $_POST['penulis'];

        $tahun = $_POST['tahun_terbit'];
        
        $update = mysqli_prepare($conn, "UPDATE buku set 
                                nama_buku=?, 
                                description=?, 
                                ISBN=?, 
                                cover=?, 
                                stok=?, 
                                tahun_terbit=?, 
                                id_kategori=?, 
                                id_penerbit=?, 
                                id_penulis=? 
                                where id_buku=?");

        mysqli_stmt_bind_param($update, "ssssiiiiii", $title, $description, $ISBN, $update_cover, $stok, $tahun, $kategori, $penerbit, $penulis, $id);

        if(mysqli_stmt_execute($update)) {
            echo"<script>alert('Buku Berhasil di Update!')</script>";
        }else {
            echo"<script>alert('Buku Tidak Berhasil di Update!')</script>";
        }
        }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    <link rel="stylesheet" href="../frontend/tambahbukuStyle.css" />
</head>
<body>
    <main>
     <section class="search-container">
        <input class="search" type="search" placeholder="search" />
      </section>
       <a href="admin_dashboard.php">Kembali</a>
        <div class="tambah-container">
        <form method="POST" enctype="multipart/form-data">
        <input type="file" name="cover">
        <input type="text" name="title_book" placeholder="Masukkan Nama Buku" value="<?= $row['nama_buku']; ?>">
        <input type="text" name="ISBN" placeholder="Masukkan IBSN buku" value="<?= $row['ISBN']; ?>">
        <textarea name="description" placeholder="Masukkan Deskripsi Buku"><?= $row['description']; ?></textarea>
      <select name="penerbit" id="penerbit" >
            <?php   
            $penerbit = mysqli_query($conn, "SELECT * FROM penerbit_buku");
            while($list_penerbit = mysqli_fetch_assoc($penerbit)){
               $selected = ($list_penerbit['id_penerbit'] == $row['id_penerbit']) ? 'selected' : '';
                    echo "<option value='{$list_penerbit['id_penerbit']}' {$selected}>{$list_penerbit['nama_penerbit']}</option>";
            }

            ?>
        </select>
        <select name="kategori" id="kategori">
            <?php 
                $kategori = mysqli_query($conn, "SELECT * from kategori_buku");
                while($list_kategori = mysqli_fetch_assoc($kategori)){
                   $selected = ($list_kategori['id_kategori'] == $row['id_kategori']) ? 'selected' : '';
                        echo "<option value='{$list_kategori['id_kategori']}' {$selected}>{$list_kategori['nama_kategori']}</option>";
                }
            ?>
        </select>
            <select name="penulis" id="penulis" placeholder="Masukkan Penulis Buku">
                <?php 
                    $penulis = mysqli_query($conn, "SELECT * from penulis_buku");
                    while($list_penulis = mysqli_fetch_assoc($penulis)){
                        $selected = ($list_penulis['id_penulis'] == $row['id_penulis']) ? 'selected' : '';
                            echo "<option value='{$list_penulis['id_penulis']}' {$selected}>{$list_penulis['nama_penulis']}</option>";
                    }
                ?>
            </select>
        <input type="number" name="stok" placeholder="Masukkan Stok Buku" value="<?= $row['stok']; ?>">
        <input type="number" name="tahun_terbit" placeholder="Masukkan Tahun Terbit buku" value="<?= $row['tahun_terbit']; ?>">
        <button type="submit" name="update">Update buku</button>
    </form>
    <main>
</body>
</html>
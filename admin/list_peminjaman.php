<?php 
    session_start();
    include "../backend/connect.php";

    $id_petugas = $_SESSION['id_admin'];

    if(isset($_GET['setujui'])) {
        $id_peminjaman = $_GET['setujui'];

        $check = mysqli_query($conn, "SELECT id_buku from detail_peminjaman where id_peminjaman = '$id_peminjaman'");
        $detail = mysqli_fetch_assoc($check);

        mysqli_query($conn, "UPDATE peminjaman set status='dipinjam' where id_peminjaman = '$id_peminjaman'");

        mysqli_query($conn, "UPDATE detail_peminjaman set id_admin='$id_petugas' where id_peminjaman='$id_peminjaman'");

        mysqli_query($conn, "UPDATE buku set stok = stok - 1 where id_buku='{$detail['id_buku']}'");

        echo "<script>alert('Peminjaman disetujui!');</script>";
    }
    if(isset($_GET['tolak'])) {

        $id_peminjaman = $_GET['tolak'];
        mysqli_query($conn, "UPDATE peminjaman SET status='ditolak' WHERE id_peminjaman='$id_peminjaman'");

        mysqli_query($conn, "UPDATE detail_peminjaman set id_admin='$id_petugas' where id_peminjaman='$id_peminjaman'");

        mysqli_query($conn, "UPDATE detail_peminjaman SET tanggal_kembali=CURDATE() WHERE id_peminjaman='$id_peminjaman'");

        echo "<script>alert('Peminjaman ditolak!');</script>";
    }

    if(isset($_GET['kembali'])) {
        $id_peminjaman = $_GET['kembali'];
        
        $cek = mysqli_query($conn, "SELECT id_buku FROM detail_peminjaman 
            WHERE id_peminjaman='$id_peminjaman'");
        $detail = mysqli_fetch_assoc($cek);
        
        mysqli_query($conn, "UPDATE peminjaman SET status='dikembalikan' WHERE id_peminjaman='$id_peminjaman'");

        mysqli_query($conn, "UPDATE detail_peminjaman SET tanggal_kembali=CURDATE() WHERE id_peminjaman='$id_peminjaman'");

        mysqli_query($conn, "UPDATE buku SET stok = stok + 1 WHERE id_buku='{$detail['id_buku']}'");

        echo "<script>alert('Buku berhasil dikembalikan!');</script>";
    }
        $query = mysqli_query($conn, "
        SELECT p.*, dp.id_buku, dp.tanggal_kembali, dp.id_admin,
            b.nama_buku, 
            a.name as nama_user,
            pt.name as nama_petugas
        FROM peminjaman p
        JOIN detail_peminjaman dp ON p.id_peminjaman = dp.id_peminjaman
        JOIN buku b ON dp.id_buku = b.id_buku
        JOIN account a ON p.id_user = a.id_account
        LEFT JOIN account_admin pt ON dp.id_admin = pt.id_admin
        ORDER BY p.tanggal_peminjaman DESC
    ");
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../frontend/listPeminjamanStyle.css"/>
        <title>Myllibrary - list Peminjaman ⏱️</title>
    </head>
    <body>
        <header>
            <h1>MyLibrary</h1>
        <nav>
            <ul>
            <li class="List Book📚"><a href="admin_dashboard.php">Recomendation🔥</a></li>
            <li class="Management🔧"><a href="management.php">Management🔧</a></li>
            <li class="Peminjaman⏱️"><a href="list_peminjaman.php">Peminjaman⏱️</a></li>
            <li class="Feedback💬"><a href="list_feedback.php">Feedback💬</a></li>
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
        <div class="peminjaman-container">
            <h1><u> List Peminjaman ⏱️</u></h1>
            <table border="1" cellpadding="8">
            <tr>
                <th>Nama User</th>
                <th>Nama Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Petugas</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            <?php while($data = mysqli_fetch_assoc($query)): ?>
        <tr>
            <td><?= $data['nama_user']; ?></td>
            <td><?= $data['nama_buku']; ?></td>
            <td><?= $data['tanggal_peminjaman']; ?></td>
            <td><?= $data['tanggal_kembali'] ?? '-'; ?></td>
            <td><?= $data['nama_petugas'] ?? '-'; ?></td>
            <td><?= $data['status']; ?></td>
            <td>
                <?php if($data['status'] == 'menunggu'): ?>
                    <a href="?setujui=<?= $data['id_peminjaman']; ?>"
                       onclick="return confirm('Setujui peminjaman ini?')">Setujui</a> |
                    <a href="?tolak=<?= $data['id_peminjaman']; ?>"
                       onclick="return confirm('Tolak peminjaman ini?')">Tolak</a>
                <?php elseif($data['status'] == 'dipinjam'): ?>
                    <a href="?kembali=<?= $data['id_peminjaman']; ?>"
                       onclick="return confirm('Tandai buku sudah dikembalikan?')">Kembalikan</a>
                <?php else: ?>
                    -
                <?php endif; ?>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
      </div>
    </main>
</body>
</html>
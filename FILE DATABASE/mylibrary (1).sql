-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Apr 2026 pada 11.47
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mylibrary`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `account`
--

CREATE TABLE `account` (
  `id_account` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `password_user` varchar(200) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `account`
--

INSERT INTO `account` (`id_account`, `name`, `nis`, `password_user`, `kelas`, `role`) VALUES
(1, 'Raditya Alghifari', '501251212', '$2y$10$0klLIbSiRUWGEKsaGVkVqOQae5ACUxJz4wrFBP.iJHLnya3sXqD2u', 'X SIJA 2', 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `account_admin`
--

CREATE TABLE `account_admin` (
  `id_admin` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `NIP` varchar(225) NOT NULL,
  `password_admin` varchar(225) NOT NULL,
  `role` varchar(20) DEFAULT 'admin',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `account_admin`
--

INSERT INTO `account_admin` (`id_admin`, `name`, `NIP`, `password_admin`, `role`, `created_at`) VALUES
(1, 'Sri', '198503202010012005', '$2y$10$PGFqOkL4UX.yWfb25usYP.gy4AeObaQlX.fccaioDnGi0/H.JHCsq', 'admin', '2026-04-11 12:47:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `nama_buku` varchar(255) NOT NULL,
  `id_penerbit` int(11) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `recommendation` tinyint(1) DEFAULT NULL,
  `stok` int(11) NOT NULL,
  `popular` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `nama_buku`, `id_penerbit`, `id_kategori`, `cover`, `description`, `recommendation`, `stok`, `popular`) VALUES
(1, 'Laskar Pelangi', 1, 1, 'LaskarPelangi.jpeg', 'Karya Novel Andrea Hirata', 1, 1, NULL),
(2, 'Negeri 5 Menara', 2, 2, 'negeri5menara.jpg', 'Negeri 5 Menara mengisahkan perjalanan Alif, seorang anak desa yang harus merelakan mimpinya demi menempuh pendidikan di sebuah pesantren. Di tempat yang awalnya terasa asing, ia justru menemukan lima sahabat dari berbagai penjuru Indonesia yang kemudian dikenal sebagai Sahibul Menara.\r\n\r\nDi bawah menara masjid, mereka menatap langit sambil memupuk mimpi-mimpi besar—dari Indonesia hingga ke berbagai belahan dunia. Dengan semangat “man jadda wajada”, mereka belajar bahwa kerja keras, disiplin, dan keyakinan mampu membuka jalan menuju masa depan yang tak terbayangkan sebelumnya.\r\n\r\nNovel ini menyajikan kisah penuh inspirasi tentang persahabatan, perjuangan, dan kekuatan mimpi yang tumbuh dari tempat sederhana.', 1, 2, NULL),
(5, 'Dilan: Dia adalah Dianku tahun 1990', 3, 3, 'dilan1990.jpg', 'Milea jatuh hati pada Dilan, cowok motor yang terkenal nakal tapi punya cara romantis yang tidak biasa di Bandung tahun 1990. Gaya pendekatan Dilan yang unik dan penuh humor membuat novel ini sangat memorable di kalangan remaja. Kisah ini terasa nostalgik dan relatable bagi siapa saja yang pernah merasakan cinta pertama.', 1, 2, NULL),
(6, '5cm', 4, 4, '5cm.jpg', 'Lima sahabat yang sudah berteman lama memutuskan berpisah selama 3 bulan tanpa komunikasi. Setelah reuni, mereka berpetualang mendaki Gunung Semeru bersama dengan tekad membawa mimpi setinggi puncak. Novel ini penuh semangat, persahabatan, dan nasionalisme yang menggetarkan.', 1, 1, NULL),
(7, 'Sang Pemimpi', 1, 5, 'sangpemimpi.jpg', 'Ikal dan Arai, dua sepupu yang merantau ke Jawa dengan mimpi besar kuliah di Eropa. Perjalanan mereka penuh perjuangan, humor, dan pengorbanan yang menyentuh hati. Novel ini membuktikan bahwa mimpi sebesar apapun layak untuk diperjuangkan sampai titik darah penghabisan.', NULL, 1, NULL),
(8, 'Hujan', 2, 1, 'hujan.jpg', 'Berlatar tahun 2040-an, novel ini mengisahkan Lail dan Esok yang dipertemukan oleh bencana dahsyat yang menghancurkan kota mereka. Keduanya tumbuh bersama namun takdir memisahkan mereka berkali-kali. Novel ini memadukan kisah cinta yang menyentuh dengan latar futuristik yang membuat pembaca terus penasaran hingga halaman terakhir.', NULL, 2, NULL),
(9, 'Dear Nathan', 5, 3, 'dearnathan.jpg', 'Salma, siswi baru yang pendiam, dipertemukan dengan Nathan si bad boy yang terkenal di sekolah. Namun di balik sikapnya yang cuek, Nathan menyimpan sisi lembut yang perlahan membuat Salma jatuh hati. Novel ini sangat populer di kalangan remaja karena kisah cintanya yang manis dan relatable.', NULL, 1, NULL),
(10, 'Perahu kertas', 1, 3, 'perahukertas.jpg', 'Drama\r\nKugy si gadis eksentrik pencinta dongeng dan Keenan si pelukis berbakat yang dipertemukan di Bandung. Keduanya saling jatuh cinta tanpa berani mengungkapkan, sementara mimpi masing-masing terus menarik mereka ke arah berbeda. Novel ini sangat kaya emosi dan menggambarkan dilema antara cinta dan mengejar impian.', NULL, 1, NULL),
(11, 'Ayah', 1, 1, 'ayah.jpg', 'Sabari adalah pria sederhana yang jatuh cinta pada Marlena sejak muda, meski cintanya tak pernah benar-benar berbalas. Dari pernikahan singkat mereka, lahirlah Zoro, seorang anak yang menjadi seluruh dunia Sabari. Ketika Marlena pergi membawa Zoro, Sabari memulai pencarian panjang yang menyentuh hati. Novel ini adalah perayaan cinta seorang ayah yang tak pernah menyerah, dikemas dengan humor khas Andrea Hirata yang hangat dan menggelitik.\r\n', NULL, 1, NULL),
(12, 'Supernova: Ksatria, Puteri & Bintang Jatuh', 1, 1, 'supernova.jpg', 'Dua mahasiswa jenius, Reuben dan Dimas, bertaruh untuk menulis novel. Kisah dalam novel mereka pun nyata: seorang ksatria, seorang puteri, dan sosok misterius bernama Supernova yang mengubah segalanya.', 1, 1, NULL),
(13, 'Pulang', 2, 4, 'pulang.jpg', 'Bujang tumbuh di pedalaman Sumatera sebagai anak seorang jagal yang disegani. Sejak remaja, ia dibawa masuk ke dunia shadow economy — dunia kejahatan terorganisir yang beroperasi di bawah permukaan masyarakat. Dengan bimbingan Tauke Muda, Bujang menjelma menjadi petarung paling ditakuti. Namun di balik semua kekuatan itu, ia menyimpan luka lama dan pertanyaan tentang siapa dirinya sebenarnya. Sebuah perjalanan epik tentang kesetiaan, pengkhianatan, dan makna sejati dari kata pulang.', 1, 1, NULL),
(14, 'Ronggeng Dukuh Paruk', 2, 1, 'ronggeng_dukuh_paruk.jpg', 'Di sebuah dukuh terpencil di Jawa Tengah, seorang gadis muda bernama Srintil terpilih menjadi ronggeng — penari sekaligus simbol kesuburan yang diagungkan oleh warga desa. Namun di balik kemuliaannya, Srintil harus menanggung beban berat sebagai perempuan yang dimiliki oleh semua orang. Kisah cintanya dengan Rasus, pemuda yang mencintainya dengan tulus, terhalang oleh takdir dan gejolak politik Indonesia di era 1960-an yang penuh kekerasan dan tragedi.', NULL, 1, NULL),
(15, 'Cantik Itu Luka', 2, 1, 'cantik_itu_luka.jpg', 'Dewi Ayu adalah perempuan paling cantik di kota Halimunda, keturunan Belanda yang terpaksa menjadi pelacur di zaman penjajahan Jepang. Sebelum mati, ia mengutuk agar anak keempatnya lahir buruk rupa. Namun kutukan itu justru memicu serangkaian peristiwa tragis yang merentang selama beberapa generasi. Dengan gaya realisme magis yang kuat, Eka Kurniawan menenun sejarah kelam Indonesia, dendam, cinta, dan kutukan menjadi sebuah mahakarya sastra yang gelap sekaligus memesona.', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_peminjaman`
--

CREATE TABLE `detail_peminjaman` (
  `id_detail` int(11) NOT NULL,
  `id_peminjaman` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_peminjaman`
--

INSERT INTO `detail_peminjaman` (`id_detail`, `id_peminjaman`, `id_buku`, `id_admin`, `tanggal_kembali`) VALUES
(13, 2, 1, NULL, NULL),
(14, 3, 1, NULL, NULL),
(15, 4, 1, 1, '2026-04-15'),
(16, 5, 5, NULL, NULL),
(17, 6, 15, NULL, NULL),
(18, 7, 2, 1, '2026-04-15'),
(19, 8, 1, 1, '2026-04-15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_buku`
--

CREATE TABLE `kategori_buku` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori_buku`
--

INSERT INTO `kategori_buku` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Fiksi'),
(2, 'Pendidikan'),
(3, 'Romance'),
(4, 'Petualangan'),
(5, 'inspiratif'),
(6, 'Sci-fi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `status` enum('menunggu','dipinjam','dikembalikan','ditolak') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_user`, `tanggal_peminjaman`, `status`) VALUES
(1, 1, '2026-04-13', 'menunggu'),
(2, 1, '2026-04-13', 'ditolak'),
(3, 1, '2026-04-13', 'ditolak'),
(4, 1, '2026-04-15', 'dikembalikan'),
(5, 1, '2026-04-15', 'ditolak'),
(6, 1, '2026-04-15', 'ditolak'),
(7, 1, '2026-04-15', 'dikembalikan'),
(8, 1, '2026-04-15', 'ditolak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerbit_buku`
--

CREATE TABLE `penerbit_buku` (
  `id_penerbit` int(11) NOT NULL,
  `nama_penerbit` varchar(255) NOT NULL,
  `email_penerbit` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penerbit_buku`
--

INSERT INTO `penerbit_buku` (`id_penerbit`, `nama_penerbit`, `email_penerbit`) VALUES
(1, 'Bentang Pustaka', 'fo@bentangpustaka.com'),
(2, 'Gramedia', 'marketing@gramediapustakautama.com'),
(3, 'Pastel Books', 'pastelbooks.id'),
(4, 'Grasindo', 'redaksi@grasindo.id'),
(5, 'Coconut Book', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `saran`
--

CREATE TABLE `saran` (
  `id_saran` int(11) NOT NULL,
  `id_account` int(11) DEFAULT NULL,
  `isi_saran` text DEFAULT NULL,
  `tanggal_saran` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id_account`);

--
-- Indeks untuk tabel `account_admin`
--
ALTER TABLE `account_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `id_penerbit` (`id_penerbit`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_peminjaman` (`id_peminjaman`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_petugas` (`id_admin`);

--
-- Indeks untuk tabel `kategori_buku`
--
ALTER TABLE `kategori_buku`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `penerbit_buku`
--
ALTER TABLE `penerbit_buku`
  ADD PRIMARY KEY (`id_penerbit`);

--
-- Indeks untuk tabel `saran`
--
ALTER TABLE `saran`
  ADD PRIMARY KEY (`id_saran`),
  ADD KEY `id_account` (`id_account`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `account`
--
ALTER TABLE `account`
  MODIFY `id_account` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `account_admin`
--
ALTER TABLE `account_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `kategori_buku`
--
ALTER TABLE `kategori_buku`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `penerbit_buku`
--
ALTER TABLE `penerbit_buku`
  MODIFY `id_penerbit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `saran`
--
ALTER TABLE `saran`
  MODIFY `id_saran` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`id_penerbit`) REFERENCES `penerbit_buku` (`id_penerbit`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `buku_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_buku` (`id_kategori`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD CONSTRAINT `detail_peminjaman_ibfk_1` FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjaman` (`id_peminjaman`),
  ADD CONSTRAINT `detail_peminjaman_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`),
  ADD CONSTRAINT `detail_peminjaman_ibfk_3` FOREIGN KEY (`id_admin`) REFERENCES `account_admin` (`id_admin`);

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `account` (`id_account`);

--
-- Ketidakleluasaan untuk tabel `saran`
--
ALTER TABLE `saran`
  ADD CONSTRAINT `saran_ibfk_1` FOREIGN KEY (`id_account`) REFERENCES `account` (`id_account`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

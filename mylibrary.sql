-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Bulan Mei 2026 pada 04.21
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
  `role` varchar(50) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `account`
--

INSERT INTO `account` (`id_account`, `name`, `nis`, `password_user`, `kelas`, `role`) VALUES
(1, 'Raditya Alghifari', '501251212', '$2y$10$0klLIbSiRUWGEKsaGVkVqOQae5ACUxJz4wrFBP.iJHLnya3sXqD2u', 'X SIJA 2', 'user'),
(3, 'Sari', '501252312', '$2y$10$7tlbOxzRn/G93tbLofkeGOeu1m6H4rvOQKbPeIVj/QUu1BTjhSfHa', 'X SIJA 2', 'user'),
(4, 'Sari', '501252312', '$2y$10$zPiC5iBPiZj6fEOTTJHm7Ojm0wUPvPTzZSYGCsNnodxpMSfWXgP72', 'X SIJA 2', 'user'),
(5, 'Jevon Agnibrata Syahputra', '501251117', '$2y$10$.u8H31dToUJroDtP5j.njOtW5tONew870.Que12gzcnsxxZig8p/W', 'X SIJA 2', 'user'),
(6, 'Pasha yusuf', '501251187', '$2y$10$KDa78.UNRtsW0HA2wyW04uX/wYeWGKPf4FPF7RPK2gc5bF58jH1Ri', 'X SIJA 2', 'user'),
(7, 'Abiel Zohar', '501251000', '$2y$10$moIUg7Tgb2MDjOq6e6BSLumWm94j6nFSJQ64HrHqbvIe6ONMKLFwW', 'X SIJA 2', 'user');

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
  `stok` int(11) NOT NULL,
  `tahun_terbit` year(4) DEFAULT NULL,
  `ISBN` varchar(50) DEFAULT NULL,
  `id_penulis` int(11) DEFAULT NULL,
  `total_pinjam` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `nama_buku`, `id_penerbit`, `id_kategori`, `cover`, `description`, `stok`, `tahun_terbit`, `ISBN`, `id_penulis`, `total_pinjam`) VALUES
(1, 'Laskar Pelangi', 1, 1, 'LaskarPelangi.jpeg', 'Laskar Pelangi menceritakan perjuangan sepuluh anak dari keluarga miskin di Desa Gantung, Belitung, untuk mendapatkan pendidikan di SD Muhammadiyah. Berkat dedikasi guru mereka, Bu Muslimah, kelompok yang dijuluki \"Laskar Pelangi\" ini mampu membuktikan bahwa kemiskinan bukanlah halangan untuk berprestasi dan meraih mimpi', 1, '2005', '786022916628', 1, 2),
(2, 'Negeri 5 Menara', 2, 2, 'negeri5menara.jpg', 'Negeri 5 Menara mengisahkan perjalanan Alif, seorang anak desa yang harus merelakan mimpinya demi menempuh pendidikan di sebuah pesantren. Di tempat yang awalnya terasa asing, ia justru menemukan lima sahabat dari berbagai penjuru Indonesia yang kemudian dikenal sebagai Sahibul Menara.\r\n\r\nDi bawah menara masjid, mereka menatap langit sambil memupuk mimpi-mimpi besar—dari Indonesia hingga ke berbagai belahan dunia. Dengan semangat “man jadda wajada”, mereka belajar bahwa kerja keras, disiplin, dan keyakinan mampu membuka jalan menuju masa depan yang tak terbayangkan sebelumnya.\r\n\r\nNovel ini menyajikan kisah penuh inspirasi tentang persahabatan, perjuangan, dan kekuatan mimpi yang tumbuh dari tempat sederhana.', 3, '2009', '9789792248616 ', 1, 1),
(5, 'Dilan: Dia adalah Dilanku tahun 1990', 3, 3, 'dilan1990.jpg', 'Milea jatuh hati pada Dilan, cowok motor yang terkenal nakal tapi punya cara romantis yang tidak biasa di Bandung tahun 1990. Gaya pendekatan Dilan yang unik dan penuh humor membuat novel ini sangat memorable di kalangan remaja. Kisah ini terasa nostalgik dan relatable bagi siapa saja yang pernah merasakan cinta pertama.', 2, '2014', '', 1, 0),
(6, '5cm', 4, 4, '5cm.jpg', 'Lima sahabat yang sudah berteman lama memutuskan berpisah selama 3 bulan tanpa komunikasi. Setelah reuni, mereka berpetualang mendaki Gunung Semeru bersama dengan tekad membawa mimpi setinggi puncak. Novel ini penuh semangat, persahabatan, dan nasionalisme yang menggetarkan.', 1, '2012', NULL, NULL, 1),
(7, 'Sang Pemimpi', 1, 5, 'sangpemimpi.jpg', 'Ikal dan Arai, dua sepupu yang merantau ke Jawa dengan mimpi besar kuliah di Eropa. Perjalanan mereka penuh perjuangan, humor, dan pengorbanan yang menyentuh hati. Novel ini membuktikan bahwa mimpi sebesar apapun layak untuk diperjuangkan sampai titik darah penghabisan.', 1, '2006', NULL, NULL, 3),
(8, 'Hujan', 2, 1, 'hujan.jpg', 'Berlatar tahun 2040-an, novel ini mengisahkan Lail dan Esok yang dipertemukan oleh bencana dahsyat yang menghancurkan kota mereka. Keduanya tumbuh bersama namun takdir memisahkan mereka berkali-kali. Novel ini memadukan kisah cinta yang menyentuh dengan latar futuristik yang membuat pembaca terus penasaran hingga halaman terakhir.', 2, '2016', NULL, NULL, 0),
(9, 'Dear Nathan', 5, 3, 'dearnathan.jpg', 'Salma, siswi baru yang pendiam, dipertemukan dengan Nathan si bad boy yang terkenal di sekolah. Namun di balik sikapnya yang cuek, Nathan menyimpan sisi lembut yang perlahan membuat Salma jatuh hati. Novel ini sangat populer di kalangan remaja karena kisah cintanya yang manis dan relatable.', 1, '2017', NULL, NULL, 1),
(10, 'Perahu kertas', 1, 3, 'perahukertas.jpg', 'Drama\r\nKugy si gadis eksentrik pencinta dongeng dan Keenan si pelukis berbakat yang dipertemukan di Bandung. Keduanya saling jatuh cinta tanpa berani mengungkapkan, sementara mimpi masing-masing terus menarik mereka ke arah berbeda. Novel ini sangat kaya emosi dan menggambarkan dilema antara cinta dan mengejar impian.', 1, '2009', NULL, NULL, 0),
(12, 'Supernova: Ksatria, Puteri & Bintang Jatuh', 1, 1, 'supernova.jpg', 'Dua mahasiswa jenius, Reuben dan Dimas, bertaruh untuk menulis novel. Kisah dalam novel mereka pun nyata: seorang ksatria, seorang puteri, dan sosok misterius bernama Supernova yang mengubah segalanya.', 1, '2001', NULL, NULL, 1),
(13, 'Pulang', 2, 4, 'pulang.jpg', 'Bujang tumbuh di pedalaman Sumatera sebagai anak seorang jagal yang disegani. Sejak remaja, ia dibawa masuk ke dunia shadow economy — dunia kejahatan terorganisir yang beroperasi di bawah permukaan masyarakat. Dengan bimbingan Tauke Muda, Bujang menjelma menjadi petarung paling ditakuti. Namun di balik semua kekuatan itu, ia menyimpan luka lama dan pertanyaan tentang siapa dirinya sebenarnya. Sebuah perjalanan epik tentang kesetiaan, pengkhianatan, dan makna sejati dari kata pulang.', 1, '2012', NULL, NULL, 1),
(14, 'Ronggeng Dukuh Paruk', 2, 1, 'ronggeng_dukuh_paruk.jpg', 'Di sebuah dukuh terpencil di Jawa Tengah, seorang gadis muda bernama Srintil terpilih menjadi ronggeng — penari sekaligus simbol kesuburan yang diagungkan oleh warga desa. Namun di balik kemuliaannya, Srintil harus menanggung beban berat sebagai perempuan yang dimiliki oleh semua orang. Kisah cintanya dengan Rasus, pemuda yang mencintainya dengan tulus, terhalang oleh takdir dan gejolak politik Indonesia di era 1960-an yang penuh kekerasan dan tragedi.', 1, '1982', NULL, NULL, 1),
(17, 'Sang Eksekutor', 2, 8, 'sangEksekutor.jpg', 'novel thriller politik karya Tere Liye yang mengisahkan kekacauan hukum di sebuah negeri di mana hukum sangat kejam terhadap rakyat kecil namun lemah di hadapan penguasa', 1, '2026', '9786347046062', 2, 1),
(18, 'Seporsi Mie Ayam Sebelum Mati', 4, 1, 'seporsiMieAyamSeblumMati.jpg', 'Novel karya Brian Khrisna. Ale, pria 37 tahun berbadan bongsor yang depresi akut akibat perundungan, toxic family, dan kesepian. Setelah merencanakan bunuh diri, ia memutuskan makan mie ayam langganannya terlebih dahulu. Momen ini justru mengubah pandangannya tentang hidup, memanusiakannya, dan memberi pelajaran berharga tentang bertahan hidup', 7, '2025', NULL, NULL, 1),
(19, 'Merawat Luka Batin', 1, 1, '1777475949_Merawat-Luka-Batin.png', '', 5, '0000', '', 1, 1),
(20, 'Negeri Pada Bedebah', 2, 10, 'negeriParaBedebah.jpg', 'Negeri Para Bedebah karya Tere Liye adalah novel thriller politik-ekonomi yang menceritakan perjuangan Thomas, seorang konsultan keuangan brilian, dalam menyelamatkan Bank Semesta milik pamannya dari krisis dan likuidasi. Cerita ini menyoroti intrik, konspirasi, dan kebobrokan moral para elit/eksekutif yang digambarkan sebagai \"musang berbulu domba\".', 3, '2025', '978-979-22-8552-9', 2, 2),
(21, 'Bumi', 1, 1, 'bumiTereLiye.jpg', 'Novel Bumi membuka tirai petualangan tiga remaja bernama  Raib, Seli, dan Ali yang memiliki bakat luar biasa. Di dunia paralel, mereka terikat takdir untuk menyelamatkan Bumi dari kehancuran. \r\n\r\n \r\n\r\nRaib, gadis istimewa keturunan Klan Bulan, memiliki kemampuan menghilang dan mewarisi Buku Kehidupan yang membuka portal ke dunia lain. Seli, sang penjinak api dari Klan Matahari, dikenal tekadnya yang kuat dan pantang menyerah. \r\n\r\n \r\n\r\nSementara Ali, pemuda pemberani dari Klan Bumi, memiliki kemampuan unik berkomunikasi dengan hewan. Mereka saling menyadari memiliki kekuatan super ketika terjadi insiden tower listrik di sekolah jatuh menimpa mereka.\r\n\r\n \r\n\r\nAlih-alih celaka, ketiganya mampu mengendalikan jatuhnya tiang listrik dan membuat Tamus mengetahui keberadaan mereka. Tamus adalah sosok kejam yang berambisi menguasai dunia. Untunglah mereka diselamatkan sang guru Matematika.\r\n\r\n \r\n\r\nNamun aksi penyelamatan itu justru menjadi awal petualangan Raib, Seli, dan Ali di dunia paralel. Mereka pun menjelajahi tempat menakjubkan yaitu Klan Bulan yang futuristik, Klan Matahari di gurun misterius dan Klan Bumi yang rimbun oleh hutan.\r\n\r\n \r\n\r\nDi sepanjang petualangan, mereka dihadapkan pada berbagai rintangan dan bahaya. Mulai dari menghadapi monster mengerikan, memecahkan teka-teki rumit, hingga melawan pasukan Tamus yang kejam. \r\n\r\n \r\n\r\nMeski begitu, mereka juga bertemu dengan berbagai karakter fantastis yang membantu. Membawa mereka semakin dekat untuk mengungkap rahasia di balik dunia paralel dan menemukan cara untuk mengalahkan Tamus. ', 2, '2016', '9786020301129', 2, 1),
(22, 'Hello', 2, 1, 'Hello.jpg', 'Ana, seorang arsitek muda berbakat, selalu ngerasa ada magis tersendiri dalam setiap bangunan tua. Setiap retakan dinding dan ukiran kayu baginya adalah sebuah kisah yang menunggu untuk diceritakan. \r\n\r\n \r\n\r\nMaka ketika mendapat tawaran untuk merenovasi rumah mewah milik Bu Hesty, ia merasa sangat antusias. Tanpa ia sadari, sebenarnya kesempatan ini akan membawa Anna menuju sebuah teka-teki tentang si pemiliknya.\r\n\r\n \r\n\r\nRumah itu sendiri adalah sebuah saksi bisu sejarah Jakarta. Arsitekturnya yang klasik dan perabotan antiknya seolah membawa kita kembali ke masa lalu. Namun, bagi Ana, rumah ini menyimpan lebih dari sekadar nilai sejarah. \r\n\r\n \r\n\r\nSejak awal, ia merasakan aura misterius yang menyelimuti setiap sudut ruangan. Tapi tenang, ini bukan cerita horor, malahan kisahnya lebih berpotensi bikin kamu baper dan gregetan sendiri sama apa yang akan ditemuin sama Anna.\r\n\r\n \r\n\r\nKisah semakin seru ketika Anna bertemu dengan Bu Hesty, si pemilik rumah. Bu Hesty dengan senang hati berbagi kisah masa lalunya. Ia menceritakan tentang cinta pertamanya, Tigor, seorang pemuda yang bekerja sebagai anak buah di rumah keluarganya. \r\n\r\n \r\n\r\nKeduanya tumbuh bersama sejak kecil, saling mengenal satu sama lain lebih dari siapa pun dan saling jatuh cinta. Namun, perbedaan status sosial menjadi penghalang besar bagi hubungan manis mereka. Kaya nggak asing kan?\r\n\r\n \r\n\r\nAyah Bu Hesty, seorang bangsawan yang kaku dan gak pernah mau merestui hubungan putrinya dengan seorang anak pembantu. Semakin dalam Ana menggali sejarah rumah itu, semakin banyak rahasia yang terungkap. \r\n\r\n \r\n\r\nAda sebuah ruangan tersembunyi di balik perpustakaan yang hanya diketahui oleh Bu Hesty dan Tigor. Di ruangan itu, mereka menghabiskan banyak waktu bersama, berbagi mimpi dan harapan. \r\n\r\n \r\n\r\nAna menemukan sebuah kotak berisi surat-surat cinta yang ditulis oleh Tigor untuk Bu Hesty. Setiap kata yang tertulis di atas kertas seolah membawa kembali semangat muda mereka. Pembaca pasti menunggu dua insan ini bersatu kembali di akhir cerita.\r\n\r\n \r\n\r\nNamun, apakah Tigor dan Hesty kembali bertemu setelah berpisah puluhan tahun?', 2, '2023', '9786238829682', 2, 0),
(23, 'Sebelas', 2, 1, 'sebelas.jpg', 'Novel Sebelas karya Tere Liye mengisahkan tentang sebelas anak berbakat dari Nusantara yang dikumpulkan untuk membentuk tim sepak bola tangguh. Mereka berlatih keras dan berjuang dengan mimpi besar untuk mengalahkan klub-klub raksasa Eropa dan Amerika Latin seperti Real Madrid, Manchester United, dan Barcelona', 1, '2025', '9786347046024', 2, 1),
(24, 'Pergi', 7, 1, 'pergi.jpg', 'Novel Pergi karya Tere Liye adalah sekuel dari novel Pulang, yang bergenre aksi, petualangan, dan thriller. Buku ini menceritakan perjalanan Bujang (atau si Babi Hutan), seorang pentolan shadow economy penguasa Keluarga Tong, dalam mencari tujuan hidup dan masa lalu serta mengatasi musuh-musuh barunya', 1, '2018', '9786239554514', 2, 0);

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
(6, 'Sci-fi'),
(7, 'Journal'),
(8, 'Thriller'),
(9, 'Psikologi'),
(10, 'Politik'),
(11, 'nonfiksi');

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
(5, 'Coconut Book', NULL),
(6, 'Mizan Pustaka', 'mizan.publika@mizan.com'),
(7, 'Sabak Grip Nusantara', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penulis_buku`
--

CREATE TABLE `penulis_buku` (
  `id_penulis` int(11) NOT NULL,
  `foto_penulis` varchar(255) DEFAULT NULL,
  `nama_penulis` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penulis_buku`
--

INSERT INTO `penulis_buku` (`id_penulis`, `foto_penulis`, `nama_penulis`, `description`) VALUES
(1, 'andrea-hirata.jpg', 'Andrea Hirata', 'Andrea Hirata Seman Said Harun atau lebih dikenal sebagai Andrea Hirata (lahir 24 Oktober 1966) adalah novelis dan sastrawan Indonesia yang berasal dari Pulau Belitung, provinsi Bangka Belitung. Novel pertamanya adalah Laskar Pelangi yang menghasilkan dua sekue'),
(2, 'tere-liye.jpg', 'Tere Liye', 'Darwis (lahir 21 Mei 1979) yang lebih dikenal dengan nama pena Tere Liye adalah penulis dan akuntan berkebangsaan Indonesia. Memulai debut kepenulisan pada tahun 2005 melalui novel Hafalan Sholat Delisa, ia telah menerbitkan lebih dari 50 buku dalam sepanjang karier menulisnya.'),
(3, 'ahmad-tohari.jpg', 'Ahmad Tohari', 'Ahmad Tohari, (lahir 13 Juni 1948) adalah sastrawan dan budayawan berkebangsaan Indonesia. Ia menamatkan SMA di Purwokerto. Karya monumental nya, Ronggeng Dukuh Paruk, sudah diterbitkan dalam berbagai bahasa dan diangkat dalam film layar lebar berjudul Sang Penari. Ia pernah mengenyam bangku kuliah, yakni Fakultas Ilmu Kedokteran Ibnu Khaldun, Jakarta (1967-1970), Fakultas Ekonomi Universitas Jenderal Soedirman, Purwokerto (1974-1975), dan Fakultas Ilmu Sosial & Ilmu Politik Universitas Jenderal Soedirman (1975-1976). Tulisan-tulisannya berisi gagasan kebudayaan dimuat di berbagai media massa. Ia juga menjadi pembicara di berbagai diskusi/seminar kebudayaan.'),
(4, 'dr_Jiermi_Ardian_Sp_Kj.jpg', 'Dr. Jiermi Ardian, Sp.KJ', 'dr. Jiemi Ardian, Sp.KJ adalah seorang psikiater (dokter spesialis kedokteran jiwa) terkemuka di Indonesia yang aktif mengedukasi tentang kesehatan mental melalui media sosial dan praktik klinik. Beliau berfokus pada trauma, kecemasan, gangguan suasana hati (mood), dan mengintegrasikan mindfulness (MBSR/MBCT) dalam penyembuhan.');

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
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_penulis` (`id_penulis`);

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
-- Indeks untuk tabel `penulis_buku`
--
ALTER TABLE `penulis_buku`
  ADD PRIMARY KEY (`id_penulis`);

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
  MODIFY `id_account` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `account_admin`
--
ALTER TABLE `account_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `kategori_buku`
--
ALTER TABLE `kategori_buku`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `penerbit_buku`
--
ALTER TABLE `penerbit_buku`
  MODIFY `id_penerbit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `penulis_buku`
--
ALTER TABLE `penulis_buku`
  MODIFY `id_penulis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `saran`
--
ALTER TABLE `saran`
  MODIFY `id_saran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`id_penerbit`) REFERENCES `penerbit_buku` (`id_penerbit`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `buku_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_buku` (`id_kategori`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `buku_ibfk_3` FOREIGN KEY (`id_penulis`) REFERENCES `penulis_buku` (`id_penulis`);

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

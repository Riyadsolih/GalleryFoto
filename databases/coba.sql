-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Apr 2024 pada 05.36
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coba`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `album`
--

CREATE TABLE `album` (
  `AlbumID` int(11) NOT NULL,
  `NamaAlbum` varchar(255) NOT NULL,
  `Deskripsi` text NOT NULL,
  `TanggalDibuat` date NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `album`
--

INSERT INTO `album` (`AlbumID`, `NamaAlbum`, `Deskripsi`, `TanggalDibuat`, `UserID`) VALUES
(14, 'Buah-Buahan', 'Ini adalah Album tentang Buah-Buahan', '2024-03-04', 10),
(15, 'Game Online', 'Ini Album tentang Game Online', '2024-03-04', 10),
(19, 'Alam', 'sesuatu yang sangat indah sekali', '2024-04-05', 12),
(20, 'Perjalanan', 'Perjalanan', '2024-04-17', 12),
(21, 'Hewan Liar', 'Hewan Buas', '2024-04-17', 12),
(22, 'Seni Rupa', 'Karya Seni', '2024-04-17', 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto`
--

CREATE TABLE `foto` (
  `FotoID` int(11) NOT NULL,
  `JudulFoto` varchar(255) NOT NULL,
  `DeskripsiFoto` text NOT NULL,
  `TanggalUnggah` date NOT NULL,
  `LokasiFile` varchar(255) NOT NULL,
  `AlbumID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `foto`
--

INSERT INTO `foto` (`FotoID`, `JudulFoto`, `DeskripsiFoto`, `TanggalUnggah`, `LokasiFile`, `AlbumID`, `UserID`) VALUES
(35, 'Stroberi', 'Buah stroberi (Fragaria x ananassa Duch.) adalah buah dengan kulit merah dengan bintik-bintik putih di bagian kulit yang merupakan bijinya, buah ini berwarna merah ketika sudah masak dan hijau ketika masih muda. Buah ini termasuk ke dalam keluarga Rosaceae.', '2024-03-04', '4.jpg', 14, 10),
(36, 'Anggur', 'Anggur (Vitis vinifera L.) merupakan tanaman buah berupa perdu merambat yang termasuk ke dalam keluarga Vitaceae. Tumbuhan ini berbentuk semak, batang berkayu, berbentuk silindris, warna batang kecoklatan, permukaan kasar, arah tumbuh batang memanjat, dan arah tumbuh cabang membelit.', '2024-03-04', '3.jpg', 14, 10),
(37, 'Buah Naga', 'Buah naga (Inggris: pitaya) adalah buah dari beberapa jenis kaktus dari marga Hylocereus dan Selenicereus. Buah ini berasal dari Meksiko, Amerika Tengah dan Amerika Selatan namun sekarang juga dibudidayakan di negara-negara Asia seperti Indonesia, Taiwan, Vietnam, Filipina, dan Malaysia.', '2024-03-04', '2.jpg', 14, 10),
(39, 'Free Fire', 'Free fire adalah sebuah game perang yang mengumpulkan hingga 53 pemain disebuah peta yang luas, dimana setiap pemain harus saling membunuh dan menjadi satu-satunya orang yang bisa bertahan untuk menjadi pemenang (Forrest Li, 2019).', '2024-03-04', '19.jpg', 15, 10),
(41, 'VALORANT', 'VALORANT adalah game tembak-menembak taktis tempat kamu dan 4 rekan tim berhadapan dengan 5 Agen lain dalam baku tembak berbekal satu nyawa per ronde untuk jadi yang pertama memenangkan 13 ronde', '2024-03-04', '21.jpg', 15, 10),
(42, 'Blood Strike ', 'Blood Strike adalah game mobile FPS Battle Royale. Rasakan Battle Royale 100 pemain dengan senjata yang bisa disesuaikan sepenuhnya!', '2024-03-04', '22.jpg', 15, 10),
(64, 'Karya Seni', 'Karya ', '2024-04-17', 'lukisan.jpg', 22, 13),
(66, 'Gunung', 'Pemandangan gunung yang sangat indah', '2024-04-20', '49e98c41b0b8b1ab10034106a7d0a4fa.jpg', 19, 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentarfoto`
--

CREATE TABLE `komentarfoto` (
  `KomentarID` int(11) NOT NULL,
  `FotoID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `IsiKomentar` text NOT NULL,
  `TanggalKomentar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `komentarfoto`
--

INSERT INTO `komentarfoto` (`KomentarID`, `FotoID`, `UserID`, `IsiKomentar`, `TanggalKomentar`) VALUES
(1, 35, 15, 'segar sekali', '2024-04-20'),
(2, 35, 15, 'saya suka saya suka', '2024-04-21'),
(3, 39, 15, 'game burik', '2024-04-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `likefoto`
--

CREATE TABLE `likefoto` (
  `LikeID` int(11) NOT NULL,
  `FotoID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `TanggalLike` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `likefoto`
--

INSERT INTO `likefoto` (`LikeID`, `FotoID`, `UserID`, `TanggalLike`) VALUES
(1, 35, 13, '2024-04-18'),
(2, 35, 15, '2024-04-20'),
(3, 36, 15, '2024-04-20'),
(4, 66, 15, '2024-04-20'),
(5, 64, 15, '2024-04-20'),
(6, 37, 15, '2024-04-21'),
(7, 39, 15, '2024-04-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `NamaLengkap` varchar(255) NOT NULL,
  `Alamat` text NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`UserID`, `Username`, `Password`, `Email`, `NamaLengkap`, `Alamat`, `role`) VALUES
(10, 'alfin', '8606c00dd0519823dd31e565780eb496', 'alfin@gmail.com', 'alfin fauzan', 'cisalatri', 'user'),
(12, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 'admin', 'indonesia', 'admin'),
(13, 'riyadd', '6977e012fe3b72cf00d48f6c11d870c7', 'riyadsolihagisni@gmail.com', 'riyad solih agisni', 'Indonesia', 'user'),
(14, 'anzas', '81dc9bdb52d04dc20036dbd8313ed055', 'anzas@gmail.com', 'anzasss', 'kp.tugu', 'user'),
(15, 'dudung', '69188e2b4cdd7df800c4b009d70c5ec4', 'dudung@gmail.com', 'dudung soleh', 'Indonesia', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`AlbumID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indeks untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`FotoID`),
  ADD KEY `AlbumID` (`AlbumID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indeks untuk tabel `komentarfoto`
--
ALTER TABLE `komentarfoto`
  ADD PRIMARY KEY (`KomentarID`),
  ADD KEY `FotoID` (`FotoID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indeks untuk tabel `likefoto`
--
ALTER TABLE `likefoto`
  ADD PRIMARY KEY (`LikeID`),
  ADD KEY `FotoID` (`FotoID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `album`
--
ALTER TABLE `album`
  MODIFY `AlbumID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `foto`
--
ALTER TABLE `foto`
  MODIFY `FotoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT untuk tabel `komentarfoto`
--
ALTER TABLE `komentarfoto`
  MODIFY `KomentarID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `likefoto`
--
ALTER TABLE `likefoto`
  MODIFY `LikeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `foto_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foto_ibfk_2` FOREIGN KEY (`AlbumID`) REFERENCES `album` (`AlbumID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `komentarfoto`
--
ALTER TABLE `komentarfoto`
  ADD CONSTRAINT `komentarfoto_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentarfoto_ibfk_2` FOREIGN KEY (`FotoID`) REFERENCES `foto` (`FotoID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `likefoto`
--
ALTER TABLE `likefoto`
  ADD CONSTRAINT `likefoto_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likefoto_ibfk_2` FOREIGN KEY (`FotoID`) REFERENCES `foto` (`FotoID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

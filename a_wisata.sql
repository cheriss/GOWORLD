-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2022 at 02:57 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a_wisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` char(4) NOT NULL,
  `adminNama` varchar(30) NOT NULL,
  `adminEmail` varchar(60) NOT NULL,
  `adminPassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `adminNama`, `adminEmail`, `adminPassword`) VALUES
('A001', 'Jone', 'jone@yahoo.com', '1234'),
('A002', 'Alex', 'alex@yahoo.com', 'd93591bdf7860e1e4ee2fca799911215'),
('A003', 'Aeryn', 'aeryn@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `areaID` char(4) NOT NULL,
  `areaNama` char(35) NOT NULL,
  `areaWilayah` char(35) NOT NULL,
  `areaKeterangan` varchar(255) NOT NULL,
  `kabupatenKode` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`areaID`, `areaNama`, `areaWilayah`, `areaKeterangan`, `kabupatenKode`) VALUES
('AR01', 'Batu', 'Jawa Timur', 'berada didekat kali Ciliwung', 'KB03'),
('AR02', 'Lembang', 'Bandung Utara', 'berada didekat gunung', 'KB02'),
('AR03', 'Bukit Kecil', 'Bandung Utara', 'berada didekat gunung', 'KB05'),
('AR04', 'Bali', 'Pulau Bali', 'Pulau terkenal di Indonesia', 'KB04'),
('AR05', 'Jakarta Timur', 'Jawa Barat', 'merupakan Ibu Kota Indonesia', 'KB01');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `beritaID` char(4) NOT NULL,
  `beritaJudul` varchar(60) NOT NULL,
  `beritaInti` varchar(1000) NOT NULL,
  `penulis` char(50) NOT NULL,
  `penerbit` varchar(30) NOT NULL,
  `tanggalTerbit` date NOT NULL,
  `destinasiID` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`beritaID`, `beritaJudul`, `beritaInti`, `penulis`, `penerbit`, `tanggalTerbit`, `destinasiID`) VALUES
('BR01', '5 Tempat Wisata Terbaik', 'Negara kita tercinta, Indonesia, memang memiliki alam yang sangat indah. Dari Sabang sampai Merauke, kita bisa dengan mudah menemukan tempat-tempat indah dan memukau.\r\n\r\nSebagai penduduk asli Indonesia, kita sudah sepatutnya berbangga hati lho Toppers tinggal di negeri yang dikelilingi beribu – ribu pulau dengan keindahan yang tiada duanya', 'Mark', 'Gramedia', '2022-11-15', 'WS01'),
('BR02', 'Tempat Wisata yang harus dikunjungi', 'tempat wisata yang harus dikunjungi antara lain: Taman Mini Indonesia Indah(TMII), Bali, Yogyakarta', 'Jono', 'Erlangga', '2022-11-04', 'WS03'),
('BR03', 'Destinasi yang cocok untuk healing', 'Ada banyak tempat destinasi untuk healing yang bisa dikunjungi. Namun tempat destinasi yang cocok untuk healing di Indonesia adalah Pantai Pasir Perawan, Museum Tengah Kebun,  dan Skywalk Senayan Park. Itulah Top 3 tempat destinasi terbaik untuk healing menurut sayaa :\")', 'Lia', 'Travel.id', '2014-12-27', 'WS04');

-- --------------------------------------------------------

--
-- Table structure for table `cenderamata`
--

CREATE TABLE `cenderamata` (
  `cenderamataID` char(4) NOT NULL,
  `cenderamataNama` varchar(35) NOT NULL,
  `cenderamataAlamat` varchar(255) NOT NULL,
  `cenderamataFoto` text NOT NULL,
  `areaID` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cenderamata`
--

INSERT INTO `cenderamata` (`cenderamataID`, `cenderamataNama`, `cenderamataAlamat`, `cenderamataFoto`, `areaID`) VALUES
('CM01', 'Souvenir Shop 39', 'Jl. Cihampelas No. 39', 'c1.jpg', 'AR01'),
('CM02', 'Krisna', 'Jl. Bali', 'c2.jpg', 'AR02'),
('CM03', 'Photo Wisata 23', 'Aceh', 'c3.jpg', 'AR03'),
('CM04', 'cenderamata', 'Jl. mana saja', 'c4.jpg', 'AR04');

-- --------------------------------------------------------

--
-- Table structure for table `destinasi`
--

CREATE TABLE `destinasi` (
  `destinasiID` char(5) NOT NULL,
  `destinasiNama` varchar(35) NOT NULL,
  `destinasiAlamat` varchar(255) NOT NULL,
  `kategoriID` char(4) NOT NULL,
  `areaID` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `destinasi`
--

INSERT INTO `destinasi` (`destinasiID`, `destinasiNama`, `destinasiAlamat`, `kategoriID`, `areaID`) VALUES
('WS01', 'Taman Mini Indonesia Indah', ' JL. Raya Taman Mini, Jakarta Timur, DKI Jakarta, Indonesia', 'WK01', 'AR05'),
('WS02', 'The Great Asia Africa', 'Jl. Raya Lembang, Bandung No. 71', 'WK03', 'AR02'),
('WS03', 'Uluwatu Temple', 'Pecatu, South Kuta, Badung Regency, Bali', 'WK02', 'AR04'),
('WS04', 'Jatim Park I', ' Jl. Kartika No.2, Desa Sisir, Kecamatan Kota Batu, Provinsi Jawa Timur', 'WK02', 'AR01'),
('WS05', 'Gunung Bromo', ' Taman Nasional Bromo Tengger Semeru, Ngadas, Sukapura, Probolinggo 67254, Indonesia', 'WK05', 'AR03'),
('WS06', 'Lembang Asri', 'Jl. Pantai Selatan Jawa', 'WK03', 'AR01');

-- --------------------------------------------------------

--
-- Table structure for table `fotodestinasi`
--

CREATE TABLE `fotodestinasi` (
  `fotoID` char(5) NOT NULL,
  `fotoNama` char(60) NOT NULL,
  `destinasiID` char(4) NOT NULL,
  `fotoFile` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fotodestinasi`
--

INSERT INTO `fotodestinasi` (`fotoID`, `fotoNama`, `destinasiID`, `fotoFile`) VALUES
('F001', 'Taman Mini Indonesia', 'WS01', 'tmii.jpg'),
('F002', 'Uluwatu Temple', 'WS03', 'uluwatu.jpg'),
('F004', 'The great asia africa', 'WS02', 'asia.jpg'),
('F005', 'Gunung Bromo', 'WS05', 'bromo.jpg'),
('F006', 'jatim park 1', 'WS04', 'jatim.jpg'),
('F007', 'Photo Wisata 37', 'WS06', 'tmii.jpg'),
('F008', 'Merdeka', 'WS07', 'uluwatu.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `hotelID` char(4) NOT NULL,
  `hotelNama` varchar(60) NOT NULL,
  `hotelAlamat` varchar(255) NOT NULL,
  `hotelKeterangan` varchar(300) NOT NULL,
  `hotelFoto` text NOT NULL,
  `areaID` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotelID`, `hotelNama`, `hotelAlamat`, `hotelKeterangan`, `hotelFoto`, `areaID`) VALUES
('HT01', 'The Batu Hotel & Villas', 'Jl. Sultan Agung 29, 65314 Batu, Indonesia', 'hotel bintang 5 dekat pantai', 'batu.jpg', 'AR01'),
('HT02', 'Moscato Hotel & Cafe', 'Jl. Raya Lembang No 11 Bandung Barat, 40391 Lembang, Indonesia', 'hotel bintang 5 dekat gunung', 'moscato.jpg', 'AR02'),
('HT03', 'BATIQA', 'Jl. Kapten A. Rivai No.63, 26 Ilir, Kec. Bukit Kecil, Kota Palembang, Sumatera Selatan', 'berada di Pulau Jawa Barat', 'batiqa1.jpg', 'AR01'),
('HT04', 'Aston', 'Jl. M.T Haryono Kav.6-7 (Jl. Biru Laut X), 13340 Jakarta, Indonesia', 'hotel bintang 5 di Ancol', 'aston.jpg', 'AR05'),
('HT05', 'Radisson Blu Bali Uluwatu', 'Jl. Pemutih Bali , 80364 Uluwatu, Indonesia', 'hotel bintang 5 di Uluwatu, Bali', 'radisson.jpg', 'AR04');

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten`
--

CREATE TABLE `kabupaten` (
  `kabupatenKode` char(4) NOT NULL,
  `kabupatenNama` char(60) NOT NULL,
  `kabupatenAlamat` varchar(255) NOT NULL,
  `kabupatenKet` text NOT NULL,
  `kabupatenFotoicon` varchar(255) NOT NULL,
  `kabupatenFotoiconket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kabupaten`
--

INSERT INTO `kabupaten` (`kabupatenKode`, `kabupatenNama`, `kabupatenAlamat`, `kabupatenKet`, `kabupatenFotoicon`, `kabupatenFotoiconket`) VALUES
('KB01', 'DKI Jakarta', 'Jawa Barat, Indonesia', 'berada di Pulau Jawa Barat', 'jakarta.jpg', 'Gedung di Jakarta'),
('KB02', 'Bandung', 'Jawa Barat, Indonesia', 'berada di Pulau Jawa Barat', 'bandung.jpg', 'Tugu Maung'),
('KB03', 'Malang', 'Jawa Timur, Indonesia', 'Pulau terkenal di Indonesia', 'malang1.jpg', 'Bajra Sandhi'),
('KB04', 'Pulau Bali', 'Jawa Timur, Indonesia', 'Salah satu pulau terkenal di Indonesia', 'bali.jpg', 'tugu di Bali'),
('KB05', 'Palembang', 'Jawa Timur, Indonesia', 'berada di Pulau Jawa Timur', 'palembang1.jpg', 'Jembatan Jepara gantung');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategoriID` char(4) NOT NULL,
  `kategoriNama` char(30) NOT NULL,
  `kategoriKeterangan` varchar(255) NOT NULL,
  `kategoriReferensi` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategoriID`, `kategoriNama`, `kategoriKeterangan`, `kategoriReferensi`) VALUES
('WK01', 'Alam', 'Wisata dengan pemandangan pantai dan gunung.', 'Buku'),
('WK02', 'Budaya', 'Wisata sejarah, peninggalan masa lalu', 'Buku'),
('WK03', 'Pantai', 'Deket Pantai', 'Pengguna'),
('WK04', 'Hutan', 'Ada dimana saja', 'Pengguna'),
('WK05', 'Gunung', 'Jembatan', 'Buku'),
('WK07', 'Religi', 'Wisata rohani', 'online'),
('WK09', 'Lembang Asri', 'Jembatan', 'Buku');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `kegiatanID` char(4) NOT NULL,
  `kegiatanNama` varchar(35) NOT NULL,
  `kegiatanLokasi` varchar(255) NOT NULL,
  `kegiatanTanggal` date NOT NULL,
  `areaID` char(4) NOT NULL,
  `kegiatanFoto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`kegiatanID`, `kegiatanNama`, `kegiatanLokasi`, `kegiatanTanggal`, `areaID`, `kegiatanFoto`) VALUES
('KG01', 'Bersepeda', 'Kota Tua, Jakarta Barat', '2022-05-11', 'AR04', 'bersepeda.jpg'),
('KG02', 'Balap Karung', 'Monas', '2012-08-12', 'AR03', 'balap-karung.jpg'),
('KG03', 'Berfoto', 'Dago Pakar', '2015-12-01', 'AR02', 'foto.jpg'),
('KG04', 'Lomba Makan', 'Taman Mini Indonesia Indah', '2019-12-02', 'AR05', 'makan.jpg'),
('KG05', 'Lomba Lari', 'Central Park', '2017-09-11', 'AR01', 'lari1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `restoran`
--

CREATE TABLE `restoran` (
  `restoranID` char(4) NOT NULL,
  `restoranNama` varchar(35) NOT NULL,
  `restoranAlamat` varchar(255) NOT NULL,
  `restoranKeterangan` varchar(255) NOT NULL,
  `areaID` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restoran`
--

INSERT INTO `restoran` (`restoranID`, `restoranNama`, `restoranAlamat`, `restoranKeterangan`, `areaID`) VALUES
('RS01', 'Keluarga', 'Jl. Bandung Selatan No. 15', 'restoran seafood teramai di Bandung', 'AR03'),
('RS02', 'Kencana', 'Jl. Neo Culture Technology', 'restoran dengan pemangdangan yang indah', 'AR01'),
('RS03', 'Religi', 'Jl. Geger Kalong Hilir Bandung', 'Deket Pantai Selatan', 'AR01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`areaID`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`beritaID`);

--
-- Indexes for table `cenderamata`
--
ALTER TABLE `cenderamata`
  ADD PRIMARY KEY (`cenderamataID`);

--
-- Indexes for table `destinasi`
--
ALTER TABLE `destinasi`
  ADD PRIMARY KEY (`destinasiID`);

--
-- Indexes for table `fotodestinasi`
--
ALTER TABLE `fotodestinasi`
  ADD PRIMARY KEY (`fotoID`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotelID`);

--
-- Indexes for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`kabupatenKode`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategoriID`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`kegiatanID`);

--
-- Indexes for table `restoran`
--
ALTER TABLE `restoran`
  ADD PRIMARY KEY (`restoranID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

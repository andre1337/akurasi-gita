-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2019 at 01:02 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `00f_unsadasentimen_analis`
--

-- --------------------------------------------------------

--
-- Table structure for table `ak_angket`
--

CREATE TABLE `ak_angket` (
  `idangket` int(20) UNSIGNED NOT NULL,
  `idkelas` int(11) NOT NULL,
  `nim` char(20) NOT NULL,
  `isvalid` char(1) NOT NULL,
  `komentar` text NOT NULL,
  `label` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ak_angket`
--

INSERT INTO `ak_angket` (`idangket`, `idkelas`, `nim`, `isvalid`, `komentar`, `label`) VALUES
(3178, 190650, '2015110073', '1', 'terima kasih banyak sudah banyak memberi saran yang bagus', ''),
(3179, 190651, '2015230088', '1', 'dosen telat', ''),
(2323347, 190060, '20162233', '1', 'malas', ''),
(2323348, 2349234, '212893812', '1', 'bosan', ''),
(2323349, 2312, '2342', '1', 'saya pusing', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(8) NOT NULL,
  `kalimat` text NOT NULL,
  `kategori` varchar(30) NOT NULL,
  `stemming` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `kalimat`, `kategori`, `stemming`) VALUES
(1, 'makan', 'Positif', 'makan'),
(2, 'minum', 'Positif', 'minum'),
(3, 'hutang', 'Negatif', 'hutang'),
(4, 'malas', 'Negatif', 'malas'),
(5, 'sangat senang di ajarin dengan pa Verdy', 'Positif', 'sangat senang ajarin verdy'),
(6, 'cukup baik untuk mengajar, terima kasih pa sumarsono', 'Positif', 'cukup baik ajar terima kasih sumarsono'),
(7, 'pa verdy sangat baik terimakasih', 'Positif', 'verdy sangat baik terimakasih'),
(8, 'Materi yg diajarkan mudah dipahami', 'Positif', 'materi yg ajar mudah paham'),
(9, 'Tingkatkan lagi penyajian dalam memberikan materi kepada para mahasiswa', 'Positif', 'tingkat saji beri materi kemahasiswa'),
(10, 'semoga bisa lebih baik lagi dalemm mengasih materi nya', 'Positif', 'moga lebih baik dalemm asih materi nya'),
(11, 'lebih rajin ajak masuk nya', 'Positif', 'lebih rajin ajak masuk nya'),
(12, 'Baik', 'Positif', 'baik'),
(13, 'saran aja buat di teknik apalagi anak muda Zaman sekarang klo belajar pemerintahan agak kurang, tapi untuk mendengarkan dari sebuah cerita mereka masih tertarik, saat penyampain materi diselingi cerita atau pengalaman. mereka lebih mudah memahaminya', 'Positif', 'saran aja buat teknik apaanak muda zaman sekarang klo ajar perintah kurang dengar buah cerita tarik penyampain materi ling alam lebih mudah'),
(14, 'mungkin untuk teori masih bisa di baca dibuku atau media manapun, untuk pembahasan soal yang masih susah dicari, saran aja sih saat pemberian materi lebih sering bahas soal dan latihan aja. dan pemberian tugas individu untuk latihan dirumah.', 'Negatif', 'mungkin teori baca buku memana bahas soal susah cari saran aja sih beri materi lebih sering latih'),
(15, 'bagus, saran aja sih kedepannya banyak cerita tentang implementasi ADBO dalam kehidupan, agar lebih mudah dipahami dalam penerapannya.', 'Negatif', 'bagus saran aja sih depan banyak cerita implementasi adbo hidup lebih mudah paham terap'),
(16, 'saran aja sih, kedepannya sering latihan analisis dari studi kasusnya', 'Negatif', 'saran aja sih depan sering latih analisis stukasus'),
(17, 'saran aja sih mungkin kedepannya Sistem operasi bisa mempelajari kelemahan system, dan pencarian celah serta cara penanganan dari serangan orang jahat', 'Negatif', 'saran aja sih mungkin depan sistem operasi ajar lemah system cari celah cara tangan serang orang jahat'),
(18, '', 'Negatif', ''),
(19, 'secara teori mungkin saya kurang mengerti, secara praktek mungkin saya mengerti gambarannya. pemberian materi dari awal langsung menggunakan studi kasus, saya pikir itu bagus membuat pola pikir saya sedikit berubah. tapi saran aja sih kedepannya, teori yg paling umum disampaikan dahulu mungkin 2 pertemuan pertama.', 'Negatif', 'cara teori mungkin kurang erti praktek gambar beri materi awal langsung stukasus pikir bagus buat pola sedikit ubah saran aja sih depan'),
(20, 'Semua sesuai', 'Positif', 'semua sesuai'),
(21, 'Bagus dan baik', 'Positif', 'bagus baik'),
(22, 'Ilmu yang di berikan sangat bermanfaat untuk anak murid', 'Positif', 'ilmu ikan sangat manfaat anak murid'),
(23, 'Sering datang terlambat', 'Positif', 'sering datang lambat'),
(24, 'Cukup', 'Negatif', 'cukup'),
(25, 'Penyajian terlalu cepat', 'Positif', 'saji terlalu cepat'),
(26, 'mantap pak,lanjutkan', 'Positif', 'mantap pak lanjut'),
(27, 'Ketepatan waktu tolong lebih di perhatikan', 'Positif', 'tepat waktu lebih perhati'),
(28, 'Cara mengajar baik tapi kurang kurang\"in telatnya, dosen setiap kali mengajar selalu telat, dan telatnya keterlaluan', 'Negatif', 'cara ajar baik kurang in telat dosen tiap kali'),
(29, 'Sangat baik, ketepatan waktu juga sangat baik dan penyajian atau cara penyampaiannya baik', 'Negatif', 'sangat baik tepat waktu'),
(30, 'Baik dalam ilmu pengetahuan, dan softskill dosen sangat baik. Dan baik dalam membantu nilai maupun skill mahasiswa', 'Positif', 'baik ilmu tahu softskill dosen sangat bantu nilai'),
(31, 'Buat mata kuliah lebih menarik agar mahasiswa tidak bosan dengan materi yang ibu sampaikan', 'Positif', 'buat mata kuliah lebih tarik mahasiswa bosan materi isampai'),
(32, 'Untuk materi penyampaian sangat baik akan tetapi jangan terlalu sering diktat foto copyan dengan membayar dan selama 2 kali pembayaran uts dan uas. Mudah di mengerti saat menjelaskan ', 'Positif', 'materi sangat baik jangan terlalu sering diktat foto copyan bayar lama kali uts uas mudah erti'),
(33, 'Terimakasih selama 1 semester ini bu', 'Negatif', 'terimakasih lama semester bu'),
(34, 'Mudah di mengerti untuk proses pembelajaran bahan sesuai dengan materi yang di berikan saat ujian', 'Positif', 'mudah erti proses ajar bahan sesuai materi ikan uji'),
(35, 'Mudah di mengerti saat mengajar dan menjelaskan dosen bisa di ajak berkomunikasi melalui via wa ', 'Positif', 'mudah erti ajar jelas dosen ajak komunikasi lalu vwa'),
(36, 'Tolong di perbaiki cara mengajarnya pak.', 'Positif', 'baik cara ajar pak'),
(37, 'Sangat bermanfaat ilmu yang di kasih untuk dunia kerja atau perkuliahan. Materi mudah di mengerti dengan penjelasan yang sangat rinci. ', 'Negatif', 'sangat manfaat ilmu kasih dunkerja kuliah materi mudah erti jelas'),
(38, 'Dosen mendiskusikan silabus dengan mahasiswa', 'Positif', 'dosen diskusi silabus mahasiswa'),
(39, 'Baik sekali. Untuk kedepannya materi yang di kasih ke mahasiswa harus ada 2 bahasa. Yaitu bahasa Indonesia dan bahasa Inggris. Jadi yang untuk tidak mengerti bahasa Inggris, maka mahasiswa membaca materi yang bahasa Indonesia. Dan untuk pembelajarannya sangat baik.', 'Positif', 'baik sekali depan materi kasih mahasiswa bahasa yabahasa indonesbahasa inggris jaerti'),
(40, 'Dosen terbaik dan terasik saat belajar', 'Positif', 'dosen baik terasik ajar'),
(41, 'Perjelas dalam mengajar', 'Positif', 'jelas ajar'),
(42, 'Dosen terasik dan terbaik', 'Positif', 'dosen terasik baik'),
(43, 'Pertahankan gaya ngajar seperti ini pak', 'Positif', 'tahan gangajar pak'),
(44, 'Saya sulit mengerti dengan pelajaran ibu , mudah2an kedepannya ibu bisa mengajarkan kepada mahasiswa dengan logika yang gampang di cerna mahasiswa tersebut.', 'Negatif', 'sulit erti ajar imudahan depan iajar kemahasiswa logika gampang cerna mahasiswa sebut'),
(45, 'Sama kan materi teori dan praktek', 'Negatif', 'sama kan materi teori praktek'),
(46, 'Panutan saya', 'Positif', 'panutan saya'),
(47, 'Sensei mengajar dengan baik, semoga sensei tidak merubah cara mengajar sensei.', 'Positif', 'sensei ajar baik moga rubah'),
(48, 'Lebih tepat waktu disaat pelajaran dimulai', 'Negatif', 'lebih tepat waktu ajar mulai'),
(49, 'Tolong penyampaian materi di perbagus lagi pa', 'Negatif', 'materi bagus pa'),
(50, 'Sudah bagus dalam memberikan materi', 'Positif', 'bagus beri materi'),
(51, 'Absen saya kenapa bukan 100% pak T_T', 'Negatif', 'absen bukan pak'),
(52, 'semoga dalam mengajar menjadi lebih baik', 'Positif', 'moga ajar jalebih baik'),
(53, 'Sangat baik dalam membimbing proses belajar', 'Positif', 'sangat baik bimbing proses ajar'),
(54, 'tolong pak jangan dikit dikit uang terus buat ngeprint atau beli modul fotocopyan hasil print file ppt. lebih baik kasih pptnya langsung, sayang duit pak anak malam rata2 kerja buat bayar kuliah sendiri: \")) dan kalau waktu mengajar sudah selesai tolong jangan dilama2in pak masa kita gabisa sholat, pas mau izin sholat malah dicuekin.', 'Negatif', 'pak jangan dikit uang terus buat ngeprint beli modul fotocopyan hasil print file ppt lebih baik kasih pptnlangsung saduit anak malam rata kerja bayar kuliah sendiri kalau waktu ajar selesai dilamain masa gasholat pas'),
(55, 'Tolong ajarkan cara menulis jepang', 'Negatif', 'ajar cara tulis jepang'),
(56, 'Materinya sedikit sulit tetapi sangat melatih daya pikir', 'Positif', 'materi sedikit sulit sangat latih dapikir'),
(57, 'Kurangnya dosen dalam membantu mahasiswa, tetapi membuat mahasiswa ingin mencari tau sendiri', 'Negatif', 'kurang dosen bantu mahasiswa buat cari tau'),
(58, 'kadang cara penyampaiannya kurang saya mengerti pak, yg rata2 mengerti hanya yg sudah berpengalaman atau bekerja dibidang IT sedangkan kami yg masih noob dan bekerja belum sesuai bidang masih suka bingung dengan pembahasannya. sarannya mungkin saat menjelaskan lebih ke contoh umum pak(?)', 'Positif', 'kadang cara kurang erti pak yg rata alam kerja bidang it sedang noob sesuai suka bingung bahas'),
(59, 'mantab betul si bapak kalau mengajar mudah dimengerti, kalau tidak mengerti langsung diajarin sampe akar akar.', 'Positif', 'mantab betul si bapak kalau ajar mudah erti langsung diajarin'),
(60, 'Harap memberikan nilai yang cukup dan sesuai', 'Negatif', 'harap beri nilai cukup sesuai'),
(61, 'kalau mengajar sangat asik pak, hanya saja waktu belajar sering tidak sesuai karena bapak sering kemacetan juga kan naik mobil. sarannya mohon langsung kabarin salah satu mahasiswa dikelas kalau kiranya telat pak kasian mahasiswanya digantungin nunggu kepastian', 'Positif', 'kalau ajar sangat asik pak waktu sering sesuai bapak macet kan naik mobil saran mohon langsung kabarin salah satu mahasiswa kelas kira telat'),
(62, 'Terimakasih atas pengetahuan yang diberikan', 'Positif', 'terimakasih atas tahu beri'),
(63, 'mantab bu, penyampaiannya mudah, asik dan ga tegang. jadi no kritik saya', 'Positif', 'mantab mudah asik ga tegang jano kritik saya'),
(64, 'Agar lebih diperjelas dalam memberikan penjelasan terhadap mahasiswa yang belum paham', 'Negatif', 'lebih jelas beri hadap mahasiswa'),
(65, 'kalau untuk teori saya masih kurang mengerti pak saat menjelaskan terlalu berbelit tapi untuk prekteknya mantab betul pak', 'Negatif', 'kalau teori kurang erti pak jelas terlalu belit prekteknmantab betul'),
(66, 'Sangat menyenangkam bisa di ajar oleh beliau.', 'Positif', 'sangat menyenangkam ajar beliau'),
(67, 'Terimakasih atas pemberian pengetahuan yang diberikan', 'Positif', 'terimakasih atas beri tahu'),
(68, 'Kurang disiplin', 'Negatif', 'kurang disiplin'),
(69, 'Bagus, dosennya baik dan telaten', 'Positif', 'bagus dosen baik telaten'),
(70, 'Leluasa berfikir', 'Positif', 'leluasa berfikir'),
(71, 'Kurangnya dalam membantu mahasiswa', 'Negatif', 'kurang bantu mahasiswa'),
(72, 'Materi yang disampaikan sudah bagus tetapi kurang penjelasan dari dosen', 'Negatif', 'materi bagus kurang jelas dosen'),
(73, 'Sangat baik dalam pemberian materi', 'Positif', 'sangat baik beri materi'),
(74, 'Makasih ibu paling penyabar kalo ngajar nya', 'Positif', 'makasih ipaling sabar kalo ngajar nya'),
(75, 'Enak  belajar  dengan bapak melatih wawasan politik yg sehat', 'Positif', 'enak ajar bapak latih wawas politik yg sehat'),
(76, 'Izinkan mahasiswa untuk sholat, jangan malah dicuekin', 'Negatif', 'izin mahasiswa sholat jangan malah dicuekin'),
(77, 'Jadwal kuliah terkadang berubah-ubah', 'Negatif', 'jadwal kuliah terkadang ubah'),
(78, 'Mantap jiwa dah Bu wibby ngajar nya ', 'Positif', 'mantap jiwa dah wibby ngajar nya'),
(79, 'Materi yang disampaikan bagus tetapi kurang cara menyampaikannya', 'Negatif', 'materi bagus kurang cara sampai'),
(80, 'Tegas dan memberi inovasi', 'Positif', 'tegas beri inovasi'),
(81, 'Materi yang disampaikan bagus, tetapi cara menyampaikannya kurang', 'Negatif', 'materi bagus cara kurang'),
(82, 'Sangat menyenangkan bisa belajar dengannya', 'Positif', 'sangat senang ajar dengan'),
(83, 'Memberi pelajaran yg baik lagi', 'Positif', 'beri ajar yg baik lagi'),
(84, 'Sangat jelas saat mengajar', 'Positif', 'sangat jelas ajar'),
(85, 'Saya suka proses pembelajarannya', 'Positif', 'suka proses ajar'),
(86, 'Terimakasih sudah mengajar saya dengan baik, sopan, dan cukup jelas.', 'Positif', 'terimakasih ajar baik sopan cukup jelas'),
(87, 'Dosenya baik dan metode pembelajaran yang tidak membosankan', 'Positif', 'dosenbaik metode ajar bosan'),
(88, 'Cara pembelajaran yang unik', 'Positif', 'cara ajar unik'),
(89, 'Singkat padat dan jelas', 'Positif', 'singkat padat jelas'),
(90, 'Kalau menjelaskan rumus sebisa mungkin secara detail, karena untuk mempermudah kami para mahasiswa/i untuk mengerti materi perkuliahan tersebut. Terima kasih', 'Positif', 'kalau jelas rumus mungkin cara detail mudah mahasiswa erti materi kuliah sebut terima kasih'),
(91, 'Saya suka cara mengajar pak aji, selalu mudah di ingat', 'Positif', 'suka cara ajar pak aji selalu mudah ingat'),
(92, 'Cara penyanpaian materi klo bisa harus bisa membuat mahasiswa semangat untuk belajar', 'Positif', 'cara penyanpaian materi klo buat mahasiswa semangat ajar'),
(93, 'Mantap, setelah belajar matkul ini... saya semakin suka dengan pelajaranya', 'Positif', 'mantap ajar matkul makin suka pelajaranya'),
(94, 'Selalu di tunggu pelajaranya, selalu menyenangkan', 'Positif', 'selalu tunggu pelajaranselalu senang'),
(95, 'Cara pembelajaranya yang memuaskan', 'Positif', 'cara pembelajaranmuas'),
(96, 'Mungkin segi kehadiran dengan materi saat ujian', 'Negatif', 'mungkin segi hadir materi uji'),
(97, 'Cobaa memberi materi yang tidak membingungkan', 'Negatif', 'cobaa beri materi bingung'),
(98, 'Jangan terlalu cepat saat memberikan materi', 'Negatif', 'jangan terlalu cepat beri materi'),
(99, 'Tolong penyampaian materi kuliah nya lebih diperjelas lagi, jangan berbicara tentang materi A tapi yang jadi pembahasan malah materi Z. Mahasiswa/i jadi bingung dalam mempelajari mata kuliah ini. Terima kasih', 'Negatif', 'materi kuliah nlebih jelas jangan bicara jabahas malah mahasiswa jabingung ajar mata'),
(100, 'Dosen seperti ini yang saya inginkan di setiap matkul , TOLONG JADIKAN PAK BADRUL DOSEN TETAP DI TIF , KARENA BELIAU BEGITU BAIK DAN SUPPORT AKAN KEGIATAN HIMPUNAN TIF', 'Negatif', 'dosen tiap matkul japak badrul tetap tif beliau begbaik support giat'),
(101, 'Kurang', 'Negatif', 'kurang'),
(102, 'Kurang suka dengan cara bapak mengajar dan menyampaikannya kurang dan interaksi dengan mahasiswa di kelas kurang baik', 'Negatif', 'kurang suka cara bapak ajar interaksi mahasiswa kelas'),
(103, 'JADIKAN PAK BADRUL SEBAGAI PEDOMAN DOSEN DOSEN LAINNYA', 'Positif', 'japak badrul bagai pedoman dosen'),
(104, 'Terlalu cepat menyampaikan materi', 'Negatif', 'terlalu cepat materi'),
(105, 'Secara keselurahan , dosen jarang masuk dan materi tidak tepat pada matkul ini', 'Negatif', 'cara selurah dosen jarang masuk materi tepat matkul ini'),
(106, 'Tugasnya mantap ...pake logika semua', 'Positif', 'tugas mantap palogika semua'),
(107, 'PRAKTEK AJA BISA DIITUNG JARI. Nilai boleh bagus tapi tidak dengan kekampuan kita', 'Negatif', 'praktek aja diitung jari nilai bbagus kekampuan kita'),
(108, 'Praktek yang melenceng', 'Negatif', 'praktek lenceng'),
(109, 'Bagus , tapi kurangi menulis', 'Negatif', 'bagus kurang tulis'),
(110, 'Mohon untuk pengitungan absenya di perbaiki', 'Negatif', 'mohon pengitungan absenbaik'),
(111, 'sangat luar biasa', 'Positif', 'sangat luar biasa'),
(112, 'lumayan', 'Positif', 'lumayan'),
(113, 'alhamdulillah berkah', 'Positif', 'alhamdulillah berkah'),
(114, 'TIDAK MASALAH NILAI PADA MATA KULIAH INI STANDAR,KEDEPANNYA AKAN SAYA TINGKATKAN KEMBALI', 'Positif', 'masalah nilai mata kuliah standar depan tingkat kembali'),
(115, 'Sehat terus pak, kalo bisa kalo bapak gak masuk, adain kelas pengganti', 'Positif', 'sehat terus pak kalo bapak gak masuk adain kelas'),
(116, 'Baik sekali, pak badrul selalu tepat waktu dan sesuai materi', 'Positif', 'baik sekali pak badrul selalu tepat waktu sesuai materi'),
(117, 'Terima kasih atas ilmu yang diajarkan', 'Positif', 'terima kasih atas ilmu ajar'),
(118, 'tingkatkan kualitas', 'Positif', 'tingkat kualitas'),
(119, 'harus jauh lebih baik lagi', 'Negatif', 'jauh lebih baik lagi'),
(120, 'Semoga dapat memberikan inovasi-inovasi dalam mengajar matakuliah ini', 'Positif', 'moga beri inovasi ajar matakuliah ini'),
(121, 'Sangat baik dan tertata rapih dalam pemberian materi', 'Positif', 'sangat baik tata rapih beri materi'),
(122, 'DOSEN INI MENGAJARKAN BAHWA SEBAGAI MAHASISWA TIDAK TERLALU MENAIKKAN STANDAR KUALITAS FORMAL,NAMUN BAGAIMANA CARANYA SEORANG MAHASISWA BISA BERPIKIR KRITIS DAN PEKA TERHADAP LINGKUNGAN SEKITAR', 'Negatif', 'dosen ajar bagai mahasiswa terlalu naik standar kualitas formal bagaimana cara orang pikir kritis peka hadap lingkung'),
(123, 'sangat bermanfaat ilmunya yg diberikan kepada mahasiswanya', 'Positif', 'sangat manfaat ilmu yg beri kemahasiswa'),
(124, 'senang bisa belajar dengan dosen ini', 'Positif', 'senang ajar dosen ini'),
(125, 'Saran agar mencari metode mengajar yg lebih menarik lagi agar mudah di pahami mahasiswa', 'Positif', 'saran cari metode ajar yg lebih tarik mudah paham mahasiswa'),
(126, 'Sudah cukup untuk memberikan materi dalam pembelajaran', 'Positif', 'cukup beri materi ajar'),
(127, 'suka cara mengajarnya', 'Positif', 'suka cara ajar'),
(128, 'Saran untuk mata kuliah ini agar lebih mengeksplor lagi tentang pkn yg sedang terjadi saat ini', 'Negatif', 'saran mata kuliah lebih mengeksplor pkn yg sedang jaini'),
(129, 'Dosen baik dalam pengajaran kurangnya jadwal selesai pengajaran', 'Positif', 'dosen baik ajar kurang jadwal selesai'),
(130, 'Saran saya agar mencari metode mengajar yg lebih mudah di mengerti dan menyenangkan', 'Positif', 'saran cari metode ajar yg lebih mudah erti senang'),
(131, 'Penyampaian materi sangat susah dipahami. Dosen terlalu banyak menceritakan kejadian pribadi dibanding materi yang sedang diajarkan. Slide materi sering dilewati dengan dalih sudah paham yang sebenarnya sama sekali belum dibuka maupun sama sekali tidak paham. Saya merasa dosen tidak memahami materi yang diajarkan. Penulisan bahasa pada soal ujian sangat sulit untuk dipahami, sebab soal yang ditulis hanyalah seluruh judul dan sub-judul pada suatu bab yang ditambahkan \"Jelaskan\" dan \"Apa Itu\".  Saya mohon pahami dengan seksama terlebih dahulu materi yang ingin diajarkan dan cari cara penjelasan yang cukup dimengerti oleh seluruh mahasiswa. Mahasiswa yang masuk ke prodi TIF ini bukan hanya yang', 'Positif', 'materi sangat susah paham dosen terlalu banyak cerita japribabanding sedang ajar slide sering lewat dalih benar sama sekali buka mausama rasa tulis bahasa soal uji sulit seluruh judul sub-judul suatu bab tambah jelas'),
(132, 'Sudah baik dalam mengajari apa yang di ajarkan ke mahasiswa', 'Positif', 'baik ajar apa'),
(134, 'Penyampaian materi yang cukup baik. Dosen sangat paham dengan materi yang ingin disampaikan pada mahasiswa.', 'Positif', 'materi cukup baik dosen sangat paham'),
(135, 'Kurang memberikan waktu untuk memahami praktikum', 'Negatif', 'kurang beri waktu paham praktikum'),
(136, 'Penyampaian materi sangat mudah dipahami, sehingga mahasiswa yang awam benar-benar paham dengan apa yang disampaikan. Dosen yang talkative dan komunikatif sangat membantu mahasiswa.', 'Positif', 'materi sangat mudah paham mahasiswa awam benar apa dosen talkative komunikatif'),
(137, 'Cukup untuk mengajari pembahasan hanya kurangnya detail  dalam mengajar', 'Positif', 'cukup ajar bahas kurang detail'),
(138, 'Terimakasih bu, walaupun di pelajaran ibu kita haru berpikir logika yang kuat', 'Positif', 'terimakasih bu walauajar ibu haru pikir logika kuat'),
(139, 'Saran, agar lebih care dengan mahasiswa dengan metode mengajar yg lebih menarik dan mudah dipahami', 'Positif', 'saran lebih care mahasiswa metode ajar yg tarik mudah'),
(140, 'Kurang  pembahasan praktikum secara detail', 'Negatif', 'kurang bahas praktikum cara detail'),
(141, 'Bagus sekali pelajaran mudah dipahami terimakasih sensei', 'Positif', 'bagus sekali ajar mudah paham terimakasih sensei'),
(142, 'Saran saya dosen harua menggunakan waktu dengan sebaik baik nya', 'Negatif', 'saran dosen harua waktu baik'),
(143, 'Lebih pelan lagi menjelaskan praktiknya', 'Negatif', 'lebih pelan jelas praktik'),
(144, 'Sudah cukup dalam pengajaran', 'Positif', 'cukup ajar'),
(145, 'Walaupun kuliah menarik,  tolong lebih detail menjelaskan terimakasih bu', 'Negatif', 'walaukuliah tarik lebih detail jelas terimakasih bu'),
(146, 'Dosen harus tepat pada waktu jadwal pelajaran', 'Negatif', 'dosen tepat waktu jadwal ajar'),
(147, 'Tolong penyampaiannya materinya lebih interaktif agar mahasiswa tertarik terimakasih bu', 'Positif', 'materi lebih interaktif mahasiswa tarik terimakasih bu'),
(148, 'Lebih aktif lagi dalam menjelaskan terimakasih bu', 'Positif', 'lebih aktif jelas terimakasih bu'),
(149, 'Dosen harus tepat pada waktu pelajaran tiba', 'Positif', 'dosen tepat waktu ajar tiba'),
(150, 'Pembahasan kurang untuk di pahami ke mahasiswa', 'Negatif', 'bahas kurang paham mahasiswa'),
(151, 'Agar lebih pelan dalam menjelaskan dan jelaskan sedetail detailnya dalam materi', 'Negatif', 'lebih pelan jelas detail'),
(152, 'Walaupun materi telah disiaplan dengan matang, agar lebih interaktif terhadap siswanya terimakasih pak', 'Positif', 'walaumateri disiaplan matang lebih interaktif hadap siswa terimakasih pak'),
(153, 'Terimakasih bu,  tapi lebih sering hadir lagi agar ada interaksi antar dosen dan muridnya', 'Positif', 'terimakasih bu lebih sering hadir interaksi antar dosen murid'),
(154, 'Kurang waktu dalam praktik pengajaran belajar mahasiswa', 'Negatif', 'kurang waktu praktik ajar'),
(155, 'Cukup dalam pemahaman', 'Positif', 'cukup paham'),
(156, 'Semoga bapak bisa meningkatkan lagi cara mengajarnya', 'Positif', 'moga bapak tingkat cara ajar'),
(157, 'Cara mengajarnya ineraktif dan mudah di mengerti', 'Positif', 'cara ajar ineraktif mudah erti'),
(158, 'Cara bapak mengajar sudah baik, alangkah baiknya bapak jangan sering telat Terimakasih untuk ilmunya', 'Negatif', 'cara bapak ajar baik alangbaik jangan sering telat terimakasih'),
(159, 'Semoga di tingkatkan lagi cara mengajarnya', 'Negatif', 'moga tingkat cara ajar'),
(160, 'Dosen favorit', 'Positif', 'dosen favorit'),
(161, 'Dosen sangat tegas dan baik sehingga mahasiswa dapat mengerti dan dapat cepat tanggapan terhadap pelajaran', 'Positif', 'dosen sangat tegas baik mahasiswa erti cepat tanggap hadap ajar'),
(162, 'PERLU PERBAIKAN DARI PENYAMPAIAN MATERI,TERKADANG SUKA GAGAL PAHAM', 'Negatif', 'perlu baik materi terkadang suka gagal paham'),
(163, 'DARI PENYAMPAIAN MATERI BELIAU,KADANG SUKA GAGAL PAHAM.SEKIAN', 'Negatif', 'materi beliau kadang suka gagal paham sekian'),
(164, 'MESKIPUN MASIH BANYAK YANG HARUS DIPERBAIKI,SECARA KESELURUHAN MEMANG DOSEN YANG BERSANGKUTAN KURANG PEKA TERHADAP MAHASISWA', 'Negatif', 'meski banyak baik cara seluruh memang dosen sangkut kurang peka hadap mahasiswa'),
(165, 'KELEBIHAN UTAMA DOSEN PADA MATA KULIAH INI ADALAH MENGAJAR YANG SESUAI BIDANGNYA.PROFESIONALITAS,KEJUJURAN SANGAN DIUTAMAKAN PADA SETIAP PERTAMUAN DOSEN YANG BERSANGKUTAN', 'Positif', 'lebih utama dosen mata kuliah ajar sesuai bidang profesionalitas jujur sangan tiap tamu'),
(166, 'HANYA MASALAH WAKTU PERTEMUAN YANG SERING TELAT DAN KABAR KETIKA DOSEN YANG BERSANGKUTAN TIDAK MASUK DADAKAN SEPERTI TAHU BULAT', 'Negatif', 'masalah waktu temu sering telat kabar dosen sangkut masuk dtahu bulat'),
(167, 'DOSEN MUDA YANG MENGERTI KEBUTUHAN MAHASISWA,HANYA PERLU PENYAMPAIAN MATERI LEBIH DETAIL KARENA SOAL UJIAN MATA KULIAH BELIAU BANYAK ISTILAH-ISTILAH YANG BELUM SEMPAT BELIAU JELASKAN', 'Negatif', 'dosen muda erti butuh mahasiswa perlu materi lebih detail soal uji mata kuliah beliau banyak istilah sempat'),
(168, 'KEDEPANNYA,DIPERBAIKI KEMBALI CARA MENGAJARNYA.KARENA BUAT MAHASISWA YANG AGAK LAMA MENYERAP ILMU YANG DIAJARKAN SUKA GAGAL PAHAM', 'Negatif', 'depan baik cara ajar buat mahasiswa lama serap ilmu suka gagal'),
(169, 'Pertahankan gaya mengajar seperti ini pak', 'Positif', 'tahan gaajar pak'),
(170, 'terimakasih sebelumnya dan pertahankan cara mengajar seperti ini', 'Positif', 'terimakasih tahan cara ajar ini'),
(171, 'cukup sajalah', 'Positif', 'cukup saja'),
(172, 'bisa leih baik lagii', 'Negatif', 'leih baik lagi'),
(174, 'Lebih giat lagi bu', 'Negatif', 'lebih giat bu'),
(175, 'Dosen nya sangat baik', 'Positif', 'dosen nsangat baik'),
(176, 'Baik dalam menyampaikan materi pembelajaran', 'Positif', 'baik materi ajar'),
(177, 'lebih ditingkatkan lagi', 'Negatif', 'lebih tingkat lagi'),
(178, 'tidak ada saran dan kritik, sudah bagus', 'Positif', 'saran kritik bagus'),
(179, 'Dosen harus datang tepat waktu', 'Negatif', 'dosen datang tepat waktu'),
(180, 'mengasi soal ujian yang jawabannya banyak, waktu selalu tidak cukup', 'Negatif', 'asi soal uji jawab banyak waktu selalu cukup'),
(181, 'harus lebih interaktif kepada mahasiswa', 'Negatif', 'lebih interaktif kemahasiswa'),
(182, 'Jadi Dosen Harus profesional, punya masalah dikelas lain atau masalah keluarga jangan dibawa kekelas Malam A', 'Negatif', 'jadosen profesional punmasalah kelas masalah keluarga jangan bawa malam'),
(183, 'matakuliahnya Sistem Operasi yang diajarin Malah Bikin Website dilinux, Tidak sesuai dengan mata kuliah', 'Negatif', 'matakuliahnsistem operasi diajarin malah bikin website dilinux sesuai mata kuliah'),
(184, 'bijak dalam mengabsensi pak', 'Negatif', 'bijak absensi pak'),
(185, 'kedepannya lebih ditingkatkan lagi dalam hal pendekatan terhadap mahasiswa dan memberi materi yang cocok dengan kemampuan mahasiswa.', 'Negatif', 'depan lebih tingkat dekat hadap mahasiswa beri materi cocmampu'),
(186, 'Sangat baik dan saling berinteraksi ketika mengajar, jadi membuat mahasiswa lebih aktif. Terima Kasi pak', 'Positif', 'sangat baik saling interaksi ajar jabuat mahasiswa lebih aktif terima kasi pak'),
(187, 'Dosen idaman membuat mahasiswa menjadi semangat dan aktif ketika dikelas. Terima kasih pak', 'Positif', 'dosen idam buat mahasiswa jasemangat aktif kelas terima kasih pak'),
(188, 'TOP dosenya diajarin sampe bisa', 'Positif', 'top dosendiajarin sampe bisa'),
(189, 'Manteb konsul PBO diajarin sampe paham', 'Positif', 'manteb konsul pbo diajarin sampe paham'),
(190, 'Dari kesalahan yang ada saya menjadi belajar bahwa ketika salah harus bangkit. Terima kasih pak', 'Positif', 'salah jaajar bangkit terima kasih'),
(191, 'kedepannya lebih ditingkatkan lagi dalam hal pendekatan terhadap mahasiswa/memberi pelajaran dan memberi materi yang cocok dengan kemampuan mahasiswa.', 'Negatif', 'depan lebih tingkat dekat hadap mahasiswa beri ajar materi'),
(192, 'Dari bapak saya belajar arti kesabaran menunggu bapak datang ke kelas, selain itu juga saya mengucapkan banyak terima kasih ilmu yang di berikan oleh bapak. sukse selalu pak', 'Positif', 'bapak ajar arti sabar tunggu datang kelas seucap banyak terima kasih ilmu ikan sukse'),
(193, 'Dari ibu saya belajar fokus dan serius untuk memeahkan masalah. terima kasih ibu', 'Positif', 'ibu ajar fokus serius memeahkan masalah terima kasih'),
(194, 'penyampaian dan arahan materi jelas', 'Positif', 'arah materi jelas'),
(195, 'Disiplin dalam penyampaian materi', 'Positif', 'disiplin materi'),
(196, 'Cara mengajar dosen bagus, menarik', 'Positif', 'cara ajar dosen bagus tarik'),
(197, 'Cara mengajar dosen mudah dipahami', 'Positif', 'cara ajar dosen mudah paham'),
(198, 'Dosen sangat membantu mahasiswa belajar, pembelajarannya sangat menarik, mudah dimenngerti', 'Positif', 'dosen sangat bantu mahasiswa ajar tarik'),
(199, 'suasana kegiatan belajar terlihat kaku, lebih mencairkan suasana', 'Negatif', 'suasana giat ajar lihat kaku lebih cair'),
(200, 'saya merasa puas dengan sitem mengajarnnya', 'Positif', 'rasa puas sitem mengajarnnya'),
(201, 'Sensei kenny sudah sangat baik dalam hal mengajar nya dan kedekatannya dengan mahasiswa/i nya juga sangat baik. Oleh karena itu menurut saya , pertahankan cara mengajar ibu yg seperti ini dan terimakasih atas semua ilmu yg telah ibu berikan kepada saya', 'Positif', 'sensei kenny sangat baik ajar ndekat mahasiswa nsangat turut tahan cara ibu yg terimakasih atas semua ilmu'),
(202, 'Dosen sangat menarik, cara mengajar unik, mudah dipahami oleh mahasiswa, untuk kedepannya agar lebih mantap lagi', 'Positif', 'dosen sangat tarik cara ajar unik mudah paham mahasiswa depan lebih mantap lagi'),
(203, 'cara mengajar baik, mudah dimengerti oleh mahasiswa', 'Positif', 'cara ajar baik mudah erti mahasiswa'),
(204, 'Pengajarannya sangat sesuai dgn kriteria', 'Positif', 'ajar sangat sesuai dgn kriteria'),
(205, 'Tapi kebnyakan tugas pusing', 'Negatif', 'kebnytugas pusing'),
(206, 'Absen dikorupsi saya dateng dan hadir terus dalam perkuliaahaan dianggap tidak hadir absen uas pun juga', 'Negatif', 'absen korupsi dateng hadir terus perkuliaahaan anggap'),
(207, 'semoga kedepannya lebih baik lagi', 'Negatif', 'moga depan lebih baik lagi'),
(208, 'Bagus dalam cara mengajarnya', 'Positif', 'bagus cara ajar'),
(209, 'Mengajarnya yang mengasyikan', 'Positif', 'ajar asyik'),
(210, 'semoga ilmu yang bapak kasih dapet saya pergunakan dengan baik', 'Positif', 'moga ilmu bapak kasih dapet baik'),
(211, 'semoga ilmu yang di berikan dapat di gunakan dengan baik', 'Positif', 'moga ilmu ikan baik'),
(212, 'bahagialah anda mempunyai catatan lengkap', 'Positif', 'bahagpuncatat lengkap'),
(213, 'Tidak ada karena dosen mengajar sesuai dengan yang diharapkan', 'Positif', 'dosen ajar sesuai harap'),
(214, 'trimakasih banyak sensei atas 1 smsternya. mohon maaf bila selama dalam pelajaran ada perbuatan/tingkah laku yang tidak sopan.', 'Positif', 'trimakasih banyak sensei atas smsternmohon maaf bila lama ajar buat tinglaku sopan'),
(215, 'dosennya kurang dalam mengajar', 'Negatif', 'dosen kurang ajar'),
(216, 'Terimakasih pak/bu atas ilmu dan nasihat yang telah di berikan kepada kami', 'Positif', 'terimakasih pak bu atas ilmu nasihat ikan kekami'),
(217, 'pengajarannya baik dan efektif, semoga kedepannya akan menjadi lebih baik lagi.', 'Positif', 'ajar baik efektif moga depan jalebih'),
(218, 'Terimakasih pak/bu atas ilmu dan nasihat yang telah di berikan kepada saya', 'Positif', 'terimakasih pak bu atas ilmu nasihat ikan kesaya'),
(219, 'Penyajian bahan kuliah kurang', 'Negatif', 'saji bahan kuliah kurang'),
(220, 'Tolong di perbaiki cara mengajarnya pak', 'Negatif', 'baik cara ajar pak'),
(221, 'Dosen kurang menggunakan waktu', 'Negatif', 'dosen kurang waktu'),
(222, 'Lain kali jika ingin menggabungkan dua matkul sekaligus harus memanfaatkan waktu sebaik baiknya', 'Negatif', 'kali gabung matkul sekaligus manfaat waktu baik'),
(223, 'Ditingkatkan kembali cara mengajarnya sudah bagus dan koperatif sekali terimakasih', 'Negatif', 'tingkat cara ajar bagus koperatif sekali terimakasih'),
(224, 'Dosen sudah cukup baik dan perlu ditingkatkan kembali cara mengajarnya', 'Positif', 'dosen cukup baik perlu tingkat cara ajar'),
(225, 'semuanya baik, ilmu yang di berikan sangat bermanfaat.', 'Positif', 'semua baik ilmu ikan sangat manfaat'),
(226, 'Dosen sudah cukup baik tetapi masih kurang sekali pertemuan di mata kuliah ini dan perlu ditingkatkan kembali cara mengajarnya terimakasih', 'Positif', 'dosen cukup baik kurang sekali temu mata kuliah perlu tingkat cara ajar terimakasih'),
(227, 'Dosen sudah cukup baik dan perlu ditingkatkan kembali cara mengajarnya terimakasih', 'Positif', 'dosen cukup baik perlu tingkat cara ajar terimakasih'),
(228, 'Terimakasih atas ilmu pengetahuan yang diberikan', 'Positif', 'terimakasih atas ilmu tahu beri'),
(229, 'Cara mengajar kurang jelas, mohon di perjelas lagi', 'Negatif', 'cara ajar kurang jelas mohon'),
(230, 'cukup baik hanya terlalu menegangkan belajarnya', 'Positif', 'cukup baik terlalu tegang ajar'),
(231, 'baik sangat bertanggung jawab', 'Positif', 'baik sangat tanggung jawab'),
(232, 'Ditingkatkan lagi', 'Negatif', 'tingkat lagi'),
(233, 'Sesuai ketentuan yang berlaku', 'Positif', 'sesuai laku'),
(234, 'Dosen bagus.kita harus berpikir secara keritis', 'Positif', 'dosen bagus pikir cara kerit'),
(235, 'Penjelasannya kurang', 'Negatif', 'jelas kurang'),
(236, 'Cukup penjelasannya', 'Positif', 'cukup jelas'),
(237, 'Sehat terus pak, kalo bisa jangan dikasih tugas nulis alquran 3 buku lagi', 'Negatif', 'sehat terus pak kalo jangan kasih tugas nulis alquran buku lagi'),
(238, 'terimakasih atas kritikan bapak tehadap saya dalam presentasi dan dalam mengkritisi sebuah masalah yang ada dalam makalah. saya jadi belajar banyak', 'Positif', 'terimakasih atas kritik bapak tehadap presentasi kritisi buah masalah makalah jaajar banyak'),
(239, 'terimakasih sense saya jadi tahu bahasa jepang dan mulai menyukai sedikit tentang bahasa tersebut', 'Positif', 'terimakasih sense jatahu bahasa jepang mulai suka sedikit'),
(240, 'Baik, ajarkan cara menulis bahasa Jepang pak', 'Positif', 'baik ajar cara tulis bahasa jepang pak'),
(241, 'Saran, kalau bapak ingin mahasiswa nya lebih dari bapak. Minimal, pas bapak ngasih materi atau presantasi di depan, bapak jangan melihat power pointnya terus.', 'Negatif', 'saran kalau bapak mahasiswa nlebih minimal pas ngasih materi presantasi depan jangan lihat'),
(242, 'Semoga bapak tidak telat kembali', 'Negatif', 'moga bapak telat kembali'),
(243, 'kritik : jangan baper di kelas udah gede masa baper', 'Negatif', 'kritik jangan baper kelas udah gede masa'),
(244, 'kritik : bisa gagah sedikit lagi terus canda nya kurangin waktu terangin ', 'Negatif', 'kritik gagah sedikit terus cnrangin waktu angin'),
(245, 'kritik : jangan di bawa serius2 banget waktu terangin kasih candaan sedikit lah buat mahasiswa nya biar ga bete', 'Negatif', 'kritik jangan bawa serius banget waktu angin kasih csedikit lah buat mahasiswa nbiar ga bete'),
(246, 'kritik : ngasih tugas jangan susah banget buat print butuh biaya yg mahal', 'Negatif', 'kritik ngasih tugas jangan susah banget buat print butuh biayg mahal'),
(247, 'kritik :waktu matkul mulai jangan ke biasain main game di kelas', 'Negatif', 'kritik waktu matkul mulai jangan biasain main game kelas'),
(248, 'saran : ibu baik dan suka bercanda tapi bolleh bawa kopi kan di kelas', 'Positif', 'saran ibu baik suka cbolleh bawa kopi kan kelas'),
(249, 'Baik Banget', 'Positif', 'baik banget'),
(250, 'Lumayan lah', 'Positif', 'lumayan lah'),
(251, 'Beli E-Book terus', 'Negatif', 'beli e-boterus'),
(252, 'Jika ada yang izin shalat maka harusnya diizinkan', 'Negatif', 'izin shalat'),
(253, 'Saya tidak punya saran untuk ibu, semoga ibu cepat sembuh dan diangkat penyakit nya', 'Positif', 'punsaran ibu moga cepat sembuh angkat sakit'),
(254, 'Semoga bapak di beri kesehatan selalu', 'Positif', 'moga bapak beri sehat selalu'),
(255, 'Kalau ngasih soal ulangan jangan banyak2 bu', 'Negatif', 'kalau ngasih soal ulang jangan banyak bu'),
(256, 'Bu dona ngajar praktek multimedia kaya ada yg kurang', 'Negatif', 'bu dona ngajar praktek multimekayg kurang'),
(257, 'Tolong bu kalo ngasih tugas, dijelasin dulu gimana cara buatnya dan materinya yg lengkap', 'Negatif', 'bu kalo ngasih tugas dijelasin dulu gimana cara buat materi yg lengkap'),
(258, 'terlalu singkat waktu untuk belajar prakteknya', 'Negatif', 'terlalu singkat waktu ajar praktek'),
(259, 'Pelan pelan bu ngajarnya hehe, Aplagi untung anak yg malem kan ada yg kerja jdi rada wajar klo jepang kurng hehe', 'Negatif', 'pelan bu ngajarnhehe apuntung anak yg malem kan kerja jrwajar klo jepang'),
(260, 'Tugas saya ngerjain semu knapa 78 pak hehe', 'Negatif', 'tugas ngerjain semu knapa pak hehe'),
(261, 'Saran saya materinya banykin lagi pak hehe', 'Negatif', 'saran materi banykin pak hehe'),
(262, 'Klo bisa datang jangan kemaleman pak, kan kami ada yg kerja juga heheh', 'Negatif', 'klo datang jangan maleman pak kan yg kerja heheh'),
(263, 'Ngajarnya jangan ngebut banget bu ehheh, suka ketinggalan paham nya saya', 'Negatif', 'ngajarnjangan ngebut banget bu ehheh suka tinggal paham nsaya'),
(264, 'Keren', 'Positif', 'keren'),
(265, 'Dateng nya jangan telat mulu pak heheh', 'Negatif', 'dateng njangan telat mulu pak heheh'),
(266, 'terimakasih atas pelajaran dan waktunya', 'Positif', 'terimakasih atas ajar waktu'),
(267, 'Dengan menjelaskan sejarah sampai detail saat pangajarannya itu bagus sekali', 'Positif', 'jelas sejarah detail pangajarannbagus sekali'),
(268, 'Dosen cukup baik dalam mengajar', 'Positif', 'dosen cukup baik ajar'),
(269, 'Mohon maaf pak saya hanya ingin memberi saran supaya tidak telat saat kelas bapak dimulai, soalnya kasihan kami yang sudah datang di awal jam tetapi kelas masih belum dimulai dan terpaksa menunggu di lorong', 'Negatif', 'mohon maaf pak beri saran telat kelas bapak mulai soal kasihan datang awal jam paksa'),
(270, 'Dosen yang selalu tepat waktu', 'Positif', 'dosen selalu tepat waktu'),
(271, 'Baik dalam menjalankan tugas nya', 'Positif', 'baik jalan tugas nya'),
(272, 'cara mangajarnya sangat bagus, dengan tempo yang tidak terlalu terburu - buru itu sangan membantu mahasiswa yang belum bisa berbahasa jepang', 'Positif', 'cara mangajarnsangat bagus tempo terlalu buru sangan bantu mahasiswa bahasa'),
(273, 'Mohon maaf bu saya hanya ingin memberi saran supaya ibu tidak telat saat mangajar di kelas ibu, karena dari waktu yg kosong itu ibu bisa lebih menjelaskan materi dan memberi contoh-contoh soal kepada mahasiswa supaya kita lebih mengerti lagi dengan materinya', 'Negatif', 'mohon maaf bu beri saran ibu telat mangajar kelas waktu yg kosong lebih jelas materi'),
(274, 'Terima Kasih Pak telah memberikan saya ilmu yang bermanfaat dan bukan sekedar nilai', 'Positif', 'terima kasih pak beri ilmu manfaat bukan dar nilai'),
(275, 'Semoga kedepannya bisa lebih baik lagi dalam pengajarannya dan semakin menarik', 'Positif', 'moga depan lebih baik ajar makin tarik'),
(276, 'Baik dalam melakukan pembelajaran', 'Positif', 'baik laku ajar'),
(277, 'Materi yang disampaikan dengan baik dan mudah dipahami. Namun metodenya agak membuat ngantuk', 'Positif', 'materi baik mudah paham metode buat ngantuk'),
(278, 'Penyampaian materi mudah dimengerti.', 'Positif', 'materi mudah erti'),
(279, 'dosen yang baik dalam penyampaiannya', 'Positif', 'dosen baik sampai'),
(280, 'dosen yang pengertian dengan mahasiswa', 'Positif', 'dosen erti mahasiswa'),
(281, 'kurang jelas saat mengajar dan absen', 'Negatif', 'kurang jelas ajar absen'),
(282, 'Mengajar nya baik', 'Positif', 'ajar nbaik'),
(283, 'terimakasih pak untuk pengajarannya', 'Positif', 'terimakasih pak ajar'),
(284, 'Bisa lebih baik', 'Positif', 'lebih baik'),
(285, 'Pengajaran baik', 'Positif', 'ajar baik'),
(286, 'porno', 'Negatif', ''),
(287, 'teroris', 'Negatif', ''),
(288, 'sesat', 'Negatif', ''),
(289, 'leceh', 'Negatif', ''),
(290, 'hina', 'Negatif', ''),
(291, 'hina', 'Negatif', ''),
(292, 'kalah', 'Negatif', ''),
(293, 'nista', 'Negatif', ''),
(294, 'pelecehan', 'Negatif', 'leceh'),
(295, 'palsu', 'Negatif', 'palsu');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengujian`
--

CREATE TABLE `tb_pengujian` (
  `id_pengujian` varchar(10) NOT NULL,
  `tgl` varchar(20) NOT NULL,
  `jam` varchar(10) NOT NULL,
  `komentar` varchar(200) NOT NULL,
  `penilaian` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengujian`
--

INSERT INTO `tb_pengujian` (`id_pengujian`, `tgl`, `jam`, `komentar`, `penilaian`, `keterangan`) VALUES
('KP01905001', '2019-05-21', '16:54:20', 'Kenapa pusing ....', 'Positif', '-'),
('KP01905002', '2019-05-22', '15:29:25', 'lapar', 'Positif', '-'),
('KP01905003', '2019-06-24', '14:01:54', 'saya malas', 'Negatif', '-'),
('KP01906001', '2019-06-22', '09:55:56', 'saya pusing', 'Positif', '-'),
('KP01906002', '2019-06-22', '15:22:39', 'Ika cantik sekali', 'Positif', '-'),
('KP01906003', '2019-06-24', '13:56:53', 'abur item', 'Positif', '-'),
('KP01906004', '2019-06-24', '17:24:18', 'kurang jelas saat mengajar', 'Positif', '-'),
('KP01906005', '2019-06-24', '18:38:17', 'dosen nya galak', 'Positif', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(10) NOT NULL,
  `nama_user` varchar(40) NOT NULL,
  `tlp_user` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `tlp_user`, `email`, `username`, `password`) VALUES
('USR01', 'Admin1', '0865677567', 'admin@gmail.com', 'a', 'a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ak_angket`
--
ALTER TABLE `ak_angket`
  ADD PRIMARY KEY (`idangket`),
  ADD UNIQUE KEY `idangket` (`idangket`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_pengujian`
--
ALTER TABLE `tb_pengujian`
  ADD PRIMARY KEY (`id_pengujian`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ak_angket`
--
ALTER TABLE `ak_angket`
  MODIFY `idangket` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2323350;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=296;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

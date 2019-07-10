-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2019 at 10:23 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sentimen_analis`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE IF NOT EXISTS `tb_kategori` (
`id_kategori` int(8) NOT NULL,
  `kalimat` varchar(700) NOT NULL,
  `kategori` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=286 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `kalimat`, `kategori`) VALUES
(1, 'makan', 'Positif'),
(2, 'minum', 'Positif'),
(3, 'hutang', 'Negatif'),
(4, 'malas', 'Negatif'),
(5, 'sangat senang di ajarin dengan pa Verdy', 'Positif'),
(6, 'cukup baik untuk mengajar, terima kasih pa sumarsono', 'Positif'),
(7, 'pa verdy sangat baik terimakasih', 'Positif'),
(8, 'Materi yg diajarkan mudah dipahami', 'Positif'),
(9, 'Tingkatkan lagi penyajian dalam memberikan materi kepada para mahasiswa', 'Positif'),
(10, 'semoga bisa lebih baik lagi dalemm mengasih materi nya', 'Positif'),
(11, 'lebih rajin ajak masuk nya', 'Positif'),
(12, 'Baik', 'Positif'),
(13, 'saran aja buat di teknik apalagi anak muda Zaman sekarang klo belajar pemerintahan agak kurang, tapi untuk mendengarkan dari sebuah cerita mereka masih tertarik, saat penyampain materi diselingi cerita atau pengalaman. mereka lebih mudah memahaminya', 'Positif'),
(14, 'mungkin untuk teori masih bisa di baca dibuku atau media manapun, untuk pembahasan soal yang masih susah dicari, saran aja sih saat pemberian materi lebih sering bahas soal dan latihan aja. dan pemberian tugas individu untuk latihan dirumah.', 'Negatif'),
(15, 'bagus, saran aja sih kedepannya banyak cerita tentang implementasi ADBO dalam kehidupan, agar lebih mudah dipahami dalam penerapannya.', 'Negatif'),
(16, 'saran aja sih, kedepannya sering latihan analisis dari studi kasusnya', 'Negatif'),
(17, 'saran aja sih mungkin kedepannya Sistem operasi bisa mempelajari kelemahan system, dan pencarian celah serta cara penanganan dari serangan orang jahat', 'Negatif'),
(18, '', 'Negatif'),
(19, 'secara teori mungkin saya kurang mengerti, secara praktek mungkin saya mengerti gambarannya. pemberian materi dari awal langsung menggunakan studi kasus, saya pikir itu bagus membuat pola pikir saya sedikit berubah. tapi saran aja sih kedepannya, teori yg paling umum disampaikan dahulu mungkin 2 pertemuan pertama.', 'Negatif'),
(20, 'Semua sesuai', 'Positif'),
(21, 'Bagus dan baik', 'Positif'),
(22, 'Ilmu yang di berikan sangat bermanfaat untuk anak murid', 'Positif'),
(23, 'Sering datang terlambat', 'Positif'),
(24, 'Cukup', 'Negatif'),
(25, 'Penyajian terlalu cepat', 'Positif'),
(26, 'mantap pak,lanjutkan', 'Positif'),
(27, 'Ketepatan waktu tolong lebih di perhatikan', 'Positif'),
(28, 'Cara mengajar baik tapi kurang kurang"in telatnya, dosen setiap kali mengajar selalu telat, dan telatnya keterlaluan', 'Negatif'),
(29, 'Sangat baik, ketepatan waktu juga sangat baik dan penyajian atau cara penyampaiannya baik', 'Negatif'),
(30, 'Baik dalam ilmu pengetahuan, dan softskill dosen sangat baik. Dan baik dalam membantu nilai maupun skill mahasiswa', 'Positif'),
(31, 'Buat mata kuliah lebih menarik agar mahasiswa tidak bosan dengan materi yang ibu sampaikan', 'Positif'),
(32, 'Untuk materi penyampaian sangat baik akan tetapi jangan terlalu sering diktat foto copyan dengan membayar dan selama 2 kali pembayaran uts dan uas. Mudah di mengerti saat menjelaskan ', 'Positif'),
(33, 'Terimakasih selama 1 semester ini bu', 'Negatif'),
(34, 'Mudah di mengerti untuk proses pembelajaran bahan sesuai dengan materi yang di berikan saat ujian', 'Positif'),
(35, 'Mudah di mengerti saat mengajar dan menjelaskan dosen bisa di ajak berkomunikasi melalui via wa ', 'Positif'),
(36, 'Tolong di perbaiki cara mengajarnya pak.', 'Positif'),
(37, 'Sangat bermanfaat ilmu yang di kasih untuk dunia kerja atau perkuliahan. Materi mudah di mengerti dengan penjelasan yang sangat rinci. ', 'Negatif'),
(38, 'Dosen mendiskusikan silabus dengan mahasiswa', 'Positif'),
(39, 'Baik sekali. Untuk kedepannya materi yang di kasih ke mahasiswa harus ada 2 bahasa. Yaitu bahasa Indonesia dan bahasa Inggris. Jadi yang untuk tidak mengerti bahasa Inggris, maka mahasiswa membaca materi yang bahasa Indonesia. Dan untuk pembelajarannya sangat baik.', 'Positif'),
(40, 'Dosen terbaik dan terasik saat belajar', 'Positif'),
(41, 'Perjelas dalam mengajar', 'Positif'),
(42, 'Dosen terasik dan terbaik', 'Positif'),
(43, 'Pertahankan gaya ngajar seperti ini pak', 'Positif'),
(44, 'Saya sulit mengerti dengan pelajaran ibu , mudah2an kedepannya ibu bisa mengajarkan kepada mahasiswa dengan logika yang gampang di cerna mahasiswa tersebut.', 'Negatif'),
(45, 'Sama kan materi teori dan praktek', 'Negatif'),
(46, 'Panutan saya', 'Positif'),
(47, 'Sensei mengajar dengan baik, semoga sensei tidak merubah cara mengajar sensei.', 'Positif'),
(48, 'Lebih tepat waktu disaat pelajaran dimulai', 'Negatif'),
(49, 'Tolong penyampaian materi di perbagus lagi pa', 'Negatif'),
(50, 'Sudah bagus dalam memberikan materi', 'Positif'),
(51, 'Absen saya kenapa bukan 100% pak T_T', 'Negatif'),
(52, 'semoga dalam mengajar menjadi lebih baik', 'Positif'),
(53, 'Sangat baik dalam membimbing proses belajar', 'Positif'),
(54, 'tolong pak jangan dikit dikit uang terus buat ngeprint atau beli modul fotocopyan hasil print file ppt. lebih baik kasih pptnya langsung, sayang duit pak anak malam rata2 kerja buat bayar kuliah sendiri: ")) dan kalau waktu mengajar sudah selesai tolong jangan dilama2in pak masa kita gabisa sholat, pas mau izin sholat malah dicuekin.', 'Negatif'),
(55, 'Tolong ajarkan cara menulis jepang', 'Negatif'),
(56, 'Materinya sedikit sulit tetapi sangat melatih daya pikir', 'Positif'),
(57, 'Kurangnya dosen dalam membantu mahasiswa, tetapi membuat mahasiswa ingin mencari tau sendiri', 'Negatif'),
(58, 'kadang cara penyampaiannya kurang saya mengerti pak, yg rata2 mengerti hanya yg sudah berpengalaman atau bekerja dibidang IT sedangkan kami yg masih noob dan bekerja belum sesuai bidang masih suka bingung dengan pembahasannya. sarannya mungkin saat menjelaskan lebih ke contoh umum pak(?)', 'Positif'),
(59, 'mantab betul si bapak kalau mengajar mudah dimengerti, kalau tidak mengerti langsung diajarin sampe akar akar.', 'Positif'),
(60, 'Harap memberikan nilai yang cukup dan sesuai', 'Negatif'),
(61, 'kalau mengajar sangat asik pak, hanya saja waktu belajar sering tidak sesuai karena bapak sering kemacetan juga kan naik mobil. sarannya mohon langsung kabarin salah satu mahasiswa dikelas kalau kiranya telat pak kasian mahasiswanya digantungin nunggu kepastian', 'Positif'),
(62, 'Terimakasih atas pengetahuan yang diberikan', 'Positif'),
(63, 'mantab bu, penyampaiannya mudah, asik dan ga tegang. jadi no kritik saya', 'Positif'),
(64, 'Agar lebih diperjelas dalam memberikan penjelasan terhadap mahasiswa yang belum paham', 'Negatif'),
(65, 'kalau untuk teori saya masih kurang mengerti pak saat menjelaskan terlalu berbelit tapi untuk prekteknya mantab betul pak', 'Negatif'),
(66, 'Sangat menyenangkam bisa di ajar oleh beliau.', 'Positif'),
(67, 'Terimakasih atas pemberian pengetahuan yang diberikan', 'Positif'),
(68, 'Kurang disiplin', 'Negatif'),
(69, 'Bagus, dosennya baik dan telaten', 'Positif'),
(70, 'Leluasa berfikir', 'Positif'),
(71, 'Kurangnya dalam membantu mahasiswa', 'Negatif'),
(72, 'Materi yang disampaikan sudah bagus tetapi kurang penjelasan dari dosen', 'Negatif'),
(73, 'Sangat baik dalam pemberian materi', 'Positif'),
(74, 'Makasih ibu paling penyabar kalo ngajar nya', 'Positif'),
(75, 'Enak  belajar  dengan bapak melatih wawasan politik yg sehat', 'Positif'),
(76, 'Izinkan mahasiswa untuk sholat, jangan malah dicuekin', 'Negatif'),
(77, 'Jadwal kuliah terkadang berubah-ubah', 'Negatif'),
(78, 'Mantap jiwa dah Bu wibby ngajar nya ', 'Positif'),
(79, 'Materi yang disampaikan bagus tetapi kurang cara menyampaikannya', 'Negatif'),
(80, 'Tegas dan memberi inovasi', 'Positif'),
(81, 'Materi yang disampaikan bagus, tetapi cara menyampaikannya kurang', 'Negatif'),
(82, 'Sangat menyenangkan bisa belajar dengannya', 'Positif'),
(83, 'Memberi pelajaran yg baik lagi', 'Positif'),
(84, 'Sangat jelas saat mengajar', 'Positif'),
(85, 'Saya suka proses pembelajarannya', 'Positif'),
(86, 'Terimakasih sudah mengajar saya dengan baik, sopan, dan cukup jelas.', 'Positif'),
(87, 'Dosenya baik dan metode pembelajaran yang tidak membosankan', 'Positif'),
(88, 'Cara pembelajaran yang unik', 'Positif'),
(89, 'Singkat padat dan jelas', 'Positif'),
(90, 'Kalau menjelaskan rumus sebisa mungkin secara detail, karena untuk mempermudah kami para mahasiswa/i untuk mengerti materi perkuliahan tersebut. Terima kasih', 'Positif'),
(91, 'Saya suka cara mengajar pak aji, selalu mudah di ingat', 'Positif'),
(92, 'Cara penyanpaian materi klo bisa harus bisa membuat mahasiswa semangat untuk belajar', 'Positif'),
(93, 'Mantap, setelah belajar matkul ini... saya semakin suka dengan pelajaranya', 'Positif'),
(94, 'Selalu di tunggu pelajaranya, selalu menyenangkan', 'Positif'),
(95, 'Cara pembelajaranya yang memuaskan', 'Positif'),
(96, 'Mungkin segi kehadiran dengan materi saat ujian', 'Negatif'),
(97, 'Cobaa memberi materi yang tidak membingungkan', 'Negatif'),
(98, 'Jangan terlalu cepat saat memberikan materi', 'Negatif'),
(99, 'Tolong penyampaian materi kuliah nya lebih diperjelas lagi, jangan berbicara tentang materi A tapi yang jadi pembahasan malah materi Z. Mahasiswa/i jadi bingung dalam mempelajari mata kuliah ini. Terima kasih', 'Negatif'),
(100, 'Dosen seperti ini yang saya inginkan di setiap matkul , TOLONG JADIKAN PAK BADRUL DOSEN TETAP DI TIF , KARENA BELIAU BEGITU BAIK DAN SUPPORT AKAN KEGIATAN HIMPUNAN TIF', 'Negatif'),
(101, 'Kurang', 'Negatif'),
(102, 'Kurang suka dengan cara bapak mengajar dan menyampaikannya kurang dan interaksi dengan mahasiswa di kelas kurang baik', 'Negatif'),
(103, 'JADIKAN PAK BADRUL SEBAGAI PEDOMAN DOSEN DOSEN LAINNYA', 'Positif'),
(104, 'Terlalu cepat menyampaikan materi', 'Negatif'),
(105, 'Secara keselurahan , dosen jarang masuk dan materi tidak tepat pada matkul ini', 'Negatif'),
(106, 'Tugasnya mantap ...pake logika semua', 'Positif'),
(107, 'PRAKTEK AJA BISA DIITUNG JARI. Nilai boleh bagus tapi tidak dengan kekampuan kita', 'Negatif'),
(108, 'Praktek yang melenceng', 'Negatif'),
(109, 'Bagus , tapi kurangi menulis', 'Negatif'),
(110, 'Mohon untuk pengitungan absenya di perbaiki', 'Negatif'),
(111, 'sangat luar biasa', 'Positif'),
(112, 'lumayan', 'Positif'),
(113, 'alhamdulillah berkah', 'Positif'),
(114, 'TIDAK MASALAH NILAI PADA MATA KULIAH INI STANDAR,KEDEPANNYA AKAN SAYA TINGKATKAN KEMBALI', 'Positif'),
(115, 'Sehat terus pak, kalo bisa kalo bapak gak masuk, adain kelas pengganti', 'Positif'),
(116, 'Baik sekali, pak badrul selalu tepat waktu dan sesuai materi', 'Positif'),
(117, 'Terima kasih atas ilmu yang diajarkan', 'Positif'),
(118, 'tingkatkan kualitas', 'Positif'),
(119, 'harus jauh lebih baik lagi', 'Negatif'),
(120, 'Semoga dapat memberikan inovasi-inovasi dalam mengajar matakuliah ini', 'Positif'),
(121, 'Sangat baik dan tertata rapih dalam pemberian materi', 'Positif'),
(122, 'DOSEN INI MENGAJARKAN BAHWA SEBAGAI MAHASISWA TIDAK TERLALU MENAIKKAN STANDAR KUALITAS FORMAL,NAMUN BAGAIMANA CARANYA SEORANG MAHASISWA BISA BERPIKIR KRITIS DAN PEKA TERHADAP LINGKUNGAN SEKITAR', 'Negatif'),
(123, 'sangat bermanfaat ilmunya yg diberikan kepada mahasiswanya', 'Positif'),
(124, 'senang bisa belajar dengan dosen ini', 'Positif'),
(125, 'Saran agar mencari metode mengajar yg lebih menarik lagi agar mudah di pahami mahasiswa', 'Positif'),
(126, 'Sudah cukup untuk memberikan materi dalam pembelajaran', 'Positif'),
(127, 'suka cara mengajarnya', 'Positif'),
(128, 'Saran untuk mata kuliah ini agar lebih mengeksplor lagi tentang pkn yg sedang terjadi saat ini', 'Negatif'),
(129, 'Dosen baik dalam pengajaran kurangnya jadwal selesai pengajaran', 'Positif'),
(130, 'Saran saya agar mencari metode mengajar yg lebih mudah di mengerti dan menyenangkan', 'Positif'),
(131, 'Penyampaian materi sangat susah dipahami. Dosen terlalu banyak menceritakan kejadian pribadi dibanding materi yang sedang diajarkan. Slide materi sering dilewati dengan dalih sudah paham yang sebenarnya sama sekali belum dibuka maupun sama sekali tidak paham. Saya merasa dosen tidak memahami materi yang diajarkan. Penulisan bahasa pada soal ujian sangat sulit untuk dipahami, sebab soal yang ditulis hanyalah seluruh judul dan sub-judul pada suatu bab yang ditambahkan "Jelaskan" dan "Apa Itu".  Saya mohon pahami dengan seksama terlebih dahulu materi yang ingin diajarkan dan cari cara penjelasan yang cukup dimengerti oleh seluruh mahasiswa. Mahasiswa yang masuk ke prodi TIF ini bukan hanya yang', 'Positif'),
(132, 'Sudah baik dalam mengajari apa yang di ajarkan ke mahasiswa', 'Positif'),
(134, 'Penyampaian materi yang cukup baik. Dosen sangat paham dengan materi yang ingin disampaikan pada mahasiswa.', 'Positif'),
(135, 'Kurang memberikan waktu untuk memahami praktikum', 'Negatif'),
(136, 'Penyampaian materi sangat mudah dipahami, sehingga mahasiswa yang awam benar-benar paham dengan apa yang disampaikan. Dosen yang talkative dan komunikatif sangat membantu mahasiswa.', 'Positif'),
(137, 'Cukup untuk mengajari pembahasan hanya kurangnya detail  dalam mengajar', 'Positif'),
(138, 'Terimakasih bu, walaupun di pelajaran ibu kita haru berpikir logika yang kuat', 'Positif'),
(139, 'Saran, agar lebih care dengan mahasiswa dengan metode mengajar yg lebih menarik dan mudah dipahami', 'Positif'),
(140, 'Kurang  pembahasan praktikum secara detail', 'Negatif'),
(141, 'Bagus sekali pelajaran mudah dipahami terimakasih sensei', 'Positif'),
(142, 'Saran saya dosen harua menggunakan waktu dengan sebaik baik nya', 'Negatif'),
(143, 'Lebih pelan lagi menjelaskan praktiknya', 'Negatif'),
(144, 'Sudah cukup dalam pengajaran', 'Positif'),
(145, 'Walaupun kuliah menarik,  tolong lebih detail menjelaskan terimakasih bu', 'Negatif'),
(146, 'Dosen harus tepat pada waktu jadwal pelajaran', 'Negatif'),
(147, 'Tolong penyampaiannya materinya lebih interaktif agar mahasiswa tertarik terimakasih bu', 'Positif'),
(148, 'Lebih aktif lagi dalam menjelaskan terimakasih bu', 'Positif'),
(149, 'Dosen harus tepat pada waktu pelajaran tiba', 'Positif'),
(150, 'Pembahasan kurang untuk di pahami ke mahasiswa', 'Negatif'),
(151, 'Agar lebih pelan dalam menjelaskan dan jelaskan sedetail detailnya dalam materi', 'Negatif'),
(152, 'Walaupun materi telah disiaplan dengan matang, agar lebih interaktif terhadap siswanya terimakasih pak', 'Positif'),
(153, 'Terimakasih bu,  tapi lebih sering hadir lagi agar ada interaksi antar dosen dan muridnya', 'Positif'),
(154, 'Kurang waktu dalam praktik pengajaran belajar mahasiswa', 'Negatif'),
(155, 'Cukup dalam pemahaman', 'Positif'),
(156, 'Semoga bapak bisa meningkatkan lagi cara mengajarnya', 'Positif'),
(157, 'Cara mengajarnya ineraktif dan mudah di mengerti', 'Positif'),
(158, 'Cara bapak mengajar sudah baik, alangkah baiknya bapak jangan sering telat Terimakasih untuk ilmunya', 'Negatif'),
(159, 'Semoga di tingkatkan lagi cara mengajarnya', 'Negatif'),
(160, 'Dosen favorit', 'Positif'),
(161, 'Dosen sangat tegas dan baik sehingga mahasiswa dapat mengerti dan dapat cepat tanggapan terhadap pelajaran', 'Positif'),
(162, 'PERLU PERBAIKAN DARI PENYAMPAIAN MATERI,TERKADANG SUKA GAGAL PAHAM', 'Negatif'),
(163, 'DARI PENYAMPAIAN MATERI BELIAU,KADANG SUKA GAGAL PAHAM.SEKIAN', 'Negatif'),
(164, 'MESKIPUN MASIH BANYAK YANG HARUS DIPERBAIKI,SECARA KESELURUHAN MEMANG DOSEN YANG BERSANGKUTAN KURANG PEKA TERHADAP MAHASISWA', 'Negatif'),
(165, 'KELEBIHAN UTAMA DOSEN PADA MATA KULIAH INI ADALAH MENGAJAR YANG SESUAI BIDANGNYA.PROFESIONALITAS,KEJUJURAN SANGAN DIUTAMAKAN PADA SETIAP PERTAMUAN DOSEN YANG BERSANGKUTAN', 'Positif'),
(166, 'HANYA MASALAH WAKTU PERTEMUAN YANG SERING TELAT DAN KABAR KETIKA DOSEN YANG BERSANGKUTAN TIDAK MASUK DADAKAN SEPERTI TAHU BULAT', 'Negatif'),
(167, 'DOSEN MUDA YANG MENGERTI KEBUTUHAN MAHASISWA,HANYA PERLU PENYAMPAIAN MATERI LEBIH DETAIL KARENA SOAL UJIAN MATA KULIAH BELIAU BANYAK ISTILAH-ISTILAH YANG BELUM SEMPAT BELIAU JELASKAN', 'Negatif'),
(168, 'KEDEPANNYA,DIPERBAIKI KEMBALI CARA MENGAJARNYA.KARENA BUAT MAHASISWA YANG AGAK LAMA MENYERAP ILMU YANG DIAJARKAN SUKA GAGAL PAHAM', 'Negatif'),
(169, 'Pertahankan gaya mengajar seperti ini pak', 'Positif'),
(170, 'terimakasih sebelumnya dan pertahankan cara mengajar seperti ini', 'Positif'),
(171, 'cukup sajalah', 'Positif'),
(172, 'bisa leih baik lagii', 'Negatif'),
(174, 'Lebih giat lagi bu', 'Negatif'),
(175, 'Dosen nya sangat baik', 'Positif'),
(176, 'Baik dalam menyampaikan materi pembelajaran', 'Positif'),
(177, 'lebih ditingkatkan lagi', 'Negatif'),
(178, 'tidak ada saran dan kritik, sudah bagus', 'Positif'),
(179, 'Dosen harus datang tepat waktu', 'Negatif'),
(180, 'mengasi soal ujian yang jawabannya banyak, waktu selalu tidak cukup', 'Negatif'),
(181, 'harus lebih interaktif kepada mahasiswa', 'Negatif'),
(182, 'Jadi Dosen Harus profesional, punya masalah dikelas lain atau masalah keluarga jangan dibawa kekelas Malam A', 'Negatif'),
(183, 'matakuliahnya Sistem Operasi yang diajarin Malah Bikin Website dilinux, Tidak sesuai dengan mata kuliah', 'Negatif'),
(184, 'bijak dalam mengabsensi pak', 'Negatif'),
(185, 'kedepannya lebih ditingkatkan lagi dalam hal pendekatan terhadap mahasiswa dan memberi materi yang cocok dengan kemampuan mahasiswa.', 'Negatif'),
(186, 'Sangat baik dan saling berinteraksi ketika mengajar, jadi membuat mahasiswa lebih aktif. Terima Kasi pak', 'Positif'),
(187, 'Dosen idaman membuat mahasiswa menjadi semangat dan aktif ketika dikelas. Terima kasih pak', 'Positif'),
(188, 'TOP dosenya diajarin sampe bisa', 'Positif'),
(189, 'Manteb konsul PBO diajarin sampe paham', 'Positif'),
(190, 'Dari kesalahan yang ada saya menjadi belajar bahwa ketika salah harus bangkit. Terima kasih pak', 'Positif'),
(191, 'kedepannya lebih ditingkatkan lagi dalam hal pendekatan terhadap mahasiswa/memberi pelajaran dan memberi materi yang cocok dengan kemampuan mahasiswa.', 'Negatif'),
(192, 'Dari bapak saya belajar arti kesabaran menunggu bapak datang ke kelas, selain itu juga saya mengucapkan banyak terima kasih ilmu yang di berikan oleh bapak. sukse selalu pak', 'Positif'),
(193, 'Dari ibu saya belajar fokus dan serius untuk memeahkan masalah. terima kasih ibu', 'Positif'),
(194, 'penyampaian dan arahan materi jelas', 'Positif'),
(195, 'Disiplin dalam penyampaian materi', 'Positif'),
(196, 'Cara mengajar dosen bagus, menarik', 'Positif'),
(197, 'Cara mengajar dosen mudah dipahami', 'Positif'),
(198, 'Dosen sangat membantu mahasiswa belajar, pembelajarannya sangat menarik, mudah dimenngerti', 'Positif'),
(199, 'suasana kegiatan belajar terlihat kaku, lebih mencairkan suasana', 'Negatif'),
(200, 'saya merasa puas dengan sitem mengajarnnya', 'Positif'),
(201, 'Sensei kenny sudah sangat baik dalam hal mengajar nya dan kedekatannya dengan mahasiswa/i nya juga sangat baik. Oleh karena itu menurut saya , pertahankan cara mengajar ibu yg seperti ini dan terimakasih atas semua ilmu yg telah ibu berikan kepada saya', 'Positif'),
(202, 'Dosen sangat menarik, cara mengajar unik, mudah dipahami oleh mahasiswa, untuk kedepannya agar lebih mantap lagi', 'Positif'),
(203, 'cara mengajar baik, mudah dimengerti oleh mahasiswa', 'Positif'),
(204, 'Pengajarannya sangat sesuai dgn kriteria', 'Positif'),
(205, 'Tapi kebnyakan tugas pusing', 'Negatif'),
(206, 'Absen dikorupsi saya dateng dan hadir terus dalam perkuliaahaan dianggap tidak hadir absen uas pun juga', 'Negatif'),
(207, 'semoga kedepannya lebih baik lagi', 'Negatif'),
(208, 'Bagus dalam cara mengajarnya', 'Positif'),
(209, 'Mengajarnya yang mengasyikan', 'Positif'),
(210, 'semoga ilmu yang bapak kasih dapet saya pergunakan dengan baik', 'Positif'),
(211, 'semoga ilmu yang di berikan dapat di gunakan dengan baik', 'Positif'),
(212, 'bahagialah anda mempunyai catatan lengkap', 'Positif'),
(213, 'Tidak ada karena dosen mengajar sesuai dengan yang diharapkan', 'Positif'),
(214, 'trimakasih banyak sensei atas 1 smsternya. mohon maaf bila selama dalam pelajaran ada perbuatan/tingkah laku yang tidak sopan.', 'Positif'),
(215, 'dosennya kurang dalam mengajar', 'Negatif'),
(216, 'Terimakasih pak/bu atas ilmu dan nasihat yang telah di berikan kepada kami', 'Positif'),
(217, 'pengajarannya baik dan efektif, semoga kedepannya akan menjadi lebih baik lagi.', 'Positif'),
(218, 'Terimakasih pak/bu atas ilmu dan nasihat yang telah di berikan kepada saya', 'Positif'),
(219, 'Penyajian bahan kuliah kurang', 'Negatif'),
(220, 'Tolong di perbaiki cara mengajarnya pak', 'Negatif'),
(221, 'Dosen kurang menggunakan waktu', 'Negatif'),
(222, 'Lain kali jika ingin menggabungkan dua matkul sekaligus harus memanfaatkan waktu sebaik baiknya', 'Negatif'),
(223, 'Ditingkatkan kembali cara mengajarnya sudah bagus dan koperatif sekali terimakasih', 'Negatif'),
(224, 'Dosen sudah cukup baik dan perlu ditingkatkan kembali cara mengajarnya', 'Positif'),
(225, 'semuanya baik, ilmu yang di berikan sangat bermanfaat.', 'Positif'),
(226, 'Dosen sudah cukup baik tetapi masih kurang sekali pertemuan di mata kuliah ini dan perlu ditingkatkan kembali cara mengajarnya terimakasih', 'Positif'),
(227, 'Dosen sudah cukup baik dan perlu ditingkatkan kembali cara mengajarnya terimakasih', 'Positif'),
(228, 'Terimakasih atas ilmu pengetahuan yang diberikan', 'Positif'),
(229, 'Cara mengajar kurang jelas, mohon di perjelas lagi', 'Negatif'),
(230, 'cukup baik hanya terlalu menegangkan belajarnya', 'Positif'),
(231, 'baik sangat bertanggung jawab', 'Positif'),
(232, 'Ditingkatkan lagi', 'Negatif'),
(233, 'Sesuai ketentuan yang berlaku', 'Positif'),
(234, 'Dosen bagus.kita harus berpikir secara keritis', 'Positif'),
(235, 'Penjelasannya kurang', 'Negatif'),
(236, 'Cukup penjelasannya', 'Positif'),
(237, 'Sehat terus pak, kalo bisa jangan dikasih tugas nulis alquran 3 buku lagi', 'Negatif'),
(238, 'terimakasih atas kritikan bapak tehadap saya dalam presentasi dan dalam mengkritisi sebuah masalah yang ada dalam makalah. saya jadi belajar banyak', 'Positif'),
(239, 'terimakasih sense saya jadi tahu bahasa jepang dan mulai menyukai sedikit tentang bahasa tersebut', 'Positif'),
(240, 'Baik, ajarkan cara menulis bahasa Jepang pak', 'Positif'),
(241, 'Saran, kalau bapak ingin mahasiswa nya lebih dari bapak. Minimal, pas bapak ngasih materi atau presantasi di depan, bapak jangan melihat power pointnya terus.', 'Negatif'),
(242, 'Semoga bapak tidak telat kembali', 'Negatif'),
(243, 'kritik : jangan baper di kelas udah gede masa baper', 'Negatif'),
(244, 'kritik : bisa gagah sedikit lagi terus canda nya kurangin waktu terangin ', 'Negatif'),
(245, 'kritik : jangan di bawa serius2 banget waktu terangin kasih candaan sedikit lah buat mahasiswa nya biar ga bete', 'Negatif'),
(246, 'kritik : ngasih tugas jangan susah banget buat print butuh biaya yg mahal', 'Negatif'),
(247, 'kritik :waktu matkul mulai jangan ke biasain main game di kelas', 'Negatif'),
(248, 'saran : ibu baik dan suka bercanda tapi bolleh bawa kopi kan di kelas', 'Positif'),
(249, 'Baik Banget', 'Positif'),
(250, 'Lumayan lah', 'Positif'),
(251, 'Beli E-Book terus', 'Negatif'),
(252, 'Jika ada yang izin shalat maka harusnya diizinkan', 'Negatif'),
(253, 'Saya tidak punya saran untuk ibu, semoga ibu cepat sembuh dan diangkat penyakit nya', 'Positif'),
(254, 'Semoga bapak di beri kesehatan selalu', 'Positif'),
(255, 'Kalau ngasih soal ulangan jangan banyak2 bu', 'Negatif'),
(256, 'Bu dona ngajar praktek multimedia kaya ada yg kurang', 'Negatif'),
(257, 'Tolong bu kalo ngasih tugas, dijelasin dulu gimana cara buatnya dan materinya yg lengkap', 'Negatif'),
(258, 'terlalu singkat waktu untuk belajar prakteknya', 'Negatif'),
(259, 'Pelan pelan bu ngajarnya hehe, Aplagi untung anak yg malem kan ada yg kerja jdi rada wajar klo jepang kurng hehe', 'Negatif'),
(260, 'Tugas saya ngerjain semu knapa 78 pak hehe', 'Negatif'),
(261, 'Saran saya materinya banykin lagi pak hehe', 'Negatif'),
(262, 'Klo bisa datang jangan kemaleman pak, kan kami ada yg kerja juga heheh', 'Negatif'),
(263, 'Ngajarnya jangan ngebut banget bu ehheh, suka ketinggalan paham nya saya', 'Negatif'),
(264, 'Keren', 'Positif'),
(265, 'Dateng nya jangan telat mulu pak heheh', 'Negatif'),
(266, 'terimakasih atas pelajaran dan waktunya', 'Positif'),
(267, 'Dengan menjelaskan sejarah sampai detail saat pangajarannya itu bagus sekali', 'Positif'),
(268, 'Dosen cukup baik dalam mengajar', 'Positif'),
(269, 'Mohon maaf pak saya hanya ingin memberi saran supaya tidak telat saat kelas bapak dimulai, soalnya kasihan kami yang sudah datang di awal jam tetapi kelas masih belum dimulai dan terpaksa menunggu di lorong', 'Negatif'),
(270, 'Dosen yang selalu tepat waktu', 'Positif'),
(271, 'Baik dalam menjalankan tugas nya', 'Positif'),
(272, 'cara mangajarnya sangat bagus, dengan tempo yang tidak terlalu terburu - buru itu sangan membantu mahasiswa yang belum bisa berbahasa jepang', 'Positif'),
(273, 'Mohon maaf bu saya hanya ingin memberi saran supaya ibu tidak telat saat mangajar di kelas ibu, karena dari waktu yg kosong itu ibu bisa lebih menjelaskan materi dan memberi contoh-contoh soal kepada mahasiswa supaya kita lebih mengerti lagi dengan materinya', 'Negatif'),
(274, 'Terima Kasih Pak telah memberikan saya ilmu yang bermanfaat dan bukan sekedar nilai', 'Positif'),
(275, 'Semoga kedepannya bisa lebih baik lagi dalam pengajarannya dan semakin menarik', 'Positif'),
(276, 'Baik dalam melakukan pembelajaran', 'Positif'),
(277, 'Materi yang disampaikan dengan baik dan mudah dipahami. Namun metodenya agak membuat ngantuk', 'Positif'),
(278, 'Penyampaian materi mudah dimengerti.', 'Positif'),
(279, 'dosen yang baik dalam penyampaiannya', 'Positif'),
(280, 'dosen yang pengertian dengan mahasiswa', 'Positif'),
(281, 'kurang jelas saat mengajar dan absen', 'Negatif'),
(282, 'Mengajar nya baik', 'Positif'),
(283, 'terimakasih pak untuk pengajarannya', 'Positif'),
(284, 'Bisa lebih baik', 'Positif'),
(285, 'Pengajaran baik', 'Positif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengujian`
--

CREATE TABLE IF NOT EXISTS `tb_pengujian` (
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
('KP01905003', '2019-05-22', '15:30:11', 'saya malas', 'Positif', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
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
('USR1905001', 'Admin1', '0865677567', 'admin@gmail.com', 'a', 'a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
 ADD PRIMARY KEY (`id_kategori`), ADD UNIQUE KEY `kata` (`kalimat`);

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
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
MODIFY `id_kategori` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=286;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

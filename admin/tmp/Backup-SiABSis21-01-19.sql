

CREATE TABLE `gurpiket` (
  `id_gurpik` varchar(100) NOT NULL,
  `nama_gurpik` varchar(100) NOT NULL,
  `pikethari` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id_gurpik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO gurpiket VALUES("212","Sasuga","Rabu","SiAbSis123","0975315653221");
INSERT INTO gurpiket VALUES("P-001","Dian","Senin","SiAbSis123","0975315653221");
INSERT INTO gurpiket VALUES("P-003","Tomi","Selasa","SiAbSis123","0975315653221");





CREATE TABLE `kehadiran` (
  `id_absen` int(11) NOT NULL AUTO_INCREMENT,
  `NIS` varchar(100) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `tgl` date NOT NULL,
  `id_kelas` varchar(100) NOT NULL,
  `Hadir` varchar(10) NOT NULL,
  `Alfa` int(10) NOT NULL,
  `Izin` int(10) NOT NULL,
  `Sakit` int(10) NOT NULL,
  `status` enum('Terkirim','Tidak Terkirim','Tidak Perlu Dikirim','') NOT NULL,
  PRIMARY KEY (`id_absen`)
) ENGINE=InnoDB AUTO_INCREMENT=137 DEFAULT CHARSET=latin1;

INSERT INTO kehadiran VALUES("36","902903","809","2019-01-02","K-001","0","1","0","0","Tidak Terkirim");
INSERT INTO kehadiran VALUES("37","2147483647","Mulyani","2019-01-02","K-001","0","0","0","1","Tidak Terkirim");
INSERT INTO kehadiran VALUES("38","992029881","Siti Ti","2019-01-02","K-001","1","0","0","0","Tidak Perlu Dikirim");
INSERT INTO kehadiran VALUES("39","90293928","nama","2019-01-02","K-001","1","0","0","0","Tidak Perlu Dikirim");
INSERT INTO kehadiran VALUES("40","23232323","Osama","2019-01-02","K-001","1","0","0","0","Tidak Perlu Dikirim");
INSERT INTO kehadiran VALUES("59","12","Saepul","2019-01-02","K-002","0","1","0","0","Tidak Terkirim");
INSERT INTO kehadiran VALUES("60","123","12","2019-01-02","K-002","1","0","0","0","Tidak Perlu Dikirim");
INSERT INTO kehadiran VALUES("62","123","12","2019-01-06","K-002","1","0","0","0","Tidak Perlu Dikirim");
INSERT INTO kehadiran VALUES("63","902903","809","2019-01-06","K-001","0","0","0","1","Tidak Terkirim");
INSERT INTO kehadiran VALUES("64","2147483647","Mulyani","2019-01-06","K-001","1","0","0","0","Tidak Perlu Dikirim");
INSERT INTO kehadiran VALUES("65","992029881","Siti Ti","2019-01-06","K-001","0","1","0","0","Tidak Terkirim");
INSERT INTO kehadiran VALUES("66","90293928","nama","2019-01-06","K-001","1","0","0","0","Tidak Perlu Dikirim");
INSERT INTO kehadiran VALUES("67","23232323","Osama","2019-01-06","K-001","1","0","0","0","Tidak Perlu Dikirim");
INSERT INTO kehadiran VALUES("78","902903","809","2019-01-18","K-001","0","0","0","1","Tidak Terkirim");
INSERT INTO kehadiran VALUES("79","2147483647","Mulyani","2019-01-18","K-001","1","0","0","0","Tidak Perlu Dikirim");
INSERT INTO kehadiran VALUES("80","992029881","Siti Ti","2019-01-18","K-001","1","0","0","0","Tidak Perlu Dikirim");
INSERT INTO kehadiran VALUES("81","90293928","nama","2019-01-18","K-001","1","0","0","0","Tidak Perlu Dikirim");
INSERT INTO kehadiran VALUES("82","23232323","Osama","2019-01-18","K-001","1","0","0","0","Tidak Perlu Dikirim");
INSERT INTO kehadiran VALUES("98","902903","809","2019-01-19","K-001","0","1","0","0","Tidak Terkirim");
INSERT INTO kehadiran VALUES("99","2147483647","Mulyani","2019-01-19","K-001","1","0","0","0","Tidak Perlu Dikirim");
INSERT INTO kehadiran VALUES("100","992029881","Siti Ti","2019-01-19","K-001","1","0","0","0","Tidak Perlu Dikirim");
INSERT INTO kehadiran VALUES("101","90293928","nama","2019-01-19","K-001","1","0","0","0","Tidak Perlu Dikirim");
INSERT INTO kehadiran VALUES("102","23232323","Osama","2019-01-19","K-001","1","0","0","0","Tidak Perlu Dikirim");
INSERT INTO kehadiran VALUES("117","23232323","Deni","2019-01-20","K-001","0","1","0","0","Tidak Terkirim");
INSERT INTO kehadiran VALUES("118","90293928","Hacker","2019-01-20","K-001","0","0","0","1","Tidak Terkirim");
INSERT INTO kehadiran VALUES("119","2147483647","Mulyani","2019-01-20","K-001","1","0","0","0","Tidak Perlu Dikirim");
INSERT INTO kehadiran VALUES("120","902903","Osama","2019-01-20","K-001","1","0","0","0","Tidak Perlu Dikirim");
INSERT INTO kehadiran VALUES("121","992029881","Siti Ti","2019-01-20","K-001","1","0","0","0","Tidak Perlu Dikirim");
INSERT INTO kehadiran VALUES("122","193","sesaka","2019-01-20","K-003","1","0","0","0","Tidak Perlu Dikirim");
INSERT INTO kehadiran VALUES("128","121","Dede","2019-01-21","K-002","1","0","0","0","Tidak Perlu Dikirim");
INSERT INTO kehadiran VALUES("129","123","Husein","2019-01-21","K-002","1","0","0","0","Tidak Perlu Dikirim");
INSERT INTO kehadiran VALUES("130","12","Saepul","2019-01-21","K-002","1","0","0","0","Tidak Perlu Dikirim");
INSERT INTO kehadiran VALUES("131","131","Sri","2019-01-21","K-002","1","0","0","0","Tidak Perlu Dikirim");
INSERT INTO kehadiran VALUES("132","23232323","Deni","2019-01-21","K-001","1","0","0","0","Tidak Perlu Dikirim");
INSERT INTO kehadiran VALUES("133","90293928","Hacker","2019-01-21","K-001","1","0","0","0","Tidak Perlu Dikirim");
INSERT INTO kehadiran VALUES("134","2147483647","Mulyani","2019-01-21","K-001","1","0","0","0","Tidak Perlu Dikirim");
INSERT INTO kehadiran VALUES("135","902903","Osama","2019-01-21","K-001","1","0","0","0","Tidak Perlu Dikirim");
INSERT INTO kehadiran VALUES("136","992029881","Siti Ti","2019-01-21","K-001","1","0","0","0","Tidak Perlu Dikirim");





CREATE TABLE `kelas` (
  `id_kelas` varchar(100) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO kelas VALUES("K-001","X RPL 1","RPL","XRPL","231");
INSERT INTO kelas VALUES("K-002","XI RPL 1","RPL","XIRPL","2133");
INSERT INTO kelas VALUES("k-003","XIIRPL1","RPL","XIIRPL","21333");





CREATE TABLE `siswa` (
  `NIS` int(100) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nama_ortu` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `id_kelas` varchar(100) NOT NULL,
  PRIMARY KEY (`NIS`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO siswa VALUES("12","Saepul","L","Kadomas","siapa","09812345567","K-002");
INSERT INTO siswa VALUES("121","Dede","L","Cimanuk","Dadu","08923764657","K-002");
INSERT INTO siswa VALUES("123","Husein","L","ciekek","gatau","0891123435676","K-002");
INSERT INTO siswa VALUES("131","Sri","P","Cikuya","Desi","08984727586","K-002");
INSERT INTO siswa VALUES("193","sesaka","L","kadubanen","tak tahu","09836456","K-003");
INSERT INTO siswa VALUES("902903","Osama","L","Gunung Karang","tanya aja","089627182734","K-001");
INSERT INTO siswa VALUES("23232323","Deni","L","Pasarheubeul","tandatanya","0895610787820","K-001");
INSERT INTO siswa VALUES("90293928","Hacker","L","samaboa","hihihihi","0909092829","K-001");
INSERT INTO siswa VALUES("992029881","Siti Ti","P","Cigadung","Saleha","0897423245674","K-001");
INSERT INTO siswa VALUES("2147483647","Mulyani","P","Maja","Dudung","08982342626145","K-001");





CREATE TABLE `walikel` (
  `id_wali` varchar(100) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_kelas` varchar(100) NOT NULL,
  PRIMARY KEY (`id_wali`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO walikel VALUES("k-003","Bu Hilda","Perempuan","users","1234","k-003");
INSERT INTO walikel VALUES("W-001","Bu Yunni","Perempuan","user","13","K-002");
INSERT INTO walikel VALUES("W-002","Sis","Perempuan","123","2123","K-001");





CREATE TABLE `walikel` (
  `id_wali` varchar(100) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_kelas` varchar(100) NOT NULL,
  PRIMARY KEY (`id_wali`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO walikel VALUES("k-003","Bu Hilda","Perempuan","users","1234","k-003");
INSERT INTO walikel VALUES("W-001","Bu Yunni","Perempuan","user","13","K-002");
INSERT INTO walikel VALUES("W-002","Sis","Perempuan","123","2123","K-001");




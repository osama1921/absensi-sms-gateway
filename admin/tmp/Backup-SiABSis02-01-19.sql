

CREATE TABLE `gurpiket` (
  `id_gurpik` varchar(100) NOT NULL,
  `nama_gurpik` varchar(100) NOT NULL,
  `pikethari` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id_gurpik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO gurpiket VALUES("212","213","Rabu","SiAbSis123","0975315653221");
INSERT INTO gurpiket VALUES("P-001","kl","Senin","SiAbSis123","0975315653221");





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
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

INSERT INTO kehadiran VALUES("36","902903","809","2019-01-02","K-001","0","1","0","0","Tidak Terkirim");
INSERT INTO kehadiran VALUES("37","2147483647","hgygyu","2019-01-02","K-001","0","0","0","1","Tidak Terkirim");
INSERT INTO kehadiran VALUES("38","992029881","jkalak","2019-01-02","K-001","1","0","0","0","Tidak Perlu Dikirim");
INSERT INTO kehadiran VALUES("39","90293928","nama","2019-01-02","K-001","1","0","0","0","Tidak Perlu Dikirim");
INSERT INTO kehadiran VALUES("40","23232323","Osama","2019-01-02","K-001","1","0","0","0","Tidak Perlu Dikirim");





CREATE TABLE `kelas` (
  `id_kelas` varchar(100) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO kelas VALUES("K-002","XI RPL 1","RPL","RPLR","990993");





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

INSERT INTO siswa VALUES("1","809","L","90","90","0","K--001");
INSERT INTO siswa VALUES("2","810","L","91","90","1","K--001");
INSERT INTO siswa VALUES("3","811","L","92","90","2","K--001");
INSERT INTO siswa VALUES("4","812","L","93","90","3","K--001");
INSERT INTO siswa VALUES("5","813","L","94","90","4","K--001");
INSERT INTO siswa VALUES("6","814","L","95","90","5","K--001");
INSERT INTO siswa VALUES("7","815","L","96","90","6","K--001");
INSERT INTO siswa VALUES("8","816","L","97","90","7","K--001");
INSERT INTO siswa VALUES("9","817","L","98","90","8","K--001");
INSERT INTO siswa VALUES("10","818","L","99","90","9","K--001");
INSERT INTO siswa VALUES("11","819","L","100","90","10","K--001");
INSERT INTO siswa VALUES("902903","809","L","90","90","99","K-001");
INSERT INTO siswa VALUES("23232323","Osama","L","0","koakso","909899","K-001");
INSERT INTO siswa VALUES("90293928","nama","L","00122910","k","0909092829","K-001");
INSERT INTO siswa VALUES("992029881","jkalak","L","092jj","iak","998877","K-001");
INSERT INTO siswa VALUES("2147483647","hgygyu","L","kokp","kjouu","998989","K-001");





CREATE TABLE `walikel` (
  `id_wali` varchar(100) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_kelas` varchar(100) NOT NULL,
  PRIMARY KEY (`id_wali`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO walikel VALUES("W-001","das","Laki-Laki","user","13","K-002");
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

INSERT INTO walikel VALUES("W-001","das","Laki-Laki","user","13","K-002");
INSERT INTO walikel VALUES("W-002","Sis","Perempuan","123","2123","K-001");




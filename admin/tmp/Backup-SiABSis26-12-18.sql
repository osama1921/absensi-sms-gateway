

CREATE TABLE `gurpiket` (
  `id_gurpik` varchar(100) NOT NULL,
  `nama_gurpik` varchar(100) NOT NULL,
  `pikethari` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id_gurpik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `kehadiran` (
  `id_absen` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa` varchar(100) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `tgl` date NOT NULL,
  `ket` varchar(100) NOT NULL,
  `id_kelas` varchar(100) NOT NULL,
  PRIMARY KEY (`id_absen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `kelas` (
  `id_kelas` varchar(100) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO kelas VALUES("K-001","X RPL 1","RPL","RPL1","09909990");
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






CREATE TABLE `walikel` (
  `id_wali` varchar(100) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_kelas` varchar(100) NOT NULL,
  PRIMARY KEY (`id_wali`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;





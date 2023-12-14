USE KEPENDUDUKAN
GO

DELETE FROM [KELAHIRAN];
DELETE FROM [PENGANGKATAN_ANAK];
DELETE FROM [PERUBAHAN_STATUSWN];
DELETE FROM [PERUBAHAN_NAMA];
DELETE FROM [KEMATIAN];
DELETE FROM [PERPINDAHAN];
DELETE FROM [PERCERAIAN];
DELETE FROM [PERISTIWA_PENTING];
DELETE FROM [PENYAKIT];
DELETE FROM [KESEHATAN];
DELETE FROM [MEMILIKI_PEKERJAAN];
DELETE FROM [PEKERJAAN];
DELETE FROM [BARANG_MEWAH];
DELETE FROM [INVESTASI];
DELETE FROM [KENDARAAN];
DELETE FROM [PROPERTI];
DELETE FROM [KEKAYAAN];
DELETE FROM [BPJS];
DELETE FROM [PENDIDIKAN];
DELETE FROM [WARGA_ASING];
DELETE FROM [PENDUDUK];
DELETE FROM [KARTU_KELUARGA];

INSERT INTO [KARTU_KELUARGA] ([NoKK], [StatusAnggota], [Nama_Ayah], [Nama_Ibu])
VALUES
('123456789012', 'Suami', 'Rafi Sanjaya', 'Naya Wahyani'),
('123456789012', 'Isteri', 'Muhammad Rafi Ahmad', 'Nagita Aoka Floridina'),
('123456789012', 'Anak 1', 'Dani', 'Rana'),
('358123012391', 'Suami', 'Novi', 'Toti'),
('358123012391', 'Isteri', 'Rindi', 'Keisya'),
('358123012391', 'Anak 1', 'Rusli Marusli', 'Septina Rahmawati'),
('358123012391', 'Anak 2', 'Rusli Marusli', 'Septina Rahmawati'),
('458125062291', 'Suami', 'Ferdinan Utama', 'Chelsy Achelsya'),
('458125062291', 'Isteri', 'Ibrahim Firdaus', 'Cahya Wacahya'),
('321125062212', 'Kepala Kel', 'Budiman', 'Selena Nur'),
('321125062212', 'Isteri', 'Budiman', 'Selena Nur'),
('321125062212', 'Anak', 'Budiman', 'Selena Nur'),
('121125054211', 'Suami', 'Fahrul Utama', 'Sri Wahyuni'),
('121125054211', 'Isteri', 'Rolly Venda', 'Desti'),
('321425054112', 'Kepala Kel', 'Sutridjo', 'Wati Malawati'),
('321425054112', 'Anak 1', 'Budiman Wahudi', 'Yanti Taranti'),
('458125087692', 'Kepala Kel', 'Yanto', 'Susi Sumianti'),
('458125087692', 'Anak 1', 'Yanuar', 'Yuni Shara'),
('458125087692', 'Anak 2', 'Yanuar', 'Yuni Shara');


INSERT INTO [PENDUDUK] (
    [NIK], [NamaLengkap], [Tempat_Lahir], [Tanggal_Lahir], [NoKK], [StatusAnggota],
    [Alamat_Jalan], [Alamat_RTRW], [Alamat_Desa], [Alamat_Kecamatan], [Alamat_Kabupaten],
    [Alamat_Provinsi], [Alamat_KodePos], [JenisKelamin], [GolDarah], [Kewarganegaraan],
    [StatusPernikahan]
) VALUES
('3173011503900003', 'Ivan Pratama', 'Jakarta', '1990-03-15', 
 (SELECT [NoKK] FROM [KARTU_KELUARGA] WHERE [NoKK] = '123456789012' AND [StatusAnggota] = 'Suami'),
 'Suami', 'Jl. Cendrawasih No. 1', 'RT008/RW012', 'Serdang', 'Kemayoran', 'Jakarta Pusat', 'DKI Jakarta', '12345', 'Laki-laki', 'O', 'WNI', 'Menikah'),
('3173011807900005', 'Raisa Fakhira', 'Jakarta', '1990-07-18',
 (SELECT [NoKK] FROM [KARTU_KELUARGA] WHERE [NoKK] = '123456789012' AND [StatusAnggota] = 'Isteri'),
 'Isteri', 'Jl. Cendrawasih No. 1', 'RT008/RW012', 'Serdang', 'Kemayoran', 'Jakarta Pusat', 'DKI Jakarta', '12345', 'Perempuan', 'A', 'WNI', 'Menikah'),
('3173010105150006', 'Muhammad Alfarizi', 'Jakarta', '2006-05-01',
 (SELECT [NoKK] FROM [KARTU_KELUARGA] WHERE [NoKK] = '123456789012' AND [StatusAnggota] = 'Anak 1'),
 'Anak 1', 'Jl. Cendrawasih No. 1', 'RT008/RW012', 'Serdang', 'Kemayoran', 'Jakarta Pusat', 'DKI Jakarta', '12345', 'Laki-laki', 'O', 'WNI', 'Belum Menikah'),
('1203281261230002', 'Rusli Marusli', 'Bandung', '1970-02-07', 
 (SELECT [NoKK] FROM [KARTU_KELUARGA] WHERE [NoKK] = '358123012391' AND [StatusAnggota] = 'Suami'),
 'Suami', 'Jl. Diponegoro No. 18', 'RT018/RW002', 'Marpoyan', 'Tangkerang Selatan', 'Pekanbaru', 'Riau', '45678', 'Laki-laki', 'A', 'WNI', 'Menikah'),
('1203231261230012', 'Septina Rahmawati', 'Pekanbaru', '1973-09-11',
 (SELECT [NoKK] FROM [KARTU_KELUARGA] WHERE [NoKK] = '358123012391' AND [StatusAnggota] = 'Isteri'),
 'Isteri', 'Jl. Diponegoro No. 18', 'RT018/RW002', 'Marpoyan', 'Tangkerang Selatan', 'Pekanbaru', 'Riau', '45678', 'Perempuan', 'O', 'WNI', 'Menikah'),
('1203281311230009', 'Alvin Pratama', 'Pekanbaru', '1988-12-27',
 (SELECT [NoKK] FROM [KARTU_KELUARGA] WHERE [NoKK] = '358123012391' AND [StatusAnggota] = 'Anak 1'),
 'Anak 1', 'Jl. Diponegoro No. 18', 'RT018/RW002', 'Marpoyan', 'Tangkerang Selatan', 'Pekanbaru', 'Riau', '45678', 'Laki-laki', 'O', 'WNI', 'Belum Menikah'),
('1203281321230021', 'Atikah Risni', 'Pekanbaru', '1990-06-29',
 (SELECT [NoKK] FROM [KARTU_KELUARGA] WHERE [NoKK] = '358123012391' AND [StatusAnggota] = 'Anak 2'),
 'Anak 2', 'Jl. Diponegoro No. 18', 'RT018/RW002', 'Marpoyan', 'Tangkerang Selatan', 'Pekanbaru', 'Riau', '45678', 'Perempuan', 'A', 'WNI', 'Belum Menikah'),
('3298236131234524', 'Wahyudi Riski', 'Surakarta', '1995-09-29',
 (SELECT [NoKK] FROM [KARTU_KELUARGA] WHERE [NoKK] = '458125062291' AND [StatusAnggota] = 'Suami'),
 'Suami', 'Jl. Pedaringan No. 9', 'RT008/RW012', 'Pedaringan', 'Jebres', 'Surakarta', 'Jawa Tengah', '34618', 'Laki-laki', 'O', 'WNI', 'Menikah'),
('329823345673124', 'Atikah Risni', 'Pekanbaru', '1996-01-01',
 (SELECT [NoKK] FROM [KARTU_KELUARGA] WHERE [NoKK] = '458125062291' AND [StatusAnggota] = 'Isteri'),
 'Isteri', 'Jl. Pedaringan No. 9', 'RT008/RW012', 'Pedaringan', 'Jebres', 'Surakarta', 'Jawa Tengah', '34618', 'Perempuan', 'O', 'WNI', 'Menikah'),
('229884716673148', 'Budi Berbakti', 'Boyolali', '2000-11-12',
 (SELECT [NoKK] FROM [KARTU_KELUARGA] WHERE [NoKK] = '321125062212' AND [StatusAnggota] = 'Kepala Kel'),
 'Kepala Kel', 'Jl. Mojosongo No. 13', 'RT012/RW012', 'Teras', 'Mojosongo', 'Boyolali', 'Jawa Tengah', '34612', 'Laki-Laki', 'AB', 'WNI', 'Menikah'),
 ('229884716673149', 'Budi Berbakti', 'Boyolali', '2000-11-12',
 (SELECT [NoKK] FROM [KARTU_KELUARGA] WHERE [NoKK] = '321125062212' AND [StatusAnggota] = 'Isteri'),
 'Isteri', 'Jl. Mojosongo No. 13', 'RT012/RW012', 'Teras', 'Mojosongo', 'Boyolali', 'Jawa Tengah', '34612', 'Perempuan', 'AB', 'WNI', 'Menikah'),
 ('229884716673147', 'Budi Berbakti', 'Boyolali', '2000-11-12',
 (SELECT [NoKK] FROM [KARTU_KELUARGA] WHERE [NoKK] = '321125062212' AND [StatusAnggota] = 'Anak'),
 'Anak', 'Jl. Mojosongo No. 13', 'RT012/RW012', 'Teras', 'Mojosongo', 'Boyolali', 'Jawa Tengah', '34612', 'Perempuan', 'AB', 'WNI', 'Belum Menikah'),
('129884716412166', 'Fauzan Andika', 'Bekasi', '1980-12-26',
 (SELECT [NoKK] FROM [KARTU_KELUARGA] WHERE [NoKK] = '121125054211' AND [StatusAnggota] = 'Suami'),
 'Suami', 'Jl. Cendana No. 123', 'RT007/RW009', 'Karangsatria', 'Tambun Utara', 'Bekasi', 'Jawa Barat', '42453', 'Laki-Laki', 'O', 'WNI', 'Menikah'),
('238984716673132', 'Hanindya Aisyah', 'Bekasi', '1985-11-23',
 (SELECT [NoKK] FROM [KARTU_KELUARGA] WHERE [NoKK] = '121125054211' AND [StatusAnggota] = 'Isteri'),
 'Isteri', 'Jl. Cendana No. 123', 'RT007/RW009', 'Karangsatria', 'Tambun Utara', 'Bekasi', 'Jawa Barat', '42453', 'Perempuan', 'O', 'WNI', 'Menikah'),
('429888726534231', 'Nana Puspamurti', 'Yogyakarta', '1975-03-11',
 (SELECT [NoKK] FROM [KARTU_KELUARGA] WHERE [NoKK] = '321425054112' AND [StatusAnggota] = 'Kepala Kel'),
 'Kepala Kel', 'Jl. Palagan', 'RT007/RW009', 'Palagan', 'Sleman', 'Yogyakarta', 'DIY Yogyakarta', '31243', 'Perempuan', 'O', 'WNI', 'Janda'),
('429884716634221', 'Alma Bintang', 'Mojokerto', '1990-09-21',
 (SELECT [NoKK] FROM [KARTU_KELUARGA] WHERE [NoKK] = '321425054112' AND [StatusAnggota] = 'Anak 1'),
 'Anak 1', 'Jl. Palagan', 'RT007/RW009', 'Palagan', 'Sleman', 'Yogyakarta', 'DIY Yogyakarta', '31243', 'Perempuan', 'AB', 'WNI', 'Belum Menikah'),
('512616634345123', 'Yuni Shara', 'Surakarta', '1985-04-01',
 (SELECT [NoKK] FROM [KARTU_KELUARGA] WHERE [NoKK] = '458125087692' AND [StatusAnggota] = 'Kepala Kel'),
 'Kepala Kel', 'Jl. Ronggowarsito', 'RT017/RW001', 'Pedaringan', 'Jebres', 'Surakarta', 'Jawa Tengah', '34617', 'Perempuan', 'O', 'WNI', 'Janda'),
('512612351245321', 'Raka Ardhinato', 'Boyolali', '2000-09-29',
 (SELECT [NoKK] FROM [KARTU_KELUARGA] WHERE [NoKK] = '458125087692' AND [StatusAnggota] = 'Anak 1'),
 'Anak 1', 'Jl. Ronggowarsito', 'RT017/RW001', 'Pedaringan', 'Jebres', 'Surakarta', 'Jawa Tengah', '34617', 'Laki-Laki', 'O', 'WNI', 'Anak 1'),
('512616574516418', 'Kavindra Bintang', 'Surakarta', '2002-08-11',
 (SELECT [NoKK] FROM [KARTU_KELUARGA] WHERE [NoKK] = '458125087692' AND [StatusAnggota] = 'Anak 2'),
 'Anak 2', 'Jl. Ronggowarsito', 'RT017/RW001', 'Pedaringan', 'Jebres', 'Surakarta', 'Jawa Tengah', '34617', 'Laki-Laki', 'AB', 'WNI', 'Anak 2');


INSERT INTO PENDIDIKAN (ID, NIK, PendidikanTerakhir_NamaInstansi, PendidikanTerakhir_Lokasi, PendidikanTerakhir_TahunLulus, PendidikanSekarang_NamaInstansi, PendidikanSekarang_Lokasi)
VALUES 
(1, '3173011503900003', 'UI', 'Depok', 2012, '', ''),
(2, '3173011807900005', 'UB', 'Malang', 2011, '', ''),
(3, '3173010105150006', 'TK Mesra', 'Jakarta Pusat', 2021, '', '');

INSERT INTO BPJS (NoPeserta, NIK, Kelas)
VALUES 
('NOBPJS1503900003', '3173011503900003', 'Kelas 2'),
('NOBPJS1807900005', '3173011503900003', 'Kelas 2'),
('NOBPJS0105150006', '3173011503900003', 'Kelas 2');
-- ('NOBPJS', '3173011503900003', 'Kelas 2'); ini formatnya

/*INSERT INTO WARGA_ASING (NoPaspor, NIK, TglKedatangan, TglKepulangan, Tujuan)
VALUES 
('P123456789', '1234567890123456', '2022-01-01', '2023-01-01', 'Wisata'); --masih random */

-- Buat semua kekayaan kosongin dulu ajaa --
INSERT INTO KEKAYAAN (ID, NIK)
VALUES 
(1, '3173011503900003'),
(2, '3173011807900005');

/*SELECT *
FROM KEKAYAAN k
JOIN PROPERTI p ON p.KekayaanID = k.ID 
JOIN KENDARAAN v ON v.KekayaanID = k.ID

DECLARE @KekayaanID INT;
SET @KekayaanID = SCOPE_IDENTITY(); */

INSERT INTO PROPERTI (ID, KekayaanID, Jenis, Luas, Lokasi, Harga)
VALUES 
(1, 1, 'Rumah', 200, 'Jakarta Pusat', 500000000),
(2, 1, 'Apartemen', 30, 'Jakarta Pusat', 50000000);

INSERT INTO KENDARAAN (ID, KekayaanID, Jenis_Nama, Jenis_Tipe, Jenis_CC, Jenis_BB, NJKB, Tahun)
VALUES 
(1, 1, 'Honda Civic RS', 'Mobil Sedan', 1800, 'Bensin', 180000000, 2022),
(2, 1, 'Honda Beat', 'Motor Skuter', 112, 'Bensin', 20000000, 2020);

INSERT INTO INVESTASI (ID, KekayaanID, Jenis, Dividen)
VALUES 
(1, 1, 'Saham', 50000000);

INSERT INTO BARANG_MEWAH (ID, KekayaanID, Jenis, Nilai)
VALUES 
(1, 1, 'Jam Tangan Mewah', 10000000);

INSERT INTO PEKERJAAN (ID, NIK, KekayaanID, NamaPekerjaan, Jenis, GajiPerTahun, Alamat_Jalan, Alamat_RTRW, Alamat_Desa, Alamat_Kecamatan, Alamat_Kabupaten, Alamat_Provinsi, Alamat_KodePos, Perusahaan)
VALUES 
(1, '3173011503900003', 1, 'Software Developer', 'Swasta', 300000000, 'Jl. Cisuba No. 1', 'RT001/RW002', 'Taman Sari', 'Cikidang', 'Bukit Algoritma', 'Jawa Barat', '12101', 'Tokopaedi'),
(2, '3173011503900003', 1, 'Data Science', 'Swasta', 20000000, 'Jl. Cisuba No. 1', 'RT001/RW002', 'Taman Sari', 'Cikidang', 'Bukit Algoritma', 'Jawa Barat', '12101', 'Tanah Abang'),
(3, '3173011807900005', 2, 'gAME', 'sWASTAS', 1000, 'Jl. Cisuba No. 1', 'RT001/RW002', 'Taman Sari', 'Cikidang', 'Bukit Algoritma', 'Jawa Barat', '12101', 'Tanah Abang');

INSERT INTO MEMILIKI_PEKERJAAN (NIK, PekerjaanID, WaktuPerjalanan, JamKerjaPerMinggu)
VALUES 
('3173011503900003', 1, 60, 40);

INSERT INTO KESEHATAN (ID, NIK, Alergi, Vaksinasi, Turunan, Fisik_Disabilitas, Fisik_Tinggi, Fisik_BeratBadan)
VALUES 
(1, '3173011503900003', 'Kacang', 'Booster', 'Miopi', 'Tidak', 175, 67);

INSERT INTO PENYAKIT (ID, KesehatanID, TanggalDiagnosa, Status, TanggalSembuh)
VALUES 
(1, 1, '2021-07-12', 'Sembuh', '2021-07-30');

INSERT INTO PERISTIWA_PENTING (ID, NIK, TanggalTerjadi, NamaPeristiwa)
VALUES 
(1, '3173011503900003', '2022-03-01', 'Pindah Alamat');

INSERT INTO PERCERAIAN (PeristiwaID, StatusGugatan, Alasan)
VALUES 
(1, 'Selesai', 'Kesepakatan bersama');

INSERT INTO PERPINDAHAN (PeristiwaID, Asal, Tujuan)
VALUES 
(1, 'Jakarta', 'Medan');

INSERT INTO KEMATIAN (PeristiwaID, Alamat_Jalan, Alamat_RTRW, Alamat_Desa, Alamat_Kecamatan, Alamat_Kabupaten, Alamat_Provinsi, Alamat_KodePos, Alasan)
VALUES 
(1, 'Jl. Kesehatan No. 10', '02/01', 'Sehat Desa', 'Medis Kecamatan', 'Healthy Kabupaten', 'Medis Provinsi', '54321', 'Sakit parah');

INSERT INTO PERUBAHAN_NAMA (PeristiwaID, NamaLama, Alasan)
VALUES 
(1, 'Budi Santoso', 'Pernikahan');

INSERT INTO PERUBAHAN_STATUSWN (PeristiwaID, StatusLama, Alasan)
VALUES 
(1, 'WNI', 'Naturalisasi');

INSERT INTO PENGANGKATAN_ANAK (PeristiwaID, Alasan, NoKK, StatusAnggota)
VALUES 
(1, 'Kedua orang tua meninggal', '123456789012', 'Anak 1');

INSERT INTO KELAHIRAN (PeristiwaID, Berat, Kondisi, Alamat_Jalan, Alamat_RTRW, Alamat_Desa, Alamat_Kecamatan, Alamat_Kabupaten, Alamat_Provinsi, Alamat_KodePos, NamaAyah, NamaIbu, Pengesahan)
VALUES 
(1, 3500, 'Sehat', 'Jl. Kesehatan No. 20', '03/04', 'Sehat Desa', 'Medis Kecamatan', 'Healthy Kabupaten', 'Medis Provinsi', '54321', 'Agus Santoso', 'Siti Rahayu', 'Sudah');
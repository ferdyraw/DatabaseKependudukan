IF NOT EXISTS (SELECT * FROM sys.databases WHERE name = 'KEPENDUDUKAN2')
BEGIN
  CREATE DATABASE KEPENDUDUKAN2;
END;
GO

DROP TABLE IF EXISTS [KELAHIRAN];
DROP TABLE IF EXISTS [PENGANGKATAN_ANAK];
DROP TABLE IF EXISTS [PERUBAHAN_STATUSWN];
DROP TABLE IF EXISTS [PERUBAHAN_NAMA];
DROP TABLE IF EXISTS [KEMATIAN];
DROP TABLE IF EXISTS [PERPINDAHAN];
DROP TABLE IF EXISTS [PERCERAIAN];
DROP TABLE IF EXISTS [PERISTIWA_PENTING];
DROP TABLE IF EXISTS [PENYAKIT];
DROP TABLE IF EXISTS [KESEHATAN];
DROP TABLE IF EXISTS [MEMILIKI_PEKERJAAN];
DROP TABLE IF EXISTS [PEKERJAAN];
DROP TABLE IF EXISTS [BARANG_MEWAH];
DROP TABLE IF EXISTS [INVESTASI];
DROP TABLE IF EXISTS [KENDARAAN];
DROP TABLE IF EXISTS [PROPERTI];
DROP TABLE IF EXISTS [KEKAYAAN];
DROP TABLE IF EXISTS [WARGA_ASING];
DROP TABLE IF EXISTS [BPJS];
DROP TABLE IF EXISTS [PENDIDIKAN];
DROP TABLE IF EXISTS [PENDUDUK];
DROP TABLE IF EXISTS [KARTU_KELUARGA];

CREATE TABLE [KARTU_KELUARGA] (
	[NoKK] CHAR (16),
	[StatusAnggota] VARCHAR (24),
	[Nama_Ayah] VARCHAR (32),
	[Nama_Ibu] VARCHAR (32),

	PRIMARY KEY ([NoKK], [StatusAnggota]),
);

CREATE TABLE [PENDUDUK] (
	[NIK] CHAR (16),
	[NamaLengkap] VARCHAR (64),
	[Tempat_Lahir] VARCHAR (15),
	[Tanggal_Lahir] DATE,
	[NoKK] CHAR (16),
	[StatusAnggota] VARCHAR (24),
	[Alamat_Jalan] VARCHAR (32),
	[Alamat_RTRW] CHAR (11),
	[Alamat_Desa] VARCHAR (32),
	[Alamat_Kecamatan] VARCHAR (32),
	[Alamat_Kabupaten] VARCHAR (32),
	[Alamat_Provinsi] VARCHAR (32),
	[Alamat_KodePos] CHAR (5),
	[JenisKelamin] VARCHAR (10),
	[GolDarah] VARCHAR (2),
	[Kewarganegaraan] VARCHAR (32),
	[StatusPernikahan] VARCHAR (15),
	[Usia] INT,
	
	PRIMARY KEY ([NIK]),
	FOREIGN KEY ([NoKK], [StatusAnggota]) REFERENCES [KARTU_KELUARGA]([NoKK], [StatusAnggota])
);

CREATE TABLE [PENDIDIKAN] (
	[ID] INT,
	[NIK] CHAR (16),
	[PendidikanTerakhir_NamaInstansi] VARCHAR (15),
	[PendidikanTerakhir_Lokasi] VARCHAR (64),
	[PendidikanTerakhir_TahunLulus] INT,
	[PendidikanSekarang_NamaInstansi] VARCHAR (15),
	[PendidikanSekarang_Lokasi] VARCHAR (64),

	PRIMARY KEY ([ID]),
	FOREIGN KEY ([NIK]) REFERENCES [PENDUDUK]([NIK])
);

CREATE TABLE [BPJS] (
	[NoPeserta] VARCHAR (16),
	[NIK] CHAR (16),
	[Kelas] VARCHAR (10),

	PRIMARY KEY ([NoPeserta]),
	FOREIGN KEY ([NIK]) REFERENCES [PENDUDUK]([NIK])
);

CREATE TABLE [WARGA_ASING] (
	[NoPaspor] CHAR (16),
	[NIK] CHAR (16),
	[TglKedatangan] DATE,
	[TglKepulangan] DATE,
	[Tujuan] VARCHAR (32),

	PRIMARY KEY ([NoPaspor]),
	FOREIGN KEY ([NIK]) REFERENCES [PENDUDUK]([NIK])
);

CREATE TABLE [KEKAYAAN] (
	[ID] INT,
	[NIK] CHAR (16),
	[PendapatanPerTahun] DECIMAL,

	PRIMARY KEY ([ID]),
	FOREIGN KEY ([NIK]) REFERENCES [PENDUDUK]([NIK])
);

CREATE TABLE [PROPERTI] (
	[ID] INT, 
	[KekayaanID] INT,
	[Jenis] VARCHAR (15),
	[Luas] INT,
	[Lokasi] VARCHAR (128),
	[Harga] DECIMAL,

	PRIMARY KEY ([ID], [KekayaanID]),
	FOREIGN KEY ([KekayaanID]) REFERENCES [KEKAYAAN]([ID])
);

CREATE TABLE [KENDARAAN] (
	[ID] INT,
	[KekayaanID] INT,
	[Jenis_Nama] VARCHAR (15),
	[Jenis_Tipe] VARCHAR (15),
	[Jenis_CC] INT,
	[Jenis_BB] VARCHAR (17),
	[NJKB] DECIMAL,
	[Tahun] INT,

	PRIMARY KEY ([ID], [KekayaanID]),
	FOREIGN KEY ([KekayaanID]) REFERENCES [KEKAYAAN]([ID])
);

CREATE TABLE [INVESTASI] (
	[ID] INT,
	[KekayaanID] INT,
	[Jenis] VARCHAR (15),
	[Dividen] DECIMAL,

	PRIMARY KEY ([ID], [KekayaanID]),
	FOREIGN KEY ([KekayaanID]) REFERENCES [KEKAYAAN]([ID])
);

CREATE TABLE [BARANG_MEWAH] (
	[ID] INT,
	[KekayaanID] INT,
	[Jenis] VARCHAR (32),
	[Nilai] DECIMAL,

	PRIMARY KEY ([ID], [KekayaanID]),
	FOREIGN KEY ([KekayaanID]) REFERENCES [KEKAYAAN]([ID])
);

CREATE TABLE [PEKERJAAN] (
	[ID] INT,
	[NIK] CHAR (16),
	[KekayaanID] INT,
	[NamaPekerjaan] VARCHAR (20),
	[Jenis] VARCHAR (20),
	[GajiPerTahun] DECIMAL,
	[Alamat_Jalan] VARCHAR (32),
	[Alamat_RTRW] CHAR (11),
	[Alamat_Desa] VARCHAR (32),
	[Alamat_Kecamatan] VARCHAR (32),
	[Alamat_Kabupaten] VARCHAR (32),
	[Alamat_Provinsi] VARCHAR (32),
	[Alamat_KodePos] CHAR (5),
	[Perusahaan] VARCHAR (20),

	PRIMARY KEY ([ID]),
	FOREIGN KEY ([NIK]) REFERENCES [PENDUDUK]([NIK]),
	FOREIGN KEY ([KekayaanID]) REFERENCES [KEKAYAAN]([ID])
);

CREATE TABLE [MEMILIKI_PEKERJAAN] (
	[NIK] CHAR (16),
	[PekerjaanID] INT,
	[WaktuPerjalanan] INT,
	[JamKerjaPerMinggu] INT,

	PRIMARY KEY ([NIK], [PekerjaanID]),
	FOREIGN KEY ([NIK]) REFERENCES [PENDUDUK]([NIK]),
	FOREIGN KEY ([PekerjaanID]) REFERENCES [PEKERJAAN]([ID])
);

CREATE TABLE [KESEHATAN] (
	[ID] INT,
	[NIK] CHAR (16),
	[Alergi] VARCHAR (15),
	[Vaksinasi] VARCHAR (15),
	[Turunan] VARCHAR (15),
	[Fisik_Disabilitas] VARCHAR (15),
	[Fisik_Tinggi] INT,
	[Fisik_BeratBadan] INT,

	PRIMARY KEY ([ID]),
	FOREIGN KEY ([NIK]) REFERENCES [PENDUDUK]([NIK])
);

CREATE TABLE [PENYAKIT] (
	[ID] INT,
	[Nama] VARCHAR(128),
	[KesehatanID] INT,
	[TanggalDiagnosa] DATE,
	[Status] VARCHAR (12),
	[TanggalSembuh] DATE,

	PRIMARY KEY ([ID]),
	FOREIGN KEY ([KesehatanID]) REFERENCES [KESEHATAN]([ID])
);

CREATE TABLE [PERISTIWA_PENTING] (
	[ID] INT,
	[NIK] CHAR (16),
	[TanggalTerjadi] DATE,
	[NamaPeristiwa] VARCHAR (64),

	PRIMARY KEY ([ID]),
	FOREIGN KEY ([NIK]) REFERENCES [PENDUDUK]([NIK])
);

CREATE TABLE [PERCERAIAN] (
	[PeristiwaID] INT,
	[StatusGugatan] VARCHAR (12),
	[Alasan] VARCHAR (128),

	PRIMARY KEY ([PeristiwaID]),
	FOREIGN KEY ([PeristiwaID]) REFERENCES [PERISTIWA_PENTING]([ID])
);

CREATE TABLE [PERPINDAHAN] (
	[PeristiwaID] INT,
	[Asal] VARCHAR (15),
	[Tujuan] VARCHAR (15),

	PRIMARY KEY ([PeristiwaID]),
	FOREIGN KEY ([PeristiwaID]) REFERENCES [PERISTIWA_PENTING]([ID])
);

CREATE TABLE [KEMATIAN] (
	[PeristiwaID] INT,
	[Alamat_Jalan] VARCHAR (32),
	[Alamat_RTRW] CHAR (11),
	[Alamat_Desa] VARCHAR (32),
	[Alamat_Kecamatan] VARCHAR (32),
	[Alamat_Kabupaten] VARCHAR (32),
	[Alamat_Provinsi] VARCHAR (32),
	[Alamat_KodePos] CHAR (5),
	[Alasan] VARCHAR (128),

	PRIMARY KEY ([PeristiwaID]),
	FOREIGN KEY ([PeristiwaID]) REFERENCES [PERISTIWA_PENTING]([ID])
);

CREATE TABLE [PERUBAHAN_NAMA] (
	[PeristiwaID] INT,
	[NamaLama] VARCHAR (64),
	[Alasan] VARCHAR (128),

	PRIMARY KEY ([PeristiwaID]),
	FOREIGN KEY ([PeristiwaID]) REFERENCES [PERISTIWA_PENTING]([ID])
);

CREATE TABLE [PERUBAHAN_STATUSWN] (
	[PeristiwaID] INT,
	[StatusLama] VARCHAR (20),
	[Alasan] VARCHAR (128),

	PRIMARY KEY ([PeristiwaID]),
	FOREIGN KEY ([PeristiwaID]) REFERENCES [PERISTIWA_PENTING]([ID])
);

CREATE TABLE [PENGANGKATAN_ANAK] (
	[PeristiwaID] INT,
	[Alasan] VARCHAR (128),
	[NoKK] CHAR (16),
	[StatusAnggota] VARCHAR (24),

	PRIMARY KEY ([PeristiwaID]),
	FOREIGN KEY ([PeristiwaID]) REFERENCES [PERISTIWA_PENTING]([ID]),
	FOREIGN KEY ([NoKK], [StatusAnggota]) REFERENCES [KARTU_KELUARGA] ([NoKK], [StatusAnggota])
);

CREATE TABLE [KELAHIRAN] (
	[PeristiwaID] INT,
	[Berat] INT,
	[Kondisi] VARCHAR(16),
	[Alamat_Jalan] VARCHAR (32),
	[Alamat_RTRW] CHAR (11),
	[Alamat_Desa] VARCHAR (32),
	[Alamat_Kecamatan] VARCHAR (32),
	[Alamat_Kabupaten] VARCHAR (32),
	[Alamat_Provinsi] VARCHAR (32),
	[Alamat_KodePos] CHAR (5),
	[NamaAyah] VARCHAR (128),
	[NamaIbu] VARCHAR (128),
	[Pengesahan] VARCHAR (16),

	PRIMARY KEY ([PeristiwaID]),
	FOREIGN KEY ([PeristiwaID]) REFERENCES [PERISTIWA_PENTING]([ID])
);
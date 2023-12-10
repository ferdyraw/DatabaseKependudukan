DROP TABLE IF EXISTS [KARTU_KELUARGA];
DROP TABLE IF EXISTS [PENDUDUK];

CREATE TABLE [PENDUDUK] (
	[NIK] NVARCHAR (16),
	[Nama_Depan] NVARCHAR (16),
	[Nama_Tengah] NVARCHAR (16),
	[Nama_Belakang] NVARCHAR (16),
	[Tempat_Lahir] NVARCHAR (25),
	[Tanggal_Lahir] DATE,
	[Alamat_Jalan] NVARCHAR (16),
	[Alamat_RTRW] NVARCHAR (5),
	[Alamat_Desa] NVARCHAR (16),
	[Alamat_Kecamatan] NVARCHAR (16),
	[Alamat_Kabupaten] NVARCHAR (16),
	[Alamat_Provinsi] NVARCHAR (16),
	[Alamat_KodePos] INT,
	[Sex] NVARCHAR (10),
	[GolDarah] NVARCHAR (1),
	[Kewarganegaraan] NVARCHAR (20),
	[StatusPernikahan] NVARCHAR (15),
	[NoTelp] NVARCHAR (13)

	PRIMARY KEY ([NIK])
);

CREATE TABLE [PENDIDIKAN] (
	[PendidikanID] UNIQUEIDENTIFIER DEFAULT NEWID(),
	[NIK] NVARCHAR (16),
	[PendidikanTerakhir] NVARCHAR (10),
	[PendidikanSekarang] NVARCHAR (10),
	[Tahun_SD] INT,
	[Tahun_SMP] INT,
	[Tahun_SMA] INT,
	[Tahun_ST] INT,

	PRIMARY KEY ([PendidikanID]),
	FOREIGN KEY ([NIK]) REFERENCES [PENDUDUK]([NIK])
);

CREATE TABLE [BPJS] (
	[NoPeserta] NVARCHAR (16),
	[NIK] NVARCHAR (16),
	[Kelas] NVARCHAR (10),

	PRIMARY KEY ([NoPeserta]),
	FOREIGN KEY ([NIK]) REFERENCES [PENDUDUK]([NIK])
);

CREATE TABLE [PEKERJAAN] (
	[PekerjaanID] UNIQUEIDENTIFIER DEFAULT NEWID(),
	[NIK] NVARCHAR (16),
	[NamaPekerjaan] NVARCHAR (20),
	[Jenis] NVARCHAR (20),
	[GajiPerTahun] MONEY,
	[Lokasi] NVARCHAR (128),

	PRIMARY KEY ([PekerjaanID]),
	FOREIGN KEY ([NIK]) REFERENCES [PENDUDUK]([NIK])
);
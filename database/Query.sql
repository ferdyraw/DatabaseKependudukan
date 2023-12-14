SELECT 
    p.Alamat_Provinsi as Provinsi,
	p.Alamat_Kecamatan as Kecamatan,
	COUNT(p.NIK) as TotalPenduduk
FROM PENDUDUK p
JOIN PENDUDUK p2 ON p.NoKK = p2.NoKK
WHERE (p.StatusAnggota LIKE 'Anak%') AND (p2.StatusAnggota = 'Isteri' OR (p2.StatusAnggota = 'Kepala Kel' AND p2.StatusPernikahan = 'Janda')) AND ABS(p.Usia-p2.Usia) < 18
GROUP BY p.Alamat_Provinsi, p.Alamat_Kecamatan;
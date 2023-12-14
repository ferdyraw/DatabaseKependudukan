<?php
$nik = "";
$nama = "";
$tempat_lahir = "";
$tanggal_lahir = "";
$no_kk = "";
$status_anggota = "";
$jalan = "";
$rtrw = "";
$desa = "";
$kecamatan = "";
$kabupaten = "";
$provinsi = "";
$kodepos = "";
$jenis_kelamin = "";
$gol_darah = "";
$kewarganegaraan = "";
$status_pernikahan = "";
$success = "";
$error = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if ($op == 'delete') {
    if (isset($_GET['id'])) {
        $pk = $_GET['id'];
        $sql1 = "DELETE FROM PENDUDUK WHERE NIK='$pk'";
        $q1 = sqlsrv_query($conn, $sql1);

        if ($q1) {
            $success = "Berhasil hapus data";
        } else {
            $error = "Gagal hapus data";
        }
    }
}

if ($op == 'update') {
    if (isset($_GET['id'])) {
        $pk    = $_GET['id'];
        $sql1   = "SELECT * FROM PENDUDUK WHERE NIK='$pk'";
        $q1     = sqlsrv_query($conn, $sql1);
  
        $r1 = sqlsrv_fetch_array($q1);
        $nik = $r1['NIK'];
        $nama = $r1['NamaLengkap'];
        $tempat_lahir = $r1['Tempat_Lahir'];
        //$tanggal_lahir = $r1['Tanggal_Lahir'];
        $no_kk = $r1['NoKK'];
        $status_anggota = $r1['StatusAnggota'];
        $jalan = $r1['Alamat_Jalan'];
        $rtrw = $r1['Alamat_RTRW'];
        $desa = $r1['Alamat_Desa'];
        $kecamatan = $r1['Alamat_Kecamatan'];
        $kabupaten = $r1['Alamat_Kabupaten'];
        $provinsi = $r1['Alamat_Provinsi'];
        $kodepos = $r1['Alamat_KodePos'];
        $jenis_kelamin = $r1['JenisKelamin'];
        $gol_darah = $r1['GolDarah'];
        $kewarganegaraan = $r1['Kewarganegaraan'];
        $status_pernikahan = $r1['StatusPernikahan'];

    } else {
        $error = "Data tidak ditemukan";
    }
}

if (isset($_POST['simpan'])) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama_lengkap'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $no_kk = $_POST['no_kk'];
    $status_anggota = $_POST['status_anggota'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $gol_darah = $_POST['gol_darah'];
    $kewarganegaraan = $_POST['kewarganegaraan'];
    $status_pernikahan = $_POST['status_pernikahan'];
    $jalan = $_POST['jalan'];
    $rtrw = $_POST['rtrw'];
    $desa = $_POST['desa'];
    $kecamatan = $_POST['kecamatan'];
    $kabupaten = $_POST['kabupaten'];
    $provinsi = $_POST['provinsi'];
    $kodepos = $_POST['kodepos'];

    if ($nik && $nama && $tempat_lahir && $tanggal_lahir && $no_kk && $status_anggota && $jenis_kelamin && $gol_darah && $kewarganegaraan && $status_pernikahan && $jalan && $rtrw && $desa && $kecamatan && $kabupaten && $provinsi && $kodepos) {
        if ($op == 'update') {
            $sql1 = "UPDATE PENDUDUK 
            SET NamaLengkap='$nama', 
            Tempat_Lahir='$tempat_lahir',
            Tanggal_Lahir='$tanggal_lahir', 
            NoKK='$no_kk',
            StatusAnggota='$status_anggota',
            Alamat_Jalan='$jalan', 
            Alamat_RTRW='$rtrw',
            Alamat_Desa='$desa',
            Alamat_Kecamatan='$kecamatan',
            Alamat_Kabupaten='$kabupaten',
            Alamat_Provinsi='$provinsi',
            Alamat_KodePos='$kodepos',
            JenisKelamin='$jenis_kelamin',
            GolDarah='$gol_darah',
            Kewarganegaraan='$kewarganegaraan', 
            StatusPernikahan='$status_pernikahan'

            WHERE NIK='$nik'";
            $q1 = sqlsrv_query($conn, $sql1);

            if ($q1) {
                $success = "Data berhasil diupdate";
            } else {
                $error = "Data gagal diupdate";
            }
        } else {
            $sql1 = "INSERT INTO [PENDUDUK] ([NIK], [NamaLengkap], [Tempat_Lahir], [Tanggal_Lahir], [NoKK],
                [StatusAnggota], [Alamat_Jalan], [Alamat_RTRW],  [Alamat_Desa], [Alamat_Kecamatan],  [Alamat_Kabupaten], 
                [Alamat_Provinsi], [Alamat_KodePos], [JenisKelamin], [GolDarah], [Kewarganegaraan], [StatusPernikahan]) 
            VALUES
            ('$nik', '$nama', '$tempat_lahir', '$tanggal_lahir', '$no_kk',
                '$status_anggota', '$jalan', '$rtrw', '$desa', '$kecamatan', '$kabupaten',
                '$provinsi', '$kodepos', '$jenis_kelamin', '$gol_darah', '$kewarganegaraan',
                '$status_pernikahan')";
            $q1 = sqlsrv_query($conn, $sql1);

            if ($q1) {
                $success = "Berhasil memasukkan data baru";
            } else {
                $error = "Gagal memasukkan data baru";
            }
        }
    } else {
        $error = "Silahkan masukkan data Anda";
    }
}
?>

<div class="mx-auto">
        <div class="card">
            <div class="card-header">
                Create / Edit Data
            </div>
            <div class="card-body">
                <?php
                if ($error) {
                ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error ?>
                </div>
                <?php
                    //header("refresh:5;url=index.php");
                }

                ?>
                <?php
                if ($success) {
                ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $success ?>
                </div>
                <?php
                }
                    //header("refresh:5;url=index.php");
                ?>

                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nik" name="nik" value="<?php echo $nik ?>"
                                placeholder="Masukkan NIK">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama_lengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                                value="<?php echo $nama ?>" placeholder="Masukkan nama">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                value="<?php echo $tempat_lahir ?>" placeholder="Masukkan tempat lahir">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                value="<?php echo $tanggal_lahir ?>" placeholder="Masukkan tanggal lahir">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="no_kk" class="col-sm-2 col-form-label">No. KK</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="no_kk" name="no_kk" value="<?php echo $no_kk ?>"
                                placeholder="Masukkan nomor KK">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="status_anggota" class="col-sm-2 col-form-label">Status Anggota</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="status_anggota" name="status_anggota"
                                value="<?php echo $status_anggota ?>"
                                placeholder="Masukkan status anggota dalam KK">
                        </div>
                    </div>

                    <div class="mb-0 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    </div>

                    <div class="mb-1 row">
                        <label for="jalan" class="col-sm-2 col-form-label">Jalan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="jalan" name="jalan" value="<?php echo $jalan ?>"
                                placeholder="Masukkan alamat jalan">
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="rtrw" class="col-sm-2 col-form-label">RT/RW</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="rtrw" name="rtrw" value="<?php echo $rtrw ?>"
                                placeholder="Masukkan alamat rt/rw">
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="desa" class="col-sm-2 col-form-label">Desa</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="desa" name="desa" value="<?php echo $desa ?>"
                                placeholder="Masukkan alamat desa">
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="kecamatan" class="col-sm-2 col-form-label">Kecamatan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kecamatan" name="kecamatan"
                                value="<?php echo $kecamatan ?>" placeholder="Masukkan alamat kecamatan">
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="kabupaten" class="col-sm-2 col-form-label">Kabupaten</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kabupaten" name="kabupaten"
                                value="<?php echo $kabupaten ?>" placeholder="Masukkan alamat kabupaten">
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="provinsi" class="col-sm-2 col-form-label">Provinsi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="provinsi" name="provinsi"
                                value="<?php echo $provinsi ?>" placeholder="Masukkan alamat provinsi">
                        </div>
                    </div>
                    <div class="mb-4 row">
                        <label for="kodepos" class="col-sm-2 col-form-label">Kode Pos</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kodepos" name="kodepos"
                                value="<?php echo $kodepos ?>" placeholder="Masukkan alamat kode pos">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin"
                                value="<?php echo $jenis_kelamin ?>" placeholder="Masukkan jenis kelamin">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="gol_darah" class="col-sm-2 col-form-label">Golongan Darah</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="gol_darah" name="gol_darah"
                                value="<?php echo $gol_darah ?>" placeholder="Masukkan golongan darah">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="kewarganegaraan" class="col-sm-2 col-form-label">Kewarganegaraan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kewarganegaraan" name="kewarganegaraan"
                                value="<?php echo $kewarganegaraan ?>" placeholder="Masukkan kewarganegaraan">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="status_pernikahan" class="col-sm-2 col-form-label">Status Pernikahan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="status_pernikahan" name="status_pernikahan"
                                value="<?php echo $status_pernikahan ?>" placeholder="Masukkan status pernikahan">
                        </div>
                    </div>

                    <div class="col-12">
                        <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header text-white bg-secondary">
                Tabel Penduduk
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">NIK</th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">Tempat Lahir</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">No. KK</th>
                            <th scope="col">Status Anggota</th>
                            <th scope="col">Jalan</th>
                            <th scope="col">RT/RW</th>
                            <th scope="col">Desa</th>
                            <th scope="col">Kecamatan</th>
                            <th scope="col">Kabupaten</th>
                            <th scope="col">Provinsi</th>
                            <th scope="col">Kode Pos</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Gol. Darah</th>
                            <th scope="col">Kewarganegaraan</th>
                            <th scope="col">Status Pernikahan</th>
                            <th scope="col">Usia</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    <tbody>
                        <?php
                            $sql2 = "SELECT * FROM PENDUDUK";
                            $q2 = sqlsrv_query($conn, $sql2);
                            $urut = 1;
                            while ($r2 = sqlsrv_fetch_array($q2)) {
                                $nik = $r2['NIK'];
                                $nama = $r2['NamaLengkap'];
                                $tempat_lahir = $r2['Tempat_Lahir'];
                                $tanggal_lahir = $r2['Tanggal_Lahir'];
                                $no_kk = $r2['NoKK'];
                                $status_anggota = $r2['StatusAnggota'];
                                $jalan = $r2['Alamat_Jalan'];
                                $rtrw = $r2['Alamat_RTRW'];
                                $desa = $r2['Alamat_Desa'];
                                $kecamatan = $r2['Alamat_Kecamatan'];
                                $kabupaten = $r2['Alamat_Kabupaten'];
                                $provinsi = $r2['Alamat_Provinsi'];
                                $kodepos = $r2['Alamat_KodePos'];
                                $jenis_kelamin = $r2['JenisKelamin'];
                                $gol_darah = $r2['GolDarah'];
                                $kewarganegaraan = $r2['Kewarganegaraan'];
                                $status_pernikahan = $r2['StatusPernikahan'];
                                $usia = $r2['Usia'];

                                $tanggal_lahir = $tanggal_lahir->format('d/m/Y');
                        ?>
                        <tr>
                            <th scope="row"><?php echo $urut++ ?></th>
                            <td scope="row"><?php echo $nik ?></td>
                            <td scope="row"><?php echo $nama ?></td>
                            <td scope="row"><?php echo $tempat_lahir ?></td>
                            <td scope="row"><?php echo $tanggal_lahir ?></td>
                            <td scope="row"><?php echo $no_kk ?></td>
                            <td scope="row"><?php echo $status_anggota ?></td>
                            <td scope="row"><?php echo $jalan ?></td>
                            <td scope="row"><?php echo $rtrw ?></td>
                            <td scope="row"><?php echo $desa ?></td>
                            <td scope="row"><?php echo $kecamatan ?></td>
                            <td scope="row"><?php echo $kabupaten ?></td>
                            <td scope="row"><?php echo $provinsi ?></td>
                            <td scope="row"><?php echo $kodepos ?></td>
                            <td scope="row"><?php echo $jenis_kelamin ?></td>
                            <td scope="row"><?php echo $gol_darah ?></td>
                            <td scope="row"><?php echo $kewarganegaraan ?></td>
                            <td scope="row"><?php echo $status_pernikahan ?></td>
                            <td scope="row"><?php echo $usia ?></td>

                            <td scope="row">
                                <a href="index.php/?url=penduduk&op=update&id=<?php echo $nik?>"><button type="button"
                                        class="btn btn-danger">Update</button></a>
                                <a href="index.php/?url=penduduk&op=delete&id=<?php echo $nik?>"
                                    onclick="return confirm('Yakin mau delete data?')"><button type="button"
                                        class="btn btn-dark">Delete</button></a>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </div>
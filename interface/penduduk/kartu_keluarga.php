<?php
$no_kk = "";
$status_anggota = "";
$nama_ayah = "";
$nama_ibu = "";
$success = "";
$error = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if ($op == 'delete') {
    if (isset($_GET['id1'])) {
        $pk1 = $_GET['id1'];
        $pk2 = $_GET['id2'];
        $pk2 = str_replace('_', ' ', $pk2);

        $sql1 = "DELETE FROM KARTU_KELUARGA WHERE NoKK='$pk1' AND StatusAnggota='$pk2'";
        $q1 = sqlsrv_query($conn, $sql1);

        if ($q1) {
            $success = "Berhasil hapus data";
        } else {
            $error = "Gagal hapus data";
        }
    }
}

if ($op == 'update') {
    if (isset($_GET['id1'])) {
        $pk1 = $_GET['id1'];
        $pk2 = $_GET['id2'];
        $pk2 = str_replace('_', ' ', $pk2);

        $sql1   = "SELECT * FROM KARTU_KELUARGA WHERE NoKK='$pk1' AND StatusAnggota='$pk2'";
        $q1     = sqlsrv_query($conn, $sql1);
  
        $r1 = sqlsrv_fetch_array($q1);
        $no_kk = $r1['NoKK'];
        $status_anggota = $r1['StatusAnggota'];
        $nama_ayah = $r1['Nama_Ayah'];
        $nama_ibu = $r1['Nama_Ibu'];

    } else {
        $error = "Data tidak ditemukan";
    }
}

if (isset($_POST['simpan'])) {
    $no_kk = $_POST['no_kk'];
    $status_anggota = $_POST['status_anggota'];
    $nama_ayah = $_POST['nama_ayah'];
    $nama_ibu = $_POST['nama_ibu'];

    if ($no_kk && $status_anggota && $nama_ayah && $nama_ibu) {
        if ($op == 'update') {
            $sql1 = "UPDATE KARTU_KELUARGA 
            SET Nama_Ayah='$nama_ayah', Nama_Ibu='$nama_ibu'
            WHERE NoKK='$no_kk' AND StatusAnggota='$status_anggota'";
            $q1 = sqlsrv_query($conn, $sql1);

            if ($q1) {
                $success = "Data berhasil diupdate";
            } else {
                $error = "Data gagal diupdate";
            }
        } else {
            $sql1 = "INSERT INTO [KARTU_KELUARGA] ([NoKK], [StatusAnggota], [Nama_Ayah], [Nama_Ibu]) 
            VALUES
            ('$no_kk', '$status_anggota', '$nama_ayah', '$nama_ibu')";
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
                    //header("refresh:5;url='index.php?url=kartu_keluarga'");
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
                    //header("refresh:5;url='index.php?url=kartu_keluarga'");
                ?>

                <form action="" method="POST">
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

                    <div class="mb-3 row">
                        <label for="nama_ayah" class="col-sm-2 col-form-label">Nama Ayah</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_ayah" name="nama_ayah"
                                value="<?php echo $nama_ayah ?>"
                                placeholder="Masukkan nama Ayah">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nama_ibu" class="col-sm-2 col-form-label">Nama Ibu</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_ibu" name="nama_ibu"
                                value="<?php echo $nama_ibu ?>"
                                placeholder="Masukkan nama Ibu">
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
                Tabel Kartu Keluarga
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">No. KK</th>
                            <th scope="col">Status Anggota</th>
                            <th scope="col">Nama Ayah</th>
                            <th scope="col">Nama Ibu</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    <tbody>
                        <?php
                            $sql2 = "SELECT * FROM KARTU_KELUARGA";
                            $q2 = sqlsrv_query($conn, $sql2);
                            $urut = 1;
                            while ($r2 = sqlsrv_fetch_array($q2)) {
                                $no_kk = $r2['NoKK'];
                                $status_anggota = $r2['StatusAnggota'];
                                $nama_ayah = $r2['Nama_Ayah'];
                                $nama_ibu = $r2['Nama_Ibu'];
                        ?>
                        <tr>
                            <th scope="row"><?php echo $urut++ ?></th>
                            <td scope="row"><?php echo $no_kk ?></td>
                            <td scope="row"><?php echo $status_anggota ?></td>
                            <td scope="row"><?php echo $nama_ayah ?></td>
                            <td scope="row"><?php echo $nama_ibu ?></td>

                            <td scope="row">
                                <a href="index.php?url=kartu_keluarga&op=update&id1=<?php echo $no_kk?>&id2=<?php echo str_replace(' ', '_', $status_anggota)?>"><button type="button"
                                        class="btn btn-danger">Update</button></a>
                                <a href="index.php?url=kartu_keluarga&op=delete&id1=<?php echo $no_kk?>&id2=<?php echo str_replace(' ', '_', $status_anggota)?>"
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
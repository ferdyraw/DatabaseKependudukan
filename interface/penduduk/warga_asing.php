<?php
$no_paspor = "";
$nik = "";
$tgl_kedatangan = "";
$tgl_kepulangan = "";
$tujuan = "";
$error = "";
$success = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if ($op == 'delete') {
    if (isset($_GET['id'])) {
        $pk1 = $_GET['id'];

        $sql1 = "DELETE FROM WARGA_ASING WHERE NoPaspor='$pk'";
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
        $pk1 = $_GET['id'];

        $sql1   = "SELECT * FROM WARGA_ASING WHERE NoPaspor='$pk'";
        $q1     = sqlsrv_query($conn, $sql1);
  
        $r1 = sqlsrv_fetch_array($q1);
        $no_paspor = $r1['NoPaspor'];
        $nik = $r1['NIK'];
        $tgl_kedatangan = $r1['TglKedatangan'];
        $tgl_kepulangan = $r1['TglKepulangan'];
        $tujuan = $r1['Tujuan'];

    } else {
        $error = "Data tidak ditemukan";
    }
}

if (isset($_POST['simpan'])) {
    $no_paspor = $_POST['no_paspor'];
    $nik = $_POST['nik'];
    $tgl_kedatangan = $_POST['tgl_kedatangan'];
    $tgl_kepulangan = $_POST['tgl_kepulangan'];
    $tujuan = $_POST['tujuan'];

    if ($no_paspor && $nik && $tgl_kedatangan && $tgl_kepulangan && $tujuan) {
        if ($op == 'update') {
            $sql1 = "UPDATE WARGA_ASING
            SET TglKedatangan='$tgl_kedatangan', TglKepulangan='$tgl_kepulangan', Tujuan='$tujuan'
            WHERE NoPaspor='$no_paspor'";
            $q1 = sqlsrv_query($conn, $sql1);

            if ($q1) {
                $success = "Data berhasil diupdate";
            } else {
                $error = "Data gagal diupdate";
            }
        } else {
            $sql1 = "INSERT INTO [WARGA_ASING] ([NoPaspor], [NIK], [TglKedatangan], [TglKepulangan], [Tujuan]) 
            VALUES
            ('$no_paspor', '$nik', '$tgl_kedatangan', '$tgl_kepulangan', '$tujuan')";
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
                        <label for="no_paspor" class="col-sm-2 col-form-label">No. Paspor</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="no_paspor" name="no_paspor" value="<?php echo $no_paspor ?>"
                                placeholder="Masukkan nomor paspor">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nik" name="nik"
                                value="<?php echo $nik ?>"
                                placeholder="Masukkan NIK">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="tgl_kedatangan" class="col-sm-2 col-form-label">Tanggal Kedatangan</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="tgl_kedatangan" name="tgl_kedatangan"
                                value="<?php echo $tgl_kedatangan ?>"
                                placeholder="Masukkan tanggal kedatangan">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="tgl_kepulangan" class="col-sm-2 col-form-label">Tanggal Kepulangan</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="tgl_kepulangan" name="tgl_kepulangan"
                                value="<?php echo $tgl_kepulangan ?>"
                                placeholder="Masukkan tanggal kepulangan">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="tujuan" class="col-sm-2 col-form-label">Tujuan</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="tujuan" rows="3" name="tujuan"
                                value="<?php echo $tujuan ?>" placeholder="Masukkan tujuan"></textarea>
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
                Tabel Warga Asing
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">No. Paspor</th>
                            <th scope="col">NIK</th>
                            <th scope="col">Tgl Kedatangan</th>
                            <th scope="col">Tgl Kepulangan</th>
                            <th scope="col">Tujuan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    <tbody>
                        <?php
                            $sql2 = "SELECT * FROM WARGA_ASING";
                            $q2 = sqlsrv_query($conn, $sql2);
                            $urut = 1;
                            while ($r2 = sqlsrv_fetch_array($q2)) {
                                $no_paspor = $r2['NoPaspor'];
                                $nik = $r2['NIK'];
                                $tgl_kedatangan = $r2['TglKedatangan'];
                                $tgl_kepulangan = $r2['TglKepulangan'];
                                $tujuan = $r2['Tujuan'];

                                $tgl_kedatangan = $tgl_kedatangan->format('d/m/Y');
                                $tgl_kepulangan = $tgl_kepulangan->format('d/m/Y');
                        ?>
                        <tr>
                            <th scope="row"><?php echo $urut++ ?></th>
                            <td scope="row"><?php echo $no_paspor ?></td>
                            <td scope="row"><?php echo $nik ?></td>
                            <td scope="row"><?php echo $tgl_kedatangan ?></td>
                            <td scope="row"><?php echo $tgl_kepulangan ?></td>
                            <td scope="row"><?php echo $tujuan ?></td>

                            <td scope="row">
                                <a href="index.php?url=warga_asing&op=update&id1=<?php echo $no_paspor?>"><button type="button"
                                        class="btn btn-danger">Update</button></a>
                                <a href="index.php?url=warga_asing&op=delete&id=<?php echo $no_paspor?>"
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
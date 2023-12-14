<?php
$id = null;
$nik = "";
$alergi = "";
$vaksinasi = "";
$turunan = "";
$fisik_disabilitas = "";
$fisik_tinggi = null;
$fisik_beratbadan = null;
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

        $sql1 = "DELETE FROM KESEHATAN WHERE ID='$pk'";
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

        $sql1   = "SELECT * FROM KESEHATAN WHERE ID='$pk'";
        $q1     = sqlsrv_query($conn, $sql1);
  
        $r1 = sqlsrv_fetch_array($q1);
        $id = $r1['ID'];
        $nik = $r1['NIK'];
        $alergi = $r1['Alergi'];
        $vaksinasi = $r1['Vaksinasi'];
        $turunan = $r1['Turunan'];
        $fisik_disabilitas = $r1['Fisik_Disabilitas'];
        $fisik_tinggi = $r1['Fisik_Tinggi'];
        $fisik_beratbadan = $r1['Fisik_BeratBadan'];
    } else {
        $error = "Data tidak ditemukan";
    }
}

if (isset($_POST['simpan'])) {
    $nik = $_POST['nik'];
    $alergi = $_POST['alergi'];
    $vaksinasi = $_POST['vaksinasi'];
    $turunan = $_POST['turunan'];
    $fisik_disabilitas = $_POST['fisik_disabilitas'];
    $fisik_tinggi = $_POST['fisik_tinggi'];
    $fisik_beratbadan = $_POST['fisik_beratbadan'];

    if ($nik && $alergi && $vaksinasi && $turunan && $fisik_disabilitas && $fisik_tinggi && $fisik_beratbadan) {
        if ($op == 'update') {
            $sql1 = "UPDATE KESEHATAN
            SET Alergi='$alergi', Vaksinasi='$vaksinasi', Turunan='$turunan', 
            Fisik_Disabilitas='$fisik_disabilitas', Fisik_Tinggi='$fisik_tinggi', Fisik_BeratBadan='$fisik_beratbadan'
            WHERE ID='$id'";
            $q1 = sqlsrv_query($conn, $sql1);

            if ($q1) {
                $success = "Data berhasil diupdate";
            } else {
                $error = "Data gagal diupdate";
            }
        } else {
            $sql1 = "INSERT INTO [KESEHATAN] ([NIK], [Alergi], [Vaksinasi], [Turunan],
                [Fisik_Disabilitas], [Fisik_Tinggi], [Fisik_BeratBadan]) 
            VALUES
            ('$nik', '$alergi', '$vaksinasi', '$turunan', '$fisik_disabilitas',
            '$fisik_tinggi', '$fisik_beratbadan')";
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
                        <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nik" name="nik"
                                value="<?php echo $nik ?>"
                                placeholder="Masukkan NIK">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="alergi" class="col-sm-2 col-form-label">Alergi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="alergi" name="alergi"
                                value="<?php echo $alergi ?>"
                                placeholder="Masukkan alergi">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="vaksinasi" class="col-sm-2 col-form-label">Vaksinasi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="vaksinasi" name="vaksinasi"
                                value="<?php echo $vaksinasi ?>"
                                placeholder="Masukkan vaksinasi">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="turunan" class="col-sm-2 col-form-label">Turunan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="turunan" name="turunan"
                                value="<?php echo $turunan ?>"
                                placeholder="Masukkan turunan">
                        </div>
                    </div>

                    <div class="mb-0 row">
                        <label for="fisik" class="col-sm-2 col-form-label">Fisik</label>
                    </div>

                    <div class="mb-1 row">
                        <label for="fisik_disabilitas" class="col-sm-2 col-form-label">Disabilitas</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="fisik_disabilitas" name="fisik_disabilitas"
                                value="<?php echo $fisik_disabilitas ?>"
                                placeholder="Masukkan disabilitas">
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="fisik_tinggi" class="col-sm-2 col-form-label">Tinggi</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="fisik_tinggi" name="fisik_tinggi"
                                value="<?php echo $fisik_tinggi ?>"
                                placeholder="Masukkan tinggi">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="fisik_beratbadan" class="col-sm-2 col-form-label">Berat Badan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="fisik_beratbadan" name="fisik_beratbadan"
                                value="<?php echo $fisik_beratbadan ?>"
                                placeholder="Masukkan berat badan">
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
                Tabel Kesehatan
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">NIK</th>
                            <th scope="col">Alergi</th>
                            <th scope="col">Vaksinasi</th>
                            <th scope="col">Turunan</th>
                            <th scope="col">Disabilitas</th>
                            <th scope="col">Tinggi</th>
                            <th scope="col">Berat Badan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    <tbody>
                        <?php
                            $sql2 = "SELECT * FROM KESEHATAN";
                            $q2 = sqlsrv_query($conn, $sql2);
                            while ($r2 = sqlsrv_fetch_array($q2)) {
                                $id = $r2['ID'];
                                $nik = $r2['NIK'];
                                $alergi = $r2['Alergi'];
                                $vaksinasi = $r2['Vaksinasi'];
                                $turunan = $r2['Turunan'];
                                $fisik_disabilitas = $r2['Fisik_Disabilitas'];
                                $fisik_tinggi = $r2['Fisik_Tinggi'];
                                $fisik_beratbadan = $r2['Fisik_BeratBadan'];
                        ?>
                        <tr>
                            <th scope="row"><?php echo $id ?></th>
                            <td scope="row"><?php echo $nik ?></td>
                            <td scope="row"><?php echo $alergi ?></td>
                            <td scope="row"><?php echo $vaksinasi ?></td>
                            <td scope="row"><?php echo $turunan ?></td>
                            <td scope="row"><?php echo $fisik_disabilitas ?></td>
                            <td scope="row"><?php echo $fisik_tinggi ?></td>
                            <td scope="row"><?php echo $fisik_beratbadan ?></td>

                            <td scope="row">
                                <a href="index.php?url=kesehatan&op=update&id1=<?php echo $id?>"><button type="button"
                                        class="btn btn-danger">Update</button></a>
                                <a href="index.php?url=kesehatan&op=delete&id=<?php echo $id?>"
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
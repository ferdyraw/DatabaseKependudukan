<?php

$serverName = "FERDY";
$database = "KEPENDUDUKAN";
$uid = "";
$pass = "";

$connection = [
    "Database" => $database,
    "uid" => $uid,
    "PWD" => $pass
];

$conn = sqlsrv_connect($serverName, $connection);
if (!$conn)
    die(print_r(sqlsrv_error(), true));

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kependudukan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
        integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous">
    </script>
    <style>
    h1.Judul {
        text-align: center;
        margin-bottom: 20px;
        margin-top: 15px;
    }

    .container {
        width: 1600px;
    }

    .card {
        margin-top: 10px;
    }
    </style>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="http://localhost/kependudukan">Database Kependudukan</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Penduduk
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="?url=kartu_keluarga">Kartu Keluarga</a></li>
                                <li><a class="dropdown-item" href="?url=penduduk">Penduduk</a></li>
                                <li><a class="dropdown-item" href="?url=warga_asing">Warga Asing</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Peristiwa Penting
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="?url=peristiwa">Peristiwa</a></li>
                                <li><a class="dropdown-item" href="?url=kelahiran">Kelahiran</a></li>
                                <li><a class="dropdown-item" href="?url=kematian">Kematian</a></li>
                                <li><a class="dropdown-item" href="?url=perceraian">Perceraian</a></li>
                                <li><a class="dropdown-item" href="?url=perpindahan">Perpindahan</a></li>
                                <li><a class="dropdown-item" href="?url=pengangkatan">Pengangkatan</a></li>
                                <li><a class="dropdown-item" href="?url=perubahan_nama">Perubahan Nama</a></li>
                                <li><a class="dropdown-item" href="?url=perubahan_statuswn">Perubahan Status WN</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Kekayaan
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="?url=kekayaan">Kekayaan</a></li>
                                <li><a class="dropdown-item" href="?url=properti">Properti</a></li>
                                <li><a class="dropdown-item" href="?url=kendaraan">Kendaraan</a></li>
                                <li><a class="dropdown-item" href="?url=investasi">Investasi</a></li>
                                <li><a class="dropdown-item" href="?url=barang_mewah">Barang Mewah</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Pekerjaan
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="?url=pekerjaan">Pekerjaan</a></li>
                                <li><a class="dropdown-item" href="?url=memiliki_pekerjaan">Memiliki_Pekerjaan</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Kesehatan
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="?url=kesehatan">Kesehatan</a></li>
                                <li><a class="dropdown-item" href="?url=bpjs">BPJS</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Riwayat
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="?url=penyakit">Penyakit</a></li>
                                <li><a class="dropdown-item" href="?url=pendidikan">Pendidikan</a></li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="?url=query">Query</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <div class="container">
        <?php
        if (isset($_GET['url'])) {
            $url=$_GET['url'];
            switch ($url) {
                case 'penduduk':
                    include "penduduk/penduduk.php";
                    break;
                case 'kartu_keluarga':
                    include "penduduk/kartu_keluarga.php";
                    break;
                case 'warga_asing':
                    include 'penduduk/warga_asing.php';
                    break;
                case 'peristiwa':
                    include 'peristiwa/peristiwa.php';
                    break;
                case 'kelahiran':
                    include 'peristiwa/kelahiran.php';
                    break;
                case 'kematian':
                    include 'peristiwa/kematian.php';
                    break;
                case 'perceraian':
                    include 'peristiwa/perceraian.php';
                    break;
                case 'perpindahan':
                    include 'peristiwa/perpindahan.php';
                    break;
                case 'pengangkatan':
                    include 'peristiwa/pengangkatan.php';
                    break;
                case 'perubahan':
                    include 'peristiwa/perubahan_nama.php';
                    break;
                case 'perubahan_statuswn':
                    include 'peristiwa/perubahan_statuswn.php';
                    break;
                case 'kekayaan':
                    include 'kekayaan/kekayaan.php';
                    break;
                case 'properti':
                    include 'kekayaan/properti.php';
                    break;
                case 'kendaraan':
                    include 'kekayaan/kendaraan.php';
                    break;
                case 'investasi':
                    include 'kekayaan/investasi.php';
                    break;
                case 'barang_mewah':
                    include 'kekayaan/barang_mewah.php';
                    break;  
                case 'pekerjaan':
                    include 'pekerjaan/pekerjaan.php';
                    break;
                case 'memiliki_pekerjaan':
                    include 'pekerjaan/memiliki_pekerjaan.php';
                    break;   
                case 'kesehatan':
                    include 'kesehatan/kesehatan.php';
                    break;   
                case 'bpjs':
                    include 'kesehatan/bpjs.php';
                    break; 
                case 'penyakit':
                    include 'riwayat/penyakit.php';
                    break;               
                case 'pendidikan':
                    include 'riwayat/pendidikan.php';
                    break; 
                case 'query':
                    include 'query.php';
                    break;
                default:
                    break;
            }
        }
        ?>
    </div>
</body>

</html>
<?php
require_once('../htdocs/si_sekolah/config/koneksi.php');
require_once('../htdocs/si_sekolah/models/database.php');
include "../htdocs/si_sekolah/models/ModelNilaiSiswa.php";

$connection = new Database($host, $user, $pass, $database);
$nilai_siswa = new NilaiSiswa($connection);
?>
<!doctype html>
<html>
    <head>
        <title>MAN 1 Pringsewu - SIMALA - Nilai Siswa</title>
        <link rel="stylesheet" href="../style.css">
        <link rel="icon" type="img/png" href="../logo man 1 pringsewu.png" sizes="16x16">
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../htdocs/si_sekolah/assets/plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet" href="../htdocs/si_sekolah/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="../htdocs/si_sekolah/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- JQVMap -->
        <link rel="stylesheet" href="../htdocs/si_sekolah/assets/plugins/jqvmap/jqvmap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../htdocs/si_sekolah/assets/dist/css/adminlte.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="../htdocs/si_sekolah/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="../htdocs/si_sekolah/assets/plugins/daterangepicker/daterangepicker.css">
        <!-- summernote -->
        <link rel="stylesheet" href="../htdocs/si_sekolah/assets/plugins/summernote/summernote-bs4.min.css">
        <!-- SweetAlert2 -->
        <link rel="stylesheet" href="../htdocs/si_sekolah/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
        <!-- Toastr -->
        <link rel="stylesheet" href="../htdocs/si_sekolah/assets/plugins/toastr/toastr.min.css">
    </head>

    <body>
    <div id="header">
            Sistem Informasi Sekolah<br>
            MAN  1 Pringsewu
        </div>
        <div id ="menu">
            <ul>
                <li class="utama"><a href="dashboard.php">Beranda</a></li>
                <li class="utama"><a href="">Konfigurasi</a>
                    <ul>
                        <li><a href="NilaiSiswa.php">Nilai Siswa</a></li>
                    </ul>
                </li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </div>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Nilai Siswa</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard.php"><i class="fa fa-home"></i>Home</a></li>
                            <li class="breadcrumb-item">Konfigurasi</li>
                            <li class="breadcrumb-item active"><a href="NilaiSiswa.php">Nilai Siswa</a></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <div id="isi">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr align="center">
                                                <th>No.</th>
                                                <th>NISN</th>
                                                <th>Nama</th>
                                                <th>Kelas</th>
                                                <th>Semester</th>
                                                <th>Mata Pelajaran</th>
                                                <th>Nilai</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $no = 1;
                                        $tampil = $nilai_siswa->tampil();
                                        while($data = $tampil->fetch_object()){
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td align="center"><?php echo $no++; ?></td>
                                                <td><?php echo $data->NISN; ?></td>
                                                <td><?php echo $data->Nama; ?></td>
                                                <td><?php echo $data->Kelas; ?></td>
                                                <td><?php echo $data->Semester; ?></td>
                                                <td><?php echo $data->Mata_Pelajaran; ?></td>
                                                <td><?php echo $data->Nilai; ?></td>
                                            </tr>
                                        </tbody>
                                        <?php
                                        } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> 
        </div>
        <div id="footer">
            <strong>Copyright &copy; 2022 </a>.</strong>
                All rights reserved.      
        </div>
        <!-- Bootstrap 4 -->
        <script src="../htdocs/si_sekolah/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- SweetAlert2 -->
        <script src="../htdocs/si_sekolah/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
        <!-- Toastr -->
        <script src="../htdocs/si_sekolah/assets/plugins/toastr/toastr.min.js"></script>

    </body>
</html>

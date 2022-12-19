<?php
$host = "localhost";
$user = "root";
$pass = "";
$database = "simala";

require_once('../htdocs/si_sekolah/config/koneksi.php');
require_once('../htdocs/si_sekolah/models/database.php');
include "../htdocs/si_sekolah/models/ModelNilaiSiswa.php";

$connection = new Database($host, $user, $pass, $database);
$nilai_siswa = new NilaiSiswa($connection);
?>
<html>
    <head>
        <title>Raport Digital Siswa</title>
        <link rel="icon" type="img/png" href="../views/logo man 1 pringsewu.png" sizes="16x16">
        <link rel="stylesheet" href="style.css">
        <link rel="icon" type="img/png" href="../views/logo man 1 pringsewu.png" sizes="16x16">
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet" href="../assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- JQVMap -->
        <link rel="stylesheet" href="../assets/plugins/jqvmap/jqvmap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="../assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="../assets/plugins/daterangepicker/daterangepicker.css">
        <!-- summernote -->
        <link rel="stylesheet" href="../assets/plugins/summernote/summernote-bs4.min.css">
        <!-- SweetAlert2 -->
        <link rel="stylesheet" href="../assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
        <!-- Toastr -->
        <link rel="stylesheet" href="../assets/plugins/toastr/toastr.min.css">
    </head>
    <body>
        <div id="header">
            <table width="100%">
                <tr>
                <td width="25" align="center"><img src="../views/logo man 1 pringsewu.png" width="60%"></td>
                <td width="50" align="center"><h2>MAN 1 Pringsewu</h2>
                Imam Bonjol Barat, Pajar Agung, Kec. Pringsewu, Kabupaten Pringsewu, Lampung 35373</h3></td>
                </tr>
            </table>
        </div>
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
                if(@$_POST['cetak_raport']){
                    $tampil = $nilai_siswa->tampil_nama(@$_POST['cetak_nama']);
                } else{
                    $tampil = $nilai_siswa->tampil();
                }
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
        <div id="body">
            <script>
                window.print();
            </script>
        </div>
    </body>
</html>
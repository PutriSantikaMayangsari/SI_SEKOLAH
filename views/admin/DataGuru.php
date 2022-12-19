<?php
require_once('../htdocs/si_sekolah/config/koneksi.php');
require_once('../htdocs/si_sekolah/models/database.php');
include "../htdocs/si_sekolah/models/ModelDataGuru.php";

$connection = new Database($host, $user, $pass, $database);
$guru = new DataGuru($connection);

if(@$_GET['act'] == ''){
?>

<!doctype html>
<html>
    <head>
        <title>MAN 1 Pringsewu - SIMALA  - Data Guru</title>
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
                        <li><a href="DataGuru.php">Data Guru</a></li>
                        <li><a href="DataSiswa.php">Data Siswa</a></li>
                        <li><a href="NilaiSiswa.php">Nilai Siswa</a></li>
                        <li><a href="DataUser.php">Data User</a></li>  
                    </ul>
                </li>                
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </div>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Guru</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard.php"><i class="fa fa-home"></i>Home</a></li>
                            <li class="breadcrumb-item">Konfigurasi</li>
                            <li class="breadcrumb-item active"><a href="DataGuru.php">Data Guru</a></li>
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
                                <div class="card-header">
                                    <button class="btn btn-success" data-toggle="modal" data-target="#tambahdata"><i class="fa fa-plus"></i> Input Data Guru</button>
                                </div>
                                <!-- /.card-header -->
                                <div class="modal fade" id="tambahdata" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">                                                
                                                <h4 class="modal-title">Input Data Guru</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label class="control-label" for="NIP">NIP</label>
                                                        <input type="text" name="nip" class="form-control" id="nip" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label" for="Nama">Nama</label>
                                                        <input type="text" name="nama" class="form-control" id="nama" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label" for="Mata_Pelajaran">Mata Pelajaran</label>
                                                        <input type="text" name="mapel" class="form-control" id="mapel" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label" for="Alamat">Alamat</label>
                                                        <input type="text" name="alamat" class="form-control" id="alamat" required>
                                                    </div>
                                                </div>
                                            <div class="modal-footer">
                                                <button type="reset" class="btn btn-danger">Reset</button>
                                                <input type="submit" class="btn btn-success" name="tambah" value="Simpan">
                                            </div>
                                            </form>
                                            <?php
                                            if(@$_POST['tambah']){
                                                $nip = $connection->conn->real_escape_string($_POST['nip']);
                                                $nama = $connection->conn->real_escape_string($_POST['nama']);
                                                $mapel = $connection->conn->real_escape_string($_POST['mapel']);
                                                $alamat = $connection->conn->real_escape_string($_POST['alamat']);
                                                $guru->tambah($nip, $nama, $mapel, $alamat);                                               
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr align="center">
                                               <th>No.</th>
                                                <th>NIP</th>
                                                <th>Nama</th>
                                                <th>Mata Pelajaran</th>
                                                <th>Alamat</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $no = 1;
                                        $tampil = $guru->tampil();
                                        while($data = $tampil->fetch_object()){
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td align="center"><?php echo $no++; ?></td>
                                                <td><?php echo $data->NIP; ?></td>
                                                <td><?php echo $data->Nama; ?></td>
                                                <td><?php echo $data->Mata_Pelajaran; ?></td>
                                                <td><?php echo $data->Alamat; ?></td>
                                                <td align="center">
                                                <a id="edit">
                                                    <button class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</button>
                                                    <a href="?page=NilaiSiswa&act=del&id=<?php echo $data->ID; ?>" onclick="return confirm('Apakah anda ingin menghapus data ini?')">
                                                    <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button>
                                                    </a>
                                                </td>
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
        <?php
        }else if(@$_GET['act'] == 'del'){
            // echo "proses delete untuk id : ".$_GET['id'];
            $guru->hapus($_GET['id']);
            header("location: ?page=dataguru");
        }
        ?>
        <div id="footer">
            <strong>Copyright &copy; 2022 </a>.</strong>
            All rights reserved.      
        </div>
        <!-- jQuery -->
        <script src="../htdocs/si_sekolah/assets/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="../htdocs/si_sekolah/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- SweetAlert2 -->
        <script src="../htdocs/si_sekolah/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
        <!-- Toastr -->
        <script src="../htdocs/si_sekolah/assets/plugins/toastr/toastr.min.js"></script>
    </body>
</html>
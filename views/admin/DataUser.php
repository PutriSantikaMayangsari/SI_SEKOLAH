<?php
require_once('../htdocs/si_sekolah/config/koneksi.php');
require_once('../htdoc/si_sekolah/models/database.php');
include "../htdocs/si_sekolah/models/ModelDataUser.php";

$connection = new Database($host, $user, $pass, $database);
$user = new DataUser($connection);

if(@$_GET['act'] == ''){
?>

<!doctype html>
<html>
    <head>
        <title>MAN 1 Pringsewu - SIMALA  - Data User</title>
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
                        <h1 class="m-0">Data User</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard.php"><i class="fa fa-home"></i>Home</a></li>
                            <li class="breadcrumb-item">Konfigurasi</li>
                            <li class="breadcrumb-item active"><a href="DataUser.php">Data User</a></li>
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
                                    <button class="btn btn-success" data-toggle="modal" data-target="#tambahdata"><i class="fa fa-plus"></i> Input Data User</button>
                                </div>
                                <!-- /.card-header -->
                                <div class="modal fade" id="tambahdata" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">                                                
                                                <h4 class="modal-title">Input Data User</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label class="control-label" for="Nama">Nama</label>
                                                        <input type="text" name="nama" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label" for="Username">Username</label>
                                                        <input type="text" name="username" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label" for="Password">Password</label>
                                                        <input type="password" name="password" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label" for="Password">Password Confirmation</label>
                                                        <input type="password" name="passconf" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label" for="Alamat">Alamat</label>
                                                        <input type="text" name="alamat" class="form-control" id="alamat" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label" for="Level">Level</label>
                                                        <select name="level" class="form-control" equired>
                                                            <option value disabled selected>- Pilih -</option>
                                                            <option value="Admin">Admin</option>
                                                            <option value="Guru">Guru</option>
                                                            <option value="Siswa">Siswa</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            <div class="modal-footer">
                                                <button type="reset" class="btn btn-danger">Reset</button>
                                                <input type="submit" class="btn btn-success" name="tambah" value="Simpan">
                                            </div>
                                            </form>
                                            <?php
                                            if(@$_POST['tambah']){                                                
                                                $nama = $connection->conn->real_escape_string($_POST['nama']);
                                                $username = $connection->conn->real_escape_string($_POST['username']);
                                                $password = $connection->conn->real_escape_string($_POST['password']);
                                                $alamat = $connection->conn->real_escape_string($_POST['alamat']);
                                                $level = $connection->conn->real_escape_string($_POST['level']);
                                                $user->tambah($nama, $username, $password, $alamat, $level);                                               
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
                                                <th>Username</th>
                                                <th>Nama</th>
                                                <th>Alamat</th>
                                                <th>Level</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $no = 1;
                                        $tampil = $user->tampil();
                                        while($data = $tampil->fetch_object()){
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td align="center"><?php echo $no++; ?></td>
                                                <td><?php echo $data->Username; ?></td>
                                                <td><?php echo $data->Nama; ?></td>
                                                <td><?php echo $data->Alamat; ?></td>
                                                <td><?php echo $data->Level; ?></td>
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
            $user->hapus($_GET['id']);
            header("location: ?page=datauser");
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
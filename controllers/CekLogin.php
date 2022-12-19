<?php
require_once('D:/xampp/htdocs/si_sekolah/config/koneksi.php');
require_once('D:/xampp/htdocs/si_sekolah/models/database.php');
include "D:/xampp/htdocs/si_sekolah/models/ModelDataUser.php";

$connection = new Database($host, $user, $pass, $database);
$user = new DataUser($connection);

$username = $_POST['username'];
$password = $_POST['password'];

$login = mysqli_query($conn, "SELECT * FROM data_user WHERE username='$username' and password='$password'");
$cek = mysqli_num_rows($login);
if ($cek > 0) {
    $data_user = mysqli_fetch_assoc($login);
    if ($data_user['level'] = "admin") {
        header("location:dashboard_admin.php");
    } else if ($data_user['level'] = "guru") {
        header("location:dashboard_guru.php");
    } else if ($data_user['level'] = "siswa") {
        header("location:dashboard_siswa.php");
    } else {
        echo "<div class='alert'>Username atau Password yang Anda Masukkan Salah!</div>";
    }
} else {
    echo "<div class='alert'>Username atau Password yang Anda Masukkan Salah!</div>";
}

<?php
ob_start();
require_once('../config/koneksi.php');
require_once('/models/database.php');
include "C:/xampp/htdocs/si_sekolah/models/ModelNilaiSiswa.php";

$connection = new Database($host, $user, $pass, $database);
$nilai_siswa = new NilaiSiswa($connection);

$id = $_POST['id'];
$nisn = $connection->conn->real_escape_string($_POST['nisn']);
$nama = $connection->conn->real_escape_string($_POST['nama']);
$kelas = $connection->conn->real_escape_string($_POST['kelas']);
$semester = $connection->conn->real_escape_string($_POST['semester']);
$mapel = $connection->conn->real_escape_string($_POST['mapel']);
$nilai = $connection->conn->real_escape_string($_POST['nilai']);

$nilai_siswa->edit("UPDATE nilai_siswa SET nisn='$nisn', nama='$nama', kelas='$kelas', semester='$semester', mapel='$mapel', nilai='$nilai' WHERE id = '$id'");
echo "<script>window.location='?page=nilaisiswa'</script>";
?>
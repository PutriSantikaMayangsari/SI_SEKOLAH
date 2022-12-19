<?php
class NilaiSiswa{
    private $mysqli;
    function __construct($conn){
        $this->mysqli = $conn;
    }
    public function tampil($id = null){
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM nilai_siswa";
        if($id != null){
            $sql .= "WHERE NISN = $id";
        }
        $query = $db->query($sql) or die ($db->error);
        return $query;
    }
    public function tampil_nama($nama){
        $db = $this->mysqli->conn;
        $nama = $_POST['cetak_nama'];
        $sql = "SELECT * FROM nilai_siswa WHERE nama='$nama'";
        $query = $db->query($sql) or die ($db->error);
        return $query;
    }
    public function tambah($nisn, $nama, $kelas, $semester, $mapel, $nilai){
        $db = $this->mysqli->conn;
        $db->query("INSERT INTO nilai_siswa VALUES ('', '$nisn', '$nama', '$kelas', '$semester', '$mapel', '$nilai')") or die ($db->error);
    }
    public function hapus($id){
        $db = $this->mysqli->conn;
        $db->query("DELETE from nilai_siswa WHERE ID = '$id'") or die ($db->error);
    }

    function __destruct(){
        $db = $this->mysqli->conn;
        $db->close();
    }

    public function edit($sql){
        $db = $this->mysqli->conn;
        $db->query($sql) or die ($db->error);
    }
}
?>
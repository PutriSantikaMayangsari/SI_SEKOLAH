<?php
class DataSiswa{
    private $mysqli;
    function __construct($conn){
        $this->mysqli = $conn;
    }
    public function tampil($id = null){
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM data_siswa";
        if($id != null){
            $sql .= "WHERE ID = $id";
        }
        $query = $db->query($sql) or die ($db->error);
        return $query;
    }
    public function tambah($nisn, $nama, $kelas, $semester, $tempat_lahir, $tanggal_lahir, $alamat){
        $db = $this->mysqli->conn;
        $db->query("INSERT INTO data_siswa VALUES ('', '$nisn', '$nama', '$kelas', '$semester', '$tempat_lahir', '$tanggal_lahir','$alamat')") or die ($db->error);
    }
    public function hapus($id){
        $db = $this->mysqli->conn;
        $db->query("DELETE from data_siswa WHERE ID = '$id'") or die ($db->error);
    }

    function __destruct(){
        $db = $this->mysqli->conn;
        $db->close();
    }
}
?>
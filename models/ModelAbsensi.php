<?php
class Absensi{
    private $mysqli;
    function __construct($conn){
        $this->mysqli = $conn;
    }

    public function tampil($id = null){
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM absensi";
        if($id != null){
            $sql .= "WHERE ID = $id";
        }
        $query = $db->query($sql) or die ($db->error);
        return $query;
    }
    public function tambah($tanggal, $nisn, $nama, $kelas, $keterangan){
        $db = $this->mysqli->conn;
        $db->query("INSERT INTO absensi VALUES ('', '$tanggal', '$nisn', '$nama', '$kelas', '$keterangan')") or die ($db->error);
    }
    public function hapus($id){
        $db = $this->mysqli->conn;
        $db->query("DELETE from absensi WHERE ID = '$id'") or die ($db->error);
    }

    function __destruct(){
        $db = $this->mysqli->conn;
        $db->close();
    }
}
?>
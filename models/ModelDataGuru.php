<?php
class DataGuru{
    private $mysqli;
    function __construct($conn){
        $this->mysqli = $conn;
    }

    public function tampil($id = null){
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM data_guru";
        if($id != null){
            $sql .= "WHERE ID = $id";
        }
        $query = $db->query($sql) or die ($db->error);
        return $query;
    }
    public function tambah($nip, $nama, $mapel, $alamat){
        $db = $this->mysqli->conn;
        $db->query("INSERT INTO data_guru VALUES ('', '$nip', '$nama', '$mapel', '$alamat')") or die ($db->error);
    }
    public function hapus($id){
        $db = $this->mysqli->conn;
        $db->query("DELETE from data_guru WHERE ID = '$id'") or die ($db->error);
    }

    function __destruct(){
        $db = $this->mysqli->conn;
        $db->close();
    }
}
?>
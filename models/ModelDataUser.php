<?php
class DataUser{
    private $mysqli;
    function __construct($conn){
        $this->mysqli = $conn;
    }
    public function tampil($id = null){
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM data_user";
        if($id != null){
            $sql .= "WHERE ID = $id";
        }
        $query = $db->query($sql) or die ($db->error);
        return $query;
    }
    public function tambah($nama, $username, $password, $alamat, $level){
        $db = $this->mysqli->conn;
        $db->query("INSERT INTO data_user VALUES ('', '$nama', '$username', '$password', '$alamat', '$level')") or die ($db->error);
    }
    public function hapus($id){
        $db = $this->mysqli->conn;
        $db->query("DELETE from data_user WHERE ID = '$id'") or die ($db->error);
    }

    function __destruct(){
        $db = $this->mysqli->conn;
        $db->close();
    }
}
?>
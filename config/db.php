<?php
class db{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $db = "RESTful-API";

    public function connect(){
        $this->conn = null;
        try{
            $this->conn = new PDO("mysql:host=".$this->servername.";dbname=".$this->db."",$this->username,$this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "success";
        }catch(PDOException $e){
            echo "fails" .$e->getMessage();
        }
        return $this->conn;
    }

}
?>
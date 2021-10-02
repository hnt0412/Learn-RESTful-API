<?php
class Question{

private $conn;

public $id_cauhoi;
public $title;
public $cau_1;
public $cau_2;
public $cau_3;
public $cau_4;
public $cau_dung;

public function __construct($db)
{
    $this->conn = $db;
}

public function read(){
    $query = "SELECT * FROM cauhoi ORDER BY id_cauhoi DESC";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
}
public function show(){
    $query = "SELECT * FROM cauhoi WHERE id_cauhoi=? LIMIT 1";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1,$this->id_cauhoi);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->title = $row['title'];
    $this->cau_1 = $row['cau_1'];
    $this->cau_2 = $row['cau_2'];
    $this->cau_3 = $row['cau_3'];
    $this->cau_4 = $row['cau_4'];
    $this->cau_dung = $row['cau_dung'];
}
public function create(){
    $query = "INSERT INTO cauhoi SET title=:title,cau_1=:cau_1,cau_2=:cau_2,cau_3=:cau_3,cau_4=:cau_4,cau_dung=:cau_dung";
    $stmt = $this->conn->prepare($query);
    //Clean data
    $this->title = htmlspecialchars(strip_tags($this->title));
    $this->cau_1 = htmlspecialchars(strip_tags($this->cau_1));
    $this->cau_2 = htmlspecialchars(strip_tags($this->cau_2));
    $this->cau_3 = htmlspecialchars(strip_tags($this->cau_3));
    $this->cau_4 = htmlspecialchars(strip_tags($this->cau_4));
    $this->cau_dung = htmlspecialchars(strip_tags($this->cau_dung));

    //Bind data
   $stmt->bindParam(':title', $this->title);
   $stmt->bindParam(':cau_1', $this->cau_1);
   $stmt->bindParam(':cau_2', $this->cau_2);
   $stmt->bindParam(':cau_3', $this->cau_3);
   $stmt->bindParam(':cau_4', $this->cau_4);
   $stmt->bindParam(':cau_dung', $this->cau_dung);

   if($stmt->execute()){
       return true;
   }
   printf("Error %.\n" ,$stmt->error);
   return false;
}

public function update(){
    $query = "UPDATE cauhoi SET title=:title,cau_1=:cau_1,cau_2=:cau_2,cau_3=:cau_3,cau_4=:cau_4,cau_dung=:cau_dung WHERE id_cauhoi=:id_cauhoi";
    $stmt = $this->conn->prepare($query);
    //Clean data
    $this->title = htmlspecialchars(strip_tags($this->title));
    $this->cau_1 = htmlspecialchars(strip_tags($this->cau_1));
    $this->cau_2 = htmlspecialchars(strip_tags($this->cau_2));
    $this->cau_3 = htmlspecialchars(strip_tags($this->cau_3));
    $this->cau_4 = htmlspecialchars(strip_tags($this->cau_4));
    $this->cau_dung = htmlspecialchars(strip_tags($this->cau_dung));
    $this->id_cauhoi = htmlspecialchars(strip_tags($this->id_cauhoi));

    //Bind data
   $stmt->bindParam(':title', $this->title);
   $stmt->bindParam(':cau_1', $this->cau_1);
   $stmt->bindParam(':cau_2', $this->cau_2);
   $stmt->bindParam(':cau_3', $this->cau_3);
   $stmt->bindParam(':cau_4', $this->cau_4);
   $stmt->bindParam(':cau_dung', $this->cau_dung);
   $stmt->bindParam(':id_cauhoi', $this->id_cauhoi);

   if($stmt->execute()){
       return true;
   }
   printf("Error %.\n" ,$stmt->error);
   return false;
}
  
public function delete(){
    $query = "DELETE FROM cauhoi WHERE id_cauhoi=:id_cauhoi";
    $stmt = $this->conn->prepare($query);
    //Clean data

    $this->id_cauhoi = htmlspecialchars(strip_tags($this->id_cauhoi));

    //Bind data

   $stmt->bindParam(':id_cauhoi', $this->id_cauhoi);

   if($stmt->execute()){
       return true;
   }
   printf("Error %.\n" ,$stmt->error);
   return false;
}
    


}
?>
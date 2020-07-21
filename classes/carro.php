<?php
require_once 'database.php';
Class Carro{

    // Construtor
    public function __construct(){
      $database = new Database();
      $db = $database->dbConnection();
      $this->conn = $db;
    }


    // Executa queries SQL 
    public function runQuery($sql){
      $database = new Database();
      $db = $database->dbConnection();
      $this->conn = $db;
      $stmt = $this->conn->prepare($sql);
      return $stmt;
    }

    // Insert
    public function insert($modelo,$marca,$ano,$vlr_fip){
      try{
        $stmt = $this->conn->prepare("INSERT INTO carro (modelo,marca,ano,vlr_fip) VALUES(:modelo, :marca,:ano,:vlr_fip)");
        $stmt->bindparam(":modelo", $modelo);
        $stmt->bindparam(":marca", $marca);
        $stmt->bindparam(":ano", $ano);
        $stmt->bindparam(":vlr_fip", $vlr_fip);
        $stmt->execute();
        return $stmt;
      }catch(PDOException $e){
      
      }
    }


    // Update
    public function update($modelo,$marca,$ano,$vlr_fip,$id){
        try{
          $stmt = $this->conn->prepare("UPDATE carro SET modelo = :modelo, marca = :marca, ano = :ano, vlr_fip = vlr_fip WHERE id = :id");
          $stmt->bindparam(":modelo", $modelo);
          $stmt->bindparam(":marca", $marca);
          $stmt->bindparam(":ano", $ano);
          $stmt->bindparam(":vlr_fip", $vlr_fip);
          $stmt->execute();
          return $stmt;
        }catch(PDOException $e){
    
        }
    }


    // Delete
    public function delete($id){
      try{
        $stmt = $this->conn->prepare("DELETE FROM carro WHERE id = :id");
        $stmt->bindparam(":id", $id);
        $stmt->execute();
        return $stmt;
      }catch(PDOException $e){
          echo $e->getMessage();
      }
    }

    // Redireciona  URL
    public function redirect($url){
      header("Location: $url");
    }



}

?>
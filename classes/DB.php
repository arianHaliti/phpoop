<?php

class DB {
   private $pdo;
   private $result;
   private $stmt;
   public function __construct() {
      try {
         $this->pdo = new PDO("mysql:host=localhost;dbname=data", 'root',  '');
        
      } catch (PDOException $e){
        
         die($e->getMessage());
      }
   }

   public function query($sql , $params = null){
      if($query = $this->pdo->prepare($sql)){
         $i = 1;
         if(($params)){
            foreach($params as $p){
               $query->bindValue($i,$p);
               $i++;
            }
         }
      }
      $this->stmt = $query;
   }
   // if($query->execute()){
   //    $this->result = $query->fetchAll(PDO::FETCH_OBJ);
   //    return $this->result;
   // }else{
   //    return "Error";
   // }
   public function execute(){
     return $this->stmt->execute();
   }
   public function lastId(){
      return $this->pdo->lastInsertId();
   }
   public function  getRows(){
      $this->execute();
      return $this->stmt->fetchAll(PDO::FETCH_OBJ);
   }
   public function singleRow(){
      $this->execute();
      return $this->stmt->fetch(PDO::FETCH_OBJ);
   }
   

}
<?php

class DB {
   private $pdo;
   private $result;
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
         if($query->execute()){
            $this->result = $query->fetchAll(PDO::FETCH_OBJ);
            return $this->result;
         }else{
            return "Error";
         }
      }
   }
   public function lastId(){
      return $this->pdo->lastInsertId();
   }
   

}
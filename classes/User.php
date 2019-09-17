<?php

class User{
   private $conn;

   public function __construct($user = null){
      $this->conn = new DB();
   }
   public function create($params){
      // var_dump ($params);
      $this->conn->query("INSERT INTO users (`username`, `password`, `salt`, `fullname`) VALUES (?, ?, ?, ?)",$params);
   }

   public function loginUser($username, $password){
      
      $user = $this->conn->query("SELECT * FROM users where username = ?",['username'=> $username]);
      $user = $this->conn->singleRow();
      if($user){
         if($user->password === Hash::make($password, $user->salt)){
            
            Session::set($user->id,$user->username);
            return true;
         }else
         {
            return false;
         }
      }
      return false;
   }
   public function getUser($id){
      $data = $this->conn->query(
         "SELECT * FROM users u  WHERE u.id = ?",
         ["id" =>$id]);
     $data = $this->conn->singleRow();
     if($data == "Error" || !($data)){
         header('location: /phpoop/index.php');
         return "Error";
         
     }
         return $data;         
   }
   public function getUsers($p){
      try{
         $perpage = 5;
         if ( filter_var($p, FILTER_VALIDATE_INT) === false ) {
            die();
         }
      $combined =$p * $perpage;
      $users = $this->conn->query("SELECT username, fullname, id FROM users LIMIT {$perpage} OFFSET {$combined}");
      $users = $this->conn->getRows();
      $count = $this->conn->query("SELECT count(*) AS count FROM users");
      $count = $this->conn->singleRow();
      
         return ["users" => $users,
               "count" => $count,
               "perpage" => $perpage
               ];
      }catch(Execption $e){
         return ["error" => "Something went wrong"];
      }
     
   }
   public function logoutUser(){
      Session::unset();
   }

}

?>
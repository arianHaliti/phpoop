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
      if($user){
         $user = $user[0];
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
   public function getUsers($p){
      try{
         $perpage = 5;
         if ( filter_var($p, FILTER_VALIDATE_INT) === false ) {
            die();
         }
      $combined =$p * $perpage;
      $users = $this->conn->query("SELECT username, fullname, id FROM users LIMIT {$perpage} OFFSET {$combined}");

         $count = $this->conn->query("SELECT count(*) AS count FROM users");
         return ["users" => $users,
               "count" => $count[0],
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
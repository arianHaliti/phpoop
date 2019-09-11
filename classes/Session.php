<?php

   class Session {
      public function set($id,$username){
        
         $_SESSION["id"] = $id;
         $_SESSION["username"] = $username;
      }
      public function check(){
        
         if(isset($_SESSION['id'])){
            header("Location: index.php");
         }
      }
      public function auth() {
        
         if(!isset($_SESSION['id'])){
            header("Location: /phpoop/login.php");
         }
      }
      public function unset(){
        

         session_destroy();

         header('Location: index.php');	
      }
   }

?>
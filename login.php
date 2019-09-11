<?php 
require_once 'init.php';
Session::check();
$errors =null;
if($_POST){
   $validate = Validation::validateUser($_POST, array(
      'username' => array(
         'required' => true
      ),
      'password' => array(
         'required' => true
      )
   ));
   if($validate === 'Success'){
      $user = new User();

      $log = $user->loginUser($_POST['username'],$_POST['password']);

      if($log){
         header('location:index.php');
      }else{
          $errors = "Credentials dont match";
      }
   }
}

?>
  <?php require_once 'header.php';?>
      <div class="container">
         <form action ="" method ="post" name ="login" onsubmit="return validate()" >
         <div class="form-group ">
            <label for ="username">Username</label>

            <input class="form-control" type="text" name= "username" id="username">

            <br>
            <label for ="password">Password</label>

            <input class="form-control" type="password" name= "password" id="password">
            <br>
           
            <input type="submit" class="btn btn-primary" value ="Log in">
            <div id="errors" style="color: red"></div>
         </div>
         </form>
         <?php 
         if($_POST){
            if($validate !== 'Success'){
               foreach($validate as $error){
                  echo $error . '<br>';
               }
            }

         }
         if($errors){
            echo $errors;
         }
         ?>
         
      </div>
   <?php require_once 'footer.php';?>
<script src="validate.js"></script>
<script>

function validate() {
  let username = document.forms["login"]["username"].value;
  let password = document.forms['login']['password'].value;
  
  let rules ={
     username : {
        "required" : true,
        "value" : username
     },
     password :{
        "required" : true,
        "value" : password
     }
  }
  
  errors = validation(rules)
   // console.log(errors);
   
   
   if(errors.length >=1 ){
      
      document.getElementById("errors").innerHTML = "";
      errors.forEach(function(error) {
         var node = document.createElement("p");
            var textnode = document.createTextNode(error);
            node.appendChild(textnode);
            document.getElementById("errors").appendChild(node);
      });
      
      return false
      
   }
   
   return true;

}

</script>
<?php 
require_once 'init.php';
$conn = new DB();
// $users = $conn->query('SELECT * FROM users',null);
?>

      <?php require_once 'header.php';?>
      <h1> Users</h1>
      <table class="table" >
      <thead class="thead-dark">
         <tr>
            <th scope="col">#</th>
            <th scope="col">username</th>
            <th scope="col">fullname</th>
         </tr>
      </thead>
      <tbody  id = "list">
      </tbody>
      </table>
      <img id="loading" src="https://thumbs.gfycat.com/UnitedSmartBinturong-max-1mb.gif"  style=" display: none; margin:0 auto;  vertical-align:middle; text-align:center" height="42" width="42">
      <?php include('inc/pagination.php');?>
      
      <?php require_once 'footer.php';?>
      <script>
         let id = 11;
         let handler = "classes/UserHandler"
     
         function show($data){
            $("#list").empty();
            for(let i = 0 ; i< $data.length; i++){
            console.log($data);
            
               
               $("#list").append('<tr><th scope="row">'+$data[i]['id']+'</th><td> <a href="/phpoop/users/user.php?id='+$data[i]['id']+'">'+$data[i]['username']+'</a></td><td>'+$data[i]['fullname']+'</td></tr>');
            }
         }
     </script>
      <script type="text/javascript" src="js/load.js"></script>

      
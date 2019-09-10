<?php 
require_once 'init.php';
$conn = new DB();
// $users = $conn->query('SELECT * FROM users',null);
?>

      <?php require_once 'header.php';?>
      <h1> Users</h1>
      <img id="loading" src="https://thumbs.gfycat.com/UnitedSmartBinturong-max-1mb.gif"  style=" display: none; margin:0 auto;  vertical-align:middle; text-align:center" height="42" width="42">
      <table class="table" >
      <thead class="thead-dark">
         <tr>
            <th scope="col">#</th>
            <th scope="col">title</th>
            <th scope="col">fullname</th>
         </tr>
      </thead>
      <tbody  id = "list">
      </tbody>
      </table>
      <div class="pagination">
         <a href="#" id="left">&laquo;</a>
          
          <div id ="searchbox">
      </div>
      Of
          <span id="showpages"> </span>
         <a href="#" id="right">&raquo;</a>
         <a href="#" id ="search" class="search"><i class="fa fa-car"></i></a>
      
     
      </div>
      
      <?php require_once 'footer.php';?>
      <script>

         let handler = "classes/UserHandler"
     
         function show($data){
            $("#list").empty();
            for(let i = 0 ; i< $data.length; i++){
            console.log($data);
            
               
               $("#list").append('<tr><th scope="row">'+$data[i]['id']+'</th><td>'+$data[i]['username']+'</td><td>'+$data[i]['fullname']+'</td></tr>');
            }
         }
     </script>
      <script type="text/javascript" src="js/load.js"></script>

      
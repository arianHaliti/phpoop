
<?php 
require_once '../init.php';
require_once '../header.php';?>

<h2>List of posts</h2>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">title</th>
      <th scope="col">body</th>
      <th scope="col">created At</th>
      <th scope="col">Created By</th>
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

<?php require_once '../footer.php';?>

<script>

let handler = "../classes/PostHandler"

function show($data){
   $("#list").empty();
   for(let i = 0 ; i< $data.length; i++){
   console.log($data);
   
      
      $("#list").append('<tr><th scope="row">'+$data[i]['id']+'</th><td>'+$data[i]['title']+'</td><td>'+$data[i]['body']+'</td><td>'+$data[i]['created_at']+'</td><td>'+$data[i]['username']+'</td></tr>');
   }
}
</script>
<script type="text/javascript" src="../js/load.js"></script>

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
<img id="loading" src="https://thumbs.gfycat.com/UnitedSmartBinturong-max-1mb.gif"  style=" display: none; margin:0 auto;  vertical-align:middle; text-align:center" height="42" width="42">
<?php include('../inc/pagination.php');?>

<?php require_once '../footer.php';?>

<script>

let handler = "../classes/PostHandler"
let id =null;
function show($data){
   $("#list").empty();
   for(let i = 0 ; i< $data.length; i++){
   console.log($data);
   
      
      $("#list").append('<tr><th scope="row">'+$data[i]['post_id']+'</th><td> <a href="/phpoop/posts/post.php?id='+$data[i]['post_id']+'">'+$data[i]['title']+'</a></td><td>'+$data[i]['body']+'</td><td>'+$data[i]['created_at']+'</td><td> <a href="/phpoop/users/user.php?id='+$data[i]['post_id']+'">'+$data[i]['username']+'</a></td></tr>');
   }
}
</script>
<script type="text/javascript" src="../js/load.js"></script>
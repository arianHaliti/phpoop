<?php
   
   require_once '../init.php';
   Session::auth();
  
   if($_POST){
       
      $validate = Validation::validateUser($_POST, array(
         'title' => array(
            'required' => true,
            'max' => 30,
            'min' => 2,
         ),
         'body' => array (
            'required' => true,
            'max' =>  2048,
            'min' => 10
         ),
      ));
      if($validate === 'Success'){
        
         $post = new Post();
         $res =$post->create(
            [
               'title' => $_POST['title'],
               'body' => $_POST['body'],
            ]
         );
         if($res != "error"){
             header("location: /phpoop/posts/post.php?id={$res}");
         }
        
        
      }
   }
  
?>
<?php require_once '../header.php';
   
?>

<form  action ="/phpoop/posts/create.php" method="POST" name ="posts"  >
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name ="title" class="form-control" id="title" placeholder="title">
        </div>

        <div class="form-group">
        <label for="body">Body</label>
        <textarea class="form-control" name="body" id="body" rows="5" placeholder="body"></textarea>
        <div id="errors" style="color: red"></div>
    </div>
    <button type="submit" value="posts" class="btn btn-primary">Submit</button>
</form>
<?php require_once '../footer.php';?>
<script src="../validate.js"></script>
<script>

function validate() {
   let title = document.forms["posts"]["title"].value;
   let body = document.forms['posts']['body'].value;

   console.log();
   

   let rules ={
      title : {
         "required" : true,
         "value" : title,
         "max" : 30,
         "min" : 2
      },
      body: {
         "required" : true,
         "value" : body,
         "max" : 2048,
         "min" : 10
      }
   }
   errors = validation(rules)
   
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

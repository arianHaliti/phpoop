<?php 
require_once '../init.php';
$post = new Post;

$data = $post->getPost($_GET['id']);

require_once '../header.php';?>

    <h2><?php echo $data->title ?> </h2> <p> Created at <?php echo $data->created_at?></p>

    <div>
        <?php echo $data->body?>
    </div>

    <p> Created by <?php echo $data->username ?></p>

    <br><br>

    <!-- COMMENT SECTION -->
    <h5> Comments Section </h5>
    <div class="form-group">
        <label for="comment-field">Enter your comment</label>
        <textarea class="form-control" id="comment-field" rows="3"></textarea>
    </div>
    <button type="submit" value="posts" id="submitcomment" class="btn btn-primary">Comment</button>
    <br><br>
    <h5> Comments </h5>
    <img id="loadingInsertComment" src="https://thumbs.gfycat.com/UnitedSmartBinturong-max-1mb.gif"  style=" display:none; margin:0 auto;  vertical-align:middle; text-align:center" height="42" width="42">
    <div id = "list">
    
    </div>
    <?php include('../inc/pagination.php');?>

   
<?php require_once '../footer.php';?>


<script>
let submitingComment = false;
let handlerSubmit = "../classes/CommentHandler";
$("#submitcomment").click(function() {

    let value = $("#comment-field").val();
    let id = <?php echo json_encode($_GET['id']); ?>;
    console.log(id);
    
    if(value.trim().length == 0){
        alert("Fill in the comment");
        return;
    }
    if(id){

    }
    if(!submitingComment){
        submitingComment= true;
        $("#loadingInsertComment").css("display","table-cell");
        $.ajax(
        {
            type :"POST",
            url: handlerSubmit+".php",
            data: {value ,post_id : id},
            dataType : "json",
            success: function(data) {
            if(data.auth){
                alert("You need to be loged in to create a comment");
            }else{
                $("#list").prepend("<div class='comment-box'><p>Created by <strong>"+data.username+"</strong></p> <p class='box'> "+data.body+"</p>  <p class='date-comment'><i> Created At "+data.created_at+"</i></p></div>");
                alert("Comment created");
                let value = $("#comment-field").val("");
            }
            $("#loadingInsertComment").css("display","none");
            
            submitingComment= false;
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
            alert("Status: " + textStatus); alert("Error: " + errorThrown); 
            // console.log(XMLHttpRequest);
            
            $("#loadingInsertComment").css("display","none");
            submitingComment= false;
            }   
        }); 
    }
})
    
        
let handler = "../classes/CommentHandler"
let id =  <?php echo json_encode($_GET['id']); ?>;
console.log(id);

function show(data){
   $("#list").empty();
   for(let i = 0 ; i< data.length; i++){
   console.log(data[i]);
   
     $("#list").append("<div class='comment-box'><p>Created by <strong>"+data[i].username+"</strong></p> <p class='box'> "+data[i].body+"</p>  <p class='date-comment'><i> Created At "+data[i].created_at+"</i></p></div>");
        
   }
}
</script>
<script type="text/javascript" src="../js/load.js"></script>
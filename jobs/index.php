
<?php 
require_once '../init.php';
require_once '../header.php';

$job = new Job;
$categories =$job->getAllCategories();
?>
<main role="main">

<div class="jumbotron">
  <div class="container">
    <h1 class="display-3">Find a Job!</h1>
    <form >
      <select name="category" class="form-control" id="select">
          <option value="null">All</option>
          <?php foreach($categories as $c):?>
            <option value="<?php echo $c->id?>"><?php echo $c->name?></option>  
          <?php endforeach;?>
      </select>

    </form>  
    <br>
    <p class="text-center">Sort job application by category to find your jobs in that category !</p>
  
  </div>
</div>
<div class="container">

  <div class="row jobs" >
  
  </div>

  <hr>

</div> <!-- /container -->

</main>

<?php require_once '../footer.php'?> 
<script>
let handler = "../classes/JobHandler";
$('#select').on('change', function() {
  let value = this.value;
  // alert( this.value );
  console.log(value);
  $.ajax({
    
      type: "GET",
      url : handler+".php",
      data : {category : value},
      dataType : "json",
      success : (data) =>{
        console.log(data);
        append(data);
      
      },
      error : (XMLHttpRequest, textStatus, errorThrown) =>{
        console.log(textStatus);
        
        $("#loading").css("display","none");
      }
    
  })
});
let append = (data)=>{
  // console.log(data.data);
  data =data.data
  
  $(".jobs").empty();
  for(let i = 0 ; i< data.length; i++){
    console.log(data);
    
    $(".jobs").append('<div class="col-md-4"><h2>'+data[i]['title']+'</h2><p>'+data[i]['description']+' </p><p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p></div>');
  }
}


</script>
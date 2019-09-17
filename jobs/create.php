
<?php 
require_once '../init.php';
require_once '../header.php';
$job = new Job;
if(isset($_POST['title'])){
  // $job = $_POST['data'];
  $title = $_POST['title'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $desc = $_POST['desc'];
  $salary =$_POST['salary'];
  $category = $_POST['category'];
  print_r($_POST);
  $job = new Job();
$job->create([
    'category_id' => $category,
    'company' => $name,
    'contact_email' => $email,
    'contact_user' => $phone,
    'description' =>$desc,
    'title' => $title,
    'salary' => $salary, 
]);
}

$categories = $job->getAllCategories();


?>
<form method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputTitle">Title</label>
      <input type="text" name="title" class="form-control" id="inputTitle" placeholder="Title">
    </div>
    <div class="form-group col-md-6">
      <label for="inputName">Company Name</label>
      <input type="text" name="name"class="form-control" id="inputName" placeholder="Company name">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail">Contact email</label>
      <input type="text" name="email" class="form-control" id="inputEmail" placeholder="Contact email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPhone">Contact Phone</label>
      <input type="text" name="phone"class="form-control" id="inputPhone" placeholder="Contact Phone">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Company Description</label>
    <textarea class="form-control" name="desc" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputSalary">Salary</label>
      <input type="text" name="salary" class="form-control" id="inputSalary" placeholder="Ex: 50K, 50,000$ ">
    </div>
    <div class="form-group col-md-4">
      <label for="inputCategory">Job Category</label>
      <select name="category"id="inputCategory" class="form-control">
      <?php foreach($categories as $c): ?>
        <option  value=<?php echo $c->id?> selected><?php echo $c->name?></option>
      <?php endforeach;?>
      </select>
    </div>
  </div>
    
  <button type="submit" class="btn btn-primary">Sign in</button>
</form>




<?php require_once '../footer.php'?> 

<script>
let handlerSubmit = '../classes/JobHandler';
$(document).ready(function(){
    
    $('#job-form').submit((e)=>{
        let data={};
        data.title = $('#inputTitle').val();
        data.name = $('#inputName').val();
        data.email = $('#inputEmail').val();
        data.phone = $('#inputPhone').val();
        data.address = $("#inputAddress").val();
        data.desc = $("#exampleFormControlTextarea1").val();
        data.salary =$('#inputSalary').val();
        data.category =$('#inputCategory').find(":selected").val();
        
        console.log(data);
        

        $.ajax(
        {
            type :"POST",
            url: handlerSubmit+".php",
            data: {data},
            dataType : "json",
            success: function(data) {
                console.log(data);
                
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
            alert("Status: " + textStatus); alert("Error: " + errorThrown); 
            // console.log(XMLHttpRequest);
            
            $("#loadingInsertComment").css("display","none");
            }   
        }); 
        console.log(data);
        
        e.preventDefault();
    });
});
</script>
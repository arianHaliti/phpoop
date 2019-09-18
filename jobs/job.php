<?php 
require_once '../init.php';
require_once '../header.php';
$job = new Job;

$data = $job->getJob($_GET['id']);

?>
<main role="main" class="container">
  <div class="jumbotron">
  <h1><?php echo $data->title?></h1><br>
    <div class="row">
    <div class= "col-md-6">
   
        <h4>Company Name: </h4>
        <p class="lead"> <?php echo $data->company?></p>
        <br>
    </div>
    <div class= "col-md-6">
        <h4>Job Description: </h4>
        <p class="lead"> <?php echo $data->description ?></p>
        <br>
    </div>
    <div class= "col-md-6">
        <h4>Company Name: </h4>
        <p class="lead"> <?php echo $data->company?></p>
        <br>
    </div>
    <div class= "col-md-6">
        <h4>Email contact: </h4>
        <p class="lead"> Email : <?php echo $data->contact_email ?></p>
        <br>
    </div>
    <div class= "col-md-6">
        <h4>Phone contact: </h4>
        <p class="lead"> Email : <?php echo $data->contact_user ?></p>
        <br>
    </div>
    <div class= "col-md-6">
        <h4>Salary : </h4>
        <p class="lead"> Salary : <?php echo $data->salary ?></p>
        <br>
    </div>
    <div class= "col-md-6">
        <p class="lead"><strong>Created at :</strong><small> <?php echo $data->created_at ?> </small></p>
        <br>
    </div>
    </div>
    <a class="btn btn-lg btn-primary" href="/docs/4.3/components/navbar/" role="button">Apply For Position &raquo;</a>
  </div>
</main>
<?php require_once '../footer.php'?> 
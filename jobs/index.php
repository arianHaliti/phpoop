
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
      <select name="category" class="form-control">
          <option value="0">Choose Category</option>
          <?php foreach($categories as $c):?>
            <option value="<?php echo $c->id?>"><?php echo $c->name?></option>  
          <?php endforeach;?>
      </select>

    </form>  
    <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
    <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
  
  </div>
</div>
<div class="container">

  <div class="row jobs" >
  <?php foreach($jobs as $j) {?>
    <div class="col-md-4">
      <h2><?php echo $j->job_title; ?></h2>
      <p><?php echo $j->description;?> </p>
      <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
    </div>
  <?php }?>
  </div>

  <hr>

</div> <!-- /container -->

</main>

<?php require_once '../footer.php'?> 
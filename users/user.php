<?php 
require_once '../init.php';
require_once '../header.php';
$user = new User;

$data = $user->getUser($_GET['id']);

?>
<main role="main" class="flex-shrink-0">
  <div class="container">
    <h1 class="mt-5"><small>username: </small><?php echo $data->username ?></h1>
    <h1 class="mt-5"><small>fullnam: </small><?php echo $data->fullname ?></h1>
    <br>
    <p class="lead">Pin a footer to the bottom of the viewport in desktop browsers with this custom HTML and CSS. A fixed navbar has been added with <code>padding-top: 60px;</code> on the <code>main &gt; .container</code>.</p>
  </div>
</main>
<?php require_once '../footer.php';?>
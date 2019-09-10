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

    

<?php require_once '../footer.php';?>
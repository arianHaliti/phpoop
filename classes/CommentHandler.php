<?php
require_once '../init.php';
   $comment =  new Comment();
   if(isset($_POST['value'])){
      $value = $_POST['value'];
      $post_id = $_POST['post_id'];
      if(!isset($_SESSION['id'])){
         echo json_encode($data = ["auth" => "User is not loged in"]);
         return;
      }

      $data =$comment->create(
      [
         'body' => $_POST['value'],
         'post_id' => $_POST['post_id'],
      ]
      );
      //  echo $data;
      $data = $comment->getComment($data);
      //  echo $data;
      echo json_encode($data);
   }else{
      $page = $_POST['page'];
      $post_id = $_POST['id'];
     
      
      $data= $comment->getComments($page,$post_id);

      $count = $data['count'];
      $perpage = $data['perpage'];
      $data = $data['comments'];
  
      echo json_encode([
          'data' => $data,
          'count' => $count,
          'perpage' =>$perpage
      ]);
   }
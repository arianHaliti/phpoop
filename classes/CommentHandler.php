<?php
require_once '../init.php';
   $comment =  new Comment();
   if(isset($_POST['value'])){
      $value = $_POST['value'];
      $post_id = $_POST['post_id'];
      

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
    
      
      $data= $post->getComments($page);
      echo json_encode([
         'data' => [1,2,3],
         'count' => 4,
         'perpage' =>6
   ]);
      // $count = $data['count'];
      // $perpage = $data['perpage'];
      // $data = $data['posts'];
  
      
      
      // // print_r($users);
      // // $myJSON = json_encode($users);
      // echo json_encode([
      //     'data' => $data,
      //     'count' => $count,
      //     'perpage' =>$perpage
      // ]);
   }
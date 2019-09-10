<?php
require_once '../init.php';



    $page = $_POST['page'];
    $post =  new Post;
    $data= $post->getPosts($page);
    
    $count = $data['count'];
    $perpage = $data['perpage'];
    $data = $data['posts'];

    
    
    // print_r($users);
    // $myJSON = json_encode($users);
    echo json_encode([
        'data' => $data,
        'count' => $count,
        'perpage' =>$perpage
    ]);
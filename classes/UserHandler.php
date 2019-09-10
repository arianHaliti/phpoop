<?php
require_once 'User.php';
require_once 'DB.php';



    $page = $_POST['page'];
    $user =  new User;
    $data= $user->getUsers($page);
    
    $count = $data['count'];
    $perpage = $data['perpage'];
    $data = $data['users'];

    
    
    // print_r($users);
    // $myJSON = json_encode($users);
    echo json_encode([
        'data' => $data,
        'count' => $count,
        'perpage' =>$perpage
    ]);
<?php
require_once '../init.php';

$job = $_POST['data'];
$title = $job['title'];
$name = $job['name'];
$email = $job['email'];
$phone = $job['phone'];
$desc = $job['desc'];
$salary =$job['salary'];
$category = $job['category'];
$job = new Job();
$job->create([
    'category_id' =>(int) $category,
    'company' => $name,
    'contact_email' => $email,
    'contact_user' => $phone,
    'description' => $desc,
    'title' => $title,
    'salary' => $salary, 
]);
$job->execute();
echo json_encode([
    'data' => [$job,$title,$name,$email,$phone,$desc,$salary,$category],
]);
// $post =  new Post;
// $data= $post->getPosts($page);

// $count = $data['count'];
// $perpage = $data['perpage'];
// $data = $data['posts'];



// print_r($users);
// $myJSON = json_encode($users);

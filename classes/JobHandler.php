<?php
require_once '../init.php';
$job = new Job();

if(isset($_GET['category'])){
    $category = $_GET['category'];
    if($category == "null"){
        $data =$job->getJobs();
    }else{
        $data = $job->getJobsByCategory($category);
       
    }
    echo json_encode([
        'data' => $data
    ]);
}else{
    $job = $_POST['data'];
    $title = $job['title'];
    $name = $job['name'];
    $email = $job['email'];
    $phone = $job['phone'];
    $desc = $job['desc'];
    $salary =$job['salary'];
    $category = $job['category'];
    $job = new Job();
    $job = $job->create([
        'category_id' =>(int) $category,
        'company' => $name,
        'contact_email' => $email,
        'contact_user' => $phone,
        'description' => $desc,
        'title' => $title,
        'salary' => $salary, 
    ]);
    echo json_encode([
        'data' => $job
    ]);
}
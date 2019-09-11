<?php

class Post {
    private $conn;

    public function __construct(){
        $this->conn = new DB();
    }

    public function create($params){
        $params['user_id'] = $_SESSION['id'];
       $res = $this->conn->query(
        "INSERT INTO posts (`title`, `body`, `user_id`) VALUES (?,?,?)",
        $params);
        return $this->conn->lastId();
     
    }

    public function getPost($post){
    $data = $this->conn->query(
        "SELECT * FROM posts p INNER JOIN users u ON p.user_id = u.id WHERE p.id = ?",
        ["id" =>$post]);
        
    if($data == "Error" || !sizeof($data)){
        header('location: /phpoop/index.php');
        return "Error";
        
    }
        return $data[0];

        
    }

    public function getPosts($p){
        try{
           $perpage = 5;
           if ( filter_var($p, FILTER_VALIDATE_INT) === false ) {
              die();
           }
        $combined =$p * $perpage;
        $posts = $this->conn->query(
            "SELECT p.id as post_id ,p.title,p.body,p.created_at,u.id as user_id ,u.username FROM posts p INNER JOIN users u on u.id = p.user_id LIMIT {$perpage} OFFSET {$combined}");
        
           $count = $this->conn->query("SELECT count(*) AS count FROM posts");
           return ["posts" => $posts,
                 "count" => $count[0],
                 "perpage" => $perpage
                 ];
        }catch(Execption $e){
            
           return ["error" => "Something went wrong"];
        }
       
     }

}
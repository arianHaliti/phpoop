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
        $res = $this->conn->getRows();
        return $this->conn->lastId();
     
    }

    public function getPost($post){
    $data = $this->conn->query(
        "SELECT * FROM posts p INNER JOIN users u ON p.user_id = u.id WHERE p.id = ?",
        ["id" =>$post]);
    $data = $this->conn->singleRow();
    if($data == "Error" || !($data)){
        header('location: /phpoop/index.php');
        return "Error";
        
    }
        return $data;

        
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
        $posts = $this->conn->getRows();
        $count = $this->conn->query("SELECT count(*) AS count FROM posts");
        $count = $this->conn->singleRow();
           return ["posts" => $posts,
                 "count" => $count,
                 "perpage" => $perpage
                 ];
        }catch(Execption $e){
            
           return ["error" => "Something went wrong"];
        }
       
     }

}
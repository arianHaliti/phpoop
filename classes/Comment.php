<?php

class Comment {
    private $conn;

    public function __construct(){
        $this->conn = new DB();
    }

    public function create($params){
        $params['user_id'] = $_SESSION['id'];
       $res = $this->conn->query(
        "INSERT INTO comments (`body`, `post_id`, `user_id`) VALUES (?,?,?)",
        $params);
        return $this->conn->lastId();
     
    }
    public function getComment($comment){
        $data = $this->conn->query(
            "SELECT c.id, c.body, u.username,c.created_at FROM comments c INNER JOIN users u ON c.user_id = u.id WHERE c.id = ?",
            ["id" =>$comment]);
     
            return $data[0];
    
            
    }
    // some of the code repeats maybe put it inside DB.class
    public function getComments($p,$post_id){
        try{
           $perpage = 5;
           if ( filter_var($p, FILTER_VALIDATE_INT) === false ) {
              die();
           }
        $combined =$p * $perpage;
        $comments = $this->conn->query(
        "SELECT c.id as comment_id ,c.body,c.created_at ,u.username
        FROM comments c INNER JOIN users u on u.id = c.user_id INNER JOIN posts p on p.id = c.post_id 
        WHERE p.id = ?
        LIMIT {$perpage} OFFSET {$combined}",["post_id" => $post_id]);
        
        $count = $this->conn->query(
            "SELECT count(*) AS count 
             FROM comments c INNER JOIN posts p on p.id = c.post_id 
             WHERE p.id = ? ",["post_id" => $post_id]);
             
        return ["comments" => $comments,
                "count" => $count[0],
                "perpage" => $perpage
                ];
        }catch(Execption $e){
            
           return ["error" => "Something went wrong"];
        }
       
     }
    
}
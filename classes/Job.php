<?php 

class Job {

    private $conn;
    public function __construct(){
        $this->conn = new DB;
    }
    public function create($params){
        $params['created_by'] = $_SESSION['id'];
        $res = $this->conn->query(
        "INSERT INTO jobs (`category_id`, `company`, `contact_email`, `contact_user`, `description`,`title`,`salary`,`created_by`)
         VALUES (?,?,?,?,?,?,?,?)",
        $params);
        $res = $this->conn->singleRow();
        return $this->conn->lastId();
     
    }
    public function getAllCategories(){
        $data = $this->conn->query("SELECT * FROM job_categories");
        $data = $this->conn->getRows();
        if($data == "Error" || !($data)){
            header('location: /phpoop/index.php');
            return "Error";
            
        }
            return $data;       
    }
    public function getJobs($category = null){
        $data = $this->conn->query(
            "SELECT * FROM jobs j");
        $data = $this->conn->getRows();
        return $data;
    }
    public function getJobsByCategory($category){
        $data = $this->conn->query(
            "SELECT * FROM jobs j INNER JOIN job_categories c on j.category_id = c.id 
            WHERE c.id = ?",
            ["id" =>$category]);
        $data = $this->conn->getRows();
            return $data;   
    }
    
    public function getJob($id){
        $data = $this->conn->query(
            "SELECT * FROM jobs WHERE id = ?",
            ["id" =>$id]);
        $data = $this->conn->singleRow();
        if($data == "Error" || !($data)){
            header('location: /phpoop/index.php');
            return "Error";
        }
            return $data;   
        }
}

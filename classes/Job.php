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
         VALUES (?,?,?,?,?,?,?)",
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
}

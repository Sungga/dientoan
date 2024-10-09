<?php 
class DB{
    public $db;
    protected $localhost;
    protected $username;
    protected $password;
    protected $dbname;

    public function __construct(){
        $this->localhost = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname = "project_sv";
        $this->db = new mysqli($this->localhost, $this->username, $this->password, $this->dbname);
        if($this->db->connect_error){
            die("Connection failed: ". $this->db->connect_error);
        }
        mysqli_set_charset($this->db, 'utf8');
    }
}
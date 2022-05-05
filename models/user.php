<?php
ini_set('display_errors', 'on');
require_once '../libraries/database.php';
require_once '../controllers/functions.php';

class User {

    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    //Find user by email or username
    public function findUserByEmail($email){
        $this->db->query('SELECT * FROM users WHERE mail = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        //Check row
        if($this->db->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }

    //Register User
    public function register($data){
        $this->db->query('INSERT INTO users (`name`, `mail`, `hashed_password`) 
        VALUES (:name, :mail, :hashed_password)');
        //Bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':mail', $data['mail']);
        $this->db->bind(':hashed_password', $data['password']);


        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    //Login user
    public function login($email, $password){
        $row = $this->findUserByEmail($email);

        if($row == false) return false;

        $hashedPassword = $row->password;
        if(password_verify($password, $hashedPassword)){
            return $row;
        }else{
            return false;
        }
    }
}
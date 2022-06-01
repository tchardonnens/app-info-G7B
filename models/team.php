<?php
require_once './libraries/database.php';
require_once './controllers/functions.php';

class Team {

    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    //Find user by email or username
    public function findTeam($name){
        $this->db->query('SELECT * FROM teams WHERE name = :name');
        $this->db->bind(':name', $name);

        $row = $this->db->single();

        //Check row
        if($this->db->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }

    //update user infos
    public function updateTeam($data){
        $this->db->query('UPDATE teams SET `name`=:name,`building`=:building,`floor`=:floorNumber WHERE `id_team`=:id_team');
        //Bind values
        $this->db->bind(':id_team', $data['id_team']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':building', $data['building']);
        $this->db->bind(':floorNumber', $data['floor']);
        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

}
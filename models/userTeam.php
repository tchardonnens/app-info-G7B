<?php
require_once './libraries/database.php';
require_once './controllers/functions.php';

class UserTeam {

    private $db;

    public function __construct(){
        $this->db = new Database;
    }


    //Register User
    public function addUserToTeam($data){
        $this->db->query('INSERT INTO teams_users (`id_team`,`id_user`) VALUES (:id_team, :id_user)');
        //Bind values
        $this->db->bind(':id_team', $data['id_team']);
        $this->db->bind(':id_user', $data['id_user']);

        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    //Find user by email or username
    public function findTeamOfUser($id_user){
        $this->db->query('SELECT * FROM teams_users WHERE id_user = :id_user');
        $this->db->bind(':id_user', $id_user);

        $rows = $this->db->single();

        //Check row
        if($this->db->rowCount() > 0){
            return $rows;
        }else{
            return false;
        }
    }

    //Find user by email or username
    public function findUsersOfTeam($id_team){
        $this->db->query('SELECT * FROM teams_users WHERE id_team = :id_team');
        $this->db->bind(':id_team', $id_team);

        $rows = $this->db->single();

        //Check row
        if($this->db->rowCount() > 0){
            return $rows;
        }else{
            return false;
        }
    }

    //update user infos
    public function updateTeamOfUser($data){
        $this->db->query('UPDATE teams_users SET `id_team`=:id_team WHERE `id_user`=:id_user');
        //Bind values
        $this->db->bind(':id_team', $data['id_team']);
        $this->db->bind(':id_user', $data['id_user']);
        
        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

}
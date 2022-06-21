<?php
require_once './libraries/database.php';
require_once './controllers/functions.php';

class Sensor
{

  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  //Find sensor by name
  public function findAllSensors()
  {
    $this->db->query('SELECT * FROM sensors');

    $rows = $this->db->resultSet();

    //Check row
    if ($this->db->rowCount() > 0) {
      return $rows;
    } else {
      return false;
    }
  }

  //Find sensor by name
  public function findSensorByName($name)
  {
    $this->db->query('SELECT * FROM sensors WHERE sensor_type = :name');
    $this->db->bind(':name', $name);

    $row = $this->db->single();

    //Check row
    if ($this->db->rowCount() > 0) {
      return $row;
    } else {
      return false;
    }
  }
}

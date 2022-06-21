<?php
require_once './libraries/database.php';
require_once './controllers/functions.php';

class SensorData
{

  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  //Find sensor by name
  public function findSensorDataBySensorType($sensor_type)
  {
    $this->db->query('SELECT * FROM sensor_data INNER JOIN sensors ON sensors.id_sensor = sensor_data.id_sensor WHERE sensors.sensor_type = :sensor_type');
    $this->db->bind(':sensor_type', $sensor_type);

    $rows = $this->db->resultSet();

    //Check row
    if ($this->db->rowCount() > 0) {
      return $rows;
    } else {
      return false;
    }
  }
}

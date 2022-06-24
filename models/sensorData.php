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


  public function fetchDataFromBridge()
  {
    //-----------Recuperer les donnees des logs depuis PHP
    #On utilise la bibliotheque cURL (client URL request library)
    $ch = curl_init();
    curl_setopt(
      $ch,
      CURLOPT_URL,
      "http://projets-tomcat.isep.fr:8080/appService/?ACTION=GETLOG&TEAM=7506"
    );
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $data = curl_exec($ch); //$data contient les donnees brutes, sous forme d’une longue chaine de caracteres.
    curl_close($ch);
    //echo "Raw Data:<br />";
    //echo $data;
    //echo "Combien de caractères " . strlen($data) . " <br/>";

    //-----------donnees sous forme de tableau
    //str_split permet de decouper la chaine de caracteres $data en portion de 33 caracteres.
    //Le resultat est un tableau: 1 ligne par trame
    $data_tab = str_split($data, 33);
    $size = count($data_tab);
    echo "Combien de trames " . $size . " <br/>";
    echo "<br/>";
    echo "Tabular Data:<br />";
    for ($i = 0, $size = count($data_tab); $i < $size; $i++) {
      echo "Trame $i: $data_tab[$i]<br/>";
    }

    //-----------Decoder 1 trame: 2 façons
    //La fonction substr recupere une partie d’une chaine de caracteres
    //La fonction sscanf permet de definir comment se decompose la trame

    $trame = $data_tab[1];
    // decodage avec des substring
    $trame = substr($trame, 0, 1);  // parameter (chain, starting point, length)
    $objet = substr($trame, 1, 4); //
    echo $trame . "</br>";
    echo $objet;
    // decodage avec sscanf
    list($trame, $objet, $request, $sensor_type, $sensor_number, $value, $a, $x, $year, $month, $day, $hour, $min, $sec) = sscanf($trame, "%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");

    $this->db->query('INSERT INTO sensor_data (`id_sensor`,`value`,`timestamp`) VALUES (:id_sensor, :value, :timestamp)');
    //Bind values
    $this->db->bind(':id_sensor', $sensor_number);
    $this->db->bind(':value', $value);
    $timestamp = "{$year}-{$month}-{$day} {$hour}:{$min}:{$sec}";
    $this->db->bind(':timestamp', $timestamp);


    //Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function sendRequest()
  {
    //$url = 'projets-tomcat.isep.fr:8080/appService?ACTION=COMMAND&TEAM=0001&TRAME='.$trame;
    // Envoyer une requete 
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://projets-tomcat.isep.fr:8080/appService/?ACTION=COMMAND&TEAM=7506&TRAME=175062501111100");
    $data = curl_exec($ch);
    curl_close($ch);
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

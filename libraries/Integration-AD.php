<?php
//-----------Recuperer les donnees des logs depuis PHP
#On utilise la bibliotheque cURL (client URL request library)
$ch = curl_init();
curl_setopt(
$ch,
CURLOPT_URL, "http://projets-tomcat.isep.fr:8080/appService/?ACTION=GETLOG&TEAM=9999");
curl_setopt($ch, CURLOPT_HEADER, FALSE); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
$data = curl_exec($ch); //$data contient les donnees brutes, sous forme d’une longue chaine de caracteres.
curl_close($ch);
echo "Raw Data:<br />";
echo $data;
echo "Combien de caractères ".strlen($data)." <br/>";

//-----------donnees sous forme de tableau
//str_split permet de decouper la chaine de caracteres $data en portion de 33 caracteres.
//Le resultat est un tableau: 1 ligne par trame
$data_tab = str_split($data,33);
$size=count($data_tab);
echo "Combien de trames ".$size." <br/>";
echo "<br/>";
echo "Tabular Data:<br />";
for($i=0, $size=count($data_tab); $i<$size; $i++)
{
	echo "Trame $i: $data_tab[$i]<br/>";
}

//-----------Decoder 1 trame: 2 façons
//La fonction substr recupere une partie d’une chaine de caracteres
//La fonction sscanf permet de definir comment se decompose la trame

$trame = $data_tab[1];
// decodage avec des substring
$t = substr($trame,0,1);  // parameter (chain, starting point, length)
$o = substr($trame,1,4); //
echo $t."</br>";
echo $o; 
// decodage avec sscanf
list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) = sscanf($trame,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
echo("<br />$t,$o,$r,$c,$n,$v,$a,$x,$year,$month,$day,$hour,$min,$sec<br />");

//$url = 'projets-tomcat.isep.fr:8080/appService?ACTION=COMMAND&TEAM=0001&TRAME='.$trame;
// Envoyer une requete 
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL, "http://projets-tomcat.isep.fr:8080/appService/?ACTION=COMMAND&TEAM=0001&TRAME=100012D02255511259920180525152052");
$data = curl_exec($ch);
curl_close($ch);
?>
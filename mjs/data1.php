<?php
//setting header to json
header('Content-Type: application/json');

//database
define('DB_HOST', '127.0.0.1');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'inoc');

//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli){
	die("Connection failed: " . $mysqli->error);
}
$query="SELECT region, 
COUNT(IF(type ='2G', site_id, NULL)) AS type1, 
COUNT(IF(type='3G', site_id, NULL)) AS type2, 
COUNT(IF(type='LTE', site_id, NULL)) AS type3, 
COUNT(IF(type='Pico-2G', site_id, NULL)) AS type4,
COUNT(IF(type='Pico-3G', site_id, NULL)) AS type5  
FROM site_inventory 
GROUP BY region;"; 
	$result=$mysqli->query($query)
	or die ($mysqli->error);


//store the entire response
$response = array();
//the array that will hold the titles and links
$data = array();
while($row=$result->fetch_assoc()) //mysql_fetch_array($sql)
{ $type=$row['region'];
$type1=$row['type1'];
$type2=$row['type2'];
$type3=$row['type3'];
$type4=$row['type4'];
$type5=$row['type5'];
$type6=$type4+$type5;
//$textWare01_HU=$row['score'];


 
// //each item from the rows go in their respective vars and into the data array
$data[] = array('type'=> $type,'type1'=> $type1,'type2'=> $type2,'type3'=> $type3,'type4'=> $type6);
} 

//the data array goes into the response
//$response['data'] = $data;
//creates the file

echo json_encode($data);
?>
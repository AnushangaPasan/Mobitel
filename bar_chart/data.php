<?php
//setting header to json
header('Content-Type: application/json');

//database
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'anushanga');

//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli){
	die("Connection failed: " . $mysqli->error);
}
$query="SELECT type, 
COUNT(IF(vendor ='Huawei', site_id, NULL)) AS type1 
FROM site_inventory 
GROUP BY type;"; 
	$result=$mysqli->query($query)
	or die ($mysqli->error);


//store the entire response
$response = array();
//the array that will hold the titles and links
$data = array();
while($row=$result->fetch_assoc()) //mysql_fetch_array($sql)
{ $type=$row['type'];
$type1=$row['type1'];

//$textWare01_HU=$row['score'];


 
// //each item from the rows go in their respective vars and into the data array
$data[] = array('type'=> $type,'type1'=> $type1);
} 

//the data array goes into the response
//$response['data'] = $data;
//creates the file

echo json_encode($data);
?>
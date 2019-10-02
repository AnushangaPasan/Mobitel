<?php
//setting header to json
header('Content-Type: application/json');

//database
define('DB_HOST', '127.0.0.1');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'ims_inoc');

//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli){
	die("Connection failed: " . $mysqli->error);
}


$query="SELECT jdate, 
COUNT(*) AS type1 
from tbl_trainee
 where YEAR(jdate) = '2015'
 group by month(jdate)"; 
	$result=$mysqli->query($query)
	or die ($mysqli->error);


//store the entire response
$response = array();
//the array that will hold the titles and links
$data = array();
while($row=$result->fetch_assoc()) //mysql_fetch_array($sql)
{ $type=$row['jdate'];
$date=explode(" ",$type);
$year=explode('-',$date[0]);
//echo $date[0];
echo $year[0];
echo $year[1];





$type1=$row['type1'];

//$textWare01_HU=$row['score'];


 
// //each item from the rows go in their respective vars and into the data array
$data[] = array('type'=> $year[1],'type1'=> $type1);
} 

//the data array goes into the response
//$response['data'] = $data;
//creates the file

echo json_encode($data);
?>
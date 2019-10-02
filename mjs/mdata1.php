<?php 

header('Content-Type: application/json');
$servername = "localhost";
$uname = "root";
$passwd = "";
$dbname = "demo_data";

// Create connection
$mysqli = new mysqli($servername, $uname, $passwd, $dbname);
// Check connection
if ($mysqli->connect_error) {
	die("Connection failed: " . $mysqli->connect_error);
}

$x=0;

// print json_encode($data);
$query="SELECT * from demo;"; 
	$result=$mysqli->query($query)
	or die ($mysqli->error);


//store the entire response
$response = array();
//the array that will hold the titles and links
$data = array();
while($row=$result->fetch_assoc()) //mysql_fetch_array($sql)
{ $type=$row['users'];
$type1=$row['count'];
/* $type2=$row['3G'];
$type3=$row['LTE'];
$type4=$row['Pico-2G'];
$type5=$row['Pico-3G'];
$type6=$row['Pico'];
$type7=$row['total']; */


//$data[] = array('Type'=> $type,'type1'=> $type1,'type2'=> $type2,'type3'=> $type3,'type4'=> $type4,'type5'=> $type5,'type6'=> $type6,'type7'=> $type7);
$datanew[] = array('Type'=> $type,'type1'=> $type1);
} 


echo json_encode($datanew);

																																				
?>


																																																																																																																																																																												


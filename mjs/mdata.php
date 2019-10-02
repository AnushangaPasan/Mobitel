<?php 

header('Content-Type: application/json');
$servername = "localhost";
$uname = "root";
$passwd = "";
$dbname = "inoc";

// Create connection
$mysqli = new mysqli($servername, $uname, $passwd, $dbname);
// Check connection
if ($mysqli->connect_error) {
	die("Connection failed: " . $mysqli->connect_error);
}


$type1=0;
$type2=0;
$type3=0;
$type4=0;
$type5=0;
$type6=0;
$type7=0;
// print json_encode($data);
$query="SELECT * from cumalative_sitecnt;"; 
	$result=$mysqli->query($query)
	or die ($mysqli->error);


//store the entire response
$response = array();
//the array that will hold the titles and links
$data = array();
while($row=$result->fetch_assoc()) //mysql_fetch_array($sql)
{ 
$type=$row['month'];
$a=$row['2G'];
$type1=$type1+$a;
$b=$row['3G'];
$type2=$type2+$b;
$c=$row['LTE'];
$type3=$type3+$c;
$d=$row['Pico-2G'];
$type4=$type4+$d;
$e=$row['Pico-3G'];
$type5=$type5+$e;
$f=$row['Pico'];
$type6=$type6+$f;
$g=$row['total'];
$type7=$type7+$g;
//$textWare01_HU=$row['score'];


 
// //each item from the rows go in their respective vars and into the data array
//$data[] = array('Type'=> $type,'type1'=> $type1,'type2'=> $type2,'type3'=> $type3);
$data[] = array('Type'=> $type,'type1'=> $type1,'type2'=> $type2,'type3'=> $type3,'type4'=> $type4,'type5'=> $type5,'type6'=> $type6,'type7'=> $type7);
} 

//the data array goes into the response
//$response['data'] = $data;
//creates the file

echo json_encode($data);



// Date
// textWare_HU
// textWare01_HU
// textWare02_HU
// textWare02_ZTE
// textWare01_ZTE
// textWare03_ZTE
// textWare_ZTE																																				
?>


																																																																																																																																																																												


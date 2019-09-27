<?php

//database
define('DB_HOST', 'localhost');
			define('DB_USERNAME', 'root');
			define('DB_PASSWORD', '');
			define('DB_NAME', 'ims_inoc');

//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli){
	die("Connection failed: " . $mysqli->error);
}


//setting header to json
header('Content-Type: application/json');
$query="SELECT *, 
COUNT(tblTraineeID) AS type2,
COUNT(IF(programName ='DIPLOMA', tblTraineeID, NULL)) AS type3,
COUNT(IF(programName ='CERTIFICATE', tblTraineeID, NULL)) AS type1,
COUNT(IF(programName ='DEGREE', tblTraineeID, NULL)) AS type4  
FROM tbl_trainee 
GROUP BY YEAR(jdate);";  
	$result=$mysqli->query($query)
	or die ($mysqli->error);


//store the entire response
$response = array();
//the array that will hold the titles and links
$data = array();
while($row=$result->fetch_assoc()) //mysql_fetch_array($sql)
{//$type=$row['a.Name'];
$type=$row['programName'];
$type1=$row['type1'];
$type=$row['jdate'];
$date=explode(" ",$type);
$year=explode('-',$date[0]);
$type2=$row['type2'];
$type3=$row['type3'];
$type4=$row['type4'];
//echo $year[0];
//echo $year[1];

//$type2=$row['type2'];
//$type3=$row['type3'];
//$textWare01_HU=$row['score'];


 
// //each item from the rows go in their respective vars and into the data array
$data[] = array('type'=> $year[0],'type0'=> $type0,'type1'=> $type1,'type2'=> $type2,'type3'=> $type3,'type4'=> $type4);
} 

//the data array goes into the response
//$response['data'] = $data;
//creates the file

echo json_encode($data);
?>

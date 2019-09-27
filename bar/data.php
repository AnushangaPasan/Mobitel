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
$query="SELECT jdate, 
COUNT(tblTraineeID) AS type1,
COUNT(IF(job_type ='GENERAL', tblTraineeID, NULL)) AS type2,
COUNT(IF(job_type ='ON JOB', tblTraineeID, NULL)) AS type3  
FROM tbl_trainee 
GROUP BY YEAR(jdate);"; 
	$result=$mysqli->query($query)
	or die ($mysqli->error);


//store the entire response
$response = array();
//the array that will hold the titles and links
$data = array();
while($row=$result->fetch_assoc()) //mysql_fetch_array($sql)
{ $type=$row['jdate'];
$type1=$row['type1'];
$date=explode(" ",$type);
$year=explode('-',$date[0]);
$type2=$row['type2'];
$type3=$row['type3'];
//echo $year[0];
//echo $year[1];

//$type2=$row['type2'];
//$type3=$row['type3'];
//$textWare01_HU=$row['score'];


 
// //each item from the rows go in their respective vars and into the data array
$data[] = array('type'=> $year[0],'type1'=> $type1,'type2'=> $type2,'type3'=> $type3);
} 

//the data array goes into the response
//$response['data'] = $data;
//creates the file

echo json_encode($data);
?>

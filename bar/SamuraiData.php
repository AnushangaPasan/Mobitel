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
COUNT(tblTraineeID) AS type0,
COUNT(IF(MONTH(jdate) ='01', tblTraineeID, NULL)) AS type1,
COUNT(IF(MONTH(jdate) ='02', tblTraineeID, NULL)) AS type2,
COUNT(IF(MONTH(jdate) ='03', tblTraineeID, NULL)) AS type3,
COUNT(IF(MONTH(jdate) ='04', tblTraineeID, NULL)) AS type4,
COUNT(IF(MONTH(jdate) ='05', tblTraineeID, NULL)) AS type5,
COUNT(IF(MONTH(jdate) ='06', tblTraineeID, NULL)) AS type6,
COUNT(IF(MONTH(jdate) ='07', tblTraineeID, NULL)) AS type7,
COUNT(IF(MONTH(jdate) ='08', tblTraineeID, NULL)) AS type8,
COUNT(IF(MONTH(jdate) ='09', tblTraineeID, NULL)) AS type9,
COUNT(IF(MONTH(jdate) ='10', tblTraineeID, NULL)) AS type10,
COUNT(IF(MONTH(jdate) ='11', tblTraineeID, NULL)) AS type11,
COUNT(IF(MONTH(jdate) ='12', tblTraineeID, NULL)) AS type12,



COUNT(IF(programName ='DIPLOMA', tblTraineeID, NULL)) AS type20,
COUNT(IF(programName ='CERTIFICATE', tblTraineeID, NULL)) AS type30,
COUNT(IF(programName ='DEGREE', tblTraineeID, NULL)) AS type40  
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
$type0=$row['type0'];
$type1=$row['type1'];
$date=explode(" ",$type);
$year=explode('-',$date[0]);
$type2=$row['type2'];
$type3=$row['type3'];
$type4=$row['type4'];
$type5=$row['type5'];
$type6=$row['type6'];
$type7=$row['type7'];
$type8=$row['type8'];
$type9=$row['type9'];
$type10=$row['type10'];
$type11=$row['type11'];
$type12=$row['type12'];

$type20=$row['type20'];
$type30=$row['type30'];
$type40=$row['type40'];

//echo $year[0];
//echo $year[1];

//$type2=$row['type2'];
//$type3=$row['type3'];
//$textWare01_HU=$row['score'];


 
// //each item from the rows go in their respective vars and into the data array
$data[] = array('type'=> $year[0],'type0'=> $type0,'type1'=> $type1,'type2'=> $type2,'type3'=> $type3,'type4'=> $type4,'type5'=> $type5,'type6'=> $type6,'type7'=> $type7,'type8'=> $type8,'type9'=> $type9,'type10'=> $type10,'type11'=> $type11,'type12'=> $type12,'type20'=> $type20,'type30'=> $type30,'type40'=> $type40 );
} 

//the data array goes into the response
//$response['data'] = $data;
//creates the file

echo json_encode($data);
?>

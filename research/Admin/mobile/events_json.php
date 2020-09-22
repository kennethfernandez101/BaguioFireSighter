<?php

$con = mysqli_connect("localhost","root","","firerecords") or die("Error " . mysqli_error($link));	
 
$sql ="SELECT * FROM eventstbl";	
 
$res = mysqli_query($con,$sql);

$result = array();
 
while($row = mysqli_fetch_array($res)){
array_push($result,
array('event_id'=>$row[0],
'edateandtime'=>$row[1],
'etitle'=>$row[2],
'eimage_path'=>$row[3],
'ecaption'=>$row[4],

));
}
 
echo json_encode(array("result"=>$result));
 
mysqli_close($con);
 
?>
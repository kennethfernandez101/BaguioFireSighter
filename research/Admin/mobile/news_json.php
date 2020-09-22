<?php

$con = mysqli_connect("localhost","root","","firerecords") or die("Error " . mysqli_error($link));	
 
$sql ="SELECT * FROM newstbl";	
 
$res = mysqli_query($con,$sql);

$result = array();
 
while($row = mysqli_fetch_array($res)){
array_push($result,
array('news_id'=>$row[0],
'dateandtime'=>$row[1],
'title'=>$row[2],
'image_path'=>$row[3],
'caption'=>$row[4],

));
}
 
echo json_encode(array("result"=>$result));
 
mysqli_close($con);
 
?>
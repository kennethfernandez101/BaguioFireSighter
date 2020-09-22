<?php

$con = mysqli_connect("mysql.hostinger.ph","u275636072_tayug","52523843","u275636072_tayug") or die("Error " . mysqli_error($link));	
 
$sql ="SELECT * from userreport WHERE Status ='Fire On-Going'";	
 
$res = mysqli_query($con,$sql);

$result = array();
 
while($row = mysqli_fetch_array($res)){
array_push($result,
array('urid'=>$row[0],
'repdescription'=>$row[1],
'contactno'=>$row[2],
'firedate'=>$row[3],
'firetime'=>$row[4],

));
}
 
echo json_encode(array("result"=>$result));
 
mysqli_close($con);
 
?>
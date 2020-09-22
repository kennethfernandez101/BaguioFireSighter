<?php

	
	$con=mysqli_connect('localhost','root','')or die("cannot connect to server");
	mysqli_select_db($con, 'firerecords')or die("cannot select db");
	
	//$search = 14;

	$image=$_POST['image'];
	$info = $_POST['info'];
	$contactno = $_POST['contactno'];
	$lat = $_POST['lat'];
	$lng = $_POST['lng'];

	$todate = date('m-d-Y');

	date_default_timezone_set('Asia/Manila');
	$currentDateTime = date('m/d/Y H:i:s');
	
	$totime = date('h:i A', strtotime($currentDateTime));

	$sql= "SELECT urid FROM userreport ORDER BY urid ASC";

	$res = mysqli_query($con,$sql);

	$id=0;

	while($row=mysqli_fetch_array($res)){
		$id=$row['urid'];
	}

	$path = "uploads/$id.png";

	$actualpath="http://192.168.18.2/research/Admin/mobile/$path";

	$sql="INSERT INTO userreport (reportimage, repdescription,contactno, firedate, firetime, lat, lng, Status) VALUES ('$actualpath', '$info','$contactno', '$todate', '$totime' ,'$lat','$lng', 'Fire On-Going')";

	if(mysqli_query($con,$sql)){
		file_put_contents($path, base64_decode($image));
		echo "Successfully uploaded!";
		mysqli_close($con);

		}else{
			echo "Error uploading!";
		}

?>

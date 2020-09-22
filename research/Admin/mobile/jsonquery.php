<?php

	
	$con=mysqli_connect('localhost','root','')or die("cannot connect to server");
	mysqli_select_db($con, 'firerecords')or die("cannot select db");
	
	//$search = 14;
	$firstname=$_POST['firstname'];
	$middlename=$_POST['middlename'];
	$lastname=$_POST['lastname'];
	$barangay=$_POST['barangay'];
	$strt=$_POST['strt'];
	$house_no=$_POST['house_no'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	
	
	$sql= "SELECT user_id FROM useracctbl ORDER BY user_id ASC";

	$res = mysqli_query($con,$sql);

	$id=0;

	while($row=mysqli_fetch_array($res)){
		$id=$row['user_id'];
	}

	
	$sql="INSERT INTO useracctbl (firstname, middlename, lastname, barangay, strt, house_no, username, password) VALUES 
	('$firstname', '$middlename', '$lastname', '$barangay','$strt','$house_no','$username','$password')";

	if(mysqli_query($con,$sql)){
		echo "Successfully Creating an Account!";
		mysqli_close($con);
		}else{
			echo "Error Creating!";
		}


?>


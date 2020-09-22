<?php

session_start();
$staff_id = $_SESSION['staff_id'];
$staff_lname = $_SESSION['lname'];
$staff_fname = $_SESSION['fname'];
$staff_mname = $_SESSION['mname'];

$position = $_SESSION['position'];


$con = mysqli_connect("localhost","root","","firerecords") or die("Error " . mysqli_error($link));

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
if(isset($_GET['id']))
{
$id=$_GET['id'];

$sql = mysqli_query($con, "DELETE FROM recordstbl WHERE reportno ='$id'");

if ($sql){
	
	
															
							//getting the data of staff/Admin for documenting Log-Reports
			$staff_name = $staff_fname." ".$staff_lname;			
			$activity = "".$staff_name." Deleted a Record";
			//Input a Log Event			
			$log_event ="INSERT into log_event (date, time, id, name, position, activity) VALUES (CURDATE(), CURTIME(), '$staff_id', '$staff_name', '$position', '$activity')";		
			if (!mysqli_query($con,$log_event)){
				echo "Error Query insert_log_event";
				}else{
				}
	
	
	?>
					<script>
                    alert ("Succesfully Deleted Added a Record");
					window.location.href="viewreports.php";
                    </script>
                    <?
}
}

mysqli_close($con);	
?>
</body>
</html>
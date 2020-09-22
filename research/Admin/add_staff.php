<?php
session_start();

//Transfer the Staff information sessions to new variables
$staff_id = $_SESSION['staff_id'];
$staff_lname = $_SESSION['lname'];
$staff_fname = $_SESSION['fname'];
$staff_mname = $_SESSION['mname'];
$position = $_SESSION['position'];

//User Control for Staff and Admin
$disable = "";
$link_add_firefighter= "#";
$link_view_firefighter= "#";

if ($position == "Staff"){
	$disable = "disabled";
	$link_add_firefighter= "#";
	$link_view_firefighter= "#";
}elseif ($position == "Admin"){
	$disable = "";
	$link_add_firefighter = "add_staff.php.php";
	$link_view_firefighter= "list_of_staff.php";
	}
	
//to Generate Unique ID
function unique_id($l) {
		return substr(md5(uniqid(mt_rand(), false)), 0, $l);
	}
	
	
//Error Variables
$errorMessage1 = "";
$errorMessage2 = "";
$errorMessage3 = "";
$errorMessage4 = "";
$errorMessage5 = "";
$errorMessage6 = "";
$errorMessage7 = "";
$errorMessage8 = "";
$errorMessage9 = "";
$errorMessage10 = "";
$errorMessage11 = "";
$errorMessage12 = "";
$errorMessage13 = "";
$errorMessage14 = "";
$errorMessage15 = "";

if (isset($_POST['submit'])){

//validations

	$filesize = $_FILES["file_img"]["size"];
	
	if ($filesize === 0){
		echo "<style text/css>
		#photo{border-color:#F00;}
		</style>";
		$errorMessage1 = "<span class='label label-danger'>Input Photo</span>";
		
	}else{
		//Checking if the file is an Image
		$check = getimagesize($_FILES["file_img"]["tmp_name"]);
		if($check !== false) {
			echo "" . $check["mime"] . ".";
			//Checking the filesize of image
   				if($filesize > 2000000){
				echo "<style text/css>
				#photo{border-color:#F00;}
				</style>";
				$errorMessage1 = "<span class='label label-danger'>Image size is too large</span>";
				}else{
				echo "<style text/css>
				#photo{border-color:E1E1E1;}
				</style>";
				$errorMessage1 = "";
				}
		}else{
    	echo "<style text/css>
		#photo{border-color:#F00;}
		</style>";
		$errorMessage1 = "<span class='label label-danger'>File is not Image</span>";
		}
	}

	if(empty($_POST['staff_id'])){
		echo "<style text/css>
		#staff_id{border-color:#F00;}</style>";
	}else{
	
		echo "<style text/css>
		#staff_id{border-color:E1E1E1}</style>";
	}
	
	//name
	if(empty($_POST['lname'])){
		echo "<style text/css>
		#lname{border-color:#F00;}
		</style>";
		$errorMessage2 = "<span class=' label label-danger'>Input Last Name</span>";
		
	}elseif((!preg_match("/^[a-zA-Z ]*$/",$_POST['lname']))){
		echo "<style text/css>
		#lname{border-color:#F00;}
		</style>";
		$errorMessage2 ="<span class=' label label-warning'>Letters only</span>";
	}else{
	
		echo "<style text/css>
		#lname{border-color:E1E1E1}</style>";
		$errorMessage2="";
	}
	
	if(empty($_POST['fname'])){
		echo "<style text/css>
		#fname{border-color:#F00;}
		</style>";
		$errorMessage3 = "<span class='label label-danger'>Input Last Name</span>";
		
	}elseif((!preg_match("/^[a-zA-Z ]*$/",$_POST['fname']))){
		echo "<style text/css>
		#fname{border-color:#F00;}
		</style>";
		$errorMessage3 ="<span class='label label-warning'>Letters only</span>";
	}else{
	
		echo "<style text/css>
		#fname{border-color:E1E1E1}
		</style>";	
		$errorMessage3="";
	}
	
	if(empty($_POST['mname'])){
		echo "<style text/css>
		#mname{border-color:#F00;}
		</style>";
		$errorMessage4 = "<span class='label label-danger'>Input Middle Name</span>";
		
	}elseif((!preg_match("/^[a-zA-Z ]*$/",$_POST['mname']))){
		echo "<style text/css>
		#mname{border-color:#F00;}
		</style>";
		$errorMessage4 ="<span class='label label-warning'>Letters only</span>";
	}else{
		
		echo "<style text/css>
		#mname{border-color:E1E1E1}
		</style>";	
		$errorMessage4="";
	}
	//name
	
	if(empty($_POST['bdate'])){
		echo "<style text/css>
		#bdate{border-color:#F00;}
		</style>";
		$errorMessage5 = "<span class='label label-danger'>Input Birth Date</span>";
	}else{
		echo "<style text/css>
		#bdate{border-color:E1E1E1}
		</style>";
		$errorMessage5 = "";
	}
	
	if($_POST['age'] >=120){
		echo "<style text/css>
		#age{border-color:#F00;}
		</style>";
	$errorMessage15 = "<span class='label label-danger'>Invalid Age</span>";
	}elseif($_POST['age'] <18){
		echo "<style text/css>
		#age{border-color:#F00;}
		</style>";
	$errorMessage15 = "<span class='label label-danger'>Too young to be a fire fighter</span>";
	}else{
		echo "<style text/css>
		#age{border-color:E1E1E1}
		</style>";
		$errorMessage15 = "";
	}
	
	if(empty($_POST['rank'])){
		echo "<style text/css>
		#rank{border-color:#F00;}
		</style>";
		$errorMessage6 = "<span class='label label-danger'>Select Rank</span>";
	}else{
		
		echo "<style text/css>
		#rank{border-color:E1E1E1}</style>";
		$errorMessage6 = "";
	}
	
	if(empty($_POST['gender'])){
		echo "<style text/css>
		#rgender{border-color:#F00;}
		</style>";
		$errorMessage7 = "<span class='label label-danger'>Select Gender</span>";
	}else{
		
		echo "<style text/css>
		#gender{border-color:E1E1E1}</style>";
		$errorMessage7 = "";
	}
	
	if(empty($_POST['civil_status'])){
		echo "<style text/css>
		#civil_status{border-color:#F00;}
		</style>";
		$errorMessage8 = "<span class='label label-danger'>Select Civil Status</span>";
	}else{
		
		echo "<style text/css>
		#civil_status{border-color:E1E1E1}</style>";
		$errorMessage8 = "";
	}
	
	if(empty($_POST['contact_no'])){
		echo "<style text/css>
		#contact_no{border-color:#F00;}
		</style>";
		$errorMessage9 = "<span class='label label-danger'>Input Contact Number</span>";
	}else{
		
		echo "<style text/css>
		#contact_no{border-color:E1E1E1}</style>";
		$errorMessage9 = "";
	}
	
	if(empty($_POST['datehired'])){
		echo "<style text/css>
		#datehired{border-color:#F00;}
		</style>";
	}else{
		
		echo "<style text/css>
		#datehired{border-color:E1E1E1}</style>";
	}
	
	//address
	if(empty($_POST['no_street'])){
		echo "<style text/css>
		#no_street{border-color:#F00;}
		</style>";
		$errorMessage10 = "<span class='label label-danger'>Input Number/Street</span>";
		
		}else{
		
		echo "<style text/css>
		#no_street{border-color:E1E1E1}
		</style>";
		$errorMessage10 = "";
	}
	
	if(empty($_POST['barangay'])){
		echo "<style text/css>
		#barangay{border-color:#F00;}
		</style>";
		$errorMessage11 = "<span class='label label-danger'>Input Barangay</span>";
	}elseif((!preg_match("/^[a-zA-Z ]*$/",$_POST['barangay']))){
		echo "<style text/css>
		#barangay{border-color:#F00;}
		</style>";
		$errorMessage11 ="<span class='label label-warning'>Letters only</span>";
		
	}else{
	
		echo "<style text/css>
		#barangay{border-color:E1E1E1}
		</style>";
		$errorMessage11 = "";
	}
	
	if(empty($_POST['town'])){
		echo "<style text/css>
		#town{border-color:#F00;}
		</style>";
		$errorMessage12 = "<span class='label label-danger'>Input Town</span>";
	}elseif((!preg_match("/^[a-zA-Z ]*$/",$_POST['town']))){
		echo "<style text/css>
		#town{border-color:#F00;}
		</style>";
		$errorMessage12 ="<span class='label label-warning'>Letters only</span>";
	}else{
		
		echo "<style text/css>
		#town{border-color:E1E1E1}
		</style>";
		$errorMessage12 = "";
	}
	
	if(empty($_POST['province'])){
		echo "<style text/css>
		#province{border-color:#F00;}
		</style>";
		$errorMessage13 = "<span class='label label-danger'>Input Province</span>";
	}elseif((!preg_match("/^[a-zA-Z ]*$/",$_POST['province']))){
		echo "<style text/css>
		#province{border-color:#F00;}
		</style>";
		$errorMessage13 ="<span class='label label-warning'>Letters only</span>";
	}else{
		echo "<style text/css>
		#province{border-color:E1E1E1}
		.val{color:#F00;}
		</style>";
		$errorMessage13 ="";
	}
	
	if(empty($_POST['chooseposition'])){
		echo "<style text/css>
		#chooseposition{border-color:#F00;}
		</style>";
		$errorMessage14 = "<span class='label label-danger'>Choose Position</span>";
		
	}else{
	
		echo "<style text/css>
		#chooseposition{border-color:E1E1E1}
		</style>";
		$errorMessage14="";
	}
	
			$password = $_POST['temppass'];
			
			
			// checking if all  fields are filled up.. if true
				if ((!empty($_POST['lname']))&&(preg_match("/^[a-zA-Z ]*$/",$_POST['lname']))&&(!empty($_POST['fname']))&&(preg_match("/^[a-zA-Z ]*$/",$_POST['fname']))&&(!empty($_POST['mname']))&&(preg_match("/^[a-zA-Z ]*$/",$_POST['mname']))&&(!empty($_POST['no_street']))&&(!empty($_POST['barangay']))&&(!empty($_POST['town']))&&(!empty($_POST['province']))&& ($_POST['age']>=18 && $_POST['age'] <=120)&&(!empty($_POST['chooseposition']))&&(!empty($_POST['rank']))&&(!empty($_POST['gender']))&&(!empty($_POST['civil_status']))&&(!empty($_POST['contact_no']))){
					
					$con = mysqli_connect("localhost","root","","firerecords") or die("Error " . mysqli_error($link));
					
					$staff_id =$_POST['staff_id'];
					$lname = $_POST['lname'];
					$fname = $_POST['fname'];
					$mname =$_POST['mname'];
					$bdate =$_POST['bdate'];
					$rank =$_POST['rank'];
					$gender =$_POST['gender'];
					$civil_status =$_POST['civil_status'];
					$contact_no =$_POST['contact_no'];
					$no_street =$_POST['no_street'];
					$brgy = $_POST['barangay'];
					$town = $_POST['town'];
					$prov = $_POST['province'];
					$dhired = $_POST['datehired'];
					$chooseposition =$_POST['chooseposition'];
					$username =$_POST['username'];
					$account='Active';
					$pass = $password;
					
					//hashing the password for security
					$hashed_password = md5($pass);
					
					

					
	$filetmp = $_FILES["file_img"]["tmp_name"];
	$filename = $_FILES["file_img"]["name"];
	$filetype = $_FILES["file_img"]["type"];
	$filepath = "firemen/".$filename;
	
	move_uploaded_file($filetmp,$filepath);
					
					$sql = "INSERT INTO admintbl (staff_id, firemenpict, username, password, fname, mname, lname, bdate, rank, gender, civil_status, contact_no, datehired, no_street, barangay, town, province, position, account, reason) VALUES ('$staff_id', '$filepath', '$username','$hashed_password', '$fname', '$mname', '$lname', '$bdate', '$rank', '$gender', '$civil_status', '$contact_no', '$dhired', '$no_street', '$brgy', '$town', '$prov', '$chooseposition', 'Active', '')";
							
							if (!mysqli_query($con,$sql)){
								echo "error query";
							}else{
								
							}
						
							//getting the data of staff/Admin for documenting Log-Reports
			$staff_name = $staff_fname." ".$staff_lname;			
			$activity = "".$staff_name." Created an Account for Staff";
			//Input a Log Event			
			$log_event ="INSERT into log_event (date, time, id, name, position, activity) VALUES (CURDATE(), CURTIME(), '$staff_id', '$staff_name', '$position', '$activity')";		
			if (!mysqli_query($con,$log_event)){
				echo "Error Query insert_log_event";
				}else{
				}
			?>
					<script>
                    window.alert("Succesfully Created an Account");
					window.location.href="bfp.php";
                    </script>
                    <?	
		mysqli_close($con);
		
	}else{
		validation();
	}
}

function validation(){
	//validations

	$filesize = $_FILES["file_img"]["size"];
	
	if ($filesize === 0){
		echo "<style text/css>
		#photo{border-color:#F00;}
		</style>";
		$errorMessage1 = "<span class='label label-danger'>Input Photo</span>";
		
	}else{
		//Checking if the file is an Image
		$check = getimagesize($_FILES["file_img"]["tmp_name"]);
		if($check !== false) {
			echo "" . $check["mime"] . ".";
			//Checking the filesize of image
   				if($filesize > 2000000){
				echo "<style text/css>
				#photo{border-color:#F00;}
				</style>";
				$errorMessage1 = "<span class='label label-danger'>Image size is too large</span>";
				}else{
				echo "<style text/css>
				#photo{border-color:E1E1E1;}
				</style>";
				$errorMessage1 = "";
				}
		}else{
    	echo "<style text/css>
		#photo{border-color:#F00;}
		</style>";
		$errorMessage1 = "<span class='label label-danger'>File is not Image</span>";
		}
	}

	if(empty($_POST['staff_id'])){
		echo "<style text/css>
		#staff_id{border-color:#F00;}</style>";
	}else{
	
		echo "<style text/css>
		#staff_id{border-color:E1E1E1}</style>";
	}
	
	//name
	if(empty($_POST['lname'])){
		echo "<style text/css>
		#lname{border-color:#F00;}
		</style>";
		$errorMessage2 = "<span class=' label label-danger'>Input Last Name</span>";
		
	}elseif((!preg_match("/^[a-zA-Z ]*$/",$_POST['lname']))){
		echo "<style text/css>
		#lname{border-color:#F00;}
		</style>";
		$errorMessage2 ="<span class=' label label-warning'>Letters only</span>";
	}else{
	
		echo "<style text/css>
		#lname{border-color:E1E1E1}</style>";
		$errorMessage2="";
	}
	
	if(empty($_POST['fname'])){
		echo "<style text/css>
		#fname{border-color:#F00;}
		</style>";
		$errorMessage3 = "<span class='label label-danger'>Input Last Name</span>";
		
	}elseif((!preg_match("/^[a-zA-Z ]*$/",$_POST['fname']))){
		echo "<style text/css>
		#fname{border-color:#F00;}
		</style>";
		$errorMessage3 ="<span class='label label-warning'>Letters only</span>";
	}else{
	
		echo "<style text/css>
		#fname{border-color:E1E1E1}
		</style>";	
		$errorMessage3="";
	}
	
	if(empty($_POST['mname'])){
		echo "<style text/css>
		#mname{border-color:#F00;}
		</style>";
		$errorMessage4 = "<span class='label label-danger'>Input Middle Name</span>";
		
	}elseif((!preg_match("/^[a-zA-Z ]*$/",$_POST['mname']))){
		echo "<style text/css>
		#mname{border-color:#F00;}
		</style>";
		$errorMessage4 ="<span class='label label-warning'>Letters only</span>";
	}else{
		
		echo "<style text/css>
		#mname{border-color:E1E1E1}
		</style>";	
		$errorMessage4="";
	}
	//name
	
	if(empty($_POST['bdate'])){
		echo "<style text/css>
		#bdate{border-color:#F00;}
		</style>";
		$errorMessage5 = "<span class='label label-danger'>Input Birth Date</span>";
	}else{
		echo "<style text/css>
		#bdate{border-color:E1E1E1}
		</style>";
		$errorMessage5 = "";
	}
	
	if($_POST['age'] >=120){
		echo "<style text/css>
		#age{border-color:#F00;}
		</style>";
	$errorMessage15 = "<span class='label label-danger'>Invalid Age</span>";
	}elseif($_POST['age'] <18){
		echo "<style text/css>
		#age{border-color:#F00;}
		</style>";
	$errorMessage15 = "<span class='label label-danger'>Too young to be a fire fighter</span>";
	}else{
		echo "<style text/css>
		#age{border-color:E1E1E1}
		</style>";
		$errorMessage15 = "";
	}
	
	if(empty($_POST['rank'])){
		echo "<style text/css>
		#rank{border-color:#F00;}
		</style>";
		$errorMessage6 = "<span class='label label-danger'>Select Rank</span>";
	}else{
		
		echo "<style text/css>
		#rank{border-color:E1E1E1}</style>";
		$errorMessage6 = "";
	}
	
	if(empty($_POST['gender'])){
		echo "<style text/css>
		#rgender{border-color:#F00;}
		</style>";
		$errorMessage7 = "<span class='label label-danger'>Select Gender</span>";
	}else{
		
		echo "<style text/css>
		#gender{border-color:E1E1E1}</style>";
		$errorMessage7 = "";
	}
	
	if(empty($_POST['civil_status'])){
		echo "<style text/css>
		#civil_status{border-color:#F00;}
		</style>";
		$errorMessage8 = "<span class='label label-danger'>Select Civil Status</span>";
	}else{
		
		echo "<style text/css>
		#civil_status{border-color:E1E1E1}</style>";
		$errorMessage8 = "";
	}
	
	if(empty($_POST['contact_no'])){
		echo "<style text/css>
		#contact_no{border-color:#F00;}
		</style>";
		$errorMessage9 = "<span class='label label-danger'>Input Contact Number</span>";
	}else{
		
		echo "<style text/css>
		#contact_no{border-color:E1E1E1}</style>";
		$errorMessage9 = "";
	}
	
	if(empty($_POST['datehired'])){
		echo "<style text/css>
		#datehired{border-color:#F00;}
		</style>";
	}else{
		
		echo "<style text/css>
		#datehired{border-color:E1E1E1}</style>";
	}
	
	//address
	if(empty($_POST['no_street'])){
		echo "<style text/css>
		#no_street{border-color:#F00;}
		</style>";
		$errorMessage10 = "<span class='label label-danger'>Input Number/Street</span>";
		
		}else{
		
		echo "<style text/css>
		#no_street{border-color:E1E1E1}
		</style>";
		$errorMessage10 = "";
	}
	
	if(empty($_POST['barangay'])){
		echo "<style text/css>
		#barangay{border-color:#F00;}
		</style>";
		$errorMessage11 = "<span class='label label-danger'>Input Barangay</span>";
	}elseif((!preg_match("/^[a-zA-Z ]*$/",$_POST['barangay']))){
		echo "<style text/css>
		#barangay{border-color:#F00;}
		</style>";
		$errorMessage11 ="<span class='label label-warning'>Letters only</span>";
		
	}else{
	
		echo "<style text/css>
		#barangay{border-color:E1E1E1}
		</style>";
		$errorMessage11 = "";
	}
	
	if(empty($_POST['town'])){
		echo "<style text/css>
		#town{border-color:#F00;}
		</style>";
		$errorMessage12 = "<span class='label label-danger'>Input Town</span>";
	}elseif((!preg_match("/^[a-zA-Z ]*$/",$_POST['town']))){
		echo "<style text/css>
		#town{border-color:#F00;}
		</style>";
		$errorMessage12 ="<span class='label label-warning'>Letters only</span>";
	}else{
		
		echo "<style text/css>
		#town{border-color:E1E1E1}
		</style>";
		$errorMessage12 = "";
	}
	
	if(empty($_POST['province'])){
		echo "<style text/css>
		#province{border-color:#F00;}
		</style>";
		$errorMessage13 = "<span class='label label-danger'>Input Province</span>";
	}elseif((!preg_match("/^[a-zA-Z ]*$/",$_POST['province']))){
		echo "<style text/css>
		#province{border-color:#F00;}
		</style>";
		$errorMessage13 ="<span class='label label-warning'>Letters only</span>";
	}else{
		echo "<style text/css>
		#province{border-color:E1E1E1}
		.val{color:#F00;}
		</style>";
		$errorMessage13 ="";
	}
	
	if(empty($_POST['chooseposition'])){
		echo "<style text/css>
		#chooseposition{border-color:#F00;}
		</style>";
		$errorMessage14 = "<span class='label label-danger'>Choose Position</span>";
		
	}else{
	
		echo "<style text/css>
		#chooseposition{border-color:E1E1E1}
		</style>";
		$errorMessage14="";
	}
	
			$password = $_POST['temppass'];
			
			
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $position;?> Untitled Document</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>

	.dropdown-submenu {
    position: relative;
}

.dropdown-submenu .dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -1px;
}
  </style>
  
<script type="text/javascript">
//<Code for Multi-Level Dropdown>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
//</Code for Multi-Level Dropdown>

function getAge(){
	var dob = document.getElementById('bdate').value;
	dob = new Date(dob);
	var today = new Date();
	var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
	document.getElementById('age').value=age;
}
</script>


</head>
<body>
<header>

<?php include 'header.php';?>

<div class="row">
    	<nav class="navbar navbar-inverse">
  			<div class="container-fluid">
    			<div class="navbar-header">
      				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
       				<span class="icon-bar"></span>
        			<span class="icon-bar"></span>
        			<span class="icon-bar"></span>
     				</button>
                    </ul>
      						<ul class="nav navbar-nav navbar-right">
                            <li><a href="view_staff_acc.php"><span class="glyphicon glyphicon-user"></span>My Account &nbsp; &nbsp; &nbsp;</a>						 							</li>
      						</ul>
    			</div>

						   <div class="collapse navbar-collapse" id="myNavbar">
     				 	   <ul class="nav navbar-nav">
                     	   <li class=""><a href="bfp.php">Home</a></li>
                           <li class="dropdown">
                           <a class="dropdown-toggle" data-toggle="dropdown" href="viewnews.php">News &amp; Events
       					   <span class="caret"></span></a>
                                            		    <ul class="dropdown-menu">
                                                    	<li class="dropdown-header"></li>
         												<li class=""><a href="viewnews.php">News</a></li>
          												<li class=""><a href="viewevents.php">Events</a>																										                                                        <li>
                                                        </li>
                                                        </li>
                                                        </ul>
        							<li><a href="as.php">About Us</a></li>
                                    <li><a href="map.php">Map</a></li>
                                    
                                    <li class="dropdown">            
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="adminmenu.php" class="active">Admin Menu
       								<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                    <li class="dropdown-header"></li>
                                    <li class="dropdown-submenu">
        											<a class="test" tabindex="-1" href="#">Report
                                                    <span class=" caret"></span></a>
        											<ul class="dropdown-menu">
          											<li><a tabindex="-1" href="report.php">Add Report</a></li>
                                                    <li><a tabindex="-1" href="addoccupancy.php">Add Occupancy</a></li>	
                                                    <li><a tabindex="-1" href="addorigin.php">Add Cause/Origin</a></li>
          											<li><a tabindex="-1" href="viewreports.php">View Report</a></li>
                                                    <li><a tabindex="-1" href="user_rep_list.php">View Mobile Report</a></li>
        											</ul>
                                                    </li>
     
                <li class="dropdown-submenu <?php echo $disable; ?>">
      			<a class="test" tabindex="-1" href="#">Firefighter
                <span class=" caret"></span></a>
   				<ul class="dropdown-menu">
          	 	<li class="<?php echo $disable; ?>"><a tabindex="-1" href="<?php echo $link_add_firefighter ?>">Add Firefighter</a></li>
          		<li class="<?php echo $disable; ?>"><a tabindex="-1" href="<?php echo $link_view_firefighter ?>">View firefighter</a></li>
        		</ul>
                </li>
                                                        
                                                        
                                                        <li class=""><a href="news.php">Add News</a>
                                                        <li class=""><a href="events.php">Add Events</a>
                                 						<li class=""><a href="log_reports.php">Log Reports</a>	
                                                        																							                                                        <li>
                                   					</ul>
                                                    
                                                    </ul>
      						<ul class="nav navbar-nav navbar-right">
        					<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> LogOut</a></li>
      						</ul>

                            </div>
</div>


</header>

<div class="row">
    	
        	<div class="col-sm-2">
        	</div>
        
    		<div class="col-sm-8">
        				
                <div class="row">
    					<div class="col-sm-12">
        					<h4 align="center">Staff Information</h4>
                        </div>
			  	</div>
                        
                        
 				<form class="form-horizontal" method="post" enctype="multipart/form-data">
                
                <div class="form-group">
      					<label for="lastname" class="col-sm-3 control-label">Choose Photo:</label>
      						<div class="col-sm-9">
      							<input type="file" class="form-control" id="fm_id" name="file_img" accept="image/*">
                                
                            	<div class="help-block with-errors"><?php echo $errorMessage1;?></div>
                        	</div>
   					</div>
                
    				<div class="form-group">
      					<label for="id" class="col-sm-3 control-label">Staff ID:</label> 
                        	<div class="col-sm-9">
      					<input type="text" readonly class="form-control" id="staff_id" name="staff_id" aria-describedby="sizing-addon3" value="<?php echo $_POST['staff_id'] = date("Y")."-".mt_rand(000,999)."-".mt_rand(000,999); ?>">
                        	</div>
                            
    				</div>
                    
    				<div class="form-group">
      					<label for="lastname" class="col-sm-3 control-label">Name:</label>
      						<div class="col-sm-3">
      							<input type="text" class="form-control col-sm-3" id="lname" name="lname" aria-describedby="sizing-addon3"  placeholder="Last Name" value="<?php echo isset($_POST['lname']) ? htmlspecialchars($_POST['lname']) : ''; ?>">
                          
    							<div class="help-block with-errors"><?php echo $errorMessage2;?></div>
                        	</div>
                            
                            <div class="col-sm-3">
      							<input type="text" class="form-control col-sm-3" id="fname" name="fname" aria-describedby="sizing-addon3"   placeholder="First Name" value="<?php echo isset($_POST['fname']) ? htmlspecialchars($_POST['fname']) : ''; ?>">
                                
                                 <div class="help-block with-errors"><?php echo $errorMessage3;?></div>
                        	</div>
                            	
                            <div class="col-sm-3">
      							<input type="text" class="form-control col-sm-3" id="mname" name="mname" aria-describedby="sizing-addon3"  placeholder="Middle Name" value="<?php echo isset($_POST['mname']) ? htmlspecialchars($_POST['mname']) : ''; ?>">
                                
                                 <div class="help-block with-errors"><?php echo $errorMessage4;?></div>
                        	</div>
   					</div>
                    
                    <div class="form-group">
      					<label for="lastname" class="col-sm-3 control-label" >Birth Date:</label>
      						<div class="col-sm-9">
      							<input type="text" class="form-control" id="bdate" name="bdate" aria-describedby="sizing-addon3" onKeyUp="getAge()" placeholder="yyyy/mm/dd" value="<?php echo isset($_POST['bdate']) ? htmlspecialchars($_POST['bdate']) : ''; ?>">
                                
                            	<div class="help-block with-errors"><?php echo $errorMessage5;?></div>
                        	</div>
   					</div>
                    
                    
                    
                    <div class="form-group">
      					<label for="lastname" class="col-sm-3 control-label">Age:</label>
      						<div class="col-sm-9">
      							<input type="text" class="form-control" id="age" name="age" aria-describedby="sizing-addon3" placeholder="" value="<?php echo isset($_POST['age']) ? htmlspecialchars($_POST['age']) : ''; ?>">
                                
                            	<div class="help-block with-errors"><?php echo $errorMessage15;?></div>
                        	</div>
   					</div>
                    
                    
                      
      					<div class="form-group">
<label for="lastname" class="col-sm-3 control-label">Rank</label>
      						<div class="col-sm-9"> 
	<select name="rank" id="rank" class="form-control">
	<option value="">--Choose--</option>
      <option value="Fire Officer 1">Fire Officer 1</option>
	<option value="Fire Officer 2">Fire Officer 2</option>
    <option value="Fire Officer 3">Fire Officer 3</option>
    <option value="Senior Fire Officer 1">Senior Fire Officer 1</option>
    <option value="Senior Fire Officer 2">Senior Fire Officer 2</option>
    <option value="Senior Fire Officer 3">Senior Fire Officer 3</option>
    <option value="Senior Fire Officer 4">Senior Fire Officer 4</option>
    <option value="Inspector">Inspector</option>
    <option value="Firemarshall">Firemarshall</option> 
                                <?php echo isset($_POST['rank']) ? htmlspecialchars($_POST['rank']) : ''; ?> 
    </select></p>
    <div class="help-block with-errors"><?php echo $errorMessage6;?></div>
                        	</div>
   					 </div>
                    
                    
<div class="form-group">
<label for="lastname" class="col-sm-3 control-label">Gender</label>
      						<div class="col-sm-9">
 <input type="radio" name="gender" value="Male" checked /><span>Male</span>
						<input type="radio" name="gender" value="Female" /><span>Female</span></p>
                        <div class="help-block with-errors"><?php echo $errorMessage7;?></div>
                        	</div>
   					 </div>
                        
                 <div class="form-group">
<label for="lastname" class="col-sm-3 control-label">Civil Status</label>
      						<div class="col-sm-9"> 
	<select name="civil_status" id="civil_status" class="form-control">
	<option value="">--Choose--</option>
      <option value="Single">Single</option>
	<option value="Married">Married</option>
    <option value="Widow">Widow</option>
    <option value="Separated">Separated</option>
    
    <?php echo isset($_POST['civil_status']) ? htmlspecialchars($_POST['civil_status']) : ''; ?> 
    </select></p>
    <div class="help-block with-errors"><?php echo $errorMessage8;?></div>
                        	</div>
   					 </div>  
                     
     <div class="form-group">
<label for="lastname" class="col-sm-3 control-label">Contact Number</label>
      						<div class="col-sm-9">
      							<input type="number" class="form-control" id="contact_no" name="contact_no" value="<?php echo isset($_POST['contact_no']) ? htmlspecialchars($_POST['contact_no']) : ''; ?>">
                                <div class="help-block with-errors"><?php echo $errorMessage9;?></div>
                        	</div>
   					 </div>                           
                    
                    <div class="form-group">
      					<label for="lastname" class="col-sm-3 control-label">Date Hired:</label>
      						<div class="col-sm-9">
      							<input type="date" readonly class="form-control" id="datehired" name="datehired" aria-describedby="sizing-addon3" value="<?php echo date('Y-m-d'); ?>">
                            	<div class="help-block with-errors"></div>
                        	</div>
   					</div>
                    
                    <div class="form-group">
      					<label for="Address" class="col-sm-3 control-label">Address:</label>
      						<div class="col-sm-2">
      							<input type="text" class="form-control col-sm-3" id="no_street" name="no_street" aria-describedby="sizing-addon3" placeholder="No. Street" value="<?php echo isset($_POST['no_street']) ? htmlspecialchars($_POST['no_street']) : ''; ?>">
                                
                                 <div class="help-block with-errors"><?php echo $errorMessage10;?></div>
                        	</div>
                            
                            <div class="col-sm-2">
      							<input type="text" class="form-control col-sm-3" id="barangay" name="barangay" aria-describedby="sizing-addon3" placeholder="Barangay" value="<?php echo isset($_POST['barangay']) ? htmlspecialchars($_POST['barangay']) : ''; ?>">
                                
                                 <div class="help-block with-errors"><?php echo $errorMessage11;?></div>
                        	</div>
                            
                            <div class="col-sm-2">
      							<input type="text" class="form-control col-sm-3" id="town" name="town" aria-describedby="sizing-addon3" placeholder="Town/City" value="<?php echo isset($_POST['town']) ? htmlspecialchars($_POST['town']) : ''; ?>">
                                
                                 <div class="help-block with-errors"><?php echo $errorMessage12;?></div>
                        	</div>
                            
                            <div class="col-sm-2">
      							<input type="text" class="form-control col-sm-3" id="province" name="province"aria-describedby="sizing-addon3" placeholder="Province" value="<?php echo isset($_POST['province']) ? htmlspecialchars($_POST['province']) : ''; ?>">
                                
                                 <div class="help-block with-errors"><?php echo $errorMessage13;?></div>
                        	</div>
   					</div>
                    
                    <div class="row">
    						<div class="col-sm-12">
        					<h4 align="center">Account Information</h4>
                            </div>
        			</div>
                    
                     <div class="form-group">
      					<label for="position" class="col-sm-3 control-label">Position:</label>
      						<div class="col-sm-9">
                                <select name="chooseposition" class="form-control" aria-describedby="sizing-addon3" id="position" value="<?php echo isset($_POST['position']) ? htmlspecialchars($_POST['position']) : ''; ?>">
                                
									<option value="Staff" <?php echo (isset($_POST['position'])) && ($_POST['position'] == 'Staff')?'selected="selected"':''; ?>>Staff</option>
                                </select>
                                 <div class="help-block with-errors"><?php echo $errorMessage14;?></div>
                        	</div>
   					</div>
                    
                    <div class="form-group">
      					<label for="username" class="col-sm-3 control-label">User Name:</label>
      						<div class="col-sm-9">
      							<input type="text" readonly class="form-control" id="username" name="username" aria-describedby="sizing-addon3" value="username<?php echo $_POST['username'] =mt_rand(0000,9999);?>">
                                
                        	</div>
   					</div>
                    
                    <div class="form-group">
      					<label for="username" class="col-sm-3 control-label">Password:</label>
      						<div class="col-sm-9">
      							<input type="text" readonly class="form-control" id="temppass" name="temppass" input pattern=".{6,13}"  title="6 to 13 characters" value="<?php echo $_POST['temppass'] = "password".$_POST['username'];?>">
                                 <div class="help-block with-errors"></div>
                        	</div>
   					</div>
                    
                    <div class="form-group">
                    <label for="" class="col-sm-3 control-label">&nbsp;</label>
                    	<div class="col-sm-9">
                    	<input type="submit" name="submit" class="btn btn-default col-sm-3" value="Submit" >
                        </div>
                    </div>
    					
  				</form>
        
        </div>
    
    	<div class="col-sm-2">
        </div>
  </div>
</div> 


<div class="row">
</div>
<div class="container">
<footer>
		<div class="row" style="background:#999">
        <div class="col-sm-12">
		<p class="foot" style="text-align:center">Baguio City Fire Station&copy;</p>
         <p class="foot" style="text-align:center">2020</p> 
         <p class="foot" style="text-align:center">All Rights Reserved&reg;</p>
		</div>
        </div>
</footer>
</div>
</body>
</html>
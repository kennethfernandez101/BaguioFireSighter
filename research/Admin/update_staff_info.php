<?php
session_start();
$staff_id = $_SESSION['staff_id'];
$staff_lname = $_SESSION['lname'];
$staff_fname = $_SESSION['fname'];
$staff_mname = $_SESSION['mname'];
$position = $_SESSION['position'];
$con = mysqli_connect("localhost","root","","firerecords") or die("Error " . mysqli_error($link));
//User Control for Staff and Admin
	$disable = "";
	$link_add_firefighter= "";
	$link_view_firefighter= "";
if ($position == "Staff"){
	$disable = "disabled";
	$link_add_firefighter= "#";
	$link_view_firefighter= "#";
	}elseif ($position == "Admin"){
	$disable = "";
	$link_add_firefighter = "add_staff.php";
	$link_view_firefighter= "list_of_staff.php";
	}

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
?>

<?php 

if(isset($_GET['id'])){
$id=$_GET['id'];
}

function validation(){
	if(empty($_POST['staff_id'])){
		echo "<style text/css>
		#staff_id{border-color:#F00;}</style>";
	}else{
	
		echo "<style text/css>
		#staff_id{border-color:E1E1E1}</style>";
	}
	
	if(empty($_POST['lname'])){
		echo "<style text/css>
		#lname{border-color:#F00;}
		</style>";
		$errorMessage1 = "<span class=' label label-danger'>Input Last Name</span>";
		
	}elseif((!preg_match("/^[a-zA-Z ]*$/",$_POST['lname']))){
		echo "<style text/css>
		#lname{border-color:#F00;}
		</style>";
		$errorMessage1 ="<span class=' label label-warning'>Letters only</span>";
	}else{
	
		echo "<style text/css>
		#lname{border-color:E1E1E1}</style>";
		$errorMessage1="";
	}
	
	if(empty($_POST['fname'])){
		echo "<style text/css>
		#fname{border-color:#F00;}
		</style>";
		$errorMessage2 = "<span class='label label-danger'>Input Last Name</span>";
		
	}elseif((!preg_match("/^[a-zA-Z ]*$/",$_POST['fname']))){
		echo "<style text/css>
		#fname{border-color:#F00;}
		</style>";
		$errorMessage2 ="<span class='label label-warning'>Letters only</span>";
	}else{
	
		echo "<style text/css>
		#fname{border-color:E1E1E1}
		</style>";	
		$errorMessage2="";
	}
	
	if(empty($_POST['mname'])){
		echo "<style text/css>
		#mname{border-color:#F00;}
		</style>";
		$errorMessage3 = "<span class='label label-danger'>Input Middle Name</span>";
		
	}elseif((!preg_match("/^[a-zA-Z ]*$/",$_POST['mname']))){
		echo "<style text/css>
		#mname{border-color:#F00;}
		</style>";
		$errorMessage3 ="<span class='label label-warning'>Letters only</span>";
	}else{
		
		echo "<style text/css>
		#mname{border-color:E1E1E1}
		</style>";	
		$errorMessage3="";
	}
	
	if(empty($_POST['bdate'])){
		echo "<style text/css>
		#bdate{border-color:#F00;}
		</style>";
		$errorMessage4 = "<span class='label label-danger'>Input Birth Date</span>";
	}else{
		echo "<style text/css>
		#bdate{border-color:E1E1E1}
		</style>";
		$errorMessage4 = "";
	}
	if(empty($_POST['civil_status'])){
		echo "<style text/css>
		#civil_status{border-color:#F00;}</style>";
		$errorMessage13 ="<span class='label label-danger'>Input Civil Status</span>";
	}else{
	
		echo "<style text/css>
		#civil_status{border-color:E1E1E1}</style>";
		$errorMessage13 ="";
	}
	
	if(empty($_POST['datehired'])){
		echo "<style text/css>
		#datehired{border-color:#F00;}
		</style>";
	}else{
		
		echo "<style text/css>
		#datehired{border-color:E1E1E1}</style>";
	}
	
	if(empty($_POST['no_street'])){
		echo "<style text/css>
		#no_street{border-color:#F00;}
		</style>";
		$errorMessage5 = "<span class='label label-danger'>Input Number/Street</span>";
		
		}else{
		
		echo "<style text/css>
		#no_street{border-color:E1E1E1}
		</style>";
		$errorMessage5 = "";
		}
	
	if(empty($_POST['barangay'])){
		echo "<style text/css>
		#barangay{border-color:#F00;}
		</style>";
		$errorMessage6 = "<span class='label label-danger'>Input Barangay</span>";
	}elseif((!preg_match("/^[a-zA-Z ]*$/",$_POST['barangay']))){
		echo "<style text/css>
		#barangay{border-color:#F00;}
		</style>";
		$errorMessage6 ="<span class='label label-warning'>Letters only</span>";
		
	}else{
	
		echo "<style text/css>
		#barangay{border-color:E1E1E1}
		</style>";
		$errorMessage6 = "";
	}
	
	if(empty($_POST['town'])){
		echo "<style text/css>
		#town{border-color:#F00;}
		</style>";
		$errorMessage7 = "<span class='label label-danger'>Input Town</span>";
	}elseif((!preg_match("/^[a-zA-Z ]*$/",$_POST['town']))){
		echo "<style text/css>
		#town{border-color:#F00;}
		</style>";
		$errorMessage7 ="<span class='label label-warning'>Letters only</span>";
	}else{
		
		echo "<style text/css>
		#town{border-color:E1E1E1}
		</style>";
		$errorMessage7 = "";
	}
	
	if(empty($_POST['province'])){
		echo "<style text/css>
		#province{border-color:#F00;}
		</style>";
		$errorMessage8 = "<span class='label label-danger'>Input Province</span>";
	}elseif((!preg_match("/^[a-zA-Z ]*$/",$_POST['province']))){
		echo "<style text/css>
		#province{border-color:#F00;}
		</style>";
		$errorMessage8 ="<span class='label label-warning'>Letters only</span>";
	}else{
		echo "<style text/css>
		#province{border-color:E1E1E1}
		.val{color:#F00;}
		</style>";
		$errorMessage8 ="";
	}
	
	if(empty($_POST['position'])){
		echo "<style text/css>
		#position{border-color:#F00;}
		</style>";
		$errorMessage9 = "<span class='label label-danger'>Choose Position</span>";
		
	}else{
	
		echo "<style text/css>
		#position{border-color:E1E1E1}
		</style>";
		$errorMessage9="";
	}
	
	if(empty($_POST['username'])){
		echo "<style text/css>
		#username{border-color:#F00;}
		</style>";
		$errorMessage10 = "<span class='label label-danger'>Input Username</span>";
		
		}elseif((!preg_match("/^[a-zA-Z0-9]*$/",$_POST['username']))){
		echo "<style text/css>
		#username{border-color:#F00;}
		</style>";
		$errorMessage10 ="<span class='label label-warning'>Letters only</span>";
		
	}else{
	
		echo "<style text/css>
		#username{border-color:E1E1E1}
		</style>";
		$errorMessage10="";
	}		
}
if(isset($_POST['submit'])) {

	if(empty($_POST['staff_id'])){
		echo "<style text/css>
		#staff_id{border-color:#F00;}</style>";
	}else{
	
		echo "<style text/css>
		#staff_id{border-color:E1E1E1}</style>";
	}
	
	if(empty($_POST['lname'])){
		echo "<style text/css>
		#lname{border-color:#F00;}
		</style>";
		$errorMessage1 = "<span class=' label label-danger'>Input Last Name</span>";
		
	}elseif((!preg_match("/^[a-zA-Z ]*$/",$_POST['lname']))){
		echo "<style text/css>
		#lname{border-color:#F00;}
		</style>";
		$errorMessage1 ="<span class=' label label-warning'>Letters only</span>";
	}else{
	
		echo "<style text/css>
		#lname{border-color:E1E1E1}</style>";
		$errorMessage1="";
	}
	
	if(empty($_POST['fname'])){
		echo "<style text/css>
		#fname{border-color:#F00;}
		</style>";
		$errorMessage2 = "<span class='label label-danger'>Input Last Name</span>";
		
	}elseif((!preg_match("/^[a-zA-Z ]*$/",$_POST['fname']))){
		echo "<style text/css>
		#fname{border-color:#F00;}
		</style>";
		$errorMessage2 ="<span class='label label-warning'>Letters only</span>";
	}else{
	
		echo "<style text/css>
		#fname{border-color:E1E1E1}
		</style>";	
		$errorMessage2="";
	}
	
	if(empty($_POST['mname'])){
		echo "<style text/css>
		#mname{border-color:#F00;}
		</style>";
		$errorMessage3 = "<span class='label label-danger'>Input Middle Name</span>";
		
	}elseif((!preg_match("/^[a-zA-Z ]*$/",$_POST['mname']))){
		echo "<style text/css>
		#mname{border-color:#F00;}
		</style>";
		$errorMessage3 ="<span class='label label-warning'>Letters only</span>";
	}else{
		
		echo "<style text/css>
		#mname{border-color:E1E1E1}
		</style>";	
		$errorMessage3="";
	}
	
	if(empty($_POST['civil_status'])){
		echo "<style text/css>
		#civil_status{border-color:#F00;}</style>";
		$errorMessage13 ="<span class='label label-danger'>Input Civil Status</span>";
	}else{
	
		echo "<style text/css>
		#civil_status{border-color:E1E1E1}</style>";
		$errorMessage13 ="";
	}
	
	if(empty($_POST['bdate'])){
		echo "<style text/css>
		#bdate{border-color:#F00;}
		</style>";
		$errorMessage4 = "<span class='label label-danger'>Input Birth Date</span>";
	}else{
		echo "<style text/css>
		#bdate{border-color:E1E1E1}
		</style>";
		$errorMessage4 = "";
	}
	
	if(empty($_POST['datehired'])){
		echo "<style text/css>
		#datehired{border-color:#F00;}
		</style>";
	}else{
		
		echo "<style text/css>
		#datehired{border-color:E1E1E1}</style>";
	}
	
	if(empty($_POST['no_street'])){
		echo "<style text/css>
		#no_street{border-color:#F00;}
		</style>";
		$errorMessage5 = "<span class='label label-danger'>Input Number/Street</span>";
		
		}else{
		
		echo "<style text/css>
		#no_street{border-color:E1E1E1}
		</style>";
		$errorMessage5 = "";
		}
	
	if(empty($_POST['barangay'])){
		echo "<style text/css>
		#barangay{border-color:#F00;}
		</style>";
		$errorMessage6 = "<span class='label label-danger'>Input Barangay</span>";
	}elseif((!preg_match("/^[a-zA-Z ]*$/",$_POST['barangay']))){
		echo "<style text/css>
		#barangay{border-color:#F00;}
		</style>";
		$errorMessage6 ="<span class='label label-warning'>Letters only</span>";
		
	}else{
	
		echo "<style text/css>
		#barangay{border-color:E1E1E1}
		</style>";
		$errorMessage6 = "";
	}
	
	if(empty($_POST['town'])){
		echo "<style text/css>
		#town{border-color:#F00;}
		</style>";
		$errorMessage7 = "<span class='label label-danger'>Input Town</span>";
	}elseif((!preg_match("/^[a-zA-Z ]*$/",$_POST['town']))){
		echo "<style text/css>
		#town{border-color:#F00;}
		</style>";
		$errorMessage7 ="<span class='label label-warning'>Letters only</span>";
	}else{
		
		echo "<style text/css>
		#town{border-color:E1E1E1}
		</style>";
		$errorMessage7 = "";
	}
	
	if(empty($_POST['province'])){
		echo "<style text/css>
		#province{border-color:#F00;}
		</style>";
		$errorMessage8 = "<span class='label label-danger'>Input Province</span>";
	}elseif((!preg_match("/^[a-zA-Z ]*$/",$_POST['province']))){
		echo "<style text/css>
		#province{border-color:#F00;}
		</style>";
		$errorMessage8 ="<span class='label label-warning'>Letters only</span>";
	}else{
		echo "<style text/css>
		#province{border-color:E1E1E1}
		.val{color:#F00;}
		</style>";
		$errorMessage8 ="";
	}
	
	if(empty($_POST['position'])){
		echo "<style text/css>
		#position{border-color:#F00;}
		</style>";
		$errorMessage9 = "<span class='label label-danger'>Choose Position</span>";
		
	}else{
	
		echo "<style text/css>
		#position{border-color:E1E1E1}
		</style>";
		$errorMessage9="";
	}
	
	if(empty($_POST['username'])){
		echo "<style text/css>
		#username{border-color:#F00;}
		</style>";
		$errorMessage10 = "<span class='label label-danger'>Input Username</span>";
		
		}elseif((!preg_match("/^[a-zA-Z0-9]*$/",$_POST['username']))){
		echo "<style text/css>
		#username{border-color:#F00;}
		</style>";
		$errorMessage10 ="<span class='label label-warning'>Letters only</span>";
		
	}else{
	
		echo "<style text/css>
		#username{border-color:E1E1E1}
		</style>";
		$errorMessage10="";
	}			
	

			// checking if all  fields are filled up.. if true
				if ((!empty($_POST['lname']))&&(preg_match("/^[a-zA-Z ]*$/",$_POST['lname']))&&(!empty($_POST['fname']))&&(preg_match("/^[a-zA-Z ]*$/",$_POST['fname']))&&(!empty($_POST['civil_status']))&&(!empty($_POST['mname']))&&(preg_match("/^[a-zA-Z ]*$/",$_POST['mname']))&&(!empty($_POST['no_street']))&&(!empty($_POST['barangay']))&&(!empty($_POST['town']))&&(!empty($_POST['province']))){
		
		
					$lname = $_POST['lname'];
					$fname = $_POST['fname'];
					$mname = $_POST['mname'];
					$bdate = $_POST['bdate'];
					$rank =$_POST['rank'];
					$gender =$_POST['gender'];
					$civil_status =$_POST['civil_status'];
					$contact_no =$_POST['contact_no'];
					$no_street = $_POST['no_street'];
					$brgy = $_POST['barangay'];
					$town = $_POST['town'];
					$prov = $_POST['province'];
	

	
	mysqli_query($con,"UPDATE admintbl SET lname='$lname', fname='$fname', mname='$mname', bdate='$bdate',rank='$rank',gender='$gender',civil_status='$civil_status',contact_no='$contact_no', no_street='$no_street', barangay='$brgy', town='$town', province='$prov' WHERE staff_id='$id'");

							//getting the data of staff/Admin for documenting Log-Reports
			$staff_name = $staff_fname." ".$staff_lname;			
			$activity = "".$staff_name." Updated about his/her Information";
			//Input a Log Event			
			$log_event ="INSERT into log_event (date, time, id, name, position, activity) VALUES (CURDATE(), CURTIME(), '$staff_id', '$staff_name', '$position', '$activity')";		
			if (!mysqli_query($con,$log_event)){
				echo "Error Query insert_log_event";
				}else{
				}
	
?>
<script>
			//Display an alert box notifying the User that the insertion of data is successful
			window.alert("Successfully Updated.");
			
			window.location.href="view_staff_acc.php";
						</script>
				<? 

			}else{
				validation();
			}

		
}
$sql1= mysqli_query($con,"SELECT * from admintbl where staff_id ='$id'");
$sql2=mysqli_fetch_array($sql1);
mysqli_close($con);	

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
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 70%;
      margin: auto;
  }

/* style for sub menu*/  
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
         												<li><a href="viewnews.php">News</a></li>
          												<li class=""><a href="viewevents.php">Events</a>																										                                                        <li>
                                                        </li>
                                                        </li>
                                                        </ul>
                                                        
        							<li><a href="as.php">About Us</a></li>
                                
                                      <li class="dropdown">
                           <a class="dropdown-toggle" data-toggle="dropdown" href="">Maps
       					   <span class="caret"></span></a>
                                            		    <ul class="dropdown-menu">
                                                    	<li class="dropdown-header"></li>
         												<li class="active"><a href="map.php">Map</a></li>
          												<li class=""><a href="reportmap.php">Report Map</a>																										                                                        <li>
                                                        </li>
                                                        </li>
                                                        </ul>
                                    
                                    
                                    
                                    
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
                                 						<li class=""><a href="log_reports.php">Log Report</a>																								                                                        <li>
                                   					</ul>
                                                    
                                                    </ul>
      						<ul class="nav navbar-nav navbar-right">
        					<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> LogOut</a></li>
      						</ul>

                            </div>

</header>

 <!--update info-->
        
        <div class="row">
    	
        	<div class="col-sm-2">
        	</div>
        
    		<div class="col-sm-8">
        				
                <div class="row">
    					<div class="col-sm-12">
        					<h4 align="center">Staff Information</h4>
                        </div>
			  	</div>
                        
                        
 				<form class="form-horizontal" method="post">
                
    				<div class="form-group">
      					<label for="lastname" class="col-sm-3 control-label">Name:</label>
      						<div class="col-sm-3">
      							<input type="text" class="form-control col-sm-3" id="lname" name="lname" placeholder="Last Name" value="<?php echo $sql2['lname'] ?>">
                                
    							<div class="help-block with-errors"><?php echo $errorMessage1;?></div>
                        	</div>
                            
                            <div class="col-sm-3">
      							<input type="text" class="form-control col-sm-3" id="fname" name="fname"  placeholder="First Name" value="<?php echo $sql2['fname'] ?>">
                                
                                 <div class="help-block with-errors"><?php echo $errorMessage2;?></div>
                        	</div>
                            	
                            <div class="col-sm-3">
      							<input type="text" class="form-control col-sm-3" id="mname" name="mname" placeholder="Middle Name" value="<?php echo $sql2['mname'] ?>">
                                
                                 <div class="help-block with-errors"><?php echo $errorMessage3;?></div>
                        	</div>
   					</div>
                    
                    <div class="form-group">
      					<label for="lastname" class="col-sm-3 control-label">Birth Date:</label>
      						<div class="col-sm-9">
      							<input type="date" class="form-control" id="bdate" name="bdate"  placeholder="" value="<?php echo $sql2['bdate'] ?>">
                                
                            	<div class="help-block with-errors"><?php echo $errorMessage4;?></div>
                        	</div>
   					</div>
                    
                    
                    
                                         
      					<div class="form-group">
<label for="lastname" class="col-sm-3 control-label">Rank</label>
      						<div class="col-sm-9"> 
                            <input type="text" name="rank" class="form-control" readonly value="<?php echo $sql2['rank'] ?> ">
    <div class="help-block with-errors"><?php echo $errorMessage11;?></div>
                        	</div>
   					 </div>
                    
                    
<div class="form-group">
<label for="lastname" class="col-sm-3 control-label">Gender</label>
      						<div class="col-sm-9">
 <input type="radio" name="gender" value="Male" checked /><span>Male</span>
						<input type="radio" name="gender" value="Female" /><span>Female</span></p>
                        <?php echo $sql2['gender'] ?>
                        <div class="help-block with-errors"><?php echo $errorMessage12;?></div>
                        	</div>
   					 </div>
                        
                 <div class="form-group">
<label for="lastname" class="col-sm-3 control-label">Civil Status</label>
      						<div class="col-sm-9"> 
	<select name="civil_status" id="civil_status" class="form-control">
	<option value="">--Choose--</option>
      <option value="Single">Single</option>
	<option value="Married">Married</option>
    <option value="widow">Widow</option>
    <option value="Separated">Separated</option>
   <?php echo $sql2['civil_status'] ?>
    </select></p>
    <div class="help-block with-errors"><?php echo $errorMessage13;?></div>
                        	</div>
   					 </div>  
                     
     <div class="form-group">
<label for="lastname" class="col-sm-3 control-label">Contact Number</label>
      						<div class="col-sm-9">
      							<input type="number" class="form-control" id="contact_no" name="contact_no" value="<?php echo $sql2['contact_no'] ?>">
                                <div class="help-block with-errors"><?php echo $errorMessage14;?></div>
                        	</div>
   					 </div>                           
                    
                    
                    
                    
                    
                    
                    <div class="form-group">
      					<label for="lastname" class="col-sm-3 control-label">Date Hired:</label>
      						<div class="col-sm-9">
      							<input type="date" readonly class="form-control" id="datehired" name="datehired" value="<?php echo $sql2['datehired'] ?>">
                            	<div class="help-block with-errors"></div>
                        	</div>
   					</div>
                    
                    <div class="form-group">
      					<label for="Address" class="col-sm-3 control-label">Address:</label>
      						<div class="col-sm-2">
      							<input type="text" class="form-control col-sm-3" id="no_street" name="no_street" placeholder="No. Street" value="<?php echo $sql2['no_street']?>">
                                
                                 <div class="help-block with-errors"><?php echo $errorMessage5;?></div>
                        	</div>
                            
                            <div class="col-sm-2">
      							<input type="text" class="form-control col-sm-3" id="barangay" name="barangay" placeholder="Barangay" value="<?php echo $sql2['barangay'] ?>">
                                
                                 <div class="help-block with-errors"><?php echo $errorMessage6;?></div>
                        	</div>
                            
                            <div class="col-sm-2">
      							<input type="text" class="form-control col-sm-3" id="town" name="town" placeholder="Town/City" value="<?php echo $sql2['town'] ?>">
                                
                                 <div class="help-block with-errors"><?php echo $errorMessage7;?></div>
                        	</div>
                            
                            <div class="col-sm-2">
      							<input type="text" class="form-control col-sm-3" id="province" name="province" placeholder="Province" value="<?php echo $sql2['province']?>">
                                
                                 <div class="help-block with-errors"><?php echo $errorMessage8;?></div>
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
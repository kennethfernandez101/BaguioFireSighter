<?php
session_start();
$staff_id = $_SESSION['staff_id'];
$staff_lname = $_SESSION['lname'];
$staff_fname = $_SESSION['fname'];
$staff_mname = $_SESSION['mname'];

$position = $_SESSION['position'];

//User Control for Staff and Admin
	$disable = "";
	$link_add_staff = "";
	$link_add_firefighter= "";
	$link_view_firefighter= "";

if ($position == "Staff"){
	$disable = "disabled";
	$link_add_staff = "#";
	$link_add_firefighter= "#";
	$link_view_firefighter= "#";
	}elseif ($position == "Admin"){
	$disable = "";
	$link_add_staff = "add_staff.php";
	$link_add_firefighter = "firefighter.php";
	$link_view_firefighter= "viewfirefighter.php";
	}


$errorMessage2="";
$errorMessage3="";
$errorMessage4="";
$errorMessage5="";
$errorMessage6="";
$errorMessage7="";
$errorMessage8="";
$errorMessage9="";
$errorMessage10="";
$errorMessage11="";
?>

<?php

$con = mysqli_connect("localhost","root","","firerecords") or die("Error " . mysqli_error($link));

if(isset($_GET['id'])){
$id=$_GET['id'];
}
if (isset($_POST['submit'])){
	
	$filesize = $_FILES["fm_id"]["size"];
	
	if ($filesize === 0){
		echo "<style text/css>
		#photo{border-color:#F00;}
		</style>";
		$errorMessage2 = "<span class='label label-danger'>Input Photo</span>";
		
	}else{
		//Checking if the file is an Image
		$check = getimagesize($_FILES["fm_id"]["tmp_name"]);
		if($check !== false) {
			echo "" . $check["mime"] . ".";
			//Checking the filesize of image
   				if($filesize > 2000000){
				echo "<style text/css>
				#photo{border-color:#F00;}
				</style>";
				$errorMessage2 = "<span class='label label-danger'>Image size is too large</span>";
				}else{
				echo "<style text/css>
				#photo{border-color:E1E1E1;}
				</style>";
				$errorMessage2 = "";
				}
		}else{
    	echo "<style text/css>
		#photo{border-color:#F00;}
		</style>";
		$errorMessage2 = "<span class='label label-danger'>File is not Image</span>";
		}
	}
	
	if (empty($_POST['fn'])){
		echo "<style text/css>
		#fn_id{border-color:#F00;}</style>";	
	}else{
	$_SESSION['fn'] = $_POST['fn'];
		echo "<style text/css>
		#fn_id{border-color:transparent;}</style>";
	}
	 
	  if (empty($_POST['frstn'])){
		echo "<style text/css>
		#frstn_id{border-color:#F00;}</style>";
	}else{
	$_SESSION['frstn'] = $_POST['frstn'];
		echo "<style text/css>
		#frstn_id{border-color:transparent;}</style>";
	}
	
	 if ((empty($_POST['mn']))){
		echo "<style text/css>
		#mn_id{border-color:#F00;}</style>";
	}else{
	$_SESSION['mn'] = $_POST['mn'];
		echo "<style text/css>
		#mn_id{border-color:transparent;}</style>";
	}
	
	 if ((empty($_POST['pos']))){
		echo "<style text/css>
		#pos_id{border-color:#F00;}</style>";
	}else{
	$_SESSION['pos'] = $_POST['pos'];
		echo "<style text/css>
		#pos_id{border-color:transparent;}</style>";
	}
	
	if ((empty($_POST['bdate']))){
		echo "<style text/css>
		#bdate_id{border-color:#F00;}</style>";
	}else{
	$_SESSION['bdate'] = $_POST['bdate'];
		echo "<style text/css>
		#bdate_id{border-color:transparent;}</style>";
	}
	
	if ((empty($_POST['pob']))){
		echo "<style text/css>
		#pob_id{border-color:#F00;}</style>";
	}else{
	$_SESSION['pob'] = $_POST['pob'];
		echo "<style text/css>
		#pob_id{border-color:transparent;}</style>";
	}
	
	if ((empty($_POST['gender']))){
		echo "<style text/css>
		#gender_id{border-color:#F00;}</style>";
	}else{
	$_SESSION['gender'] = $_POST['gender'];
		echo "<style text/css>
		#gender_id{border-color:transparent;}</style>";
	}
	
	if ((empty($_POST['cs']))){
		echo "<style text/css>
		#cs_id{border-color:#F00;}</style>";
	}else{
	$_SESSION['cs'] = $_POST['cs'];
		echo "<style text/css>
		#cs_id{border-color:transparent;}</style>";
	}
	
	if ((empty($_POST['cn']))){
		echo "<style text/css>
		#cn_id{border-color:#F00;}</style>";
	}else{
	$_SESSION['cn'] = $_POST['cn'];
		echo "<style text/css>
		#cn_id{border-color:transparent;}</style>";
	}
	if ((!empty($_POST['fn']))&&(!empty($_POST['frstn']))&&(!empty($_POST['mn']))&&(!empty($_POST['pos']))&&(!empty($_POST['bdate']))&&(!empty($_POST['pob']))&&(!empty($_POST['gender']))&&(!empty($_POST['cs']))&&(!empty($_POST['cn'])) && ($filesize != 0)){
		
		
	$filetmp = $_FILES["fm_id"]["tmp_name"];
	$filename = $_FILES["fm_id"]["name"];
	$filetype = $_FILES["fm_id"]["type"];
	$filepath = "firemen/".$filename;
	move_uploaded_file($filetmp,$filepath);
	
			$sql3 = " UPDATE table1 SET family_name = '$_POST[fn]', first_name = '$_POST[frstn]', middle_name = '$_POST[mn]', position = '$_POST[pos]', birthdate = '$_POST[bdate]', placeofbirth = '$_POST[pob]', gender = '$_POST[gender]', civil_status = '$_POST[cs]', contact_number = '$_POST[cn]' WHERE fighter_id = '$id'";
			
			if (!mysqli_query($con,$sql3)){
				echo "Error update";
			}
			
			$sql4= "UPDATE fireman SET firemenpict = '$filepath' WHERE fighter_id = '$id'";
			
			if (!mysqli_query($con,$sql4)){
				echo "Error update";
			}	
				
				//getting the data of staff/Admin for documenting Log-Reports
			$staff_name = $staff_fname." ".$staff_lname;			
			$activity = "".$staff_name." Changed his/her Password";
			//Input a Log Event			
			$log_event ="INSERT into log_event (date, time, id, name, position, activity) VALUES (CURDATE(), CURTIME(), '$staff_id', '$staff_name', '$position', '$activity')";		
			if (!mysqli_query($con,$log_event)){
				echo "Error Query insert_log_event";
				}else{
				}
				
			?>
					<script>
                    alert ("Successfully Edited a Record");
					window.location.href="viewfirefighter.php";
                    </script>
                    <?
			
			}else{
	echo"errorvalidation";
}
}

	
$sql1= mysqli_query ($con,"select * from table1 where fighter_id = '$id'");
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
          											<li><a tabindex="-1" href="viewreports.php">View Report</a></li>
                                                    	<li class=""><a href="addoccupancy.php">Add Occupancy</a>
                                                        <li class=""><a href="addinvestigator.php">Add Investigator</a>		
                                                          <li class=""><a href="addorigin.php">Add Cause/Origin</a>
        											</ul>
                                                    </li>
     
                <li class="active dropdown-submenu <?php echo $disable; ?>">
      			<a class="test" tabindex="-1" href="#">Firefighter
                <span class=" caret"></span></a>
   				<ul class="dropdown-menu">
          	 	<li class="<?php echo $disable; ?>"><a tabindex="-1" href="<?php echo $link_add_firefighter ?>">Add Firefighter</a></li>
          		<li class="<?php echo $disable; ?>"><a tabindex="-1" href="<?php echo $link_view_firefighter ?>">View firefighter</a></li>
        		</ul>
                </li>
                                                        
                                                        
                                                        <li class=""><a href="news.php">Add News</a>
                                                        <li class=""><a href="events.php">Add Events</a>
                                 <li class="<?php echo $disable; ?>"><a href="<?php echo $link_add_staff ?>">Add Staff</a>
                                 						<li class=""><a href="log_reports.php">Log Report</a>																										                                                        <li>
                                   					</ul>
                                                    
                                                    </ul>
      						<ul class="nav navbar-nav navbar-right">
        					<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> LogOut</a></li>
      						</ul>

                            </div>
</div>


</header>
<div class="form-group" style="text-align:center">
 
<h2 class="forms">Edit Firefighter</h2>
</div> 


<div class="row">
<div class = "col-sm-2">
</div>

<div class="col-sm-10">
<form class="form-horizontal" method="post" enctype="multipart/form-data">

 
 <div class="form-group">
      					<label for="lastname" class="col-sm-2 control-label">Choose Photo:</label>
      						<div class="col-sm-6">
      							<input type="file" class="form-control" id="fm_id" name="fm_id" accept="image/*">
                            	<div class="help-block with-errors"><?php echo $errorMessage2;?></div>
                        	</div>
   					</div>
 
<div class="form-group">
<label for="lastname" class="col-sm-2 control-label">Family Name</label>
      						<div class="col-sm-6">
      							<input type="text" class="form-control" id="fn_id" name="fn" value="<?php echo $sql2['family_name']?>">
                                <div class="help-block with-errors"><?php echo $errorMessage3;?></div>
                        	</div>
   					 </div>


<div class="form-group">
<label for="lastname" class="col-sm-2 control-label">First Name</label>
      						<div class="col-sm-6">
      							<input type="text" class="form-control" id="frstn_id" name="frstn" value="<?php echo $sql2 ['first_name']  ?>">
                                <div class="help-block with-errors"><?php echo $errorMessage4;?></div>
                        	</div>
   					 </div>


<div class="form-group">
<label for="lastname" class="col-sm-2 control-label">Middle Name</label>
      						<div class="col-sm-6">
      							<input type="text" class="form-control" id="mn_id" name="mn" value="<?php echo $sql2 ['middle_name']  ?>">
                                <div class="help-block with-errors"><?php echo $errorMessage5;?></div>
                        	</div>
   					 </div>
                     
<div class="form-group">
<label for="lastname" class="col-sm-2 control-label">Position</label>
      						<div class="col-sm-6"> 
	<select name="pos" id="pos_id" class="form-control">
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
    <?php echo $sql2 ['position']  ?> 
    </select></p>
    <div class="help-block with-errors"><?php echo $errorMessage6;?></div>
                        	</div>
   					 </div>

<div class="form-group">
<label for="lastname" class="col-sm-2 control-label">Birthdate</label>
      						<div class="col-sm-6">
      							<input type="date" class="form-control" id="bdate_id" name="bdate" value="<?php echo $sql2 ['birthdate']  ?>">
                                <div class="help-block with-errors"><?php echo $errorMessage7;?></div>
                        	</div>
   					 </div>

<div class="form-group">
<label for="lastname" class="col-sm-2 control-label">Place Of Birth</label>
      						<div class="col-sm-6">
      							<input type="text" class="form-control" id="pob_id" name="pob" value="<?php echo $sql2 ['placeofbirth']  ?>">
                                <div class="help-block with-errors"><?php echo $errorMessage8;?></div>
                        	</div>
   					 </div>


 <div class="form-group">
<label for="lastname" class="col-sm-2 control-label">Gender</label>
      						<div class="col-sm-6">
 <input type="radio" name="gender" value="Male" checked /><span>Male</span>
 <input type="radio" name="gender" value="Female" /><span>Female</span></p>
                        <div class="help-block with-errors"><?php echo $errorMessage9;?></div>
                        	</div>
   					 </div>
                        
 <div class="form-group">
<label for="lastname" class="col-sm-2 control-label">Civil Status</label>
      						<div class="col-sm-6"> 
	<select name="cs" id="cs_id" class="form-control">
	<option value="">--Choose--</option>
      <option value="Fire Officer 1">Single</option>
	<option value="Fire Officer 2">Married</option>
    <option value="Fire Officer 3">Widow</option>
    <option value="Inspector">Separated</option>
    <?php echo $sql2 ['civil_status']  ?>
    </select></p>
    <div class="help-block with-errors"><?php echo $errorMessage10;?></div>
                        	</div>
   					 </div>                       

<div class="form-group">
<label for="lastname" class="col-sm-2 control-label">Contact Number</label>
      						<div class="col-sm-6">
      							<input type="number" class="form-control" id="cn_id" name="cn" value="<?php echo $sql2 ['contact_number']  ?>">
                                <div class="help-block with-errors"><?php echo $errorMessage11;?></div>
                        	</div>
   					 </div>

<div class="row">  
<div class="form-group" align="center">
<div class="col-sm-2"></div>
<div class="col-sm-6">
<p class="sub"><input type="submit" name="submit" id="subb" value="Submit"> <input type="reset" value="Reset"></p>
</div>
</div>
<div class="col-sm-2">
</div>
</div>
</form>
</div>

<div class = "row">
<div class="col-sm-5">
</div>
<div class="alert alert-info col-sm-2" role="alert" style="padding:5px; margin-top:4px" align="center">
  										<a href="viewfirefighter.php" class="alert-link">Back</a>
									</div>

<div class= "col-sm-2">
</div>
                                    </div>


<div class="container">
<footer>
		<div class="row" style="background:#999">
        <div class="col-sm-12">
		<p class="foot" style="text-align:center">Tayug Fire Station&copy;</p>
         <p class="foot" style="text-align:center">2016</p> 
         <p class="foot" style="text-align:center">All Rights Reserved&reg;</p>
		</div>
        </div>
</footer>

</body>
</html>
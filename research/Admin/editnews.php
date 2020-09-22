<?php
session_start();
$staff_id = $_SESSION['staff_id'];
$staff_lname = $_SESSION['lname'];
$staff_fname = $_SESSION['fname'];
$staff_mname = $_SESSION['mname'];
$position = $_SESSION['position'];

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


$errorMessage2="";
$errorMessage3="";
$errorMessage4="";

$con = mysqli_connect("localhost","root","","firerecords") or die("Error " . mysqli_error($link));

if(isset($_GET['id'])){
$id=$_GET['id'];
}

if (isset($_POST['submit'])){
	
	$filesize = $_FILES["file_img"]["size"];
	
	
	if(empty($_POST['title'])){
		echo "<style text/css>
		#title{border-color:#F00;}
		</style>";
		$errorMessage2 = "<span class='label label-danger'>Input Title</span>";
	}else{
		echo "<style text/css>
		#title{border-color:E1E1E1}
		</style>";
		$errorMessage2 ="";
	}
	
	if ($filesize === 0){
		echo "<style text/css>
		#photo{border-color:#F00;}
		</style>";
		$errorMessage3 = "<span class='label label-danger'>Input Photo</span>";
		
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
				$errorMessage3 = "<span class='label label-danger'>Image size is too large</span>";
				}else{
				echo "<style text/css>
				#photo{border-color:E1E1E1;}
				</style>";
				$errorMessage3 = "";
				}
		}else{
    	echo "<style text/css>
		#photo{border-color:#F00;}
		</style>";
		$errorMessage3 = "<span class='label label-danger'>File is not Image</span>";
		}
	}
	
	if(empty($_POST['compose'])){
		echo "<style text/css>
		#compose{border-color:#F00;}
		</style>";
		$errorMessage4 = "<span class='label label-danger'>Input Comments</span>";
	}else{
		echo "<style text/css>
		#compose{border-color:E1E1E1}
		</style>";
		$errorMessage4="";
	}
}
	if((!empty($_POST['title']))&&(!empty($_POST['compose'])) && ($filesize != 0)){
	
	
	
	$title = $_POST['title'];
	$compose = $_POST['compose'];	
	

	$filetmp = $_FILES["file_img"]["tmp_name"];
	$filename = $_FILES["file_img"]["name"];
	$filetype = $_FILES["file_img"]["type"];
	$filepath = "news/".$filename;
	
	move_uploaded_file($filetmp,$filepath);
	
	$sql3 = "UPDATE newstbl SET title='$title', image_path = '$filepath', caption = '$compose'";
	
	if (!mysqli_query($con,$sql3)){
				echo "Error update";
			}
	
		
							//getting the data of staff/Admin for documenting Log-Reports
			$staff_name = $staff_fname." ".$staff_lname;			
			$activity = "".$staff_name." Edited a News";
			//Input a Log Event			
			$log_event ="INSERT into log_event (date, time, id, name, position, activity) VALUES (CURDATE(), CURTIME(), '$staff_id', '$staff_name', '$position', '$activity')";		
			if (!mysqli_query($con,$log_event)){
				echo "Error Query insert_log_event";
				}else{
				}
		


?>
<script>
			//Display an alert box notifying the User that the insertion of data is successful
			window.alert("News Successfully Updated");
			
			window.location.href="viewnews.php";
						</script>
				<?
	}
		


$sql1= mysqli_query ($con,"select * from newstbl where news_id = '$id'");
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
         												<li class="active"><a href="viewnews.php">News</a></li>
          												<li><a href="viewevents.php">Events</a>																										                                                        <li>
                                                        </li>
                                                        </li>
                                                        </ul>
                                                        
        							<li><a href="as.php">About Us</a></li>
                                
                                      <li class="dropdown">
                           <a class="dropdown-toggle" data-toggle="dropdown" href="">Maps
       					   <span class="caret"></span></a>
                                            		    <ul class="dropdown-menu">
                                                    	<li class="dropdown-header"></li>
         												<li class=""><a href="map.php">Map</a></li>
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
                                 						<li class=""><a href="log_reports.php">Log Report</a>																								                                                        <li>
                                   					</ul>
                                                    
                                                    </ul>
      						<ul class="nav navbar-nav navbar-right">
        					<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> LogOut</a></li>
      						</ul>

                            </div>

</header>

<div class="form-group" style="text-align:center">
 
<h2 class="forms">Edit News</h2>
</div>

<div class="row">
<div class = "col-sm-2">
</div>

<div class="col-sm-10">

<form class="form-horizontal" method="post" enctype="multipart/form-data">
		
                    <div class="form-group">
<label for="lastname" class="col-sm-2 control-label">Title:</label>
      						<div class="col-sm-6">
      							<input type="text" class="form-control" id="title" name="title" value="<?php echo $sql2 ['title']  ?>">
                                <div class="help-block with-errors"><?php echo $errorMessage2;?></div>
                        	</div>
   					 </div>

<div class="form-group">
      					<label for="lastname" class="col-sm-2 control-label">Choose Photo:</label>
      						<div class="col-sm-6">
      							<input type="file" class="form-control" id="photo" name="file_img" accept="image/*">
                                
                            	<div class="help-block with-errors"><?php echo $errorMessage3;?></div>
                        	</div>
   					</div>
                    
                    <div class="form-group">
      					<label for="lastname" class="col-sm-2 control-label">Compose:</label>
      						<div class="col-sm-9">
      							<textarea name="compose" cols="50" rows="8" id="compose" value="caption"></textarea>
                            	<div class="help-block with-errors"><?php echo $errorMessage4;?></div>
                        	</div>
   					</div>
                   
                   <div class="row">  
<div class="form-group" align="center">
<div class="col-sm-2"></div>
<div class="col-sm-5">
                    	<input type="submit" name="submit" class="btn btn-default col-sm-" value="Submit" >
                        </div>
</div>
<div class="col-sm-2">
</div>
</div>
                    
</form>




<div class="row">
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
</div>
</body>
</html>
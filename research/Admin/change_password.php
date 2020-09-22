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
	
$errorMessage1="";
$errorMessage2="";
$errorMessage3="";
$hashed_oldpassword = "";
$hashed_password = "";

$con = mysqli_connect("localhost","root","","firerecords") or die("Error " . mysqli_error($link));

if(isset($_GET['id'])){
$id=$_GET['id'];


				if(isset($_POST['submit'])){
					$sql = mysqli_query($con,"SELECT * FROM admintbl WHERE staff_id ='$id'");
								if(!$sql){
								echo "No result found";
			
								}else{
									while($row = mysqli_fetch_array($sql)){
										
										if(empty($_POST['oldpassword'])){
											echo "<style text/css>
											#opass{border-color:#F00;}</style>";
											$errorMessage1="<span class='label label-danger'>Input Old Password</span>";
										}else{
											echo "<style text/css>
											#opass{border-color:E1E1E1}
											</style>";
											
											$errorMessage1 = "";
											$oldpassword = $_POST['oldpassword'];
											$hashed_oldpassword = md5($oldpassword);
										}
										
										if(empty($_POST['newpassword'])){
											echo "<style text/css>
											#npass{border-color:#F00;}</style>";
											$errorMessage2="<span class='label label-danger'>Input New Password</span>";
										}else{
											echo "<style text/css>
											#npass{border-color:E1E1E1}
											</style>";
											$errorMessage2="";
										}
										
										if(empty($_POST['retypenewpass'])){
											echo "<style text/css>
											#rnpass{border-color:#F00;}</style>";
											$errorMessage3="<span class='label label-danger'>Retype New Password</span>";
										}else{
											echo "<style text/css>
											#rnpass{border-color:E1E1E1}
											</style>";
											$errorMessage3="";
										}
				
												if (($hashed_oldpassword == $row['password'])&&($_POST['username'] == $row['username'])){
													echo "<style text/css>
													#opass{border-color:E1E1E1;}
													</style>";
													$errorMessage1 = "";
													
												
														if (($_POST['newpassword']) == ($_POST['retypenewpass']) && ($_POST['newpassword']) != "" && ($_POST['retypenewpass']) != "" && ($_POST['oldpassword']) != "" ){
															
															
															echo "<style text/css>
															#npass{border-color:E1E1E1;}</style>";
															$errorMessage2 = "";
															echo "<style text/css>
															#rnpass{border-color:E1E1E1;}</style>";
															$errorMessage3 = "";
				
															$pass = $_POST['retypenewpass'];
															$hashed_password = (md5($pass));
		
															mysqli_query( $con,"UPDATE admintbl SET password = '$hashed_password' WHERE staff_id ='$id'");
												
													
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
											//Display an alert box notifying the User that the insertion of data is successful
											window.alert("Successfully Updated.");
											window.location.href="view_staff_acc.php";
						</script>
											<?
												
												
														}else{
															echo "<style text/css>
															#npass{border-color:#F00;}</style>";
															$errorMessage2 = "<span class='label label-danger'>New Password or Retype Password is not match or EMPTY</span>";
															echo "<style text/css>
															#rnpass{border-color:#F00;}</style>";
															$errorMessage3 = "<span class='label label-danger'>New Password or Retype Password is not match or EMPTY</span>";
														}
													
													
												}else{
													echo "<style text/css>
													#opass{border-color:#F00;}</style>";
													$errorMessage1 ="<span class='label label-danger'>Old Password is Incorrect</span>";									
												}
									}
								}
				}
}



$sql1= mysqli_query($con,"select * from admintbl where staff_id = '$id'");
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
                            <li class="active"><a href="view_staff_acc.php"><span class="glyphicon glyphicon-user"></span>My Account &nbsp; &nbsp; &nbsp;</a>						 							</li>
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
</div>

</header>
    <!--/Menus-->
    
<div class ="container">        				
                <div class="row">
    					<div class="col-sm-12">
        					<h4 align="center">Staff Information</h4>
                        </div>
			  	</div>
                        
                        
 				<form class="form-horizontal" method="post">
                
    				<div class="form-group">
      					<label for="id" class="col-sm-3 control-label">Staff ID:</label> 
                        	<div class="col-sm-9">
      					<input type="text" class="form-control" readonly id="staff_id" name="staff_id" aria-describedby="sizing-addon3" value="<?php echo $sql2['staff_id'] ?>">
                        	</div>
                            
    				</div>
                    
    				<div class="form-group">
      					<label for="lastname" class="col-sm-3 control-label">Name:</label>
      						<div class="col-sm-3">
      							<input type="text" readonly class="form-control col-sm-3" id="lname" name="lname" placeholder="Last Name" value="<?php echo $sql2['lname'] ?>">
                                
    							<div class="help-block with-errors"></div>
                        	</div>
                            
                            <div class="col-sm-3">
      							<input type="text" readonly class="form-control col-sm-3" id="fname" name="fname" placeholder="First Name" value="<?php echo $sql2['fname'] ?>">
                                
                                 <div class="help-block with-errors"></div>
                        	</div>
                            	
                            <div class="col-sm-3">
      							<input type="text" readonly class="form-control col-sm-3" id="mname" name="mname"  placeholder="Middle Name" value="<?php echo $sql2['mname'] ?>">
                                
                                 <div class="help-block with-errors"></div>
                        	</div>
   					</div>

                    
                    <div class="form-group">
      					<label for="username" class="col-sm-3 control-label">User Name:</label>
      						<div class="col-sm-9">
      							<input type="text" readonly class="form-control" id="username" name="username" aria-describedby="sizing-addon3" value="<?php echo $sql2['username'] ?>">
                                
                        	</div>
   					</div>
                    
                    <div class="form-group">
      					<label for="oldpassword" class="col-sm-3 control-label">Old Password:</label>
      						<div class="col-sm-9">
      							<input type="password" class="form-control" id="opass" name="oldpassword" aria-describedby="sizing-addon3" value="<?php echo isset($_POST['oldpassword']) ? htmlspecialchars($_POST['oldpassword']) : ''; ?>">
                                <div class="help-block with-errors"><?php echo $errorMessage1?></div>
                        	</div>
   					</div>
                    
                    <div class="form-group">
      					<label for="newpassword" class="col-sm-3 control-label">New Password:</label>
      						<div class="col-sm-9">
      							<input type="password" class="form-control" id="npass" name="newpassword" input pattern=".{6,13}"  title="6 to 13 characters" value="">
                                 <div class="help-block with-errors"><?php echo $errorMessage2;?></div>
                        	</div>
   					</div>
                    
                    <div class="form-group">
      					<label for="retypenewpass" class="col-sm-3 control-label">Retype New Password:</label>
      						<div class="col-sm-9">
      							<input type="password" class="form-control" id="rnpass" name="retypenewpass" input pattern=".{6,13}"  title="6 to 13 characters" value="">
                                 <div class="help-block with-errors"><?php echo $errorMessage3;?></div>
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
</div>
	

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
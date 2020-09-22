<?php
session_start();

if(isset($_GET['staff_id'])){
	$id=$_GET['staff_id'];
}
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
	
//Transfer the Staff information sessions to new variables
$staff_id = $_SESSION['staff_id'];
$staff_lname = $_SESSION['lname'];
$staff_fname = $_SESSION['fname'];
$staff_mname = $_SESSION['mname'];
$position = $_SESSION['position'];

//Error Handler
$errorMessage = "";

$con = mysqli_connect("localhost","root","","firerecords") or die("Error " . mysqli_error($link));

if(isset($_POST['submit'])){
	if(empty($_POST['compose'])){
		echo "<style text/css>
		#compose{border-color:#F00;}
		</style>";
		$errorMessage = "<span class='label label-danger'>Input Comments</span>";
	}else{
		echo "<style text/css>
		#compose{border-color:E1E1E1}
		</style>";
		$errorMessage="";
	}
	if(!empty($_POST['compose'])){
		$reason = mysqli_real_escape_string($con, $_POST['compose']);
		//update Account
		mysqli_query($con,"UPDATE admintbl SET account = 'Active', reason = '$reason' WHERE staff_id='$id'");

											$staff_name = $staff_fname." ".$staff_lname;
											
											$activity = $staff_name." Reactivate Staff ID:".$id."";
											
											
											//Insert data to create log reports
											$sql3 ="INSERT into log_event (date, time, id, name, position, activity) VALUES (CURDATE(), CURTIME(), '$staff_id', '$staff_name', '$position', '$activity')";
											if (!mysqli_query($con,$sql3)) {
											die('Error: ' . mysqli_error($con));			
											}	
											?>
				<script>
				window.alert('Account Reactivate <?php echo "Staff ID:".$id;?>');
				window.location.href="list_of_staff.php";
				
				</script>
                
                <?
		}
}

if(isset($_GET['staff_id'])){
	$id=$_GET['staff_id'];
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


    
    <!--Account Information-->
    <div class="row">
    	<div class="col-sm-12">
        <h2 align="center">Deactivating an Account</h2>
        </div>
    </div>
    
	<div class="row">
    <div class="col-sm-2">
    </div>
        		<div class="col-sm-8">
        			<div class="panel panel-default">
 		 				<div class="panel-heading" align="center"><h3 style="margin:4px">Account Information</h3></div>
  							<div class="panel-body">
        				<div class="col-sm-3">
        				<h4>Staff ID:</h4>
            			</div>
            			<div class="col-sm-9">
                		<h4><?php echo $sql2['staff_id'];?></h4>
            			</div>
                        
        			
        				<div class="col-sm-3">
        				<h4>Name:</h4>
            			</div>
            			<div class="col-sm-9">
                		<h4><?php echo $sql2['fname']." ".$sql2['mname']." ".$sql2['lname'];?></h4>
            			</div>
            		
        				<div class="col-sm-3">
        				<h4>Birth Date:</h4>
            			</div>
            			<div class="col-sm-9">
                		<h4><?php echo $sql2['bdate']." ";?></h4>
            			</div>
            		
                    
        				<div class="col-sm-3">
        				<h4>Address:</h4>
            			</div>
            			<div class="col-sm-9">
                		<h4><?php echo $sql2['no_street']." ".$sql2['barangay']." ".$sql2['town']." ".$sql2['province'];?></h4>
            			</div>
                        
                        
                		<div class="col-sm-3">
        				<h4>Rank:</h4>
            			</div>
            			<div class="col-sm-9">
                		<h4><?php echo $sql2['rank']." ";?></h4>
            			</div>
                        
                        
                        <div class="col-sm-3">
        				<h4>Gender:</h4>
            			</div>
            			<div class="col-sm-9">
                		<h4><?php echo $sql2['gender']." ";?></h4>
            			</div>
                        
                        
                        <div class="col-sm-3">
        				<h4>Civil Status:</h4>
            			</div>
            			<div class="col-sm-9">
                		<h4><?php echo $sql2['civil_status']." ";?></h4>
            			</div>
                
                
                
                		<div class="col-sm-3">
        				<h4>Contact Number:</h4>
            			</div>
            			<div class="col-sm-9">
                		<h4><?php echo $sql2['contact_no']." ";?></h4>
            			</div>
                		
                
                
                
        				<div class="col-sm-3">
        				<h4>Date Hired:</h4>
            			</div>
            			<div class="col-sm-9">
                		<h4><?php echo $sql2['datehired'];?></h4>
            			</div>
                        
            				</div>
                            
                        
                        <div class="-col-sm-2">
                        </div>
                </div>
                
                
                
                
                
                
                <div class="row">
                        <div class="col-sm-12">
                        
        			<div class="panel panel-default">
 		 				<div class="panel-heading" align="center"><h3 style="margin:4px">Reason For Deactivating this account</h3></div>
  							<div class="panel-body">
        						
                                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                
    							<div class="form-group">
      										<label for="lastname" class="col-sm-2 control-label">Compose:</label>
      									<div class="col-sm-9">
      										<textarea name="compose" cols="30" rows="10" id="compose"><?php echo isset($_POST['compose']) ? htmlspecialchars($_POST['compose']) : ''; ?></textarea>
                            				<div class="help-block with-errors"><?php echo $errorMessage;?></div>
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
                		</div>
                        </div>
                </div>
        	
   				 </div>
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
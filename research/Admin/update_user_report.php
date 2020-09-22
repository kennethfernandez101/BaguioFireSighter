<?php
session_start();
$staff_id = $_SESSION['staff_id'];
$staff_lname = $_SESSION['lname'];
$staff_fname = $_SESSION['fname'];
$staff_mname = $_SESSION['mname'];


$con = mysqli_connect("localhost","root","","firerecords") or die("Error " . mysqli_error($link));

if (isset($_GET['id'])){
	$id = $_GET['id'];
}

$position = $_SESSION['position'];

//Error Variables
$errorMessage1 = "";



if (isset($_POST['submit'])){


//name
	if(empty($_POST['Status'])){
		echo "<style text/css>
		#Status{border-color:#F00;}
		</style>";
		$errorMessage1 = "<span class=' label label-danger'>Choose Status</span>";
		
	}else{
	
		echo "<style text/css>
		#Status{border-color:E1E1E1}</style>";
		$errorMessage1="";
	}
	
	
	if(!empty($_POST['Status'])){
		
		$Status = $_POST['Status'];
	mysqli_query($con,"UPDATE userreport SET Status='$Status' WHERE urid='$id'");
	
		
						//getting the data of staff/Admin for documenting Log-Reports
			$staff_name = $staff_fname." ".$staff_lname;			
			$activity = "".$staff_name." Updated a Mobile Report";
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
			
			window.location.href="user_rep_list.php";
						</script>
				<? 
		
	}
}



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

		
//Database connection


$sql1= mysqli_query ($con,"select * from userreport where urid = '$id'");
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
          												<li class="active"><a href="viewevents.php">Events</a>																										                                                        <li>
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



<div class="form-group" style="text-align:center">
 
<h2 class="forms">Update User Report</h2>
</div>


    
    
    <div class="row" align="center">
    	<div class="col-sm-12">
            <img class="img-responsive" src="<?php echo $sql2['reportimage'];?>" alt="pict" width="100" height="100">
        	
        </div>
    </div>
    
	<div class="row">
    	    <div class="col-sm-2">
        	</div>
        		<div class="col-sm-8">
        			
        				<div class="col-sm-3">
        				<h4>Report Description:</h4>
            			</div>
            			<div class="col-sm-9">
                		<h4><?php echo $sql2['repdescription'];?></h4>
            			</div>
            		
                </div>
        	<div class="col-sm-2">
        	</div>
     </div>
            
    <div class="row">
    	    <div class="col-sm-2">
        	</div>
        		<div class="col-sm-8">
        			
        				<div class="col-sm-3">
        				<h4>Contact Number:</h4>
            			</div>
            			<div class="col-sm-9">
                		<h4><?php echo $sql2['contactno'];?></h4>
            			</div>
            		
                </div>
        	<div class="col-sm-2">
        	</div>
     </div>
     
     <div class="row">
    	    <div class="col-sm-2">
        	</div>
        		<div class="col-sm-8">
        			
        				<div class="col-sm-3">
        				<h4>Date: </h4>
            			</div>
            			<div class="col-sm-9">
                		<h4><?php echo $sql2['firedate'];?></h4>
            			</div>
            		
                </div>
        	<div class="col-sm-2">
        	</div>
     </div>
     
      <div class="row">
    	    <div class="col-sm-2">
        	</div>
        		<div class="col-sm-8">
        			
        				<div class="col-sm-3">
        				<h4>Time: </h4>
            			</div>
            			<div class="col-sm-9">
                		<h4><?php echo $sql2['firetime'];?>
            			</div>
            	
                </div>
        	<div class="col-sm-2">
        	</div>
     </div>
     
     
     
     
      
     <div class="row">
    	    <div class="col-sm-2">
        	</div>
        		<div class="col-sm-8">
        			
        				<div class="col-sm-3">
        				<h4>Status: </h4>
            			</div>
            			<div class="col-sm-9">
                		<h4><?php echo $sql2['Status']?></h4>
            			</div>
            	
                </div>
        	<div class="col-sm-2">
        	</div>
     </div>
     
     
     <form class="form-horizontal" method="post" enctype="multipart/form-data">
     
   <div class="form-group">
<label for="lastname" class="col-sm-3 control-label">Status</label>
      						<div class="col-sm-4"> 
	<select name="Status" id="Status" class="form-control col-sm-5">
	<option value="">--Choose--</option>
    <option value="Fire On-Going">Fire On-Going</option>
    <option value="Case Closed">Case Closed</option>
    <option value="Unreliable Sources">Unreliable Sources</option>
    </select></p>
    <div class="help-block with-errors"><?php echo $errorMessage1;?></div>
                        	</div>
   					 </div>
   
    <div class="form-group">
                    <label for="" class="col-sm-3 control-label">&nbsp;</label>
                    	<div class="col-sm-9">
                    	<input type="submit" name="submit" class="btn btn-default col-sm-3" value="Submit" >
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
</div>
</div>
</body>
</html>
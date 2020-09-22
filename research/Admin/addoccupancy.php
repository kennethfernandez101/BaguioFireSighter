<?php
session_start();

$position = $_SESSION['position'];
//Database Connection
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
$errorMessage2="";


	
//validation			
if (isset($_POST['submit'])){

	if (empty($_POST['occupancy_name'])){
		echo "<style text/css>
		#id{border-color:#F00;}</style>";	
	}else{
		$_SESSION['occupancy_name'] = $_POST['occupancy_name'];
		echo "<style text/css>
		#id{border-color:transparent;}</style>";
		if (($_POST['occupancy_name']!="")){
			$sql = "INSERT INTO occupancy (occupancy_name) VALUES ('$_POST[occupancy_name]')";
			
			if(!mysqli_query($con, $sql)){
				echo "Error";
			}else{
				echo "success";
			}
		}
		}
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
                     	   <li><a href="bfp.php">Home</a></li>
                           
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
                                                    <li class="active"><a tabindex="-1" href="addoccupancy.php">Add Occupancy</a></li>		
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
 
<h2 class="forms">Insert Occupancy</h2>
</div>

<div class="row">
<div class = "col-sm-2">
</div>

<div class="col-sm-10">
<form class="form-horizontal" method="post" enctype="multipart/form-data">

 



 <div class="form-group">
<label for="lastname" class="col-sm-2 control-label">Add Occupancy</label>
      						<div class="col-sm-6">
      							<input type="text" class="form-control" id="id" name="occupancy_name" value="<?php echo isset($_POST['occupancy_name']) ? htmlspecialchars($_POST['occupancy_name']) : ''; ?>">
                                <div class="help-block with-errors"><?php echo $errorMessage2;?></div>
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

<div class="col-sm-4">
</div>
</div>
<div class = "row">
<div class="col-sm-5">
</div>
<div class= "col-sm-2">
</div>
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

</body>
</html>
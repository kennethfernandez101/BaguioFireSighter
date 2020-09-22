<?php
session_start();

$position = $_SESSION['position'];
//Database Connection
$con = mysqli_connect("localhost","root","","firerecords") or die("Error " . mysqli_error($link));

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


	
//validation			
if (isset($_POST['submit'])){

	if (empty($_POST['name'])){
		echo "<style text/css>
		#id{border-color:#F00;}</style>";	
	}else{
		$_SESSION['name'] = $_POST['name'];
		echo "<style text/css>
		#id{border-color:transparent;}</style>";
		if (($_POST['name']!="")){
			$sql = "INSERT INTO investigator (name) VALUES ('$_POST[name]')";
			
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
<title>Untitled Document</title>
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
                                    
                                    <li class="active dropdown">            
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="adminmenu.php" class="active">Admin Menu
       								<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                    <li class="dropdown-header"></li>
                                    <li class="active dropdown-submenu">
        											<a class="test" tabindex="-1" href="#">Report
                                                    <span class=" caret"></span></a>
        											<ul class="dropdown-menu">
          											<li><a tabindex="-1" href="report.php">Add Report</a></li>
          											<li><a tabindex="-1" href="viewreports.php">View Report</a></li> 
                                                     <li><a tabindex="-1" href="addoccupancy.php">Add Occupancy</a></li>
                                                    <li class="active"><a tabindex="-1" href="addinvestigator.php">Add Investigator</a></li>		
                                                    <li><a tabindex="-1" href="addorigin.php">Add Cause/Origin</a></li>	
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
                                 <li class="<?php echo $disable; ?>"><a href="<?php echo $link_add_staff ?>">Add Staff</a>
                                  						<li class=""><a href="log_reports">Log Report</a>
                                 																																                                                        <li>
                                   					</ul>
                                                    
                                                    </ul>
      						<ul class="nav navbar-nav navbar-right">
        					<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> LogOut</a></li>
      						</ul>

                            </div>
</div>


</header>

<div class="form-group" style="text-align:center">
 
<h2 class="forms">Insert Investigator</h2>
</div>

<div class="row">
<div class = "col-sm-2">
</div>

<div class="col-sm-10">
<form class="form-horizontal" method="post" enctype="multipart/form-data">

 



 <div class="form-group">
<label for="lastname" class="col-sm-2 control-label">Add Investigator</label>
      						<div class="col-sm-6">
      							<input type="text" class="form-control" id="id" name="name" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>">
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
		<p class="foot" style="text-align:center">Tayug Fire Station&copy;</p>
         <p class="foot" style="text-align:center">2016</p> 
         <p class="foot" style="text-align:center">All Rights Reserved&reg;</p>
		</div>
        </div>
</footer>

</body>
</html>
<?php
session_start();

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



$con = mysqli_connect("localhost","root","","firerecords") or die("Error " . mysqli_error($link));
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $position;?> Untitled</title>
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
    
   <!--Menus-->
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
          		<li class="<?php echo $disable; ?> active"><a tabindex="-1" href="<?php echo $link_view_firefighter ?>">View firefighter</a></li>
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
    
<div class="container">

<form method="post">
<label>Search:</label>
<input type="text" name="origin" placeholder="SEARCH HERE">

<input type="submit" name="submit" value="Submit">
</form>
<?php
//Searching
if(isset($_POST['submit'])){
		if(empty($_POST['origin'])){
			$sql = mysqli_query($con,"SELECT * FROM phonecalltbl ");		
		if(!$sql){
			echo "No result found";
		}else{		
			 echo '<table class="table table-condensed table-striped table-bordered table-responsive">
    <thead>
      <tr class="info">
				<th>Date</th>
				<th>Time</th>
				<th>First Name</th>
  				<th>Middle Name</th>
  				<th>Last Name</th>
				<th>Street</th>
				<th>Barangay</th>	
</tr>
    </thead>
    <tbody>';
		
			while($row = mysqli_fetch_array($sql)) {
      echo '<tr>';
			     echo "<td>" . $row['date'] ."</td>";
			echo "<td>" . $row['time'] ."</td>";
			echo "<td>" . $row['first_name'] ."</td>";
			echo "<td>" . $row['middle_name'] ."</td>";
			echo "<td>" . $row['last_name'] ."</td>";
			echo "<td>" . $row['street'] ."</td>";
			echo "<td>" . $row['barangay'] ."</td>";
			echo "<td><a href='.php?id=".$row['pc_id']."' class='alert-link alert-info'>Create Report
				  </td>";
      echo'</tr>
    </tbody>';
	}
  echo'</table>';
  }
		}else{
					
		$sql = mysqli_query($con,"SELECT * FROM phonecalltbl WHERE date like '%$_POST[origin]%' || street like '%$_POST[origin]%' || barangay like '%$_POST[origin]%'");		
		if(!$sql){
			echo "No result found";
		}else{		
			 echo '<table class="table table-condensed table-striped table-bordered table-responsive">
    <thead>
      <tr class="info">
				<th>Date</th>
				<th>Time</th>
				<th>First Name</th>
  				<th>Middle Name</th>
  				<th>Last Name</th>
				<th>Street</th>	
				<th>Barangay</th>
				</tr>
    </thead>
    <tbody>';
		
			while($row = mysqli_fetch_array($sql)) {
      echo '<tr>';
			         echo "<td>" . $row['date'] ."</td>";
			echo "<td>" . $row['time'] ."</td>";
			echo "<td>" . $row['first_name'] ."</td>";
			echo "<td>" . $row['middle_name'] ."</td>";
			echo "<td>" . $row['last_name'] ."</td>";
			echo "<td>" . $row['street'] ."</td>";
			echo "<td>" . $row['barangay'] ."</td>";
			echo "<td><a href='.php?id=".$row['pc_id']."' class='alert-link alert-info'Create Report
				  </td>";
		
      echo'</tr>
    </tbody>';
	}
  echo'</table>';
  }
		}
}
?> 



        
        
		<div class="container">
<footer>
		<div class="row" style="background:#292c2f">
        <div class="col-sm-12">
		<?php include 'footer.php'; ?>
		</div>
        
</footer>
		</div>
        

</body>
</html>
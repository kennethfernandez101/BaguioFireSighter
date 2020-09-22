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
<div class="row">
								
<?php
$btn="";
$lnk="";
$con = mysqli_connect("localhost","root","","firerecords") or die("Error " . mysqli_error($link));				
		$sql = mysqli_query($con,"SELECT * FROM admintbl");		
		if(!$sql){
			echo "No result found";
		}else{		
		
  echo '<table class="table table-condensed table-striped table-bordered table-responsive">
    <thead>
      <tr class="info">
		<th>Staff ID</th>
		<th>Staff Name</th>
		<th>Birth Date</th>
		<th>Address</th>
		<th>Rank</th>
		<th>Gender</th>
		<th>Civil Status</th>
		<th>Contact Number</th>
		<th>Position</th>
		<th>Action</th>
      </tr>
    </thead>
    <tbody>';
	while($row = mysqli_fetch_array($sql)) {
		
		
      echo '<tr>';
			echo "<td>" . $row['staff_id'] ."</td>";
			echo "<td>" . $row['fname'] ." ". $row['mname']. " ". $row['lname']. "</td>";
			echo "<td>" . $row['bdate'] ."</td>";
			echo "<td>" . $row['barangay'] ." ". $row['town']. " ". $row['province']. "</td>";
			echo "<td>" . $row['rank'] ."</td>";
			echo "<td>" . $row['gender'] ."</td>";
			echo "<td>" . $row['civil_status'] ."</td>";
			echo "<td>" . $row['contact_no'] ."</td>";
			echo "<td>" . $row['position'] ."</td>";
			
			echo "<td><a href='editstaff.php ?id=".$row['staff_id']."' class='alert-link alert-info'>Promote</a>&nbsp;
				  </td>";
			
				$btn="class='btn btn-warning glyphicon glyphicon-warning-sign'";
				$lnk="account_deactivation.php";
				$stat="Deactivate";
			if($row['position'] ==='Admin'){
				$btn="class=''";
				$lnk="#";
				$stat="";
			}else{
				if($row['account'] ==='Active'){
				$btn="class='btn btn-warning glyphicon glyphicon-warning-sign'";
				$lnk="account_deactivation.php";
				$stat="Deactivate";
				}else{
				if($row['account']==='Inactive'){
					
				$btn="class='btn btn-primary";
				$lnk="reactivate_account.php";
				$stat="Reactivate";
		}}
		
			}echo "<td><a href='".$lnk."?staff_id=".$row['staff_id']."'".$btn."'>".$stat."</a></td>";
      echo'</tr>
    </tbody>';
	}
  echo'</table>';
  }
		//close connection
		mysqli_close($con);
		?>
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
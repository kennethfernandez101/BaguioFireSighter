<?php
session_start();
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
?>

<?php


if (isset($_POST['submit1'])){
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
	
	 if (trim(empty($_POST['mn']))){
		echo "<style text/css>
		#mn_id{border-color:#F00;}</style>";
	}else{
	$_SESSION['mn'] = $_POST['mn'];
		echo "<style text/css>
		#mn_id{border-color:transparent;}</style>";
	}
	
	 if (trim(empty($_POST['pos']))){
		echo "<style text/css>
		#pos_id{border-color:#F00;}</style>";
	}else{
	$_SESSION['pos'] = $_POST['pos'];
		echo "<style text/css>
		#pos_id{border-color:transparent;}</style>";
	}
	
	if (trim(empty($_POST['bdate']))){
		echo "<style text/css>
		#bdate_id{border-color:#F00;}</style>";
	}else{
	$_SESSION['bdate'] = $_POST['bdate'];
		echo "<style text/css>
		#bdate_id{border-color:transparent;}</style>";
	}
	
	if (trim(empty($_POST['pob']))){
		echo "<style text/css>
		#pob_id{border-color:#F00;}</style>";
	}else{
	$_SESSION['pob'] = $_POST['pob'];
		echo "<style text/css>
		#pob_id{border-color:transparent;}</style>";
	}
	
	if (trim(empty($_POST['gender']))){
		echo "<style text/css>
		#gender_id{border-color:#F00;}</style>";
	}else{
	$_SESSION['gender'] = $_POST['gender'];
		echo "<style text/css>
		#gender_id{border-color:transparent;}</style>";
	}
	
	if (trim(empty($_POST['cs']))){
		echo "<style text/css>
		#cs_id{border-color:#F00;}</style>";
	}else{
	$_SESSION['cs'] = $_POST['cs'];
		echo "<style text/css>
		#cs_id{border-color:transparent;}</style>";
	}
	
	if (trim(empty($_POST['cn']))){
		echo "<style text/css>
		#cn_id{border-color:#F00;}</style>";
	}else{
	$_SESSION['cn'] = $_POST['cn'];
		echo "<style text/css>
		#cn_id{border-color:transparent;}</style>";
	}
	
	
	if ($_POST['fn']!="" && $_POST['frstn']!="" && $_POST['mn']!="" && $_POST['pos']!="" && $_POST['bdate']!="" && $_POST['pob']!="" && $_POST['gender']!="" && $_POST['cs']!="" && $_POST['cn']!=""){
		
		$con = mysqli_connect("localhost","root","","firerecords") or die("Error " . mysqli_error($link));
				
				$sql = "INSERT INTO table1 (family_name, first_name, middle_name, position, birthdate, placeofbirth, gender, civil_status, contact_number) VALUES ('$_POST[fn]','$_POST[frstn]', '$_POST[mn]', '$_POST[pos]','$_POST[bdate]','$_POST[pob]', '$_POST[gender]', '$_POST[cs]', '$_POST[cn]')";
				
				
			
				if (mysqli_query($con,$sql)){
			mysqli_close($con);
				
				header ('location:firefighter.php');
				mysqli_close($con);
	
				}
			}else{
			echo "<style text/css>
		#temppass{border-color:#F00;}</style>";
			echo "<style text/css>
		#retypepass{border-color:#F00;}</style>";
}
	}
	
	
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $position;?>Untitled Document</title>
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
                                    <li class="dropdown-submenu">
        											<a class="test" tabindex="-1" href="#">Report
                                                    <span class=" caret"></span></a>
        											<ul class="dropdown-menu">
          											<li><a tabindex="-1" href="report.php">Add Report</a></li>
          											<li><a tabindex="-1" href="viewreports.php">View Report</a></li>
                                                    <li><a tabindex="-1" href="addoccupancy.php">Add Occupancy</a></li>
                                                    <li><a tabindex="-1" href="addinvestigator.php">Add Investigator</a></li>		
                                                    <li><a tabindex="-1" href="addorigin.php">Add Cause/Origin</a></li>
        											</ul>
                                                    </li>
     
                <li class="active dropdown-submenu <?php echo $disable; ?>">
      			<a class="test" tabindex="-1" href="#">Firefighter
                <span class=" caret"></span></a>
   				<ul class="dropdown-menu">
          	 	<li class="<?php echo $disable; ?>"><a tabindex="-1" href="<?php echo $link_add_firefighter ?>">Add Firefighter</a></li>
          		<li class="active <?php echo $disable; ?>"><a tabindex="-1" href="<?php echo $link_view_firefighter ?>">View firefighter</a></li>
        		</ul>
                </li>
                                                        
                                                        
                                                        <li class=""><a href="news.php">Add News</a>
                                                        <li class=""><a href="events.php">Add Events</a>
                                 <li class="<?php echo $disable; ?>"><a href="<?php echo $link_add_staff ?>">Add Staff</a>	
                                 						<li class=""><a href="log_reports">Log Report</a>																									                                                        <li>
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
$con = mysqli_connect("localhost","root","","firerecords") or die("Error " . mysqli_error($link));				
		$sql = mysqli_query($con,"SELECT * FROM table1");		
		if(!$sql){
			echo "No result found";
		}else{	
			if ($position == 'Admin'){	
			echo '<table class="table table-condensed table-striped table-bordered table-responsive">
    <thead>
      <tr class="info">
				<th>Family Name</th>
				<th>First Name</th>
  				<th>Middle Name</th>
  				<th>Position</th>
				<th>Birthdate</th>	
				<th>Place of Birth</th>	
				<th>Gender</th>
				<th>Civil Status</th>
				<th>Contact Number</th>
				</thead>
    <tbody>';
					
			while($row = mysqli_fetch_array($sql)) {
      echo '<tr>';
			    echo "<td>" . $row['family_name'] . "</td>";
				echo "<td>" . $row['first_name'] . "</td>";
				echo "<td>" . $row['middle_name'] . "</td>";
				echo "<td>" . $row['position'] . "</td>";
				echo "<td>" . $row['birthdate'] . "</td>";
				echo "<td>" . $row['placeofbirth'] . "</td>";
				echo "<td>" . $row['gender'] . "</td>";
				echo "<td>" . $row['civil_status'] . "</td>";
				echo "<td>" . $row['contact_number'] . "</td>";
				
			
			
			echo "<td><a href='editfirefighter.php ?id=".$row['fighter_id']."' class='alert-link alert-info'>Edit</a>&nbsp;<a href='deletefirefighter.php ?id=".$row['fighter_id']."' class='alert-link alert-info'>Delete</a>
				  </td>";
      echo'</tr>
    </tbody>';
	}
  echo'</table>';
  }else{
	  
	  echo '<table class="table table-condensed table-striped table-bordered table-responsive">
    <thead>
      <tr class="info">
				<th>Family Name</th>
				<th>First Name</th>
  				<th>Middle Name</th>
  				<th>Position</th>
				<th>Birthdate</th>	
				<th>Place of Birth</th>	
				<th>Gender</th>
				<th>Civil Status</th>
				<th>Contact Number</th>
				</thead>
    <tbody>';
					
			while($row = mysqli_fetch_array($sql)) {
      echo '<tr>';
			    echo "<td>" . $row['family_name'] . "</td>";
				echo "<td>" . $row['first_name'] . "</td>";
				echo "<td>" . $row['middle_name'] . "</td>";
				echo "<td>" . $row['position'] . "</td>";
				echo "<td>" . $row['birthdate'] . "</td>";
				echo "<td>" . $row['placeofbirth'] . "</td>";
				echo "<td>" . $row['gender'] . "</td>";
				echo "<td>" . $row['civil_status'] . "</td>";
				echo "<td>" . $row['contact_number'] . "</td>";
				
      echo'</tr>
    </tbody>';
	}
  echo'</table>';
  }
			
				?>
               
                <?php	
			
		//close connection
		mysqli_close($con);
		}
		?>
       
       
       <div class="col-sm-4">
</div>
</div>

<div class = "row">
<div class="col-sm-5">
</div>
<div class="alert alert-info col-sm-2" role="alert" style="padding:5px; margin-top:4px" align="center">
        <a href="firefighter.php" class="alert-link">Back</a>
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
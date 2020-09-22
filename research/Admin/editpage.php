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
$errorMessage5="";
$errorMessage6="";
$errorMessage7="";
$errorMessage8="";
$errorMessage9="";
$errorMessage10="";
$errorMessage11="";
$errorMessage12="";
$errorMessage13="";


?>

 
<?php

$con = mysqli_connect("localhost","root","","firerecords") or die("Error " . mysqli_error($link));

if(isset($_GET['id'])){
$id=$_GET['id'];

if (isset($_POST['submit'])){
	
	if (empty($_POST['date'])){
		echo "<style text/css>
		#date_id{border-color:#F00;}</style>";	
	}else{
	$_SESSION['date'] = $_POST['date'];
		echo "<style text/css>
		#date_id{border-color:transparent;}</style>";
	}
	
	if (empty($_POST['timea'])){
		echo "<style text/css>
		#time_id{border-color:#F00;}</style>";	
	}else{
	$_SESSION['timea'] = $_POST['timea'];
		echo "<style text/css>
		#time_id{border-color:transparent;}</style>";
	}
	 
	  if (empty($_POST['hn'])){
		echo "<style text/css>
		#hn_id{border-color:#F00;}</style>";
	}else{
	$_SESSION['hn'] = $_POST['hn'];
		echo "<style text/css>
		#hn_id{border-color:transparent;}</style>";
	}
	
	 if (trim(empty($_POST['strt']))){
		echo "<style text/css>
		#strt_id{border-color:#F00;}</style>";
	}else{
	$_SESSION['strt'] = $_POST['strt'];
		echo "<style text/css>
		#strt_id{border-color:transparent;}</style>";
	}
	
	 if (trim(empty($_POST['brgy']))){
		echo "<style text/css>
		#brgy_id{border-color:#F00;}</style>";
	}else{
	$_SESSION['brgy'] = $_POST['brgy'];
		echo "<style text/css>
		#brgy_id{border-color:transparent;}</style>";
	}
	
	 
	
	if (trim(empty($_POST['involve']))){
		echo "<style text/css>
		#involve_id{border-color:#F00;}</style>";
	}else{
	$_SESSION['involve'] = $_POST['involve'];
		echo "<style text/css>
		#involve_id{border-color:transparent;}</style>";
	}
	
	 if (trim(empty($_POST['investigator']))){
		echo "<style text/css>
		#investigator_id{border-color:#F00;}</style>";
	}else{
	$_SESSION['investigator'] = $_POST['investigator'];
		echo "<style text/css>
		#investigator_id{border-color:transparent;}</style>";
	}
	
	 if (trim(empty($_POST['casualty']))){
		echo "<style text/css>
		#casualty_id{border-color:#F00;}</style>";
	}else{
	$_SESSION['casualty'] = $_POST['casualty'];
		echo "<style text/css>
		#casualty_id{border-color:transparent;}</style>";
	}
	
	 if (trim(empty($_POST['injured']))){
		echo "<style text/css>
		#injured_id{border-color:#F00;}</style>";
	}else{
	$_SESSION['injured'] = $_POST['injured'];
		echo "<style text/css>
		#injured_id{border-color:transparent;}</style>";
	}
	
	 if (trim(empty($_POST['fireout']))){
		echo "<style text/css>
		#fireout_id{border-color:#F00;}</style>";
	}else{
	$_SESSION['fireout'] = $_POST['fireout'];
		echo "<style text/css>
		#fireout_id{border-color:transparent;}</style>";
	}
	
	if (trim(empty($_POST['origin_name']))){
		echo "<style text/css>
		#origin_id{border-color:#F00;}</style>";
	}else{
	$_SESSION['origin_name'] = $_POST['origin_name'];
		echo "<style text/css>
		#origin_id{border-color:transparent;}</style>";
	}
	
	if (trim(empty($_POST['stat']))){
		echo "<style text/css>
		#stat_id{border-color:#F00;}</style>";
	}else{
	$_SESSION['stat'] = $_POST['stat'];
		echo "<style text/css>
		#stat_id{border-color:transparent;}</style>";
	}
	
				mysqli_query( $con," UPDATE recordstbl SET dateandtime = '$_POST[date]', time = '$_POST[timea]', house_no = '$_POST[hn]', street = '$_POST[strt]', barangay = '$_POST[brgy]', involveestablishments = '$_POST[involve]', investigator = '$_POST[investigator]', casualty = '$_POST[casualty]', injured = '$_POST[injured]', fireout = '$_POST[fireout]',  causeoffire = '$_POST[origin_name]', statusofcaseammount = '$_POST[stat]'  WHERE reportno = '$id'");
				
				
				//getting the data of staff/Admin for documenting Log-Reports
			$staff_name = $staff_fname." ".$staff_lname;			
			$activity = "".$staff_name." Edited a Report";
			//Input a Log Event			
			$log_event ="INSERT into log_event (date, time, id, name, position, activity) VALUES (CURDATE(), CURTIME(), '$staff_id', '$staff_name', '$position', '$activity')";		
			if (!mysqli_query($con,$log_event)){
				echo "Error Query insert_log_event";
				}else{
				}
				
			?>
					<script>
                    alert ("Successfully Edited a Record");
					window.location.href="viewreports.php";
                    </script>
                    <?
			
			}
			
			}
	
$sql1= mysqli_query ($con,"select * from recordstbl where reportno = '$id'");
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
         												<li><a href="viewnews.php">News</a></li>
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
          											<li class="active"><a tabindex="-1" href="report.php">Add Report</a></li>
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
 
<h2 class="forms">Edit Report</h2>
</div>

<div class="row">
<div class = "col-sm-2">
</div>

<div class="col-sm-10">
<form class="form-horizontal" method="post" enctype="multipart/form-data">



 <div class="form-group">
<label for="lastname" class="col-sm-2 control-label">Date of Alarm</label>
      						<div class="col-sm-6">
      							<input type="date" class="form-control" id="date_id" name="date" value="<?php echo $sql2 ['dateandtime']  ?>" >
                                <div class="help-block with-errors"><?php echo $errorMessage2;?></div>
                        	</div>
   					 </div>

<div class="form-group">
<label for="lastname" class="col-sm-2 control-label">Time of Alarm</label>
      						<div class="col-sm-6">
      							<input type="time" class="form-control" id="time_id" name="timea" value="<?php echo $sql2 ['time']  ?>" >
                                <div class="help-block with-errors"><?php echo $errorMessage3;?></div>
                        	</div>
   					 </div>
                                                           
 <div class="form-group">
<label for="lastname" class="col-sm-2 control-label">House Number</label>
      						<div class="col-sm-6">
      							<input type="number" class="form-control" id="hn_id" name="hn" value="<?php echo $sql2 ['hn']  ?>" >
                                <div class="help-block with-errors"><?php echo $errorMessage4;?></div>
                        	</div>
   					 </div>
                     
<div class="form-group">
<label for="lastname" class="col-sm-2 control-label">Street</label>
      						<div class="col-sm-6">
      							<input type="text" class="form-control" id="strt_id" name="strt" value="<?php echo $sql2 ['street']  ?>" >
                                <div class="help-block with-errors"><?php echo $errorMessage5;?></div>
                        	</div>
   					 </div>
                     
<div class="form-group">
<label for="lastname" class="col-sm-2 control-label">Barangay</label>
      						<div class="col-sm-6">
<select name="brgy" class="form-control" id="brgy_id">
	<option value="">--Choose--</option>
	<option value="Barangay A">Barangay A</option>
    <option value="Barangay B">Barangay B</option>
    <option value="Barangay C">Barangay C</option>
    <option value="Barangay D">Barangay D</option>
    <option value="Barangay Legaspi">Barangay Legaspi</option>
    <option value="Barangay Amistad">Barangay Amistad</option>
    <option value="Barangay Agno">Barangay Agno</option>
    <option value="Barangay Guzon">Barangay Guzon</option>
    <option value="Barangay Carriedo">Barangay Carriedo</option>
    <option value="Barangay Trenchera">Barangay Trenchera</option>
    <option value="Barangay Libertad">Barangay Libertad</option>
    <option value="Barangay Panganiban">Barangay Panganiban</option>
    <option value="Barangay Magallanes">Barangay Magallanes</option>
    <option value="Barangay Barangobong">Barangay Barangobong</option>
    <option value="Barangay Evangelista">Barangay Evangelista</option>
    <option value="Barangay Toketec">Barangay Toketec</option>
    <option value="Barangay Sto.Domingo">Barangay Sto.Domingo</option>
    <option value="Barangay Lawak">Barangay Lawak</option>
    <option value="Barangay Zamora">Barangay Zamora</option>
    <option value="Barangay Saleng">Barangay Saleng</option>
    <option value="Barangay C.Lichauco">Barangay C.Lichauco</option>
	<?php echo $sql2 ['barangay']  ?>   
    </select></p>
<div class="help-block with-errors"><?php echo $errorMessage6;?></div>
                        	</div>
   					 </div>   
   
     
     
     
     
     <div class="form-group">
<label for="lastname" class="col-sm-2 control-label">Type Of Occupancy</label>
      						<div class="col-sm-6">
                            
	<select name="involve" id="involve_id" class="form-control">
    
	<?php
	$involve = $_POST['involve'];
	$con = mysqli_connect("localhost","root","","firerecords")or die ("Error " .mysqli_error($link));
	$req = mysqli_query($con,"SELECT * from occupancy ORDER BY id ASC");
	if(!$req){
		echo "error required";
	}else{
		while($row = mysqli_fetch_array($req)){
			if (($involve) == ($row['occupancy_name'])){
				echo "<option value=\"".$row["occupancy_name"]."\" selected='selected'>".$row["occupancy_name"]."</option>";
			}else{
				echo "<option value=\"".$row["occupancy_name"]."\">".$row["occupancy_name"]."</option>";
			}
		}
	}
	mysqli_close($con)
	?>  
    </select>
    <div class="help-block with-errors"><?php echo $errorMessage7;?></div>
                        	</div>
   					 </div>
     
     
    

 <div class="form-group">
<label for="lastname" class="col-sm-2 control-label">Investigator</label>
      						<div class="col-sm-6">
                            <select name="investigator" id="investigator_id" class="form-control">
   <?php
  	
	$investigator = $_POST['investigator'];
	$con = mysqli_connect("localhost","root","","firerecords")or die ("Error " .mysqli_error($link));
	$req = mysqli_query($con,"SELECT * from admintbl");
	if(!$req){
		echo "error required";
	}else{
		while($row = mysqli_fetch_array($req)){
			$name = $row['fname']." ".$row['mname']." ".$row['lname'];
			if (($investigator) == ($name)){
				echo "<option value=\"".$name."\" selected='selected'>".$name."</option>";
			}else{
				echo "<option value=\"".$name."\">".$name."</option>";
			}
		}
	}
	mysqli_close($con)
	?>
                          	<?php echo isset($_POST['investigator']) ? htmlspecialchars($_POST['investigator']) : ''; ?>
                            </select>
                                <div class="help-block with-errors"><?php echo $errorMessage8;?></div>
                        	</div>
   					 </div>
      
       
<div class="form-group">
<label for="lastname" class="col-sm-2 control-label">Casualty</label>
      						<div class="col-sm-6">
<input type="number" name="casualty" id="casualty_id" class="form-control" value ="<?php echo $sql2 ['casualty']  ?>"></p>
 <div class="help-block with-errors"><?php echo $errorMessage9;?></div>
                        	</div>
   					 </div>


<div class="form-group">
<label for="lastname" class="col-sm-2 control-label">Injured</label>
      						<div class="col-sm-6">
<input type="number" name="injured" id="injured_id" class="form-control" value ="<?php echo $sql2 ['injured']  ?>"></p>
 <div class="help-block with-errors"><?php echo $errorMessage10;?></div>
                        	</div>
   					 </div>


<div class="form-group">
<label for="lastname" class="col-sm-2 control-label">Fire Out</label>
      						<div class="col-sm-6">
<input type="time" name="fireout" id="fireout_id" class="form-control" value ="<?php echo $sql2 ['fireout']  ?>"></p>
 <div class="help-block with-errors"><?php echo $errorMessage11;?></div>
                        	</div>
   					 </div>
                     
<div class="form-group">
<label for="lastname" class="col-sm-2 control-label">Cause/Origin of Fire and Nature of Case</label>
      						<div class="col-sm-6">
	<select name="origin_name" id="origin_id" class="form-control">
    
     <?php
	$origin_name = $_POST['origin_name'];
	$con = mysqli_connect("localhost","root","","firerecords")or die ("Error " .mysqli_error($link));
	$req = mysqli_query($con,"SELECT * from origin ORDER BY origin_id ASC");
	if(!$req){
		echo "error required";
	}else{
		while($row = mysqli_fetch_array($req)){
			if (($origin_name) == ($row['origin_name'])){
				echo "<option value=\"".$row["origin_name"]."\" selected='selected'>".$row["origin_name"]."</option>";
			}else{
				echo "<option value=\"".$row["origin_name"]."\">".$row["origin_name"]."</option>";
			}
		}
	}
	mysqli_close($con)
	?>
	
    <?php echo isset($_POST['origin_name']) ? htmlspecialchars($_POST['origin_name']) : ''; ?>
    </select>
    <div class="help-block with-errors"><?php echo $errorMessage12;?></div>
                        	</div>
   					 </div>
      
 <div class="form-group">
<label for="lastname" class="col-sm-2 control-label">Status of Case/Amount of Damages</label>
      						<div class="col-sm-6">
<input type="number" name="stat" id="stat_id" class="form-control" value ="<?php echo $sql2 ['stat']  ?>"></p>
 <div class="help-block with-errors"><?php echo $errorMessage13;?></div>
                        	</div>
   					 </div>               


<div class="row">  
<div class="form-group" align="center">
<div class="col-sm-2"></div>
<div class="col-sm-6"><p class="sub"><input type="submit" name="submit" id="subb" value="Submit"> <input type="reset" value="Reset"></p>
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
<div class="alert alert-info col-sm-2" role="alert" style="padding:5px; margin-top:4px" align="center">
  										<a href="viewreports.php" class="alert-link">Back</a>
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
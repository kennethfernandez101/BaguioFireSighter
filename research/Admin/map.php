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

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $position; ?>Untitled Document</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCyUdKdBJqJhBI1tdYZswB9D5NpXTbcuq0&callback=loadMap"
  type="text/javascript"></script>
  
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

<? 
$con = mysqli_connect("localhost","root","","firerecords") or die("Error " . mysqli_error($link));
$sql1 = mysqli_query($con,"SELECT * from hydrant");
$sql2 = mysqli_query($con,"SELECT * from hydrant");
// $start = ("16.0266669,120.7449795");
// $end = ("16.0260283,120.743116");

if(!$sql1&&!$sql2){
}else{
?>  

<script>
         function loadMap(){
			
            var mapProp = {
               center:new google.maps.LatLng(16.026953, 120.745660),
               zoom:18,
               mapTypeId:google.maps.MapTypeId.TERRAIN
            };
			
            
            var map = new google.maps.Map(document.getElementById("map"),mapProp);
			
			
            var myTrip = [
                  new google.maps.LatLng(16.044394, 120.727392),
                  new google.maps.LatLng(16.041653, 120.724721),
                  new google.maps.LatLng(16.036286, 120.725389),
                  new google.maps.LatLng(16.028762, 120.721869),
				  new google.maps.LatLng(16.026778, 120.719380), 
				  new google.maps.LatLng(16.025036, 120.718745), 
				  new google.maps.LatLng(16.022780, 120.718745), 
				  new google.maps.LatLng(16.015314, 120.715998), 
				  new google.maps.LatLng(16.012344, 120.715783), 
				  new google.maps.LatLng(16.007847, 120.718015), 
				  new google.maps.LatLng(16.005372, 120.717543), 
				  new google.maps.LatLng(16.000670, 120.723980), 
				  new google.maps.LatLng(15.981486, 120.758785), 
				  new google.maps.LatLng(16.003310, 120.786680), 
				  new google.maps.LatLng(16.043170, 120.761551),
				  new google.maps.LatLng(16.042221, 120.744857),
				  new google.maps.LatLng(16.044394, 120.727392),
				  
               ];
			   
			   var flightPath = new google.maps.Polygon({
               
                 path:myTrip,
               strokeColor:"#0000FF",
               strokeOpacity:0.8,
               strokeWeight:2,
               fillColor:"#0000FF",
               fillOpacity:0.0
            });
            
            flightPath.setMap(map);
			
			 var myroad = [
                  new google.maps.LatLng(16.023278, 120.747377),
                  new google.maps.LatLng(16.025615, 120.746132),
                  new google.maps.LatLng(16.026357, 120.745875),
                  new google.maps.LatLng(16.029598, 120.745187),
				  
				  
               ];
			   
			   var flightPath = new google.maps.Polyline({
               
                 path:myroad,
               strokeColor:"#FF0000",
               strokeOpacity:0.8,
               strokeWeight:8,
               fillColor:"#0000FF",
               fillOpacity:0.0
            });
            
            flightPath.setMap(map);
			
			 var myway = [
                  new google.maps.LatLng(16.028209, 120.747552),
                  new google.maps.LatLng(16.027693, 120.745594),
              
               ];
			   
			   var flightPath = new google.maps.Polyline({
               
                 path:myway,
               strokeColor:"#FF0000",
               strokeOpacity:0.8,
               strokeWeight:8,
               fillColor:"#0000FF",
               fillOpacity:0.0
            });
            
            flightPath.setMap(map);
			
			var markers = [
			<?php while($row1 = mysqli_fetch_array($sql1)){ 
			 echo"['".$row1['hydrant_name']."', ".$row1['loc_center']."],"; 
			}?>];
			<?
			
	?>
			
			var infoWindowContent = [
			<?php while($row2 = mysqli_fetch_array($sql2)) { 
				echo "['<img src=".$row2['hydrant_img']."  style=".'width="200px"; height="150px";'."><br/>Hydrant Name : ".'<b>'.$row2['hydrant_name'].'</b>'."'+'<br/>'+'Hydrant Place : ".'<b>'.$row2['hydrant_place'].'</b>'."'+'<br/>'],";
			}?>];
			
			
			//displaying the markers and infowindow
		  var infoWindow = new google.maps.InfoWindow(),
        	marker, i;
				for (i = 0; i < markers.length; i++) {
        			var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        			// var image = 'images/airportIcon_red.png';
        				var marker = new google.maps.Marker({
           					position: position,
            				map: map,
            				title: markers[i][0],
            				draggable: false,
        				});
						//POPULATE THE VALUE FROM INFOWINDOW TO TEXTBOXES
						 google.maps.event.addListener(marker, 'click', (function (marker, i) {
							 return function () {
                				infoWindow.setContent(infoWindowContent[i][0]);
                				infoWindow.open(map, marker);
                				var value = $("#prop_type").val();
                    			
							}
        				})(marker, i));
				}
         }
		
		 google.maps.event.addDomListener(window, 'load', loadMap);
		 
      </script>
      <? }?> 
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
         												<li class="active"><a href="map.php">Map</a></li>
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


<div class="container">
<div id = "map" class="embed-responsive embed-responsive-16by9">
</div>
</div>
</div>

<div class="row">
</div>
<div class="container">
<footer>
		<div class="row" style="background:#999;">
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
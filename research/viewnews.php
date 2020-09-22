<?php
session_start();

$con = mysqli_connect("localhost","root","","firerecords") or die("Error " . mysqli_error($link));

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
  </style>
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
                    <a class="navbar-brand" href="bfp.php">Fire Station</a>
    			</div>

						   <div class="collapse navbar-collapse" id="myNavbar">
     				 	   <ul class="nav navbar-nav">
                     				<li><a href="bfp.php">Home</a></li>
        							
                                    <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="viewnews.php" class="active">News &amp; Events
       											<span class="caret"></span></a>
                                            		<ul class="dropdown-menu">
                                                    	<li class="dropdown-header"></li>
         												<li class="active"><a href="viewnews.php">News</a></li>
          												<li class=""><a href="viewevents.php">Events</a>																										                                                        <li>
                                                        </li>
                                                        </li>
                                                        </ul>
                                    
        							<li class=""><a href="as.php">About Us</a></li>
                                    
                                    
                                          						<ul class="nav navbar-nav navbar-right">
        					<li><a href="login_page.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      						</ul>
                                    
                            </div>
</div>
</div>
</header>

<?php 
	$sql1 = mysqli_query($con,"SELECT * FROM newstbl ORDER BY datetime DESC");		
		if(!$sql1){
			echo "No result found";
		}else{
			
			while($row = mysqli_fetch_array($sql1)) {?>
    <!--Content-->
    <div class="row" align="center">
    	<div class="col-sm-12">
        	<h3><?php echo $row['title'];?></h3>
            <h5><?php echo $row['datetime'];?></h5> 
            <img class="img-responsive" src="<?php echo "admin/". $row['image_path'];?>" alt="News" width="400" height="100">
        	<p><?php echo $row['caption']." ";?>
        </div>
    </div>
    <hr/>
    <?php
			}
		}
	?>




</body>


<div class="row">
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

</div>
</html>
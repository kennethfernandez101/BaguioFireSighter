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
                     				<li class="active"><a href="bfp.php">Home</a></li>
        							
                                    <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="viewnews.php" class="active">News &amp; Events
       											<span class="caret"></span></a>
                                            		<ul class="dropdown-menu">
                                                    	<li class="dropdown-header"></li>
         												<li class=""><a href="viewnews.php">News</a></li>
          												<li class=""><a href="viewevents.php">Events</a>																										                                                        <li>
                                                        </li>
                                                        </li>
                                                        </ul>
                                    
        							<li><a href="as.php">About Us</a></li>
                                    
                                    
                                          						<ul class="nav navbar-nav navbar-right">
        					<li><a href="login_page.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      						</ul>
                                    
                            </div>
</div>
</div>
</header>

<div class="container">
<div class="row">
<div class="col-sm-4" style="background-color:#CCC">
<h5>&nbsp;</h5>
<h6>&nbsp;<h6>
<h6>&nbsp;<h6>
<h3 style="text-align:center">VISION</h3>
<p  style="text-align:center">A modern fire service fully capable of ensuring a fire safe nation by 2034.</p>
<h3 style="text-align:center">MISSION</h3>
<p  style="text-align:center">We commit to prevent and suppress destructive fires, investigate its causes,</br> 
enforce fire code and other related laws: respond to man-made </br>
and natural disasters and other emergencies.</br></p>
<h5>&nbsp;</h5>
<h6>&nbsp;<h6>
</div> 

<div class="col-sm-8">
<?php include 'fscarousel.php';?>
</div>
</div>
</div>



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
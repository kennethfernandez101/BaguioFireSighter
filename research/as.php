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

<div class="container" style="">
<div class="row">
<div class = "col-sm-4"  style="background-color:#999">
<h3>Core Value</h3>
<h4>Baguio Fire Station</h4>
<p>We, in the BUREAU OF FIRE AND PROTECTION inspired by </br>
Divine Providence, have the following values</p>
</p>
<p>R - eliability</br>
We serve 24/7.</p>
<p>E - fficiency</br>
We find ways.</p>
<p>S - elflessness</br>
We risk our lives in the professional manner.</p>
<p>P - rofessionalism</br>
We conduct ourselves in the professional manner.</p>
<p>O - neness</br>
We work as a team.</p>
<p>N - ationalism</br>
We contribute in the preservation of our country's gains.</p>
<p>S - ervice</br>
We continually improve our services.</p>
<p>I - ntegrity</br>
We uphold ethical norms and moral standards.</p>
<p>V - ibrancy</br>
We adapt to positive changes.</p>
<p>E - ffectiveness</br>
We do the right things at the right time.</p>

</div>




<div class="col-sm-4" style="background-color:#CCC">
<?php 
	$sql1 = mysqli_query($con,"SELECT * FROM admintbl");		
		if(!$sql1){
			echo "No result found";
		}else{
			
			while($row = mysqli_fetch_array($sql1)) {?>
    <!--Content-->
    <div class="row" align="center">
    	<div class="col-sm-12">
        <img class="img-responsive" src="<?php echo "Admin/". $row['firemenpict'];?>" alt="News" width="100" height="100">
        	 <h3><?php echo $row['fname']." ";?>
            <?php echo $row['mname'];?> 
        	<?php echo $row['lname'];?></h3>
            <p><?php echo $row['rank']." ";?></p>
        </div>
    </div>
    <hr/>
    <?php
			}
		}
	?>

    <hr/>
</div>

<div class="col-sm-4" style="background-color:#666; text-align:center">
<h3>Firefighter's Prayer</h3>
<p>When I am called to duty, God,</br>
wherever flames may range,</br>
give me strength to save some life,</br>
whatever be its age.</br>
help me embrace a little child</br>
before its too late,</br>
or save some older person from,</br>
the horror of that fate.</br>
Enable me to alert,</br>
and hear the weakest shout,</br>
and  quickly and efficiently</br>
to put the fire out.</br>
I want to fill my calling,</br>
and give the best in me,</br>
to guard my every neighbor,</br>
and protect his property.</br>
And if according to my fate</br>
I have to lose my life,</br>
Please bless with your protecting hand,</br>
my family from strike.
</p>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<h1>&nbsp;</h1>
</div>
</div>

</div>
<div>&nbsp;</div>
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
</div>
</body>
</html>
<?php session_start(); 

$errorlog = "";
?>

<?php if (isset($_POST['submit'])){
			
			
		if ((empty($_POST['username']))&&(empty($_POST['password']))){
			echo "<style text/css>
			#username{border-width:medium;background-color:#FC6767}</style>";
			$errorlog = "<span>Input Username and Password</span>";
			echo "<style text/css>
			#password{border-width:medium;background-color:#FC6767}</style>";
		}else{
			if(empty($_POST['username'])){
			echo "<style text/css>
			#username{border-width:medium;background-color:#FC6767}</style>";
			$errorlog = "<span>Input Username</span>";
			}else{
			$username =($_POST['username']);	
			echo "<style text/css>
			#username{background-color:white}</style>";
			$errorlog = "<span></span>";
		}
			
		if(empty($_POST['password'])){
			echo "<style text/css>
			#password{border-width:medium;background-color:#FC6767}</style>";
			$errorlog = "<span>Input Password</span>";
		}else{
			$password = ($_POST['password']);
			echo "<style text/css>
			#password{background-color:white}</style>";
			$errorlog = "<span></span>";
			
			$hashed_password = md5($password);
		}
			
				if((!empty($_POST['username'])) && (!empty($_POST['password']))){
					$con = mysqli_connect("localhost","root","","firerecords") or die("Error " . mysqli_error($link));	
						
							$sql1 = mysqli_query($con,"SELECT * FROM admintbl");
								if(!$sql1){
									echo "No result found";
								}else{
									while($row = mysqli_fetch_array($sql1)){
										$position="Admin";
										if (($username == $row['username']) && ($hashed_password == $row['password']) && ($position ==$row['position']|| "Staff" == $row['position'])){
											
											$_SESSION['staff_id'] = $row['staff_id'];
											$_SESSION['lname'] = $row['lname'];
											$_SESSION['fname'] = $row['fname'];
											$_SESSION['mname'] = $row['mname'];
											$_SESSION['position'] = $row['position'];
											$errorlog = "<span></span>";
											
											?>
											<script>
											alert('Welcome <?php echo $row['fname']." ".$row['lname']; ?>. You are now Logged-In. Have a Great Day ^_^');
											window.location.href = "admin/bfp.php";
											</script>
                                            
											<?
											
											mysqli_close($con);
										}else{
											$errorlog = "<div class='alert alert-danger'>The username or password is incorrect</div>";
											
											echo "<style text/css>
											#password{border-color:#F00;}</style>";
											echo "<style text/css>
											#username{border-color:#F00;}</style>";
					
										}
										
									}
								
						}
				}
		}
			
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
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

<div class="container" style="margin-top:20px;background-position:bottom; background-size:405px; background-image:url(bfplogo.png);background-repeat:no-repeat;opacity:50%">
    
    	<div class="row">
        	<div class="col-sm-12">
            <h1>&nbsp;</h1>
            </div>
        </div>
        
        <div class="row">
        	<div class="col-sm-4">
            </div>
            
            <div class="col-sm-4">
            	
                	<div class="col-sm-12" align="center">
                    	<div class="page-header" >
                        	<h2 style="color:#000" ><span class="glyphicon glyphicon-lock"></span>Login</h2>
                        </div>
                	</div>
                    
                    <div class="col-sm-12">

<form action="login_page.php" method="post" >


                    <div class="col-sm-12" style="color:#000">
                   	  <form role="form" method="post">
            					<div class="form-group">
              						<label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
              						<input type="text" class="form-control" id="username" name="username" placeholder="Enter username" value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>">
           						</div>
<div class="form-group">
              						<label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              						<input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
            					</div>
                                
              					<input type="submit" name="submit" class="btn btn-primary btn-block">
              					 
                    			 
                    				<div class="alert alert-info" role="alert" style="padding:5px; margin-top:4px" align="center">
  										<a href="bfp.php" class="alert-link">Back to Home Page</a>
									</div>

<?php echo $errorlog; ?>

</form>

                    	
          			</form>    
                	</div>
                    
            </div>
            
            <div class="col-sm-4">
            </div>
        </div>
        
        <div class="row">
        	<div class="col-sm-12">
            <h1>&nbsp;</h1>
            </div>
        </div>
    
    </div>
</body>
</html>
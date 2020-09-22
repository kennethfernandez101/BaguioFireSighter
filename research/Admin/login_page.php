<?php session_start(); 

$errorlog = "";
?>

</div><!-- /loginwrap -->
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
			$_SESSION['username'] = $_POST['username'];	
			echo "<style text/css>
			#username{background-color:white}</style>";
			$errorlog = "<span></span>";
			}
			
			if(empty($_POST['password'])){
			echo "<style text/css>
			#password{border-width:medium;background-color:#FC6767}</style>";
			$errorlog = "<span>Input Password</span>";
			}else{
			$_SESSION['password'] = $_POST['password'];	
			echo "<style text/css>
			#password{background-color:white}</style>";
			$errorlog = "<span></span>";
			}
			
				if((!empty($_POST['username'])) && (!empty($_POST['password']))){
					$con = mysqli_connect("localhost","root","","firerecords") or die("Error " . mysqli_error($link));		
		$sql = mysqli_query($con,"SELECT * FROM admintbl");
				if(!$sql){
			echo "No result found";
			
		}else{
			while($row = mysqli_fetch_array($sql)){
				
				
				if (($_POST['username'] == $row['username']) && ($_POST['password'] == $row['password'])){
					?>
					<script>
                    alert ("You are Successfully Logged-in");
					window.location.href="bfp.php";
                    </script>
                    <?
					$errorlog = "<span></span>";
				}else{
					$errorlog = "<span>Username or Password did not match</span>";
					
					echo "<style text/css>
					#password{border-width:medium;background-color:#FC6767}</style>";
					
				}
				mysqli_close($close);
				
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

<div class="headerbackground">

<header>
<div class="logo">
<img src="bfp.png" width="160" height="160"  alt=""/>
</div>

<div class="ht">
<h1 class="title">Tayug Fire Station</h1>
<h2>Bureau of Fire Protection</h2>
</div>


</header>
</div><!-- /headerBackground -->

<div class="loginwrap">

<h1>Login Form</h1>

<form action="login_page.php" method="post" style="background-image:url(../bfp.png)">

<input type="text" name="username" placeholder="Username" id = "username" value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>">
<br/>
<?php echo $errorlog; ?>
<br/>
<input type="password" name="password" placeholder="Password" id="password" >
<br/>
<input type="submit" name="submit" value="Login">

</form>
</div>

</body>
</html>
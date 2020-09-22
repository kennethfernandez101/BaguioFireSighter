<?php 
session_start(); //to ensure you are using same session

$con = mysqli_connect("localhost","root","","firerecords") or die("Error " . mysqli_error($link));							
						
						


?>
			<script>
			//Display an alert box notifying the User that the insertion of data is successful
			window.alert("You are now Logged-out");
			
			window.location.href="../login_page.php"; //to redirect back to "login_page.php" after logging out
						</script>

<?


$_SESSION = array();

// remove all session variables
session_unset(); 

session_destroy(); //destroy the session

exit();

?>
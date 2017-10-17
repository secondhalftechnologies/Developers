<?php session_start();
if(isset($_SESSION['sqyard_user']))
{
		$user 		= $_SESSION['sqyard_user'];
		$userType	= $_SESSION['userType'];
		$ca_id		= $_SESSION['ca_id'];	 
}
else
{
?>
<script type="text/javascript">
alert("Please login with your username and password.");
window.open('index.php','_self');
</script>
<?php
//header('Location:index.php');
}
?>
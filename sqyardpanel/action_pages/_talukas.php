<?php 
include('../access1.php'); 
include('../connection.php');

echo '<option value="" selected disabled>Select here</option>';
if(isset($_POST['tk_dtid'])){
	$tk_dtid = $_POST['tk_dtid'];
	$result = lookup_value('tbl_taluka',array(),array("tk_dtid"=>$tk_dtid),array(),array(),array());

	if($result)
	{
		while ($row = mysqli_fetch_array($result) ) {
			echo '<option value="'.$row['id'].'">'.strtoupper($row['tk_name']).'</option>';
		}
	}
}
?>


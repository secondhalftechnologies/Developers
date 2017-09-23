<?php 
include('../access1.php'); 
include('../connection.php');

echo '<option value="" selected disabled>Select here</option>';
if(isset($_POST['dt_stid'])){
	$dt_stid = $_POST['dt_stid'];
	$result = lookup_value('tbl_district',array(),array("dt_stid"=>$dt_stid),array(),array(),array());

	if($result)
	{
		while ($row = mysqli_fetch_array($result) ) {
			echo '<option value="'.$row['id'].'">'.strtoupper($row['dt_name']).'</option>';
		}
	}
}
?>


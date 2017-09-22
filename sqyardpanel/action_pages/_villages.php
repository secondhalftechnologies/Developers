<?php 
include('../access1.php'); 
include('../connection.php');

echo '<option value="" selected disabled>Select here</option>';
if(isset($_POST['vl_tkid'])){
	$vl_tkid = $_POST['vl_tkid'];
	$result = lookup_value('tbl_village',array(),array("vl_tkid"=>$vl_tkid),array(),array(),array());

	if($result)
	{
		while ($row = mysqli_fetch_array($result) ) {
			echo '<option value="'.$row['id'].'">'.strtoupper($row['vl_name']).'</option>';
		}
	}
}
?>


<?php 
include('../access1.php'); 
include('../connection.php');

echo '<option value="" selected disabled>Select here</option>';

$result = lookup_value('tbl_state',array(),array(),array(),array(),array());
if($result)
{
	// $num    = mysqli_num_rows($result);
	// if($num !=0)
	// {
	// 	$row = mysqli_fetch_array($result);
	// }

	if($result)
	{
		while ($row = mysqli_fetch_array($result) ) {
			echo '<option value="'.$row['id'].'">'.strtoupper($row['st_name']).'</option>';
		}
	}
}
?>


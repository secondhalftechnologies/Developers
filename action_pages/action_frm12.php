<?php 

include('../include/connection.php');
//include('../include/query-helper.php');
include('../include/validate-helper.php');

$table ='tbl_asset_details';
if(isset($_POST['add_asset_detail']) && $_POST['add_asset_detail']==1)
{
	
	$data['fm_id']         				= mysqli_real_escape_string($db_con,$_POST['fm_id']);
	$data['fm_caid']       				= mysqli_real_escape_string($db_con,$_POST['fm_caid']);
	
	$data['f12_TRACTOR']				= mysqli_real_escape_string($db_con,$_POST['f12_TRACTOR']);
	// $data['f12_COMBINE_HARVESTER']		= mysqli_real_escape_string($db_con,$_POST['f12_COMBINE_HARVESTER']);
	// $data['f12_PLOW']					= mysqli_real_escape_string($db_con,$_POST['f12_PLOW']);
	// $data['f12_PLANTER']				= mysqli_real_escape_string($db_con,$_POST['f12_PLANTER']);
	// $data['f12_LOADER']					= mysqli_real_escape_string($db_con,$_POST['f12_LOADER']);
	// $data['f12_BAILER']					= mysqli_real_escape_string($db_con,$_POST['f12_BAILER']);
	// $data['f12_SKID_STEER_LOADER']		= mysqli_real_escape_string($db_con,$_POST['f12_SKID_STEER_LOADER']);
	// $data['f12_MOWER']					= mysqli_real_escape_string($db_con,$_POST['f12_MOWER']);
	// $data['f12_REAPER']					= mysqli_real_escape_string($db_con,$_POST['f12_REAPER']);
	// $data['f12_THRESHING_MACHINE']		= mysqli_real_escape_string($db_con,$_POST['f12_THRESHING_MACHINE']);
	// $data['f12_SEED_DRILL']				= mysqli_real_escape_string($db_con,$_POST['f12_SEED_DRILL']);
	// $data['f12_DISC_HARROW']			= mysqli_real_escape_string($db_con,$_POST['f12_DISC_HARROW']);
	// $data['f12_TRANSPLANTER']			= mysqli_real_escape_string($db_con,$_POST['f12_TRANSPLANTER']);
	// $data['f12_ROLLER']					= mysqli_real_escape_string($db_con,$_POST['f12_ROLLER']);
	// $data['f12_SUBSPOILER']				= mysqli_real_escape_string($db_con,$_POST['f12_SUBSPOILER']);
	// $data['f12_STONE_PICKER']			= mysqli_real_escape_string($db_con,$_POST['f12_STONE_PICKER']);
	// $data['f12_DRILL']					= mysqli_real_escape_string($db_con,$_POST['f12_DRILL']);
	// $data['f12_CONDITIONER']			= mysqli_real_escape_string($db_con,$_POST['f12_CONDITIONER']);
	// $data['f12_CHASER_BIN']				= mysqli_real_escape_string($db_con,$_POST['f12_CHASER_BIN']);
	// $data['f12_STEAM_TRACTOR']			= mysqli_real_escape_string($db_con,$_POST['f12_STEAM_TRACTOR']);
	// $data['f12_HAY_RAKE']				= mysqli_real_escape_string($db_con,$_POST['f12_HAY_RAKE']);
	$data['f12_Sprayer']				= mysqli_real_escape_string($db_con,$_POST['f12_Sprayer']);
	//$data['f12_Rice_Huller']			= mysqli_real_escape_string($db_con,$_POST['f12_Rice_Huller']);
	$data['f12_Pumps']					= mysqli_real_escape_string($db_con,$_POST['f12_Pumps']);
	$data['f12_Protavator']				= mysqli_real_escape_string($db_con,$_POST['f12_Protavator']);
	//$data['f12_Blower']					= mysqli_real_escape_string($db_con,$_POST['f12_Blower']);
	//$data['f12_Cutters']				= mysqli_real_escape_string($db_con,$_POST['f12_Cutters']);
	$data['f12_Cultivators']			= mysqli_real_escape_string($db_con,$_POST['f12_Cultivators']);

	$data['f12_vehicle']   				= mysqli_real_escape_string($db_con,$_POST['f12_vehicle']);
	$data['f12_machinery'] 				= mysqli_real_escape_string($db_con,$_POST['f12_machinery']);
	
	$data['f12_total_val_of_vehical']	= mysqli_real_escape_string($db_con,@$_POST['f12_total_val_of_vehical']);
	$data['f12_total_val_of_machinery']	= mysqli_real_escape_string($db_con,@$_POST['f12_total_val_of_machinery']);
	$data['f12_any_other_assets']		= mysqli_real_escape_string($db_con,@$_POST['f12_any_other_assets']);
	$data['f12_name_of_other_assets']	= mysqli_real_escape_string($db_con,@$_POST['f12_name_of_other_assets']);
	$data['f12_mention_value_of_assets']= mysqli_real_escape_string($db_con,@$_POST['f12_mention_value_of_assets']); 
	
	$data['f12_status']    				= 1;
	$data['f12_section_id']				= '';
	$data['f12_points']    				= mysqli_real_escape_string($db_con,@$_POST['f12_points']);
	
	$data['f12_created_by']				= mysqli_real_escape_string($db_con,@$_POST['fm_caid']);
	$data['f12_created_date']			= $datetime;
	
	if($data['f12_vehicle']!="" &&  $data['f12_machinery'] !="")
	{
		
		$checkExist = checkExist($table,array('fm_id'=>$data['fm_id']),array(),array(),array());
		
		if(!$checkExist)
		{
			$res=insert($table,$data);
			
			
		    $check_pt_exist = checkExist('tbl_points',array('fm_id'=>$data['fm_id']),array(),array(),array());
			if(!$check_pt_exist)
			{
				$pt_data['fm_id']=$data['fm_id'];
			    $pt_data['pt_frm12']=$data['f12_points'];
				$res=insert('tbl_points',$pt_data);
			}
			else
			{
				$pt_data['pt_frm12']=$data['f12_points'];
			    $res=update('tbl_points',$pt_data,array('fm_id'=>$data['fm_id']),array(),array(),array());
			}
		   
		
			quit('Record Submitted Successfully..!',1);
			
		}
		else
		{
			$id =$checkExist['id'];
			
			$res =update($table,$data,array('id'=>$id),array(),array(),array());
			
			$pt_data['pt_frm12'] = $data['f12_points'];
			$res=update('tbl_points',$pt_data,array('fm_id'=>$data['fm_id']),array(),array(),array());
			quit('Record Updated Successfully..!',1);
			
		}
		
	}
	else
	{
		quit('all fields are mandatory');
	}
}


?>
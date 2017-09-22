<?php 

include('../connection.php');

$table ='tbl_asset_details';
if(isset($_POST['add_asset_detail']) && $_POST['add_asset_detail']==1)
{
	
	$data['fm_id']         = mysqli_real_escape_string($db_con,$_POST['fm_id']);
	$data['fm_caid']       = mysqli_real_escape_string($db_con,$_POST['fm_caid']);
	
	$data['f12_vehicle']   = mysqli_real_escape_string($db_con,$_POST['f12_vehicle']);
	$data['f12_machinery'] = mysqli_real_escape_string($db_con,$_POST['f12_machinery']);
	$data['f12_is_immovable']   = mysqli_real_escape_string($db_con,$_POST['f12_is_immovable']);
	$data['f12_immovable_asset'] = mysqli_real_escape_string($db_con,@$_POST['f12_immovable_asset']);
	
	$data['f12_status']    =1;
	$data['f12_section_id']='';
	$data['f12_points']    ='NA';
	
	$data['f12_created_by']= mysqli_real_escape_string($db_con,$_POST['fm_caid']);
	$data['f12_created_date']=$datetime;
	if($data['f12_vehicle']!="" &&  $data['f12_machinery'] !="")
	{
		
		$check_exist = check_exist($table,array('fm_id'=>$data['fm_id']),array(),array(),array());
		
		if(!$check_exist)
		{
			$res=insert($table,$data);
			
			
		    $check_pt_exist = check_exist('tbl_points',array('fm_id'=>$data['fm_id']),array(),array(),array());
			if(!$check_pt_exist)
			{
				$pt_data['fm_id']=$data['fm_id'];
			    $pt_data['pt_frm12']='NA';
				$res=insert('tbl_points',$pt_data);
			}
			else
			{
				$pt_data['pt_frm12']='NA';
			    $res=update('tbl_points',$pt_data,array('fm_id'=>$data['fm_id']),array(),array(),array());
			}
		   
		
			quit('Record Submitted Successfully..!',1);
			
		}
		else
		{
			$id =$check_exist;
			
			$res =update($table,$data,array('id'=>$id),array(),array(),array());
			
			$pt_data['pt_frm12']='NA';
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
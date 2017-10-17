<?php 

include('../include/connection.php');
//include('../include/query-helper.php');
include('../include/validate-helper.php');

$table ='tbl_current_crop_forecast';
if(isset($_POST['add_cur_crop_deatils']) && $_POST['add_cur_crop_deatils']==1)
{
	$data['fm_id']				  = mysqli_real_escape_string($db_con,$_POST['fm_id']);
	$data['fm_caid']		      = mysqli_real_escape_string($db_con,$_POST['fm_caid']);
	$no_of_cur_crop_forecast      = mysqli_real_escape_string($db_con,$_POST['no_of_cur_crop_forecast']);
	$data['f14_points'] 		  = mysqli_real_escape_string($db_con,$_POST['f14_points']);

	$data['f14_status']   		  = 1;
	$data['f14_section_id']		  = '';
	$id                           = $_POST['id'];
	
	
	if($data['fm_id']!="" &&  $data['fm_caid'] !="")
	{
		
		$checkExist = checkExist($table,array('fm_id'=>$data['fm_id']),array(),array(),array());
		
		if(!$checkExist)
		{
			$data['f14_created_by']       = mysqli_real_escape_string($db_con,$_POST['fm_caid']);
	        $data['f14_created_date']     = $datetime;
		
			for($i=1;$i<=$no_of_cur_crop_forecast;$i++)
			{
				$data['f14_crop_type']      		= mysqli_real_escape_string($db_con,$_POST['f14_crop_type'.$i]);
				$data['f14_cultivating']      		= mysqli_real_escape_string($db_con,$_POST['f14_cultivating'.$i]);
				$data['f14_variety']      			= mysqli_real_escape_string($db_con,$_POST['f14_variety'.$i]);
				$data['f14_total_acrage']      		= mysqli_real_escape_string($db_con,$_POST['f14_total_acrage'.$i]);
				
				$data['f14_total_hector']      		= mysqli_real_escape_string($db_con,$_POST['f14_total_hector'.$i]);
				$data['f14_total_acre']      		= mysqli_real_escape_string($db_con,$_POST['f14_total_acre'.$i]);
				$data['f14_total_guntha']      		= mysqli_real_escape_string($db_con,$_POST['f14_total_guntha'.$i]);
				
				$data['f14_expected_yeild']      	= mysqli_real_escape_string($db_con,$_POST['f14_expected_yeild'.$i]);
				$data['f14_seed_type']      		= mysqli_real_escape_string($db_con,$_POST['f14_seed_type'.$i]);
				$data['f14_seed_quantity']      	= mysqli_real_escape_string($db_con,$_POST['f14_seed_quantity'.$i]);
				$data['f14_spend_money']      		= mysqli_real_escape_string($db_con,$_POST['f14_spend_money'.$i]);
				$data['f14_use_self_grown_seeds']   = mysqli_real_escape_string($db_con,$_POST['f14_use_self_grown_seeds'.$i]);
				$data['f14_loan_taken']      		= mysqli_real_escape_string($db_con,$_POST['f14_loan_taken'.$i]);
				if(isset($_POST['f14_loan_amount'.$i]))
				{
					$data['f14_loan_amount']      	= mysqli_real_escape_string($db_con,$_POST['f14_loan_amount'.$i]);
				}
				else
				{
					$data['f14_loan_amount']      	= '';
				}
				
				if(isset($_POST['f14_borrow_loan_from'.$i]))
				{
					$data['f14_borrow_loan_from']   = mysqli_real_escape_string($db_con,$_POST['f14_borrow_loan_from'.$i]);
				}
				else
				{
					$data['f14_borrow_loan_from']   = '';
				}
				$data['f14_diseases']      			= mysqli_real_escape_string($db_con,$_POST['f14_diseases'.$i]);
				$data['f14_water_source_type']      = mysqli_real_escape_string($db_con,$_POST['f14_water_source_type'.$i]);
				$data['f14_harvest_date']      		= mysqli_real_escape_string($db_con,$_POST['f14_harvest_date'.$i]);
				$data['f14_income']     	 		= mysqli_real_escape_string($db_con,$_POST['f14_income'.$i]);
				
				if($data['f14_crop_type'] !="" && $data['f14_income']!="" && $data['f14_diseases']!="" && $data['f14_water_source_type']!="")
				{
					$res=insert($table,$data);
				}
				else
				{
					quit('All fields are required');
				}
			}
			
			$check_pt_exist = checkExist('tbl_points',array('fm_id'=>$data['fm_id']),array(),array(),array());
			if(!$check_pt_exist)
			{
				$pt_data['fm_id']=$data['fm_id'];
				$pt_data['pt_frm14']=$data['f14_points'];
				$res=insert('tbl_points',$pt_data);
			}
			else
			{
				$pt_data['pt_frm14']=$data['f14_points'];
			    $res=update('tbl_points',$pt_data,array('fm_id'=>$data['fm_id']),array(),array(),array());
			}
			quit('Record Submitted Successfully..!',1);
		}
		else
		{
			$del_id=array_values(array_diff($id,array("null","")));
			
			$sql_delete_crops ="DELETE FROM `tbl_current_crop_forecast` WHERE  fm_id ='".$data['fm_id']."' AND id NOT IN (".implode(',',$del_id).")";
			$res_delete_crops = mysqli_query($db_con,$sql_delete_crops) or die(mysqli_error($db_con));
			
			for($i=1;$i<=$no_of_cur_crop_forecast;$i++)
			{
				$data['f14_crop_type']      		= mysqli_real_escape_string($db_con,$_POST['f14_crop_type'.$i]);
				$data['f14_cultivating']      		= mysqli_real_escape_string($db_con,$_POST['f14_cultivating'.$i]);
				$data['f14_variety']      			= mysqli_real_escape_string($db_con,$_POST['f14_variety'.$i]);
				
				$data['f14_total_acrage']      		= mysqli_real_escape_string($db_con,$_POST['f14_total_acrage'.$i]);
				$data['f14_total_hector']      		= mysqli_real_escape_string($db_con,$_POST['f14_total_hector'.$i]);
				$data['f14_total_acre']      		= mysqli_real_escape_string($db_con,$_POST['f14_total_acre'.$i]);
				$data['f14_total_guntha']      		= mysqli_real_escape_string($db_con,$_POST['f14_total_guntha'.$i]);
				
				$data['f14_expected_yeild']      	= mysqli_real_escape_string($db_con,$_POST['f14_expected_yeild'.$i]);
				$data['f14_seed_type']      		= mysqli_real_escape_string($db_con,$_POST['f14_seed_type'.$i]);
				$data['f14_seed_quantity']      	= mysqli_real_escape_string($db_con,$_POST['f14_seed_quantity'.$i]);
				$data['f14_spend_money']      		= mysqli_real_escape_string($db_con,$_POST['f14_spend_money'.$i]);
				$data['f14_use_self_grown_seeds']   = mysqli_real_escape_string($db_con,$_POST['f14_use_self_grown_seeds'.$i]);
				$data['f14_loan_taken']      		= mysqli_real_escape_string($db_con,$_POST['f14_loan_taken'.$i]);
				if(isset($_POST['f14_loan_amount'.$i]))
				{
					$data['f14_loan_amount']      	= mysqli_real_escape_string($db_con,$_POST['f14_loan_amount'.$i]);
				}
				else
				{
					$data['f14_loan_amount']      	= '';
				}
				
				if(isset($_POST['f14_borrow_loan_from'.$i]))
				{
					$data['f14_borrow_loan_from']   = mysqli_real_escape_string($db_con,$_POST['f14_borrow_loan_from'.$i]);
				}
				else
				{
					$data['f14_borrow_loan_from']   = '';
				}
				$data['f14_diseases']      			= mysqli_real_escape_string($db_con,$_POST['f14_diseases'.$i]);
				$data['f14_water_source_type']      = mysqli_real_escape_string($db_con,$_POST['f14_water_source_type'.$i]);
				$data['f14_harvest_date']      		= mysqli_real_escape_string($db_con,$_POST['f14_harvest_date'.$i]);
				$data['f14_income']     	 		= mysqli_real_escape_string($db_con,$_POST['f14_income'.$i]);				
				
				if(isset($id[($i-1)])&&  $id[($i-1)]!="")
				{
					$data['f14_modified_by']   = mysqli_real_escape_string($db_con,$_POST['fm_caid']);
	                $data['f14_modified_date'] = $datetime;
					$res =update($table,$data,array('id'=>$id[($i-1)]),array(),array(),array());
				}
				else
				{
					$data['f14_created_by']       = mysqli_real_escape_string($db_con,$_POST['fm_caid']);
	                $data['f14_created_date']     = $datetime;
					$res=insert($table,$data);
				}
			}
			$pt_data['pt_frm14']=$data['f14_points'];
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
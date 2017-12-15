<?php 

include('../include/connection.php');
//include('../include/query-helper.php');
include('../include/validate-helper.php');

$table ='tbl_loan_details';
if(isset($_POST['add_loan_detail']) && $_POST['add_loan_detail']==1)
{
	$data['fm_id']                        = mysqli_real_escape_string($db_con,$_POST['fm_id']);
	$data['fm_caid']                      = mysqli_real_escape_string($db_con,$_POST['fm_caid']);
	
	//$data['f8_loan_borrowed_from']      = mysqli_real_escape_string($db_con,$_POST['f8_loan_borrowed_from']);
	//$data['f8_any_insurance']           = mysqli_real_escape_string($db_con,$_POST['f8_any_insurance']);
	//$data['f8_reason_for_insurance']    = mysqli_real_escape_string($db_con,$_POST['f8_reason_for_insurance']);
	//$data['f8_insurance_name']          = mysqli_real_escape_string($db_con,$_POST['f8_insurance_name']);
	//$data['f8_other_insurance']         = mysqli_real_escape_string($db_con,$_POST['f8_other_insurance']);
	//$data['f8_prev_loan_details']       = mysqli_real_escape_string($db_con,$_POST['f8_prev_loan_details']);
	//$data['f8_use_of_prev_loan_amount'] = mysqli_real_escape_string($db_con,$_POST['f8_use_of_prev_loan_amount']);
	
	$data['f8_crop_insurance']           = mysqli_real_escape_string($db_con,$_POST['f8_crop_insurance']);
	$data['f8_insurance_amount']         = mysqli_real_escape_string($db_con,$_POST['f8_insurance_amount']);
	$data['f8_insurer_name']             = mysqli_real_escape_string($db_con,$_POST['f8_insurer_name']);
	
	$data['f8_any_subsidies']            = mysqli_real_escape_string($db_con,$_POST['f8_any_subsidies']);
	$data['f8_subsidy_name']             = mysqli_real_escape_string($db_con,$_POST['f8_subsidy_name']);
	$data['f8_any_loan_waivers']         = mysqli_real_escape_string($db_con,$_POST['f8_any_loan_waivers']);
	$data['f8_waiver_name']              = mysqli_real_escape_string($db_con,$_POST['f8_waiver_name']);
	if(isset($_POST['f8_financial_history_points']))
	{
		$data['f8_financial_history_points'] = mysqli_real_escape_string($db_con,$_POST['f8_financial_history_points']);
	}
	else
	{
		$data['f8_financial_history_points'] = 0;
	}
	
	
	$data['f8_status']                   = 1;
	$data['f8_section_id']               = '';
	
	if($data['fm_id']!="" &&  $data['fm_caid'] !="") // && $data['f8_loan_borrowed_from']!="" && $data['f8_any_insurance']!=""
	{
		
		$checkExist = checkExist($table,array('fm_id'=>$data['fm_id']),array(),array(),array());
		

		if(!$checkExist)  /////// When Inserting a new Record 
		{
			$data['f8_created_by']       = mysqli_real_escape_string($db_con,$_POST['fm_caid']);
	        $data['f8_created_date']     = $datetime;
			
			$last_insert_id = insert($table,$data);
			
			$check_pt_exist = checkExist('tbl_points',array('fm_id'=>$data['fm_id']),array(),array(),array());
			if(!$check_pt_exist)
			{
				$pt_data['fm_id']		= $data['fm_id'];
				$pt_data['pt_frm8_fh']	= $data['f8_financial_history_points'];
				$res = insert('tbl_points',$pt_data);
			}
			else
			{
				$pt_data['pt_frm8_fh']	= $data['f8_financial_history_points'];
			    $res = update('tbl_points',$pt_data,array('fm_id'=>$data['fm_id']),array(),array(),array());
			}
			
			quit('Record Submitted Successfully..!',1);
		}
		else
		{
			$id = $checkExist['id'];

			$data['f8_modified_by']       = mysqli_real_escape_string($db_con,$_POST['fm_caid']);
	        $data['f8_modified_date']     = $datetime;
			$res = update($table,$data,array('id'=>$id),array(),array(),array());
		    
			$pt_data['pt_frm8_fh'] = $data['f8_financial_history_points'];
			$res = update('tbl_points',$pt_data,array('fm_id'=>$data['fm_id']),array(),array(),array());
			
			quit('Record Updated Successfully..!',1);
		}
	}
	else
	{
		quit('all fields are mandatory');
	}
}
?>
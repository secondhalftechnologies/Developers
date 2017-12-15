<?php 

include('../include/connection.php');
//include('../include/query-helper.php');
include('../include/validate-helper.php');

$table ='tbl_loan_details';
if(isset($_POST['add_loan_detail']) && $_POST['add_loan_detail']==1)
{
	$data['fm_id']             = mysqli_real_escape_string($db_con,$_POST['fm_id']);
	$data['fm_caid']           = mysqli_real_escape_string($db_con,$_POST['fm_caid']);
	$num_of_loan               = mysqli_real_escape_string($db_con,$_POST['num_of_loan']);
	
	$data['fx_monthly_income'] = mysqli_real_escape_string($db_con,$_POST['fx_monthly_income']);
	$data['f8_loan_taken']     = mysqli_real_escape_string($db_con,$_POST['f8_loan_taken']);
	
	$bank_ids                  = $_POST['id'];
	
	$data['f8_points']         = mysqli_real_escape_string($db_con,$_POST['f8_points']);
	$data['f8_status']         = 1;
	$data['f8_section_id']     = '';
	
	if($data['fm_id']!="" &&  $data['fm_caid'] !="" && $data['fx_monthly_income']!="" && $data['f8_loan_taken']!="")
	{
		
		$checkExist = checkExist($table,array('fm_id'=>$data['fm_id']),array(),array(),array());
		

		if(!$checkExist)  /////// When Inserting a new Record 
		{
			$data['f8_created_by']       = mysqli_real_escape_string($db_con,$_POST['fm_caid']);
	        $data['f8_created_date']     = $datetime;
			
			$last_insert_id = insert($table,$data);
			
			if($num_of_loan!="" && $data['f8_loan_taken']!='no')
			{
				for($i=1; $i<=$num_of_loan; $i++)
				{
					$bank_data['fk_loan_detailsid']   = $last_insert_id;
					$bank_data['f8_loan_type']        = mysqli_real_escape_string($db_con,$_POST['f8_loan_type'.$i]);
					$bank_data['f8_loan_amount']      = mysqli_real_escape_string($db_con,$_POST['f8_loan_amount'.$i]);
					
					$bank_data['f8_loan_provider']    = mysqli_real_escape_string($db_con,$_POST['f8_loan_provider'.$i]);
					//$bank_data['f8_has_loan_matured'] = mysqli_real_escape_string($db_con,$_POST['f8_has_loan_matured'.$i]);
					
					$bank_data['f8_outstanding_loan'] = mysqli_real_escape_string($db_con,$_POST['f8_outstanding_loan'.$i]);
					//$bank_data['f8_remaining_emi']    = mysqli_real_escape_string($db_con,$_POST['f8_remaining_emi'.$i]);
					
					$bank_data['fm_id']               = mysqli_real_escape_string($db_con,$_POST['fm_id']);
					$bank_data['fm_caid']             = mysqli_real_escape_string($db_con,$_POST['fm_caid']);
					
					insert('tbl_bank_loan_detail',$bank_data);
				}
			}
			
			$check_pt_exist = checkExist('tbl_points',array('fm_id'=>$data['fm_id']),array(),array(),array());
			if(!$check_pt_exist)
			{
				$pt_data['fm_id']=$data['fm_id'];
				$pt_data['pt_frm8']=$data['f8_points'];
				$res=insert('tbl_points',$pt_data);
			}
			else
			{
				$pt_data['pt_frm8']=$data['f8_points'];
			    $res=update('tbl_points',$pt_data,array('fm_id'=>$data['fm_id']),array(),array(),array());
			}
			
			quit('Record Submitted Successfully..!',1);
		}
		else
		{
			$id =$checkExist['id'];

			$data['f8_modified_by']       = mysqli_real_escape_string($db_con,$_POST['fm_caid']);
	        $data['f8_modified_date']     = $datetime;
			$res =update($table,$data,array('id'=>$id),array(),array(),array());
		    //quit($id);
			$del_id=array_values(array_diff($bank_ids,array("null","")));
			
			if($data['f8_loan_taken']=="no" && !empty($del_id))
			{
				$sql_delete_crops ="DELETE FROM tbl_bank_loan_detail WHERE  fm_id ='".$data['fm_id']."' AND id  IN (".implode(',',$del_id).")";
			    $res_delete_crops = mysqli_query($db_con,$sql_delete_crops) or die(mysqli_error($db_con));
			}
			
			if(!empty($del_id))
			{
				$sql_delete_crops ="DELETE FROM tbl_bank_loan_detail WHERE  fm_id ='".$data['fm_id']."' AND id NOT IN (".implode(',',$del_id).")";
		        $res_delete_crops = mysqli_query($db_con,$sql_delete_crops) or die(mysqli_error($db_con));
			}
			
			//quit($del_id);	
			
			for($i=1;$i<=$num_of_loan;$i++)
			{
				if(isset($bank_ids[($i-1)])&&  $bank_ids[($i-1)]!="")
				{
					$bank_data['fk_loan_detailsid']     = $id;
					$bank_data['f8_loan_type']          = mysqli_real_escape_string($db_con,$_POST['f8_loan_type'.$i]);
					
					$bank_data['f8_loan_provider']      = mysqli_real_escape_string($db_con,$_POST['f8_loan_provider'.$i]);
					//$bank_data['f8_has_loan_matured'] = mysqli_real_escape_string($db_con,$_POST['f8_has_loan_matured'.$i]);
					
					$bank_data['f8_loan_amount']        = mysqli_real_escape_string($db_con,$_POST['f8_loan_amount'.$i]);
					$bank_data['f8_outstanding_loan']   = mysqli_real_escape_string($db_con,$_POST['f8_outstanding_loan'.$i]);
					//$bank_data['f8_remaining_emi']      = mysqli_real_escape_string($db_con,$_POST['f8_remaining_emi'.$i]);
					
					$bank_data['fm_id']                 = mysqli_real_escape_string($db_con,$_POST['fm_id']);
					$bank_data['fm_caid']               = mysqli_real_escape_string($db_con,$_POST['fm_caid']);
					$res = update('tbl_bank_loan_detail',$bank_data,array('id'=>$bank_ids[($i-1)]),array(),array(),array());
				}
				else
				{
					$bank_data['fk_loan_detailsid']   = $id;
					$bank_data['f8_loan_type']        = mysqli_real_escape_string($db_con,$_POST['f8_loan_type'.$i]);
					
					$bank_data['f8_loan_provider']    = mysqli_real_escape_string($db_con,$_POST['f8_loan_provider'.$i]);
					//$bank_data['f8_has_loan_matured'] = mysqli_real_escape_string($db_con,$_POST['f8_has_loan_matured'.$i]);
					
					$bank_data['f8_loan_amount']      = mysqli_real_escape_string($db_con,$_POST['f8_loan_amount'.$i]);
					$bank_data['f8_outstanding_loan'] = mysqli_real_escape_string($db_con,$_POST['f8_outstanding_loan'.$i]);
					//$bank_data['f8_remaining_emi']    = mysqli_real_escape_string($db_con,$_POST['f8_remaining_emi'.$i]);
					
					insert('tbl_bank_loan_detail',$bank_data);
					
				}
			}
			
			$pt_data['pt_frm8']=$data['f8_points'];
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
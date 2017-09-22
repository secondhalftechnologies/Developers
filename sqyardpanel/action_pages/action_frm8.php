<?php 

include('../connection.php');

$table ='tbl_loan_details';
if(isset($_POST['add_loan_detail']) && $_POST['add_loan_detail']==1)
{
	$data['fm_id']				  = mysqli_real_escape_string($db_con,$_POST['fm_id']);
	$data['fm_caid']		      = mysqli_real_escape_string($db_con,$_POST['fm_caid']);
	$num_of_loan                  = mysqli_real_escape_string($db_con,$_POST['num_of_loan']);
	
	
	$data['fx_monthly_income']      		   = mysqli_real_escape_string($db_con,$_POST['fx_monthly_income']);
	$data['f8_loan_taken']		   			   = mysqli_real_escape_string($db_con,$_POST['f8_loan_taken']);
	$data['f8_private_lenders'] 			   = mysqli_real_escape_string($db_con,$_POST['f8_private_lenders']);
	$data['f8_borrowed_amount']				   = mysqli_real_escape_string($db_con,$_POST['f8_borrowed_amount']);
	$data['f8_borrowed_amount_date'] 		   = mysqli_real_escape_string($db_con,$_POST['f8_borrowed_amount_date']);
	$data['f8_borrowed_outstanding_amount']    = mysqli_real_escape_string($db_con,$_POST['f8_borrowed_outstanding_amount']);
	$data['f8_borrowed_amount_emi'] 		   = mysqli_real_escape_string($db_con,$_POST['f8_borrowed_amount_emi']);
	$data['f8_borrowed_amount_emi_rem']		   = mysqli_real_escape_string($db_con,$_POST['f8_borrowed_amount_emi_rem']);
	$data['f8_borrowed_loan_per']		       = mysqli_real_escape_string($db_con,$_POST['f8_borrowed_loan_per']);
	$data['f8_borrowed_loan_month']            = mysqli_real_escape_string($db_con,$_POST['f8_borrowed_loan_month']);
	$data['f8_borrowed_emi_paid'] 		   	   = mysqli_real_escape_string($db_con,$_POST['f8_borrowed_emi_paid']);
	$data['f8_borrowed_total_amount']		   = mysqli_real_escape_string($db_con,$_POST['f8_borrowed_total_amount']);
	$data['f8_borrowed_total_int']		       = mysqli_real_escape_string($db_con,$_POST['f8_borrowed_total_int']);
	$data['f8_borrowed_outstanding_principal'] = mysqli_real_escape_string($db_con,$_POST['f8_borrowed_outstanding_principal']);
	
	if($data['f8_private_lenders']=='no')
	{
		$data['f8_borrowed_amount']				= '';
		$data['f8_borrowed_amount_date'] 		= '';
		$data['f8_borrowed_outstanding_amount'] = '';
		$data['f8_borrowed_amount_emi'] 		= '';
		$data['f8_borrowed_amount_emi_rem']		= '';
		$data['f8_borrowed_loan_per']		    = '';
		$data['f8_borrowed_loan_month']         = "";
		$data['f8_borrowed_emi_paid'] 		    = "";
		$data['f8_borrowed_total_amount']		= "";
		$data['f8_borrowed_total_int']		    = "";
		$data['f8_borrowed_outstanding_principal']='';
	}
	
	$bank_ids					    = $_POST['id'];
	
	$data['f8_points']    =mysqli_real_escape_string($db_con,$_POST['f8_points']);
	$data['f8_status']    =1;
	$data['f8_section_id']='';
	
	if($data['fm_id']!="" &&  $data['fm_caid'] !="" && $data['fx_monthly_income']!="" && $data['f8_loan_taken']!="")
	{
		
		$check_exist = check_exist($table,array('fm_id'=>$data['fm_id']),array(),array(),array());
		

		if(!$check_exist)  /////// When Inserting a new Record 
		{
			$data['f8_created_by']       = mysqli_real_escape_string($db_con,$_POST['fm_caid']);
	        $data['f8_created_date']     = $datetime;
			
			$last_insert_id = insert($table,$data);
			

			if($num_of_loan!="" && $data['f8_loan_taken']!='no')
			{
				for($i=1;$i<=$num_of_loan;$i++)
				{
					$bank_data['fk_loan_detailsid']  = $last_insert_id;
					$bank_data['f8_loan_type']       = mysqli_real_escape_string($db_con,$_POST['f8_loan_type'.$i]);
					$bank_data['f8_loan_provider']   = mysqli_real_escape_string($db_con,$_POST['f8_loan_provider'.$i]);
					$bank_data['f8_loan_amount']	 = mysqli_real_escape_string($db_con,$_POST['f8_loan_amount'.$i]);
					$bank_data['f8_loan_per']        = mysqli_real_escape_string($db_con,$_POST['f8_loan_per'.$i]);
					$bank_data['f8_loan_months']     = mysqli_real_escape_string($db_con,$_POST['f8_loan_months'.$i]);
					$bank_data['f8_emi_paid']        = mysqli_real_escape_string($db_con,$_POST['f8_emi_paid'.$i]);
					$bank_data['f8_total_amount']    = mysqli_real_escape_string($db_con,$_POST['f8_total_amount'.$i]);
					$bank_data['f8_total_interest']  = mysqli_real_escape_string($db_con,$_POST['f8_total_interest'.$i]);
					$bank_data['f8_loan_emi']        = mysqli_real_escape_string($db_con,$_POST['f8_loan_emi'.$i]);
					$bank_data['f8_outstanding_loan']= mysqli_real_escape_string($db_con,$_POST['f8_outstanding_loan'.$i]);
				    $bank_data['f8_remaining_emi']   = mysqli_real_escape_string($db_con,$_POST['f8_remaining_emi'.$i]);
					$bank_data['fm_id']		 		 = mysqli_real_escape_string($db_con,$_POST['fm_id']);
					$bank_data['fm_caid']  			 = mysqli_real_escape_string($db_con,$_POST['fm_caid']);
					$bank_data['f8_sanction_date']   = mysqli_real_escape_string($db_con,$_POST['f8_sanction_date'.$i]);
					$bank_data['f8_outstanding_principal']   = mysqli_real_escape_string($db_con,$_POST['f8_outstanding_principal'.$i]);
					
					insert('tbl_bank_loan_detail',$bank_data);
				}
			}
			
			$check_pt_exist = check_exist('tbl_points',array('fm_id'=>$data['fm_id']),array(),array(),array());
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
			$id =$check_exist;

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
					$bank_data['fk_loan_detailsid']  = $id;
					$bank_data['f8_loan_type']       = mysqli_real_escape_string($db_con,$_POST['f8_loan_type'.$i]);
					$bank_data['f8_loan_provider']   = mysqli_real_escape_string($db_con,$_POST['f8_loan_provider'.$i]);
					$bank_data['f8_loan_amount']	 = mysqli_real_escape_string($db_con,$_POST['f8_loan_amount'.$i]);
					$bank_data['f8_loan_per']        = mysqli_real_escape_string($db_con,$_POST['f8_loan_per'.$i]);
					$bank_data['f8_loan_months']     = mysqli_real_escape_string($db_con,$_POST['f8_loan_months'.$i]);
					$bank_data['f8_emi_paid']        = mysqli_real_escape_string($db_con,$_POST['f8_emi_paid'.$i]);
					$bank_data['f8_total_amount']    = mysqli_real_escape_string($db_con,$_POST['f8_total_amount'.$i]);
					$bank_data['f8_total_interest']  = mysqli_real_escape_string($db_con,$_POST['f8_total_interest'.$i]);
					$bank_data['f8_loan_emi']        = mysqli_real_escape_string($db_con,$_POST['f8_loan_emi'.$i]);
					$bank_data['f8_outstanding_loan']= mysqli_real_escape_string($db_con,$_POST['f8_outstanding_loan'.$i]);
				    $bank_data['f8_remaining_emi']   = mysqli_real_escape_string($db_con,$_POST['f8_remaining_emi'.$i]);
					$bank_data['f8_sanction_date']   = mysqli_real_escape_string($db_con,$_POST['f8_sanction_date'.$i]);
					$bank_data['f8_outstanding_principal']   = mysqli_real_escape_string($db_con,$_POST['f8_outstanding_principal'.$i]);
					
					
					$bank_data['fm_id']		 		 = mysqli_real_escape_string($db_con,$_POST['fm_id']);
					$bank_data['fm_caid']  			 = mysqli_real_escape_string($db_con,$_POST['fm_caid']);
					$res =update('tbl_bank_loan_detail',$bank_data,array('id'=>$bank_ids[($i-1)]),array(),array(),array());
				}
				else
				{
					$bank_data['fk_loan_detailsid']  = $id;
					$bank_data['f8_loan_type']       = mysqli_real_escape_string($db_con,$_POST['f8_loan_type'.$i]);
					$bank_data['f8_loan_provider']   = mysqli_real_escape_string($db_con,$_POST['f8_loan_provider'.$i]);
					$bank_data['f8_loan_amount']	 = mysqli_real_escape_string($db_con,$_POST['f8_loan_amount'.$i]);
					
					$bank_data['f8_loan_per']        = mysqli_real_escape_string($db_con,$_POST['f8_loan_per'.$i]);
					$bank_data['f8_loan_months']     = mysqli_real_escape_string($db_con,$_POST['f8_loan_months'.$i]);
					$bank_data['f8_emi_paid']        = mysqli_real_escape_string($db_con,$_POST['f8_emi_paid'.$i]);
					$bank_data['f8_total_amount']    = mysqli_real_escape_string($db_con,$_POST['f8_total_amount'.$i]);
					$bank_data['f8_total_interest']  = mysqli_real_escape_string($db_con,$_POST['f8_total_interest'.$i]);
					$bank_data['f8_sanction_date']   = mysqli_real_escape_string($db_con,$_POST['f8_sanction_date'.$i]);
					
					
					$bank_data['f8_loan_emi']        = mysqli_real_escape_string($db_con,$_POST['f8_loan_emi'.$i]);
					$bank_data['f8_outstanding_loan']= mysqli_real_escape_string($db_con,$_POST['f8_outstanding_loan'.$i]);
			       	$bank_data['f8_outstanding_principal']   = mysqli_real_escape_string($db_con,$_POST['f8_outstanding_principal'.$i]);
					$bank_data['f8_remaining_emi']   = mysqli_real_escape_string($db_con,$_POST['f8_remaining_emi'.$i]);
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
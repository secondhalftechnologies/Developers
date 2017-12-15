<?php 

include('../include/connection.php');
//include('../include/query-helper.php');
include('../include/validate-helper.php');

$table ='tbl_yield_details';
if(isset($_POST['add_yield_detail']) && $_POST['add_yield_detail']==1)
{
	$data['fm_id']				  = mysqli_real_escape_string($db_con,$_POST['fm_id']);
	$data['fm_caid']		      = mysqli_real_escape_string($db_con,$_POST['fm_caid']);
	$no_of_yield                  = mysqli_real_escape_string($db_con,$_POST['no_of_yield']);
	$data['f11_points'] 		  = mysqli_real_escape_string($db_con,$_POST['f11_points']);

	$data['f11_status']   		  = 1;
	$data['f11_section_id']		  = '';
	$id                           = $_POST['id'];
	
	
	if($data['fm_id']!="" &&  $data['fm_caid'] !="")
	{
		
		$checkExist = checkExist($table,array('fm_id'=>$data['fm_id']),array(),array(),array());
		
		if(!$checkExist)
		{
			$data['f11_created_by']       = mysqli_real_escape_string($db_con,$_POST['fm_caid']);
	        $data['f11_created_date']     = $datetime;
		
			for($i=1;$i<=$no_of_yield;$i++)
			{
				$data['f11_achieved']      	= mysqli_real_escape_string($db_con,$_POST['f11_achieved'.$i]);
				$data['f11_income']		   	= mysqli_real_escape_string($db_con,$_POST['f11_income'.$i]);
				
				// if(isset($_POST['f11_diseases'.$i]))
				// {
				// 	$data['f11_diseases']      	= mysqli_real_escape_string($db_con,$_POST['f11_diseases'.$i]);
				// }
				// else
				// {
				// 	$data['f11_diseases']      	= '';	
				// }
				//$data['f11_diseases ']                = mysqli_real_escape_string($db_con,$_POST['f11_diseases'.$i]);
				//$data['f11_fertilizers']              = mysqli_real_escape_string($db_con,$_POST['f11_fertilizers'.$i]);
				$data['f11_cultivating']                = mysqli_real_escape_string($db_con,$_POST['f11_cultivating'.$i]);
				$data['f11_consumption_fertilizer']     = mysqli_real_escape_string($db_con,$_POST['f11_consumption_fertilizer'.$i]);
				
				
				$data['f11_spend_money']                = mysqli_real_escape_string($db_con,$_POST['f11_spend_money'.$i]);
				$data['f11_spend_money_fertiliser']     = mysqli_real_escape_string($db_con,$_POST['f11_spend_money_fertiliser'.$i]);
				$data['f11_spend_money_pesticide']      = mysqli_real_escape_string($db_con,$_POST['f11_spend_money_pesticide'.$i]);
				$data['f11_spend_money_labour']         = mysqli_real_escape_string($db_con,$_POST['f11_spend_money_labour'.$i]);
				$data['f11_spend_money_other_expenses'] = mysqli_real_escape_string($db_con,$_POST['f11_spend_money_other_expenses'.$i]);
				$data['f11_spend_money_total']          = mysqli_real_escape_string($db_con,$_POST['f11_spend_money_total'.$i]);
				
				$data['f11_total_profit_gained']        = mysqli_real_escape_string($db_con,$_POST['f11_total_profit_gained'.$i]);
				
				$data['f11_consumption_seeds']          = mysqli_real_escape_string($db_con,$_POST['f11_consumption_seeds'.$i]);
				$data['f11_consumption_pesticides']     = mysqli_real_escape_string($db_con,$_POST['f11_consumption_pesticides'.$i]);
				$data['f11_consumption_other_inputs']   = mysqli_real_escape_string($db_con,$_POST['f11_consumption_other_inputs'.$i]);
				
				
				//$data['f11_damaged_prev_crop']        = mysqli_real_escape_string($db_con,$_POST['f11_damaged_prev_crop'.$i]);
				if(isset($_POST['f11_what_was_the_reason'.$i]))
				{
					$data['f11_what_was_the_reason']	= mysqli_real_escape_string($db_con,$_POST['f11_what_was_the_reason'.$i]);	
				}
				else
				{
					$data['f11_what_was_the_reason']	= '';	
				}
								
				if($data['f11_achieved'] !="" && $data['f11_income']!="") //&& $data['f11_fertilizers']!="" && $data['f11_diseases']!="" 
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
				$pt_data['pt_frm11']=$data['f11_points'];
				$res=insert('tbl_points',$pt_data);
			}
			else
			{
				$pt_data['pt_frm11']=$data['f11_points'];
			    $res=update('tbl_points',$pt_data,array('fm_id'=>$data['fm_id']),array(),array(),array());
			}
			quit('Record Submitted Successfully..!',1);
		}
		else
		{
			$del_id=array_values(array_diff($id,array("null","")));
			
			$sql_delete_crops ="DELETE FROM `tbl_yield_details` WHERE  fm_id ='".$data['fm_id']."' AND id NOT IN (".implode(',',$del_id).")";
			$res_delete_crops = mysqli_query($db_con,$sql_delete_crops) or die(mysqli_error($db_con));
			
			for($i=1;$i<=$no_of_yield;$i++)
			{
				$data['f11_achieved']                   = mysqli_real_escape_string($db_con,$_POST['f11_achieved'.$i]);
				$data['f11_income']                     = mysqli_real_escape_string($db_con,$_POST['f11_income'.$i]);
				//$data['f11_diseases ']                = mysqli_real_escape_string($db_con,$_POST['f11_diseases'.$i]);
				//$data['f11_fertilizers']              = mysqli_real_escape_string($db_con,$_POST['f11_fertilizers'.$i]);
				$data['f11_cultivating']                = mysqli_real_escape_string($db_con,$_POST['f11_cultivating'.$i]);
				$data['f11_consumption_fertilizer']     = mysqli_real_escape_string($db_con,$_POST['f11_consumption_fertilizer'.$i]);
				
				
				$data['f11_spend_money']                = mysqli_real_escape_string($db_con,$_POST['f11_spend_money'.$i]);
				$data['f11_spend_money_fertiliser']     = mysqli_real_escape_string($db_con,$_POST['f11_spend_money_fertiliser'.$i]);
				$data['f11_spend_money_pesticide']      = mysqli_real_escape_string($db_con,$_POST['f11_spend_money_pesticide'.$i]);
				$data['f11_spend_money_labour']         = mysqli_real_escape_string($db_con,$_POST['f11_spend_money_labour'.$i]);
				$data['f11_spend_money_other_expenses'] = mysqli_real_escape_string($db_con,$_POST['f11_spend_money_other_expenses'.$i]);
				$data['f11_spend_money_total']          = mysqli_real_escape_string($db_con,$_POST['f11_spend_money_total'.$i]);
				
				$data['f11_total_profit_gained']        = mysqli_real_escape_string($db_con,$_POST['f11_total_profit_gained'.$i]);
				
				$data['f11_consumption_seeds']          = mysqli_real_escape_string($db_con,$_POST['f11_consumption_seeds'.$i]);
				$data['f11_consumption_pesticides']     = mysqli_real_escape_string($db_con,$_POST['f11_consumption_pesticides'.$i]);
				$data['f11_consumption_other_inputs']   = mysqli_real_escape_string($db_con,$_POST['f11_consumption_other_inputs'.$i]);
				
				
				
				
				//$data['f11_damaged_prev_crop']        = mysqli_real_escape_string($db_con,$_POST['f11_damaged_prev_crop'.$i]);
				if(isset($_POST['f11_what_was_the_reason'.$i]))
				{
					$data['f11_what_was_the_reason']	= mysqli_real_escape_string($db_con,$_POST['f11_what_was_the_reason'.$i]);	
				}
				else
				{
					$data['f11_what_was_the_reason']	= '';	
				}
				
				
				if(isset($id[($i-1)])&&  $id[($i-1)]!="")
				{
					$data['f11_modified_by']   = mysqli_real_escape_string($db_con,$_POST['fm_caid']);
	                $data['f11_modified_date'] = $datetime;
					$res =update($table,$data,array('id'=>$id[($i-1)]),array(),array(),array());
				}
				else
				{
					$data['f11_created_by']       = mysqli_real_escape_string($db_con,$_POST['fm_caid']);
	                $data['f11_created_date']     = $datetime;
					$res=insert($table,$data);
				}
			}
			$pt_data['pt_frm11']=$data['f11_points'];
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
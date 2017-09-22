<?php 

include('../connection.php');

$table ='tbl_land_details';
if(isset($_POST['add_land_detail']) && $_POST['add_land_detail']==1)
{
	$data['fm_id']				  = mysqli_real_escape_string($db_con,$_POST['fm_id']);
	$data['fm_caid']		      = mysqli_real_escape_string($db_con,$_POST['fm_caid']);
	
	$no_of_land                   = mysqli_real_escape_string($db_con,$_POST['no_of_land']);
	
	$id                           = $_POST['id'];
	
	$data['f9_points'] 		      = mysqli_real_escape_string($db_con,$_POST['f9_points']);
	$data['f9_status']    =1;
	$data['f9_section_id']='';
	
	if($data['fm_id']!="" &&  $data['fm_caid'] !="")
	{
		$check_exist = check_exist($table,array('fm_id'=>$data['fm_id']),array(),array(),array());
		
		if(!$check_exist)
		{
			$data['f9_created_by']       = mysqli_real_escape_string($db_con,$_POST['fm_caid']);
	        $data['f9_created_date']     = $datetime;
			
			for($i=1;$i<=$no_of_land;$i++)
			{
				$data['f9_land_size']       = mysqli_real_escape_string($db_con,$_POST['f9_land_size'.$i]);
				$data['f9_owner']			= mysqli_real_escape_string($db_con,$_POST['f9_owner'.$i]);
				$data['f9_lease_year'] 	    = mysqli_real_escape_string($db_con,@$_POST['f9_lease_year'.$i]);
				$data['f9_contract_year'] 	= mysqli_real_escape_string($db_con,@$_POST['f9_contract_year'.$i]);
				if($data['f9_owner']=='Leased')
				{
					$data['f9_contract_year'] 	= '';
				}
				elseif($data['f9_owner']=='Contracted')
				{
					$data['f9_lease_year'] 	= '';
				}
				else
				{
					$data['f9_lease_year'] 	= '';
					$data['f9_contract_year'] 	= '';
				}
				$data['f9_survey_number']   = mysqli_real_escape_string($db_con,$_POST['f9_survey_number'.$i]);
				$data['f9_vilage'] 		    = mysqli_real_escape_string($db_con,$_POST['f9_vilage'.$i]);
				$data['f9_taluka'] 		    = mysqli_real_escape_string($db_con,$_POST['f9_taluka'.$i]);
				$data['f9_district']		= mysqli_real_escape_string($db_con,$_POST['f9_district'.$i]);
				$data['f9_state'] 		    = mysqli_real_escape_string($db_con,$_POST['f9_state'.$i]);
				$data['f9_pincode'] 		= mysqli_real_escape_string($db_con,$_POST['f9_pincode'.$i]);
				$data['f9_soil_tested']     = mysqli_real_escape_string($db_con,$_POST['f9_soil_tested'.$i]);
				$data['f9_soil_type']       = mysqli_real_escape_string($db_con,$_POST['f9_soil_type'.$i]);
				if($data['f9_land_size'] !="" && $data['f9_soil_tested']!="" && $data['f9_soil_type']!="" && $data['fm_id']!="")
				{
					$res=insert($table,$data);
				}
				else
				{
					quit('All fields are required');
				}
			}
			
			$check_pt_exist = check_exist('tbl_points',array('fm_id'=>$data['fm_id']),array(),array(),array());
			if(!$check_pt_exist)
			{
				$pt_data['fm_id']=$data['fm_id'];
				$pt_data['pt_frm9']=$data['f9_points'];
				$res=insert('tbl_points',$pt_data);
			}
			else
			{
				$pt_data['pt_frm9']=$data['f9_points'];
			    $res=update('tbl_points',$pt_data,array('fm_id'=>$data['fm_id']),array(),array(),array());
			}
			
			quit('Record Submitted Successfully..!',1);
		}
		else
		{
			//======Start : To Delete removed forms===================//
		    $del_id=array_values(array_diff($id,array("null","")));// to remove blank values
			if(!empty($del_id))
			{
				$sql_delete_crops ="DELETE FROM `tbl_land_details` WHERE  fm_id ='".$data['fm_id']."' AND id NOT IN (".implode(',',$del_id).")";
		    	$res_delete_crops = mysqli_query($db_con,$sql_delete_crops) or die(mysqli_error($db_con));
			}
			
			//======End : To Delete removed forms===================//
			
			for($i=1;$i<=$no_of_land;$i++)
			{
				$data['f9_land_size']       = mysqli_real_escape_string($db_con,$_POST['f9_land_size'.$i]);
				$data['f9_owner']			= mysqli_real_escape_string($db_con,$_POST['f9_owner'.$i]);
				$data['f9_lease_year'] 	    = mysqli_real_escape_string($db_con,@$_POST['f9_lease_year'.$i]);
				$data['f9_contract_year'] 	= mysqli_real_escape_string($db_con,@$_POST['f9_contract_year'.$i]);
				if($data['f9_owner']=='Leased')
				{
					$data['f9_contract_year'] 	= '';
				}
				elseif($data['f9_owner']=='Contracted')
				{
					$data['f9_lease_year'] 	= '';
				}
				else
				{
					$data['f9_lease_year'] 	= '';
					$data['f9_contract_year'] 	= '';
				}
				$data['f9_survey_number']   = mysqli_real_escape_string($db_con,$_POST['f9_survey_number'.$i]);
				$data['f9_vilage'] 		    = mysqli_real_escape_string($db_con,$_POST['f9_vilage'.$i]);
				$data['f9_taluka'] 		    = mysqli_real_escape_string($db_con,$_POST['f9_taluka'.$i]);
				$data['f9_district']		= mysqli_real_escape_string($db_con,$_POST['f9_district'.$i]);
				$data['f9_state'] 		    = mysqli_real_escape_string($db_con,$_POST['f9_state'.$i]);
				$data['f9_pincode'] 		= mysqli_real_escape_string($db_con,$_POST['f9_pincode'.$i]);
				$data['f9_soil_tested']     = mysqli_real_escape_string($db_con,$_POST['f9_soil_tested'.$i]);
				$data['f9_soil_type']       = mysqli_real_escape_string($db_con,$_POST['f9_soil_type'.$i]);
				
				if(isset($id[($i-1)])&&  $id[($i-1)]!="")
				{
					$data['f9_modified_by']       = mysqli_real_escape_string($db_con,$_POST['fm_caid']);
	                $data['f9_modified_date']     = $datetime;
					$res =update($table,$data,array('id'=>$id[($i-1)]),array(),array(),array());
				}
				else////////////////=========== if new record added===========//////////////
				{
					$data['f9_created_by']       = mysqli_real_escape_string($db_con,$_POST['fm_caid']);
	                $data['f9_created_date']     = $datetime;
					$res=insert($table,$data);
				}
			}
			
			$pt_data['pt_frm9']=$data['f9_points'];
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
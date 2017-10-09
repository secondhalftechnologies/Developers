<?php
	include('access1.php'); 
	include('include/connection.php');
	include('include/query-helper.php');
	
	$fm_caid   	= $_SESSION['ca_id'];
	$fm_caname  = $_SESSION['acrefin_user'];

	if((isset($obj->load_dist)) == '1' && (isset($obj->load_dist)))
	{
		$stateId		= $obj->stateVal;
		$stateParameter	= $obj->stateParameter;
		$distId			= $obj->distId;
		$talId   		= $obj->talId;
		$villageId 		= $obj->villageId;
		$distDivId		= $obj->distDivId;
		$talDivId		= $obj->talDivId;
		$VillageDivId	= $obj->VillageDivId;
 		$data			= '';
		
		$data	.= '<select id="'.$distId.'" name="'.$distId.'" class="select2-me input-large" onChange="getTal(\''.$stateParameter.'\', this.value, \''.$talId.'\', \''.$villageId.'\', \''.$talDivId.'\', \''.$VillageDivId.'\');" >';
			if($stateId != '')
			{
				$data	.= '<option value="" disabled selected>Select District</option>';
				$res_get_dist	= lookup_value('tbl_district',array(),array("dt_stid"=>$stateId),array(),array(),array());
				if($res_get_dist)
				{
					while ($row = mysqli_fetch_array($res_get_dist)) 
					{
						$data	.= '<option value="'.$row['id'].'">'.strtoupper($row['dt_name']).'</option>';
					}
				}
				else
				{
					$data	.= '<option value="" disabled selected>No Match Found</option>';	
				}
			}
			else
			{
				$data	.= '<option value="" disabled selected>No Match Fund</option>';	
			}
		$data	.= '</select>';
		
		quit(utf8_encode($data), 1);	
	}
	
	if((isset($obj->load_tal)) == '1' && (isset($obj->load_tal)))
	{
		$distId			= $obj->distVal;
		$distParameter	= $obj->distParameter;
		$talId 			= $obj->talId;
		$villageId 		= $obj->villageId;
		$talDivId		= $obj->talDivId;
		$VillageDivId	= $obj->VillageDivId;
		$data			= '';
		
		$data	.= '<select id="'.$talId.'" name="'.$talId.'" class="select2-me input-large" onChange="getVillage(\''.$distParameter.'\', this.value, \''.$villageId.'\', \''.$VillageDivId.'\');" >';
			if($distId != '')
			{
				$data	.= '<option value="" disabled selected>Select Taluka</option>';
				$res_get_tal	= lookup_value('tbl_taluka',array(),array("tk_dtid"=>$distId),array(),array(),array());
				if($res_get_tal)
				{
					while ($row = mysqli_fetch_array($res_get_tal)) 
					{
						$data	.= '<option value="'.$row['id'].'">'.strtoupper($row['tk_name']).'</option>';
					}
				}
				else
				{
					$data	.= '<option value="" disabled selected>No Match Found</option>';	
				}
			}
			else
			{
				$data	.= '<option value="" disabled selected>No Match Fund</option>';	
			}
		$data	.= '</select>';
		
		quit(utf8_encode($data), 1);	
	}
	
	if((isset($obj->load_village)) == '1' && (isset($obj->load_village)))
	{
		$talId			= $obj->talVal;
		$talParameter	= $obj->talParameter;
		$villageId 		= $obj->villageId;
		$data			= '';
		
		$data	.= '<select id="'.$villageId.'" name="'.$villageId.'" class="select2-me input-large" >';
			if($talId != '')
			{
				$data	.= '<option value="" disabled selected>Select Village</option>';
				$res_get_village	= lookup_value('tbl_village',array(),array("vl_tkid"=>$talId),array(),array(),array());
				if($res_get_village)
				{
					while ($row = mysqli_fetch_array($res_get_village)) 
					{
						$data	.= '<option value="'.$row['id'].'">'.strtoupper($row['vl_name']).'</option>';
					}
				}
				else
				{
					$data	.= '<option value="" disabled selected>No Match Found</option>';	
				}
			}
			else
			{
				$data	.= '<option value="" disabled selected>No Match Fund</option>';	
			}
		$data	.= '</select>';
		
		quit(utf8_encode($data), 1);	
	}
	
	if(isset($_POST['hid_farmer_reg']) && $_POST['hid_farmer_reg'] == '1')
	{
		$fm_aadhar	= mysqli_real_escape_string($db_con,$_POST['fm_aadhar']);
		$sql_adhnocheck		= " select * from tbl_farmers where fm_aadhar = '".$fm_aadhar."' ";
		$res_adhnocheck  	= mysqli_query($db_con,$sql_adhnocheck);
		$tot_adhnocheck 	= mysqli_num_rows($res_adhnocheck);
		
		if($tot_adhnocheck == 0)
		{
			$txt_name				= mysqli_real_escape_string($db_con,$_POST['txt_name']);
			$txt_father_name		= mysqli_real_escape_string($db_con,$_POST['txt_father_name']);
			$txt_mother_name		= mysqli_real_escape_string($db_con,$_POST['txt_mother_name']);
			$txt_dob				= mysqli_real_escape_string($db_con,$_POST['txt_dob']);
			$txt_age				= mysqli_real_escape_string($db_con,$_POST['txt_age']);
			$fm_mobileno			= mysqli_real_escape_string($db_con,$_POST['fm_mobileno']);
			$alt_mobileno			= mysqli_real_escape_string($db_con,$_POST['alt_mobileno']);
			$txt_farm_experience	= mysqli_real_escape_string($db_con,$_POST['txt_farm_experience']);
			$ddl_married_status		= mysqli_real_escape_string($db_con,$_POST['ddl_married_status']);
			$ddl_residence_status	= mysqli_real_escape_string($db_con,$_POST['ddl_residence_status']);
			$txt_rent				= mysqli_real_escape_string($db_con,$_POST['txt_rent']);
			$txt_p_house_no			= mysqli_real_escape_string($db_con,$_POST['txt_p_house_no']);
			$txt_c_house_no			= mysqli_real_escape_string($db_con,$_POST['txt_c_house_no']);
			$txt_p_street_name		= mysqli_real_escape_string($db_con,$_POST['txt_p_street_name']);
			$txt_c_street_name		= mysqli_real_escape_string($db_con,$_POST['txt_c_street_name']);
			$txt_p_area_name		= mysqli_real_escape_string($db_con,$_POST['txt_p_area_name']);
			$txt_c_area_name		= mysqli_real_escape_string($db_con,$_POST['txt_c_area_name']);
			$ddl_p_state			= mysqli_real_escape_string($db_con,$_POST['ddl_p_state']);
			$ddl_c_state			= mysqli_real_escape_string($db_con,$_POST['ddl_c_state']);
			$ddl_p_dist				= mysqli_real_escape_string($db_con,$_POST['ddl_p_dist']);
			$ddl_c_dist				= mysqli_real_escape_string($db_con,$_POST['ddl_c_dist']);
			$ddl_p_tal				= mysqli_real_escape_string($db_con,$_POST['ddl_p_tal']);
			$ddl_c_tal				= mysqli_real_escape_string($db_con,$_POST['ddl_c_tal']);
			$ddl_p_village			= mysqli_real_escape_string($db_con,$_POST['ddl_p_village']);
			$ddl_c_village			= mysqli_real_escape_string($db_con,$_POST['ddl_c_village']);
			$txt_p_pincode			= mysqli_real_escape_string($db_con,$_POST['txt_p_pincode']);
			$txt_c_pincode			= mysqli_real_escape_string($db_con,$_POST['txt_c_pincode']);
			
			//$hid_frm_reg_points 			= mysqli_real_escape_string($db_con,$_POST['hid_frm_reg_points']);
            $hid_residence_points 			= mysqli_real_escape_string($db_con,$_POST['hid_residence_points']);
            $hid_personal_details_points 	= mysqli_real_escape_string($db_con,$_POST['hid_personal_details_points']);
			$f3_married_reg_points			= mysqli_real_escape_string($db_con,$_POST['f3_married_reg_points']);
			
			
			$ipaddress				= $_SERVER['REMOTE_ADDR'];
			
			$sql_fm_id	= mysqli_query($db_con,"select fm_id from tbl_farmers order by id desc limit 0,1");
			$res_fm_id	= mysqli_fetch_array($sql_fm_id);
			$fm_id		= $res_fm_id['fm_id'];
			if($fm_id == '')
			{
				$fm_id	= 100000;
			}
			else
			{
				$fm_id	= $fm_id + 1;
			}
			
			if($txt_name != '' && $fm_mobileno != '' && $fm_aadhar != '')
			{
				// Query for inserting the farmer into tbl_farmers table
				$sql_insert_farmer	= " INSERT INTO `tbl_farmers`(`fm_caid`, `fm_id`, `fm_name`, `fm_aadhar`, `fm_mobileno`, ";
				$sql_insert_farmer	.= " `fm_status`, `fm_createddt`, `fm_createdby`) ";
				$sql_insert_farmer	.= " VALUES ('".$fm_caid."', '".$fm_id."', '".$txt_name."', '".$fm_aadhar."', ";
				$sql_insert_farmer	.= " '".$fm_mobileno."', '1', '".$datetime."', '".$fm_caname."') ";
				$res_insert_farmer	= mysqli_query($db_con, $sql_insert_farmer) or die(mysqli_error($db_con));
				if($res_insert_farmer)
				{
					// Query for inserting the farmer personal details into tbl_personal_detail
					$sql_insert_farmer_details	= " INSERT INTO `tbl_personal_detail`(`fm_caid`, `fm_id`, `f1_mfname`, ";
					$sql_insert_farmer_details	.= " `f1_father`, `f1_age`, `f1_dob`, `f1_mobno`, `f1_altno`, ";
					$sql_insert_farmer_details	.= " `f1_expfarm`, `f1_status`, `f1_created_date`, `f1_created_by`, `f1_points`) ";
					$sql_insert_farmer_details	.= " VALUES ('".$fm_caid."', '".$fm_id."', '".$txt_mother_name."', ";
					$sql_insert_farmer_details	.= " '".$txt_father_name."', '".$txt_age."', '".$txt_dob."', '".$fm_mobileno."', ";
					$sql_insert_farmer_details	.= " '".$alt_mobileno."', '".$txt_farm_experience."', '1', '".$datetime."', '".$fm_caname."', ";
					$sql_insert_farmer_details	.= " '".$hid_personal_details_points."') ";
					$res_insert_farmer_details	= mysqli_query($db_con, $sql_insert_farmer_details) or die(mysqli_error($db_con));
					
 					if($res_insert_farmer_details)
					{
						// Query for inserting the married status in tbl_spouse_details
						$sql_insert_farmer_IsMarried	= " INSERT INTO `tbl_spouse_details`(`fm_caid`, `fm_id`, `f3_married`, ";
						$sql_insert_farmer_IsMarried	.= " `f3_created_date`, `f3_created_by`, `f3_married_reg_points`) ";
						$sql_insert_farmer_IsMarried	.= " VALUES ('".$fm_caid."', '".$fm_id."', '".$ddl_married_status."', ";
						$sql_insert_farmer_IsMarried	.= " '".$datetime."', '".$fm_caname."', '".$f3_married_reg_points."') ";
						$res_insert_farmer_IsMarried	=mysqli_query($db_con, $sql_insert_farmer_IsMarried) or die(mysqli_error($db_con));
						
						if($res_insert_farmer_IsMarried)
						{
							// Query For inserting the recidencial data into tbl_residence_details
							$sql_insert_farmer_address	= " INSERT INTO `tbl_residence_details`(`fm_caid`, `fm_id`, `f7_resistatus`, ";
							$sql_insert_farmer_address	.= " `f7_phouse`, `f7_pstreet`, `f7_parea`, `f7_pstate`, `f7_pdistrict`, ";
							$sql_insert_farmer_address	.= " `f7_ptaluka`, `f7_pvillage`, `f7_ppin`, `f7_chouse`, `f7_cstreet`, ";
							$sql_insert_farmer_address	.= " `f7_carea`, `f7_cstate`, `f7_cdistrict`, `f7_ctaluka`, `f7_cvillage`, ";
							$sql_insert_farmer_address	.= " `f7_cpin`, `f7_created_date`, `f7_created_by`, `f7_reg_points`) ";
							$sql_insert_farmer_address	.= " VALUES ('".$fm_caid."', '".$fm_id."', '".$ddl_residence_status."', ";
							$sql_insert_farmer_address	.= " '".$txt_p_house_no."', '".$txt_p_street_name."', '".$txt_p_area_name."', ";
							$sql_insert_farmer_address	.= " '".$ddl_p_state."', '".$ddl_p_dist."', '".$ddl_p_tal."', '".$ddl_p_village."', ";
							$sql_insert_farmer_address	.= " '".$txt_p_pincode."', '".$txt_c_house_no."', '".$txt_c_street_name."', ";
							$sql_insert_farmer_address	.= " '".$txt_c_area_name."', '".$ddl_c_state."', '".$ddl_c_dist."', '".$ddl_c_tal."', ";
							$sql_insert_farmer_address	.= " '".$ddl_c_village."', '".$txt_c_pincode."', '".$datetime."', '".$fm_caname."', ";
							$sql_insert_farmer_address	.= " '".$hid_residence_points."') ";
							$res_insert_farmer_address	= mysqli_query($db_con, $sql_insert_farmer_address) or die(mysqli_error($db_con));
							
							if($res_insert_farmer_address)
							{
								// Query for inserting the record for Points of the f1 and f7
								$sql_insert_points	= " INSERT INTO `tbl_points`(`fm_id`, `pt_frm1`, `pt_frm7`, `pt_frm3`) ";
								$sql_insert_points	.= " VALUES ('".$fm_id."', '".$hid_personal_details_points."', '".$hid_residence_points."', '".$f3_married_reg_points."') ";
								$res_insert_points	= mysqli_query($db_con, $sql_insert_points) or die(mysqli_error($db_con));
								
								if($res_insert_points)
								{
									quit('Success', 1);
								}
								else
								{
									quit('Insertion Error, Please try after sometime');		
								}
							}
							else
							{
								quit('Insertion Error, Please try after sometime');			
							}
						}
						else
						{
							quit('Insertion Error, Please try after sometime');	
						}
					}
					else
					{
						quit('Insertion Error, Please try after sometime');	
					}
				}
				else
				{
					quit('Insertion Error, Please try after sometime');	
				}
			}
			else
			{
				quit('Name, Aadhar no, Mobile no cannot be blank!!!');	
			}
		}
		else
		{
			quit('Aadhar no already in use!!!');	
		}
	}
?>
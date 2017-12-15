<?php
	include('access1.php'); 
	include('include/connection.php');
	include('include/query-helper.php');
	include('include/pagination-helper.php');
	
	$fm_caid   	= $_SESSION['ca_id'];
	$fm_caname  = $_SESSION['sqyard_user'];

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
			
			$f1_any_other_occupation= mysqli_real_escape_string($db_con,$_POST['f1_any_other_occupation']);
			$f1_occupation_amt		= mysqli_real_escape_string($db_con,$_POST['f1_occupation_amt']);

			 $f1_required_loan		= mysqli_real_escape_string($db_con,$_POST['f1_required_loan']);
			 $f1_required_loan_amt	= mysqli_real_escape_string($db_con,$_POST['f1_required_loan_amt']);
			 $f1_loan_purpose		= mysqli_real_escape_string($db_con,$_POST['f1_loan_purpose']);
			 $f1_crop_cycle			= mysqli_real_escape_string($db_con,$_POST['f1_crop_cycle']);
			
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
					$sql_insert_farmer_details	.= " `f1_expfarm`, `f1_status`, `f1_created_date`, `f1_created_by`, `f1_points`, ";
					$sql_insert_farmer_details	.= " `f1_required_loan`, `f1_required_loan_amt`, `f1_loan_purpose`, `f1_crop_cycle`, ";
					$sql_insert_farmer_details	.= " `f1_any_other_occupation`, `f1_occupation_amt`) ";
					$sql_insert_farmer_details	.= " VALUES ('".$fm_caid."', '".$fm_id."', '".$txt_mother_name."', ";
					$sql_insert_farmer_details	.= " '".$txt_father_name."', '".$txt_age."', '".$txt_dob."', '".$fm_mobileno."', ";
					$sql_insert_farmer_details	.= " '".$alt_mobileno."', '".$txt_farm_experience."', '1', '".$datetime."', '".$fm_caname."', ";
					$sql_insert_farmer_details	.= " '".$hid_personal_details_points."', ";
					$sql_insert_farmer_details	.= " '".$f1_required_loan."', '".$f1_required_loan_amt."', '".$f1_loan_purpose."', '".$f1_crop_cycle."', ";
					$sql_insert_farmer_details	.= " '".$f1_any_other_occupation."', '".$f1_occupation_amt."' ) ";
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
							$sql_insert_farmer_address	= " INSERT INTO `tbl_residence_details`(`fm_caid`, `fm_id`, `f7_resistatus`, `f7_rent_amount`, ";
							$sql_insert_farmer_address	.= " `f7_phouse`, `f7_pstreet`, `f7_parea`, `f7_pstate`, `f7_pdistrict`, ";
							$sql_insert_farmer_address	.= " `f7_ptaluka`, `f7_pvillage`, `f7_ppin`, `f7_chouse`, `f7_cstreet`, ";
							$sql_insert_farmer_address	.= " `f7_carea`, `f7_cstate`, `f7_cdistrict`, `f7_ctaluka`, `f7_cvillage`, ";
							$sql_insert_farmer_address	.= " `f7_cpin`, `f7_created_date`, `f7_created_by`, `f7_reg_points`) ";
							$sql_insert_farmer_address	.= " VALUES ('".$fm_caid."', '".$fm_id."', '".$ddl_residence_status."', '".$txt_rent."', ";
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
	
	if(isset($_POST['hid_farmer_edit']) && $_POST['hid_farmer_edit'] == '1')
	{
		$hid_fm_id				= mysqli_real_escape_string($db_con,$_POST['hid_fm_id']);
		
		$fm_aadhar	= mysqli_real_escape_string($db_con,$_POST['fm_aadhar']);
		$sql_adhnocheck		= " select * from tbl_farmers where fm_aadhar = '".$fm_aadhar."' AND fm_id != '".$hid_fm_id."' ";
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
			
			$f1_any_other_occupation= mysqli_real_escape_string($db_con,$_POST['f1_any_other_occupation']);
			if(isset($_POST['f1_occupation_amt']))
			{
				$f1_occupation_amt	= mysqli_real_escape_string($db_con,$_POST['f1_occupation_amt']);
			}
			else
			{
				$f1_occupation_amt	= '';	
			}

			 $f1_required_loan		= mysqli_real_escape_string($db_con,$_POST['f1_required_loan']);
			 $f1_required_loan_amt	= mysqli_real_escape_string($db_con,$_POST['f1_required_loan_amt']);
			 if(isset($_POST['f1_loan_purpose']))
		     {
			 	$f1_loan_purpose		= mysqli_real_escape_string($db_con,$_POST['f1_loan_purpose']);	
			 }
			 else
			 {
			 	$f1_loan_purpose		= '';
			 }
			
			 if(isset($_POST['f1_crop_cycle']))
			 {
			 	$f1_crop_cycle			= mysqli_real_escape_string($db_con,$_POST['f1_crop_cycle']);
			 }
			 else
			 {
			 	$f1_crop_cycle	= '';		
			 }

			
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
			
			if($txt_name != '' && $fm_mobileno != '' && $fm_aadhar != '')
			{
				// Query for Updating the farmer into tbl_farmers table
				$sql_update_farmer	= " UPDATE `tbl_farmers` ";
				$sql_update_farmer	.= " 	SET `fm_name`='".$txt_name."', ";
				$sql_update_farmer	.= " 		`fm_aadhar`='".$fm_aadhar."', ";
				$sql_update_farmer	.= " 		`fm_mobileno`='".$fm_mobileno."', ";
				$sql_update_farmer	.= " 		`fm_status`='1', ";
				$sql_update_farmer	.= " 		`fm_modifieddt`='".$datetime."', ";
				$sql_update_farmer	.= " 		`fm_modifiedby`='".$fm_caname."' ";
				$sql_update_farmer	.= " WHERE `fm_id`='".$hid_fm_id."' ";
				$res_update_farmer	= mysqli_query($db_con, $sql_update_farmer) or die(mysqli_error($db_con));
				
				if($res_update_farmer)
				{
					// Query For getting the Farmer Info
					$sql_get_farmer_info	= " SELECT * FROM `tbl_farmers` WHERE `fm_id`='".$hid_fm_id."' ";
					$res_get_farmer_info	= mysqli_query($db_con, $sql_get_farmer_info) or die(mysqli_error($db_con));
					$row_get_farmer_info	= mysqli_fetch_array($res_get_farmer_info);
					
					$fm_caid	= $row_get_farmer_info['fm_caid'];
					
					// Query for Checking the User
					$sql_chk_farmer	= " SELECT * FROM `tbl_personal_detail` WHERE `fm_id`='".$hid_fm_id."' ";
					$res_chk_farmer	= mysqli_query($db_con, $sql_chk_farmer) or die(mysqli_error($db_con));
					$num_chk_farmer	= mysqli_num_rows($res_chk_farmer);
					
					$res_update_farmer_details	= 'false';
					
					if($num_chk_farmer != 0)
					{
						// Query for updating the farmer personal details into tbl_personal_detail
						$sql_update_farmer_details   = " UPDATE `tbl_personal_detail` ";
						$sql_update_farmer_details   .= " 	SET `f1_mfname`='".$txt_mother_name."', ";
						$sql_update_farmer_details   .= " 		`f1_father`='".$txt_father_name."', ";
						$sql_update_farmer_details   .= " 		`f1_age`='".$txt_age."', ";
						$sql_update_farmer_details   .= " 		`f1_dob`='".$txt_dob."', ";
						$sql_update_farmer_details   .= " 		`f1_mobno`='".$fm_mobileno."', ";
						$sql_update_farmer_details   .= " 		`f1_altno`='".$alt_mobileno."', ";
						$sql_update_farmer_details   .= " 		`f1_expfarm`='".$txt_farm_experience."', ";
						$sql_update_farmer_details   .= " 		`f1_any_other_occupation`='".$f1_any_other_occupation."', ";
						$sql_update_farmer_details   .= " 		`f1_occupation_amt`='".$f1_occupation_amt."', ";
						$sql_update_farmer_details .= " 		`f1_required_loan`='".$f1_required_loan."', ";
						$sql_update_farmer_details .= " 		`f1_required_loan_amt`='".$f1_required_loan_amt."', ";
						$sql_update_farmer_details .= " 		`f1_loan_purpose`='".$f1_loan_purpose."', ";
						$sql_update_farmer_details .= " 		`f1_crop_cycle`='".$f1_crop_cycle."', ";
						$sql_update_farmer_details   .= " 		`f1_status`='1', ";
						$sql_update_farmer_details   .= " 		`f1_points`='".$hid_personal_details_points."', ";
						$sql_update_farmer_details   .= " 		`f1_modified_date`='".$datetime."', ";
						$sql_update_farmer_details   .= " 		`f1_modified_by`='".$fm_caname."' ";
						$sql_update_farmer_details   .= " WHERE `fm_id`='".$hid_fm_id."' ";
						$res_update_farmer_details   = mysqli_query($db_con, $sql_update_farmer_details) or die(mysqli_error($db_con));
						}
					else
					{
						// Query for updating the farmer personal details into tbl_personal_detail
						$sql_update_farmer_details    = " INSERT INTO `tbl_personal_detail`(`fm_caid`, `fm_id`, `f1_mfname`, ";
						$sql_update_farmer_details	.= "  `f1_father`, `f1_age`, `f1_dob`, `f1_mobno`, `f1_altno`, ";
						$sql_update_farmer_details	.= " `f1_expfarm`, ";
						$sql_update_farmer_details	.= " `f1_required_loan`, `f1_required_loan_amt`, `f1_loan_purpose`, `f1_crop_cycle`, ";
						$sql_update_farmer_details	.= " `f1_any_other_occupation`, `f1_occupation_amt`, ";
						$sql_update_farmer_details	.= " `f1_status`, `f1_points`, ";
						$sql_update_farmer_details	.= " `f1_created_date`, `f1_created_by`) ";
						$sql_update_farmer_details	.= " VALUES ('".$fm_caid."', '".$hid_fm_id."', '".$txt_mother_name."', ";
						$sql_update_farmer_details	.= " '".$txt_father_name."', '".$txt_age."', '".$txt_dob."', '".$fm_mobileno."', ";
						$sql_update_farmer_details	.= " '".$alt_mobileno."', '".$txt_farm_experience."', ";
						$sql_update_farmer_details	.= " '".$f1_required_loan."', '".$f1_required_loan_amt."', '".$f1_loan_purpose."', '".$f1_crop_cycle."', ";
						$sql_update_farmer_details	.= " '".$f1_any_other_occupation."', '".$f1_occupation_amt."', ";
						$sql_update_farmer_details	.= " '1', '".$hid_personal_details_points."', ";
						$sql_update_farmer_details	.= " '".$datetime."', '".$fm_caname."') ";
						$res_update_farmer_details	= mysqli_query($db_con, $sql_update_farmer_details) or die(mysqli_error($db_con));
					}
					
 					if($res_update_farmer_details)
					{
						$sql_chk_sd_farmer	= " SELECT * FROM `tbl_spouse_details` WHERE `fm_id`='".$hid_fm_id."' ";
						$res_chk_sd_farmer	= mysqli_query($db_con, $sql_chk_sd_farmer) or die(mysqli_error($db_con));
						$num_chk_sd_farmer	= mysqli_num_rows($res_chk_sd_farmer);
						
						$res_update_farmer_IsMarried	= 'false';
						
						if($num_chk_sd_farmer != 0)
						{
							// Query for inserting the married status in tbl_spouse_details
							$sql_update_farmer_IsMarried	= " UPDATE `tbl_spouse_details` ";
							$sql_update_farmer_IsMarried	.= " 	SET `f3_married`='".$ddl_married_status."', ";
							$sql_update_farmer_IsMarried	.= " 		`f3_married_reg_points`='".$f3_married_reg_points."', ";
							$sql_update_farmer_IsMarried	.= " 		`f3_modified_date`='".$datetime."', ";
							$sql_update_farmer_IsMarried	.= " 		`f3_modified_by`='".$fm_caname."' ";
							$sql_update_farmer_IsMarried	.= "  WHERE `fm_id`='".$hid_fm_id."' ";
							$res_update_farmer_IsMarried	= mysqli_query($db_con, $sql_update_farmer_IsMarried) or die(mysqli_error($db_con));
						}
						else
						{
							// Query for inserting the married status in tbl_spouse_details
							$sql_update_farmer_IsMarried	= " INSERT INTO `tbl_spouse_details`(`fm_caid`, `fm_id`, `f3_married`, ";
							$sql_update_farmer_IsMarried	.= " `f3_married_reg_points`, `f3_created_date`, `f3_created_by`) ";
							$sql_update_farmer_IsMarried	.= " VALUES ('".$fm_caid."', '".$hid_fm_id."', '".$ddl_married_status."', ";
							$sql_update_farmer_IsMarried	.= " '".$f3_married_reg_points."', '".$datetime."', '".$fm_caname."') ";
							$res_update_farmer_IsMarried	= mysqli_query($db_con, $sql_update_farmer_IsMarried) or die(mysqli_error($db_con));
						}
						
						if($res_update_farmer_IsMarried)
						{
							$sql_chk_rd_farmer	= " SELECT * FROM `tbl_residence_details` WHERE `fm_id`='".$hid_fm_id."' ";
							$res_chk_rd_farmer	= mysqli_query($db_con, $sql_chk_rd_farmer) or die(mysqli_error($db_con));
							$num_chk_rd_farmer	= mysqli_num_rows($res_chk_rd_farmer);
							
							$res_update_farmer_address	= 'false';
							
							if($num_chk_rd_farmer != 0)
							{
								// Query For updating the recidencial data into tbl_residence_details
								$sql_update_farmer_address	= " UPDATE `tbl_residence_details` ";
								$sql_update_farmer_address	.= " 	SET `f7_resistatus`='".$ddl_residence_status."', ";
								$sql_update_farmer_address	.= " 		`f7_rent_amount`='".$txt_rent."', ";
								$sql_update_farmer_address	.= " 		`f7_phouse`='".$txt_p_house_no."', ";
								$sql_update_farmer_address	.= " 		`f7_pstreet`='".$txt_p_street_name."', ";
								$sql_update_farmer_address	.= " 		`f7_parea`='".$txt_p_area_name."', ";
								$sql_update_farmer_address	.= " 		`f7_pstate`='".$ddl_p_state."', ";
								$sql_update_farmer_address	.= " 		`f7_pdistrict`='".$ddl_p_dist."', ";
								$sql_update_farmer_address	.= " 		`f7_ptaluka`='".$ddl_p_tal."', ";
								$sql_update_farmer_address	.= " 		`f7_pvillage`='".$ddl_p_village."', ";
								$sql_update_farmer_address	.= " 		`f7_ppin`='".$txt_p_pincode."', ";
								$sql_update_farmer_address	.= " 		`f7_chouse`='".$txt_c_house_no."', ";
								$sql_update_farmer_address	.= " 		`f7_cstreet`='".$txt_c_street_name."', ";
								$sql_update_farmer_address	.= " 		`f7_carea`='".$txt_c_area_name."', ";
								$sql_update_farmer_address	.= " 		`f7_cstate`='".$ddl_c_state."', ";
								$sql_update_farmer_address	.= " 		`f7_cdistrict`='".$ddl_c_dist."', ";
								$sql_update_farmer_address	.= " 		`f7_ctaluka`='".$ddl_c_tal."', ";
								$sql_update_farmer_address	.= " 		`f7_cvillage`='".$ddl_c_village."', ";
								$sql_update_farmer_address	.= " 		`f7_cpin`='".$txt_c_pincode."', ";
								$sql_update_farmer_address	.= " 		`f7_reg_points`='".$hid_residence_points."', ";
								$sql_update_farmer_address	.= " 		`f7_modified_date`='".$datetime."', ";
								$sql_update_farmer_address	.= " 		`f7_modified_by`='".$fm_caname."' ";
								$sql_update_farmer_address	.= " WHERE `fm_id`='".$hid_fm_id."' ";
								$res_update_farmer_address	= mysqli_query($db_con, $sql_update_farmer_address) or die(mysqli_error($db_con));
							}
							else
							{
								// Query For updating the recidencial data into tbl_residence_details
								$sql_update_farmer_address	= " INSERT INTO `tbl_residence_details`(`fm_caid`, `fm_id`, `f7_resistatus`, ";
								$sql_update_farmer_address	.= " `f7_rent_amount`, `f7_phouse`, `f7_pstreet`, `f7_parea`, ";
								$sql_update_farmer_address	.= " `f7_pstate`, `f7_pdistrict`, `f7_ptaluka`, `f7_pvillage`, ";
								$sql_update_farmer_address	.= " `f7_ppin`, `f7_chouse`, `f7_cstreet`, `f7_carea`, ";
								$sql_update_farmer_address	.= " `f7_cstate`, `f7_cdistrict`, `f7_ctaluka`, `f7_cvillage`, `f7_cpin`, ";
								$sql_update_farmer_address	.= " `f7_reg_points`, `f7_created_date`, `f7_created_by`) ";
								$sql_update_farmer_address	.= " VALUES ('".$fm_caid."', '".$hid_fm_id."',  '".$ddl_residence_status."', '".$txt_rent."', ";
								$sql_update_farmer_address	.= " '".$txt_p_house_no."', '".$txt_p_street_name."', '".$txt_p_area_name."', '".$ddl_p_state."', '".$ddl_p_dist."', ";
								$sql_update_farmer_address	.= " '".$ddl_p_tal."', '".$ddl_p_village."', '".$txt_p_pincode."', '".$txt_c_house_no."', '".$txt_c_street_name."', ";
								$sql_update_farmer_address	.= " '".$txt_c_area_name."', '".$ddl_c_state."', '".$ddl_c_dist."', '".$ddl_c_tal."', '".$ddl_c_village."', ";
								$sql_update_farmer_address	.= " '".$txt_c_pincode."', '".$hid_residence_points."', '".$datetime."', '".$fm_caname."') ";
								$res_update_farmer_address	= mysqli_query($db_con, $sql_update_farmer_address) or die(mysqli_error($db_con));
							}
							
							if($res_update_farmer_address)
							{
								$sql_chk_tp_farmer	= " SELECT * FROM `tbl_points` WHERE `fm_id`='".$hid_fm_id."' ";
								$res_chk_tp_farmer	= mysqli_query($db_con, $sql_chk_tp_farmer) or die(mysqli_error($db_con));
								$num_chk_tp_farmer	= mysqli_num_rows($res_chk_tp_farmer);
								
								$res_update_points	= 'false';
								
								if($num_chk_tp_farmer != 0)
								{
									// Query for updating the record for Points of the f1 and f7
									$sql_update_points	= " UPDATE `tbl_points` ";
									$sql_update_points	.= " 	SET `pt_frm1`='".$hid_personal_details_points."', ";
									$sql_update_points	.= " 		`pt_frm3`='".$f3_married_reg_points."', ";
									$sql_update_points	.= " 		`pt_frm7`='".$hid_residence_points."' ";
									$sql_update_points	.= " WHERE `fm_id`='".$hid_fm_id."' ";
									$res_update_points	= mysqli_query($db_con, $sql_update_points) or die(mysqli_error($db_con));
								}
								else
								{
									// Query for updating the record for Points of the f1 and f7
									$sql_update_points	= " INSERT INTO `tbl_points`(`fm_id`, `pt_frm1`, `pt_frm3`, `pt_frm7`) ";
									$sql_update_points	.= " VALUES ('".$hid_fm_id."', '".$hid_personal_details_points."', '".$f3_married_reg_points."', '".$hid_residence_points."') ";
									$res_update_points	= mysqli_query($db_con, $sql_update_points) or die(mysqli_error($db_con));
								}
								
								if($res_update_points)
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
	
	if((isset($obj->load_farmer)) == "1" && isset($obj->load_farmer))
	{
		$response_array = array();	
		$start_offset   = 0;
		$avg_of_points 	= 0;
		
		$page 			= mysqli_real_escape_string($db_con,$obj->page);	
		$per_page		= mysqli_real_escape_string($db_con,$obj->row_limit);
		$search_text	= mysqli_real_escape_string($db_con,$obj->search_text);	
		$hid_user_type	= mysqli_real_escape_string($db_con,$obj->hid_user_type); 
		$hid_ca_id 		= mysqli_real_escape_string($db_con,$obj->hid_ca_id);
		 
		if($page != "" && $per_page != "")	
		{
			$cur_page 		= $page;
			$page 	   	   	= $page - 1;
			$start_offset 	+= $page * $per_page;
			$start 			= $page * $per_page;
				
			$sql_load_data  = " select * from tbl_farmers WHERE 1=1 ";
			if(strcmp($hid_user_type,'Admin')!==0)
			{
				$sql_load_data  .= " AND fm_caid='".$hid_ca_id."' ";
			}
			if($search_text != "")
			{
				$sql_load_data .= " and (fm_name like '%".$search_text."%' or fm_aadhar like '%".$search_text."%' ";
				$sql_load_data .= " or fm_mobileno like '%".$search_text."%') ";	
			}
			// quit($sql_load_data);
			$data_count		= 	dataPagination($sql_load_data,$per_page,$start,$cur_page);		
			$sql_load_data .=" ORDER BY id DESC LIMIT $start, $per_page ";
			$result_load_data = mysqli_query($db_con,$sql_load_data) or die(mysqli_error($db_con));			
			
					
			if(strcmp($data_count,"0") !== 0)
			{		
				$cat_data = "";			
				$cat_data .='<form id="mainform1" action="deletefarmerdetails.php?pag=farmers&fmca_id='.$hid_ca_id.'" method="post">';
				$cat_data .= '<table id="tbl_farmer" class="table table-bordered dataTable" style="width:100%;text-align:center">';
				$cat_data .= '<thead>';
					$cat_data .= '<tr>';
						$cat_data .= '<th>Sr no.</th>';
						$cat_data .= '<th>Forms</th>';
						$cat_data .= '<th>Docs Upload</th>';
						$cat_data .= '<th>Farmer ID</th>';
						$cat_data .= '<th>Farmer Name</th>';
						$cat_data .= '<th>Aadhaar No</th>';
						$cat_data .= '<th>Mobile No</th>';
						$cat_data .= '<th>Total Points</th>';
						$cat_data .= '<th>Status</th>';
						$cat_data .= '<th class="hidden-350">Created Date</th>';
						$cat_data .= '<th>Edit</th>';
						$cat_data .= '<th style="text-align:center" class="hidden-480"><a href="#"><input type="checkbox" id="selectall" /></a>

                        <input type="submit" name="main" value="Delete" style="margin-left:10px; width:80px;height:30px;font-size:16px" /></th>';
					$cat_data .= '</tr>';
				$cat_data .= '</thead>';
				$cat_data .= '<tbody>';
				while($row_load_data = mysqli_fetch_array($result_load_data))
				{
					$result = lookup_value('tbl_points',array(),array("fm_id"=>$row_load_data['fm_id']),array(),array(),array());
					if($result)
					{
						$num	= mysqli_num_rows($result);
						if($num != 0)
						{
							$pt_row	= mysqli_fetch_array($result);

							$sum_of_points	= $pt_row['pt_frm1'] + $pt_row['pt_frm2'] + $pt_row['pt_frm3'] + $pt_row['pt_frm4'] + $pt_row['pt_frm5'] + $pt_row['pt_frm7'] + $pt_row['pt_frm8'] + $pt_row['pt_frm9'] + $pt_row['pt_frm10'] + $pt_row['pt_frm11'] + $pt_row['pt_frm12'] + $pt_row['pt_frm13'] + $pt_row['pt_frm14']; //$pt_row['pt_frm6'] + + $pt_row['pt_frm8_fh'] 
					
							// $avg_of_points	= round($sum_of_points / 15, 2);
							$avg_of_points	= round($sum_of_points / 14, 2);
						}
					}
					
					
					
					$cat_data .= '<tr>';				
						$cat_data .= '<td class="center-text">'.++$start_offset.'</td>';				
						$cat_data .= '<td style="text-align:center;">';
							$cat_data .= '<a href="get_farmer_details.php?pag=farmers&fm_id='.$row_load_data['fm_id'].'" class="btn btn-primary">View Forms</a>';
						$cat_data .= '</td>';	//<!-- Forms -->
						$cat_data .= '<td style="text-align:center;">';
							$cat_data .= '<a href="get_farmerdoc.php?pag=farmers&fm_id='.$row_load_data['fm_id'].'" class="btn btn-primary">View Uploads</a>';
						$cat_data .= '</td>';	//<!-- Docs Upload -->
						$cat_data .= '<td>'.$row_load_data['fm_id'].'</td>';	//<!-- Farmer ID -->
						$cat_data .= '<td>';
							$cat_data .= ucwords($row_load_data['fm_name']);
						
							$sql_check_point  	= " SELECT * FROM tbl_points ";
							$sql_check_point  	.= " WHERE pt_frm1 !='' AND pt_frm2 !='' ";
							$sql_check_point  	.= " 	AND pt_frm3 !=''  ";
							$sql_check_point  	.= " 	 AND pt_frm7 !='' ";
							$sql_check_point  	.= " 	AND pt_frm8 !='' AND pt_frm9 !='' ";
							$sql_check_point  	.= " 	AND pt_frm10 !='' AND pt_frm5 !='' ";
							$sql_check_point  	.= " 	AND pt_frm12 !='' AND pt_frm13 !='' ";
							$sql_check_point  	.= " 	AND pt_frm11 !='' "; //AND pt_frm8_fh !='' AND pt_frm6 !=''
							$sql_check_point  	.= " 	AND fm_id='".$row_load_data['fm_id']."' ";
							$res_check_point  = mysqli_query($db_con,$sql_check_point) or die(mysqli_error($db_con));
							$num_check_point  = mysqli_num_rows($res_check_point);
							if($num_check_point==0)
							{
								$cat_data .= '<small style="color:red">Incomplete</small>';
							}
							else
							{
								$cat_data .= '<small style="color:green">Complete</small>';
							}
						$cat_data .= '</td>';	//<!-- Farmer Name -->
						$cat_data .= '<td>'.$row_load_data['fm_aadhar'].'</td>';	//<!-- Aadhaar Number -->
						$cat_data .= '<td>'.$row_load_data['fm_mobileno'].'</td>';	//<!-- Mobile Number -->
						$cat_data .= '<td>'.$avg_of_points.'</td>';	//<!-- Loan Required (Rs.) -->
						$cat_data .= '<td>'.$row_load_data['fm_status'].'</td>';	//<!-- Status -->
						$cat_data .= '<td>'.$row_load_data['fm_createddt'].'</td>';	//<!-- Created Date -->
						$cat_data .= '<td style="text-align:center;">';
							$cat_data .= '<a href="edit_farmer.php?pag=farmers&fm_id='.$row_load_data['fm_id'].'" class="btn btn-primary">Edit</a>';
						$cat_data .= '</td>';	//<!-- Edit Farmers -->
						$cat_data .='<td><div align="center"><input type="checkbox" class="case" name="farmer_id[]" value="'.$row_load_data['fm_id'].'" /></div></td>'; //<!-- Delete Farmers -->
					$cat_data .= '</tr>';															
				}	
				$cat_data .= '</tbody>';
				$cat_data .= '</table>';
				$cat_data .= '</form>';
				$cat_data .= $data_count;
				$response_array = array("Success"=>"Success","resp"=>$cat_data);					
			}
			else
			{
				$response_array = array("Success"=>"fail","resp"=>"No Data Available");
			}
		}
		else
		{
			$response_array = array("Success"=>"fail","resp"=>"No Row Limit and Page Number Specified");
		}
		echo json_encode($response_array);	
	}

	if((isset($obj->remove_farmer_service_provider)) == 1 && isset($obj->remove_farmer_service_provider))
	{
		$farmer_servpro = $obj->farmer_servpro;
		$farmer_id 		= $obj->farmer_id;
		$delete_flag    = 0;
		
		foreach($farmer_servpro as $id)
		{
			$sql_delete = " DELETE FROM tbl_farmer_servpro WHERE id='".$id."' ";
			$res_delete = mysqli_query($db_con,$sql_delete) or die(mysqli_error($db_con));
			if($res_delete)
			{
				$delete_flag = 1;
			}
		}
		if($delete_flag==1)
		{
			$servProvData	= getServProvPart($farmer_id);

			quit(utf8_encode($servProvData),1);
		}
		quit('Something went wrong..!');
	}

	if((isset($obj->add_serv_prov)) == '1' && (isset($obj->add_serv_prov)))
	{
		$farmer_id 		= $obj->farmer_id;
		$servProvIds	= $obj->f5_servpro;

		foreach($servProvIds as $servProvId)
		{
			$data1['fm_id']			= $farmer_id;
			$data1['serv_pro_name']	= $servProvId;
			$data1['status']		= '1';
			$data1['created_date']	= $datetime;
			$data1['created_by']	= $fm_caid;

			insert('tbl_farmer_servpro',$data1);
		}

		$displayPart	= getServProvPart($farmer_id);

		quit(utf8_encode($displayPart),1);
	}

	function getServProvPart($farmer_id)
	{
		global $db_con;
		$startOffset    = 0;
		$servProvData	= '';

		// Query For Getting the list of service Provider
		$sql_get_list_servpro	= " SELECT * FROM `tbl_servpro` WHERE `servpro_status`='1' AND servpro_name NOT IN (SELECT DISTINCT(serv_pro_name) FROM tbl_farmer_servpro WHERE fm_id='".$farmer_id."') ";
		$res_get_list_servpro	= mysqli_query($db_con, $sql_get_list_servpro) or die(mysqli_error($db_con));
		$num_get_list_servpro	= mysqli_num_rows($res_get_list_servpro);

		$servProvData	.= '<select multiple="multiple"  onChange="console.log($(this).children(\':selected\').length)" placeholder="Select Service Provider" id="f5_servpro" name="f5_servpro[]" class="select2-me input-xxlarge" >';
        if($num_get_list_servpro != 0)
        {
        	while($row_get_list_servpro = mysqli_fetch_array($res_get_list_servpro))
        	{
        		$servProvData	.= '<option value="'.$row_get_list_servpro['servpro_name'].'" >';
            		$servProvData	.= ucwords($row_get_list_servpro['servpro_name']);
            	$servProvData	.= '</option>';
            }
        }
        $servProvData	.= '</select>';

        $servProvData	.= '<input value="Add Here" class="btn-success" type="button" onclick="addServProv('.$farmer_id.');">';

        $servProvData .= '<script type="text/javascript">';
		$servProvData .= '$("#f5_servpro").select2();';
		$servProvData .= '</script>';

		$sql_get_farmer_servpro	= " SELECT * FROM `tbl_farmer_servpro` WHERE `fm_id`='".$farmer_id."' ";
        $res_get_farmer_servpro	= mysqli_query($db_con, $sql_get_farmer_servpro) or die(mysqli_error($db_con));
        $num_get_farmer_servpro	= mysqli_num_rows($res_get_farmer_servpro);

		

		$servProvData	.= '<table class="table table-bordered dataTable">';
			$servProvData	.= '<thead>';
			$servProvData	.= '	<th>Sr. No.</th>';
			$servProvData	.= '	<th>Service Provider</th>';
			$servProvData	.= '	<th style="text-align:center">';
			$servProvData	.= '		<div style="text-align:center">';
			$servProvData	.= '			<input type="button" value="Delete" onclick="multipleServProDelete('.$farmer_id.');" class="btn-danger"/>';
			$servProvData	.= '		</div>';
			$servProvData	.= '	</th>';
			$servProvData	.= '</thead>';
			$servProvData	.= '<tbody>';
			if($num_get_farmer_servpro != 0)
			{
				while($row_get_farmer_servpro = mysqli_fetch_array($res_get_farmer_servpro))
				{
					$servProvData	.= '<tr>';
						$servProvData	.= '<td>'.++$startOffset.'</td>';
						$servProvData	.= '<td>'.ucwords($row_get_farmer_servpro['serv_pro_name']).'</td>';
						$servProvData	.= '<td align="center">';
							$servProvData	.= '<input type="checkbox" value="'.$row_get_farmer_servpro['id'].'" id="farmer_servpro_'.$row_get_farmer_servpro['id'].'" name="farmer_servpro_'.$row_get_farmer_servpro['id'].'" class="css-checkbox farmer_servpro">';
						$servProvData	.= '</td>';
					$servProvData	.= '</tr>';
				}
			}
			else
			{
				$servProvData	.= '<td>&nbsp;</td>';
				$servProvData	.= '<td>No Match Found</td>';
			}
			$servProvData	.= '</tbody>';
		$servProvData	.= '</table>';

		return $servProvData;
	}

	if((isset($obj->add_f9_water_source)) == '1' && (isset($obj->add_f9_water_source)))
	{
		$farmer_id 			= $obj->farmer_id;
		$f9_source_of_water	= $obj->f9_source_of_water;
		$incrementalID		= $obj->incrementalID;

		foreach($f9_source_of_water as $f9_source_of_water_name)
		{
			$data1['fm_id']             = $farmer_id;
			$data1['water_source_name'] = $f9_source_of_water_name;
			$data1['count']             = $incrementalID;
			$data1['status']            = '1';
			$data1['created_date']      = $datetime;
			$data1['created_by']        = $fm_caid;

			insert('tbl_f9_farmer_water_source',$data1);
		}

		$displayPart	= getf9WaterSource($farmer_id, $incrementalID);

		quit(utf8_encode($displayPart),1);
	}

	if((isset($obj->remove_farmer_f9_water_source)) == 1 && isset($obj->remove_farmer_f9_water_source))
	{
		$f9_water_source = $obj->f9_water_source;
		$farmer_id 		= $obj->farmer_id;
		$incrementalID	= $obj->incrementalID;
		$delete_flag    = 0;
		
		foreach($f9_water_source as $id)
		{
			$sql_delete = " DELETE FROM tbl_f9_farmer_water_source WHERE id='".$id."' ";
			$res_delete = mysqli_query($db_con,$sql_delete) or die(mysqli_error($db_con));
			if($res_delete)
			{
				$delete_flag = 1;
			}
		}
		if($delete_flag==1)
		{
			$f9_waterSourceData	= getf9WaterSource($farmer_id, $incrementalID);

			quit(utf8_encode($f9_waterSourceData),1);
		}
		quit('Something went wrong..!');
	}

	if((isset($obj->add_f14_water_source)) == '1' && (isset($obj->add_f14_water_source)))
	{
		$farmer_id             = $obj->farmer_id;
		$f14_water_source_type = $obj->f14_water_source_type;
		$incrementalID         = $obj->incrementalID;

		foreach($f14_water_source_type as $f14_water_source_type_name)
		{
			$data1['fm_id']             = $farmer_id;
			$data1['water_source_name'] = $f14_water_source_type_name;
			$data1['count']             = $incrementalID;
			$data1['status']            = '1';
			$data1['created_date']      = $datetime;
			$data1['created_by']        = $fm_caid;

			insert('tbl_f14_farmer_water_source',$data1);
		}

		$displayPart	= getf14WaterSource($farmer_id, $incrementalID);

		quit(utf8_encode($displayPart),1);
	}

	if((isset($obj->remove_farmer_f14_water_source)) == 1 && isset($obj->remove_farmer_f14_water_source))
	{
		$f14_water_source = $obj->f14_water_source;
		$farmer_id        = $obj->farmer_id;
		$incrementalID    = $obj->incrementalID;
		$delete_flag      = 0;
		
		foreach($f14_water_source as $id)
		{
			$sql_delete = " DELETE FROM tbl_f14_farmer_water_source WHERE id='".$id."' ";
			$res_delete = mysqli_query($db_con,$sql_delete) or die(mysqli_error($db_con));
			if($res_delete)
			{
				$delete_flag = 1;
			}
		}
		if($delete_flag==1)
		{
			$f14_waterSourceData	= getf14WaterSource($farmer_id, $incrementalID);

			quit(utf8_encode($f14_waterSourceData),1);
		}
		quit('Something went wrong..!');
	}
	
	function getf9WaterSource($farmer_id, $incrementalID)
	{
		global $db_con;
		$startOffset    	= 0;
		$f9WaterSourceData	= '';

		// Query For getting the list of Water Source
		$sql_get_f9_water_source_list	= " SELECT * FROM `tbl_water_source` ";
		$sql_get_f9_water_source_list	.= " WHERE `status`='1' AND water_source NOT IN (SELECT DISTINCT(water_source_name) ";
		$sql_get_f9_water_source_list	.= " FROM tbl_f9_farmer_water_source ";
		$sql_get_f9_water_source_list	.= " WHERE fm_id='".$farmer_id."' AND count='".$incrementalID."') ";
    	$res_get_f9_water_source_list 	= mysqli_query($db_con, $sql_get_f9_water_source_list) or die(mysqli_error($db_con));
		if($res_get_f9_water_source_list)
		{
			$num_get_f9_water_source_list	= mysqli_num_rows($res_get_f9_water_source_list);
			
			$f9WaterSourceData	.= '<select id="f9_source_of_water'.$incrementalID.'" name="f9_source_of_water'.$incrementalID.'[]" multiple="multiple"  onChange="console.log($(this).children(\':selected\').length)" placeholder="Select Water Source" class="select2-me input-xxlarge" >';
               	if($num_get_f9_water_source_list != 0)
				{
					while($row_get_f9_water_source_list	= mysqli_fetch_array($res_get_f9_water_source_list))
					{
                		$f9WaterSourceData	.= '<option point="'.$row_get_f9_water_source_list['points'].'" value="'.$row_get_f9_water_source_list['water_source'].'">'.trim(ucwords($row_get_f9_water_source_list['water_source'])).'</option>';
                    }
				}
				else
				{
					$f9WaterSourceData	.= '<option point="0" value="">No Match Found</option>';
                }
            $f9WaterSourceData	.= '</select>';

            $f9WaterSourceData .= '<script type="text/javascript">';
			$f9WaterSourceData .= '$("#f9_source_of_water'.$incrementalID.'").select2();';
			$f9WaterSourceData .= '</script>';

            $f9WaterSourceData	.= '<input value="Add Here" class="btn-success" type="button" onclick="addf9WaterSource('.$farmer_id.', '.$incrementalID.');">';
			// Query For getting the Service Provider list for that user
            $sql_get_f9_farmer_water_source	= " SELECT * FROM `tbl_f9_farmer_water_source` WHERE `fm_id`='".$farmer_id."' AND count='".$incrementalID."' ";
            $res_get_f9_farmer_water_source	= mysqli_query($db_con, $sql_get_f9_farmer_water_source) or die(mysqli_error($db_con));
            $num_get_f9_farmer_water_source	= mysqli_num_rows($res_get_f9_farmer_water_source);
            $startOffset_f9	= 0;
            
            $f9WaterSourceData	.= '<table class="table table-bordered dataTable">';
            	$f9WaterSourceData	.= '<thead>';
            		$f9WaterSourceData	.= '<th>Sr. No.</th>';
            		$f9WaterSourceData	.= '<th>Water Source</th>';
            		$f9WaterSourceData	.= '<th style="text-align:center">';
            			$f9WaterSourceData	.= '<div style="text-align:center">';
            				$f9WaterSourceData	.= '<input type="button" value="Delete" onclick="multipleWaterSourceDelete('.$farmer_id.', '.$incrementalID.');" class="btn-danger"/>';
            			$f9WaterSourceData	.= '</div>';
            		$f9WaterSourceData	.= '</th>';
            	$f9WaterSourceData	.= '</thead>';
            	$f9WaterSourceData	.= '<tbody>';
            		if($num_get_f9_farmer_water_source != 0)
            		{
            			while($row_get_f9_farmer_water_source = mysqli_fetch_array($res_get_f9_farmer_water_source))
            			{
            				$f9WaterSourceData	.= '<tr>';
								$f9WaterSourceData	.= '<td>'.++$startOffset_f9.'</td>';
								$f9WaterSourceData	.= '<td>'.ucwords($row_get_f9_farmer_water_source['water_source_name']).'</td>';
								$f9WaterSourceData	.= '<td align="center">';
									$f9WaterSourceData	.= '<input type="checkbox" value="'.$row_get_f9_farmer_water_source['id'].'" id="f9_water_source_'.$row_get_f9_farmer_water_source['id'].'" name="f9_water_source_'.$row_get_f9_farmer_water_source['id'].'" class="css-checkbox f9_water_source">';
								$f9WaterSourceData	.= '</td>';
							$f9WaterSourceData	.= '</tr>';
            			}
            		}
            		else
            		{
            			$f9WaterSourceData	.= '<tr>';
                			$f9WaterSourceData	.= '<td>&nbsp;</td>';
							$f9WaterSourceData	.= '<td>No Match Found</td>';
                			$f9WaterSourceData	.= '<td>&nbsp;</td>';
            			$f9WaterSourceData	.= '</tr>';
            		}
            	$f9WaterSourceData	.= '</tbody>';
            $f9WaterSourceData	.= '</table>';
		}

		return $f9WaterSourceData;
	}

	function getf14WaterSource($farmer_id, $incrementalID)
	{
		global $db_con;
		$startOffset    	= 0;
		$f14WaterSourceData	= '';

		// Query For getting the list of Water Source
		$sql_get_f14_water_source_list	= " SELECT * FROM `tbl_water_source` ";
		$sql_get_f14_water_source_list	.= " WHERE `status`='1' AND water_source NOT IN (SELECT DISTINCT(water_source_name) ";
		$sql_get_f14_water_source_list	.= " FROM tbl_f14_farmer_water_source ";
		$sql_get_f14_water_source_list	.= " WHERE fm_id='".$farmer_id."' AND count='".$incrementalID."') ";
    	$res_get_f14_water_source_list 	= mysqli_query($db_con, $sql_get_f14_water_source_list) or die(mysqli_error($db_con));
		if($res_get_f14_water_source_list)
		{
			$num_get_f14_water_source_list	= mysqli_num_rows($res_get_f14_water_source_list);
			
			$f14WaterSourceData	.= '<select id="f14_water_source_type'.$incrementalID.'" name="f14_water_source_type'.$incrementalID.'[]" multiple="multiple"  onChange="console.log($(this).children(\':selected\').length)" placeholder="Select Water Source" class="select2-me input-xxlarge" >';
               	if($num_get_f14_water_source_list != 0)
				{
					while($row_get_f14_water_source_list	= mysqli_fetch_array($res_get_f14_water_source_list))
					{
                		$f14WaterSourceData	.= '<option point="'.$row_get_f14_water_source_list['points'].'" value="'.$row_get_f14_water_source_list['water_source'].'">'.trim(ucwords($row_get_f14_water_source_list['water_source'])).'</option>';
                    }
				}
				else
				{
					$f14WaterSourceData	.= '<option point="0" value="">No Match Found</option>';
                }
            $f14WaterSourceData	.= '</select>';

            $f14WaterSourceData .= '<script type="text/javascript">';
			$f14WaterSourceData .= '$("#f14_water_source_type'.$incrementalID.'").select2();';
			$f14WaterSourceData .= '</script>';

            $f14WaterSourceData	.= '<input value="Add Here" class="btn-success" type="button" onclick="addf14WaterSource('.$farmer_id.', '.$incrementalID.');">';
			// Query For getting the Service Provider list for that user
            $sql_get_f14_farmer_water_source	= " SELECT * FROM `tbl_f14_farmer_water_source` WHERE `fm_id`='".$farmer_id."' AND count='".$incrementalID."' ";
            $res_get_f14_farmer_water_source	= mysqli_query($db_con, $sql_get_f14_farmer_water_source) or die(mysqli_error($db_con));
            $num_get_f14_farmer_water_source	= mysqli_num_rows($res_get_f14_farmer_water_source);
            $startOffset_f14	= 0;
            
            $f14WaterSourceData	.= '<table class="table table-bordered dataTable">';
            	$f14WaterSourceData	.= '<thead>';
            		$f14WaterSourceData	.= '<th>Sr. No.</th>';
            		$f14WaterSourceData	.= '<th>Water Source</th>';
            		$f14WaterSourceData	.= '<th style="text-align:center">';
            			$f14WaterSourceData	.= '<div style="text-align:center">';
            				$f14WaterSourceData	.= '<input type="button" value="Delete" onclick="multipleWaterSourceDelete_f14('.$farmer_id.', '.$incrementalID.');" class="btn-danger"/>';
            			$f14WaterSourceData	.= '</div>';
            		$f14WaterSourceData	.= '</th>';
            	$f14WaterSourceData	.= '</thead>';
            	$f14WaterSourceData	.= '<tbody>';
            		if($num_get_f14_farmer_water_source != 0)
            		{
            			while($row_get_f14_farmer_water_source = mysqli_fetch_array($res_get_f14_farmer_water_source))
            			{
            				$f14WaterSourceData	.= '<tr>';
								$f14WaterSourceData	.= '<td>'.++$startOffset_f14.'</td>';
								$f14WaterSourceData	.= '<td>'.ucwords($row_get_f14_farmer_water_source['water_source_name']).'</td>';
								$f14WaterSourceData	.= '<td align="center">';
									$f14WaterSourceData	.= '<input type="checkbox" value="'.$row_get_f14_farmer_water_source['id'].'" id="f14_water_source_'.$row_get_f14_farmer_water_source['id'].'" name="f14_water_source_'.$row_get_f14_farmer_water_source['id'].'" class="css-checkbox f14_water_source">';
								$f14WaterSourceData	.= '</td>';
							$f14WaterSourceData	.= '</tr>';
            			}
            		}
            		else
            		{
            			$f14WaterSourceData	.= '<tr>';
                			$f14WaterSourceData	.= '<td>&nbsp;</td>';
							$f14WaterSourceData	.= '<td>No Match Found</td>';
                			$f14WaterSourceData	.= '<td>&nbsp;</td>';
            			$f14WaterSourceData	.= '</tr>';
            		}
            	$f14WaterSourceData	.= '</tbody>';
            $f14WaterSourceData	.= '</table>';
		}

		return $f14WaterSourceData;
	}



	if((isset($obj->addLandData)) == 1 && (isset($obj->addLandData)))
	{
		$contentCountLand	= $obj->contentCountLand;
		$farmer_id 			= $obj->farmer_id;

		$landData 			= '';

		$landData	.= '<div id="land'.$contentCountLand.'" style="padding:5px;border:1px solid #d6d6d6;margin:5px;display:none;">';
			$landData	.= '<div style=" padding: 10px; margin: 5px;">';
								
				$landData	.= '<input type="hidden" name="id[]" id="id" value="">';
				$landData	.= '<h2>Farm Land '.$contentCountLand.' Details</h2>';
								
				$landData	.= '<div class="control-group">';
				$landData	.= '<label for="text" class="control-label" style="margin-top:10px">Size in Acres<span style="color:#F00">*</span></label>';
					$landData	.= '<div class="controls">';
						$landData	.= '<input placeholder="Size in Hector" type="text" onKeyPress="return numsonly(event);" onKeyUp="getAcre(this.value, \'hector\', \'f9_land_size'.$contentCountLand.'\', '.$contentCountLand.');" id="f9_land_size_hector'.$contentCountLand.'" name="f9_land_size_hector'.$contentCountLand.'" class="input-small" value="" data-rule-required="true" maxlength="6">';
                        
                        $landData	.= '<input placeholder="Size in Acres" type="text" onKeyPress="return numsonly(event);" onKeyUp="getAcre(this.value, \'acre\', \'f9_land_size'.$contentCountLand.'\', '.$contentCountLand.');" id="f9_land_size_acre'.$contentCountLand.'" name="f9_land_size_acre'.$contentCountLand.'" class="input-small" value="" maxlength="6">';
                        
                        $landData	.= '<input placeholder="Size in Guntha" type="text" onKeyPress="return numsonly(event);" onKeyUp="getAcre(this.value, \'guntha\', \'f9_land_size'.$contentCountLand.'\', '.$contentCountLand.');" id="f9_land_size_guntha'.$contentCountLand.'" name="f9_land_size_guntha'.$contentCountLand.'" class="input-small" value="" maxlength="6">';

                        $landData 	.= '<br>';

                        $landData	.= '<input type="text" onKeyPress="return numsonly(event);" id="f9_land_size'.$contentCountLand.'" name="f9_land_size'.$contentCountLand.'" class="input-xlarge" value="" data-rule-required="true" maxlength="6" readonly>Acre';
					$landData	.= '</div>';
				$landData	.= '</div>';
								
				$landData	.= '<div class="control-group">';
					$landData	.= '<label for="text" class="control-label" style="margin-top:10px">Ownership<span style="color:#F00">*</span></label>';
						$landData	.= '<div class="controls">';
						$landData	.= '<select id="f9_owner'.$contentCountLand.'" name="f9_owner'.$contentCountLand.'" onChange="ownership('.$contentCountLand.',this.value)" class="select2-me input-xlarge" data-rule-required="true">';
							$landData	.= '<option value="" disabled selected> Select here</option>';
							$landData	.= '<option value="Owned" point="10">Owned</option>';
							$landData	.= '<option value="Ancestral" point="5">Ancestral</option>';
							$landData	.= '<option value="Rented" point="5">Rented</option>';
							$landData	.= '<option value="Contracted" point="5">Contracted</option>';
							$landData	.= '<option value="Leased" point="3">Leased</option>';
						$landData	.= '</select>';
					$landData	.= '</div>';
				$landData	.= '</div>	';
								
				$landData	.= '<div id="div_lease_display'.$contentCountLand.'" style="display: none; padding: 10px; border:1px solid #d6d6d6; margin: 20px;">';
					$landData	.= '<div class="control-group">';
						$landData	.= '<label for="text" class="control-label" style="margin-top:10px">No. of Lease year<span style="color:#F00">*</span></label>';
						$landData	.= '<div class="controls">';
							$landData	.= '<input value="" type="text" class="input-xlarge v_number" placeholder="Lease Year" name="f9_lease_year'.$contentCountLand.'" id="f9_lease_year'.$contentCountLand.'" data-rule-required="true" onKeyPress="return numsonly(event);" maxlength="10">';
						$landData	.= '</div>';
					$landData	.= '</div>';
				$landData	.= '</div>	';
								
				$landData	.= '<div id="div_rental_display'.$contentCountLand.'" style="display: none; padding: 10px; border:1px solid #d6d6d6; margin: 20px;">';
					$landData	.= '<div class="control-group">';
						$landData	.= '<label for="text" class="control-label" style="margin-top:10px">Mention tha amount per month on rent<span style="color:#F00">*</span></label>';
						$landData	.= '<div class="controls">';
							$landData	.= '<input value="" type="text" class="input-xlarge v_number" placeholder="amount per month on rent" name="f9_amount_on_rent'.$contentCountLand.'" id="f9_amount_on_rent'.$contentCountLand.'" data-rule-required="true" onKeyPress="return numsonly(event);" maxlength="10">';
						$landData	.= '</div>';
					$landData	.= '</div>';
				$landData	.= '</div>	';
								
				$landData	.= '<div id="div_contract_display'.$contentCountLand.'" style="display: none; padding: 10px; border:1px solid #d6d6d6; margin: 20px;">';
					$landData	.= '<div class="control-group">';
						$landData	.= '<label for="text" class="control-label" style="margin-top:10px"> No. of Contract year<span style="color:#F00">*</span></label>';
						$landData	.= '<div class="controls">';
							$landData	.= '<input type="text" class="input-xlarge ui-wizard-content" placeholder="Contract Year" name="f9_contract_year'.$contentCountLand.'" id="f9_contract_year'.$contentCountLand.'" value="" data-rule-required="true" onKeyPress="return numsonly(event);" maxlength="10">';
						$landData	.= '</div>';
					$landData	.= '</div>';
				$landData	.= '</div>	';
								
				$landData	.= '<h3>Land Address</h3>';
								 
				$landData	.= '<div class="control-group" >';
					$landData	.= '<label for="tasktitel" class="control-label">State <span style="color:#F00">*</span></label>';
					$landData	.= '<div class="controls">';
						$landData	.= '<select name="f9_state'.$contentCountLand.'" id="f9_state'.$contentCountLand.'" data-rule-required="true" onChange="getDist(\'p\', this.value, \'f9_district'.$contentCountLand.'\', \'f9_taluka'.$contentCountLand.'\', \'f9_vilage'.$contentCountLand.'\', \'div_p_dist'.$contentCountLand.'\', \'div_p_tal'.$contentCountLand.'\', \'div_p_village'.$contentCountLand.'\');" class="input-xlarge">';
							$landData	.= '<option value="">Select State</option>';
							$landData	.= '<option value="1">TELANGANA</option>';
							$landData	.= '<option value="2">MAHARASHTRA</option>';
						$landData	.= '</select>';
					$landData	.= '</div>';
				$landData	.= '</div>  ';
								
				$landData	.= '<div class="control-group">';
					$landData	.= '<label for="tasktitel" class="control-label">District <span style="color:#F00">*</span></label>';
					$landData	.= '<div class="controls" id="div_p_dist'.$contentCountLand.'">';
						$landData	.= '<select id="f9_district'.$contentCountLand.'" name="f9_district'.$contentCountLand.'" class="select2-me input-large" >';
							$landData	.= '<option value="" disabled selected>Select District</option>';
						$landData	.= '</select>';
					$landData	.= '</div>';
				$landData	.= '</div> '; 
								
				$landData	.= '<div class="control-group">';
					$landData	.= '<label for="tasktitel" class="control-label">Taluka <span style="color:#F00">*</span></label>';
					$landData	.= '<div class="controls" id="div_p_tal'.$contentCountLand.'">';
						$landData	.= '<select id="f9_taluka'.$contentCountLand.'" name="f9_taluka'.$contentCountLand.'" class="select2-me input-large" >';
							$landData	.= '<option value="" disabled selected>Select Taluka</option>';
						$landData	.= '</select>';
					$landData	.= '</div>';
				$landData	.= '</div>  ';
								
				$landData	.= '<div class="control-group" >';
					$landData	.= '<label for="tasktitel" class="control-label">Village Name <span style="color:#F00">*</span></label>';
					$landData	.= '<div class="controls" id="div_p_village'.$contentCountLand.'">';
						$landData	.= '<select id="f9_vilage'.$contentCountLand.'" name="f9_vilage'.$contentCountLand.'" class="select2-me input-large" >';
							$landData	.= '<option value="" disabled selected>Select Village</option>';
						$landData	.= '</select>';
					$landData	.= '</div>';
				$landData	.= '</div> ';
								
				$landData	.= '<div class="control-group">';
					$landData	.= '<label for="text" class="control-label" style="margin-top:10px">Survey Number<span style="color:#F00">*</span></label>';
					$landData	.= '<div class="controls">';
						$landData	.= '<input placeholder="Survey Number" type="text" id="f9_survey_number'.$contentCountLand.'" name="f9_survey_number'.$contentCountLand.'" class="input-xlarge" value="" data-rule-required="true" maxlength="10">';
					$landData	.= '</div>';
				$landData	.= '</div>';
				
				$landData	.= '<div class="control-group">';
					$landData	.= '<label for="text" class="control-label" style="margin-top:10px">Gat Number<span style="color:#F00">*</span></label>';
					$landData	.= '<div class="controls">';
						$landData	.= '<input placeholder="Gat Number" type="text" id="f9_gat_number'.$contentCountLand.'" name="f9_gat_number'.$contentCountLand.'" class="input-xlarge" value="" data-rule-required="true" maxlength="10">';
					$landData	.= '</div>';
				$landData	.= '</div>';
								
				$landData	.= '<div class="control-group" >';
					$landData	.= '<label for="tasktitel" class="control-label">Pin-Code <span style="color:#F00">*</span></label>';
					$landData	.= '<div class="controls">';
						$landData	.= '<input type="text" id="f9_pincode'.$contentCountLand.'" name="f9_pincode'.$contentCountLand.'" placeholder="Pin-Code" class="input-large" data-rule-required="true" onKeyPress="return numsonly(event);" minlength="6" maxlength="6" size="6" />';
					$landData	.= '</div>';
				$landData	.= '</div>';
				
				$landData	.= '<div class="control-group" >';
					$landData	.= '<label for="tasktitel" class="control-label" >Get Geo Location</label>';
					$landData	.= '<div class="controls">';
						$landData	.= '<a href="javascript:void(0);" onClick="tryAPIGeolocation('.$contentCountLand.')">Get Location<a>';
						$landData	.= '<p id="xland"></p>';
						$landData	.= '<span id="span_error'.$contentCountLand.'"></span>';
					$landData	.= '</div>';
				$landData	.= '</div>';
								
				$landData	.= '<div class="control-group" >';
					$landData	.= '<label for="tasktitel" class="control-label">latitude <span style="color:#F00">*</span></label>';
					$landData	.= '<div class="controls">';
						$landData	.= '<input type="text" id="f9_lat'.$contentCountLand.'" name="f9_lat'.$contentCountLand.'" placeholder="Latitude" class="input-large" data-rule-required="true" onKeyPress="return numsonly(event);" maxlength="100"/>';
					$landData	.= '</div>';
				$landData	.= '</div>  ';
								
				$landData	.= '<div class="control-group" >';
					$landData	.= '<label for="tasktitel" class="control-label">longitude <span style="color:#F00">*</span></label>';
					$landData	.= '<div class="controls">';
						$landData	.= '<input type="text" id="f9_long'.$contentCountLand.'" name="f9_long'.$contentCountLand.'" placeholder="Longitude" class="input-large" data-rule-required="true" onKeyPress="return numsonly(event);" maxlength="100"/>';
					$landData	.= '</div>';
				$landData	.= '</div>  ';
								
				$landData	.= '<div class="control-group">';
					$landData	.= '<label for="text" class="control-label" style="margin-top:10px">Type of Soil<span style="color:#F00">*</span></label>';
					$landData	.= '<div class="controls">';
						$landData	.= '<select id="f9_soil_type'.$contentCountLand.'" name="f9_soil_type'.$contentCountLand.'" class="select2-me input-xlarge" data-rule-required="true" onChange="calTotal_f9()">';
							$landData	.= '<option value="" disabled selected> Select here</option>';
							$landData	.= '<option value="Alluvial Soil" point="10">Alluvial Soil</option>';
							$landData	.= '<option value="Black Soil" point="9">Black Soil</option>';
							$landData	.= '<option value="Red Soil" point="8">Red Soil</option>';
							$landData	.= '<option value="Mountain Soil" point="6">Mountain Soil</option>';
							$landData	.= '<option value="Peat" point="5">Peat</option>';
							$landData	.= '<option value="Laterite Soil" point="5">Laterite Soil</option>';
							$landData	.= '<option value="Desert Soil" point="2">Desert Soil</option>';
						$landData	.= '</select>';
					$landData	.= '</div>';
				$landData	.= '</div>	';
								
				$landData	.= '<div class="control-group">';
					$landData	.= '<label for="text" class="control-label" style="margin-top:10px">Have you had the soil tested in your land?<span style="color:#F00">*</span></label>';
					$landData	.= '<div class="controls">';
						$landData	.= '<select id="f9_soil_tested'.$contentCountLand.'" name="f9_soil_tested'.$contentCountLand.'" class="select2-me input-xlarge" data-rule-required="true" onChange="calTotal_f9()">';
							$landData	.= '<option value="" disabled selected> Select here</option>';
							$landData	.= '<option value="yes" point="10">Yes</option>';
							$landData	.= '<option value="no" point="0">no</option>';
						$landData	.= '</select>';
					$landData	.= '</div>';
				$landData	.= '</div>	';
								
				$landData	.= '<div class="control-group">';
					$landData	.= '<label for="text" class="control-label" style="margin-top:10px">Soil Depth<span style="color:#F00">*</span></label>';
					$landData	.= '<div class="controls">';
						$landData	.= '<input placeholder="Soil Depth" type="text" id="f9_soil_depth'.$contentCountLand.'" name="f9_soil_depth'.$contentCountLand.'" class="input-xlarge" value="" data-rule-required="true"> In Feets';
					$landData	.= '</div>';
				$landData	.= '</div>  ';
								
				$landData	.= '<div class="control-group">';
					$landData	.= '<label for="text" class="control-label" style="margin-top:10px">Source Of Water';
					$landData	.= '<span style="color:#F00">*</span></label>';
					$landData	.= '<div class="controls">';
						
						$landData	.= '<div id="div_f9_source_of_water'.$contentCountLand.'">';
                    		
                    		$sql_get_f9_water_source_list	= " SELECT * FROM `tbl_water_source` WHERE `status`='1' AND water_source NOT IN (SELECT DISTINCT(water_source_name) FROM tbl_f9_farmer_water_source WHERE fm_id='".$farmer_id."' AND count='".$contentCountLand."') ";	
							$res_get_f9_water_source_list 	= mysqli_query($db_con, $sql_get_f9_water_source_list) or die(mysqli_error($db_con));

							if($res_get_f9_water_source_list)
							{
								$num_get_f9_water_source_list	= mysqli_num_rows($res_get_f9_water_source_list);

								$landData 	.= '<select id="f9_source_of_water'.$contentCountLand.'" name="f9_source_of_water'.$contentCountLand.'[]" multiple="multiple"  onChange="console.log($(this).children(\':selected\').length)" placeholder="Select Water Source" class="select2-me input-xxlarge" data-rule-required="true">'; 
									if($num_get_f9_water_source_list != 0)
									{
										while($row_get_f9_water_source_list	= mysqli_fetch_array($res_get_f9_water_source_list))
										{
											$landData 	.= '<option point="'.$row_get_f9_water_source_list['points'].'" value="'.$row_get_f9_water_source_list['water_source'].'">'.trim(ucwords($row_get_f9_water_source_list['water_source'])).'</option>';
										}
									}
									else
									{
										$landData 	.= '<option point="0" value="">No Match Found</option>';
									}
								$landData 	.= '</select>';

								$landData 	.= '<script type="text/javascript">';
									$landData 	.= '$("#f9_source_of_water'.$contentCountLand.'").select2();';
								$landData 	.= '</script>';

								$landData 	.= '<input value="Add Here" class="btn-success" type="button" onclick="addf9WaterSource('.$farmer_id.', '.$contentCountLand.');">';
								
								// Query For getting the Service Provider list for that user
						        $sql_get_f9_farmer_water_source	= " SELECT * FROM `tbl_f9_farmer_water_source` WHERE `fm_id`='".$farmer_id."' AND `count`='".$contentCountLand."' ";
						        $res_get_f9_farmer_water_source	= mysqli_query($db_con, $sql_get_f9_farmer_water_source) or die(mysqli_error($db_con));
						        $num_get_f9_farmer_water_source	= mysqli_num_rows($res_get_f9_farmer_water_source);
						        $startOffset_f9	= 0;
								
								$landData 	.= '<table class="table table-bordered dataTable">';
									$landData 	.= '<thead>';
										$landData 	.= '<th>Sr. No.</th>';
						        		$landData 	.= '<th>Water Source</th>';
						        		$landData 	.= '<th style="text-align:center">';
						        			$landData 	.= '<div style="text-align:center">';
						        				$landData 	.= '<input type="button" value="Delete" onclick="multipleWaterSourceDelete('.$farmer_id.', '.$contentCountLand.');" class="btn-danger"/>';
						        			$landData 	.= '</div>';
						        		$landData 	.= '</th>';
									$landData 	.= '</thead>';
									$landData 	.= '<tbody>';
										
										if($num_get_f9_farmer_water_source != 0)
						        		{
						        			while($row_get_f9_farmer_water_source = mysqli_fetch_array($res_get_f9_farmer_water_source))
						        			{
						        				$landData 	.= '<tr>';
													$landData 	.= '<td>'.++$startOffset_f9.'</td>';
													$landData 	.= '<td>'.ucwords($row_get_f9_farmer_water_source['water_source_name']).'</td>';
													$landData 	.= '<td align="center">';
														$landData 	.= '<input type="checkbox" value="'.$row_get_f9_farmer_water_source['id'].'" id="f9_water_source_'.$row_get_f9_farmer_water_source['id'].'" name="f9_water_source_'.$row_get_f9_farmer_water_source['id'].'" class="css-checkbox f9_water_source">';
													$landData 	.= '</td>';
												$landData 	.= '</tr>';
						        			}
						        		}
						        		else
						        		{
						        			$landData 	.= '<tr>';
						            			$landData 	.= '<td>&nbsp;</td>';
												$landData 	.= '<td>No Match Found</td>';
						            			$landData 	.= '<td>&nbsp;</td>';
						        			$landData 	.= '</tr>';
						        		}
									$landData 	.= '</tbody>';
								$landData 	.= '</table>';
						    }
						$landData	.= '</div>';
					$landData	.= '</div>';
				$landData	.= '</div>  ';
			$landData	.= '</div>';
		$landData	.= '</div>';

		quit(utf8_encode($landData),1);
	}

	if((isset($obj->addCurCropData)) == 1 && (isset($obj->addCurCropData)))
	{
		$contentCountCurCrop	= $obj->contentCountCurCrop;
		$fm_id 					= $obj->farmer_id;

		$curCropData 			= '';

		$curCropData	.= '<div id="curcrop'.$contentCountCurCrop.'" style="padding:5px;border:1px solid #d6d6d6;margin:5px;display:none;">';
			$curCropData	.= '<input type="hidden" name="id[]" id="id" value="">';
			$curCropData	.= '<h3>Current Crop '.$contentCountCurCrop.' Forecast</h3>';
							
			$curCropData	.= '<div class="control-group">';
				$curCropData	.= '<label for="text" class="control-label" style="margin-top:10px">What type of crop planned?<span style="color:#F00">*</span></label>';
				$curCropData	.= '<div class="controls">';
					$curCropData	.= '<select id="f14_crop_type'.$contentCountCurCrop.'" name="f14_crop_type'.$contentCountCurCrop.'" class="select2-me input-xlarge" data-rule-required="true">';
						$curCropData	.= '<option value="" disabled selected> Select here</option>';
						$curCropData	.= '<option value="Commercial" >Commercial</option>';
						$curCropData	.= '<option value="Seasonal" >Seasonal</option>';
					$curCropData	.= '</select>';
				$curCropData	.= '</div>';
			$curCropData	.= '</div>';
							
			$curCropData	.= '<div class="control-group">';
				$curCropData	.= '<label for="text" class="control-label" style="margin-top:10px">Type Of Crop Cultivating This Year<span style="color:#F00">*</span></label>';
				$curCropData	.= '<div class="controls">';
					$curCropData	.= '<select id="f14_cultivating'.$contentCountCurCrop.'" name="f14_cultivating'.$contentCountCurCrop.'" class="select2-me input-xlarge" data-rule-required="true" onchange="get_variety(this.value,'.$contentCountCurCrop.')">';
						$curCropData	.= '<option value=""  selected> Select here</option>';
						$crops = lookup_value('tbl_crops',array(),array("crop_status"=>1),array(),array(),array());
						while($crop = mysqli_fetch_array($crops))
						{
							$curCropData	.= '<option value="'.$crop['crop_id'].'" point="7" >'.trim($crop['crop_name']).'</option>'; 
						}
					$curCropData	.= '</select>';
				$curCropData	.= '</div>';
			$curCropData	.= '</div>';
								
			$curCropData	.= '<div class="control-group">';
				$curCropData	.= '<label for="text" class="control-label" style="margin-top:10px">Variety<span style="color:#F00">*</span></label>';
				$curCropData	.= '<div class="controls">';
					$curCropData	.= '<select id="f14_variety'.$contentCountCurCrop.'" name="f14_variety'.$contentCountCurCrop.'" class="select2-me input-xlarge" data-rule-required="true" >';
						$curCropData	.= '<option value="" disabled selected> Select here</option>';
						// 				//if(isset($crops_arr[$i]['f14_cultivating']) && $crops_arr[$i]['f14_cultivating']!="")
						// 				//{
						// 					$result     = lookup_value('tbl_crop_varieties',array(),array("fk_crop_id"=>$crops_arr[$i]['f14_cultivating']),array(),array(),array());
						// 					if($result)
						// 					{
						// 						while($row = mysqli_fetch_array($result))
						// 						{
						// $curCropData	.= '<option value="'.$row['variety_id'].'">'.trim($row['variety_name']).' '.trim($row['variety_type']).'</option>';
						// 						}
						// 					}
						// 					else
						// 					{
						// $curCropData	.= '<option value="NA">NA</option>';
						// 					}
						// 				//}
					$curCropData	.= '</select>';
				$curCropData	.= '</div>';
			$curCropData	.= '</div>';
							
			$curCropData	.= '<div class="control-group">';
				$curCropData	.= '<label for="text" class="control-label" style="margin-top:10px">What is the total acrage you are planning for crop '.$contentCountCurCrop.'<span style="color:#F00">*</span></label>';
				$curCropData	.= '<div class="controls">';
					//$curCropData	.= '<input type="text" value="" id="f14_total_acrage'.$contentCountCurCrop.'" name="f14_total_acrage'.$contentCountCurCrop.'" class="input-xlarge" onKeyPress="return numsonly(event);" maxlength="10" data-rule-required="true" placeholder="What is the total acrage you are planning for crop '.$contentCountCurCrop.'">';
					$curCropData	.= '<input type="text" onKeyUp="getAcre_f14(this.value, \'hector\', \'f14_total_acrage'.$contentCountCurCrop.'\', '.$contentCountCurCrop.');" value="" id="f14_total_hector'.$contentCountCurCrop.'" name="f14_total_hector'.$contentCountCurCrop.'" class="input-small" onKeyPress="return numsonly(event);" maxlength="10" placeholder="Hector">';
					$curCropData	.= '<input type="text" onKeyUp="getAcre_f14(this.value, \'acre\', \'f14_total_acrage'.$contentCountCurCrop.'\', '.$contentCountCurCrop.');" value="" id="f14_total_acre'.$contentCountCurCrop.'" name="f14_total_acre'.$contentCountCurCrop.'" class="input-small" onKeyPress="return numsonly(event);" maxlength="10" placeholder="Acre">';
					$curCropData	.= '<input type="text" onKeyUp="getAcre_f14(this.value, \'guntha\', \'f14_total_acrage'.$contentCountCurCrop.'\', '.$contentCountCurCrop.');" value="" id="f14_total_guntha'.$contentCountCurCrop.'" name="f14_total_guntha'.$contentCountCurCrop.'" class="input-small" onKeyPress="return numsonly(event);" maxlength="10" placeholder="Guntha">';
					$curCropData	.= '<input type="text" value="" id="f14_total_acrage'.$contentCountCurCrop.'" name="f14_total_acrage'.$contentCountCurCrop.'" class="input-large" onKeyPress="return numsonly(event);" maxlength="10" data-rule-required="true" placeholder="Total Acrage" readonly>Acre';
				$curCropData	.= '</div>';
			$curCropData	.= '</div>';
							
			$curCropData	.= '<div class="control-group">';
				$curCropData	.= '<label for="text" class="control-label" style="margin-top:10px">Expected Yield<span style="color:#F00">*</span></label>';
				$curCropData	.= '<div class="controls">';
					$curCropData	.= '<input type="text" value="" id="f14_expected_yeild'.$contentCountCurCrop.'" name="f14_expected_yeild'.$contentCountCurCrop.'" class="input-xlarge" onKeyPress="return numsonly(event);" maxlength="10" data-rule-required="true" placeholder="Expected Yield">';
				$curCropData	.= '</div>';
			$curCropData	.= '</div>';
							
			$curCropData	.= '<div class="control-group">';
				$curCropData	.= '<label for="text" class="control-label" style="margin-top:10px">What type of seeds you plan to buy?<span style="color:#F00">*</span></label>';
				$curCropData	.= '<div class="controls">';
					$curCropData	.= '<select id="f14_seed_type'.$contentCountCurCrop.'" name="f14_seed_type'.$contentCountCurCrop.'" class="select2-me input-xlarge" data-rule-required="true" onchange="calTotal_f14();">';
						$curCropData	.= '<option value="" disabled selected> Select here</option>';
						$curCropData	.= '<option point="10" value="Hybrid">Hybrid</option>';
						$curCropData	.= '<option point="0" value="Non Hybrid">Non-Hybrid</option>';
					$curCropData	.= '</select>';
				$curCropData	.= '</div>';
			$curCropData	.= '</div>';
							
			$curCropData	.= '<div class="control-group">';
            $curCropData	.= '    <label for="text" class="control-label" style="margin-top:10px">How much was the total consumption of Fertilizer in KGs <span style="color:#F00">*</span></label>';
            $curCropData	.= '    <div class="controls">';
            $curCropData	.= '        <input type="text" id="f14_consumption_fertilizer'.$contentCountCurCrop.'" name="f14_consumption_fertilizer'.$contentCountCurCrop.'" class="input-xlarge" onKeyPress="return numsonly(event);" maxlength="10" data-rule-required="true" placeholder="How much was the total consumption of Fertilizer in KGs"> KGs';
            $curCropData	.= '    </div>';
            $curCropData	.= '</div>';

            $curCropData	.= '<div class="control-group">';
            $curCropData	.= '    <label for="text" class="control-label" style="margin-top:10px">How much was the total consumption of Seeds in KGs <span style="color:#F00">*</span></label>';
            $curCropData	.= '    <div class="controls">';
            $curCropData	.= '        <input type="text" id="f14_consumption_seeds'.$contentCountCurCrop.'" name="f14_consumption_seeds'.$contentCountCurCrop.'" class="input-xlarge" onKeyPress="return numsonly(event);" maxlength="10" data-rule-required="true" placeholder="How much was the total consumption of Seeds in KGs"> KGs';
            $curCropData	.= '    </div>';
            $curCropData	.= '</div>';

            $curCropData	.= '<div class="control-group">';
            $curCropData	.= '    <label for="text" class="control-label" style="margin-top:10px">How much was the total consumption of Pesticides in KGs <span style="color:#F00">*</span></label>';
            $curCropData	.= '    <div class="controls">';
            $curCropData	.= '        <input type="text" id="f14_consumption_pesticides'.$contentCountCurCrop.'" name="f14_consumption_pesticides'.$contentCountCurCrop.'" class="input-xlarge" onKeyPress="return numsonly(event);" maxlength="10" data-rule-required="true" placeholder="How much was the total consumption of Pesticides in KGs"> KGs';
            $curCropData	.= '    </div>';
            $curCropData	.= '</div>';

            $curCropData	.= '<div class="control-group">';
            $curCropData	.= '    <label for="text" class="control-label" style="margin-top:10px">How much was the total consumption of Other Inputs in KGs <span style="color:#F00">*</span></label>';
            $curCropData	.= '    <div class="controls">';
            $curCropData	.= '        <input type="text" id="f14_consumption_other_inputs'.$contentCountCurCrop.'" name="f14_consumption_other_inputs'.$contentCountCurCrop.'" class="input-xlarge" onKeyPress="return numsonly(event);" maxlength="10" data-rule-required="true" placeholder="How much was the total consumption of Other Inputs in KGs"> KGs';
            $curCropData	.= '    </div>';
            $curCropData	.= '</div>';


			$curCropData	.= '<div class="control-group">';
            $curCropData	.= '    <label for="text" class="control-label" style="margin-top:10px">How much money you spend in buying seeds?<span style="color:#F00">*</span></label>';
            $curCropData	.= '    <div class="controls">';
            $curCropData	.= '        <input type="text" onBlur="getTotalMoneySpend(\'f14_spend_money\', \'f14_spend_money_fertiliser\', \'f14_spend_money_pesticide\', \'f14_spend_money_labour\', \'f14_spend_money_other_expenses\', \'f14_spend_money_total\','.$contentCountCurCrop.');" id="f14_spend_money'.$contentCountCurCrop.'" name="f14_spend_money'.$contentCountCurCrop.'" class="input-xlarge" onKeyPress="return numsonly(event);" maxlength="10" data-rule-required="true" placeholder="money you spend in buying seeds">Rs';
            $curCropData	.= '    </div>';
            $curCropData	.= '</div>';

			$curCropData	.= '<div class="control-group">';
            $curCropData	.= '    <label for="text" class="control-label" style="margin-top:10px">How much money you spend in buying Fertiliser?<span style="color:#F00">*</span></label>';
            $curCropData	.= '    <div class="controls">';
            $curCropData	.= '        <input type="text" onBlur="getTotalMoneySpend(\'f14_spend_money\', \'f14_spend_money_fertiliser\', \'f14_spend_money_pesticide\', \'f14_spend_money_labour\', \'f14_spend_money_other_expenses\', \'f14_spend_money_total\','.$contentCountCurCrop.');" id="f14_spend_money_fertiliser'.$contentCountCurCrop.'" name="f14_spend_money_fertiliser'.$contentCountCurCrop.'" class="input-xlarge" onKeyPress="return numsonly(event);" maxlength="10" data-rule-required="true" placeholder="money you spend in buying fertiliser">Rs';
            $curCropData	.= '    </div>';
            $curCropData	.= '</div>';

            $curCropData	.= '<div class="control-group">';
            $curCropData	.= '    <label for="text" class="control-label" style="margin-top:10px">How much money you spend in buying Pesticide?<span style="color:#F00">*</span></label>';
            $curCropData	.= '    <div class="controls">';
            $curCropData	.= '        <input type="text" onBlur="getTotalMoneySpend(\'f14_spend_money\', \'f14_spend_money_fertiliser\', \'f14_spend_money_pesticide\', \'f14_spend_money_labour\', \'f14_spend_money_other_expenses\', \'f14_spend_money_total\','.$contentCountCurCrop.');" id="f14_spend_money_pesticide'.$contentCountCurCrop.'" name="f14_spend_money_pesticide'.$contentCountCurCrop.'" class="input-xlarge" onKeyPress="return numsonly(event);" maxlength="10" data-rule-required="true" placeholder="money you spend in buying pesticide">Rs';
            $curCropData	.= '    </div>';
            $curCropData	.= '</div>';

            $curCropData	.= '<div class="control-group">';
            $curCropData	.= '    <label for="text" class="control-label" style="margin-top:10px">How much money you spend in buying Labour?<span style="color:#F00">*</span></label>';
            $curCropData	.= '    <div class="controls">';
            $curCropData	.= '        <input type="text" onBlur="getTotalMoneySpend(\'f14_spend_money\', \'f14_spend_money_fertiliser\', \'f14_spend_money_pesticide\', \'f14_spend_money_labour\', \'f14_spend_money_other_expenses\', \'f14_spend_money_total\','.$contentCountCurCrop.');" id="f14_spend_money_labour'.$contentCountCurCrop.'" name="f14_spend_money_labour'.$contentCountCurCrop.'" class="input-xlarge" onKeyPress="return numsonly(event);" maxlength="10" data-rule-required="true" placeholder="money you spend in buying labour">Rs';
            $curCropData	.= '    </div>';
            $curCropData	.= '</div>';

            $curCropData	.= '<div class="control-group">';
            $curCropData	.= '    <label for="text" class="control-label" style="margin-top:10px">How much money you spend in buying Other Expenses?<span style="color:#F00">*</span></label>';
            $curCropData	.= '    <div class="controls">';
            $curCropData	.= '        <input type="text" onBlur="getTotalMoneySpend(\'f14_spend_money\', \'f14_spend_money_fertiliser\', \'f14_spend_money_pesticide\', \'f14_spend_money_labour\', \'f14_spend_money_other_expenses\', \'f14_spend_money_total\','.$contentCountCurCrop.');" id="f14_spend_money_other_expenses'.$contentCountCurCrop.'" name="f14_spend_money_other_expenses'.$contentCountCurCrop.'" class="input-xlarge" onKeyPress="return numsonly(event);" maxlength="10" data-rule-required="true" placeholder="money you spend in buying other expenses">Rs';
            $curCropData	.= '    </div>';
            $curCropData	.= '</div>';

            $curCropData	.= '<div class="control-group">';
            $curCropData	.= '    <label for="text" class="control-label" style="margin-top:10px">Total spend money for this Crop<span style="color:#F00">*</span></label>';
            $curCropData	.= '    <div class="controls">';
            $curCropData	.= '        <input readonly type="text" id="f14_spend_money_total'.$contentCountCurCrop.'" name="f14_spend_money_total'.$contentCountCurCrop.'" class="input-xlarge" onKeyPress="return numsonly(event);" maxlength="10" data-rule-required="true" placeholder="Total spend money for this Crop">Rs';
            $curCropData	.= '    </div>';
            $curCropData	.= '</div>';

            $curCropData	.= '<div class="control-group">';
            $curCropData	.= '    <label for="text" class="control-label" style="margin-top:10px">Total Profit Gained for this crop? <span style="color:#F00">*</span></label>';
            $curCropData	.= '    <div class="controls">';
            $curCropData	.= '        <input type="text" id="f14_total_profit_gained'.$contentCountCurCrop.'" name="f14_total_profit_gained'.$contentCountCurCrop.'" class="input-xlarge" onKeyPress="return numsonly(event);" maxlength="10" data-rule-required="true" placeholder="Total Profit Gained for this crop">Rs';
            $curCropData	.= '    </div>';
            $curCropData	.= '</div>';
							
			$curCropData	.= '<div class="control-group">';
				$curCropData	.= '<label for="text" class="control-label" style="margin-top:10px">Do you use self grown seeds from previous crop?<span style="color:#F00">*</span></label>';
				$curCropData	.= '<div class="controls">';
					$curCropData	.= '<select id="f14_use_self_grown_seeds'.$contentCountCurCrop.'" name="f14_use_self_grown_seeds'.$contentCountCurCrop.'" class="select2-me input-xlarge" data-rule-required="true">';
						$curCropData	.= '<option value="" disabled selected> Select here</option>';
						$curCropData	.= '<option value="yes">Yes</option>';
						$curCropData	.= '<option value="no">No</option>';
					$curCropData	.= '</select>';
				$curCropData	.= '</div>';
			$curCropData	.= '</div>';
							
			$curCropData	.= '<div class="control-group">';
				$curCropData	.= '<label for="text" class="control-label" style="margin-top:10px">Potential Crop Damage<span style="color:#F00">*</span></label>';
				$curCropData	.= '<div class="controls">';
					$curCropData	.= '<select id="f14_diseases'.$contentCountCurCrop.'" name="f14_diseases'.$contentCountCurCrop.'" class="select2-me input-xlarge" data-rule-required="true">';
						$curCropData	.= '<option value="" disabled selected> Select here</option>';
						$curCropData	.= '<option value="Disease" > Disease</option>';
						$curCropData	.= '<option value="Pest"> Pest</option>';
						$curCropData	.= '<option value="Both">Both</option>';
						//$curCropData	.= '<option value="Treatable"> Treatable</option>';
						$curCropData	.= '<option value="None"> None</option>';
					$curCropData	.= '</select>';
				$curCropData	.= '</div>';
			$curCropData	.= '</div>';
							
			$curCropData	.= '<div class="control-group">';
				$curCropData	.= '<label for="text" class="control-label" style="margin-top:10px">What type of water sources you are depending on?<span style="color:#F00">*</span></label>';
				$curCropData	.= '<div class="controls">';
					$curCropData	.= '<div id="div_f14_water_source_type'.$contentCountCurCrop.'">';
                		// Query For getting the list of Water Source
						$sql_get_f14_water_source_list	= " SELECT * FROM `tbl_water_source` WHERE `status`='1' AND water_source NOT IN (SELECT DISTINCT(water_source_name) FROM tbl_f14_farmer_water_source WHERE fm_id='".$fm_id."' AND count='".$contentCountCurCrop."') ";
						$res_get_f14_water_source_list 	= mysqli_query($db_con, $sql_get_f14_water_source_list) or die(mysqli_error($db_con));

						if($res_get_f14_water_source_list)
						{
							$num_get_f14_water_source_list	= mysqli_num_rows($res_get_f14_water_source_list);

							$curCropData	.= '<select id="f14_water_source_type'.$contentCountCurCrop.'" name="f14_water_source_type'.$contentCountCurCrop.'[]" multiple="multiple"  onChange="console.log($(this).children(\':selected\').length)" placeholder="Select Water Source" class="select2-me input-xxlarge" data-rule-required="true">';
					    		if($num_get_f14_water_source_list != 0)
								{
									while($row_get_f14_water_source_list	= mysqli_fetch_array($res_get_f14_water_source_list))
									{
					            		$curCropData	.= '<option point="'.$row_get_f14_water_source_list['points'].'" value="'.$row_get_f14_water_source_list['water_source'].'">'.trim(ucwords($row_get_f14_water_source_list['water_source'])).'</option>';
					    			}
								}
								else
								{
						    		$curCropData	.= '<option point="0" value="">No Match Found</option>';
					    		}
					        $curCropData	.= '</select>';

					        $curCropData 	.= '<script type="text/javascript">';
								$curCropData 	.= '$("#f14_water_source_type'.$contentCountCurCrop.'").select2();';
							$curCropData 	.= '</script>';

							$curCropData	.= '<input value="Add Here" class="btn-success" type="button" onclick="addf14WaterSource('.$fm_id.', '.$contentCountCurCrop.');">';
							// Query For getting the Service Provider list for that user
					        $sql_get_f14_farmer_water_source	= " SELECT * FROM `tbl_f14_farmer_water_source` WHERE `fm_id`='".$fm_id."' AND count='".$contentCountCurCrop."' ";
					        $res_get_f14_farmer_water_source	= mysqli_query($db_con, $sql_get_f14_farmer_water_source) or die(mysqli_error($db_con));
					        $num_get_f14_farmer_water_source	= mysqli_num_rows($res_get_f14_farmer_water_source);
					        $startOffset_f14	= 0;
						    $curCropData	.= '<table class="table table-bordered dataTable">';
					        	$curCropData	.= '<thead>';
					        		$curCropData	.= '<th>Sr. No.</th>';
					        		$curCropData	.= '<th>Water Source</th>';
					        		$curCropData	.= '<th style="text-align:center">';
					        			$curCropData	.= '<div style="text-align:center">';
					        				$curCropData	.= '<input type="button" value="Delete" onclick="multipleWaterSourceDelete_f14('.$fm_id.', '.$contentCountCurCrop.');" class="btn-danger"/>';
					        			$curCropData	.= '</div>';
					        		$curCropData	.= '</th>';
					        	$curCropData	.= '</thead>';
					        	$curCropData	.= '<tbody>';
					        		if($num_get_f14_farmer_water_source != 0)
					        		{
					        			while($row_get_f14_farmer_water_source = mysqli_fetch_array($res_get_f14_farmer_water_source))
					        			{
					        				$curCropData	.= '<tr>';
												$curCropData	.= '<td>'.++$startOffset_f14.'</td>';
												$curCropData	.= '<td>'.ucwords($row_get_f14_farmer_water_source['water_source_name']).'</td>';
												$curCropData	.= '<td align="center">';
													$curCropData	.= '<input type="checkbox" value="'.$row_get_f14_farmer_water_source['id'].'" id="f14_water_source_'.$row_get_f14_farmer_water_source['id'].'" name="f14_water_source_'.$row_get_f14_farmer_water_source['id'].'" class="css-checkbox f14_water_source">';
												$curCropData	.= '</td>';
											$curCropData	.= '</tr>';
					        			}
					        		}
					        		else
					        		{
					        			$curCropData	.= '<tr>';
					            			$curCropData	.= '<td>&nbsp;</td>';
											$curCropData	.= '<td>No Match Found</td>';
					            			$curCropData	.= '<td>&nbsp;</td>';
					        			$curCropData	.= '</tr>';
					        		}
					        	$curCropData	.= '</tbody>';
					        $curCropData	.= '</table>';
					    }
					$curCropData	.= '</div>';
				$curCropData	.= '</div>';
			$curCropData	.= '</div>';
							
			$curCropData	.= '<div class="control-group">';
				$curCropData	.= '<label for="tasktitel" class="control-label">When is the harvest date? <span style="color:#F00">*</span></label>';
				$curCropData	.= '<div class="controls">';
					$curCropData	.= '<input type="text" value="" id="f14_harvest_date'.$contentCountCurCrop.'" name="f14_harvest_date'.$contentCountCurCrop.'" placeholder="When is the harvest date" class="datepicker'.$contentCountCurCrop.' input-large" data-rule-required="true" />';
				$curCropData	.= '</div>';
			$curCropData	.= '</div>';
							
			$curCropData	.= '<div class="control-group">';
				$curCropData	.= '<label for="text" class="control-label" style="margin-top:10px">What is the net total income you are expecting in this crop cycle?<span style="color:#F00">*</span></label>';
				$curCropData	.= '<div class="controls">';
					$curCropData	.= '<input type="text" value="" id="f14_income'.$contentCountCurCrop.'" name="f14_income'.$contentCountCurCrop.'" class="input-xlarge" onKeyPress="return numsonly(event);" maxlength="10" data-rule-required="true" placeholder="What is the net total income you are expecting in this crop cycle">';
				$curCropData	.= '</div>';
			$curCropData	.= '</div>';
		$curCropData	.= '</div>';

		$curCropData 	.= '<script type="text/javascript">';
			$curCropData 	.= '$("#f14_crop_type'.$contentCountCurCrop.'").select2();';
			$curCropData 	.= '$("#f14_cultivating'.$contentCountCurCrop.'").select2();';
			$curCropData 	.= '$("#f14_variety'.$contentCountCurCrop.'").select2();';
			$curCropData 	.= '$("#f14_seed_type'.$contentCountCurCrop.'").select2();';
			$curCropData 	.= '$("#f14_use_self_grown_seeds'.$contentCountCurCrop.'").select2();';
			$curCropData 	.= '$("#f14_diseases'.$contentCountCurCrop.'").select2();';
		$curCropData 	.= '</script>';

		quit(utf8_encode($curCropData),1);
	}
?>
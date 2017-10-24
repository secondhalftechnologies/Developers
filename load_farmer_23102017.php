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
					$sql_insert_farmer_details	.= " `f1_required_loan`, `f1_required_loan_amt`, `f1_loan_purpose`, `f1_crop_cycle`) ";
					$sql_insert_farmer_details	.= " VALUES ('".$fm_caid."', '".$fm_id."', '".$txt_mother_name."', ";
					$sql_insert_farmer_details	.= " '".$txt_father_name."', '".$txt_age."', '".$txt_dob."', '".$fm_mobileno."', ";
					$sql_insert_farmer_details	.= " '".$alt_mobileno."', '".$txt_farm_experience."', '1', '".$datetime."', '".$fm_caname."', ";
					$sql_insert_farmer_details	.= " '".$hid_personal_details_points."', '".$f1_required_loan."', '".$f1_required_loan_amt."', ";
					$sql_insert_farmer_details	.= " '".$f1_loan_purpose."', '".$f1_crop_cycle."') ";
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
					// Query for updating the farmer personal details into tbl_personal_detail
					$sql_update_farmer_details	= " UPDATE `tbl_personal_detail` ";
					$sql_update_farmer_details	.= " 	SET `f1_mfname`='".$txt_mother_name."', ";
					$sql_update_farmer_details	.= " 		`f1_father`='".$txt_father_name."', ";
					$sql_update_farmer_details	.= " 		`f1_age`='".$txt_age."', ";
					$sql_update_farmer_details	.= " 		`f1_dob`='".$txt_dob."', ";
					$sql_update_farmer_details	.= " 		`f1_mobno`='".$fm_mobileno."', ";
					$sql_update_farmer_details	.= " 		`f1_altno`='".$alt_mobileno."', ";
					$sql_update_farmer_details	.= " 		`f1_expfarm`='".$txt_farm_experience."', ";
					$sql_update_farmer_details	.= " 		`f1_required_loan`='".$f1_required_loan."', ";
					$sql_update_farmer_details	.= " 		`f1_required_loan_amt`='".$f1_required_loan_amt."', ";
					$sql_update_farmer_details	.= " 		`f1_loan_purpose`='".$f1_loan_purpose."', ";
					$sql_update_farmer_details	.= " 		`f1_crop_cycle`='".$f1_crop_cycle."', ";
					$sql_update_farmer_details	.= " 		`f1_status`='1', ";
					$sql_update_farmer_details	.= " 		`f1_points`='".$hid_personal_details_points."', ";
					$sql_update_farmer_details	.= " 		`f1_modified_date`='".$datetime."', ";
					$sql_update_farmer_details	.= " 		`f1_modified_by`='".$fm_caname."' ";
					$sql_update_farmer_details	.= " WHERE `fm_id`='".$hid_fm_id."' ";
					$res_update_farmer_details	= mysqli_query($db_con, $sql_update_farmer_details) or die(mysqli_error($db_con));
					
 					if($res_update_farmer_details)
					{
						// Query for inserting the married status in tbl_spouse_details
						$sql_update_farmer_IsMarried	= " UPDATE `tbl_spouse_details` ";
						$sql_update_farmer_IsMarried	.= " 	SET `f3_married`='".$ddl_married_status."', ";
						$sql_update_farmer_IsMarried	.= " 		`f3_married_reg_points`='".$f3_married_reg_points."', ";
						$sql_update_farmer_IsMarried	.= " 		`f3_modified_date`='".$datetime."', ";
						$sql_update_farmer_IsMarried	.= " 		`f3_modified_by`='".$fm_caname."' ";
						$sql_update_farmer_IsMarried	.= "  WHERE `fm_id`='".$hid_fm_id."' ";
						$res_update_farmer_IsMarried	= mysqli_query($db_con, $sql_update_farmer_IsMarried) or die(mysqli_error($db_con));
						
						if($res_update_farmer_IsMarried)
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
							
							if($res_update_farmer_address)
							{
								// Query for updating the record for Points of the f1 and f7
								$sql_update_points	= " UPDATE `tbl_points` ";
								$sql_update_points	.= " 	SET `pt_frm1`='".$hid_personal_details_points."', ";
								$sql_update_points	.= " 		`pt_frm3`='".$f3_married_reg_points."', ";
								$sql_update_points	.= " 		`pt_frm7`='".$hid_residence_points."' ";
								$sql_update_points	.= " WHERE `fm_id`='".$hid_fm_id."' ";
								$res_update_points	= mysqli_query($db_con, $sql_update_points) or die(mysqli_error($db_con));
								
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
		$pt_row	= '';
		 
		if($page != "" && $per_page != "")	
		{
			$cur_page 		= $page;
			$page 	   	   	= $page - 1;
			$start_offset += $page * $per_page;
			$start 			= $page * $per_page;
				
			$sql_load_data  = " select * from tbl_farmers ";
			if(strcmp($hid_user_type,'Admin')!==0)
			{
				$sql_load_data  .= " where fm_caid='".$hid_ca_id."' ";
			}
			if($search_text != "")
			{
				$sql_load_data .= " and (fm_name like '%".$search_text."%' or fm_aadhar like '%".$search_text."%' ";
				$sql_load_data .= " or fm_mobileno like '%".$search_text."%') ";	
			}
			
			$data_count		= 	dataPagination($sql_load_data,$per_page,$start,$cur_page);		
			$sql_load_data .=" ORDER BY id DESC LIMIT $start, $per_page ";
			$result_load_data = mysqli_query($db_con,$sql_load_data) or die(mysqli_error($db_con));			
			
					
			if(strcmp($data_count,"0") !== 0)
			{		
				$cat_data = "";			
				
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

							$sum_of_points	= $pt_row['pt_frm1'] + $pt_row['pt_frm2'] + $pt_row['pt_frm3'] + $pt_row['pt_frm4'] + $pt_row['pt_frm5'] + $pt_row['pt_frm6'] + $pt_row['pt_frm7'] + $pt_row['pt_frm8'] + $pt_row['pt_frm8_fh'] + $pt_row['pt_frm9'] + $pt_row['pt_frm10'] + $pt_row['pt_frm11'] + $pt_row['pt_frm12'] + $pt_row['pt_frm13'] + $pt_row['pt_frm14'];
					
							$avg_of_points	= round($sum_of_points / 15, 2);
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
							$sql_check_point  	.= " 	AND pt_frm3 !='' AND pt_frm8_fh !='' ";
							$sql_check_point  	.= " 	AND pt_frm6 !='' AND pt_frm7 !='' ";
							$sql_check_point  	.= " 	AND pt_frm8 !='' AND pt_frm9 !='' ";
							$sql_check_point  	.= " 	AND pt_frm10 !='' AND pt_frm5 !='' ";
							$sql_check_point  	.= " 	AND pt_frm12 !='' AND pt_frm13 !='' ";
							$sql_check_point  	.= " 	AND pt_frm11 !='' ";
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
					$cat_data .= '</tr>';															
				}	
				$cat_data .= '</tbody>';
				$cat_data .= '</table>';	
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
?>
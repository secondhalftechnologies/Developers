<?php
	include('access1.php'); 
	include('include/connection.php');
	include('include/query-helper.php');
	include('include/pagination-helper.php');
	
	$fm_caname  = $_SESSION['sqyard_user'];

	if(isset($_POST['hid_user_reg']) && $_POST['hid_user_reg'] == '1')
	{
		$txt_email	= mysqli_real_escape_string($db_con,$_POST['txt_email']);
		$sql_adhnocheck		= " select * from tbl_change_agents where emailId = '".$txt_email."' ";
		$res_adhnocheck  	= mysqli_query($db_con,$sql_adhnocheck);
		$tot_adhnocheck 	= mysqli_num_rows($res_adhnocheck);
		
		if($tot_adhnocheck == 0)
		{
			$txt_name     = mysqli_real_escape_string($db_con,$_POST['txt_name']);
			$txt_userType = mysqli_real_escape_string($db_con,$_POST['txt_userType']);
			$txt_password = mysqli_real_escape_string($db_con,$_POST['txt_password']);
			$txt_mobileno = mysqli_real_escape_string($db_con,$_POST['txt_mobileno']);
			
			if($txt_email != '' && $txt_mobileno != '' && $txt_password != '')
			{
				// Query for inserting the users into tbl_change_agents table
				$sql_insert_adminusers	= " INSERT INTO `tbl_change_agents`(`userType`, `fname`, `emailId`, `contactno`, `password`, ";
				$sql_insert_adminusers	.= " `reg_status`, `register_dt`) ";
				$sql_insert_adminusers	.= " VALUES ('".$txt_userType."', '".$txt_name."', '".$txt_email."', '".$txt_mobileno."', ";
				$sql_insert_adminusers	.= " '".$txt_password."', '1', '".$datetime."') ";
				$res_insert_adminusers	= mysqli_query($db_con, $sql_insert_adminusers) or die(mysqli_error($db_con));
				if($res_insert_adminusers)
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
				quit('Email,Mobile and Password no cannot be blank!!!');	
			}
		}
		else
		{
			quit('Email id already in use!!!');	
		}
	}
	
	if(isset($_POST['hid_user_edit']) && $_POST['hid_user_edit'] == '1')
	{
		$hid_user_id				= mysqli_real_escape_string($db_con,$_POST['hid_user_id']);
		
		$txt_email	= mysqli_real_escape_string($db_con,$_POST['txt_email']);
		$sql_adhnocheck		= "Select * from tbl_change_agents where emailId = '".$txt_email."' AND id ='".$hid_user_id."'";

		//quit('error',$sql_adhnocheck);

		$res_adhnocheck  	= mysqli_query($db_con,$sql_adhnocheck);
		$tot_adhnocheck 	= mysqli_num_rows($res_adhnocheck);
		
		if($tot_adhnocheck == 1)
		{
			$txt_name     = mysqli_real_escape_string($db_con,$_POST['txt_name']);
			$txt_userType = mysqli_real_escape_string($db_con,$_POST['txt_userType']);
			$txt_password = mysqli_real_escape_string($db_con,$_POST['txt_password']);
			$txt_mobileno = mysqli_real_escape_string($db_con,$_POST['txt_mobileno']);

			
			if($txt_email != '' && $txt_mobileno != '' && $txt_password != '')
			{
				// Query for Updating the farmer into tbl_farmers table
				$sql_update_farmer	= " UPDATE `tbl_change_agents` ";
				$sql_update_farmer	.= " 	SET `userType`='".$txt_userType."', ";
				$sql_update_farmer	.= " 		`fname`='".$txt_name."', ";
				$sql_update_farmer	.= " 		`emailId`='".$txt_email."', ";
				$sql_update_farmer	.= " 		`contactno`='".$txt_mobileno."', ";
				$sql_update_farmer	.= " 		`password`='".$txt_password."', ";
				$sql_update_farmer	.= " 		`updated_dt`='".$datetime."' ";
				$sql_update_farmer	.= " WHERE `id` = '".$hid_user_id."' ";
				$res_update_farmer	= mysqli_query($db_con, $sql_update_farmer) or die(mysqli_error($db_con));
				
				if($res_update_farmer)
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
				quit('Email, Mobile, Password no cannot be blank!!!');	
			}
		}
		else
		{
			quit('Email id  already in use!!!');	
		}	
	}
	
	
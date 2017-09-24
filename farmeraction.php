<?php 
	include('access1.php');
	include('connection.php');
	
	date_default_timezone_set("Asia/Calcutta");
	$register_dt		= date('Y-m-d H:i:s');
	$updated_dt			= '0000-00-00 00:00:00';
	$temp_dt			= date('d F Y');
	//generate random string
	/*function generateRandomString($length) 
	{

		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

		$randomString = '';

		for ($i = 0; $i < $length; $i++) {

			$randomString .= $characters[rand(0, strlen($characters) - 1)];

		}

		return $randomString;

	}	*/
	
	
		
		$fm_aadhar		    = mysqli_real_escape_string($db_con,$_POST['fm_aadhar']);	
		$sql_adhnocheck		= " select * from tbl_farmers where fm_aadhar = '".$fm_aadhar."' ";
		$res_adhnocheck  	= mysqli_query($db_con,$sql_adhnocheck);
		$tot_adhnocheck 	= mysqli_num_rows($res_adhnocheck);
		
		
	if($tot_adhnocheck == 0) 
	{
		//$code				= generateRandomString(10);	
		$fname				= mysqli_real_escape_string($db_con,$_POST['f1_fname']);
		$mname				= mysqli_real_escape_string($db_con,$_POST['f1_mname']);
		$lname				= mysqli_real_escape_string($db_con,$_POST['f1_lname']);
		
		$loan_want				= mysqli_real_escape_string($db_con,$_POST['loan_want']);
		$loan_amount				= mysqli_real_escape_string($db_con,$_POST['loan_amount']);
		
		$fm_name            = $fname." ".$mname." ".$lname;
		$fm_mobileno		= mysqli_real_escape_string($db_con,$_POST['fm_mobileno']);	
		$ipaddress			= $_SERVER['REMOTE_ADDR'];
		$fm_caid            = $_SESSION['ca_id'];
		$fm_caname            = $_SESSION['acrefin_user'];
	
	$sql_fm_id	= mysqli_query($db_con,"select fm_id from tbl_farmers order by id desc limit 0,1");
	$res_fm_id	= mysqli_fetch_array($sql_fm_id);
	$fm_id			= $res_fm_id['fm_id'];
	if($fm_id == '')
	{
		$fm_id	= 100000;
	}
	else
	{
		$fm_id	= $fm_id + 1;
	}
		
		if($fname != '' && $mname != '' && $lname !='' && $fm_mobileno != '' && $fm_aadhar != '')
		{
			$SQL_INS1	= " insert into tbl_farmers (fm_caid,fm_id,fm_name, fm_aadhar, fm_mobileno,fm_loan,fm_amount, fm_status,fm_createddt,fm_createdby,fm_modifieddt,fm_modifiedby)";
			//$SQL_INS1	.= " emailverificationcode, reg_status, register_dt) ";
			$SQL_INS1	.= " values('$fm_caid','$fm_id','$fm_name', '$fm_aadhar', '$fm_mobileno','$loan_want','$loan_amount', '1','$register_dt','$fm_caname','$updated_dt','')";
			//$SQL_INS1	.= " '$code', '$reg_status', '$register_dt')";	
			$RES_INS1	= mysqli_query($db_con,$SQL_INS1) or die(mysqli_error($db_con));
		
		if($RES_INS1)
		{   
		
			//updated by punit 18-03-2017
			//$user_id = mysqli_insert_id($db_con);

			//$sql_update1		= " UPDATE `tbl_mobile_otp` "; 
			//$sql_update1		.= " 	SET `user_id`='".$user_id."' ";
			//$sql_update1		.= " WHERE `mobile_num`='".$contactno."' ";
			//$res_update1            = mysqli_query($db_con,$sql_update1) or die(mysqli_error($db_con));
			//updated by punit 18-03-2017
				?>
				<script type="text/javascript">
					window.open('view_farmers.php?pag=farmers','_self');
                </script>
				<?php
				
		} 
		else
		{
		?>
			<script type="text/javascript">
			alert("Cant Add");
			history.go(-1);
			</script>
		<?php
		}
		
	  }
	 	else
	 	{
		
		?>
		<script type="text/javascript">
		alert("Name, Aadhar no, Mobile no cannot be blank!!!");
		history.go(-1);
		</script>
	<?php
		 
	 }
	}
	else
	{
		?>
		<script type="text/javascript">
		alert("Aadhar no already in use!!!");
		history.go(-1);
		</script>
	<?php
	}
	

	
?>
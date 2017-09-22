<?php 

include('../connection.php');

if($_POST){
	foreach ($_POST as $k => $value) {
		mysqli_real_escape_string($db_con,@$_POST[$k]);
	}
}

$table ='tbl_spouse_details';
if(isset($_POST['add_knowledge_detail']) && $_POST['add_knowledge_detail']==1)
{
	
	$data['fm_id']            = $_POST['fm_id'];
	$data['fm_caid']          = $_POST['fm_caid'];

	$data['f3_married']				= @$_POST['f3_married'];
	$data['f3_spouse_fname']		= @$_POST['f3_spouse_fname'];
	$data['f3_spouse_mname']		= @$_POST['f3_spouse_mname'];
	$data['f3_spouse_sname']		= @$_POST['f3_spouse_sname'];
	$data['f3_spouse_age']			= @$_POST['f3_spouse_age'];
	$data['f3_spouse_mobno']		= @$_POST['f3_spouse_mobno'];
	$data['f3_spouse_adhno']		= @$_POST['f3_spouse_adhno'];
	$data['f3_spouse_shg']			= @$_POST['f3_spouse_shg'];
	$data['f3_spouse_shgname']		= @$_POST['f3_spouse_shgname'];
	$data['f3_spouse_occp']			= @$_POST['f3_spouse_occp'];
	$data['f3_spouse_income']		= @$_POST['f3_spouse_income'];
	$data['f3_spouse_mfi']			= @$_POST['f3_spouse_mfi'];
	$data['f3_spouse_mfiname']		= @$_POST['f3_spouse_mfiname'];
	$data['f3_spouse_mfiamount']	= @$_POST['f3_spouse_mfiamount'];
	$data['f3_spouse_purpose']		= @$_POST['f3_spouse_purpose'];
	$data['f3_spouse_mfiremain']	= @$_POST['f3_spouse_mfiremain'];
	$data['f3_spouse_mfiemi']		= @$_POST['f3_spouse_mfiemi'];
	$data['f3_spouse_mfimonth']	    = @$_POST['f3_spouse_mfimonth'];
	
	$data['f3_spouse_mfioutstanding']      = @$_POST['f3_spouse_mfioutstanding'];
	$data['f3_spouse_mfirate']             = @$_POST['f3_spouse_mfirate'];
	$data['f3_spouse_mfitenure']       	= @$_POST['f3_spouse_mfitenure'];
	$data['f3_spouse_mfiinterest']     	= @$_POST['f3_spouse_mfiinterest'];
	$data['f3_spouse_mfitotalamount']      = @$_POST['f3_spouse_mfitotalamount'];
	$data['f3_spouse_mfiemipaid']      	= @$_POST['f3_spouse_mfiemipaid'];
	$data['f3_spouse_mfioutstanding_principal']  =@$_POST['f3_spouse_mfioutstanding_principal'];
  

	$data['f3_points']    	  = $_POST['f3_points'];
	$data['f3_status']    	  = 1;
	$data['f3_section_id']	  = '';
	
//================================================
// Start Validation
//================================================
	if($data['f3_married'] == 'yes'){
		$validateData = [
			'required' => [
				$data['f3_spouse_fname'],
				$data['f3_spouse_mname'],
				$data['f3_spouse_sname'],
				$data['f3_spouse_mobno'],
				$data['f3_spouse_adhno'],
				$data['f3_spouse_occp'],
				$data['f3_spouse_mfi'],

				$data['fm_id'],
				$data['fm_caid']
			]
		];
	}
	else
	{
		$validateData = [
			'required' => [
				$data['f3_married'],

				$data['fm_id'],
				$data['fm_caid']
			]
		];
	}

	$valid_res = validate($validateData);
	
	foreach ($valid_res as $val) {
		if(!$val['validity'])
		{
			if($val['type'] == 'required'){
				quit('all fields are mandatory');
			}
		}
	}


//================================================
// End Validation
//================================================


//Database transaction

	$check_exist = check_exist($table,array('fm_id'=>$data['fm_id']),array(),array(),array());
	
	if(!$check_exist)
	{
		$data['f3_created_by']= $_POST['fm_caid'];
        $data['f3_created_date']=$datetime;
		
		$res=insert($table,$data);
		
		
	    $check_pt_exist = check_exist('tbl_points',array('fm_id'=>$data['fm_id']),array(),array(),array());
		if(!$check_pt_exist)
		{
			$pt_data['fm_id']=$data['fm_id'];
		    $pt_data['pt_frm3']=$data['f3_points'];
			$res=insert('tbl_points',$pt_data);
		}
		else
		{
			$pt_data['pt_frm3']=$data['f3_points'];
		    $res=update('tbl_points',$pt_data,array('fm_id'=>$data['fm_id']),array(),array(),array());
		}
		if($data['f3_married']=="no")
		{
			$pt_data['pt_frm4']='NA';
		    $res=update('tbl_points',$pt_data,array('fm_id'=>$data['fm_id']),array(),array(),array());
		}
	   quit('Record Submitted Successfully..!',1);
		
	}
	else
	{
		$id =$check_exist;
		
		$data['f3_modified_by']= $_POST['fm_caid'];
        $data['f3_modified_date']=$datetime;
		$res =update($table,$data,array('id'=>$id),array(),array(),array());
		
		$pt_data['pt_frm3']=$data['f3_points'];
		$res=update('tbl_points',$pt_data,array('fm_id'=>$data['fm_id']),array(),array(),array());

		if($data['f3_married']=="no")
		{
			$pt_data['pt_frm4']='NA';
		    $res=update('tbl_points',$pt_data,array('fm_id'=>$data['fm_id']),array(),array(),array());
		}
		quit('Record Updated Successfully..!',1);
		
	}
		
}


?>
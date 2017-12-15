<?php 

include('../include/connection.php');
//include('../include/query-helper.php');
include('../include/validate-helper.php');

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

	$data['f3_spouse_dob']			= @$_POST['f3_spouse_dob'];

	$data['f3_spouse_age']			= @$_POST['f3_spouse_age'];
	$data['f3_spouse_mobno']		= @$_POST['f3_spouse_mobno'];
	$data['f3_spouse_adhno']		= @$_POST['f3_spouse_adhno'];

	
	$data['f3_english_profeciency']	= @$_POST['f3_english_profeciency'];

	
	//$data['f3_spouse_shg']			= @$_POST['f3_spouse_shg'];
	//$data['f3_spouse_shgname']		= @$_POST['f3_spouse_shgname'];
	
	$data['f3_spouse_occp']			= @$_POST['f3_spouse_occp'];
	$data['f3_spouse_income']		= @$_POST['f3_spouse_income'];
	
	//$data['f3_spouse_mfi']			= @$_POST['f3_spouse_mfi'];
	//$data['f3_spouse_mfiname']		= @$_POST['f3_spouse_mfiname'];
	//$data['f3_spouse_mfiamount']	= @$_POST['f3_spouse_mfiamount'];
	
	//$data['f3_affliation_status']	= @$_POST['f3_affliation_status'];
	//$data['f3_fpo_name']			= @$_POST['f3_fpo_name'];
	
	$data['f3_is_fpo_member']		= @$_POST['f3_is_fpo_member'];
	$data['f3_bank_name']			= @$_POST['f3_bank_name'];
	
	$data['f3_spouse_owned_prop']		= @$_POST['f3_spouse_owned_prop'];
	$data['f3_spouse_prop_type']		= @$_POST['f3_spouse_prop_type'];
	$data['f3_property_details']		= @$_POST['f3_property_details'];
	$data['f3_spouse_get_any_income']	= @$_POST['f3_spouse_get_any_income'];
	$data['f3_spouse_yearly_income']	= @$_POST['f3_spouse_yearly_income'];
	
	$data['f3_points']    	  		= @$_POST['f3_points'];
	$data['f3_married_reg_points']	= @$_POST['f3_married_reg_points'];
	$data['f3_status']    	  		= 1;
	$data['f3_section_id']	  		= '';
	
//================================================
// Start Validation
//================================================
	if($data['f3_married'] == 'yes'){
		$validateData = [
			'required' => [
				$data['f3_spouse_fname'],
				$data['f3_spouse_mobno'],
				$data['f3_spouse_adhno'],
				$data['f3_spouse_occp'],
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

	/*$valid_res = validate($validateData);
	
	foreach ($valid_res as $val) {
		if(!$val['validity'])
		{
			if($val['type'] == 'required'){
				quit('all fields are mandatory');
			}
		}
	}*/


//================================================
// End Validation
//================================================


//Database transaction

	$check_exist = checkExist($table,array('fm_id'=>$data['fm_id']),array(),array(),array());
	
	if(!$check_exist)
	{
		$data['f3_created_by']		= $_POST['fm_caid'];
        $data['f3_created_date']	= $datetime;
		
		$res = insert($table,$data);
		
		
	    $check_pt_exist = checkExist('tbl_points',array('fm_id'=>$data['fm_id']),array(),array(),array());
		if(!$check_pt_exist)
		{
			$pt_data['fm_id']	= $data['fm_id'];
		    $pt_data['pt_frm3']	= $data['f3_points'];
			$res = insert('tbl_points',$pt_data);
		}
		else
		{
			$pt_data['pt_frm3']=$data['f3_points'];
		    $res = update('tbl_points',$pt_data,array('fm_id'=>$data['fm_id']),array(),array(),array());
		}
		if($data['f3_married']=="no")
		{
			$pt_data['pt_frm4']='NA';
		    $res = update('tbl_points',$pt_data,array('fm_id'=>$data['fm_id']),array(),array(),array());
		}
	   quit('Record Submitted Successfully..!',1);
		
	}
	else
	{
		$id = $check_exist['id'];
		//quit($data['f3_points'].'<==>'.$data['f3_married_reg_points']);
		//$data['f3_points']	= $data['f3_points'] + $data['f3_married_reg_points'];
		$data['f3_points']	= $data['f3_points'];
		
		$data['f3_modified_by']= $_POST['fm_caid'];
        $data['f3_modified_date']=$datetime;
		$res = update($table,$data,array('id'=>$id),array(),array(),array());
		
		$check_pt_exist = checkExist('tbl_points',array('fm_id'=>$data['fm_id']),array(),array(),array());
		if(!$check_pt_exist)
		{
			$pt_data['fm_id']	= $data['fm_id'];
		    $pt_data['pt_frm3']	= $data['f3_points'];
			$res = insert('tbl_points',$pt_data);
		}
		else
		{
			$pt_data['pt_frm3']=$data['f3_points'];
		    $res = update('tbl_points',$pt_data,array('fm_id'=>$data['fm_id']),array(),array(),array());
		}
		
		/*$pt_data['pt_frm3'] = $data['f3_points'];
		$res = update('tbl_points',$pt_data,array('fm_id'=>$data['fm_id']),array(),array(),array());*/

		if($data['f3_married']=="no")
		{
			$pt_data['pt_frm4']='NA';
		    $res = update('tbl_points',$pt_data,array('fm_id'=>$data['fm_id']),array(),array(),array());
		}
		quit('Record Updated Successfully..!',1);
		
	}
		
}


?>
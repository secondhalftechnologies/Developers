<?php 

include('../connection.php');

$table ='tbl_residence_details';
if(isset($_POST['add_knowledge_detail']) && $_POST['add_knowledge_detail']==1)
{
	
	$data['fm_id']            = mysqli_real_escape_string($db_con,@$_POST['fm_id']);
	$data['fm_caid']          = mysqli_real_escape_string($db_con,@$_POST['fm_caid']);
	$data['f7_resistatus']    = mysqli_real_escape_string($db_con,@$_POST['f7_resistatus']);
	$data['f7_phouse']        = mysqli_real_escape_string($db_con,@$_POST['f7_phouse']);
	$data['f7_pstreet']       = mysqli_real_escape_string($db_con,@$_POST['f7_pstreet']);
	$data['f7_parea']     	  = mysqli_real_escape_string($db_con,@$_POST['f7_parea']);
	$data['f7_pstate']        = mysqli_real_escape_string($db_con,@$_POST['f7_pstate']);
	$data['f7_pdistrict']     = mysqli_real_escape_string($db_con,@$_POST['f7_pdistrict']);
	$data['f7_ptaluka']       = mysqli_real_escape_string($db_con,@$_POST['f7_ptaluka']);
	$data['f7_pvillage']      = mysqli_real_escape_string($db_con,@$_POST['f7_pvillage']);
	$data['f7_ppin']          = mysqli_real_escape_string($db_con,@$_POST['f7_ppin']);
	// $data['f7_platlon']       = mysqli_real_escape_string($db_con,@$_POST['f7_platlon']);
	$data['f7_chouse']        = mysqli_real_escape_string($db_con,@$_POST['f7_chouse']);
	$data['f7_cstreet']       = mysqli_real_escape_string($db_con,@$_POST['f7_cstreet']);
	$data['f7_carea']         = mysqli_real_escape_string($db_con,@$_POST['f7_carea']);
	$data['f7_cstate']        = mysqli_real_escape_string($db_con,@$_POST['f7_cstate']);
	$data['f7_cdistrict']     = mysqli_real_escape_string($db_con,@$_POST['f7_cdistrict']);
	$data['f7_ctaluka']       = mysqli_real_escape_string($db_con,@$_POST['f7_ctaluka']);
	$data['f7_cvillage']      = mysqli_real_escape_string($db_con,@$_POST['f7_cvillage']);
	$data['f7_cpin']          = mysqli_real_escape_string($db_con,@$_POST['f7_cpin']);
	// $data['f7_clatlon']       = mysqli_real_escape_string($db_con,@$_POST['f7_clatlon']);



	$data['f7_television']    = mysqli_real_escape_string($db_con,@$_POST['f7_television']);
	$data['f7_refrigerator']  = mysqli_real_escape_string($db_con,@$_POST['f7_refrigerator']);
	$data['f7_wmachine']      = mysqli_real_escape_string($db_con,@$_POST['f7_wmachine']);
	$data['f7_mixer']         = mysqli_real_escape_string($db_con,@$_POST['f7_mixer']);
	$data['f7_stove']         = mysqli_real_escape_string($db_con,@$_POST['f7_stove']);
	$data['f7_bicycle']       = mysqli_real_escape_string($db_con,@$_POST['f7_bicycle']);
	$data['f7_ccylinder']     = mysqli_real_escape_string($db_con,@$_POST['f7_ccylinder']);
	$data['f7_fans']          = mysqli_real_escape_string($db_con,@$_POST['f7_fans']);
	$data['f7_motorcycle']    = mysqli_real_escape_string($db_con,@$_POST['f7_motorcycle']);
	$data['f7_car']           = mysqli_real_escape_string($db_con,@$_POST['f7_car']);
	
	$data['f7_points']        = mysqli_real_escape_string($db_con,@$_POST['f7_points']);
	
	$data['f7_status']    =1;
	$data['f7_section_id']='';
	
	
//================================================
// Start Validation
//================================================
	$validateData = [
		'required' => [
			$data['f7_parea'],
			$data['f7_pstate'],
			$data['f7_pdistrict'],
			$data['f7_ptaluka'],
			$data['f7_pvillage'],
			// $data['f7_platlon'],

			$data['f7_carea'],
			$data['f7_cstate'],
			$data['f7_cdistrict'],
			$data['f7_ctaluka'],
			$data['f7_cvillage'],
			// $data['f7_clatlon'],

			$data['f7_points'],
			$data['fm_id'],
			$data['fm_caid']
		]
	];

	$valid_res = validate($validateData);
	
//	quit($data['f7_points']);
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


		
$check_exist = check_exist($table,array('fm_id'=>$data['fm_id']),array(),array(),array());

if(!$check_exist)
{
	$data['f7_created_by']= mysqli_real_escape_string($db_con,$_POST['fm_caid']);
    $data['f7_created_date']=$datetime;
	
	$res=insert($table,$data);
	
	
    $check_pt_exist = check_exist('tbl_points',array('fm_id'=>$data['fm_id']),array(),array(),array());
	if(!$check_pt_exist)
	{
		$pt_data['fm_id']=$data['fm_id'];
	    $pt_data['pt_frm7']=$data['f7_points'];
		$res=insert('tbl_points',$pt_data);
	}
	else
	{
		$pt_data['pt_frm7']=$data['f7_points'];
	    $res=update('tbl_points',$pt_data,array('fm_id'=>$data['fm_id']),array(),array(),array());
	}
   quit('Record Submitted Successfully..!',1);
	
}
else
{
	$id =$check_exist;
	
	$data['f7_modified_by']= mysqli_real_escape_string($db_con,$_POST['fm_caid']);
    $data['f7_modified_date']=$datetime;
	$res =update($table,$data,array('id'=>$id),array(),array(),array());
	
	$pt_data['pt_frm7']=$data['f7_points'];
	$res=update('tbl_points',$pt_data,array('fm_id'=>$data['fm_id']),array(),array(),array());
	quit('Record Updated Successfully..!',1);
	
}
}


?>
<?php 

include('../connection.php');

if($_POST){
	foreach ($_POST as $k => $value) {
		mysqli_real_escape_string($db_con,@$_POST[$k]);
	}
}

$table ='tbl_applicant_phone';
if(isset($_POST['add_applicant_detail']) && $_POST['add_applicant_detail']==1)
{
	
	$data['fm_id']            = @$_POST['fm_id'];
	$data['fm_caid']          = @$_POST['fm_caid'];
	
	$data['f5_phonetype']     = @$_POST['f5_phonetype'];
	$data['f5_servpro']       = @$_POST['f5_servpro'];
	$data['f5_network']       = @$_POST['f5_network'];
	$data['f5_datapack']      = @$_POST['f5_datapack'];
	$data['f5_datapackname']  = @$_POST['f5_datapackname'];
	$data['f5_appuse']        = @$_POST['f5_appuse'];
	$data['f5_farmapp']       = @$_POST['f5_farmapp'];
	
	
	$data['f5_points']        = 'NA';
	$data['f5_status']    =1;
	$data['f5_section_id']='';
	
	
	
	if($data['f5_phonetype']!="" && $data['fm_caid']!="" && $data['fm_id']!="")
	{
		
		$check_exist = check_exist($table,array('fm_id'=>$data['fm_id']),array(),array(),array());
		
		if(!$check_exist)
		{
			$data['f5_created_by']= $_POST['fm_caid'];
	        $data['f5_created_date']=$datetime;
			
			$res=insert($table,$data);
			
			
		    $check_pt_exist = check_exist('tbl_points',array('fm_id'=>$data['fm_id']),array(),array(),array());
			if(!$check_pt_exist)
			{
				$pt_data['fm_id']=$data['fm_id'];
			    $pt_data['pt_frm5']=$data['f5_points'];
				$res=insert('tbl_points',$pt_data);
			}
			else
			{
				$pt_data['pt_frm5']=$data['f5_points'];
			    $res=update('tbl_points',$pt_data,array('fm_id'=>$data['fm_id']),array(),array(),array());
			}
		   quit('Record Submitted Successfully..!',1);
			
		}
		else
		{
			$id =$check_exist;
			
			$data['f5_modified_by']= $_POST['fm_caid'];
	        $data['f5_modified_date']=$datetime;
			$res =update($table,$data,array('id'=>$id),array(),array(),array());
			
			$pt_data['pt_frm5']=$data['f5_points'];
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
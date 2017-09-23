<?php 

include('../connection.php');

if($_POST){
	foreach ($_POST as $k => $value) {
		mysqli_real_escape_string($db_con,@$_POST[$k]);
	}
}

$table ='tbl_spouse_knowledge';
if(isset($_POST['add_spouse_detail']) && $_POST['add_spouse_detail']==1)
{
	
	$data['fm_id']            = @$_POST['fm_id'];
	$data['fm_caid']          = @$_POST['fm_caid'];
	
	$data['f4_edudetail']     = @$_POST['f4_edudetail'];
	$data['f4_proficiency']   = @$_POST['f4_proficiency'];
	$data['f4_participation'] = @$_POST['f4_participation'];
	$data['f4_points']        = @$_POST['f4_points'];

	$data['f4_progtype']        = @$_POST['f4_progtype'];
	$data['f4_progname']        = @$_POST['f4_progname'];
	$data['f4_duration']        = @$_POST['f4_duration'];
	$data['f4_dateprog']        = @$_POST['f4_dateprog'];
	$data['f4_conducted']       = @$_POST['f4_conducted'];
	$data['f4_crop']            = @$_POST['f4_crop'];
	
	$data['f4_status']    =1;
	$data['f4_section_id']='';
	
	
	
	if($data['f4_edudetail']!="" &&  $data['f4_proficiency'] !="" && $data['f4_participation']!="" & $data['f4_points']!="" && $data['fm_id']!="")
	{
		
		$check_exist = check_exist($table,array('fm_id'=>$data['fm_id']),array(),array(),array());
		
		if(!$check_exist)
		{
			$data['f4_created_by']= $_POST['fm_caid'];
	        $data['f4_created_date']=$datetime;
			
			$res=insert($table,$data);
			
			
		    $check_pt_exist = check_exist('tbl_points',array('fm_id'=>$data['fm_id']),array(),array(),array());
			if(!$check_pt_exist)
			{
				$pt_data['fm_id']=$data['fm_id'];
			    $pt_data['pt_frm4']=$data['f4_points'];
				$res=insert('tbl_points',$pt_data);
			}
			else
			{
				$pt_data['pt_frm4']=$data['f4_points'];
			    $res=update('tbl_points',$pt_data,array('fm_id'=>$data['fm_id']),array(),array(),array());
			}
		   quit('Record Submitted Successfully..!',1);
			
		}
		else
		{
			$id =$check_exist;
			
			$data['f4_modified_by']= $_POST['fm_caid'];
	        $data['f4_modified_date']=$datetime;
			$res =update($table,$data,array('id'=>$id),array(),array(),array());
			
			$pt_data['pt_frm4']=$data['f4_points'];
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
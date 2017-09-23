<?php 

include('../connection.php');

if($_POST){
	foreach ($_POST as $k => $value) {
		mysqli_real_escape_string($db_con,@$_POST[$k]);
	}
}

$table ='tbl_personal_detail';
if(isset($_POST['add_knowledge_detail']) && $_POST['add_knowledge_detail']==1)
{
	
	$data['fm_id']            = @$_POST['fm_id'];
	$data['fm_caid']          = @$_POST['fm_caid'];
	    
	$data['f1_mfname']        = @$_POST['f1_mfname'];
	$data['f1_mmname']        = @$_POST['f1_mmname'];
	$data['f1_age']           = @$_POST['f1_age'];
	$data['f1_altno']         = @$_POST['f1_altno'];
	$data['f1_ppno']          = @$_POST['f1_ppno'];
	$data['f1_pancard']       = @$_POST['f1_pancard'];
	$data['f1_vote']          = @$_POST['f1_vote'];
	$data['f1_licno']         = @$_POST['f1_licno'];
	$data['f1_otherno']       = @$_POST['f1_otherno'];
	$data['f1_expfarm']       = @$_POST['f1_expfarm'];
	$data['f1_father']        = @$_POST['f1_father'];
	$data['f1_dob']           = @$_POST['f1_dob'];
	$data['f1_requireloan']   = @$_POST['f1_requireloan'];
	
	$data['f1_points']        = @$_POST['f1_points'];
	$data['f1_status']        =1;
	$data['f1_section_id']    ='';
	
	
	
	if($data['f1_age']!="" &&  $data['f1_expfarm'] !="" && $data['f1_points']!="" && $data['fm_id']!="")
	{
		
		$check_exist = check_exist($table,array('fm_id'=>$data['fm_id']),array(),array(),array());
		
		if(!$check_exist)
		{
			$data['f1_created_by']= $_POST['fm_caid'];
	        $data['f1_created_date']=$datetime;
			
			$res=insert($table,$data);
			
			
		    $check_pt_exist = check_exist('tbl_points',array('fm_id'=>$data['fm_id']),array(),array(),array());
			if(!$check_pt_exist)
			{
				$pt_data['fm_id']=$data['fm_id'];
			    $pt_data['pt_frm1']=$data['f1_points'];
				$res=insert('tbl_points',$pt_data);
			}
			else
			{
				$pt_data['pt_frm1']=$data['f1_points'];
			    $res=update('tbl_points',$pt_data,array('fm_id'=>$data['fm_id']),array(),array(),array());
			}
		   quit('Record Submitted Successfully..!',1);
			
		}
		else
		{
			$id =$check_exist;
			
			$data['f1_modified_by']= $_POST['fm_caid'];
	        $data['f1_modified_date']=$datetime;
			$res =update($table,$data,array('id'=>$id),array(),array(),array());
			
			$pt_data['pt_frm1']=$data['f1_points'];
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
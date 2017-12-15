<?php 

include('../include/connection.php');

if($_POST){
	foreach ($_POST as $k => $value) {
		mysqli_real_escape_string($db_con,@$_POST[$k]);
	}
}

$table ='tbl_applicant_knowledge';
if(isset($_POST['add_knowledge_detail']) && $_POST['add_knowledge_detail']==1)
{
	
	$data['fm_id']            	= @$_POST['fm_id'];
	$data['fm_caid']          	= @$_POST['fm_caid'];
	
	$data['f2_edudetail']     	= @$_POST['f2_edudetail'];
	$data['f2_proficiency']   	= @$_POST['f2_proficiency'];
	$data['f2_participation'] 	= @$_POST['f2_participation'];
	$data['f2_points']        	= @$_POST['f2_points'];

	$data['f2_typeprog']      	= @$_POST['f2_typeprog'];
	$data['f2_condprog']      	= @$_POST['f2_condprog'];
	$data['f2_cropprog']      	= @$_POST['f2_cropprog'];
	$data['f2_durprog']       	= @$_POST['f2_durprog'];
	
	$data['f2_status']    		= 1;
	$data['f2_section_id']		= '';
	
	if($data['f2_edudetail']!="" &&  $data['f2_proficiency'] !="" && $data['f2_participation']!="" && $data['f2_points']!="" && $data['fm_id']!="")
	{
		$check_exist = checkExist($table,array('fm_id'=>$data['fm_id']),array(),array(),array());
		
		if(!$check_exist)
		{
			$data['f2_created_by'] 	 = $_POST['fm_caid'];
	        $data['f2_created_date'] = $datetime;
			
			$res = insert($table,$data);
			
			
		    $check_pt_exist = checkExist('tbl_points',array('fm_id'=>$data['fm_id']),array(),array(),array());
			if(!$check_pt_exist)
			{
				$pt_data['fm_id'] 	= $data['fm_id'];
			    $pt_data['pt_frm2'] = $data['f2_points'];
				$res = insert('tbl_points',$pt_data);
			}
			else
			{
				$pt_data['pt_frm2'] = $data['f2_points'];
			    $res = update('tbl_points',$pt_data,array('fm_id'=>$data['fm_id']),array(),array(),array());
			}
		   quit('Record Submitted Successfully..!',1);
			
		}
		else
		{
			$id =$check_exist['id'];
			
			$data['f2_modified_by'] 	= $_POST['fm_caid'];
	        $data['f2_modified_date']	= $datetime;
			$res = update($table,$data,array('id'=>$id),array(),array(),array());
			
			$pt_data['pt_frm2'] = $data['f2_points'];
			$res = update('tbl_points',$pt_data,array('fm_id'=>$data['fm_id']),array(),array(),array());
			quit('Record Updated Successfully..!',1);
			
		}
		
	}
	else
	{
		quit('all fields are mandatory');
	}
}


?>
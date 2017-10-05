<?php 

include('../include/connection.php');
//include('../include/query-helper.php');
include('../include/validate-helper.php');

if($_POST){
	foreach ($_POST as $k => $value) {
		mysqli_real_escape_string($db_con,@$_POST[$k]);
	}
}
$table ='tbl_family_details';
if(isset($_POST['add_knowledge_detail']) && $_POST['add_knowledge_detail']==1)
{
	
	$data['fm_id']            = mysqli_real_escape_string($db_con,@$_POST['fm_id']);
	$data['fm_caid']          = mysqli_real_escape_string($db_con,@$_POST['fm_caid']);
    $data['f6_points']        = mysqli_real_escape_string($db_con,@$_POST['f6_points']);
	$data['f6_jointfamily']   = mysqli_real_escape_string($db_con,@$_POST['f6_jointfamily']);
	$data['f6_members']       = mysqli_real_escape_string($db_con,@$_POST['f6_members']);
	$data['f6_children']      = mysqli_real_escape_string($db_con,@$_POST['f6_children']);
	$data['f6_smartuse']      = mysqli_real_escape_string($db_con,@$_POST['f6_smartuse']);

	$data['f6_status']    =1;
	$data['f6_section_id']='';
	
	
	
	if($data['f6_jointfamily']!="" &&  $data['f6_members'] !="" && $data['f6_children']!="" && $data['f6_smartuse']!="" && $data['f6_points']!="" && $data['fm_id']!="")
	{
		
		$check_exist = checkExist($table,array('fm_id'=>$data['fm_id']),array(),array(),array());
		
		if(!$check_exist)
		{
			$data['f6_created_by']= mysqli_real_escape_string($db_con,$_POST['fm_caid']);
	        $data['f6_created_date']=$datetime;
			
			$res=insert($table,$data);
			
			
		    $check_pt_exist = checkExist('tbl_points',array('fm_id'=>$data['fm_id']),array(),array(),array());
			if(!$check_pt_exist)
			{
				$pt_data['fm_id']=$data['fm_id'];
			    $pt_data['pt_frm6']=$data['f6_points'];
				$res=insert('tbl_points',$pt_data);
			}
			else
			{
				$pt_data['pt_frm6']=$data['f6_points'];
			    $res=update('tbl_points',$pt_data,array('fm_id'=>$data['fm_id']),array(),array(),array());
			}
		   quit('Record Submitted Successfully..!',1);
			
		}
		else
		{
			$id =$check_exist['id'];
			
			$data['f6_modified_by']= mysqli_real_escape_string($db_con,$_POST['fm_caid']);
	        $data['f6_modified_date']=$datetime;
			$res =update($table,$data,array('id'=>$id),array(),array(),array());
			
			$pt_data['pt_frm6']=$data['f6_points'];
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
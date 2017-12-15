<?php 

include('../include/connection.php');
//include('../include/query-helper.php');
include('../include/validate-helper.php');

$table ='tbl_livestock_details';

if(isset($_POST['add_livestock_detail']) && $_POST['add_livestock_detail']==1)
{
	$data['fm_id']				  = mysqli_real_escape_string($db_con,$_POST['fm_id']);
	$data['fm_caid']		      = mysqli_real_escape_string($db_con,$_POST['fm_caid']);
	
	$data['f13_dairy_cattle']     = mysqli_real_escape_string($db_con,$_POST['f13_dairy_cattle']);
	$data['f13_draft_cattle']     = mysqli_real_escape_string($db_con,$_POST['f13_draft_cattle']);
	$data['f13_buffalo'] 	      = mysqli_real_escape_string($db_con,$_POST['f13_buffalo']);
	$data['f13_ox']			      = mysqli_real_escape_string($db_con,$_POST['f13_ox']);
	$data['f13_sheep'] 		      = mysqli_real_escape_string($db_con,$_POST['f13_sheep']);
	$data['f13_goat'] 		      = mysqli_real_escape_string($db_con,$_POST['f13_goat']);
	$data['f13_pig'] 		 	  = mysqli_real_escape_string($db_con,$_POST['f13_pig']);
	$data['f13_poultry'] 	  	  = mysqli_real_escape_string($db_con,$_POST['f13_poultry']);
	$data['f13_donkeys'] 	 	  = mysqli_real_escape_string($db_con,$_POST['f13_donkeys']);
	$data['f13_livestock_count']  = mysqli_real_escape_string($db_con,$_POST['f13_livestock_count']);
	$data['f13_livestock_income'] = mysqli_real_escape_string($db_con,$_POST['f13_livestock_income']);
	$data['f13_livestock_income_year'] = mysqli_real_escape_string($db_con,$_POST['f13_livestock_income_year']);
	$data['f13_status']    			= 1;
	$data['f13_points']    			= @$_POST['f13_points'];;
	$data['f13_section_id']			= '';
	
	if($data['fm_id']!="" &&  $data['fm_caid'] !="")
	{
		
		$checkExist = checkExist($table,array('fm_id'=>$data['fm_id']),array(),array(),array());
		
		if(!$checkExist)
		{
			$data['f13_created_by']       = mysqli_real_escape_string($db_con,$_POST['fm_caid']);
	        $data['f13_created_date']     = $datetime;
			
			$res=insert($table,$data);
			
			$pt_data['fm_id']     = $data['fm_id'];
			$pt_data['pt_frm13']  = $data['f13_points'];
		   
		   
		    $check_pt_exist = checkExist('tbl_points',array('fm_id'=>$data['fm_id']),array(),array(),array());

			if(!$check_pt_exist)
			{
				$res=insert('tbl_points',$pt_data);
			}
			else
			{
				$res=update('tbl_points',$pt_data,array('fm_id'=>$data['fm_id']),array(),array(),array());
			}
		   
		    quit('Record Submitted Successfully..!',1);
		}
		else
		{
			$id =$checkExist['id'];
			
			$data['f13_modified_by']       = mysqli_real_escape_string($db_con,$_POST['fm_caid']);
	        $data['f13_modified_date']     = $datetime;
			
			$res =update($table,$data,array('id'=>$id),array(),array(),array());
			
			$pt_data['pt_frm13']=$data['f13_points'];
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
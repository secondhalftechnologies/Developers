<?php 

include('../connection.php');

$json 	= file_get_contents('php://input');
$obj 	= json_decode($json);



//print_r($obj);
$table ='tbl_cultivation_data';
if(isset($_POST['add_crop_detail']) && $_POST['add_crop_detail']==1)
{
	$data['fm_id']	  = mysqli_real_escape_string($db_con,$_POST['fm_id']);
	$data['fm_caid']  = mysqli_real_escape_string($db_con,$_POST['fm_caid']);
	$id				  = $_POST['id'];
	$no_of_crops      = mysqli_real_escape_string($db_con,$_POST['no_of_crops']);
	$data['f10_points'] = mysqli_real_escape_string($db_con,$_POST['f10_points']);

	$data['f10_status']    = 1;
	$data['f10_section_id']='';
	
	
	
	if($data['fm_id']!="" &&  $data['fm_caid'] !="")
	{
		
		$check_exist = check_exist($table,array('fm_id'=>$data['fm_id']),array(),array(),array());
		
		if(!$check_exist)
		{
			$data['f10_created_by']       = $_POST['fm_caid'];
	        $data['f10_created_date']     = $datetime;
		
			for($i=1;$i<=$no_of_crops;$i++)
			{
				$data['f10_cultivating']      = mysqli_real_escape_string($db_con,$_POST['f10_cultivating'.$i]);
				$data['f10_variety']		  = mysqli_real_escape_string($db_con,$_POST['f10_variety'.$i]);
				$data['f10_stage ']	          = mysqli_real_escape_string($db_con,$_POST['f10_stage'.$i]);
				$data['f10_expected']         = mysqli_real_escape_string($db_con,$_POST['f10_expected'.$i]);
				$data['f10_expectedincome']   = mysqli_real_escape_string($db_con,$_POST['f10_expectedincome'.$i]);
				$data['f10_expectedprice']    = mysqli_real_escape_string($db_con,$_POST['f10_expectedprice'.$i]);
				$data['f10_diseases'] 		  = mysqli_real_escape_string($db_con,$_POST['f10_diseases'.$i]);
				$data['f10_pest'] 		      = mysqli_real_escape_string($db_con,$_POST['f10_pest'.$i]);
				$res=insert($table,$data);
			}
			
			$check_pt_exist = check_exist('tbl_points',array('fm_id'=>$data['fm_id']),array(),array(),array());
			if(!$check_pt_exist)
			{
				$pt_data['fm_id']=$data['fm_id'];
				$pt_data['pt_frm10']=$data['f10_points'];
				$res=insert('tbl_points',$pt_data);
			}
			else
			{
				$pt_data['pt_frm10']=$data['f10_points'];
			    $res=update('tbl_points',$pt_data,array('fm_id'=>$data['fm_id']),array(),array(),array());
			}
			
			
			quit('Record Submitted Successfully..!',1);
		}
		else
		{
			$del_id=array_values(array_diff($id,array("null","")));
			$sql_delete_crops ="DELETE FROM `tbl_cultivation_data` WHERE  fm_id ='".$data['fm_id']."' AND id NOT IN (".implode(',',$del_id).")";
			$res_delete_crops = mysqli_query($db_con,$sql_delete_crops) or die(mysqli_error($db_con));
			
			
			for($i=1;$i<=$no_of_crops;$i++)
			{
				$data['f10_cultivating']      = mysqli_real_escape_string($db_con,$_POST['f10_cultivating'.$i]);
				$data['f10_variety']		  = mysqli_real_escape_string($db_con,$_POST['f10_variety'.$i]);
				$data['f10_stage ']	          = mysqli_real_escape_string($db_con,$_POST['f10_stage'.$i]);
				$data['f10_expected']         = mysqli_real_escape_string($db_con,$_POST['f10_expected'.$i]);
				$data['f10_expectedincome']   = mysqli_real_escape_string($db_con,$_POST['f10_expectedincome'.$i]);
				$data['f10_expectedprice']    = mysqli_real_escape_string($db_con,$_POST['f10_expectedprice'.$i]);
				$data['f10_diseases'] 		  = mysqli_real_escape_string($db_con,$_POST['f10_diseases'.$i]);
				$data['f10_pest'] 		      = mysqli_real_escape_string($db_con,$_POST['f10_pest'.$i]);
					
				if(isset($id[($i-1)])&&  $id[($i-1)]!="")
				{
					$data['f10_modified_by']       = mysqli_real_escape_string($db_con,$_POST['fm_caid']);
	                $data['f10_modified_date']     = $datetime;
					$res =update($table,$data,array('id'=>$id[($i-1)]),array(),array(),array());
				}
				else
				{
					$data['f10_created_by']       = mysqli_real_escape_string($db_con,$_POST['fm_caid']);
	                $data['f10_created_date']     = $datetime;
					$res=insert($table,$data);
				}
			}
			
			$pt_data['pt_frm10']=$data['f10_points'];
			$res=update('tbl_points',$pt_data,array('fm_id'=>$data['fm_id']),array(),array(),array());
			
			quit('Record Updated Successfully..!',1);
			
		}
		
	}
	else
	{
		quit('all fields are mandatory');
	}
}


if(isset($obj->get_variety) && $obj->get_variety==1)
{
	
	$crop_id = mysqli_real_escape_string($db_con,$obj->crop_id);
	$data    ='<option value="">Select Variety</option>';
	$data1   ='';
	
	$result     = lookup_value('tbl_crop_varieties',array(),array("fk_crop_id"=>$crop_id),array(),array(),array());
	if($result)
	{
		while($row = mysqli_fetch_array($result))
		{
			$data1 .='<option value="'.$row['variety_id'].'">'.$row['variety_name'].' '.$row['variety_type'].'</option>';
		}
	}
	
	if($data1=="")
	{
		$data1='<option value="NA">NA</option>';
	}
	$data     = $data.$data1;
	echo json_encode(array("Success"=>"Success","resp"=>$data));
}

?>